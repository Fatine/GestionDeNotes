<div class="decalage">
<?php
/**
* views/add_student.php : vue de l'ajout d'un étudiant
* @author Fatine Nakkoubi
*/
	echo '<h2 class="decalage"> Ajouter un étudiant </h2>';

	//Ouverture du formulaire
	echo form_open('modify/add');

	echo form_hidden('tableName1','students');
	//Initialisation des valeurs d'un dropdown (select)
	$titles = array(
	 'Madame'=>'Madame',
	 'Mademoiselle'=>'Mademoiselle',
	 'Monsieur'=>'Monsieur'
	);
	echo form_label("Civilité &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ");
	echo form_dropdown("title",$titles);
	echo '</br>';
	echo form_label("Nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ");
	echo form_input('lastname');
	echo '</br>';

	echo form_label("Prénom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :    ");
	echo form_input('firstname');
	echo '</br>';

	echo form_label("N° étudiant : ");
	echo form_input('numero_etu');
	echo '</br>';
	
	echo form_label("Email  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : ");
	echo form_input('email');
	
	echo '</br>';
	echo'</div><hr><div class="decalage">';
	echo 'A quelle(s) Unité(s) d\'Enseignement l\'étudiant(e) sera-t-il(elle) inscrit(e) ?';
	echo '</br><div class="decalage">';
	
	foreach($query->result() as $row){
?>
		<input type="checkbox"name="ue[]" value="<?php echo '&nbsp;'.$row->name;?>"><?php echo '&nbsp;'.$row->name.'</br>';?>
<?php
	}
	echo '</div></br>';
	
	echo form_label("Année de passage des Unité(s) d'Enseignement : ");
	echo form_input('annee');
	
	echo '</br>';
	echo '</br>';
	//Génération du bouton submit
	echo form_submit("submit","Enregistrer");

	//Fermeture du formulaire
	echo form_close();
?>
</div>
