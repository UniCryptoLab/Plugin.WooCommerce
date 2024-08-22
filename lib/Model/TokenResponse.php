<?php

namespace UniPayment\SDK\Model;

/**
 * Token Response
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class TokenResponse
{
    private string $access_token;
    private int $expires_in;
    private string $token_type;
    private string $scope;

    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    public function setAccessToken(string $access_token): void
    {
        $this->access_token = $access_token;
    }

    public function getExpiresIn(): int
    {
        return $this->expires_in;
    }

    public function setExpiresIn(int $expires_in): void
    {
        $this->expires_in = $expires_in;
    }

    public function getTokenType(): string
    {
        return $this->token_type;
    }

    public function setTokenType(string $token_type): void
    {
        $this->token_type = $token_type;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function setScope(string $scope): void
    {
        $this->scope = $scope;
    }

}