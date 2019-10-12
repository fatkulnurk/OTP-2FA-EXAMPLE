<?php
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$currentcode = $_POST['code'];

if (TokenAuth6238::verify($config['secret_key'], $currentcode)) {
    if ($username == $config['username'] && $password == $config['password']) {
        echo "Code is valid \n";
    } else {
        echo "Username and password is invalid";
        login_invalid($username);
    }
} else {
    login_invalid($username);
    if ($username == $config['username'] && $password == $config['password']) {
        echo "Invalid Code \n";
    } else {
        echo "Username and password is invalid";
    }
}
echo "<hr>";
getQRCODE($config);