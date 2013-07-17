
<?php
if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' );

class Pdf extends CI_Controller {

	public function index( ){
		define('FPDF_FONTPATH',$this->config->item('fonts_path'));	
		$this->load->library('fpdf');

		$this->fpdf->Open();
		$this->fpdf->AddPage();
		$this->fpdf->SetFont('Arial','',12);
		$this->fpdf->Cell(20,10,'Hello World!');
		$this->fpdf->Output();
	}
}


