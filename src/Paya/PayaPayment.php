<?php
/**
 * User: Hossein Moradgholi
 * Date: 10/25/15
 * Time: 12:43 AM
 */

namespace Nikapps\BatchPayment\Paya;


class PayaPayment
{

    private $amount;
    private $creditorName;
    private $creditorIban;
    private $description;

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCreditorName()
    {
        return $this->creditorName;
    }

    /**
     * @param mixed $creditorName
     */
    public function setCreditorName($creditorName)
    {
        $this->creditorName = $creditorName;
    }

    /**
     * @return mixed
     */
    public function getCreditorIban()
    {
        return $this->creditorIban;
    }

    /**
     * @param mixed $creditorIban
     */
    public function setCreditorIban($creditorIban)
    {
        $this->creditorIban = $creditorIban;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }



}