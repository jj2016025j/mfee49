<?php
$host = 'localhost'; // 或者是數據庫服務器的IP地址
$user = 'root';
$pass = 'j19981116';
$db   = 'test';
$port = 3307;
$mysql = new mysqli($host, $user, $pass, $db);
$mysql->set_charset('UTF-8');

// 檢查連接
if ($mysql->connect_error) {
    die("連接失敗: " . $mysql->connect_error);
}
echo "連接成功";
$sql = 'INSERT INTO cust (cname,tel,dd)' . 'VALUES("bard","123","1998-11-16")';
echo var_dump($mysql->connect_error);
// $mysql2 = new mysqli($host, $user, $pass, $db, $port);
// var_dump($mysql2->connect_error);
if ($mysql->query($sql)) {
    echo 'OK';
} else {
    echo 'XX';
}
