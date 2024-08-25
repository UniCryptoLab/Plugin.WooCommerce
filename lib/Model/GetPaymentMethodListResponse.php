<?php

namespace UniPayment\SDK\Model;
use JMS\Serializer\Annotation\Type;

/**
 * Get Payment Method List Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class GetPaymentMethodListResponse
{
    private string $code;
    private string $msg;
    /**
     * @Type("array<UniPayment\SDK\Model\PaymentMethod>")
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
     * @return PaymentMethod[]
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