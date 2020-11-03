<?php


class Sanpham extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('admin');
        $this->load->model('sanpham_model');
    }

    function index(){
        $resul = $this->sanpham_model->get_all_product();
        $this->data  = array();
        $this->data['temp'] = 'admin/admin/products_list';
        $this->data['data'] = array();
        $this->load->view('admin/layout',$this->data);
    }
    function them_moi_san_pham(){
        try {
            if($this->input->post()){

                $config['upload_path'] = FCPATH.'/uploads/sanpham/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 15024;
                $config['encrypt_name'] = false;
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('image')){
                    $upload = $this->upload->display_errors();
                }else{
                    $upload = $this->upload->data();
                }


            }

            $this->data  = array();
            $this->data['temp'] = 'admin/admin/products_add';
            $this->data['data'] = array();
            $this->load->view('admin/layout',$this->data);
        }catch(Exception $e){
            echo $e->getMessage();
        }

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