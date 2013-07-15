<?php
if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' );

class Connexion extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/connexion
	 *	- or -
	 * 		http://example.com/index.php/connexion/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/connexion/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index( )
	{
        $this->load->helper( array( 'form', 'url' ));

		$this->load->library( 'form_validation' );

		if ( $this->form_validation->run( ) == FALSE )
		{
			$this->load->view( 'connexion' );
		}
		else
		{
			$this->load->view( 'accueil' );
		}

        function update_user( )
        {
			$this->load->view( 'accueil' );
		}
	}
}

/* End of file connexion.php */
/* Location: ./application/controllers/connexion.php */
