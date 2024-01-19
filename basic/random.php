<?php
    $x = rand(0, 10000);
    echo $x . "<hr />";

    if ($x % 400 == 0) {
        echo "true";
    } else if ($x % 100 == 0) {
        echo "false";
    } else if ($x % 4 == 0) {
        echo "true";
    } else {
        echo "false";
    }
?>
<!-- ?> -->