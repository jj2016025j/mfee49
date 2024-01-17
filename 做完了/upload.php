<?php
if (isset($_POST['submit'])) {
    $image = $_FILES['image'];

    // 檢查文件類型和大小...

    // 儲存圖片
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($image["name"]);
    if (move_uploaded_file($image["tmp_name"], $targetFile)) {
        // 將文件信息存入數據庫
        // ...
        echo "圖片上傳成功！";
    } else {
        echo "圖片上傳失敗。";
    }
}
?>
