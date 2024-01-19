<!-- 解析csv檔案 可以根據行跟列列出數據
下面兩個是一樣的東西 -->
<table>
    <?php
    $data = file('dir/2020_10_20903-02-13-2_臺中市娛樂稅稅源.csv');
    foreach ($data as $line) {
        echo "<tr>";
        $fields = explode(",", $line);
        foreach ($fields as $field) {
            echo "<td>{$field}<td/>";
        }
        echo "<tr/>";
    }
    ?>
</table>
<table>
    <?php
    $filename = 'dir/2020_10_20903-02-13-2_臺中市娛樂稅稅源.csv';
    if ($handle = fopen($filename, 'r')) {
        while ($data = fgetcsv($handle, 1000, ',')) {
            echo "<tr>"; // 每一行數據開始一個新的表格行
            foreach ($data as $cell) {
                echo "<td>" . $cell . "</td>"; // 輸出每個單元格數據
            }
            echo "</tr>"; // 結束表格行
        }
        fclose($handle);
    }
    ?>
</table>