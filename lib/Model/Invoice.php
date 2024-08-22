<?php

namespace UniPayment\SDK\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;
use DateTime;

/**
 * Invoice
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class Invoice
{
    /**
     * @SerializedName("app_id")
     */
    private string $appId;
    /**
     * @SerializedName("invoice_id")
     */
    private string $invoiceId;
    /**
     * @SerializedName("payment_method_type")
     */
    private string $paymentMethodType;

    /**
     * @SerializedName("host_to_host_mode")
     */
    private bool $hostToHostMode;
    /**
     * @SerializedName("order_id")
     */
    private string $orderId;
    /**
     * @SerializedName("price_amount")
     */
    private float $priceAmount;
    /**
     * @SerializedName("price_currency")
     */
    private string $priceCurrency;
    private ?string $network = null;
    private ?string $address = null;
    /**
     * @SerializedName("pay_amount")
     */
    private ?float $payAmount;
    /**
     * @SerializedName("pay_currency")
     */
    private ?string $payCurrency;
    /**
     * @SerializedName("exchange_rate")
     */
    private ?float $exchangeRate;
    /**
     * @SerializedName("paid_amount")
     */
    private ?float $paidAmount;
    /**
     * @SerializedName("refunded_price_amount")
     */
    private ?float $refundedPriceAmount;
    /**
     * @SerializedName("create_time")
     */
    private string $createTime;
    /**
     * @SerializedName("expiration_time")
     */
    private string $expirationTime;
    /**
     * @SerializedName("confirm_speed")
     */
    private string $confirmSpeed;
    private string $status;
    /**
     * @SerializedName("error_status")
     */
    private string $errorStatus;
    /**
     * @SerializedName("invoice_url")
     */
    private ?string $invoiceUrl;

    /**
     * @SerializedName("host_to_host_data")
     */
    private ?array $hostToHostData = null;

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
    public function getPaymentMethodType(): string
    {
        return $this->paymentMethodType;
    }

    public function setPaymentMethodType(string $paymentMethodType): void
    {
        $this->paymentMethodType = $paymentMethodType;
    }

    public function isHostToHostMode(): ?bool
    {
        return $this->hostToHostMode;
    }

    public function setHostToHostMode(?bool $hostToHostMode): void
    {
        $this->hostToHostMode = $hostToHostMode;
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
    public function getCreateTime(): string
    {
        return $this->createTime;
    }

    public function setCreateTime(string $createTime): void
    {
        $this->createTime = $createTime;
    }

    /**
     * @return string
     */
    public function getExpirationTime(): string
    {
        return $this->expirationTime;
    }

    public function setExpirationTime(string $expirationTime): void
    {
        $this->expirationTime = $expirationTime;
    }

    /**
     * @return ConfirmSpeed
     */
    public function getConfirmSpeed(): string
    {
        return $this->confirmSpeed;
    }

    public function setConfirmSpeed(string $confirmSpeed): void
    {
        $this->confirmSpeed = $confirmSpeed;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getErrorStatus(): string
    {
        return $this->errorStatus;
    }

    public function setErrorStatus(string $errorStatus): void
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

    public function getHostToHostData(): ?array
    {
        return $this->hostToHostData;
    }

    public function setHostToHostData(?array $hostToHostData): void
    {
        $this->hostToHostData = $hostToHostData;
    }

}
