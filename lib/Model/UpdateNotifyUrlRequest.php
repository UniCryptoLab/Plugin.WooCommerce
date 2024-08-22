<?php

namespace UniPayment\SDK\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Update Notify Url Request
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class UpdateNotifyUrlRequest
{
    /**
     * @SerializedName("notify_url")
     */
    private string $updateNotifyUrl;

    public function getUpdateNotifyUrl(): string
    {
        return $this->updateNotifyUrl;
    }

    public function setUpdateNotifyUrl(string $updateNotifyUrl): void
    {
        $this->updateNotifyUrl = $updateNotifyUrl;
    }

}