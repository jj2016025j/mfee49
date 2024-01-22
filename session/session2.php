<?php
session_start();
if (!isset($_SESSION["var"]))header('location:session.php');

$var = $_SESSION['var'];
$ary = $_SESSION['ary'];
$user = $_SESSION['user'];
echo "<hr>";
var_dump($user);

//全刪除
echo $var;
var_dump($ary);
?>
<a href="session_logout.php">logout</a>