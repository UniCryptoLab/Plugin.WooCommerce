<?php
/**
 * Payment API
 */

namespace UniPayment\SDK;

use UniPayment\SDK\Model\CreatePaymentRequest;
use UniPayment\SDK\Model\CreatePaymentResponse;
use UniPayment\SDK\Model\GetPaymentByIdResponse;
use UniPayment\SDK\Model\PaymentFeeResponse;
use UniPayment\SDK\Model\PaymentResponse;
use UniPayment\SDK\Model\QueryPaymentRequest;
use UniPayment\SDK\Model\QueryPaymentResponse;
use UniPayment\SDK\Utils\JsonSerializer;

/**
 * Payment API
 */
final class PaymentAPI extends BaseClient
{
    /**
     * @throws UnipaymentSDKException
     */
    public function createPayment(CreatePaymentRequest $createPaymentRequest): CreatePaymentResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/payments';
        $response = $this->getApiClient()->post($endpoint, $headers, JsonSerializer::toJson($createPaymentRequest));
        return JsonSerializer::fromJSON($response['response'], CreatePaymentResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getPaymentById(string $paymentId): GetPaymentByIdResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/payments/' . $paymentId;
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], GetPaymentByIdResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function confirmPayment(string $paymentId): PaymentResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/payments/' . $paymentId . '/confirm';
        $response = $this->getApiClient()->put($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], PaymentResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function cancelPayment(string $paymentId): PaymentResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/payments/' . $paymentId . '/cancel';
        $response = $this->getApiClient()->put($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], PaymentResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function queryPayments(QueryPaymentRequest $queryPaymentRequest): QueryPaymentResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/payments?' . $queryPaymentRequest;
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], QueryPaymentResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getPaymentFee(string $assetType): PaymentFeeResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/payments/fee?asset_type=' . $assetType;
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], PaymentFeeResponse::class);
    }
}