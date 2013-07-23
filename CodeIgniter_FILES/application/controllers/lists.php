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
		$data['query']=$query;
      	$this->load->view('see_course',$data);
	}
}
