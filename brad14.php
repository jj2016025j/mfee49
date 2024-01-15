<?php
$ary = array(1,2.3,"four",5,true);

echo gettype($ary);
// 除錯用 可以看裡面有甚麼 型態 參數數值
var_dump($ary);
for ($i = 0; $i < count($ary); $i++) {
    echo var_dump($ary[$i])."<br>";
}