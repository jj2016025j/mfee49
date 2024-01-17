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

// 嘗試選擇數據庫
if (!$conn->select_db($dbname)) {
    die("未找到數據庫 '$dbname'");
}

// 創建表
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(50)
)";
if ($conn->query($sql) === TRUE) {
    echo "表創建成功<br>";
} else {
    echo "創建表錯誤: " . $conn->error . "<br>";
}

// 檢查表是否存在
$sql = "SHOW TABLES LIKE 'users'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "表 'users' 已存在<br>";
} else {
    echo "表 'users' 不存在<br>";
}

$conn->close();
?>
