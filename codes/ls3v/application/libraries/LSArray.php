<?php



    function  isValueBetween($value,$boundaries){ // $value = 3.55 // $boundaries = 3.00-6.00
            $boundaries_array = explode("-",$boundaries);
        if($value==$boundaries_array[0] || $value > $boundaries_array[0] && $value < $boundaries_array[1]){
            return true;
        }else{
            return false;
        }
    }

    function  isValueBefore($value,$boundaries){ // $value = 3.55 // $boundaries = "3.00-6.00"
        $boundaries_array = explode("-",$boundaries);
        if($value<$boundaries_array[0] ){
            return true;
        }else{
            return false;
        }
    }

   function  isValueAfter($value,$boundaries){ // $value = 3.55 // $boundaries = "3.00-6.00"
        $boundaries_array = explode("-",$boundaries);
        if($value<$boundaries_array[0] ){
            return true;
        }else{
            return false;
        }
    }
