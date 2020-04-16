<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mensalidades_model extends CI_Model 
{

    function __construct() {
        parent::__construct();
    }

    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where('ativo', 1);
        $this->db->order_by('idProdutos','desc');
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }
    	
	function countmensalidades($table){
		return $this->db->count_all($table);
	}
}