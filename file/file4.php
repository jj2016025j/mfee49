<?php
//解析json檔案
$filename = 'dir/2020_10_20903-02-13-2_臺中市娛樂稅稅源.json';

// 讀取JSON檔案內容
$jsonData = file_get_contents($filename);

// 將JSON字符串轉換為PHP變量
$data = json_decode($jsonData);

// 函數來遞迴地打印數據
function printData($item, $indent = 0) {
    if (is_array($item) || is_object($item)) {
        foreach ($item as $key => $value) {
            echo str_repeat("&nbsp;", $indent) . htmlspecialchars($key) . ": ";
            printData($value, $indent + 4);
        }
    } else {
        echo htmlspecialchars($item) . "<br>";
    }
}

// 打印數據
printData($data);
?>
