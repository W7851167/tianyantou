
<?php
function myfunction($v1,$v2)
{
 echo $v1 . ' = ' . $v2 . "\r\n";;
return $v1+$v2;
}
$a=array(10,15,20);
print_r(array_reduce($a,"myfunction",5));
?>
