<?php
function createConnection($servername, $username, $password, $dbname = "", $port = 3306)
{
    try {
        $mysqli = new mysqli($servername, $username, $password, $dbname, $port);
        $mysqli->set_charset("utf8");
    } catch (mysqli_sql_exception $e) {
        die("連接失敗: " . $e->getMessage());
    }

    return $mysqli;
}

function createDatabase($mysqli, $dbname)
{
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($mysqli->query($sql) === TRUE) {
        echo "資料庫創建成功<br>";
    } else {
        echo "創建資料庫錯誤: " . $mysqli->error . "<br>";
    }
}

function selectDatabase($mysqli, $dbname)
{
    if (!$mysqli->select_db($dbname)) {
        die("未找到數據庫 '$dbname'");
    } else {
        echo "找到數據庫{$dbname}";
    }
}

//UNDO 表內類型要改
function createTable($mysqli, $tableName)
{
    $sql = "CREATE TABLE IF NOT EXISTS {$tableName} (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50),
        email VARCHAR(50)
    )";
    if ($mysqli->query($sql) === TRUE) {
        echo "表 {$tableName} 創建成功<br>";
    } else {
        echo "創建表 {$tableName} 錯誤: " . $mysqli->error . "<br>";
    }
}

function checkTableExists($mysqli, $tableName)
{
    $sql = "SHOW TABLES LIKE '{$tableName}'";
    $result = $mysqli->query($sql);
    echo ($result->num_rows > 0);
}

// 使用預處理語句
//UNDO 優化擴充功能
function insertData($mysqli, $tableName, $name, $email)
{
    try {
        $sql = $mysqli->prepare("INSERT INTO {$tableName} (name, email) VALUES (?, ?)");
        $sql->bind_param("ss", $name, $email);
        $sql->execute();
    } catch (mysqli_sql_exception $e) {
        die("錯誤: " . $e->getMessage());
    }
}

//UNDO 優化擴充功能
function updateData($mysqli, $tableName, $id, $newName)
{
    $sql = $mysqli->prepare("UPDATE {$tableName} SET name=? WHERE id=?");
    $sql->bind_param("si", $newName, $id);
    if ($sql->execute() === TRUE) {
        echo "記錄更新成功<br>";
    } else {
        echo "更新錯誤: " . $mysqli->error . "<br>";
    }
}

//UNDO 優化擴充功能
function deleteData($mysqli, $tableName, $id)
{
    $sql = $mysqli->prepare("DELETE FROM {$tableName} WHERE id=?");
    $sql->bind_param("i", $id);
    if ($sql->execute() === TRUE) {
        echo "記錄刪除成功<br>";
    } else {
        echo "刪除錯誤: " . $mysqli->error . "<br>";
    }
}

//UNDO 優化擴充功能
function selectData($mysqli, $tableName, $fields = '*', $condition = '')
{
    $sql = "SELECT {$fields} FROM {$tableName} {$condition}";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        // echo var_dump($data);
        echo "{$result->num_rows}個結果<br>";
    } else {
        echo "0 個結果<br>";
    }

        // //更改變數    
        // $stmt = $mysqli->prepare($sql);
        // //執行返回成功或失敗
        // if ($stmt->execute()) {
        //     //儲存資料
        //     $stmt->store_result();
        //     //將資料綁定到變數
        //     $stmt->bind_result($id, $name, $addr, $city, $town, $picurl);
        //     //一次一行
        //     while ($stmt->fetch()) {
        //         echo "{$id} : {$name}<br />";
        //     }
        // }
        // //釋放與結果集相關的內存。
        // $stmt->free_result();
}

// 刪除表
function dropTable($mysqli, $tableName)
{
    $sql = "DROP TABLE {$tableName}";
    if ($mysqli->query($sql) === TRUE) {
        echo "表刪除成功<br>";
    } else {
        echo "刪除表錯誤: " . $mysqli->error . "<br>";
    }
}

// 刪除資料庫
function dropDatabase($mysqli, $dbname)
{
    $sql = "DROP DATABASE {$dbname}";
    if ($mysqli->query($sql) === TRUE) {
        echo "資料庫刪除成功<br>";
    } else {
        echo "刪除資料庫錯誤: " . $mysqli->error . "<br>";
    }
}
function SQLClase($mysqli)
{
    $mysqli->close();
    echo "關閉資料庫<br>";
}


//    $mysqli->query('ALTER TABLE food AUTO_INCREMENT = 1');
// $sql .= ' LIMIT 10';