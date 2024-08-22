<?php

namespace UniPayment\SDK\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Wallet Balance
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class WalletAccount extends WalletBalance
{
    #[SerializedName('asset_type')]
    private string $assetType;
    private string $id;
    private AccountType $type;
    #[SerializedName('friendly_name')]
    private string $friendlyName;
    #[SerializedName('account_number')]
    private ?string $accountNumber = null;
    #[SerializedName('bank_account')]
    private ?BankAccount $bankAccount = null;
    private string $status;

    public function getAssetType(): string
    {
        return $this->assetType;
    }

    public function setAssetType(string $assetType): void
    {
        $this->assetType = $assetType;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getType(): AccountType
    {
        return $this->type;
    }

    public function setType(AccountType $type): void
    {
        $this->type = $type;
    }

    public function getFriendlyName(): string
    {
        return $this->friendlyName;
    }

    public function setFriendlyName(string $friendlyName): void
    {
        $this->friendlyName = $friendlyName;
    }

    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    public function setAccountNumber(?string $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    public function getBankAccount(): ?BankAccount
    {
        return $this->bankAccount;
    }

    public function setBankAccount(?BankAccount $bankAccount): void
    {
        $this->bankAccount = $bankAccount;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
