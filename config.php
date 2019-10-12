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

function login_invalid($username = 'Username'){
    header('Content-Type: text/html; charset=utf-8');
    header('HTTP/1.1 401 Unauthorized');

    // write login failed in logfile for fail2ban
    $dat = date('M j H:i:s Y');
    $error_essage = "Authentication failed for: $username";
    $client_ip = $_SERVER['HTTP_CLIENT_IP']?:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?:$_SERVER['REMOTE_ADDR']);
	error_log("[$dat] [WARNING] [client: $client_ip] $error_essage\n", 3);

}