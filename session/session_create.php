<?php
include("../class/user.php");
include("../sql/SQL_API.php");
session_start();
if (!isset($_REQUEST['account'])) header('location: brad41.php');

$account = $_REQUEST['account'];
$password = $_REQUEST['password'];
$username = $_REQUEST['username'];
$icon = $_FILES['icon'];
$_SESSION['icon'] = $icon;
$iconData = file_get_contents($icon['tmp_name']);
$iconType = $icon['type'];
$user = new User($account, $password, $username, $iconData, $iconType);
$_SESSION['user'] = $user;

header('location:session_main.php');


// $passwd = password_hash($_REQUEST['passwd'], PASSWORD_DEFAULT);

// $sql = 'INSERT INTO member (account,passwd,name) VALUES (?,?,?)';
// $mysqli = new mysqli('localhost','root','', 'ispan', 3306);
// $mysqli->set_charset('utf8');
// $stmt = $mysqli->prepare($sql);
// $stmt->bind_param('sss', $account,$passwd, $name);
// if ($stmt->execute()){
//     echo 'success';
// }else{
//     echo 'failure';
// }
?>
