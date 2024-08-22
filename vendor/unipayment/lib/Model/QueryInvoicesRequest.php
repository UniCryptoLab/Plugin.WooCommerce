<?php

namespace UniPayment\SDK\Model;


use DateTime;

/**
 * Query Invoice Request
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class QueryInvoicesRequest
{
    private ?string $appId = null;
    private ?string $invoiceId = null;
    private ?string $orderId = null;
    private ?string $status = null;
    private int $pageNo = 1;
    private int $pageSize = 10;
    private bool $isAsc = true;
    private ?DateTime $start = null;
    private ?DateTime $end = null;

    public function getAppId(): string
    {
        return $this->appId;
    }

    public function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    public function getInvoiceId(): string
    {
        return $this->invoiceId;
    }

    public function setInvoiceId(string $invoiceId): void
    {
        $this->invoiceId = $invoiceId;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
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

    public function getStart(): DateTime
    {
        return $this->start;
    }

    public function setStart(DateTime $start): void
    {
        $this->start = $start;
    }

    public function getEnd(): DateTime
    {
        return $this->end;
    }

    public function setEnd(DateTime $end): void
    {
        $this->end = $end;
    }

    public function __toString()
    {
        // Convert DateTime objects to strings
        // Convert DateTime objects to timestamps if they are set
        $startString = $this->start?->getTimestamp();
        $endString = $this->end?->getTimestamp();


        // Build the query array
        $queryArray = [
            'app_id' => $this->appId,
            'invoice_id' => $this->invoiceId,
            'order_id' => $this->orderId,
            'status' => $this->status,
            'page_no' => $this->pageNo,
            'page_size' => $this->pageSize,
            'is_asc' => $this->isAsc ? 'true' : 'false',
            'start' => $startString,
            'end' => $endString,
        ];

        // Create query string
        return http_build_query($queryArray);
    }
}
