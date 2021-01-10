<?php


if(!defined('BASEPATH')) exit('No direct script access allowed');
class Loaisanpham_model extends MY_Model {
    var $table = "loaisanpham";

    function get_loai_san_pham($parent=null){
        return $this->get_list(array("where"=>array("Parent"=>$parent),"order"=>array("ID","ASC")));
    }
    function get_lists_catelog_con($id=null, $type = null){

        if(!empty($type)){
            return $this->get_list(array("where"=> array('Type' => $type,'Parent'=>$id)));
        }
        return $this->get_list(array("where"=> array('Parent'=>$id)));
    }
    function get_all($input){
        return $this->get_list($input);
    }
    function getAllCatalogue(){

        return $this->db->query('SELECT * FROM tbl_'.$this->table.' WHERE Type IN (3,4)')->result();

    }
    function getParent($id=null){
        return $this->get_list(['where'=>['Parent'=>$id],'order'=>['ID','ASC']]);
    }
    function checkLoaiSanPhamExist($name='',$id =null){
        if(!empty($id)){
            return $this->db->query('SELECT * FROM tbl_loaisanpham WHERE name LIKE "'.$name.'" AND ID != '.$id)->result();
        }else{

            $this->db->where('Name',$name);
            $query = $this->db->get($this->table);
            return $query->row();
        }



    }
    function getCatalogueDetail($id){

        $this->db->where('ID',$id);
        $query = $this->db->get($this->table);

        return $query->row();

    }
    function getChildsCatalogue(){

        return $this->db->get_list(['where'=>['Parent'=>6]]);

    }
    function getmessage(){
        return 'oke';
    }
    function checkNameExist($name){
        return $this->db->query('SELECT ID FROM tbl_loaisanpham WHERE Name LIKE "%'.$name.'%"')->result();

//        return $this->db->get_list(['like'=>['Name'=>$name]]);
    }
    function xoaLoaisanpham($id){
        $query = 'DELETE FROM tbl_'.$this->table.' WHERE ID = '.$id;
        return $this->db-$this->query($query);
    }
    function getLoaisanphamcon($type=null, $id=null){
        if(!empty($id)){
            return $this->db->query('SELECT * FROM tbl_loaisanpham WHERE Type ='.$type.' AND ID !='.$id)->result();
        }elseif(!empty($type)){
            return $this->db->query('SELECT * FROM tbl_loaisanpham WHERE Type ='.$type)->result();
        }else{
            return null;
        }



    }
    function get_childs_catalogue($parent=null){
        return $this->db->query('SELECT * FROM tbl_loaisanpham WHERE Parent ='.$parent.' AND Type=10')->result();
    }
    function get_catalogueID(){
        return $this->db->query('SELECT * FROM tbl_loaisanpham WHERE Name LIKE "catalogue"')->row();
    }
//    function getCatalogue($ID){
//        return $this->db->query('SELECT * FROM tbl_'.$this->table.' WHERE ID = '.$ID )->row();
//    }
    function getCatalogueBySlug($slug){
        return $this->db->query('SELECT * FROM tbl_'.$this->table.' WHERE Slug = "'.$slug.'"')->row();
    }
    function getAllThuongHieu(){
        return $this->db->query('SELECT * FROM tbl_'.$this->table.' WHERE Type = 4')->result();
    }
    function getSlug($ID=null){
        if(!empty($ID)){
            return $this->db->query('SELECT Slug FROM tbl_'.$this->table.' WHERE ID = '.$ID)->row();
        }
        return false;
    }
    function getAllBaiviet($type=10,$parent=null){
        $parent = (!empty($parent)) ? ' AND Parent = '.$parent:'';
        return $this->db->query('SELECT * FROM tbl_'.$this->table.' WHERE Type = '.$type.$parent)->result();
    }



}
