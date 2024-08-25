<?php

namespace UniPayment\SDK\Model;
use JMS\Serializer\Annotation\Type;

/**
 * Payment Fee Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class PaymentFeeResponse
{
    private string $code;
    private string $msg;

    /**
     * @Type("array<UniPayment\SDK\Model\PaymentFee>")
     */
    private array $data;

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

    /**
     * @return PaymentFee[]
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