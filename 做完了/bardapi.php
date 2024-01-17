<?php

function check_id($id)
{
    if (!preg_match("/^[A-Z][12][0-9]{8}$/", $id)) {
        return false;
    }
    $letters = "ABCDEFGHJKLMNPQRSTUVXYWZIO";
    $a12=strpos($letters, substr($id, 0, 1))+10;
    $id = $a12 . substr($id, 1);

    // 計算加權和
    $sum = 0;
    $weights = [1, 9, 8, 7, 6, 5, 4, 3, 2, 1, 1]; // 權重
    for ($i = 0; $i < 11; $i++) {
        $sum += $id[$i] * $weights[$i];
    }

    // 檢查加權和是否能被10整除
    return $sum % 10 == 0;
}

function isValidTaiwanID($id)
{
    // 英文字母轉換為對應的數字
    $alphabet = array(
        'A' => 10, 'B' => 11, 'C' => 12, 'D' => 13, 'E' => 14, 'F' => 15, 'G' => 16, 'H' => 17,
        'I' => 34, 'J' => 18, 'K' => 19, 'L' => 20, 'M' => 21, 'N' => 22, 'O' => 35, 'P' => 23,
        'Q' => 24, 'R' => 25, 'S' => 26, 'T' => 27, 'U' => 28, 'V' => 29, 'W' => 32, 'X' => 30,
        'Y' => 31, 'Z' => 33
    );

    // 驗證身份證號碼長度及格式
    if (!preg_match("/^[A-Z][12][0-9]{8}$/", $id)) {
        return false;
    }

    // 將字母轉換為數字
    $id = $alphabet[$id[0]] . substr($id, 1);

    // 計算加權和
    $sum = 0;
    $weights = [1, 9, 8, 7, 6, 5, 4, 3, 2, 1, 1]; // 權重
    for ($i = 0; $i < 11; $i++) {
        $sum += $id[$i] * $weights[$i];
    }

    // 檢查加權和是否能被10整除
    return $sum % 10 == 0;
}

// 這個函數首先確認提供的身份證號碼格式是否正確（一個大寫字母後跟一個1或2，然後是8個數字）。接著，它將第一個字母轉換為對應的數字，並對整個號碼進行加權和計算。最後，檢查這個加權和是否能夠被10整除，以確定身份證號碼是否有效。
// 注意：這個函數只是執行格式和數學上的檢查，並不能確認身份證號碼是否真實存在。