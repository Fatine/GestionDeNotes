<?php 
  	echo form_open('lists/see_students_grades');	  	
  	echo form_submit('submit','Bilan de notes des étudiants en PDF'); 
  	echo form_close(); 
	
	echo '</br>';
	
	$annees_cursus = array(
		 'annee1'=>'1ère année',
		 'annee2'=>'2ème année',
		 'annee3'=>'3ème année',
		 'annee4'=>'4ème année',
	);
	$annee_scolaire = array(
		 '2009'=>'2009',
		 '2010'=>'2010',
		 '2011'=>'2011',
		 '2012'=>'2012',
		 '2013'=>'2013',
	);
	echo form_open('lists/pv_ue');
	echo form_label("Version imprimable de quelle année du cursus ? ");
	echo form_dropdown("annee",$annees_cursus);
	echo form_label("De quelle année scolaire ? ");
	echo form_dropdown("annee_scolaire",$annee_scolaire);
	echo form_submit('submit','Créer le PV'); 
	echo form_close();
?>
