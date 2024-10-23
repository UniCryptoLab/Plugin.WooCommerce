<?php

namespace UniPayment\SDK\Model;

/**
 * Accept Quote Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class ExchangeOrderStatus
{
    const PLACED = 'PLACED';
    const PROCESSING = 'PROCESSING';
    const COMPLETED = 'COMPLETED';
    const FAILED = 'FAILED';
}