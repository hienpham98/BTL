<?php
$pattern ="/^([A-Za-z])([\w_\.!@#$%^&*()]+){8,15}$/";
$str="";
if(preg_match($pattern, $str)){
echo'Chuoi hop le';
}                                                                                      
else{
echo'chuoi k hop le';
}
?>
