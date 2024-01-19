<?php
    $x = isset($_GET['x']) ? floatval($_GET['x']) : 0;
    $y = isset($_GET['y']) ? floatval($_GET['y']) : 0;
    $option = isset($_GET['option']) ? $_GET['option'] : '+';
    $result = '';

    switch($option){
        case "+":
            $result = $x + $y;
            break;
        case "-":
            $result = $x - $y;
            break;
        case "*":
            $result = $x * $y;
            break;
        case "/":
            $result = $y != 0 ? $x / $y : '除数不能为零';
            break;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>简易计算器</title>
</head>
<body>
    <form>
        <input name="x" type="number" value="<?php echo $x; ?>"/>
        <select name="option">
            <option value="+" <?php echo $option == '+' ? 'selected' : ''; ?>>+</option>
            <option value="-" <?php echo $option == '-' ? 'selected' : ''; ?>>-</option>
            <option value="*" <?php echo $option == '*' ? 'selected' : ''; ?>>*</option>
            <option value="/" <?php echo $option == '/' ? 'selected' : ''; ?>>/</option>
        </select>
        <input name="y" type="number" value="<?php echo $y; ?>"/>
        <input type="submit" value="="/>
        <span><?php echo $result; ?></span>
    </form>
</body>
</html>
