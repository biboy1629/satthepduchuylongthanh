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
        $this->data['catalogue_list'] = $this->loaisanpham_model->getAllCatalogue();

        $this->data['temp'] = 'admin/admin/catalog_list';
        $this->load->view('admin/layout',$this->data);
    }
    public function edit(){

        $this->load->library('form_validation');
        $id = $this->uri->segment(3);
        $catalogue = $this->loaisanpham_model->getCatalogueDetail($id);
        $this->data  = array();
        try{
            if($this->input->post()){
                if ($this->form_validation->run() == FALSE)
                {
                    $name = $this->input->post("Name");
//                    $parent = $this->input->post("Parent");
                    $parent = $this->input->post('parent');

                    $parent_my = null;
                    $type = 1;
                    if($parent == 1){
                        $parent = 6;
                        $type = 3;

                    }else{
                        $type = 4;
                    }

                    if(!empty($name)) {

                        $checks = $this->loaisanpham_model->checkLoaiSanPhamExist($name,$id);


                        if (!empty($checks)) {
                            throw new \Exception($_SESSION['message'][] = '<div style=" color:#aa1111"> (*)Loại sản phẩm đã tồn tại </div>');
                        }
                        $config['upload_path'] = FCPATH.'/uploads/catalogue/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = 15024;
                        $config['encrypt_name'] = false;
                        $this->load->library('upload',$config);
                        if(!$this->upload->do_upload('Hinh')){

                            $upload = $this->upload->display_errors();
                            $_SESSION['message'][] = '<div class="panel panel-warning"> Upload hình không thành công </div>';

                        }else{
                            $upload = $this->upload->data();
                        }


                        $loaisanpham = array(
                            'Name' => $this->input->post("Name"),
                            'Parent' => $parent,
                            'Hinh' => isset($upload["file_name"])? $upload["file_name"]: $this->input->post("Hinh"),
                            'slug'=>utf8tourl(utf8convert($this->input->post("Name")))
                        );

                        $result = $this->loaisanpham_model->update($catalogue->ID,$loaisanpham);
                        if($result){
                            $_SESSION['message'][] = '<div class="panel panel-success"> Cập nhật thành công </div>';
                        }else{
                            $_SESSION['message'][] = '<div style=" color:#aa1111"> Cập nhật không thành công </div>';
                        }




                    }

                }
            }
        }catch (Exception $e){
//            print_r($e->getMessage());
        }
        $catalogue = $this->loaisanpham_model->getCatalogueDetail($id);
        $this->data['temp'] = 'admin/admin/catalog_edit';
        $this->data['loai_cha'] = $this->loaisanpham_model->getParent();

        $this->data['loai_cha_cap_2'] = $this->loaisanpham_model->getLoaisanphamcon(3, $id);
        $this->data['data'] = $catalogue;
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
                        // check name in database
                        $name = $this->loaisanpham_model->checkNameExist($name);
                        if(count($name) > 0){
                            throw new \Exception("Name Category exist !");
                        }

//                        $parent = $this->input->post("Parent");
                        $parent = $this->input->post('parent');


                        $type = 1;
                        if($parent == 1){
                            $parent = 6;
                            $type = 3;
                        }else{
                            $type = 4;
                        }
                        $config['upload_path'] = FCPATH.'/uploads/catalogue/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = 15024;
                        $config['encrypt_name'] = false;
                        $this->load->library('upload',$config);
                        if(!$this->upload->do_upload('Hinh')){

                            $upload = $this->upload->display_errors();
                            $_SESSION['message'][] = '<div style="background-color: #FF4136; color: #FFFFFF" class="panel panel-warning"> Upload hình không thành công </div>';

                        }else{
                            $upload = $this->upload->data();
                            $loaisanpham = array(
                                'Name' => $this->input->post("Name"),
                                'Parent' => $parent,
                                'Type' => $type,
                                'Hinh'=> $upload["file_name"],
                                'slug'=>utf8tourl(utf8convert($this->input->post("Name")))
                            );

                            $result = $this->loaisanpham_model->create($loaisanpham);
                            if($result){
                                $_SESSION['message'][] = '<div style="padding:5px;background-color: #d4edda; color:#155724" class="panel panel-success"> Thêm mới thành công </div>';
                            }else{
                                $_SESSION['message'][] = '<div style="padding:5px;background-color: #f8d7da; color:#fff"> Thêm mới không thành công </div>';
                            }
                        }

                    }

                }
            }
        }catch(Exception $e){
            $_SESSION['message'][] = '<div style="padding:5px;background-color: #a94442; color:#fff"> '.$e->getMessage().' </div>';
        }
        $this->data['data'] = array();
        $this->data['loai_cha'] = $this->loaisanpham_model->getParent(6);
        $this->data['temp'] = 'admin/admin/catalog_add';
        $this->load->view('admin/layout',$this->data);
    }

    function xoa(){
        $id = $_GET['id'];
        $this->loaisanpham_model->xoaLoaisanpham($id);
    }
    public function get_name_category(){

        $name = $_GET['name'];

        $name = $this->loaisanpham_model->checkNameExist($name);
        if(count($name) > 0){
            echo 'no';
//            return json_encode(['result'=>1]);
        }

    }
    public function details_category_list(){
        $this->data =[];
        $this->data['temp'] = 'admin/admin/details_catalogue_list';
//        $this->data['loai_cha'] = $this->loaisanpham_model->getParent();
        $baiviet_catalogue = $this->loaisanpham_model->getAllBaiviet();
        $this->data['data'] = $baiviet_catalogue;
        $this->load->view('admin/layout',$this->data);
    }
    public function details_category_manager(){
        $this->load->library('form_validation');
        $id = $this->uri->segment(3);


        $baiviet_catalogue = $this->loaisanpham_model->getCatalogueDetail($id);

        $this->data  = [];
        try{
            if($this->input->post()){
                if ($this->form_validation->run() == FALSE)
                {
                    $name = $this->input->post("Name");
                    $parent = $this->input->post("nhan_hieu");

                    if(empty($parent)){
                        throw new \Exception("ERROR: Sản phẩm không có thương hiệu  ");
                    }

                    if(!empty($name)) {

                        $checks = $this->loaisanpham_model->checkLoaiSanPhamExist($name,$id);

                        if (!empty($checks)) {
                            throw new \Exception($_SESSION['message'][] = '<div style=" color:#aa1111"> (*)Loại sản phẩm đã tồn tại </div>');
                        }
                        $config['upload_path'] = FCPATH.'/uploads/catalogue/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = 15024;
                        $config['encrypt_name'] = false;
                        $this->load->library('upload',$config);

                        if(!$this->upload->do_upload('Hinh')){

                            $upload = $this->upload->display_errors();
                            $_SESSION['message'][] = '<div class="panel panel-warning"> Upload hình không thành công </div>';

                        }else{
                            $upload = $this->upload->data();
                        }

//                            $slug =
                        if(!empty($id)){
                            $hinh = isset($upload["file_name"]) ? $upload["file_name"]: $this->input->post("Hinh");
                        }else{
                            $hinh = $upload["file_name"];
                        }

                        $loaisanpham = array(
                            'Name' => $this->input->post("Name"),
                            'Parent' => $parent,
                            'Hinh' => $hinh,
                            'Slug'=>utf8tourl(utf8convert($this->input->post("Name"))),
                            'Type' => 10
                        );
                        if(!empty($id)){
                            $result = $this->loaisanpham_model->update($id,$loaisanpham);
                            if($result){
                                $_SESSION['message'][] = '<div class="panel panel-success"> Cập nhật thành công </div>';
                            }else{
                                $_SESSION['message'][] = '<div style=" color:#aa1111"> Cập nhật không thành công </div>';
                            }
                        }else{
                            $result = $this->loaisanpham_model->create($loaisanpham);
                            if($result){
                                $_SESSION['message'][] = '<div class="panel panel-success"> Thêm mới thành công </div>';
                            }else{
                                $_SESSION['message'][] = '<div style=" color:#aa1111"> Thêm mới không thành công </div>';
                            }
                        }




                    }

                }
            }
        }catch (Exception $e){
//            print_r($e->getMessage());
        }
        $get_loai_cha=null;
//        var_dump($this->loaisanpham_model->getCatalogueDetail((integer)$baiviet_catalogue[0]->Parent));die;
        if(empty($id)){
            $this->data['temp'] = 'admin/admin/details_catalogue_add';
            $this->data['loai_cat'] = $this->loaisanpham_model->getAllBaiviet(3,6);

        }else{
            $this->data['temp'] = 'admin/admin/details_catalogue_edit';
            $baiviet_catalogue = $this->loaisanpham_model->getCatalogueDetail($id);
//            var_dump($baiviet_catalogue);die;
            $loai_cha = $this->loaisanpham_model->getCatalogueDetail((integer)$baiviet_catalogue->Parent);

            $this->data['loai_catalogue'] = $loai_cha->Parent;
            $this->data['list_loai_cha'] = $this->loaisanpham_model->getAllBaiviet(4,$loai_cha->Parent);
            $this->data['loai_cat'] = $this->loaisanpham_model->getAllBaiviet(3,6);

        }

        $this->data['data'] = $baiviet_catalogue;
        $this->load->view('admin/layout',$this->data);

    }
    function getCatByParent($ParentID=1){
        $data = $this->loaisanpham_model->getParent($ParentID);
        echo json_encode($data);
    }
    function danh_muc_list(){
        $this->data = array();
        $this->data['danhmuc_list'] = $this->loaisanpham_model->getAllCatalogue();

        $this->data['temp'] = 'admin/admin/catalog_list';
        $this->load->view('admin/layout',$this->data);
    }
    public function danh_muc_manager(){

        $id = $this->uri->segment(3);
        $baiviet_catalogue = $this->loaisanpham_model->getCatalogueDetail($id);

        $this->data  = [];
        try{
            if($this->input->post()){
                if ($this->form_validation->run() == FALSE)
                {
                    $name = $this->input->post("Name");
                    $parent = $this->input->post("nhan_hieu");

                    if(empty($parent)){
                        throw new \Exception("ERROR: Sản phẩm không có thương hiệu  ");
                    }

                    if(!empty($name)) {

                        $checks = $this->loaisanpham_model->checkLoaiSanPhamExist($name,$id);

                        if (!empty($checks)) {
                            throw new \Exception($_SESSION['message'][] = '<div style=" color:#aa1111"> (*)Loại sản phẩm đã tồn tại </div>');
                        }
                        $config['upload_path'] = FCPATH.'/uploads/catalogue/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = 15024;
                        $config['encrypt_name'] = false;
                        $this->load->library('upload',$config);

                        if(!$this->upload->do_upload('Hinh')){

                            $upload = $this->upload->display_errors();
                            $_SESSION['message'][] = '<div class="panel panel-warning"> Upload hình không thành công </div>';

                        }else{
                            $upload = $this->upload->data();
                        }

//                            $slug =
                        if(!empty($id)){
                            $hinh = isset($upload["file_name"]) ? $upload["file_name"]: $this->input->post("Hinh");
                        }else{
                            $hinh = $upload["file_name"];
                        }

                        $loaisanpham = array(
                            'Name' => $this->input->post("Name"),
                            'Parent' => $parent,
                            'Hinh' => $hinh,
                            'Slug'=>utf8tourl(utf8convert($this->input->post("Name"))),
                            'Type' => 10
                        );
                        if(!empty($id)){
                            $result = $this->loaisanpham_model->update($id,$loaisanpham);
                            if($result){
                                $_SESSION['message'][] = '<div class="panel panel-success"> Cập nhật thành công </div>';
                            }else{
                                $_SESSION['message'][] = '<div style=" color:#aa1111"> Cập nhật không thành công </div>';
                            }
                        }else{
                            $result = $this->loaisanpham_model->create($loaisanpham);
                            if($result){
                                $_SESSION['message'][] = '<div class="panel panel-success"> Thêm mới thành công </div>';
                            }else{
                                $_SESSION['message'][] = '<div style=" color:#aa1111"> Thêm mới không thành công </div>';
                            }
                        }




                    }

                }
            }
        }catch (Exception $e){
//            print_r($e->getMessage());
        }
        $get_loai_cha=null;
//        var_dump($this->loaisanpham_model->getCatalogueDetail((integer)$baiviet_catalogue[0]->Parent));die;
        if(empty($id)){
            $this->data['temp'] = 'admin/admin/details_catalogue_add';
            $this->data['loai_cat'] = $this->loaisanpham_model->getAllBaiviet(3,6);

        }else{
            $this->data['temp'] = 'admin/admin/details_catalogue_edit';
            $baiviet_catalogue = $this->loaisanpham_model->getCatalogueDetail($id);
//            var_dump($baiviet_catalogue);die;
            $loai_cha = $this->loaisanpham_model->getCatalogueDetail((integer)$baiviet_catalogue->Parent);

            $this->data['loai_catalogue'] = $loai_cha->Parent;
            $this->data['list_loai_cha'] = $this->loaisanpham_model->getAllBaiviet(4,$loai_cha->Parent);
            $this->data['loai_cat'] = $this->loaisanpham_model->getAllBaiviet(3,6);

        }

        $this->data['data'] = $baiviet_catalogue;
        $this->load->view('admin/layout',$this->data);

    }
}