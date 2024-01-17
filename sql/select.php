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

// 檢查表是否存在
$sql = "SHOW TABLES LIKE 'users'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    die("表 'users' 不存在");
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

$conn->close();
?>
