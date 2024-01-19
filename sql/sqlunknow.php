<?php
//備用
$host = 'localhost'; // 或者是數據庫服務器的IP地址
$db   = 'test';
$user = 'root';
$pass = 'j19981116';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// $sql = "INSERT INTO table_name (column1, column2) VALUES (?, ?)";
// $stmt= $pdo->prepare($sql);
// $stmt->execute([$value1, $value2]);

$sql = "SELECT * FROM test";
$stmt = $pdo->prepare($sql);
$stmt->execute([$value]);
$result = $stmt->fetchAll();

foreach ($result as $row) {
    echo var_dump($row);
}

// $sql = "UPDATE table_name SET column1 = ? WHERE column2 = ?";
// $stmt= $pdo->prepare($sql);
// $stmt->
// execute([$newValue1, $value2]);

// $sql = "DELETE FROM table_name WHERE column = ?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$value]);