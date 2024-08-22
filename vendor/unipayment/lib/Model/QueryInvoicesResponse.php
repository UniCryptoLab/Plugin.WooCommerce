<?php

namespace UniPayment\SDK\Model;

/**
 * Query Invoices Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class QueryInvoicesResponse
{
    private string $code;
    private string $msg;
    private InvoicePageList $data;

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getMsg(): string
    {
        return $this->msg;
    }

    public function setMsg(string $msg): void
    {
        $this->msg = $msg;
    }

    public function getData(): InvoicePageList
    {
        return $this->data;
    }

    public function setData(InvoicePageList $data): void
    {
        $this->data = $data;
    }

}
