<?php

include ("include/reverse_string.php");

class Check_palindrome 
{
    
    public function get_palindrome($string):bool{
        
       $reverse_string_class = new Reverse_string($string);
       $reverse_string = $reverse_string_class->string_rev();
       $string_array = str_split($string);
       $reverse_string_array = str_split($reverse_string);
       
       if($string_array == $reverse_string_array){
           $result = true;
       }else{
            $result = false;
       }
       echo true === (bool)$result ? 'True' : 'False';
       return $result;
    }
}

$val=getopt(null, ["val:"]);
$obj = new Check_palindrome();
$obj->get_palindrome($val['val']);

?>