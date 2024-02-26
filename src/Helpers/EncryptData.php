<?php
namespace Helpers;

class EncryptData
{
    public static function encryptPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function verifyPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }
}