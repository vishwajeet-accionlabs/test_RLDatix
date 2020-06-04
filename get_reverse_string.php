<?php
include ("include/reverse_string.php");

class Get_reverse_string 
{
    public function get_reverse($string){
        $reverse_string_class = new Reverse_string($string);
        echo $reverse_string = $reverse_string_class->string_rev($string);
    }
}

$obj = new Get_reverse_string();
$val=getopt(null, ["val:"]);
$obj->get_reverse($val['val']);

?>