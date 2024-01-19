<?php
if (!(isset($_POST["account"]) || isset($_REQUEST["account"])))
    header('location:password2.php');

// 用_REQUEST相對不安全
echo $_REQUEST['account'] . '<br>';
echo $_REQUEST['password'] . '<br>';
$account = $_REQUEST['account'];
$password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
$name = $_REQUEST['name'];

$sql= 'INSERT INTO menber (account, password, name)' . 'VALUES("bard123","abc123","abc")';
$mysql= new mysqli('localhost','root','j19981116','ispan');
$mysql->set_charset('utf8');
$stmt = $mysql->prepare($sql);
$stmt->bind_param('sss', $account, $password, $name);
if( $stmt->execute() ){
    echo 'success';
}else{
    echo 'fail';
}