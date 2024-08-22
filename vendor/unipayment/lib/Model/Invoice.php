<?php

namespace UniPayment\SDK\Model;

use DateTime;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Invoice
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class Invoice
{
    #[SerializedName('app_id')]
    private string $appId;
    #[SerializedName('invoice_id')]
    private string $invoiceId;
    #[SerializedName('payment_method_type')]
    private mixed $paymentMethodType;
    #[SerializedName('order_id')]
    private string $orderId;
    #[SerializedName('price_amount')]
    private float $priceAmount;
    #[SerializedName('price_currency')]
    private string $priceCurrency;
    private ?string $network = null;
    private ?string $address = null;
    #[SerializedName('pay_amount')]
    private ?float $payAmount;
    #[SerializedName('pay_currency')]
    private ?string $payCurrency;
    #[SerializedName('exchange_rate')]
    private ?float $exchangeRate;
    #[SerializedName('paid_amount')]
    private ?float $paidAmount;
    #[SerializedName('refunded_price_amount')]
    private ?float $refundedPriceAmount;
    #[SerializedName('create_time')]
    private mixed $createTime;
    #[SerializedName('expiration_time')]
    private mixed $expirationTime;
    #[SerializedName('confirm_speed')]
    private mixed $confirmSpeed;
    private mixed $status;
    #[SerializedName('error_status')]
    private mixed $errorStatus;
    #[SerializedName('invoice_url')]
    private ?string $invoiceUrl;

    public function getAppId(): string
    {
        return $this->appId;
    }

    public function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    public function getInvoiceId(): string
    {
        return $this->invoiceId;
    }

    public function setInvoiceId(string $invoiceId): void
    {
        $this->invoiceId = $invoiceId;
    }

    /**
     * @return PaymentMethodType
     */
    public function getPaymentMethodType(): mixed
    {
        return $this->paymentMethodType;
    }

    public function setPaymentMethodType(mixed $paymentMethodType): void
    {
        $this->paymentMethodType = $paymentMethodType;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getPriceAmount(): float
    {
        return $this->priceAmount;
    }

    public function setPriceAmount(float $priceAmount): void
    {
        $this->priceAmount = $priceAmount;
    }

    public function getPriceCurrency(): string
    {
        return $this->priceCurrency;
    }

    public function setPriceCurrency(string $priceCurrency): void
    {
        $this->priceCurrency = $priceCurrency;
    }

    public function getNetwork(): ?string
    {
        return $this->network;
    }

    public function setNetwork(?string $network): void
    {
        $this->network = $network;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    public function getPayAmount(): ?float
    {
        return $this->payAmount;
    }

    public function setPayAmount(?float $payAmount): void
    {
        $this->payAmount = $payAmount;
    }

    public function getPayCurrency(): ?string
    {
        return $this->payCurrency;
    }

    public function setPayCurrency(?string $payCurrency): void
    {
        $this->payCurrency = $payCurrency;
    }

    public function getExchangeRate(): ?float
    {
        return $this->exchangeRate;
    }

    public function setExchangeRate(?float $exchangeRate): void
    {
        $this->exchangeRate = $exchangeRate;
    }

    public function getPaidAmount(): ?float
    {
        return $this->paidAmount;
    }

    public function setPaidAmount(?float $paidAmount): void
    {
        $this->paidAmount = $paidAmount;
    }

    public function getRefundedPriceAmount(): ?float
    {
        return $this->refundedPriceAmount;
    }

    public function setRefundedPriceAmount(?float $refundedPriceAmount): void
    {
        $this->refundedPriceAmount = $refundedPriceAmount;
    }

    /**
     * @return DateTime
     */
    public function getCreateTime(): mixed
    {
        return $this->createTime;
    }

    public function setCreateTime(mixed $createTime): void
    {
        $this->createTime = $createTime;
    }

    /**
     * @return DateTime
     */
    public function getExpirationTime(): mixed
    {
        return $this->expirationTime;
    }

    public function setExpirationTime(mixed $expirationTime): void
    {
        $this->expirationTime = $expirationTime;
    }

    /**
     * @return ConfirmSpeed
     */
    public function getConfirmSpeed(): mixed
    {
        return $this->confirmSpeed;
    }

    public function setConfirmSpeed(mixed $confirmSpeed): void
    {
        $this->confirmSpeed = $confirmSpeed;
    }

    public function getStatus(): mixed
    {
        return $this->status;
    }

    public function setStatus(mixed $status): void
    {
        $this->status = $status;
    }

    public function getErrorStatus(): mixed
    {
        return $this->errorStatus;
    }

    public function setErrorStatus(mixed $errorStatus): void
    {
        $this->errorStatus = $errorStatus;
    }

    public function getInvoiceUrl(): ?string
    {
        return $this->invoiceUrl;
    }

    public function setInvoiceUrl(?string $invoiceUrl): void
    {
        $this->invoiceUrl = $invoiceUrl;
    }

}
