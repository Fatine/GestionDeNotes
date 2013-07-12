<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscription extends CI_Controller {

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
	public function index()
	{
		// Chargement du helper form
		$this->load->helper('form');
		// Mise en place du formulaire d'inscription
		// Définition des champs de formulaire
		    $data = array(
			'identifiant' => array(
			    'name' => 'identifiant',
			    'id' => 'identifiant',
			    'value' => '',
			    'maxlength' => 50,
			    'size' => 20
			),
			'nom' => array(
			    'name' => 'nom',
			    'id' => 'nom',
			    'value' => '',
			    'maxlength' => 50,
			    'size' => 20
			),
			'email' => array(
			    'name' => 'email',
			    'id' => 'email',
			    'value' => '',
			    'maxlength' => 100,
			    'size' => 40
			),
			'password' => array(
			    'name' => 'password',
			    'id' => 'password',
			    'value' => '',
			    'maxlength' => 50,
			    'size' => 20
			),
		    );
// le premier paramètre permet au Framework de déterminer quel est le fichier contenu dans "/views" à charger. dans notre cas, inscription.php.
// le second paramètre permet d'envoyer notre configuration de formulaire à la vue.
		$this->load->view('inscription', $data);
	}
}

/* End of file connexion.php */
/* Location: ./application/controllers/connexion.php */
