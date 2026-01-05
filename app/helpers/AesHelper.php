<?php

namespace App\Helpers;

class AesHelper
{
    private static function key()
    {
        return hash('sha256', env('KEY_AES'));
    }

    public static function encrypt($plain)
    {
        if ($plain === null) return null;

        $iv = random_bytes(16);
        $cipher = openssl_encrypt(
            $plain,
            'AES-256-CBC',
            self::key(),
            OPENSSL_RAW_DATA,
            $iv
        );

        return base64_encode($iv . $cipher);
    }

    public static function decrypt($encrypted, $key)
    {
        if ($encrypted === null) return null;

        $key = hash('sha256', $key);

        $data = base64_decode($encrypted);
        $iv = substr($data, 0, 16);
        $cipher = substr($data, 16);

        return openssl_decrypt(
            $cipher,
            'AES-256-CBC',
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );
    }


}