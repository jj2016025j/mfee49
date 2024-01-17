<?php
//畫布
//作畫
//輸出
// 创建一个宽400像素，高300像素的空白图像
$rate = 0;
if (isset($_GET["rate"])) {
    $rate = $_GET['rate'];
}

$width = 400;
$height = 50;
$image = imagecreatetruecolor($width, $height);

// 分配颜色
$white = imagecolorallocate($image, 255, 255, 255);
$red = imagecolorallocate($image, 255, 0, 0);
$green = imagecolorallocate($image, 0, 255, 0);
$blue = imagecolorallocate($image, 0, 0, 255);

// 填充背景
imagefill($image, 0, 0, $white);

// 画线
imageline($image, 0, 0, $width, $height, $red);
imageline($image, $width, 0, 0, $height, $green);

// 画矩形
ImageFilledRectangle($image, 0, 0, 400, 50, $green);
ImageFilledRectangle($image, 0, 0, 400 * $rate / 100, 50, $red);

// 告诉浏览器这将是一个PNG图像
header('Content-Type: image/png');

// 输出图像到浏览器
imagepng($image);

// 释放内存
imagedestroy($image);
