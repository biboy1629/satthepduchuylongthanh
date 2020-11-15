<?php


class Catalogue extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('admin');
        $this->load->model("loaisanpham_model");
        $_SESSION['message'] = array();
    }
    public function index(){

        $this->data = array();
        $this->data['catalogue_list'] = $this->loaisanpham_model->getParent();

        $this->data['temp'] = 'admin/admin/catalog_list';
        $this->load->view('admin/layout',$this->data);
    }
    public function edit(){
        $id = $this->uri->segment(3);

        if($this->input->post()){

        }
        $this->data  = array();
        $this->data['temp'] = 'admin/admin/catalog_edit';
        $this->data['data'] = $this->loaisanpham_model->getCatalogueDetail($id);
        $this->load->view('admin/layout',$this->data);
    }
    public function create(){
        $this->load->library('form_validation');

        try {

            if($this->input->post()){



                if ($this->form_validation->run() == FALSE)
                {
                    $name = $this->input->post("Name");
                    if(!empty($name)) {
                        $loaisanpham = array(
                            'Name' => $this->input->post("Name"),
                            'Parent' => $this->input->post("Parent"),
                        );
                        $check = $this->loaisanpham_model->checkLoaiSanPhamExist($name);
                        if (empty($checks)) {
                            $result = $this->loaisanpham_model->create($loaisanpham);
                        } else {
                            $_SESSION['message'][] = '<div style="background-color: #a94442; color:#aa1111"> Sản phẩm đã tồn tại </div>';
                        }
                        if ($result) {
                            $_SESSION['message'][] = '<div class="panel panel-success"> Upload thành công </div>';
                        } else {
                            $_SESSION['message'][] = '<div class="panel panel-warning"> Upload không thành công </div>';
                        }
                    }

                }



            }
            $this->data['data'] = array();
            $this->data['loai_cha'] = $this->loaisanpham_model->getParent();



            $this->data['temp'] = 'admin/admin/catalog_add';


            $this->load->view('admin/layout',$this->data);
        }catch(Exception $e){
            echo $e->getMessage();
        }

    }

    public function delete(){

    }
}