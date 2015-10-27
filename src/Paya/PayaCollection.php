<?php
/**
 * User: Hossein Moradgholi
 * Date: 10/25/15
 * Time: 12:01 AM
 */

namespace Nikapps\BatchPayment\Paya;

use Sabre\Xml\Writer;

class PayaCollection
{
    /** @var  PayaPaymentInfo */
    private $payaPaymentInfo;
    private $messageId;
    private $requestDateTime;

    /**
     * @return mixed
     */
    public function getRequestDateTime()
    {
        return $this->requestDateTime;
    }

    /**
     * @param mixed $requestDateTime
     */
    public function setRequestDateTime($requestDateTime)
    {
        $this->requestDateTime = $requestDateTime;
    }

    /**
     * @return mixed
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param mixed $messageId
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * @param PayaPaymentInfo $payaPaymentInfo
     */
    public function setPayaPaymentInfo($payaPaymentInfo)
    {
        $this->payaPaymentInfo = $payaPaymentInfo;
    }

    /**
     * @return PayaPaymentInfo
     */
    public function getPayaPaymentInfo()
    {
        return $this->payaPaymentInfo;
    }

    public function exportXml(){
        $writer = new Writer();
        $writer->openMemory();
        $writer->startDocument();
        $writer->startElement('Document');
        $writer->writeAttribute('xmlns', 'urn:iso:std:iso:20022:tech:xsd:pain.001.001.03');
        $writer->setIndent(true);
        // header
        $writer->startElement('CstmrCdtTrfInitn');
        $writer->startElement('GrpHdr');
        $writer->writeElement('MsgId', $this->getMessageId());
        $writer->writeElement('CreDtTm', $this->getRequestDateTime());
        $writer->writeElement('NbOfTxs', $this->getPayaPaymentInfo()->getNumberOfPayments());
        $writer->writeElement('CtrlSum', $this->getPayaPaymentInfo()->getTotalTransactionsAmount());
        $writer->startElement('InitgPty');
        $writer->writeElement('Nm', $this->getPayaPaymentInfo()->getPayerName());
        $writer->endElement();
        $writer->endElement();

        // payment info
        $writer->startElement('PmtInf');
        $writer->writeElement('PmtInfId', $this->payaPaymentInfo->getPaymentInfoId());

        $writer->startElement('PmtMtd');
        $writer->writeAttribute('Ccy', 'IRR');
        $writer->write($this->payaPaymentInfo->getPaymentMethod());
        $writer->endElement();

        $writer->writeElement('NbOfTxs', $this->payaPaymentInfo->getNumberOfPayments());
        $writer->writeElement('CtrlSum',$this->payaPaymentInfo->getTotalTransactionsAmount());
        $writer->writeElement('ReqdExctnDt',$this->payaPaymentInfo->getRequestDate());

        $writer->startElement('Dbtr');
        $writer->writeElement('Nm', $this->payaPaymentInfo->getPayerName());
        $writer->endElement();

        $writer->startElement('DbtrAcct');
        $writer->startElement('Id');
        $writer->writeElement('IBAN', $this->payaPaymentInfo->getPayerIban());
        $writer->endElement();
        $writer->endElement();

        $writer->startElement('DbtrAcct');
        $writer->startElement('FinInstnId');
        $writer->writeElement('BIC', 'BMJIIRTHXXX');
        $writer->endElement();
        $writer->endElement();

        /** @var PayaPayment $payment */
        foreach ($this->payaPaymentInfo->getPayments() as $payment) {
            $writer->startElement('CdtTrfTxInf');
            $writer->startElement('PmtId');
            $writer->writeElement('InstrId', 'EMPTY');
            $writer->writeElement('EndToEndId', 'EMPTY');
            $writer->endElement();
            $writer->startElement('Amt');
            $writer->startElement('InstdAmt');
            $writer->writeAttribute('Ccy','IRR');
            $writer->write($payment->getAmount());
            $writer->endElement();
            $writer->endElement();
            $writer->startElement('Cdtr');
            $writer->writeElement('Nm', $payment->getCreditorName());
            $writer->endElement();
            $writer->startElement('CdtrAcct');
            $writer->startElement('Id');
            $writer->writeElement('IBAN', $payment->getCreditorIban());
            $writer->endElement();
            $writer->endElement();
            $writer->endElement();
        }

        $writer->endElement();
        $writer->endElement();
        $writer->endElement();
        $writer->endDocument();
        return $writer->outputMemory();
    }
}