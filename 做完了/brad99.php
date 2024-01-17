<?php
define('ROWS', 5);
define('COLS', 3);
define('FIRST', 4);
define('SECEND', 4);
define('START', 1);
$ssPink = true;
$table = "<table border='1' width='100%'>";
for ($s = START; $s <= SECEND;) {
    for ($f = START; $f <= FIRST; $r++) {
        for ($r = 1; $r <= ROWS; $r++) {
            $table .= "<tr>";
            for ($c = 1; $c <= COLS; $c++, $f++) {
                $a = $s * $f;
                if ($ssPink) {
                    $table .= "<td bgcolor=pink>{$s}*{$f}={$a}</td>";
                    $ssPink = false;
                } else {
                    $table .= "<td bgcolor=white>{$s}*{$f}={$a}</td>";
                    $ssPink = true;
                }
            }
            $table .= "</tr>";
        }
    }
}
$table .= "</table>";
echo $table;
