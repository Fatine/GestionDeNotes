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
		$order = array(
				 'tableName'=>$_POST['tableName'],
				 'order'=>$_POST['order'],
		 		 'AscDesc'=>$_POST['AscDesc'],
		 		 );
			 //Insert
			 $query=$this->bdd->order('tableName',$order); 
			 
			 $data['title']='';
			 $data['lastname']='';
			 $data['firstname']='';
			 $data['email']='';
			 $data['query'] = $query;
    			 $this->load->view('students_module',$data);
	}
//list of users
	function list_users(){
      	
		echo '<p><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/" title="Retour"-->Retour<!--/a--></p>';
	}	

//list of grades
function grades_course(){

		echo '<p><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/" title="Retour"-->Retour<!--/a--></p>';
	}
}
