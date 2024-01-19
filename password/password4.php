<?php
if (isset($_REQUEST["account"]) && isset($_REQUEST["password"])) {
    // $_REQUEST['account']：
    // 這部分是從 PHP 全局 $_REQUEST 數組中獲取名為 'account' 的參數值。
    // $_REQUEST 是一個 PHP 超全局變量，它包含了 $_GET、$_POST 和 $_COOKIE 數組的內容。
    // 這意味著它可以獲取通過 GET 請求、POST 請求或 Cookies 傳送的數據。

    // htmlspecialchars() 函數：這個函數將特殊字符轉換為 HTML 實體。
    // 這意味著，它會將像 < 和 > 這樣的字符轉換成 &lt; 和 &gt;。
    // 這樣做是一種防止 XSS（跨站腳本）攻擊的安全措施。
    // 如果用戶輸入的數據包含 HTML 或 JavaScript 代碼，這些代碼將不會被瀏覽器執行，而是被顯示出來。

    $account = htmlspecialchars($_REQUEST['account']);
    $password = htmlspecialchars($_REQUEST['password']);

    $sql = 'SELECT id, account, password, name FROM menber WHERE account = ?';

    $mysql = new mysqli('localhost', 'root', 'j19981116', 'ispan');
    $mysql->set_charset('utf8');
    $stmt = $mysql->prepare($sql);
    $stmt->bind_param('s', $account);
    $stmt->execute();
    $stmt->store_result();
    foreach ($stmt->get_result() as $row) {
        echo''. $row->id .''. $row->name ;
    }
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $account, $hashpassword, $name);
        $stmt->fetch();
        if (password_verify($password, $hashpassword)) {
            header('location:index.php');
        }
    }
    exit; // 确保在发送header之后停止脚本执行
}

?>
<h1>Login</h1>
<form method="post">
    <input name="account"><br>
    <input type="password" name="password"><br>
    <input type="submit">
</form>