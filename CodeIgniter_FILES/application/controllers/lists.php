<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 *
 * This model represents user authentication data. It operates the following tables:
 * - user account data,
 * - user profiles
 *
 * @package	Tank_auth
 * @author	Ilya Konyukhov (http://konyukhov.com/soft/)
 */
class Lists extends CI_Controller
{

	function __construct(){
		parent::__construct();

		$this->load->helper("url");
		$this->load->library("pagination");
	}

	/**
	 * (fatine)
	 *
	 * Get all users
	 *
	 * @return object
	 */
	function list_users(){
	
	 	$this->db->select('username')->from('users')->order_by("username","ASC"); 
	 	$query = $this->db->get();
      	if ($query->num_rows() > 0){	
			foreach ($query->result() as $row){ 
				echo $row->username.'<br/>';
	 		}
		 }
	 	echo $this->pagination->create_links(); 
	
	}	


/*
		$this->db->select('username')->from('users'); $query = $this->db->get();
		// affichage		
		foreach ($query->result() as $row){ echo '<p>'.$row->username.'</p>'; }

		if ($query->num_rows() == 1) return $query->row();
		return NULL;*/

}

/* End of file users.php */
/* Location: ./application/models/auth/users.php */
