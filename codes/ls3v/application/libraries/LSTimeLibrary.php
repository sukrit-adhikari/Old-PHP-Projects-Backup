<?php
/**
 * Created by PhpStorm.
 * User: Sukrit
 * Date: 12/31/13
 * Time: 5:40 PM
 */




class LSTimeLibrary {


    public function  getTransformedLOADDAY($cday,$lsgroup){ // Returns Day of LsGroup 1's routine for each requests from other group and itself
        //echo $cday."___".$lsgroup;

        if($cday>=$lsgroup){
            $ls_formula_load_day = ($cday-$lsgroup+1);
            return $ls_formula_load_day;
        }else{
            $ls_formula_load_day = 7 - ($lsgroup-$cday-1);
            return $ls_formula_load_day;
        }
    }

} 