<?php

namespace UniPayment\SDK\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Payment Method Detail
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class PaymentMethodDetail
{
    private ?string $id;
    #[SerializedName('asset_type')]
    private string $assetType;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getAssetType(): string
    {
        return $this->assetType;
    }

    public function setAssetType(string $assetType): void
    {
        $this->assetType = $assetType;
    }
}