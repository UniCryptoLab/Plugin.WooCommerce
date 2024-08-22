<?php

namespace UniPayment\SDK;

use UniPayment\SDK\Model\ApiResponse;
use UniPayment\SDK\Model\UpdateNotifyUrlRequest;
use UniPayment\SDK\Model\UpdateSecretKeyRequest;
use UniPayment\SDK\Utils\JsonSerializer;

/**
 * Beneficiary API
 */
final class WebhookAPI extends BaseClient
{

    /**
     * @throws UnipaymentSDKException
     */
    public function updateNotifyUrl(UpdateNotifyUrlRequest $updateNotifyUrlRequest): ApiResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/webhook/notify-url';
        $response = $this->getApiClient()->post($endpoint, $headers, JsonSerializer::toJson($updateNotifyUrlRequest));
        return JsonSerializer::fromJSON($response['response'], ApiResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function updateSecretKey(UpdateSecretKeyRequest $updateSecretKeyRequest): ApiResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/webhook/secret-key';
        $response = $this->getApiClient()->post($endpoint, $headers, JsonSerializer::toJson($updateSecretKeyRequest));
        return JsonSerializer::fromJSON($response['response'], ApiResponse::class);
    }

}