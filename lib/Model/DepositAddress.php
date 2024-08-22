<?php

namespace UniPayment\SDK\Model;


/**
 * Get Deposit Address Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class DepositAddress
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