<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bdd extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		
	}
	
	//trouver l'id d'une ue 
	function get_ue_id($name){
		return $this->db->query('SELECT id 
								FROM courses_columns 
								WHERE name = "'.$name.'"'); 
	}
	
	//trouver l'id d'un etudiant
	function get_student_id($lastname, $firstname){
		return $this->db->query('SELECT id 
								FROM students 
								WHERE lastname = "'.$lastname.'" 
								AND firstname = "'.$firstname.'"'); 
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
		if($tableName=='students'){
		$this->db->query('DELETE FROM notes WHERE student_id = '.$id);  
		} 
	}
	
	//voir les notes d'un étudiant
	function student_grades($id){
		$query=$this->db->query('SELECT * FROM notes as n, courses_columns as c,students as s
							where c.id=`course_id`
							and n.moyenne_finale!=0
							and s.id=`student_id`
							and s.id='.$id);	
		//$query = $this->db->get();
		return $query;
	}
	
	//voir l'état d'une ue
	function course_students_grades($id,$year){
		if($year==0){
			$year=date('Y');
		}
		$query=$this->db->query('SELECT DISTINCT * 
						FROM students s,courses_columns c, notes n, inscription i
							WHERE c.id='.$id.'
							AND n.grades_year='.$year.'
							AND c.id=n.course_id
							AND s.id=n.student_id
							AND c.id=i.course_id
							GROUP BY s.numero_etu');		
		return $query;
	}
	
	//trier des données
	function order($tableName, $order, $AscDesc){
		$query=$this->db->select()->from($tableName)->order_by($order,$AscDesc);
		return $query->get();
	}
	
	
	//recuperer tout les ues
	function get_all_ues(){
		$query=$this->db->query('SELECT DISTINCT * FROM courses_columns');
		return $query;	
	}
	
	//recuperer toutes les etudiants
	function get_all_students(){
		$query=$this->db->query('SELECT DISTINCT * FROM students');
		return $query;	
	}
	
	//récupérer nom prenom étudiant, moyenne par ue, par année
	function get_moyennes_by_year($course1,$course2,$course3){
		
		
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

	//calculer les moyennes des ue	
	function calcul_moyennes(){
		$query=$this->db->query('SELECT DISTINCT * FROM notes n');	
		foreach($query->result() as $row){
			//calcul des moyennes
			if($row->td1_r){
				$td1=$row->td1_r;
			}else{
				$td1=$row->td1;
			}
			if($row->td2_r){
				$td2=$row->td2_r;
			}else{
				$td2=$row->td2;
			}
			if($row->exam_r){
				$exam=$row->exam_r;
			}else{
				$exam=$row->exam;
			}
			$moyenne_tmp=($td1+$td2+$exam)/3;
			
			//règles d'ajout de points :
			switch($moyenne_tmp){
				case ($moyenne_tmp <= 8):
					    $moyenne_finale=$moyenne_tmp;
					    break;
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

	//mettre à jour les notes d'une ue	
	function update_grades($course_id,$nb,$data){
		for($i = 0; $i < $nb; $i++){
			$student=$_POST['student'.$i];
			$grades_year=$_POST['gradesyear'.$i];
			$td1=$_POST['td1'.$i];
			$td1_r=$_POST['td1r'.$i];
			$td2=$_POST['td2'.$i];
			$td2_r=$_POST['td2r'.$i];
			$exam=$_POST['exam'.$i];
			$exam_r=$_POST['examr'.$i];
		
			$data = array(
			     'td1' => $td1,
			     'td1_r' => $td1_r,
			     'td2' => $td2,
			     'td2_r' => $td2_r,
			     'exam' => $exam,
			     'exam_r' => $exam_r,
	       	);
			$this->db->where('student_id', $student);
			$this->db->where('course_id', $course_id);
			$this->db->where('grades_year', $grades_year);
			$this->db->update('notes', $data); 
		}
	}
}

