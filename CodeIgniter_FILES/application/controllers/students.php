<?php
if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' );

class Students extends CI_Controller {

	public function index( ){
		$data['title']='';
		$data['lastname']='';
		$data['firstname']='';
		$data['email']='';
		
		$query = $this->db->query('SELECT * FROM students');
		$data['query'] = $query;

	     $this->load->view( 'students_module', $data );
	}
}

