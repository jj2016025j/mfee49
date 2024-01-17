<?php
date_default_timezone_set("Asia/Taipei");
$dir = "./";

// 打开已知目录，然后继续读取内容
?>
<table border="1" width=100%>
    <?php
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            echo var_dump($dh) . "<hr>";
            while (($file = readdir($dh)) !== false) {
                echo "<tr>";
                echo "<td>filename: $file <td/>";
                echo "<td> filetype: " . filetype($dir . $file) . "<td/>";
                echo "<td> filesize: " . filesize($dir . $file) . "<td/>";
                echo "<td> filemtime: " . date("Y-m-d h:i:sa", filemtime($dir . $file)) . "<td/>";
                echo "<td> filectime: " . date("Y-m-d h:i:sa", filectime($dir . $file)) . "<td/>";
                echo "<td> fileatime: " . date("Y-m-d h:i:sa", fileatime($dir . $file)) . "<td/>";
                echo "<tr/>";
            }
        }
    }

    ?>
</table>
<?php
closedir($dh);

?>