<?php


class Sanpham extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('admin');
    }

    function index(){


        $this->data  = array();
        $this->data['temp'] = 'admin/admin/products_list';
        $this->data['data'] = array();
        $this->load->view('admin/layout',$this->data);
    }
    function them_moi_san_pham(){
        $this->data  = array();
        $this->data['temp'] = 'admin/admin/products_add';
        $this->data['data'] = array();
        $this->load->view('admin/layout',$this->data);
    }
    function chinh_sua_san_pham(){
        $this->data  = array();
        $this->data['temp'] = 'admin/admin/products_edit';
        $this->data['data'] = array();
        $this->load->view('admin/layout',$this->data);
    }
    function xoa_san_pham(){

    }


}