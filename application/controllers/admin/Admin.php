<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

//quy tat dat ten view 
// view folder = name controller
// view file  = name action
class Admin extends MY_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('admin');
        
    }
    function index(){
        $this->data  = array();

        $this->data['temp'] = 'admin/admin/index';
        $this->data['data'] = array();
        $this->load->view('admin/layout',$this->data);
        
        
    }
    function danh_sach($input = array()){
        if($this->check_login()){
            // not equal
            $input['where'] = array('admin_group_id != ' => '1');
            $list = $this->user_model->get_list($input);
            $total = $this->user_model->get_total();

            $this->data['temp'] = 'admin/admin/index';
            $this->data['total'] = $total;
            $this->data['data'] = $list;
            $this->load->view('admin/layout',$this->data);
        }else{
            $this->logout();
        }
        
    }
    function list_san_pham(){
        $this->load->model('sanpham_model');
        $list = $this->sanpham_model->get_list();
        $this->data = array();
        $this->data['temp'] = 'admin/admin/products_list';
        $this->data['data'] = $list;
        $this->load->view('admin/layout',$this->data);
        
    }
    function login(){
       
        if($this->input->post()){
            $username = $this->input->post('username');
            $password = md5($this->input->post('password').'_okey');
            if(!empty($username) && !empty($password)){
                $input['where'] = array('username' => $username, 'password'=>$password);
                $user = $this->user_model->get_row($input);

                if(!empty($user)){
                    $this->session->set_userdata('username',$username);
                    $this->session->set_userdata('iduser',$user[0]->ID);
                    
                    $this->index();
                }else{
                    $this->logout();
                }
            }
        }else{
            if($this->session->userdata('iduser')){
                $this->index();
            }else{
                $this->load->view('admin/login');
            }
            
        }
    }
    function logout(){
        $this->session->set_userdata('username','');
        $this->session->set_userdata('iduser',null);
        $this->load->view('admin/login');
    }
    function user_add(){
        
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->data = array();
        $this->data['alert_message'][0] = null; 
        $this->data['alert_message'][1] = null; 
        if($this->input->post()){
//            $this->form_validation->set_rules('username','Username','require|min_length[8]|callback_title_check');
//            $this->form_validation->set_rules('password','Password','require');
//            $this->form_validation->set_rules('pre_password','Nhập lại password','require | matches');
//            $this->form_validation->set_rules('admin_group_id','Group','require | numeric');
//            //thua dieu kien
//            if($this->form_validation->run() == true){
//                
//            }
            
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password').'_okey');
            $group = $this->input->post('admin_group_id');
            if(!empty($username) && !empty($password) && !empty($group)&& !empty($name)){
                if(strcmp($password, $this->input->post('pre_password')) == 0){
                    $data =array(
                        'name'=>$name,
                        'username'=>$username,
                        'password' => md5($password),
                        'admin_group_id'=>$group
                    );
                    
                    if($this->user_model->create($data)){
                        $this->data['alert_message'][1] = 'Thêm thành công';
                    }else{
                        $this->data['alert_message'][0] = 'Thêm không thành công';
                    }
                }else{
                    $this->data['alert_message'][0] = 'Password không giống nhau';
                }
                
                
            }else{
                $this->data['alert_message'][0] = 'Chưa điền đủ thông tin';
            }
            
            
        }
        
        $this->data['temp'] = 'admin/admin/user_add';
        
        $this->load->view('admin/layout',$this->data);
    }
    function add_new_post(){
        if($this->check_login()){
            $this->data = array();
            $this->data['temp'] = 'admin/admin/content_add';
            $this->load->view('admin/layout',$this->data);
        }else{
            $this->login();
        }
        
        
    }
    function create(){

        $this->load->model('user_model');
        $data = array();
        $data['Username']='666';
        $data['Password']='123456';
        $data['Name']='rt';
        
        
        if($this->user_model->create($data)){
            echo 'them thanh cong';
        }else{
            echo 'them khong thanh cong';
        }
    }
    
    function update(){
        $id = '9';
        $data = array();
        $data['username']='yyy';
        $data['password']='55555';
        $data['name']='tttt';
        if($this->user_model->update($id,$data)){
            echo 'update thanh cong';
        }else{
            echo 'update khoong thanh cong';
        }
    }
    function delete(){
        $id='9';
        if($this->user_model->delete($id)){
            echo 'xoa thanh cong';
        }else{
            echo 'xoa khong thanh cong';
        }
    }
    function get_info($id=''){
        $id =1;
        
        $info = $this->user_model->get_info($id);
        pre($info);
        
    }
    function get_list(){
       $input['where'] = array('ID_Groupuser' => '3');
//       $input['where'] = array('ID' => 2);  
       $resut  = $this->user_model->get_list($input);
       pre($resut);
      
    }
    
}
