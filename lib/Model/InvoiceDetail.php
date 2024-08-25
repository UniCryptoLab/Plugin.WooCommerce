<?php

namespace UniPayment\SDK\Model;
use JMS\Serializer\Annotation\Type;

/**
 * Invoice Detail
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class InvoiceDetail extends Invoice
{
    /**
     * @Type("array<UniPayment\SDK\Model\Transaction>")
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
