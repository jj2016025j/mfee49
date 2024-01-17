<?php
$servername = "localhost";
$username = "root";
$password = "j19981116";


// 建立連接
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}

// 創建資料庫
$sql = "CREATE DATABASE IF NOT EXISTS exampleDB";
if ($conn->query($sql) === TRUE) {
    echo "資料庫創建成功<br>";
} else {
    echo "創建資料庫錯誤: " . $conn->error . "<br>";
}

$conn->close();
?>
