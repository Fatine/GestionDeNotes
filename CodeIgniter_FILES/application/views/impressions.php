<?php
	echo '</br>';
	echo '</br>';
	echo '</br>';
	 
  	echo form_open('lists/see_students_grades');
  	echo form_label("Imprimer les bilans de notes de tout les étudiants : ");	  	
  	echo form_submit('submit','Bilan de notes des étudiants en PDF'); 
  	echo form_close(); 
	
	echo '</br>';
	
	$annees_cursus = array(
		 'annee1'=>'1ères années',
		 'annee2'=>'2èmes années',
		 'annee3'=>'3èmes années',
		 'annee4'=>'4èmes années',
	);
	$annee_scolaire = array(
		 '2009'=>'2009',
		 '2010'=>'2010',
		 '2011'=>'2011',
		 '2012'=>'2012',
		 '2013'=>'2013',
		 '2014'=>'2014',
		 '2015'=>'2015',
		 '2016'=>'2016',
		 '2017'=>'2017',
		 
	);
	echo form_open('lists/pv_ue');
	echo form_label("Imprimer le PV des  ");
	echo form_dropdown("annee",$annees_cursus);
	echo form_label(", de la promotion  ");
	echo form_dropdown("annee_scolaire",$annee_scolaire);
	echo form_submit('submit','Créer le PV'); 
	echo form_close();
?>
