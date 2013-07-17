<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bdd extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		
	}
	
	function add($tableName, $newUser){
		$this->db->insert($tableName, $newUser); 
	}
	
	function order($tableName, $order, $AscDesc){
		$query=$this->db->select()->from($tableName)->order_by($order,$AscDesc);
		return $query->get();
	}
}

