<?php
if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' );
/*
* controllers/courses.php : controleur de la vue courses.php, pour gérer les Unités d'Enseignement
* @author Fatine Nakkoubi
*/

class Courses extends CI_Controller {

	public function index( ){
		$data['name']='';
		$data['shortname']='';
		$data['comment']='';
		
		$query = $this->db->query('SELECT * FROM courses_columns');
		$data['query'] = $query;
 
	     $data2['body']=$this->load->view( 'courses', $data, true);
	     $this->load->view('template', $data2);    
	}
	
}

