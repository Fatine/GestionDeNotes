<?php
/**
* views/see_pv.php : vue du pv d'un bloc d'unités d'enseignement (par année)
* @author Fatine Nakkoubi
*/
?>
<div id="content">
<TABLE border="1px"> 
  <TR> 
  
 <TH width="10px"> Numéro étudiant </TH> 
 <TH width="300px"> Nom Prénom </TH> 
 <TH width="120px"> <?php echo $name1 ?> </TH>
 <TH width="120px"> <?php echo $name2  ?> </TH>
 <TH width="120px"> <?php echo $name3  ?> </TH>
  </TR> 
		  
<?php
	for($i=1;$i<$nb+1;$i++){
?>
		 <TR >
			  <TD align="center"><?php echo $numetu[$i] ?></TD>
			  <TD align="center"><?php echo $lastname[$i].' '.$firstname[$i]; ?></TD>
			  <TD align="center"><?php echo $moyenne1[$i].'/20' ?></TD>
			  <TD align="center"><?php echo $moyenne2[$i].'/20' ?></TD>
			  <TD align="center"><?php echo $moyenne3[$i].'/20' ?></TD>		  
		
  		</TR>	 
<?php		
		}
?> 
</TABLE>
</div>
