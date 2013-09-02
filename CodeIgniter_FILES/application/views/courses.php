<h1>G&eacute;rer les unit&eacute;s d'enseignement</h1>
<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/" title="Retour"-->Retour &agrave; l'accueil</a></h5>

<div id="content">
<a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/modify/add_course/">Ajouter une unit&eacute; d'enseignement</a>
<?php
		echo'</br></br>';
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
	  	
		echo '</br>';	
		
		$orders = array(
		 'name'=>'Par Nom',
		 'shortname'=>'Par Raccourci',
		);
		$AscDesc = array(
		 'ASC'=>'croissant',
		 'DESC'=>'décroissant',
		);
		echo form_open('lists/order');
		echo form_hidden('tableName','courses_columns');
		echo form_label("Tri : ");
		echo form_dropdown("orders",$orders);
		echo form_label("Par ordre : ");
		echo form_dropdown("AscDesc",$AscDesc);
		echo form_submit("submit","Trier");
		echo form_close(); 
?>


<TABLE border="1px"> 
  <TR> 
 <TH width="450px"> Nom </TH> 
  </TR> 
<?php
	foreach ($query->result() as $row){
?>
   <TR >
	  <TD align="center"><?php  echo $row->name  ?></TD>
	  <!--TD align="center"><?php  echo $row->shortname ?></TD-->
	  <!--TD align="center"><?php  echo $row->description ?></TD-->
	  <TD><?php 
	  	echo form_open('lists/see_course_grades');
	  	echo form_hidden('id',$row->id);
	  	echo form_hidden('year',0);
	  	echo form_submit('submit','Voir les notes'); 
	  	echo form_close(); ?></TD>
	  <TD><?php 
	  	echo form_open('modify/modify_course');
	  	echo form_hidden('id',$row->id);
	  	echo form_submit('submit','Modifier les infos'); 
	  	echo form_close(); ?></TD>
	  <TD><?php 
	  	echo form_open('modify/delete_course');
	  	echo form_hidden('id',$row->id);
	  	echo form_submit('submit','Supprimer'); 
	  	echo form_close(); ?></TD>
   </TR>
<?php
	}
?> 
</TABLE>
</div>

