<!--DOCTYPE html>
<!--html>
    <head>
        <meta charset="UTF-8">
        <meta name="keywords" content="Lyon3, gestion, notes, étudiant, FDV">
        <meta name="description" content="Outils de gestion de notes pour la Fac de Droit Virtuelle">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Twitter bootstrap. >
        <link type="text/css"
                href="<?= base_url() . APPPATH ?>
                    css/bootstrap/bootstrap.min.css" rel="stylesheet" >
    </head>
    <body-->
<?php
    require_once("menu.php");       
    $menu = affiche_menu();
?>
<?php
/**
* views/header.php : en-tête des pages pour le template
* @author Fatine Nakkoubi
*/
ini_set("display_errors",0);error_reporting(0);
?>    
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Gestionnaire de notes</title>
	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }
	
	#onglets {
		   position : absolute;
		   border : 1px solid transparent;
		   padding : 0;
		   font : bold 11px Batang, arial, serif;
		   list-style-type : none;
		   left : 50%;
		   margin-top : 0;
		   width : 1000px;
		   margin-left : -400px; /* la moitié de width */
	}
	
	#onglets li{
		    float : left;
		    height : 21px; /* à modifier suivant la taille de la police pour centrer le texte dans l'onglet */
		    background-color: #F4F9FD;
		    margin : 2px 2px 0 4px !important;  /* Pour les navigateurs autre que IE */
		    margin : 1px 2px 0 4px;  /* Pour IE  */
		    border : 1px solid #9EA0A1;
	}
	
	#onglets li.active{
		    border-bottom: 1px solid #fff;
		    background-color: #fff;
	}
	
	#onglets as{
		    display : block;
		    color : #666;
		    text-decoration : none;
		    padding : 4px;
		}
	#onglets a:hover {
		    background : #fff;
	}
	
	#menu {
		   border-bottom : 1px solid #9EA0A1;
		   padding-bottom : 25px;
	}
	
	#body {
		background-color: #fff;
		//margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		//color: #4F5155;
	}
	.decalage { 
		margin-left : 150px 
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

<?php
    echo $menu;
?>

