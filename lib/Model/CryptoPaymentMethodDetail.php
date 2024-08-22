<?php

namespace UniPayment\SDK\Model;

/**
 * Crypto Payment Method Detail
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class CryptoPaymentMethodDetail extends PaymentMethodDetail
{
    private string $network;
    private string $address;

    public function getNetwork(): string
    {
        return $this->network;
    }

    public function setNetwork(string $network): void
    {
        $this->network = $network;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
}