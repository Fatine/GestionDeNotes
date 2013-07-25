<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lists extends CI_Controller
{

	function __construct(){
		parent::__construct();

		$this->load->helper("url");
		$this->load->library("pagination");
		$this->load->model("bdd");
	}

//ordering
	function order(){
			 $query=$this->bdd->order($_POST['tableName'],$_POST['orders'], $_POST['AscDesc']); 
			 $data['title']='';
			 $data['lastname']='';
			 $data['firstname']='';
			 $data['email']='';
			 $data['query'] = $query;
    			 $this->load->view('students_module',$data);
	}
//list of students grades
	function see_student_grades(){
		$query=$this->bdd->student_grades($_POST['id']);
		
		$data['id']=$_POST['id'];
		if($query->num_rows() >1){
			$data['nbLignes']=1;
		}
		$data['query']=$query;
      	$this->load->view('see',$data);
	}	

//list of courses grades
	function see_course_grades(){
		//calcul des moyennes (avec rajouts de points):
		$this->bdd->calcul_moyennes();
				
		//recupération des données
		$query=$this->bdd->course_students_grades($_POST['id']);
		$name=$this->bdd->get_by_id('courses_columns', $_POST['id']);
		$data['ue']=$name->name;
		$data['course_id']=$_POST['id'];
		$data['query']=$query;
      	$this->load->view('see_course',$data);
	}
//list of courses moyennes des élèves
	function pv_ue(){
		//calcul des moyennes (avec rajouts de points):
		$this->bdd->calcul_moyennes();
				
		//recupération des données
		switch($_POST['annee']){
			case 'annee1' : $course1=1;$course2=2;$course3=3;    break;
			case 'annee2' : $course1=4;$course2=5;$course3=6;    break;
			case 'annee3' : $course1=7;$course2=8;$course3=9;    break;
			case 'annee4' : $course1=10;$course2=11;$course3=12; break;
			default : echo 'erreur';
			
		}
		$name1=$this->bdd->get_by_id('courses_columns', $course1);
		$name2=$this->bdd->get_by_id('courses_columns', $course2);
		$name3=$this->bdd->get_by_id('courses_columns', $course3);
		$data['ue1']=$name1->name;
		$data['ue2']=$name2->name;
		$data['ue3']=$name3->name;	
		
		$data['query1']=$this->bdd->course_students_grades($course1);
		$data['query2']=$this->bdd->course_students_grades($course2);
		$data['query3']=$this->bdd->course_students_grades($course3);
      	$this->load->view('see_pv',$data);
	}
//update courses
	function update_course(){
		for($i=0; $i < $_POST['nb']; $i++){
			$notes['td1'.$i]=$_POST['td1'.$i];
			$notes['td1r'.$i]=$_POST['td1r'.$i];
			$notes['td2'.$i]=$_POST['td2'.$i];
			$notes['td2r'.$i]=$_POST['td2r'.$i];
			$notes['exam'.$i]=$_POST['exam'.$i];
			$notes['examr'.$i]=$_POST['examr'.$i];
			$notes['gradesyear'.$i]=$_POST['gradesyear'.$i];
			$notes['student'.$i]=$_POST['student'.$i];	
		}
		//mise à jour des notes
		$query=$this->bdd->update_grades($_POST['course_id'],$_POST['nb'],$notes);
		$id=$_POST['course_id'];
		
		//calcul des moyennes (avec rajouts de points):
		$this->bdd->calcul_moyennes();
		//recupération des données
		$query=$this->bdd->course_students_grades($_POST['course_id']);
		$name=$this->bdd->get_by_id('courses_columns', $_POST['course_id']);
		$data['ue']=$name->name;
		$data['course_id']=$_POST['course_id'];
		$data['query']=$query;
      	$this->load->view('see_course',$data);
	}
}
