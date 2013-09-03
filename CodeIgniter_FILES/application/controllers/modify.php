<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modify extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('bdd');
	}
	

/*! \fn add()
 *  \brief pour ajouter un étudiant
 *  \param $_POST['numero_etu'] numero etudiant de l'étudiant (non unique)
 *  \param $_POST['title'] monsieur, madame ou mademoiselle
 *  \param $_POST['lastname'] nom de famille de l'étudiant
 *  \param $_POST['firstname'] prenom de l'étudiant
 *  \param $_POST['email'] mail de l'étudiant
 *  \param $_POST['tableName1'] nom de la table à modifier (pour peut-etre rendre la fonction générique)
 *  \param $_POST['ue'] tableau des ues où est inscrit l'étudiant
 *  \param $_POST['annee'] année d'inscription
 *  \return envoie vers views/submitted qui indique que l'enregistrement s'est bien passé
 */
	function add(){
		$data1 = array(
			'numero_etu'=> $_POST['numero_etu'], 
			'title'     => $_POST['title'],
			'lastname'  => $_POST['lastname'],
			'firstname' => $_POST['firstname'],
			'email'     => $_POST['email'],
			'diploma'   => '',
			);
		//Insert		
		$this->bdd->add($_POST['tableName1'],$data1); 
		
		//pour ajouter l'étudiant dans les tableaux de notes correspondants
//notes(course_id, student_id, td1, td1_r, td2, td2_r, exam, exam_r, moyenne_tmp, moyenne_finale, grades_year)
		if($_POST['tableName1']=='students'){
			$data=$_POST['ue'];
			//on recupère l'id du dernier étudiant ajouté
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
    		$data2['body']=$this->load->view('submitted', true);
	     $this->load->view('template', $data2);    
 	}

/*! \fn add_c()
 *  \brief pour ajouter une UE
 *  \param $_POST['name'] nom de l'UE
 *  \param $_POST['shortname'] nom raccourci de l'UE
 *  \param $_POST['description'] description de l'UE
 *  \param $_POST['tableName'] nom de la table à modifier
 *  \return envoie vers views/submitted qui indique que l'enregistrement s'est bien passé
 */
	function add_c(){
		$new = array(
			 'name'=>$_POST['name'],
			 'shortname'=>$_POST['shortname'],
			 'description'=>$_POST['description'],
			 );
		//Insert
		$this->bdd->add($_POST['tableName'],$new);
    		$data2['body']=$this->load->view('submitted', $new, true);
	     $this->load->view('template', $data2);    
 	}

/*! \fn modify_data()
 *  \brief pour modifier des informations
 *  \param $_POST['id'] numero de l'étudiant ou de l'UE
 *  \param $_POST['title'] monsieur, madame ou mademoiselle
 *  \param $_POST['lastname'] nom de famille de l'étudiant
 *  \param $_POST['firstname'] prenom de l'étudiant
 *  \param $_POST['email'] mail de l'étudiant
 *  \param $_POST['name'] nom de l'UE
 *  \param $_POST['shortname'] nom raccourci de l'UE
 *  \param $_POST['description'] description de l'UE
 *  \param $_POST['tableName'] nom de la table à modifier
 *  \return envoie vers views/submitted qui indique que l'enregistrement s'est bien passé
 */
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
    		$data2['body']=$this->load->view('submitted', $data, true);
	     $this->load->view('template', $data2);    
 	}

/*! \fn delete()
 *  \brief pour supprimer un élément
 *  \param $_POST['id'] numéro de l'élément  supprimer
 *  \param $_POST['tableName'] nom de la table à modifier
 *  \return envoie vers views/submitted qui indique que l'enregistrement s'est bien passé
 */	
	function delete(){	
		$this->bdd->delete($_POST['tableName'],$_POST['id']);
		$data['tableName']=$_POST['tableName'];
		$data['id']=$_POST['id'];
	     $data2['body']=$this->load->view('submitted', $data, true);
	     $this->load->view('template', $data2);    
	}
	
/*
 * 
 *  STUDENTS
 *
 */
	/* \brief Add a student */
	function add_student(){
 		$data['tableName1']='students';
 		$data['title']='';
 		$data['firstname']='';
 		$data['lastname']='';
 		$data['email']='';
 		$data['numero_etu']='';
 		$data['tablename2']='notes';
 		
		$data['query'] = $this->db->query('SELECT * FROM courses_columns');

 		$data2['body']=$this->load->view('add_student',$data, true);
	     $this->load->view('template', $data2);    
	}	
	
	/* \brief a student */
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
		$data2['body']=$this->load->view('modify_data',$user, true);
	     $this->load->view('template', $data2);    
	}	
	
	/* \brief Delete a student */
	function delete_student(){
		$data['tableName']='students';
 		$data['id']=$_POST['id'];
		$data2['body']=$this->load->view('delete',$data, true);
	     $this->load->view('template', $data2);    
	}
/*
 * 
 *  COURSES
 *
 */
	/* \brief Add a course */
	function add_course(){
 		$data['tableName']='courses_columns';
 		$data['name']='';
 		$data['shortname']='';
 		$data['description']='';
 		$data2['body']=$this->load->view('add_course',$data, true);
	     $this->load->view('template', $data2);    
	}
	
	/* \brief Modify a course */
	function modify_course(){
 		$query=$this->bdd->get_by_id('courses_columns', $_POST['id']);
		$data = array(
				 'tableName'=>'courses_columns',
				 'id'=>$_POST['id'],
		 		 'name'=>$query->name,
				 'shortname'=>$query->shortname,
				 'description'=>$query->description,
		 		 );
		$data2['body']=$this->load->view('modify_data',$data, true);
	     $this->load->view('template', $data2);    
	}

	/* \brief Delete a course */
	function delete_course(){
		$data['tableName']='courses_columns';
 		$data['id']=$_POST['id'];
 		$query=$this->bdd->get_by_id('courses_columns', $_POST['id']);
		$data2['body']=$this->load->view('delete',$data, true);
	     $this->load->view('template', $data2);    
	}
}
