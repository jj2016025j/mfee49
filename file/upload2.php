<?php

$upload = $_FILES['upload'];
// foreach ($upload as $key => $value) {
//     echo "<hr>";
//     var_dump($key);
//     echo "<hr>";
//     foreach ($value as $key2 => $value2) {
//         var_dump($value2);
//         echo "<br>";
//     }
// }
foreach ($upload["error"] as $k => $error) {
    if ($error == 0) {
        move_uploaded_file(
            $upload["tmp_name"]["$k"],
            "../dir/{$upload["name"]["$k"]}"
        );
        echo "OK";

        // var_dump($upload["tmp_name"][$k]);
        // echo "<hr>";
        // var_dump("dir/{$upload["name"]["$k"]}");
        // echo "<hr>";
        // echo $error;
    }
}
