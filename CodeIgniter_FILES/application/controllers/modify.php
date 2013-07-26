<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modify extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('bdd');
	}
	
	//ajouter un etudiant, un professeur, un administrateur
	function add(){
		$data1 = array(
			 'title'    => $_POST['title'],
			 'lastname' => $_POST['lastname'],
			 'firstname'=> $_POST['firstname'],
			 'email'    => $_POST['email'],
			 'diploma'  => '',
			 );
		//Insert		
		$this->bdd->add($_POST['tableName1'],$data1); 
		
		//pour ajouter l'étudiant dans les tableaux de notes correspondants
//notes(course_id, student_id, td1, td1_r, td2, td2_r, exam, exam_r, moyenne_tmp, moyenne_finale, grades_year)
		if($_POST['tableName1']=='students'){
			$data=$_POST['ue'];
			$student_id=$this->db->insert_id();
			
			foreach($data as $row){
				$query=$this->bdd->get_ue_id($row);
				foreach($query->result() as $course_id){
					$data2 = array(
						'course_id'   => $course_id->id,
						'student_id'  => $student_id,
						'grades_year' => $_POST['annee'],
					);
					$this->bdd->add('notes',$data2);
				}
			}
		}
    		$this->load->view('submitted');
 	}
 	//ajouter une ue
	function add_c(){
		$new = array(
			 'name'=>$_POST['name'],
			 'shortname'=>$_POST['shortname'],
			 'description'=>$_POST['description'],
			 );
		//Insert
		$this->bdd->add($_POST['tableName'],$new); 
    		$this->load->view('submitted');
 	}
	function modify_data(){
		switch($_POST['tableName']){
			case 'students':
				$data = array(
				 'id'=>$_POST['id'],
				 'title'=>$_POST['title'],
		 		 'lastname'=>$_POST['lastname'],
				 'firstname'=>$_POST['firstname'],
				 'email'=>$_POST['email'],
		 		 );
		 		 break;
			case 'courses_columns' :
				$data = array(
				 'id'=>$_POST['id'],
				 'name'=>$_POST['name'],
				 'shortname'=>$_POST['shortname'],
				 'description'=>$_POST['description'],
		 		 );
		 		 break;
		}
		$this->bdd->update($_POST['tableName'],$data,$_POST['id']); 
    		$this->load->view('submitted');
 	}
	
	function delete(){	
		$this->bdd->delete($_POST['tableName'],$_POST['id']);
	     $this->load->view('submitted');
	}
	
/*
 * 
 *  STUDENTS
 *
 */
	//Add a student
	function add_student(){
 		$data['tableName1']='students';
 		$data['title']='';
 		$data['firstname']='';
 		$data['lastname']='';
 		$data['email']='';
 		$data['tablename2']='notes';
 		
		$data['query'] = $this->db->query('SELECT * FROM courses_columns');

 		$this->load->view('add_student',$data);
	}	
	
	//Modify a student
	function modify_student(){
 		$query=$this->bdd->get_by_id('students', $_POST['id']);
		$user = array(
				 'tableName'=>'students',
				 'id'=>$_POST['id'],
				 'title'=>$query->title,
		 		 'lastname'=>$query->lastname,
				 'firstname'=>$query->firstname,
				 'email'=>$query->email,
		 		 );
		 $this->load->view('modify_data',$user);
	}	
	//Delete a student
	function delete_student(){
		$data['tableName']='students';
 		$data['id']=$_POST['id'];
		$this->load->view('delete',$data);
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
 		$data['tableName']='courses_columns';
 		$data['name']='';
 		$data['shortname']='';
 		$data['description']='';
 		$this->load->view('add_course',$data);
	}
	//Add grades
	function add_grades(){
	}
	//Modify a course
	function modify_course(){
 		$query=$this->bdd->get_by_id('courses_columns', $_POST['id']);
		$data = array(
				 'tableName'=>'courses_columns',
				 'id'=>$_POST['id'],
		 		 'name'=>$query->name,
				 'shortname'=>$query->shortname,
				 'description'=>$query->description,
		 		 );
		 $this->load->view('modify_data',$data);
	}
	//Delete a course
	function delete_course(){
		$data['tableName']='courses_columns';
 		$data['id']=$_POST['id'];
 		$query=$this->bdd->get_by_id('courses_columns', $_POST['id']);
		$this->load->view('delete',$data);
	}
}
