<?php


class Home extends MY_Controller{


    function __construct()
    {
        parent::__construct();
        $this->catalog = $this->getLoaisanpham(["where"=>["Parent"=>6]]);


    }


    function index(){

        $this->data = array();
        $this->data['san_pham'] = $this->getSan_pham();
        $this->data['temp'] = 'site/index';
        $this->data['menu_catalog'] = $this->catalog;
        
        $this->load->view('site/layout',$this->data);
    }
    function lien_he(){
        $this->data = array();
        $this->data['temp'] = 'site/contact';
        $this->data['menu_catalog'] = $this->catalog;
        $this->load->view('site/layout',$this->data);
    }
    function san_pham(){
        //get all sanpham
        $this->data['san_pham'] = $this->getSan_pham();
        $this->data['temp'] = 'site/products';
        $this->data['menu_catalog'] = $this->catalog;
        $this->load->view('site/layout',$this->data);
    }
    function sanpham_details(){

        $sku = $this->uri->segment(2);

        $sku = explode('.',$sku);

        if(!empty($sku[0]) && isset($sku[0])){
            $this->data = array();
            $this->data['san_pham'] = $this->getDetails($sku[0]);
            $this->data['menu_catalog'] = $this->catalog;
            //get thumbnail
            $this->data['list_thumb'] = $this->getThumbnail($sku[0]);
            $this->data['temp']='site/details';
            $this->load->view('site/layout',$this->data);
        }else{
            $this->index();
        }


    }
    function search(){
        $this->data  = array();
        $this->data['menu_catalog'] = $this->catalog;
        $this->data['temp'] = 'site/search';
        $this->load->view('site/layout',$this->data);
    }
    function catalogue_list(){


        $this->data  = array();
        $this->load->model("loaisanpham_model");
        $url = explode('/' ,current_url());
        $last = end($url);
        $catalog_child = $this->loaisanpham_model->getCatalogueBySlug($last);

        $this->data['list_catalog'] = $this->loaisanpham_model->get_loai_san_pham($catalog_child->ID);
        $this->data['temp'] = 'site/list_catalogue';
        $this->data['catalogue'] = $catalog_child;
        $this->data['menu_catalog'] = $this->catalog;
        $this->load->view('site/layout',$this->data);

    }
    function catalogue(){
        $this->load->model("loaisanpham_model");
        $this->data  = [];
        $this->data['list_catalog'] = $this->loaisanpham_model->getAllThuongHieu();
        $this->data['menu_catalog'] = $this->catalog;
        $this->data['temp'] = 'site/catalogue';
        $this->load->view('site/layout',$this->data);
    }

    function catalogue_detail(){
        $this->load->model('loaisanpham_model');
        $this->data  = array();
        $url = explode('/' ,current_url());
        $last = end($url);
        $slug = str_replace('.html','',$last);

        if(strpos($last,'.html')){
            //get id parent
            $parent = $this->loaisanpham_model->getCatalogueBySlug($slug);
            $this->data['data'] = $this->loaisanpham_model->getAllBaiviet(10,$parent->ID);
            var_dump($this->data);die;
            $this->data['menu_catalog'] = $this->catalog;
            $this->data['temp'] = 'site/detail_catalogue';
            $this->load->view('site/layout',$this->data);
        }else{
            $this->data['temp'] = 'site/index';
            $this->load->view('site/layout',$this->data);
        }


    }
    function gioi_thieu(){
        $this->data  = array();
        $this->data['menu_catalog'] = $this->catalog;
        $this->data['temp'] = 'site/intro';
        $this->load->view('site/layout',$this->data);
    }
   
    function hinh_anh(){
        $this->data  = array();
        $this->data['menu_catalog'] = $this->catalog;
        $this->data['temp'] = 'site/gallaxy';
        $this->load->view('site/layout',$this->data);
    }
    function error(){
        $this->data  = array();
        $this->data['menu_catalog'] = $this->catalog;
        $this->data['temp'] = 'site/error';
        $this->load->view('site/layout',$this->data);
    }
    
    function dat_lich(){
        $name =$this->input->post('name');
        $sdt =$this->input->post('sdt');
        $idservice =$this->input->post('dkdv');
        $ngayhen = $this->input->post('ngayhen');
       
        if(!empty($name) && !empty($sdt) && !empty($idservice) && !empty($ngayhen)){
            $this->load->model('user_model');
            $data = array(
                'name' => $name,
                'phone' => $sdt
            );
            $dataUser = array();
            $dataUser['where'] = array('phone'=>$sdt);
            $check_id = $this->user_model->get_row($dataUser);
            if(!empty($check_id[0]->ID)){
                $id_user = $check_id[0]->ID;
            }else{
                $id_user = $this->user_model->create($data);
            }
            
            
            
            if($id_user){
                // add to booking
                $this->load->model('booking_model');
                $id_service = intval($idservice);
                $data = array(
                    'ID_user' => $id_user,
                    'ID_services'=>$id_service,
                    'Ngay_hen'=>$ngayhen
                );
                if($this->booking_model->create($data)){
                    echo '<span style="font-weight: bold; color: #0dea28;">Đặt lịch thành công !</span>';
                }
                
                
                
            }
        }else{
            echo '<span style="font-weight: bold; color: #f70c0c;">Điền không đủ thông tin ! Đặt lịch không thành công.</span>';
        }


        
    }

    function getSan_pham($input = array()){
        $this->load->model('sanpham_model');
        $list = $this->sanpham_model->get_list($input);
        return $list;

    }
    function getLoaisanpham($input = array()){
        $this->load->model('loaisanpham_model');
        $list = $this->loaisanpham_model->get_list($input);
        return $list;

    }
    function getDetails($SKU){
        $this->load->model('sanpham_model');
        $list = $this->sanpham_model->get_details($SKU);
        return $list;
    }
    function getThumbnail($SKU){
        $this->load->model('sanpham_thumbnail_model');
        $list = $this->sanpham_thumbnail_model->get_thumbnails($SKU);
        return $list;
    }
}
