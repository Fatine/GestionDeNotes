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
/*		$this->db->select('*');
		$this->db->from('notes, students as s, courses_columns as c');
		$this->db->where('s.id', $id);
		$this->db->where('c.id', 'course_id');
		$this->db->where('s.id', 'student_id');
		*/
		$query=$this->db->query('SELECT * FROM notes as n, courses_columns as c,students as s
							where c.id=`course_id`
							and s.id=`student_id`
							and s.id='.$id);	
		//$query = $this->db->get();
		return $query;
	}
	
	//voir l'état d'une ue
	function course_students_grades($id){
		$query=$this->db->query('SELECT DISTINCT * 
						FROM students s,courses_columns c, notes n
							WHERE c.id='.$id.'
							AND c.id=n.course_id
							AND s.id=n.student_id');
						
		return $query;
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
	
	function calcul_moyennes(){
		$query=$this->db->query('SELECT DISTINCT * FROM notes n');	
		foreach($query->result() as $row){
			//calcul des moyennes
			if($row->td1_r!=null){
				$td1=$row->td1_r;
			}else{
				$td1=$row->td1;
			}
			if($row->td2_r!=null){
				$td2=$row->td2_r;
			}else{
				$td2=$row->td2;
			}
			if($row->exam_r!=null){
				$exam=$row->exam_r;
			}else{
				$exam=$row->exam;
			}
			$moyenne_tmp=($td1+$td2+$exam)/3;
			
			//règles d'ajout de points :
			switch($moyenne_tmp){
				case ($moyenne_tmp <= 11):
					    $moyenne_finale=$moyenne_tmp+2;
					    break;
			     case ($moyenne_tmp <= 16):
					    $moyenne_finale=$moyenne_tmp+2.5;
					    break;
			     case ($moyenne_tmp <= 17):
					    $moyenne_finale=$moyenne_tmp+2;
					    break;
			     case ($moyenne_tmp <= 18):
					    $moyenne_finale=$moyenne_tmp+1.5;
					    break;
				case ($moyenne_tmp <= 19):
					    $moyenne_finale=$moyenne_tmp+1;
					    break;
				case 19.5:
					    $moyenne_finale=$moyenne_tmp+0.5;
					    break;
				default:
					    $moyenne_finale=$moyenne_tmp;
					    break;
			}
			$data = array(
		          'moyenne_tmp' => $moyenne_tmp,
		          'moyenne_finale' => $moyenne_finale,
            	);
			$this->db->where('student_id', $row->student_id);
			$this->db->where('course_id', $row->course_id);
			$this->db->where('grades_year', $row->grades_year);
			
			$this->db->update('notes', $data); 
		}	
		return $query;
	}
}

