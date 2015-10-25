<?php
/**
 * User: Hossein Moradgholi
 * Date: 10/25/15
 * Time: 12:02 AM
 */

namespace Nikapps\BatchPayment\Paya;


class PayaPaymentInfo
{

    private $paymentInfoId = 1;
    private $paymentMethod = "TRF";
    private $requestDate;
    private $payerName;
    private $payerIban;
    private $payments;


    /**
     * @param PayaPayment $payaPayment
     */
    public function addPayment(PayaPayment $payaPayment)
    {
        $this->payments[] = $payaPayment;
    }

    /**
     * @return int|mixed
     */
    public function getTotalTransactionsAmount(){
        $total = 0;
        /** @var PayaPayment $payment */
        foreach ($this->payments as $payment) {
            $total += $payment->getAmount();
        }

        return $total;
    }

    /**
     * @return int
     */
    public function getNumberOfPayments(){
        return count($this->payments);
    }

    /**
     * @return mixed
     */
    public function getPayments()
    {
        return $this->payments;
    }


    /**
     * @return int
     */
    public function getPaymentInfoId()
    {
        return $this->paymentInfoId;
    }

    /**
     * @param int $paymentInfoId
     */
    public function setPaymentInfoId($paymentInfoId)
    {
        $this->paymentInfoId = $paymentInfoId;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return mixed
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * @param mixed $requestDate
     */
    public function setRequestDate($requestDate)
    {
        $this->requestDate = $requestDate;
    }

    /**
     * @return mixed
     */
    public function getPayerName()
    {
        return $this->payerName;
    }

    /**
     * @param mixed $payerName
     */
    public function setPayerName($payerName)
    {
        $this->payerName = $payerName;
    }

    /**
     * @return mixed
     */
    public function getPayerIban()
    {
        return $this->payerIban;
    }

    /**
     * @param mixed $payerIban
     */
    public function setPayerIban($payerIban)
    {
        $this->payerIban = $payerIban;
    }



}