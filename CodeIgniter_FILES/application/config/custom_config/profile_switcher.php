<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

/*
 * Permet d'avoir chacun sa propre configuration en fonction du
 * répertoire où se situe ce fichier.
 * Créez une variable $chemin_<mon_nom> avec le nom de votre répertoire
 * contenant ce fichier, donnez comme valeur à la variable config_profile
 * par exemple votre nom.
 */
$chemin_suffixe = 'GestionDeNotes/CodeIgniter_FILES';

$chemin_ennitao = '/home/antoine/lampstack-5.4.16-0/apache2/htdocs/';
$chemin_ennitao = $chemin_ennitao . $chemin_suffixe;

$chemin_fatine = '/var/www/';
$chemin_fatine = $chemin_fatine . $chemin_suffixe;

if( getcwd( ) == $chemin_ennitao )
{
    $config['config_profile'] = 'ennitao';
}
else if( getcwd( ) == $chemin_fatine )
{

    $config['config_profile'] = 'fatine';
}
else
{
    $config['config_profile'] = 'default';
}


