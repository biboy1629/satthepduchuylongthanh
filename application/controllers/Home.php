<?php


class Home extends MY_Controller{
    function index(){
        
        $this->data = array();
        $this->data['san_pham'] = $this->getSan_pham();
        $this->data['temp'] = 'site/index';
        
        $this->load->view('site/layout',$this->data);
    }
    function lien_he(){
        $this->data = array();
        $this->data['temp'] = 'site/contact';
        $this->load->view('site/layout',$this->data);
    }
    function san_pham(){
        //get all sanpham
        $this->data['temp'] = 'site/products';
        $this->load->view('site/layout',$this->data);
    }
    function sanpham_details($sku = ''){
        if(!empty($sku) && isset($sku)){
            $this->data = array();
            $this->data['san_pham'] = $this->getDetails($sku);
         
            //get thumbnail
            $this->data['list_thumb'] = $this->getThumbnail($sku);
            $this->data['temp']='site/details';
            $this->load->view('site/layout',$this->data);
        }else{
            $this->index();
        }
        
        
    }
    function search(){
        $this->data  = array();
        
        $this->data['temp'] = 'site/search';
        $this->load->view('site/layout',$this->data);
    }
    function catalogue_list(){
    die('ok');
    $id_catalog = $this->uri->segment(1);
    var_dump($id_catalog);die;
    $this->data  = array();
    $this->data['temp'] = 'site/catalogue';
    $this->load->view('site/layout',$this->data);
}
    function catalogue(){
        $this->data  = array();
        $this->data['temp'] = 'site/catalogue';
        $this->load->view('site/layout',$this->data);
    }

    function catalogue_details(){

        $this->data  = array();
        $this->data['temp'] = 'site/catalogue';
        $this->load->view('site/layout',$this->data);
    }
    function gioi_thieu(){
        $this->data  = array();
        $this->data['temp'] = 'site/intro';
        $this->load->view('site/layout',$this->data);
    }
   
    function hinh_anh(){
        $this->data  = array();
        $this->data['temp'] = 'site/gallaxy';
        $this->load->view('site/layout',$this->data);
    }
    function error(){
        $this->data  = array();
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
