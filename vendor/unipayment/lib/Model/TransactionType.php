<?php

namespace UniPayment\SDK\Model;

/**
 * Transaction Type
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class TransactionType
{
    const DEPOSIT = 'DEPOSIT';
    const DEPOSITPAYMENT = 'DEPOSITPAYMENT';
    const PAYMENTFEE = 'PAYMENTFEE';
    const FEEADJUSTMENT = 'FEEADJUSTMENT';
    const ADJUSTMENTSWAP = 'ADJUSTMENTSWAP';
    const SWAPINVOICE = 'SWAPINVOICE';
    const INVOICEREFUND = 'INVOICEREFUND';
    const REFUND = 'REFUND';
    const SWAP = 'SWAP';
    const PAYMENT = 'PAYMENT';
    const ADJUSTMENT = 'ADJUSTMENT';
}