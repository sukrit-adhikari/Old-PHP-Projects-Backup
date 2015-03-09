<?php
/**
 * Created by PhpStorm.
 * User: Sukrit
 * Date: 12/31/13
 * Time: 4:25 PM
 */


class Dbconnectivity extends \CI_Model {

    private $MainLSDataTable='tbl_LS_data'; // Table Name for storing Main LS Data
    private $LSSiteVisitorsHitsTable='tbl_LS_hits_Data'; //Table name for Storing visitors Tracker
    private $LSDataFieldName= 'LSData'; // Column name of The main LSData 09.00-11.00;13.00-16.00


    private function readLSDataRow($conditionArray,$limit){
        $query = $this->db->get_where($this->MainLSDataTable,$conditionArray,$limit);
        return $query->row_array();
    }

    function __construct(){
        parent::__construct();

        $this->load->database();
        $this->load->library('LSTimeLibrary');
    }

    public function getNowLSFullInfo($lsgroup){ // returns the content Displayed in Main NOW.php Info Box in HTML
        $chr = date("H");       // current HOUr
        $cday = date("w")+1;    // current day
        $currmin=date("i");     // current Minute
        $currsec=date("s");     //current Second
        $currtime=date("H:i");  //current TIME 5:47 etc

        $transformedDay = LSTimeLibrary::getTransformedLOADDAY($cday,$lsgroup);

        $where_array['day']= $transformedDay; // Only group 1 routine is needed So each lsgroup request for info gets transformed to Group 1's equivalent day
        $where_array['lsgroup']='1';

            $result_array = $this->readLSDataRow($where_array,1);

            $HTML_info_array = $this->HTML_info_array($result_array[$this->LSDataFieldName],$currtime,$currsec);


    return $HTML_info_array;
    }


    private function HTML_info_array($LS_data_list_string,$currTime,$currsec){ //4.00-7.00;9.00-12.00;15.00-17.00 // 3:45:45
        $return_array = array();
        $return_array['itsnowoclock']="It's ".$currTime.":".$currsec." O'clock Now.";

        $currTime = str_replace(":",".",$currTime); // 3:45 -> 3.45

        $LS_data_list_string=str_replace(";"," ",$LS_data_list_string); //   4.00-7.00;9.00-12.00;15.00-17.00 to -> 4.00-7.00 9.00-12.00 15.00-17.00
        $LS_data_list_string=str_replace("-"," ",$LS_data_list_string); //   4.00-7.00 9.00-12.00 15.00-17.00 to -> 4.00 7.00 9.00 12.00 15.00 17.00

        $ls_data_list_array = explode(" ",$LS_data_list_string); // array("4.00","7.00","9.00","12.00","15.00","17.00")

        array_unshift($ls_data_list_array,0.00); // Day Start TIME // // array("0.00","4.00","7.00","9.00","12.00","15.00","17.00")
        array_push($ls_data_list_array,24.00);  // New Day      TIME  //array("0.00","4.00","7.00","9.00","12.00","15.00","17.00","23.59")

        for($i=0;      $i<=(sizeof(($ls_data_list_array))-2);   $i++ ){
            if($currTime >= $ls_data_list_array[$i] && $currTime <$ls_data_list_array[$i+1] ){
                if($i%2==0){
                    //echo $ls_data_list_array[$i]."  ".$ls_data_list_array[$i+1]."if";

                    $return_array['condition']='No LoadShedding';
                    $breakat = $i;
                    break;
                }else{
                    //echo $ls_data_list_array[$i]."  ".$ls_data_list_array[$i+1]."else";
                    $return_array['condition']='LoadShedding';
                    $breakat = $i;
                    break;
                }
            }
        }

        if(strtolower($return_array['condition'])=="loadshedding"){
            $return_array['comesorgoes']="comes";
            $return_array['comesorgoesat']=$ls_data_list_array[$breakat+1];
        }else{
            $return_array['comesorgoes']="goes";
            $return_array['comesorgoesat']=$ls_data_list_array[$breakat+1];
        }

        $return_array['timeleft']= $this->timeDiff($currTime.":".$currsec,$ls_data_list_array[$breakat+1],"%H:%i:%s")." Left.";

        return $return_array;
    }

    private function timeDiff($currtime,$time2,$format){
        $full_time1 = new DateTime('2014-01-01 '.$currtime); // :00 second added to make standard
        $full_time2 = new DateTime('2014-01-01 '.$time2.':00'); // :00 second added to make standard
        $interval = $full_time1->diff($full_time2);
        $returnString = $interval->format($format);
    return $returnString;
    }

}