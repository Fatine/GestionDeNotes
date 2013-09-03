<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* controllers/aide.php : controleur de la vue aide.php
* @author Fatine Nakkoubi
*/

class Aide extends CI_Controller {
	public function index()
	{
		$data=array();		
		$data2['body']=$this->load->view('aide', $data, true);				
		$this->load->view('template', $data2);
	}
}

