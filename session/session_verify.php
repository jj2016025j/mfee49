<?php
include("../class/user.php");
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

