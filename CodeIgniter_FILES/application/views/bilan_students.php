	<h2> Bilan de notes </h2> 
	<h4> <?php echo '</br>'.$lastname.' '.$firstname.'</br> num&eacute;ro &eacute;tudiant : '.$numero_etu; ?> </h4>
<div id="content">

<TABLE border="1px"> 
  <CAPTION> </CAPTION> 
  <TR> 
 <TH width="300px"> Unit&eacute; d'enseignement </TH>
 <TH width="100px"> Ann&eacute;e </TH> 
 <TH width="100px"> Note </TH>
 <TH width="100px"> Etat </TH>
  </TR> 
<?php
		foreach ($query->result() as $row){
?>
		   <TR >
			  <TD align="center"><?php  echo $row->name ?></TD>
			  <TD align="center"><?php  echo $row->grades_year  ?></TD>
			  <TD align="center"><?php  echo $row->moyenne_finale.'/20';   ?></TD>
			  <TD align="center"><?php  if($row->moyenne_finale<10){echo "DEF";}else{echo "ADM";}  ?></TD>
		   </TR>
<?php
		}
	
?> 
</TABLE>

</div>

