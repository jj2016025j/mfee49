<?php
session_start();

//全刪除
//刪某一個
unset($_SESSION['var']);

session_destroy();
header('location:session.php');
