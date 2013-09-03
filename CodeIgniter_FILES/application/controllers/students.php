<?php
if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' );
/*
* controllers/students.php : controleur de la vue students_module.php
* @author Fatine Nakkoubi
*/

class Students extends CI_Controller {

	public function index( ){
		$data['title']='';
		$data['lastname']='';
		$data['firstname']='';
		$data['email']='';
		
		$query = $this->db->query('SELECT * FROM students');
		$data['query'] = $query;

	     $data2['body']=$this->load->view( 'students_module', $data , true);
	     $this->load->view('template', $data2);    
	}
}

