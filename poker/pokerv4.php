<?php
$poker = range(0, 51);
shuffle($poker);

foreach ($poker as $v) {
    echo "{$v}<br />";
}
echo '<hr />';
$players = [[], [], [], []];
foreach ($poker as $index => $card) {
    $players[$index % 4][(int)($index / 4)] = $card;
}
for ($i = 0; $i < 4; $i++) {
    foreach ($players[$i] as $card) {
        echo "{$card}<br/>";
    }
    echo "<hr>";
}
