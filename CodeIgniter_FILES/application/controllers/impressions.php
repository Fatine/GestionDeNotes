<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* controllers/impressions.php : controleur de la vue impressions.php
* @author Fatine Nakkoubi
*/

class Impressions extends CI_Controller {
	public function index()
	{
		$data=array();		
		$data2['body']=$this->load->view('impressions', $data, true);				
		$this->load->view('template', $data2);
	}
}

