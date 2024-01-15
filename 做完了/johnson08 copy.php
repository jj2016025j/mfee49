<?php
    $r = "";
    $y = "";
    $x = "";
    $option = "";
    if(isset($_GET['option']))
        $option = $_GET['option'];
    // if($_GET['x'] && $_GET['y']){
    if(isset($_GET['x']) && isset($_GET['y'])){
        $x = $_GET['x'];
        $y = $_GET['y'];
    }
?>
<form>
    <input name="x" value="<?php echo $x; ?>"/>
    <select name="option" id="">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input name="y" value="<?php echo $y; ?>"/>
    <input type="submit" value="="/>
    <span>
        <?php 
            if($option == "+")$r = $x + $y;
            else if($option == "-")$r = $x - $y;
            else if($option == "*")$r = $x * $y;
            else if($option == "/")$r = $x / $y;
            echo $r; 
        ?>
    </span>
</form>