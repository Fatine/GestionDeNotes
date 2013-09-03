<?php
ini_set("display_errors",0);error_reporting(0);
/*
* controllers/lists.php : controleur pour lister des élements
* @author Fatine Nakkoubi
*/

?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lists extends CI_Controller
{

	function __construct(){
		parent::__construct();

		$this->load->helper("url");
		$this->load->model('bdd');
		$this->load->library('pdf');
		$this->load->library("pagination");
	}

/*! \fn order() 
 *  \brief pour trier la table d'étudiants
 *  \param $_POST['tableName'] nom de la table
 *  \param $_POST['orders'] champ suivant lequel on doit trier
 *  \param $_POST['AscDesc'] ordre ascendant ou descendant
 *  \return va à views/students_module.php, avec la liste d'étudiants ordonnée 
 */
	function order(){
			 $query=$this->bdd->order($_POST['tableName'],$_POST['orders'], $_POST['AscDesc']); 
			 $data['title']='';
			 $data['lastname']='';
			 $data['firstname']='';
			 $data['email']='';
			 $data['query'] = $query;
    			 $data2['body']=$this->load->view('students_module',$data, true);
   			 $this->load->view('template', $data2);	 
	}
	
/*! \fn see_student_grades()
 *  \brief pour regarder le bilan de notes d'un étudiant
 *  \param $_POST['id'] id de l'étudiant
 *  \return va à views/bilan_students.php, avec la liste des notes de l'étudiant 
 */
	function see_student_grades(){
		$query=$this->bdd->student_grades($_POST['id']);
		$name= $this->bdd->get_student_name($_POST['id']);
		$row=$name->row(); 
	
		$data['id']=$_POST['id'];
		$data['numero_etu']=$row->numero_etu;
		$data['lastname']=$row->lastname;
		$data['firstname']=$row->firstname;
		if($query->num_rows() >1){
			$data['nbLignes']=1;
		}
		
		$data['query']=$query;
		//pas de template pour ne pas avoir le lien "aide" en haut de la page
      	$this->load->view('bilan_students',$data);
	}	
	
/*! \fn see_students_grades()
 *  \brief pour regarder le bilan de notes de tout les étudiants
 *  \return page pdf avec sur chaque page le bilan de notes d'un étudiant 
 */
	function see_students_grades(){
		$query=$this->bdd->get_all_students();
		$i=1;
		$pdf = $this->pdf->load();
			
		foreach($query->result() as $row){
			$query=$this->bdd->student_grades($row->id);
			$data['id']=$row->id;
			$data['numero_etu']=$row->numero_etu;
			$data['lastname']=$row->lastname;
			$data['firstname']=$row->firstname;
			$data['query']=$query;
			$html=$this->load->view('bilan_students',$data, true);
			
			$stylesheet = file_get_contents('../css/style.css');
			$pdf->WriteHTML($stylesheet,1);
			$pdf->WriteHTML($html,2); // write the HTML into the PDF
		
			$pdf->AddPage();
			$i++;
		}
		$pdf->Output();
	}	
	

/*! \fn see_course_grades()
 *  \brief pour regarder les notes d'une unité d'enseignement
 *  \param $_POST['id'] id de l'unité d'enseignement
 *  \param $_POST['year'] année choisie pour l'affichage des notes
 *  \return va à views/see_course.php, avec la liste des notes de l'ue en fonction de l'année choisie 
 */
	function see_course_grades(){
		//calcul des moyennes (avec rajouts de points):
		$this->bdd->calcul_moyennes();
		
		//recupération des données
		$query=$this->bdd->course_students_grades($_POST['id'],$_POST['year']);
		$name=$this->bdd->get_by_id('courses_columns', $_POST['id']);
		
		if($_POST['year']!=0){ $data['year']=$_POST['year']; }
		$data['ue']=$name->name;
		$data['course_id']=$_POST['id'];
		$data['query']=$query;
      	$data2['body']=$this->load->view('see_course',$data,true);
    		$this->load->view('template', $data2);
	}

/*! \fn pv_ue()
 *  \brief pour voir le pv d'un bloc d'ue (1ere, 2eme, 3eme ou 4eme année)
 *  \param $_POST['annee_scolaire'] année de passage des ue (20XX)
 *  \param $_POST['annee'] niveau des étudiants (1eres,2emes,3emes ou 4emes années)
 *  \return fichier pdf avec la liste des etudiants pour 3 ue avec chacunes leurs notes
 */
	function pv_ue(){
		//calcul des moyennes (avec rajouts de points):
		$this->bdd->calcul_moyennes();
		//recupération des données
     	$query=$this->db->query('SELECT DISTINCT id,lastname,firstname,numero_etu FROM students order by numero_etu');
		foreach($query->result() as $row){
			$lastname[$row->id]=$row->lastname;
			$firstname[$row->id]=$row->firstname;
			$numetu[$row->id]=$row->numero_etu;
		}
		
		$nb=$query->num_rows();
		$query2=$this->db->query('SELECT DISTINCT course_id,moyenne_finale,id 
							FROM students,notes 						
							where student_id=id
							AND grades_year='.$_POST['annee_scolaire'].' 
							ORDER BY numero_etu');
		
		//on crée des tableaux contenant dans l'ordre des numeros etudiants les notes des étudiants
		foreach($query2->result() as $row){
			switch($row->course_id){
				case 1 : $ue1[$row->id]=$row->moyenne_finale; break;
				case 2 : $ue2[$row->id]=$row->moyenne_finale; break;
				case 3 : $ue3[$row->id]=$row->moyenne_finale; break;
				case 4 : $ue4[$row->id]=$row->moyenne_finale; break;
				case 5 : $ue5[$row->id]=$row->moyenne_finale; break;
				case 6 : $ue6[$row->id]=$row->moyenne_finale; break;
				case 7 : $ue7[$row->id]=$row->moyenne_finale; break;
				case 8 : $ue8[$row->id]=$row->moyenne_finale; break;
				case 9 : $ue9[$row->id]=$row->moyenne_finale; break;
				case 10 : $ue10[$row->id]=$row->moyenne_finale; break;
				case 11 : $ue11[$row->id]=$row->moyenne_finale; break;
				case 12 : $ue12[$row->id]=$row->moyenne_finale; break;
			};
		}
		
		$data['lastname']=$lastname;
		$data['firstname']=$firstname;
		$data['numetu']=$numetu;
		
		//pour chaque année, on récupère les tableaux de notes
		switch($_POST['annee']){
			case 'annee1' : $course1=1;$course2=2;$course3=3;    
				$data['moyenne1']=$ue1;
				$data['moyenne2']=$ue2;
				$data['moyenne3']=$ue3;
				break;
			case 'annee2' : $course1=4;$course2=5;$course3=6;
				$data['moyenne1']=$ue4;
				$data['moyenne2']=$ue5;
				$data['moyenne3']=$ue6;  
				break;
			case 'annee3' : $course1=7;$course2=8;$course3=9;
				$data['moyenne1']=$ue7;
				$data['moyenne2']=$ue8;
				$data['moyenne3']=$ue9;   
				break;
			case 'annee4' : $course1=10;$course2=11;$course3=12;
				$data['moyenne1']=$ue10;
				$data['moyenne2']=$ue11;
				$data['moyenne3']=$ue12;
				break;
		}
		$name1=$this->bdd->get_by_id('courses_columns', $course1);
		$name2=$this->bdd->get_by_id('courses_columns', $course2);
		$name3=$this->bdd->get_by_id('courses_columns', $course3);
		$data['name1']=$name1->name;
		$data['name2']=$name2->name;
		$data['name3']=$name3->name;
		$data['nb']=$nb;
     	$html=$this->load->view('see_pv',$data, true);
	     
		$pdf = $this->pdf->load();
		$pdf->WriteHTML($html); // write the HTML into the PDF
		$pdf->Output();
	}
	
/*! \fn pv_ue()
 *  \brief pour mettre à jour les notes d'une ue après modifications
 *  \param $_POST['nb'] nombre de lignes du tableau
 *  \param $_POST['course_id'] id de l'unité d'enseignement
 *  \return fichier pdf avec la liste des etudiants pour 3 ue avec chacunes leurs notes
 */
	function update_course(){
	//on met les nouvelles notes dans un tableau
		for($i=0; $i < $_POST['nb']; $i++){
			$notes['td1'.$i]=$_POST['td1'.$i];
			$notes['td1r'.$i]=$_POST['td1r'.$i];
			$notes['td2'.$i]=$_POST['td2'.$i];
			$notes['td2r'.$i]=$_POST['td2r'.$i];
			$notes['exam'.$i]=$_POST['exam'.$i];
			$notes['examr'.$i]=$_POST['examr'.$i];
			$notes['gradesyear'.$i]=$_POST['gradesyear'.$i];
			$notes['student'.$i]=$_POST['student'.$i];	
		}
		//mise à jour des notes avec le nouveau tableau
		$query=$this->bdd->update_grades($_POST['course_id'],$_POST['nb'],$notes);
		$id=$_POST['course_id'];
		
		//calcul des moyennes (avec rajouts de points):
		$this->bdd->calcul_moyennes();
		//recupération des données
		$query=$this->bdd->course_students_grades($_POST['course_id']);
		$name=$this->bdd->get_by_id('courses_columns', $_POST['course_id']);
		$data['ue']=$name->name;
		$data['course_id']=$_POST['course_id'];
		$data['query']=$query;
      	$data2['body']=$this->load->view('see_course',$data, true);
	     $this->load->view('template', $data2);    
	}
}
