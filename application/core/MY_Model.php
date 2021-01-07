<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model{
    
    // name table
    var $table='';
    // khoa chinh
    var $key = 'id';
    // bien de sap xep
    var $order = '';
    // cac truong lua chon
    var $select = '';
    
    /*them moi row*/
    function create($data = array()){

        if($this->db->insert($this->table,$data)){
            return $this->db->insert_id();
        }else{
            return FALSE;
        }
    }
    // cap  nhat du lieu tu ID
    function update($id, $data){
        if(!$id){
            return FALSE;
        }
        $where = array();
        $where[$this->key] = $id;
        $this->update_rule($where,$data);
        return TRUE;
    }
    
    function update_rule($where, $data){
        if(!$where){
            return FALSE;
        }
        $this->db->where($where);
        $this->db->update($this->table, $data);
        return TRUE;
    }
    function delete($id){
        if(!$id){
            return FALSE;
        }
        if(is_numeric($id)){
            // xoa theo 1 id
            $where = array($this->key => $id);
        }else{
            // xoa theo array $id = 1,2,3
            $where = $this->key .'IN ('.$id.')';
        }
        $this->del_rule($where);
        return TRUE;
    }
    function del_rule($where){
        if(!$where){
            return FALSE;
        }
        $this->db->where($where);
        $this->db->delete($this->table);
        return TRUE;
    }
    
    // thuc hien cau lenh sql
    function query($sql){
        $rows = $this->db->query($sql);
        return $rows->result;
    }
    
    // lay thong tin row tu id
    // $fiel: cot du lieu ma can lay
    function get_info($id,$field = ''){
        
        if(!$id){
            return FALSE;
        }
        $where = array();
        $where[$this->key] = $id;
        
        return $this->get_info_rule($where,$field);
    }
    function get_info_rule($where = array(), $field = ''){
        
        if($field){
            $this->db->select($field);
        }
        $this->db->where($where);
        $query = $this->db->get($this->table);
        if($query->num_rows()){
            
            return $query->row();
        }
        return FALSE;
    }
    function get_list($input = array()){

        $this->get_list_set_input($input);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    protected function get_list_set_input($input = array()){

        
        // them dieu kien cho cau truy van truyen qua bien $input['where']
        // example $input['where'] = array('email'=>'abc@gmail.com')
        if((isset($input['where'])) && $input['where']){

            $this->db->where($input['where']);
        }
        // tim kiem like
        //$input['like'] = array('name' => 'abc')
        if((isset($input['like'])) && $input['like']){
            $this->db->like($input['like']);
        }
        
        // them sap xep du lieu thong qua bien $input['order']
        // $input['order'] = array('id','DESC');
        if((isset($input['order'])) && isset($input['order'])){
            $this->db->order_by($input['order'][0], $input['order'][1]);
        }else{
            $order = ($this->order == '') ? array($this->table.'.'.$this->key,'desc'):$this->order;
            $this->db->order_by($order[0], $order[1]);
        }

        // them limit
        // example $input['limit'] = array('10','0');
        if(isset($input['limit'][0]) && isset($input['limit'][1])){
            $this->db->limit($input['limit'][0], $input['limit'][1]);
        }

        
    }
    function get_total($input = array()){
        $this->get_list_set_input($input);
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }
    function get_row($input = array()){
//        var_dump($input);die;
        $this->get_list_set_input($input);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    
    
    
}
