<?php

namespace UniPayment\SDK\Model;


/**
 * Query Exchange Orders Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class QueryExchangeOrdersResponse
{
    private string $code;
    private string $msg;
    private ExchangeOrderPageList $data;

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

    public function getData(): ExchangeOrderPageList
    {
        return $this->data;
    }

    public function setData(ExchangeOrderPageList $data): void
    {
        $this->data = $data;
    }
}