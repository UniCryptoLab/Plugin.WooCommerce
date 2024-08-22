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
    private array $transactions;

    /**
     * @return Transaction[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    public function setTransactions(array $transactions): void
    {
        $this->transactions = $transactions;
    }
}
