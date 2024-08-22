<?php

namespace UniPayment\SDK;

class TokenCache
{
    private static array $cache = [];

    public static function set($key, $value, $ttl = 3600): void
    {
        $expiry = time() + $ttl;
        self::$cache[$key] = ['expiry' => $expiry, 'value' => $value];
    }

    public static function get($key)
    {
        if (!isset(self::$cache[$key])) {
            return null;
        }

        $cachedItem = self::$cache[$key];
        if (time() > $cachedItem['expiry']) {
            unset(self::$cache[$key]);
            return null;
        }

        return $cachedItem['value'];
    }

    public static function delete($key): void
    {
        if (isset(self::$cache[$key])) {
            unset(self::$cache[$key]);
        }
    }

    public static function clear(): void
    {
        self::$cache = [];
    }
}