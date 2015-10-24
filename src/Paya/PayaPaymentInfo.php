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
    private $numberOfTransactions;
    private $totalTransactionsAmount;
    private $requestDate;
    private $payerName;
    private $payerIban;

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
    public function getNumberOfTransactions()
    {
        return $this->numberOfTransactions;
    }

    /**
     * @param mixed $numberOfTransactions
     */
    public function setNumberOfTransactions($numberOfTransactions)
    {
        $this->numberOfTransactions = $numberOfTransactions;
    }

    /**
     * @return mixed
     */
    public function getTotalTransactionsAmount()
    {
        return $this->totalTransactionsAmount;
    }

    /**
     * @param mixed $totalTransactionsAmount
     */
    public function setTotalTransactionsAmount($totalTransactionsAmount)
    {
        $this->totalTransactionsAmount = $totalTransactionsAmount;
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