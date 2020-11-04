<?php


class Sanpham extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('admin');
        $this->load->model('sanpham_model');
        $_SESSION['message'] = '';
    }

    function index(){
        $resul = $this->sanpham_model->get_all_product();
        $this->data  = array();
        $this->data['temp'] = 'admin/admin/products_list';
        $this->data['data'] = array();
        $this->load->view('admin/layout',$this->data);
    }
    function them_moi_san_pham(){

        $this->load->library('form_validation');

        try {

            if($this->input->post()){



                if ($this->form_validation->run() == FALSE)
                {
                    $config['upload_path'] = FCPATH.'/uploads/sanpham/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 15024;
                    $config['encrypt_name'] = false;
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('Images')){
                        $upload = $this->upload->display_errors();
                        $_SESSION['message'] = '<p style="color: #aa1111"> Upload hình không thành công </p>';
//                        throw new Exception("can not upload file");
                    }else{
                        $upload = $this->upload->data();

                        $sanpham = array(
                            'Name' => $this->input->post("Name"),
                            'SKU' => $this->input->post("SKU"),
                            'Price' => $this->input->post("Price"),
                            'Description' => $this->input->post("Description"),
                            'Loai_san_pham' => $this->input->post("Loai_san_pham"),
                            'Images' => $upload["file_name"],
                        );
                        $result = $this->sanpham_model->create($sanpham);
                        if($result){
                            $_SESSION['message'] = '<p style="color: #1e7e34"> Upload thành công </p>';
                        }else{
                            $_SESSION['message'] = '<p style="color: #aa1111"> Upload không thành công </p>';
                        }
                    }

                }



            }
            $this->load->model("loaisanpham_model");
            $this->data['data'] = array();


            $this->data  = array();
            $this->data['temp'] = 'admin/admin/products_add';
            $this->data['loai_san_pham'] = $this->loaisanpham_model->get_loai_san_pham();


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