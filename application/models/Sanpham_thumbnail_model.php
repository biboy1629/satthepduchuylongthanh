<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Sanpham_thumbnail_model extends MY_Model {
    var $table = 'sanpham_thumbnail';
    
    function get_thumbnails($SKU){
        $this->get_list_set_input(array('where'=>array('SKU_sanpham'=>$SKU)));
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
