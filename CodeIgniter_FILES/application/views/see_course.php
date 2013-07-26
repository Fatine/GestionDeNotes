
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Gestionnaire de notes</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>

</head>
<body>
<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/courses" title="Retour"-->Retour</a></h5>

<div id="content">

<TABLE border="1px"> 
  <CAPTION> Récapitulatif UE <?php echo $ue ?> </CAPTION> 
  <TR> 
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
$i=0;
		echo form_open('lists/update_course');
		foreach ($query->result() as $row){
?>
		   <TR >
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
		echo form_submit('submit','Enregistrer'); 
	  	echo form_close();
?> 
</TABLE>

</div>

</body>
</html>