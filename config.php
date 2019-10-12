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
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function login_invalid($username = 'Username'){
    header('Content-Type: text/html; charset=utf-8');
    header('HTTP/1.1 401 Unauthorized');

    // write login failed in logfile for fail2ban
    $dat = date('M j H:i:s Y');
    $error_message = "Authentication failed for: $username";

    $client_ip = get_client_ip();
	error_log("[$dat] [WARNING] [client: $client_ip] $error_message\n");
}