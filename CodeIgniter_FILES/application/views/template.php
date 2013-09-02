<?php
/**
* views/template.php : vue gestion des template (header, body, footer)
* @author Fatine Nakkoubi
*/
?>
<?php
$this->load->view('header'); 
echo $body;
$this->load->view('footer'); 
?>
