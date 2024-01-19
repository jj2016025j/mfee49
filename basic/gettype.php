<?php
    echo gettype($_COOKIE);
    foreach ($_COOKIE as $key => $value) {
        echo "". $key ."". $value ."";
    };
    echo gettype($_GET);
    foreach ($_GET as $key => $value) {
        echo "". $key ."". $value ."";
    };

?>