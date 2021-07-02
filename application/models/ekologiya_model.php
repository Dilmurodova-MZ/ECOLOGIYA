<?php 
class Ekologiya_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
      
    }
 Public function get_users()
    {
        $query = $this->db->query(" SELECT * FROM menu ");
        $res = $query ->result_array();
        return $res; 
    }
}
