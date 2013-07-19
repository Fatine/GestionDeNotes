<?php
if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' );

class Courses extends CI_Controller {

	public function index( ){
		$data['name']='';
		$data['shortname']='';
		$data['comment']='';
		
		$query = $this->db->query('SELECT * FROM courses_columns');
		$data['query'] = $query;

	     $this->load->view( 'courses', $data );
	}
}

