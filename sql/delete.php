<?php
$servername = "localhost";
$username = "root";
$password = "j19981116";
$dbname = "exampleDB";

// 建立連接
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}

// 刪除表
$sql = "DROP TABLE users";
if ($conn->query($sql) === TRUE) {
    echo "表刪除成功<br>";
} else {
    echo "刪除表錯誤: " . $conn->error . "<br>";
}

// 刪除資料庫
$sql = "DROP DATABASE exampleDB";
if ($conn->query($sql) === TRUE) {
    echo "資料庫刪除成功<br>";
} else {
    echo "刪除資料庫錯誤: " . $conn->error . "<br>";
}

$conn->close();
?>
