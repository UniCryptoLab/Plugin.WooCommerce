<?php

namespace UniPayment\SDK;

use Exception;

abstract class BaseClient
{
    private ApiClient $apiClient;
    private Configuration $configuration;
    private OauthTokenAPI $oauthTokenAPI;

    public function __construct(Configuration $configuration)
    {
        $this->apiClient = new ApiClient($configuration);
        $this->configuration = $configuration;
        $this->oauthTokenAPI = new OauthTokenAPI($configuration);
    }

    /**
     * @return ApiClient
     */
    public function getApiClient(): ApiClient
    {
        return $this->apiClient;
    }

    /**
     * @return Configuration
     */
    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    /**
     * @return string
     * @throws UnipaymentSDKException
     */
    public function getAccessToken(): string
    {
        $accessToken = TokenCache::get('access_token');
        if ($accessToken == null || !self::isValid($accessToken)) {
            $tokenResponse = $this->oauthTokenAPI->getAccessToken();
            $accessToken = $tokenResponse->getAccessToken();
            TokenCache::set('access_token', $tokenResponse->getAccessToken(), $tokenResponse->getExpiresIn());
        }
        return $accessToken;
    }

    /**
     * Validate Access Token
     * @param string $token
     * @return bool
     */
    public static function isValid(string $token): bool
    {
        if (empty($token)) {
            return false;
        }

        $parts = explode('.', $token);
        if (count($parts) !== 3) {
            return false;
        }

        try {
            $decodedPart2 = base64_decode($parts[1]);
            $dataMap = json_decode($decodedPart2, true);

            if (!isset($dataMap['exp'])) {
                return false;
            }

            $exp = (int)$dataMap['exp'];
            $expInMillis = $exp * 1000;
            error_log("Access Token expires on: " . date('Y-m-d H:i:s', $expInMillis / 1000));

            $currentMills = round(microtime(true) * 1000);
            return $expInMillis > $currentMills;
        } catch (Exception $e) {
            error_log("Invalid token: " . $token . " - " . $e->getMessage());
            return false;
        }
    }
}