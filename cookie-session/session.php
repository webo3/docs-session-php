<?php

require_once('encryption.php');

class CookieSessionHandler
{
    private $key;

    public function __construct($key) {
        $this->key = $key;
    }

    function open($path, $name) {
        return true;
    }

    function close() {
        return true;
    }

    function read($id) {
        $cookie_name = 'sess_'.$id;
        return !empty($_COOKIE[$cookie_name]) ? Encryption::decrypt($_COOKIE[$cookie_name], $this->key) : '';
    }

    function write($id, $data) {
        $cookie_name = 'sess_'.$id;
        return setcookie($cookie_name, Encryption::encrypt($data, $this->key));
    }

    function destroy($id) {
        $cookie_name = 'sess_'.$id;
        return setcookie($cookie_name, '');
    }

    function gc($maxlifetime) {
        return true;
    }
}

$handler = new CookieSessionHandler($config['private_key']);
session_set_save_handler(
    array($handler, 'open'),
    array($handler, 'close'),
    array($handler, 'read'),
    array($handler, 'write'),
    array($handler, 'destroy'),
    array($handler, 'gc')
    );

// the following prevents unexpected effects when using objects as save handlers
register_shutdown_function('session_write_close');

session_start();
// proceed to set and retrieve values by key from $_SESSION