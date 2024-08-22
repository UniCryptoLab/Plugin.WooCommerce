<?php

namespace UniPayment\SDK\Model;

/**
 * Transaction Data
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class TransactionDetail
{
    private ?string $network = null;
    private ?string $reference = null;
    private ?string $senderIBAN = null;
    private ?string $senderName = null;
    private ?string $beneficiaryIBAN = null;
    private ?string $beneficiaryName = null;
    private ?string $remoteTransactionId = null;
    private ?string $senderAccountNumber = null;
    private ?string $beneficiaryAccountNumber = null;

    public function getNetwork(): ?string
    {
        return $this->network;
    }

    public function setNetwork(?string $network): void
    {
        $this->network = $network;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    public function getSenderIBAN(): ?string
    {
        return $this->senderIBAN;
    }

    public function setSenderIBAN(?string $senderIBAN): void
    {
        $this->senderIBAN = $senderIBAN;
    }

    public function getSenderName(): ?string
    {
        return $this->senderName;
    }

    public function setSenderName(?string $senderName): void
    {
        $this->senderName = $senderName;
    }

    public function getBeneficiaryIBAN(): ?string
    {
        return $this->beneficiaryIBAN;
    }

    public function setBeneficiaryIBAN(?string $beneficiaryIBAN): void
    {
        $this->beneficiaryIBAN = $beneficiaryIBAN;
    }

    public function getBeneficiaryName(): ?string
    {
        return $this->beneficiaryName;
    }

    public function setBeneficiaryName(?string $beneficiaryName): void
    {
        $this->beneficiaryName = $beneficiaryName;
    }

    public function getRemoteTransactionId(): ?string
    {
        return $this->remoteTransactionId;
    }

    public function setRemoteTransactionId(?string $remoteTransactionId): void
    {
        $this->remoteTransactionId = $remoteTransactionId;
    }

    public function getSenderAccountNumber(): ?string
    {
        return $this->senderAccountNumber;
    }

    public function setSenderAccountNumber(?string $senderAccountNumber): void
    {
        $this->senderAccountNumber = $senderAccountNumber;
    }

    public function getBeneficiaryAccountNumber(): ?string
    {
        return $this->beneficiaryAccountNumber;
    }

    public function setBeneficiaryAccountNumber(?string $beneficiaryAccountNumber): void
    {
        $this->beneficiaryAccountNumber = $beneficiaryAccountNumber;
    }
}