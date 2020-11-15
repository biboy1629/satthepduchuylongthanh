<?php


if(!defined('BASEPATH')) exit('No direct script access allowed');
class Loaisanpham_model extends MY_Model {
    var $table = "loaisanpham";

    function get_loai_san_pham(){

        return $this->get_list(array("order"=>array("ID","ASC")));
    }
    function get_lists_catelog_con(){
        return $this->get_list(array("where"=> array('Parent' => 6)));
    }
    function getParent(){
        return $this->get_list(['order'=>['ID','ASC']]);
    }
    function checkLoaiSanPhamExist($name){
        $result = $this->db->select(['where'=>['Name'=>$name]]);
        var_dump($result);die;
    }
    function getCatalogueDetail($id){
        return $this->db->get_row(['where'=>['ID'=>$id]]);
    }
}
