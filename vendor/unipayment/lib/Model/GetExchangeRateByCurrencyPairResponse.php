<?php

namespace UniPayment\SDK\Model;

/**
 * Get Exchange Rate By Currency Pair Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class GetExchangeRateByCurrencyPairResponse
{
    private string $msg;
    private string $code;
    private ExchangeRate $data;

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

    public function getData(): ExchangeRate
    {
        return $this->data;
    }

    public function setData(ExchangeRate $data): void
    {
        $this->data = $data;
    }

}
