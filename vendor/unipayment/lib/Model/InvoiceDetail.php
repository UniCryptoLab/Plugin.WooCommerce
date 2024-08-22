<?php

namespace UniPayment\SDK\Model;

/**
 * Invoice Detail
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class InvoiceDetail extends Invoice
{
    /**
     * @var Transaction[]
     */
    private mixed $transactions;

    /**
     * @return Transaction[]
     */
    public function getTransactions(): mixed
    {
        return $this->transactions;
    }

    public function setTransactions(mixed $transactions): void
    {
        $this->transactions = $transactions;
    }
}
