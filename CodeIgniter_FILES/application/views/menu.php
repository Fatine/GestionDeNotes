<?php
    function affiche_menu()
    {
        // tableaux contenant les liens d'accès et le texte à afficher
        $tab_menu_texte = array( 
       		"Accueil", 
       		"Inscription Etudiant", 
       		"Notes 1ères années", 
       		"Notes 2èmes années", 
       		"Notes 3èmes années", 
       		"Notes 4èmes années", 
       		"Impressions");
        $tab_menu_lien = array(
        		"http://localhost/GestionDeNotes/CodeIgniter_FILES/", 
        		"http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/modify/add_student/", 
        		"", 
        		"", 
        		"", 
        		"",
        		"http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/impressions" );
         
        // informations sur la page
        $info = pathinfo($_SERVER['PHP_SELF']);
 
        $menu = "\n<div id=\"menu\">\n    <ul id=\"onglets\">\n";
 
         
 
        // boucle qui parcours les deux tableaux
        foreach($tab_menu_lien as $cle=>$lien)
        {
            $menu .= "    <li";
                 
            // si le nom du fichier correspond à celui pointé par l'indice, alors on l'active
            if( $info['basename'] == $lien )
                $menu .= " class=\"active\"";
                 
            $menu .= "><a href=\"" . $lien . "\">" . $tab_menu_texte[$cle] . "</a></li>\n";
        }
         
        $menu .= "</ul>\n</div>";
         
        // on renvoie le code xHTML
        return $menu;        
    }
?>
