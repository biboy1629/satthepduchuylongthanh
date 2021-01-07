<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');
class Sanpham_model extends MY_Model {
    var $table = "sanpham";
    function get_details($SKU){
        $this->get_list_set_input(array('where'=>array('SKU'=>$SKU)));
        $query = $this->db->get($this->table);

        return $query->row();
    }
    function get_all_product(){
        return $this->get_list();
    }
    function checkSanphamExist($sku){
        if(!empty($sku)){
             return $this->get_list(array("where"=>array('SKU'=> $sku)));
        }
        return false;
    }
    public function getSanphamDetail($id){
        $this->db->where('ID',$id);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    public function xoaSanpham($id){
        $query = 'DELETE FROM tbl_'.$this->table.' WHERE ID = '.$id;

        return $this->db-$this->query($query);
    }


}
