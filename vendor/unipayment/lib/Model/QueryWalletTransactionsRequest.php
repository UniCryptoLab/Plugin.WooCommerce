<?php

namespace UniPayment\SDK\Model;

/**
 * Query Wallet Transactions Request
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class QueryWalletTransactionsRequest
{
    private ?string $id = null;
    private ?string $transactionType = null;
    private int $pageNo = 1;
    private int $pageSize = 10;
    private bool $isAsc = true;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getTransactionType(): ?string
    {
        return $this->transactionType;
    }

    public function setTransactionType(?string $transactionType): void
    {
        $this->transactionType = $transactionType;
    }

    public function getPageNo(): int
    {
        return $this->pageNo;
    }

    public function setPageNo(int $pageNo): void
    {
        $this->pageNo = $pageNo;
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    public function setPageSize(int $pageSize): void
    {
        $this->pageSize = $pageSize;
    }

    public function isAsc(): bool
    {
        return $this->isAsc;
    }

    public function setIsAsc(bool $isAsc): void
    {
        $this->isAsc = $isAsc;
    }

    public function __toString()
    {
        // Build the query array
        $queryArray = [
            'id' => $this->id,
            'tnx_type' => $this->transactionType,
            'page_no' => $this->pageNo,
            'page_size' => $this->pageSize,
            'is_asc' => $this->isAsc ? 'true' : 'false'
        ];
        // Create query string
        return http_build_query($queryArray);
    }

}