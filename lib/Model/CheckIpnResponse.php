<?php

namespace UniPayment\SDK\Model;

/**
 * Check Ipn Response
 *
 * @category Class
 * @package  UniPayment\Client
 */
class CheckIpnResponse
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
