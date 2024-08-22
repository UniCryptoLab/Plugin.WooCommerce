<?php

namespace UniPayment\SDK\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Update Secret Key Request
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class UpdateSecretKeyRequest
{
    #[SerializedName('secret_key')]
    private string $secretKey;

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    public function setSecretKey(string $secretKey): void
    {
        $this->secretKey = $secretKey;
    }

}