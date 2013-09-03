<?php 
/**
* views/courses.php : vue des unités d'enseignement
* @author Fatine Nakkoubi
*/
?>
<h1>G&eacute;rer les unit&eacute;s d'enseignement</h1>

<div id="content">
<a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/modify/add_course/">Ajouter une unit&eacute; d'enseignement</a>
<?php
		echo'</br>';
		
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

