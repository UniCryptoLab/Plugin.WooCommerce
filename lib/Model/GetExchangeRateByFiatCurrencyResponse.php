<?php

namespace UniPayment\SDK\Model;
use JMS\Serializer\Annotation\Type;

/**
 * Get Exchange Rat eBy Fiat Currency Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class GetExchangeRateByFiatCurrencyResponse
{
    private string $msg;
    private string $code;

    /**
     * @Type("array<UniPayment\SDK\Model\ExchangeRate>")
     */
    private array $data = [];

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
     * @return ExchangeRate[]
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
