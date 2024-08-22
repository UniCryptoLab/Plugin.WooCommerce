<?php
/**
 * Configuration
 */

namespace UniPayment\SDK;

use UniPayment\SDK\Model\CheckIpnResponse;
use UniPayment\SDK\Model\GetCurrenciesResponse;
use UniPayment\SDK\Model\GetExchangeRateByCurrencyPairResponse;
use UniPayment\SDK\Model\GetExchangeRateByFiatCurrencyResponse;
use UniPayment\SDK\Model\PingResponse;
use UniPayment\SDK\Model\QueryIpsResponse;
use UniPayment\SDK\Utils\JsonSerializer;

/**
 * Common API
 */
final class CommonAPI extends BaseClient
{
    /**
     * @throws UnipaymentSDKException
     */
    public function ping($usePost = False): PingResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/ping';
        if ($usePost) {
            $response = $this->getApiClient()->post($endpoint, $headers);
        } else {
            $response = $this->getApiClient()->get($endpoint, $headers);
        }
        return JsonSerializer::fromJSON($response['response'], PingResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getCurrencies(): GetCurrenciesResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/currencies';
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], GetCurrenciesResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function queryIps(): QueryIpsResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/ips';
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], QueryIpsResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getExchangeRateByCurrencyPair(string $fiatCurrency, string $cryptoCurrency): GetExchangeRateByCurrencyPairResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/rates/' . $fiatCurrency . '/' . $cryptoCurrency;
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], GetExchangeRateByCurrencyPairResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getExchangeRateByFiatCurrency(string $fiatCurrency): GetExchangeRateByFiatCurrencyResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/rates/' . $fiatCurrency;
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], GetExchangeRateByFiatCurrencyResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function checkIpn(string $body): CheckIpnResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/ipn';
        $response = $this->getApiClient()->post($endpoint, $headers, $body);
        return JsonSerializer::fromJSON($response['response'], CheckIpnResponse::class);
    }

}