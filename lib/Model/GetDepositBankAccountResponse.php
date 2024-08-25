<?php

namespace UniPayment\SDK\Model;
use JMS\Serializer\Annotation\Type;

/**
 * Get Deposit Bank Account Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class GetDepositBankAccountResponse
{
    private string $msg;
    private string $code;

    /**
     *@Type("array<UniPayment\SDK\Model\DepositBankAccount>")
     */
    private array $data;

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

    /**
     * @return DepositBankAccount[]
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }
}