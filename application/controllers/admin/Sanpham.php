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

                    $find_prod = $this->sanpham_model->get_details($this->input->post("SKU"));
                    if(!empty($find_prod)){
                        throw new Exception("Mã sản phẩm đã tồn tại");
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
//                        $Loai_san_pham_con =($this->input->post("Loai_san_pham")==6)? $this->input->post("Loai_san_pham_con"): 1;
                        $sanpham = array(
                            'Name' => $this->input->post("Name"),
                            'SKU' => $this->input->post("SKU"),
                            'Price' => $this->input->post("Price"),
                            'Description' => $this->input->post("Description"),
                            'ID_Loai_danh_muc' => $this->input->post("Loai_danh_muc"),
                            'Loai_san_pham' => $this->input->post("Loai_san_pham"),
                            'Loai_san_pham_con' => $this->input->post("Loai_san_pham_con"),
                            'Images' => $upload["file_name"],
                        );

//                        if($result){
//                            $_SESSION['message'][] = '<div class="panel panel-success"> Upload thành công </div>';
//                        }else{
//                            $_SESSION['message'][] = '<div class="panel panel-warning"> Upload không thành công </div>';
//                        }
                    }

                }

            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
        $this->load->model("loaisanpham_model");
        $this->data['data'] = array();

        $this->data  = array();
        $this->data['temp'] = 'admin/admin/products_add';
        $this->data['loai_san_pham'] = $this->loaisanpham_model->getLoaisanphamcon(1);

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
    function edit(){

            $this->load->library('form_validation');
            $id = $this->uri->segment(3);
            $this->data  = array();
            try{

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
                        $upload = null;
                        if(!$this->upload->do_upload('Images')){
                            $_SESSION['message'][] = '<div class="panel panel-success"> Upload hình không thành công </div>';
                        }else{
                            $upload = $this->upload->data();
                        }

                        $Loai_san_pham_con = $this->input->post("Loai_san_pham_con");

                        $sanpham = [
                            'Name'=>$this->input->post("Name"),
                            'SKU'=>$this->input->post("SKU"),
                            'Price'=>$this->input->post("Price"),
                            'Description'=>$this->input->post("Description"),
                            'Loai_san_pham'=>$this->input->post("Loai_san_pham"),
                            'Loai_san_pham_con'=>$Loai_san_pham_con,
                            'Images'=>(!empty($upload))? $upload["file_name"]: $this->input->post("hinh"),

                        ];
                        $result = $this->sanpham_model->update($id,$sanpham);
                        if($result){
                            $_SESSION['message'][] = '<div class="panel panel-success"> Cập nhật thành công </div>';
                        }else{
                            $_SESSION['message'][] = '<div class="panel panel-warning"> Cập nhật không thành công </div>';
                        }

                    }
                }
            }catch (Exception $e){
                $_SESSION['message'][] = '<div class="panel panel-warning"> '.$e->getMessage().' </div>';
            }
            $this->load->model("loaisanpham_model");

            $this->data['temp'] = 'admin/admin/product_edit';
            $sanpham_detail = $this->sanpham_model->getSanphamDetail($id);
            $this->data['loai_san_pham'] = $this->loaisanpham_model->getLoaisanphamcon(1);

            $this->data['loai_san_pham_con'] = $this->loaisanpham_model->get_lists_catelog_con($sanpham_detail->Loai_san_pham);
            $this->data['data'] =$sanpham_detail;


            $this->load->view('admin/layout',$this->data);


    }
    function list_san_pham(){
        $this->data  = array();
        $this->data['temp'] = 'admin/admin/products_list';
        $this->data['data'] = $this->sanpham_model->get_list(['order'=>['ID','DESC']]);
        $this->load->view('admin/layout',$this->data);
    }
    function get_catalog_con(){
        $data = array();
        $id = $_GET['id'];

        $this->load->model("loaisanpham_model");
        $data = $this->loaisanpham_model->get_lists_catelog_con($id);

        echo json_encode($data);

    }
    function xoa(){
        $id = $_GET['id'];
        $this->sanpham_model->xoaSanpham($id);


    }




}