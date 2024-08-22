<?php

namespace UniPayment\SDK\Model;

/**
 * Internal Payment Method Detail
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class InternalPaymentMethodDetail extends PaymentMethodDetail
{
    private string $uid;

    public function getUid(): string
    {
        return $this->uid;
    }

    public function setUid(string $uid): void
    {
        $this->uid = $uid;
    }
}