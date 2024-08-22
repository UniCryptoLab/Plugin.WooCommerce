<?php

namespace UniPayment\SDK\Model;

/**
 * Query Beneficiary Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class QueryBeneficiaryResponse
{
    private string $code;
    private string $msg;
    private BeneficiaryPageList $data;

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

    public function getData(): BeneficiaryPageList
    {
        return $this->data;
    }

    public function setData(BeneficiaryPageList $data): void
    {
        $this->data = $data;
    }

}