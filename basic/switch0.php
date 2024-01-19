<?php
$p0 = $p1 = $p2 = $p3 = $p4 = $p5 = $p6 = 0;
for ($i = 0; $i < 100; $i++) {
    $point = rand(1, 6);
    switch ($point) {
        case 1:
            $p1++;
            break;
        case 2:
            $p2++;
            break;
        case 3:
            $p3++;
            break;
        case 4:
            $p4++;
            break;
        case 5:
            $p5++;
            break;
        case 6:
            $p6++;
            break;
        default:
            $p0++;
    }
}
if ($p0 == 0) {
    echo "{$p1}<br/>";
    echo "{$p2}<br/>";
    echo "{$p3}<br/>";
    echo "{$p4}<br/>";
    echo "{$p5}<br/>";
    echo "{$p6}<br/>";
} else {
    echo "Oops!";
}
