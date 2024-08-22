<?php
/**
 * Configuration
 */

namespace UniPayment\SDK;

use UniPayment\SDK\Model\TokenResponse;
use UniPayment\SDK\Utils\JsonSerializer;

/**
 * Oauth Token API
 */
final class OauthTokenAPI
{
    private ApiClient $apiClient;
    private Configuration $configuration;

    public function __construct(Configuration $configuration)
    {
        $this->apiClient = new ApiClient($configuration);
        $this->configuration = $configuration;
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getAccessToken(): TokenResponse
    {
        $endpoint = "/connect/token";
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json'
        ];
        $formParams = [
            'grant_type' => 'client_credentials',
            'client_id' => $this->configuration->getClientId(),
            'client_secret' => $this->configuration->getClientSecret()
        ];
        $response = $this->apiClient->post($endpoint, $headers, null, $formParams);
        return JsonSerializer::fromJSON($response['response'], TokenResponse::class);
    }

}