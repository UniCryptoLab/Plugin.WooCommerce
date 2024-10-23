<?php

namespace UniPayment\SDK\Model;

/**
 * Payment Status
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class PaymentStatus
{
    const PENDING = 'PENDING';
    const CANCELED = 'CANCELED';
    const CONFIRMED = 'CONFIRMED';
    const REJECTED = 'REJECTED';
    const APPROVED = 'APPROVED';
    const COMPLETED = 'COMPLETED';
    const FAILED = 'FAILED';
}