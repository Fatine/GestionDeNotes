
	
<?php
/**
* views/add_course.php : vue de l'ajout d'une unité d'enseignement
* @author Fatine Nakkoubi
*/

	echo '<h2> Ajouter une unité d\'enseignement </ h2> </br></br>';

	//Ouverture du formulaire
	echo form_open('modify/add_c');

	echo form_hidden('tableName','courses_columns');
	
	//Initialisation des valeurs d'un dropdown (select)
	echo form_label("Nom : ");
	echo form_input('name');
	echo '</br>';

	echo form_label("Raccourci : ");
	echo form_input('shortname');
	echo '</br>';

	echo form_label("Commentaire : ");
	echo form_textarea('description');
	echo '</br>';

	//Génération du bouton submit
	echo form_submit("submit","Enregistrer");

	//Fermeture du formulaire
	echo form_close();
	
	echo '<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/courses" title="Retour">Retour</a></h5>';
?>

