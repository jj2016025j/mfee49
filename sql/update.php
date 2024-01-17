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

// 更新數據
$sql = "UPDATE users SET name='Jane Doe' WHERE id=2";
if ($conn->query($sql) === TRUE) {
    echo "記錄更新成功<br>";
} else {
    echo "更新錯誤: " . $conn->error . "<br>";
}

// 讀取更新後的數據
$sql = "SELECT id, name, email FROM users WHERE id=2";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "更新後 - ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "找不到 ID 為 1 的記錄<br>";
}

// 刪除數據
$sql = "DELETE FROM users WHERE id=1";
if ($conn->query($sql) === TRUE) {
    echo "記錄刪除成功<br>";
} else {
    echo "刪除錯誤: " . $conn->error . "<br>";
}

// 檢查刪除後的數據
$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "表中無記錄<br>";
}

$conn->close();
?>
