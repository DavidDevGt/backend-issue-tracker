<?php

namespace Helpers;

use Dotenv\Dotenv;

class EncryptData
{
    public static function getSecretKey()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
        return $_ENV['SECRET_KEY'];
    }

    public static function getEncryptionMethod()
    {
        return $_ENV['ENCRYPTION_METHOD'];
    }

    public static function encryptPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function verifyPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }

    public static function encryptData($data)
    {
        $encryptionKey = openssl_digest(self::getSecretKey(), 'SHA256', TRUE);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::getEncryptionMethod()));
        $encryptedData = openssl_encrypt(json_encode($data), self::getEncryptionMethod(), $encryptionKey, 0, $iv);
        return base64_encode($encryptedData . '::' . $iv);
    }

    public static function decryptData($data)
    {
        $encryptionKey = openssl_digest(self::getSecretKey(), 'SHA256', TRUE);
        list($encryptedData, $iv) = explode('::', base64_decode($data), 2);
        return json_decode(openssl_decrypt($encryptedData, self::getEncryptionMethod(), $encryptionKey, 0, $iv), true);
    }

    public static function generateKey($length = 32)
    {
        return bin2hex(random_bytes($length));
    }

    public static function hashData($data)
    {
        return hash('sha256', $data);
    }

    public static function compareHash($knownHash, $userHash)
    {
        return hash_equals($knownHash, $userHash);
    }

    public static function generateIV()
    {
        return openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::getEncryptionMethod()));
    }
}
