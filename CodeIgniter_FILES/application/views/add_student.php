	<h2> Ajouter un étudiant </h2>
<?php
	echo '</br>';echo '</br>';

	//Ouverture du formulaire
	echo form_open('modify/add');

	echo form_hidden('tableName1','students');
	//Initialisation des valeurs d'un dropdown (select)
	$titles = array(
	 'Madame'=>'Madame',
	 'Mademoiselle'=>'Mademoiselle',
	 'Monsieur'=>'Monsieur'
	);
	echo form_label("Civilité : ");
	echo form_dropdown("title",$titles);
	echo '</br>';
	echo form_label("Nom : ");
	echo form_input('lastname');
	echo '</br>';

	echo form_label("Prénom : ");
	echo form_input('firstname');
	echo '</br>';

	echo form_label("Numéro étudiant : ");
	echo form_input('numero_etu');
	echo '</br>';
	/*
	echo form_label("Email : ");
	echo form_input('email');*/
	echo '</br>';
	
	echo form_label("Année de passage des ues : ");
	echo form_input('annee');
	echo '</br>';
	
	echo 'Cocher les ues adéquates';
	echo '</br>';
	
	foreach($query->result() as $row){
?>
		<input type="checkbox"name="ue[]" value="<?php echo $row->name;?>"><?php echo $row->name.'</br>';?>
<?php
	}
	echo '</br>';
	
	//Génération du bouton submit
	echo form_submit("submit","Enregistrer");

	//Fermeture du formulaire
	echo form_close();
	
	echo '<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/students" title="Retour">Retour</a></h5>';
?>
