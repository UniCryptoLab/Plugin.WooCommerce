<?php

namespace UniPayment\SDK\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Payment Method
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class PaymentMethod
{
    private ?string $id = null;
    #[SerializedName('beneficiary_id')]
    private ?string $beneficiaryId = null;
    private ?string $title = null;
    #[SerializedName('transfer_method')]
    private string $transferMethod;
    private PaymentMethodDetail $detail;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getBeneficiaryId(): ?string
    {
        return $this->beneficiaryId;
    }

    public function setBeneficiaryId(?string $beneficiaryId): void
    {
        $this->beneficiaryId = $beneficiaryId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getTransferMethod(): string
    {
        return $this->transferMethod;
    }

    public function setTransferMethod(string $transferMethod): void
    {
        $this->transferMethod = $transferMethod;
    }

    public function getDetail(): PaymentMethodDetail
    {
        return $this->detail;
    }

    public function setDetail(PaymentMethodDetail $detail): void
    {
        $this->detail = $detail;
    }

}