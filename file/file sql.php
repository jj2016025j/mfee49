<!DOCTYPE html>
<html>
<head>
    <title>圖片上傳和分享</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        選擇圖片：
        <input type="file" name="image" id="image">
        <input type="submit" name="submit" value="上傳">
    </form>
</body>
</html>


<?php
// 連接數據庫...
$result = mysqli_query($conn, "SELECT * FROM images");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<img src='uploads/" . $row['filename'] . "' />";
}
?>
