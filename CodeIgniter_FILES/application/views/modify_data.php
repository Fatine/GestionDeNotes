<?php
/**
* views/modify_data.php : vue pour la modification des informations (unité d'enseignement ou etudiant)
* @author Fatine Nakkoubi
*/
	echo '<h2> Modifier les informations </ h2></br>';echo '</br>';


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
	case 'courses_columns':
		echo form_hidden('tableName','courses_columns');
		echo form_hidden('id',$id);
		
		echo form_label("Nom : ");
		echo form_input('name',$name);
		echo '</br>';

		echo form_label("Raccourci : ");
		echo form_input('shortname',$shortname);
		echo '</br>';

		echo form_label("Commentaire (500 caractères maximum) : ");
		echo form_textarea('description',$description);
		echo '</br>';
		
	
		echo '<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/courses" title="Retour">Retour</a></h5>';
		break;
	}
	//Génération du bouton submit
	echo form_submit("submit","Enregistrer");

	//Fermeture du formulaire
	echo form_close();
?>
