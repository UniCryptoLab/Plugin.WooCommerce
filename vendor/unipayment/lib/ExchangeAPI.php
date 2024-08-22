<?php
/**
 * Exchange API
 */

namespace UniPayment\SDK;

use UniPayment\SDK\Model\AcceptQuoteResponse;
use UniPayment\SDK\Model\GetExchangeOrderResponse;
use UniPayment\SDK\Model\GetQuoteRequest;
use UniPayment\SDK\Model\GetQuoteResponse;
use UniPayment\SDK\Model\QueryExchangeOrdersRequest;
use UniPayment\SDK\Model\QueryExchangeOrdersResponse;
use UniPayment\SDK\Utils\JsonSerializer;

/**
 * Exchange API
 */
final class ExchangeAPI extends BaseClient
{
    /**
     * @throws UnipaymentSDKException
     */
    public function getQuote(GetQuoteRequest $getQuoteRequest): GetQuoteResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/exchange/quote?' . $getQuoteRequest;
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], GetQuoteResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function acceptQuote(string $quoteId): AcceptQuoteResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/exchange/quote/' . $quoteId;
        $response = $this->getApiClient()->put($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], AcceptQuoteResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getExchangeOrderByOrderId(string $orderId): GetExchangeOrderResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/exchange/orders/' . $orderId;
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], GetExchangeOrderResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function queryExchangeOrders(QueryExchangeOrdersRequest $exchangeOrdersRequest): QueryExchangeOrdersResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/exchange/orders?' . $exchangeOrdersRequest;
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], QueryExchangeOrdersResponse::class);
    }


}