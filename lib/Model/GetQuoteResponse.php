<?php

namespace UniPayment\SDK\Model;

/**
 * Get Quote Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class GetQuoteResponse
{
    private string $msg;
    private string $code;
    private Quote $data;

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

    public function getData(): Quote
    {
        return $this->data;
    }

    public function setData(Quote $data): void
    {
        $this->data = $data;
    }
}
