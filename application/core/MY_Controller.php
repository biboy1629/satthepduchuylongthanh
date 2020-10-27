<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
    function __construct() {
        parent::__construct();
        $controller = $this->uri->segment(1);
        switch ($controller){
            case 'admin':{
//                $_SESSION['Username']='admin';
//                $this->load->helper('admin');
//               
//                if($this->check_login()){
//                    die('ok');
//                    $this->load->view('admin/layout');
//                }else{
//                    
//                    $this->load->view('admin/login');
//                    break;
//                }
                
            }
            default :{
                
                break;
            }
        }
    }
    
    function check_login(){
        if($this->session->userdata('iduser')){
            return 1;
        }else{
            return 0;
        }
        
    }
    
}
