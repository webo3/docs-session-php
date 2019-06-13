<?php
class Encryption {

    public static function encrypt($data, $key, $method='AES-192-CBC'){
        $key = md5($key);
        $length = openssl_cipher_iv_length($method);
        $iv = substr($key, 0, $length);
        return base64_encode(trim(openssl_encrypt($data, $method, $key, false, $iv)));
    }

    public static function decrypt($data, $key, $method='AES-192-CBC'){
        $key = md5($key);
        $length = openssl_cipher_iv_length($method);
        $iv = substr($key, 0, $length);
        return trim(openssl_decrypt(base64_decode($data), $method, $key, false, $iv));
    }
}