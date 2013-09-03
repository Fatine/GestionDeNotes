<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
* controllers/welcome.php : controleur de la vue welcome.php
* @author Developpeurs CodeIgniter
*/

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data2['body']=$this->load->view('welcome', $data, true);
			$this->load->view('template', $data2);
		}
	}
}
