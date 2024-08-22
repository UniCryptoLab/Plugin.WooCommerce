<?php

namespace UniPayment\SDK\Model;

/**
 * Payment Reason
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class PaymentReason
{
    const INVESTMENTS = 'Investments';
    const INTERNAL_TRANSFER = 'InternalTransfer';
    const INVOICE_FOR_SERVICES_OR_GOODS = 'InvoiceForServicesOrGoods';
    const OPERATING_EXPENSE = 'OperatingExpense';
    const STAFF_COSTS = 'StaffCosts';
    const SETTLING_CLIENT_FUNDS = 'SettlingClientFunds';
    const SETTLING_TRADING_COUNTERPARTY_FUNDS = 'SettlingTradingCounterpartyFunds';
    const OTHER = 'Other';
}