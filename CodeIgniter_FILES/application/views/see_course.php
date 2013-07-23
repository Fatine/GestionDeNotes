
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
<h5><a href="http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/courses" title="Retour"-->Retour</a></h5>

<div id="content">

<TABLE border="1px"> 
  <CAPTION> Récapitulatif UE <?php echo $ue ?> </CAPTION> 
  <TR> 
 <TH width="300px"> Nom Prénom </TH> 
 <TH width="50px"> Td1 </TH>
 <TH width="50px"> Td1 rattrapage </TH>
 <TH width="50px"> Td2 </TH>
 <TH width="50px"> Td2 rattrapage </TH>
 <TH width="50px"> Examen </TH>
 <TH width="50px"> Exam rattrapage </TH>
 
 
 <TH width="80px"> Moyenne temporaire </TH>
 <TH width="80px"> Moyenne finale</TH>
  </TR> 
<?php
		foreach ($query->result() as $row){
?>
		   <TR >
			  <TD align="center"><?php echo $row->lastname.' '.$row->firstname; ?></TD>
			  <TD align="center"><?php echo $row->td1.'/20'  ?></TD>
			  <TD align="center"><?php echo $row->td1_r.'/20' ?></TD>
			  <TD align="center"><?php echo $row->td2.'/20'  ?></TD>
			  <TD align="center"><?php echo $row->td2_r.'/20' ?></TD>
			  <TD align="center"><?php echo $row->exam.'/20'  ?></TD>
			  <TD align="center"><?php echo $row->exam_r.'/20' ?></TD>
			  <TD align="center"><?php echo $row->moyenne_tmp.'/20' ?></TD>
			  <TD align="center"><?php echo $row->moyenne_finale.'/20' ?></TD>
		   </TR>
<?php
		}
?> 
</TABLE>

</div>

</body>
</html>
