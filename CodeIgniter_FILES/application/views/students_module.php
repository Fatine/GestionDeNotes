
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
<h1>Gérer les étudiants</h1>
<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/" title="Retour"-->Retour à l'accueil</a></h5>

<div id="content">
<a href="modify/add_student/">Ajouter un étudiant</a>
<TABLE align="center" border="1px"> 
  <CAPTION> Tableau des étudiants </CAPTION> 
  <TR> 
 <TH width="100px"> Nom </TH> 
 <TH width="100px"> Prénom </TH>
 <TH width="100px"> email </TH>
  </TR> 
<?php
	foreach ($query->result() as $row){
	   echo '<TR >';
	   echo '  <TD align="center">'.$row->lastname.'</TD>';
	   echo '  <TD align="center">'.$row->firstname.'</TD>';
	   echo '  <TD align="center">'.$row->email.'</TD>';
	   echo '  <TD style="border:1px solid black"><a href="lists/grades_student/">Voir</a></TD>';
	   echo '  <TD style="border:1px solid black"><a href="modify/modify_student/">Modifier</a></TD>';
	   echo '  <TD style="border:1px solid black"><a href="modify/delete_student/">Supprimer</a></TD>';
	   echo '</TR>';
	}
?> 
</TABLE>
<?php
	
	$order = array(
		 'byLastname'=>'Par Nom',
		 'byFirstname'=>'Par Prénom',
		 'byDiploma'=>'Par Diplôme',
		);
	$AscDesc = array(
		 'ASC'=>'croissant',
		 'DESC'=>'décroissant',
		);
		
	echo form_open('lists/order');
	
	echo form_hidden('tableName','students');
		
	echo form_label("Tri : ");
	echo form_dropdown("order",$order);
	
	echo form_label("Par ordre : ");
	echo form_dropdown("AscDesc",$AscDesc);
	
	
	echo form_submit("submit","Trier");

?>
</div>

</body>
</html>
