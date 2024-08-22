<?php
/**
 * Wallet API
 */

namespace UniPayment\SDK;

use UniPayment\SDK\Model\GetDepositAddressResponse;
use UniPayment\SDK\Model\GetDepositBankAccountResponse;
use UniPayment\SDK\Model\GetWalletAccountsResponse;
use UniPayment\SDK\Model\GetWalletBalancesResponse;
use UniPayment\SDK\Model\QueryWalletTransactionsRequest;
use UniPayment\SDK\Model\QueryWalletTransactionsResponse;
use UniPayment\SDK\Utils\JsonSerializer;

/**
 * Wallet API
 */
final class WalletAPI extends BaseClient
{
    /**
     * @throws UnipaymentSDKException
     */
    public function getBalances(): GetWalletBalancesResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/wallet/balances';
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], GetWalletBalancesResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getAccounts(): GetWalletAccountsResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/wallet/accounts';
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], GetWalletAccountsResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function queryTransactions(string $accountId, QueryWalletTransactionsRequest $queryWalletTransactionsRequest): QueryWalletTransactionsResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/wallet/accounts/' . $accountId . '/transactions?' . $queryWalletTransactionsRequest;
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], QueryWalletTransactionsResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getDepositAddress(string $accountId): GetDepositAddressResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/wallet/accounts/' . $accountId . '/deposit/address';
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], GetDepositAddressResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getDepositBankAccount(string $accountId): GetDepositBankAccountResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/wallet/accounts/' . $accountId . '/deposit/bank-account';
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], GetDepositBankAccountResponse::class);
    }
}