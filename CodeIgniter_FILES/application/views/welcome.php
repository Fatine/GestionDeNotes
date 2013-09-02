<?php
/**
* views/welcome.php : vue de la première page affichée après connexion
*/
?>
<div id="container">

	<?php echo '<br/>'; echo anchor('/auth/logout/', 'Logout'); echo '<br/>';?>
	
	Bonjour <strong><?php echo $username.' '; ?></strong>!
	
		
		<p><a href="students">Gérer les étudiants</a></p>
		<p><a href="courses">Gérer les unités d'enseignement</a></p>
</div>

