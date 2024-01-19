<?php
// 洗牌 
$poker = array();
for ($i = 0; $i < 52; $i++) {
    $temp = rand(1, 52);
    $isRepeat = false;
    for ($j = 0; $j < $i; $j++) {
        if ($temp == $poker[$j]) {
            $isRepeat = true;
        }
    }
    if (!$isRepeat) 
    $poker[] = $temp;
    else{
        $i--;
    }
}
foreach ($poker as $v) {
    echo "{$v}<br/>";
}
echo count($poker);


// 發牌 
// 攤牌 理牌
