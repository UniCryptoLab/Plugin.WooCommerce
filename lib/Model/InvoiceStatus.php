<?php

namespace UniPayment\SDK\Model;

/**
 * Invoice Status
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class InvoiceStatus
{
    const NEW = 'New';
    const PAID = 'Paid';
    const EXPIRED = 'Expired';
    const CONFIRMED = 'Confirmed';
    const COMPLETE = 'Complete';
    const INVALID = 'Invalid';
}