<?php
$file = fopen("example.txt", "w") or die("無法打開文件!");
$txt = "Hello World!\nHello World!\nHello World!\nHello World!\nHello World!\nHello World!\nHello World!\nHello World!\n";
fwrite($file, $txt);
fclose($file);

$file = fopen("example.txt", "r") or die("無法打開文件!");

while(!feof($file)) {
    // echo fgets($file) . "<br>";
    echo fgetc($file);
}
fclose($file);

?>