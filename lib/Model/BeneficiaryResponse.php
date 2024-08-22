<?php

namespace UniPayment\SDK\Model;

/**
 * Beneficiary Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class BeneficiaryResponse
{
    private string $msg;
    private string $code;
    private ?Beneficiary $data = null;

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

    public function getData(): ?Beneficiary
    {
        return $this->data;
    }

    public function setData(?Beneficiary $data): void
    {
        $this->data = $data;
    }

}