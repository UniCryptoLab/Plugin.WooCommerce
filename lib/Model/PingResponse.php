<?php

namespace UniPayment\SDK\Model;

/**
 * Ping Response
 *
 * @category Class
 * @package  UniPayment\Client\Model
 */
class PingResponse
{
    private string $code;
    private string $msg;

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
}