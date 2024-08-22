<?php

namespace UniPayment\SDK\Model;

/**
 * Get Invoice By Id Response
 *
 * @category Class
 * @package  UniPayment\Client
 */
class GetInvoiceByIdResponse
{
    private string $msg;
    private string $code;
    private InvoiceDetail $data;

    public function getMsg(): string
    {
        return $this->msg;
    }

    public function setMsg(string $msg): void
    {
        $this->msg = $msg;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getData(): InvoiceDetail
    {
        return $this->data;
    }

    public function setData(InvoiceDetail $data): void
    {
        $this->data = $data;
    }
}
