<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modify extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper("url");
	}
	
	function find($user_attributes){
		
		return $user_id;
	}
	
	function add($user_id){	
	}
	
	function modify($user_id){	
	}
	
	function delete($user_id){	
	}
	
/*
 * 
 *  STUDENTS
 *
 */
	//Add a student
	function add_student(){
		  
		echo '<p><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/modify/add_student">Ajouter un autre etudiant</a></p>'; 
 		echo '<p><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/students" title="Retour">Retour</a></p>';
	}	
	//Modify a student
	function modify_student(){
		 
 		echo '<p><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/students" title="Retour">Retour</a></p>';
	}	
	//Delete a student
	function delete_student(){
		 
 		echo '<p><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/students" title="Retour">Retour</a></p>';
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
