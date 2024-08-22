<?php

namespace UniPayment\SDK\Model;

/**
 * Get Wallet Balances Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class GetWalletBalancesResponse
{
    private string $msg;
    private string $code;

    /**
     * @var WalletBalance[]
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
     * @return WalletBalance[]
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
