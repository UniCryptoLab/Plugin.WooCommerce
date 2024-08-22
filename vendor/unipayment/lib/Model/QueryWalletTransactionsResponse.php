<?php

namespace UniPayment\SDK\Model;

/**
 * Query Wallet Transactions Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class QueryWalletTransactionsResponse
{
    private string $msg;
    private string $code;
    private TransactionPageList $data;

    public function getMsg(): string
    {
        return $this->msg;
    }

    public function setMsg(string $msg): void
    {
        $this->msg = $msg;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getData(): TransactionPageList
    {
        return $this->data;
    }

    public function setData(TransactionPageList $data): void
    {
        $this->data = $data;
    }
}