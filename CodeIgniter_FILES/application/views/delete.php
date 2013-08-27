<?php
	echo '<br/>';echo '<br/>';echo '<br/>';
	echo 'Voulez-vous vraiment effectuer cette suppression ? <br/>';
	
	switch($tableName){
	case 'students':
		echo form_open('students');
		break;
	case 'courses_columns' :
		echo form_open('courses');
		break;
	}
	echo form_submit('submit','Annuler'); 
	echo form_close();
	
	echo form_open('modify/delete');
	echo form_hidden('id',$id);
	echo form_hidden('tableName',$tableName);
	echo form_submit('submit','Valider'); 
	echo form_close();
?>
