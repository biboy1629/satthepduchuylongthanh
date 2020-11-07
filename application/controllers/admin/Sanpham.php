<?php


class Sanpham extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('admin');
        $this->load->model('sanpham_model');
        $_SESSION['message'] = array();
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

                    if(!$this->input->post("Name")){
                        $_SESSION['message'][] = '<div class="panel panel-warning"> Tên sản phẩm không được để trống ! </div>';
                    }

                    if(!$this->input->post("SKU")){
                        $_SESSION['message'][] = '<div class="panel panel-warning">Mã sản phẩm không được để trống</div>';
                    }
                    $config['upload_path'] = FCPATH.'/uploads/sanpham/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 15024;
                    $config['encrypt_name'] = false;
                    $this->load->library('upload',$config);
                    if(!$this->upload->do_upload('Images')){
                        $upload = $this->upload->display_errors();
                        $_SESSION['message'][] = '<div class="panel panel-warning"> Upload hình không thành công </div>';

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
                        $check = $this->sanpham_model->checkSanphamExist($this->input->post("SKU"));
                        if(empty($checks)){
                            $result = $this->sanpham_model->create($sanpham);
                        }else{
                            $_SESSION['message'][] = '<div style="background-color: #a94442; color:#aa1111"> Sản phẩm đã tồn tại </div>';
                        }
                        if($result){
                            $_SESSION['message'][] = '<div class="panel panel-success"> Upload thành công </div>';
                        }else{
                            $_SESSION['message'][] = '<div class="panel panel-warning"> Upload không thành công </div>';
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