<?php
include("SQL_API.php");
// 以下是如何使用這些函數的示例
$servername = "localhost";
$username = "root";
$password = "j19981116";
$dbname = "ispan";
$port = 3307;
$tableName = "menber";

$mysqli = createConnection($servername, $username, $password);
// $mysqli = createConnection($servername, $username, $password, "", $port);
// $mysqli = createConnection($servername, $username, $password, $dbname);
// $mysqli = createConnection($servername, $username, $password, $dbname, $port);

createDatabase($mysqli, $dbname);
selectDatabase($mysqli, $dbname);
createTable($mysqli, $tableName);
checkTableExists($mysqli, $tableName);
insertData($mysqli, $tableName, 'John Doe', 'john@example.com');
updateData($mysqli, $tableName, 1, 'Jane Doe');
deleteData($mysqli, $tableName, 1);
selectData($mysqli, $tableName);
// dropTable($mysqli, $tableName);
// dropDatabase($mysqli, $dbname);
SQLClase($mysqli);
