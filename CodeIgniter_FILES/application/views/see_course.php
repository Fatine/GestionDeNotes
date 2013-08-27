<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/courses" title="Retour"-->Retour</a></h5>
<div id="content">
<TABLE border="1px">  <CAPTION> Récapitulatif UE <?php echo $ue ?> </CAPTION> 
  <TR> 
	 <TH width="80px">  Numéro étudiant  </TH>
	 <TH width="300px"> Nom Prénom </TH> 
	 <TH width="80px">  Td1  </TH>
	 <TH width="80px"> Td1 rattrapage </TH>
	 <TH width="80px">  Td2  </TH>
	 <TH width="80px"> Td2 rattrapage </TH>
	 <TH width="80px">  Examen  </TH>
	 <TH width="80px"> Exam rattrapage </TH>
	 <TH width="80px"> Moyenne temporaire </TH>
	 <TH width="80px"> Moyenne finale</TH>
  </TR> 
<?php
	$years = array(
			 '2009'=>'2009',
			 '2010'=>'2010',
			 '2011'=>'2011',
			 '2012'=>'2012',
			);
	echo form_open('lists/see_course_grades');
	echo form_hidden('tableName','courses_columns');
	echo form_label("Choix de l'année  : ");
	echo form_dropdown('year',$years);
	echo form_hidden('id',$course_id);
	echo form_submit("submit","Afficher les notes");
	echo form_close();
	
		$i=0;
	  	echo '</br>';
	  	echo '</br>';
		echo form_open('lists/update_course');
		foreach ($query->result() as $row){
?>
		   <TR >
			  <TD align="center"><?php echo $row->numero_etu;?>
			  </TD>
			  <TD align="center"><?php echo $row->lastname.' '.$row->firstname; 
			  	echo form_hidden('student'.$i,$row->student_id);
			  	echo form_hidden('gradesyear'.$i,$row->grades_year);?>
			  </TD>
			  <TD align="center"><?php echo form_input('td1'.$i,$row->td1,'size="2"').'/20';?>
			  </TD>
			  <TD align="center"><?php echo form_input('td1r'.$i,$row->td1_r,'size="2"').'/20';?>
			  </TD>
			  <TD align="center"><?php echo form_input('td2'.$i,$row->td2,'size="2"').'/20';?>
			  </TD>
			  <TD align="center"><?php echo form_input('td2r'.$i,$row->td2_r,'size="2"').'/20';?>
			  </TD>
			  <TD align="center"><?php echo form_input('exam'.$i,$row->exam,'size="2"').'/20';?>
			  </TD>
			  <TD align="center"><?php echo form_input('examr'.$i,$row->exam_r,'size="2"').'/20';?>
			  </TD>
			  <TD align="center"><?php echo $row->moyenne_tmp.'/20' ?>
			  </TD>
			  <TD align="center"><?php echo $row->moyenne_finale.'/20' ?>
			  </TD>	  
		   </TR>
<?php
	 	$i++;
		}
		echo form_hidden('course_id',$course_id);
		echo form_hidden('nb',$i);
		echo form_submit('submit','Enregistrer les modifications'); 
	  	echo form_close();
?> 
</TABLE>
</div>
