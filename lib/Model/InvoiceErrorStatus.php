<?php

namespace UniPayment\SDK\Model;

/**
 * Invoice Error Status
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class InvoiceErrorStatus
{
    const NONE = 'None';
    const PAID_LATE = 'PaidLate';
    const PAID_PARTIAL = 'PaidPartial';
    const PAID_OVER = 'PaidOver';
    const MARKED = 'Marked';
}