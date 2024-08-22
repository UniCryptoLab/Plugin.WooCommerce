<?php

namespace UniPayment\SDK\Model;

/**
 * Query Payment Request
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class QueryPaymentRequest
{
    private int $pageNo = 1;
    private int $pageSize = 10;
    private bool $isAsc = true;
    private ?string $fromAccountId = null;
    private ?string $toAccountId = null;
    private ?TransferMethod $transferMethod = null;
    private ?string $paymentMethodId = null;
    private ?string $cryptoAddress = null;
    private ?string $bankAccount = null;
    private ?string $assetType = null;
    private ?PaymentStatus $status = null;

    public function getPageNo(): int
    {
        return $this->pageNo;
    }

    public function setPageNo(int $pageNo): void
    {
        $this->pageNo = $pageNo;
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    public function setPageSize(int $pageSize): void
    {
        $this->pageSize = $pageSize;
    }

    public function isAsc(): bool
    {
        return $this->isAsc;
    }

    public function setIsAsc(bool $isAsc): void
    {
        $this->isAsc = $isAsc;
    }

    public function getFromAccountId(): ?string
    {
        return $this->fromAccountId;
    }

    public function setFromAccountId(?string $fromAccountId): void
    {
        $this->fromAccountId = $fromAccountId;
    }

    public function getToAccountId(): ?string
    {
        return $this->toAccountId;
    }

    public function setToAccountId(?string $toAccountId): void
    {
        $this->toAccountId = $toAccountId;
    }

    public function getTransferMethod(): ?TransferMethod
    {
        return $this->transferMethod;
    }

    public function setTransferMethod(?TransferMethod $transferMethod): void
    {
        $this->transferMethod = $transferMethod;
    }

    public function getPaymentMethodId(): ?string
    {
        return $this->paymentMethodId;
    }

    public function setPaymentMethodId(?string $paymentMethodId): void
    {
        $this->paymentMethodId = $paymentMethodId;
    }

    public function getCryptoAddress(): ?string
    {
        return $this->cryptoAddress;
    }

    public function setCryptoAddress(?string $cryptoAddress): void
    {
        $this->cryptoAddress = $cryptoAddress;
    }

    public function getBankAccount(): ?string
    {
        return $this->bankAccount;
    }

    public function setBankAccount(?string $bankAccount): void
    {
        $this->bankAccount = $bankAccount;
    }

    public function getAssetType(): ?string
    {
        return $this->assetType;
    }

    public function setAssetType(?string $assetType): void
    {
        $this->assetType = $assetType;
    }

    public function getStatus(): ?PaymentStatus
    {
        return $this->status;
    }

    public function setStatus(?PaymentStatus $status): void
    {
        $this->status = $status;
    }

    public function __toString()
    {
        // Build the query array
        $queryArray = [
            'page_no' => $this->pageNo,
            'page_size' => $this->pageSize,
            'is_asc' => $this->isAsc ? 'true' : 'false',
            'from_account_id' => $this->fromAccountId,
            'to_account_id' => $this->toAccountId,
            'transfer_method' => $this->transferMethod,
            'payment_method_id' => $this->paymentMethodId,
            'crypto_address' => $this->cryptoAddress,
            'bank_account' => $this->bankAccount,
            'asset_type' => $this->assetType,
            'status' => $this->status,
        ];

        // Create query string
        return http_build_query($queryArray);
    }

}