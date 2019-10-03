# OneShop ระบบร้านค้า MCPE / PC

---
การ Config File _config.php
```php
<?php
$_config = array();

// Config ฐานข้อมูล
$_config['db_host'] = 'localhost'; // โฮสต์ฐานข้อมูล default localhost

$_config['db_database'] = 'mshop'; // ชื่อฐานข้อมูล default mshop

$_config['db_user'] = 'root'; // username ฐานข้อมูล default root

$_config['db_password'] = ''; // password ฐานข้อมูล default ""

// Config Rcon
$_config['mc_host'] = '165.22.254.47'; // IP เซิร์ฟเวอร์

$_config['mc_port'] = '19132'; // PORT เซิร์ฟเวอร์

$_config['mc_password'] = 'ikR/nyMW5p'; // Rcon Password เซิร์ฟเวอร์

$_config['mc_timeout'] = '300'; // TimeOut default 300 = 5 Minute

// Config TrueWalletAPI
$tmapi_user="xxx"; // Username ของเว็บไซต์ tmweasy.com

$tmpapi_assword="xxx"; // Password ของเว็บไซต์ tmweasy.com

$truewall_email="xxx@gmail.com"; // Email TrueWallet

$truewall_phone="xxx"; // เบอร์โทรศัพท์ที่ใช้ของ TrueWallet

$truepassword="xxx]"; // TrueWallet Password แต่ต้องเอาไปเข้ารหัสก่อนที่ tmweasy.com

```
