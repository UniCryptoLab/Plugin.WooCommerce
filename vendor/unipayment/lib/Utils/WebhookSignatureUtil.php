<?php

namespace UniPayment\SDK\Utils;

class WebhookSignatureUtil
{
    public static function isValid($payload, $secretKey, $signatureToVerify): bool
    {
        return $signatureToVerify == self::generateSignature($payload, $secretKey);
    }

    public static function generateSignature($payload, $secretKey): string
    {
        // Create an HMAC-SHA256 hash
        $hash_bytes = hash_hmac('sha256', $payload, $secretKey, true);

        // Encode the hash in Base64
        return base64_encode($hash_bytes);
    }
}