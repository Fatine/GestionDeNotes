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
	function order($data){
		$request='SELECT * FROM '.$data['tableName'].' ORDER BY '.$data['order'].' '.$data['AscDesc'];
		$query=$this->db->select($request);
		return $query;
	}
}

