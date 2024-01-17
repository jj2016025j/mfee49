<?php
$a = array(1,2,3,4,5,6,7);
$a[] = 12;
$a[] = 12.3;
$a[] = "BARD";
$a[] = 1;
$a[] = 1;
$a[] = 1;
var_dump($a);
echo '<hr/>';
$a['name']='brad';
foreach($a as $k => $v){
    echo var_dump($k).$v.'<hr/>';

}
function test(){
    $args=func_get_args();
    echo $args;
}
?>