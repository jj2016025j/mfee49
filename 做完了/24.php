<?php
$img = imagecreatefromjpeg('img/3.jpg');

$white = imagecolorallocate($img, 255, 255, 255);

imagettftext($img,50,0,100,100,$white,'font/bard.ttf','Hello My Honey');
header('Content-Type: image/png');

imagepng($img);
imagepng($img,'img/bard.jpg');

imagedestroy($img);
