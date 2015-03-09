<?php
/**
 * Created by PhpStorm.
 * User: Sukrit
 * Date: 12/31/13
 * Time: 1:26 PM
 */

class ls extends CI_Controller {

    function  __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Katmandu");
    }

    public function now($lsgroupstring){
        $this->load->library('LSStringLibrary');

        if(!LSStringLibrary::check_valid_group_argument($lsgroupstring)){
            show_404();
        }
        $this->load->model('Dbconnectivity');


        $lsgroup = substr($lsgroupstring,-1); // last 1 digit extract e.g '1' from  'lsgroup-1;
        $data['HTML_info_array']=$this->Dbconnectivity->getNowLSFullInfo($lsgroup);

        $this->load->view('StaticTemplates/header',$data);
        $this->load->view('now',$data);
        $this->load->view('StaticTemplates/footer',$data);
    }

    public function index(){
        $data = array();
        $this->load->view('StaticTemplates/header',$data);
        $this->load->view('index',$data);
        $this->load->view('StaticTemplates/footer',$data);
    }
}