<?php
// 创建一个10x10的二维数组
$matrix = array();

// 使用双重循环初始化矩阵
for ($i = 0; $i < 50; $i++) {
    for ($j = 0; $j < 50; $j++) {
        $matrix[$i][$j] = "."; // 以0初始化每个元素，您可以根据需要更改此值
    }
}
// 定義多邊形的點
$points2 = [[1, 1], [1, 8], [8, 8], [8, 1]];
$points = [[1, 6], [8, 5],];
// 在矩阵中放置点
function drawPoint(&$matrix, $points)
{
    foreach ($points as $point) {
        $x = $point[0];
        $y = $point[1];
        $matrix[$x][$y] = 0; // 将点标记为1或其他您选择的值
    }
}

// 画线函数
function drawLine(&$matrix, $point1, $point2)
{
    $x1 = $point1[0];
    $y1 = $point1[1];
    $x2 = $point2[0];
    $y2 = $point2[1];

    // 确定线条的方向和长度
    $dx = $x2 - $x1;
    $dy = $y2 - $y1;
    $max = max(abs($dx), abs($dy));
    $dx /= $max;
    $dy /= $max;

    // 在两点之间插入点
    for ($i = 0; $i <= $max; $i++) {
        $x = round($x1 + $i * $dx);
        $y = round($y1 + $i * $dy);
        $matrix[$x][$y] = 1;
    }
}

function drawPolygon(&$matrix, $points)
{
    $numPoints = count($points);
    if ($numPoints < 3) {
        return; // 如果點的數量小於3，無法畫多邊形
    }

    // 連接每一對相鄰的點
    for ($i = 0; $i < $numPoints; $i++) {
        $point1 = $points[$i];
        $point2 = $points[($i + 1) % $numPoints]; // 使用模數運算符來處理最後一對點
        drawLine($matrix, $point1, $point2);
    }
}

function displayMatrix($matrix)
{
    echo "<table style='border-collapse: collapse;'>";
    foreach ($matrix as $row) {
        echo "<tr>";
        foreach ($row as $element) {
            echo "<td style='border: 1px solid black; width: 20px; height:
    20px; text-align: center;'>" . $element . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

drawPoint($matrix, $points);
drawLine($matrix, $points[0], $points[1]);
drawPolygon($matrix, $points2);
displayMatrix($matrix);
