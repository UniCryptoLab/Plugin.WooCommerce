<?php

namespace UniPayment\SDK\Model;

/**
 * Query Payment Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class QueryPaymentResponse
{
    private string $code;
    private string $msg;
    private PaymentPageList $data;

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

    public function getData(): PaymentPageList
    {
        return $this->data;
    }

    public function setData(PaymentPageList $data): void
    {
        $this->data = $data;
    }

}