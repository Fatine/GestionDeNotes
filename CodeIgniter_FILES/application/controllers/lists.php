<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lists extends CI_Controller
{

	function __construct(){
		parent::__construct();

		$this->load->helper("url");
		$this->load->library("pagination");
	}

//list of users
	function list_users(){
	 	$this->db->select('username')->from('users')->order_by("username","ASC"); 
	 	$query = $this->db->get();
      	if ($query->num_rows() > 0){	
			foreach ($query->result() as $row){ 
				echo $row->username.'<br/>';
	 		}
		 }
	 	echo $this->pagination->create_links(); 
		echo '<p><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/" title="Retour"-->Retour<!--/a--></p>';
	}	

//list of courses
function list_courses(){
	 	
		echo '<p><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/" title="Retour"-->Retour<!--/a--></p>';
	}	

//list of grades
function grades_course(){

		echo '<p><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/" title="Retour"-->Retour<!--/a--></p>';
	}
}
