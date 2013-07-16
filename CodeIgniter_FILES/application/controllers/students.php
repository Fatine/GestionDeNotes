<?php
if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' );

class Students extends CI_Controller {

	public function index( ){
		$data['title']='';
		$data['lastname']='';
		$data['firstname']='';
		$data['email']='';
		
	     $this->load->view( 'students_module', $data );
	}
}

