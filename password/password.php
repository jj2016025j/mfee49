<?php
$password = '123456789';
$new_password = password_hash($password, PASSWORD_DEFAULT);

echo '' . $new_password . '<hr>';

// 反過來就不行了
if (password_verify($password, $new_password)) {
    echo 'OK';
} else {
    echo 'XX';
}
