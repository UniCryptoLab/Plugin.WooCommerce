<?php

namespace UniPayment\SDK\Model;

/**
 * Bank Account
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class BankAccount
{
    /**
     * @SerializedName("bank_name")
     */
    private string $bankName;
    /**
     * @SerializedName("bank_account")
     */
    private string $bankAccount;
    /**
     * @SerializedName("bank_bic")
     */
    private string $bankBic;

    public function getBankName(): string
    {
        return $this->bankName;
    }

    public function setBankName(string $bankName): void
    {
        $this->bankName = $bankName;
    }

    public function getBankAccount(): string
    {
        return $this->bankAccount;
    }

    public function setBankAccount(string $bankAccount): void
    {
        $this->bankAccount = $bankAccount;
    }

    public function getBankBic(): string
    {
        return $this->bankBic;
    }

    public function setBankBic(string $bankBic): void
    {
        $this->bankBic = $bankBic;
    }

}