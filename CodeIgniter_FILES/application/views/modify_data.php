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

	<h2> Ajouter un étudiant </ h2>
<?php
	echo '</br>';echo '</br>';


//Ouverture du formulaire
echo form_open('modify/modify_data');
switch($tableName){
	case 'students' :
		echo form_hidden('tableName','students');
		echo form_hidden('id',$id);
		//Initialisation des valeurs d'un dropdown (select)
		$titles = array(
		 'Madame'=>'Madame',
		 'Mademoiselle'=>'Mademoiselle',
		 'Monsieur'=>'Monsieur'
		);
		echo form_label("Civilité : ");
		echo form_dropdown("title",$titles,$title);
		echo '</br>';
		echo form_label("Nom : ");
		echo form_input('lastname',$lastname);
		echo '</br>';

		echo form_label("Prénom : ");
		echo form_input('firstname',$firstname);
		echo '</br>';

		echo form_label("Email : ");
		echo form_input('email',$email);
		echo '</br>';
		
		echo '<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/students" title="Retour">Retour</a></h5>';
		break;
	case 'courses':
		echo form_hidden('tableName','courses');
		echo form_hidden('id',$id);
		
		echo form_label("Nom : ");
		echo form_input('name',$name);
		echo '</br>';

		echo form_label("Raccourci : ");
		echo form_input('shortname',$shortname);
		echo '</br>';

		echo form_label("Commentaire : ");
		echo form_input('comment_group_id',$comment_group_id);
		echo '</br>';
		
	
		echo '<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/courses" title="Retour">Retour</a></h5>';
		break;
	}
	//Génération du bouton submit
	echo form_submit("submit","Enregistrer");

	//Fermeture du formulaire
	echo form_close();
?>
</body>
</html>
