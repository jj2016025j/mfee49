<?php
$servername = "localhost";
$username = "username";
$password = "password";

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

// 選擇資料庫
$conn->select_db("exampleDB");

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

// 插入數據
$sql = "INSERT INTO users (name, email) VALUES ('John Doe', 'john@example.com')";
if ($conn->query($sql) === TRUE) {
    echo "新記錄插入成功<br>";
} else {
    echo "錯誤: " . $sql . "<br>" . $conn->error . "<br>";
}

// 讀取數據
$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 個結果<br>";
}

// 更新數據
$sql = "UPDATE users SET name='Jane Doe' WHERE id=1";
if ($conn->query($sql) === TRUE) {
    echo "記錄更新成功<br>";
} else {
    echo "更新錯誤: " . $conn->error . "<br>";
}

// 刪除數據
$sql = "DELETE FROM users WHERE id=1";
if ($conn->query($sql) === TRUE) {
    echo "記錄刪除成功<br>";
} else {
    echo "刪除錯誤: " . $conn->error . "<br>";
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

// 斷開連接
$conn->close();
?>
