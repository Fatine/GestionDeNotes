<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aide extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/aide
	 *	- or -  
	 * 		http://example.com/index.php/aide/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/aide/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('aide');	
	}
}

/* End of file aide.php */
/* Location: ./application/controllers/aide.php */
