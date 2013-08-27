<h1>G&eacute;rer les &eacute;tudiants</h1>
<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/" title="Retour"-->Retour &agrave; l'accueil</a></h5>
<div id="content">
<a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/modify/add_student/">Ajouter un &eacute;tudiant</a>
<?php 
  	echo form_open('lists/see_students_grades');	  	
  	echo form_submit('submit','Bilan de notes des étudiants en PDF'); 
  	echo form_close(); 
	
	echo '</br>';
	
	$orders = array(
		 'lastname'=>'Par Nom',
		 'firstname'=>'Par Prénom',
		 'numero_etu'=>'Par Numéro étudiant',
		);
	$AscDesc = array(
		 'ASC'=>'croissant',
		 'DESC'=>'décroissant',
		);
	echo form_open('lists/order');
	echo form_hidden('tableName','students');
	echo form_label("Tri : ");
	echo form_dropdown("orders",$orders);
	echo form_label("Par ordre : ");
	echo form_dropdown("AscDesc",$AscDesc);
	echo form_submit("submit","Trier");
?>
<TABLE border="1px">
  <TR>
	<TH width="40px"> Numéro Etudiant </TH>  
	<TH width="300px"> Nom et Prénom </TH> 
  </TR> 
<?php
	foreach ($query->result() as $row){
?>
   <TR >
	  <TD align="center"><?php  echo $row->numero_etu  ?></TD>
	  <TD align="center"><?php  echo $row->lastname.' '.$row->firstname  ?></TD>
	  <TD><?php 
	  	echo form_open('lists/see_student_grades');
	  	echo form_hidden('id',$row->id);
	  	echo form_submit('submit','Voir les notes'); 
	  	echo form_close(); ?></TD>
	  <TD><?php 
	  	echo form_open('modify/modify_student');
	  	echo form_hidden('id',$row->id);
	  	echo form_submit('submit','Modifier'); 
	  	echo form_close(); ?></TD>
	  <TD><?php 
	  	echo form_open('modify/delete_student');
	  	echo form_hidden('id',$row->id);	  	
	  	echo form_submit('submit','Supprimer'); 
	  	echo form_close(); ?></TD>
   </TR>
<?php } ?> 
</TABLE>
</div>
