<?php
// 初始化一個50x50x50的三維矩陣
function initialization($size)
{
    $matrix3D = array();
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            for ($k = 0; $k < $size; $k++) {
                $matrix3D[$i][$j][$k] = "."; // 以"."初始化每個元素
            }
        }
    }
    return $matrix3D;
}

// 函數用於生成指定維度和範圍內的隨機點
function randomGeneratePoints($dimensions, $rangeStart, $rangeEnd, $numberOfPoints)
{
    $points = [];
    for ($i = 0; $i < $numberOfPoints; $i++) {
        for ($j = 0; $j < $dimensions; $j++) {
            $points[$i][$j] = rand($rangeStart, $rangeEnd);
        }
    }
    return $points;
}

// 在三維矩陣中放置點的函數
function drawPoint3D(&$matrix, $points)
{
    foreach ($points as $point) {
        $x = $point[0];
        $y = $point[1];
        $z = $point[2];
        $matrix[$x][$y][$z] = "P"; // 將點標記為"P"
    }
}

// 在三維矩陣中畫線的函數
function drawLine3D(&$matrix, $point1, $point2)
{
    $x1 = $point1[0];
    $y1 = $point1[1];
    $z1 = $point1[2];
    $x2 = $point2[0];
    $y2 = $point2[1];
    $z2 = $point2[2];

    // 確定線條的方向和長度
    $dx = $x2 - $x1;
    $dy = $y2 - $y1;
    $dz = $z2 - $z1;
    $max = max(abs($dx), abs($dy), abs($dz));
    $dx /= $max;
    $dy /= $max;
    $dz /= $max;

    // 在兩點之間插入點
    for ($i = 0; $i <= $max; $i++) {
        $x = round($x1 + $i * $dx);
        $y = round($y1 + $i * $dy);
        $z = round($z1 + $i * $dz);
        $matrix[$x][$y][$z] = "L"; // 將線上的點標記為"L"
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
        drawLine3D($matrix, $point1, $point2);
    }
}

function merge3DMatrixTo2D($matrix3D)
{
    $rows = count($matrix3D);
    $cols = count($matrix3D[0]);
    $depth = count($matrix3D[0][0]);

    $matrix2D = array_fill(0, $rows, array_fill(0, $cols, '.'));

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            for ($k = 0; $k < $depth; $k++) {
                if ($matrix3D[$i][$j][$k] != '.') {
                    $matrix2D[$i][$j] = $matrix3D[$i][$j][$k]; // 標記非空元素
                }
            }
        }
    }

    return $matrix2D;
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

$matrixSize = 40;
$matrix3D = initialization($matrixSize);
// 生成隨機點 維數 範圍 範圍 數量
$points = randomGeneratePoints(3, 1, 40, 5);

$position = 30;
$size = 20;
$points3D = [
    [$position - $size, $position - $size, $position - $size], // 頂點 1
    [$position - $size, $position, $position - $size], // 頂點 2
    [$position, $position, $position - $size], // 頂點 3
    [$position, $position - $size, $position - $size], // 頂點 4
    [$position - $size, $position - $size, $position], // 頂點 5
    [$position - $size, $position, $position], // 頂點 6
    [$position, $position, $position], // 頂點 7
    [$position, $position - $size, $position] // 頂點 8
];

drawPoint3D($matrix3D, $points);
drawLine3D($matrix3D, $points[0], $points[1]);
drawPolygon($matrix3D, $points);
drawPolygon($matrix3D, $points3D);

$matrix2D = merge3DMatrixTo2D($matrix3D);
displayMatrix($matrix2D);
