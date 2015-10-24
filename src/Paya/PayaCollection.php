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
    private $senderIban;
    private $createdTime;
    private $numberOfTransactions;
    private $totalTransactionsAmount;
    private $payerName;

    /** @var  PayaPaymentInfo */
    private $payaPaymentInfo;

    /**
     * @param PayaPaymentInfo $payaPaymentInfo
     */
    public function setPayaPaymentInfo($payaPaymentInfo)
    {
        $this->payaPaymentInfo = $payaPaymentInfo;
    }

    /**
     * @param mixed $senderIban
     */
    public function setSenderIban($senderIban)
    {
        $this->senderIban = $senderIban;
    }

    /**
     * @param mixed $createdTime
     */
    public function setCreatedTime($createdTime)
    {
        $this->createdTime = $createdTime;
    }

    /**
     * @param mixed $numberOfTransactions
     */
    public function setNumberOfTransactions($numberOfTransactions)
    {
        $this->numberOfTransactions = $numberOfTransactions;
    }

    /**
     * @param mixed $totalTransactionsAmount
     */
    public function setTotalTransactionsAmount($totalTransactionsAmount)
    {
        $this->totalTransactionsAmount = $totalTransactionsAmount;
    }

    /**
     * @param mixed $payerName
     */
    public function setPayerName($payerName)
    {
        $this->payerName = $payerName;
    }

    public function exportXml(){
        $writer = new Writer();
        $writer->openMemory();
        $writer->startDocument();
        $writer->setIndent(true);
        // header
        $writer->startElement('CstmrCdtTrfInitn');
            $writer->startElement('GrpHdr');
                $writer->writeElement('MsgId', $this->senderIban);
                $writer->writeElement('CreDtTm', $this->createdTime);
                $writer->writeElement('NbOfTxs', $this->numberOfTransactions);
                $writer->writeElement('CtrlSum', $this->totalTransactionsAmount);
                $writer->startElement('InitgPty');
                    $writer->writeElement('Nm', $this->payerName);
                $writer->endElement();
            $writer->endElement();
        $writer->endElement();

        // payment info
        $writer->startElement('PmtInf');
            $writer->writeElement('PmtInfId', $this->payaPaymentInfo->getPaymentInfoId());

            $writer->startElement('PmtMtd');
                $writer->writeAttribute('Ccr', 'IRR');
                $writer->write($this->payaPaymentInfo->getPaymentMethod());
            $writer->endElement();
        


        $writer->endElement();
        $writer->endDocument();
        print $writer->outputMemory();
    }
}