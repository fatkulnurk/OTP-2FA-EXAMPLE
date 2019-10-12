<?php
require_once 'rfc6238.php';

$config = [
    'username' => 'saya',
    'password' => 'saya',
    'domain' => '',
    'secret_key' => 'GEZDGNBVGY3TQOJQGEZDGNBVGY3TQOJQ',
    'issuer' => 'DIBUMICOM'
];

function getQRCODE($config) {
    print sprintf('<img src="%s"/>',TokenAuth6238::getBarCodeUrl($config['username'], $config['domain'], $config['secret_key'], $config['issuer']));
}