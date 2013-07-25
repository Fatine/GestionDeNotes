
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
<h1>G&eacute;rer les &eacute;tudiants</h1>
<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/students" title="Retour"-->Retour</a></h5>

<div id="content">

<TABLE border="1px"> 
  <CAPTION> Récapitulatif étudiant </CAPTION> 
  <TR> 
 <TH width="100px"> Année </TH> 
 <TH width="300px"> Ue </TH>
 <TH width="100px"> Note </TH>
 <TH width="100px"> Etat </TH>
  </TR> 
<?php
		foreach ($query->result() as $row){
?>
		   <TR >
			  <TD align="center"><?php  echo $row->grades_year  ?></TD>
			  <TD align="center"><?php  echo $row->name ?></TD>
			  <TD align="center"><?php  echo $row->moyenne_finale.'/20';   ?></TD>
			  <TD align="center"><?php  if($row->moyenne_finale<10){echo "DEF";}else{echo "ADM";}  ?></TD>
		   </TR>
<?php
		}
	
?> 
</TABLE>

ADM=admis 
DEF=défaillant
</div>

</body>
</html>
