<?php
$host = 'localhost'; 
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
if ($mysql->query($sql)) {
    echo 'OK';
} else {
    echo 'XX';
}

if (!$mysql->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysql->error);
} else {
    printf("Current character set: %s\n", $mysql->character_set_name());
}
$cname = "amy";
$tel = "456";
$dd = "1998-11-16";
$sql = 'INSERT INTO cust (cname,tel,dd)' . 'VALUES(?,?,?)';
$stmt = $mysql->prepare($sql);
$stmt->bind_param('sss', $cname, $tel, $dd);
