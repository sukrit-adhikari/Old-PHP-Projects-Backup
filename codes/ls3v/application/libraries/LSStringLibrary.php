<?php
/**
 * Created by PhpStorm.
 * User: Sukrit
 * Date: 12/31/13
 * Time: 2:32 PM
 */




class LSStringLibrary {

    // ::START:: lsgroup variable Argument Matching from URL  e.g - /now/lsgroup-5 .. lsgroup-5 equals NINE characters

    public static function check_valid_group_argument($lsgroupstring){


        if(strlen($lsgroupstring)>9){
            return false;
        }

        $lsgroupstring = strtolower($lsgroupstring);

     if(!preg_match("(^lsgroup-[1-7])",$lsgroupstring)){ // Groups assumed to be lsgroup-1 to lsgroup-9
            return false;

     }else{
            return true;
     }


    }

    // Argument Matching from URL ::END::





}
