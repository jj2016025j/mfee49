<table>
    <?php
    // fopen的各種功能
    $filename = 'dir/2020.csv';
    //r 
    //r+ 從前面寫入
    //w 從最前面寫 如果沒有會創建
    //a 從最後面寫 如果沒有會創建
    $fp  = fopen($filename, 'w') or die('Server busy');
    echo var_dump($fp);
    fwrite($fp,'123');
    fclose($fp);
    echo "Ok";

    ?>
</table>