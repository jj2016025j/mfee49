<?php
include("../class/user.php");
session_start();
$user = new User(01001, "LEECS_871116", "LEECS_871116@gmail.com", "123456789");
$var = rand(0, 100);
$ary = array(1, 2, 3, 4, 5, 6, 7);

$_SESSION['var'] = $var;
$_SESSION['ary'] = $ary;
$_SESSION['user'] = $user;
var_dump($user);
echo $var;
var_dump($ary);
echo "<hr>";
echo "{$user->getname()}";
?>