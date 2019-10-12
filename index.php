<?php
include "config.php";
login_invalid();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
</head>
<body>
<form method="post" action="validate.php">
    Username:<br>
    <input type="text" name="username"><br>
    Password: <br>
    <input type="password" name="password"><br>
    OTP: <br>
    <input type="text" name="code"><br>
    <p>
        <button>SUBMIT</button>
    </p>
</form>
<hr>
username: saya <br>
password: saya
<hr>
Cara mendapatkan OTP:
    <li>Install aplikasi 2FA (Bebas apa saja)</li>
    <li>Tambahkan login baru, namanya bebas apa saja.</li>
    <li>Masukan scret key <?php echo $config['secret_key'];?></li>
    <li>Atau, kalau tidak ingin ribet</li>
    <li>Scan kode QR dibawah ini, langsung tergenerate semua</li>
</ul>
<?php getQRCODE($config); ?>
</body>
</html>