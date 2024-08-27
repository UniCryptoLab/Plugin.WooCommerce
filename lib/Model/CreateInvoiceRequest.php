<?php

namespace UniPayment\SDK\Model;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Create Invoice Request
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class CreateInvoiceRequest
{
    /**
     * @SerializedName("app_id")
     */
    private string $appId;
    /**
     * @SerializedName("price_amount")
     */
    private float $priceAmount;
    /**
     * @SerializedName("price_currency")
     */
    private string $priceCurrency;
    /**
     * @SerializedName("pay_currency")
     */
    private string $payCurrency;
    /**
     * @SerializedName("payment_method_type")
     */
    private string $paymentMethodType;

    /**
     * @SerializedName("host_to_host_mode")
     */
    private bool $hostToHostMode;

    /**
     * @SerializedName("network")
     */
    private string $payNetwork;
    /**
     * @SerializedName("notify_url")
     */
    private string $notifyURL;
    /**
     * @SerializedName("redirect_url")
     */
    private string $redirectURL;
    /**
     * @SerializedName("order_id")
     */
    private string $orderId;
    private string $title;
    private string $description;
    private string $lang;
    /**
     * @SerializedName("ext_args")
     */
    private string $extArgs;

    /**
     * @SerializedName("confirm_speed")
     */
    private ConfirmSpeed $confirmSpeed;

    /**
     * @SerializedName("buyer_info")
     */
    private ?BuyerInfo $buyerInfo;

    public function getAppId(): ?string
    {
        return $this->appId;
    }

    public function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    public function getPriceAmount(): ?float
    {
        return $this->priceAmount;
    }

    public function setPriceAmount(float $priceAmount): void
    {
        $this->priceAmount = $priceAmount;
    }

    public function getPriceCurrency(): ?string
    {
        return $this->priceCurrency;
    }

    public function setPriceCurrency(string $priceCurrency): void
    {
        $this->priceCurrency = $priceCurrency;
    }

    public function getPayCurrency(): ?string
    {
        return $this->payCurrency;
    }

    public function setPayCurrency(string $payCurrency): void
    {
        $this->payCurrency = $payCurrency;
    }

    public function getPaymentMethodType(): ?string
    {
        return $this->paymentMethodType;
    }

    public function setPaymentMethodType(string $paymentMethodType): void
    {
        $this->paymentMethodType = $paymentMethodType;
    }

    public function isHostToHostMode(): bool
    {
        return $this->hostToHostMode;
    }

    public function setHostToHostMode(bool $hostToHostMode): void
    {
        $this->hostToHostMode = $hostToHostMode;
    }

    public function getPayNetwork(): ?string
    {
        return $this->payNetwork;
    }

    public function setPayNetwork(string $payNetwork): void
    {
        $this->payNetwork = $payNetwork;
    }

    public function getNotifyURL(): ?string
    {
        return $this->notifyURL;
    }

    public function setNotifyURL(string $notifyURL): void
    {
        $this->notifyURL = $notifyURL;
    }

    public function getRedirectURL(): ?string
    {
        return $this->redirectURL;
    }

    public function setRedirectURL(string $redirectURL): void
    {
        $this->redirectURL = $redirectURL;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }

    public function getExtArgs(): ?string
    {
        return $this->extArgs;
    }

    public function setExtArgs(string $extArgs): void
    {
        $this->extArgs = $extArgs;
    }

    public function getConfirmSpeed(): ?ConfirmSpeed
    {
        return $this->confirmSpeed;
    }

    public function setConfirmSpeed(ConfirmSpeed $confirmSpeed): void
    {
        $this->confirmSpeed = $confirmSpeed;
    }

    public function getBuyerInfo(): ?BuyerInfo
    {
        return $this->buyerInfo;
    }

    public function setBuyerInfo(?BuyerInfo $buyerInfo): void
    {
        $this->buyerInfo = $buyerInfo;
    }

}