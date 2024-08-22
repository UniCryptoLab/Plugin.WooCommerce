<?php

namespace UniPayment\SDK\Model;

/**
 * Query Beneficiary Request
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class QueryBeneficiaryRequest
{
    private int $pageNo = 1;
    private int $pageSize = 10;
    private bool $isAsc = true;

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
            'page_no' => $this->pageNo,
            'page_size' => $this->pageSize,
            'is_asc' => $this->isAsc ? 'true' : 'false'
        ];

        // Create query string
        return http_build_query($queryArray);
    }
}