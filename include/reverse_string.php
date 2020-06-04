<?php
class Reverse_string 
{
    private $string;

    public function __construct($string){
        $this->string = $string;
    }

    public function string_rev():string{
        $string = $this->string;
        $reverse = '';
        $i = 0;
        while(!empty($string[$i])){ 
            $reverse = $string[$i].$reverse; 
            $i++;
        }
        return $reverse;
    }
}


?>