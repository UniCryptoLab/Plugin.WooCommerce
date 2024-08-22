<?php

namespace UniPayment\SDK\Model;


/**
 * Query Exchange Orders Request
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class QueryExchangeOrdersRequest
{
    private ?string $fromCurrency = null;
    private ?string $toCurrency = null;
    private int $pageNo = 1;
    private int $pageSize = 10;
    private bool $isAsc = true;

    public function getFromCurrency(): ?string
    {
        return $this->fromCurrency;
    }

    public function setFromCurrency(?string $fromCurrency): void
    {
        $this->fromCurrency = $fromCurrency;
    }

    public function getToCurrency(): ?string
    {
        return $this->toCurrency;
    }

    public function setToCurrency(?string $toCurrency): void
    {
        $this->toCurrency = $toCurrency;
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
            'from_currency' => $this->fromCurrency,
            'to_currency' => $this->toCurrency,
            'page_no' => $this->pageNo,
            'page_size' => $this->pageSize,
            'is_asc' => $this->isAsc ? 'true' : 'false'
        ];

        // Create query string
        return http_build_query($queryArray);
    }


}