<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // 处理输入数据...
    echo "姓名: " . htmlspecialchars($name) . "<br>";
    echo "電子郵件: " . htmlspecialchars($email);
}
?>
