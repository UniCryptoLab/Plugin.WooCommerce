<?php

namespace UniPayment\SDK\Model;


/**
 * Get Exchange Order Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class GetExchangeOrderResponse
{
    private string $msg;
    private string $code;
    private ExchangeOrder $data;

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

    public function getData(): ExchangeOrder
    {
        return $this->data;
    }

    public function setData(ExchangeOrder $data): void
    {
        $this->data = $data;
    }
}