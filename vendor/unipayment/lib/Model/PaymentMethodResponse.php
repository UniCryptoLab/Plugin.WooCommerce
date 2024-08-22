<?php

namespace UniPayment\SDK\Model;

/**
 * Payment Method Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class PaymentMethodResponse
{
    private string $msg;
    private string $code;
    private ?PaymentMethod $data = null;

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

    public function getData(): ?PaymentMethod
    {
        return $this->data;
    }

    public function setData(?PaymentMethod $data): void
    {
        $this->data = $data;
    }

}