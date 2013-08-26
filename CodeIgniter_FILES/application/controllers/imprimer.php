<?php
if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' );

class Imprimer extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('bdd');
		$this->load->library('pdf');
	}
	
	public function index( ){
		
		$pdfFilePath = FCPATH.'/application/views/';	 
		if (file_exists($pdfFilePath) == FALSE){/*
		    $html = $this->load->view('see', $data, true); // render the view into HTMLs 
		    $pdf = $this->pdf->load();
		    $pdf->WriteHTML($html); // write the HTML into the PDF
		    $pdf->Output($pdfFilePath, 'F'); // save to file because we can */
		}
	}
	
	function bilan_all_students(){
		$pdfFilePath = FCPATH.'application/views/';	 
		$query=$this->bdd->get_all_students();
		
		//data = notes de l'étudiant + nom + prenom +...
		foreach($query->result() as $row){
			$query=$this->bdd->student_grades($row->id);
			$data['query']=$query;
			$data['id']=$row->id;
			
			$html = $this->load->view('bilan_students', $data, true); // render the view into HTMLs 
		     $pdf = $this->pdf->load();
		     $pdf->WriteHTML($html); // write the HTML into the PDF
		     $pdf->Output($pdfFilePath.'bilans.pdf', 'F'); // save to file because we can
		}
		$this->load->view('bilans.pdf');
	}
}
