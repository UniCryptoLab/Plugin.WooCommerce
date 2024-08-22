<?php

namespace UniPayment\SDK\Model;

/**
 * Create Payment Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class CreatePaymentResponse
{
    private string $msg;
    private string $code;
    private Payment $data;

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

    public function getData(): Payment
    {
        return $this->data;
    }

    public function setData(Payment $data): void
    {
        $this->data = $data;
    }

}
