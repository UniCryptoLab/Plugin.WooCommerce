<?php

namespace UniPayment\SDK\Model;

/**
 * Payment Response for Confirm and Cancel Operation
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class PaymentResponse
{
    private string $msg;
    private string $code;

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

}
