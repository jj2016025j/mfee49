<?php
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");

$d=strtotime("tomorrow");
echo $d;//數字時間
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";
?>