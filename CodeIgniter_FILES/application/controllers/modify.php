<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modify extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('bdd');
	}
	
	function find($user_attributes){
		
		return $user_id;
	}
	
	function add(){
		if(isset($_POST['lastname'],$_POST['firstname'],$_POST['email'])){
			 $newUser = array(
				 'title'=>$_POST['title'],
		 		 'lastname'=>$_POST['lastname'],
				 'firstname'=>$_POST['firstname'],
				 'email'=>$_POST['email'],
		 		 );
			 //Insert
			 $this->bdd->add($_POST['tableName'],$newUser); 
    			 $this->load->view('submitted');
 		}else{
 			echo '<p>Echec de l\'enregistrement</p>';
 		}
	}
	
	function modify(){	
	}
	
	function delete(){	
	}
	
/*
 * 
 *  STUDENTS
 *
 */
	//Add a student
	function add_student(){
 		$data['tableName']='students';
 		$data['title']='';
 		$data['firstname']='';
 		$data['lastname']='';
 		$data['email']='';
 		$this->load->view('add_student',$data);
	}	
	
	//Modify a student
	function modify_student(){
		 
 		echo '<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/students" title="Retour">Retour</a></h5>';
	}	
	//Delete a student
	function delete_student(){
		 
 		echo '<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/students" title="Retour">Retour</a></h5>';
	}


/*
 * 
 *  TEACHERS
 *
 */
	//Add a teacher
	function add_teacher(){
 
 		echo '<p><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/modify/add_teacher">Ajouter un autre professeur</a></p>'; 
	}	
	//Modify a teacher
	function modify_teacher(){
	}
	//Delete a teacher
	function delete_teacher(){
	}
	
/*
 * 
 *  ADMINISTRATIVES
 *
 */
	//Add an administrative
	function add_administrative(){
 
 		echo '<p><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/modify/add_administrative">Ajouter un autre administratif</a></p>'; 
	}
	//Modify an administrative
	function modify_administrative(){
	}
	//Delete an administrative
	function delete_administrative(){
	}

/*
 * 
 *  COURSES
 *
 */
	//Add a course
	function add_course(){
 
 		echo '<p><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/modify/add_course">Ajouter une autre unité d\'enseignement</a></p>'; 
	}
	//Add grades
	function add_grades(){
	}
	//Modify a course
	function modify_course(){
	}
	//Delete a course
	function delete_course(){
	}
}
