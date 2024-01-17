<?php
include('bardapi.php');

$ids = array("A123456789", "R124798913", "B123456789"); // 添加更多的測試號碼

$results = array_map('isValidTaiwanID', $ids);

// 輸出結果
foreach ($results as $index => $isValid) {
    if ($isValid) {
        echo $ids[$index] . " 是有效的身份證號碼<br><hr/>";
    } else {
        echo $ids[$index] . " 是無效的身份證號碼<br><hr/>";
    }
}

$results2 = array_map('check_id', $ids);
// 輸出結果
foreach ($results2 as $index => $isValid) {
    if ($isValid) {
        echo $ids[$index] . " 是有效的身份證號碼<br><hr/>";
    } else {
        echo $ids[$index] . " 是無效的身份證號碼<br><hr/>";
    }
}

