<?php
$x = rand(50,100);
echo $x . "<hr />";
if ($x = 100) {
    echo "S";
} else if($x >= 90){
    echo "A";
} else if($x >= 80){
    echo "B";
} else if($x >= 70){
    echo "C";
} else if($x >= 60){
    echo "D";
} else if($x < 60){
    echo "E";
}
?>