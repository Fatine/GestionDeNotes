<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bdd extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		
	}
	
	//ajouter quelqu'un
	function add($tableName, $newUser){
		$this->db->insert($tableName, $newUser); 
	}
	
	//modifier quelqu'un
	function update($tableName, $data, $id){
		$this->db->update($tableName, $data, "id =".$id); 
		$this->db->set($data);
	}
	
	//supprimer quelqu'un
	function delete($tableName, $id){
		$this->db->query('DELETE FROM '.$tableName.' WHERE id = '.$id);   
	}
	
	//voir les notes d'un étudiant
	function student_grades($id){
		$query=$this->db->query('SELECT * 
						FROM grades g, students s, courses_columns c 
						WHERE student_id='.$id.'
							AND courses_columns_id=c.id');   
		if ($query->num_rows() > 1){
			return $query;
		}else if ($query->num_rows() == 1){
			$row=$query->row();
			return $row;
		}else{
			return null;
		}
	}
	
	//trier des données
	function order($tableName, $order, $AscDesc){
		$query=$this->db->select()->from($tableName)->order_by($order,$AscDesc);
		return $query->get();
	}
	
	//récupérer les données de quelqu'un par son id
	function get_by_id($tableName, $id){
		$query=$this->db->query('SELECT DISTINCT * FROM '.$tableName.' WHERE id='.$id);
		if ($query->num_rows() > 0){
			$row=$query->row();
			return $row;
		}else{
			return null;
		}
	}
}

