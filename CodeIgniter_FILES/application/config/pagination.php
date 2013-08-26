<?php
if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

$config=array();

//The page we are linking to :
$config["base_url"] = 'http://localhost/GestionDeNotes/CodeIgniter_FILES/index.php/lists/list_users/' ; // base_url."fin de l'url"

//A custom prefix added to path :
$config["prefix"] = '';
     
//A custom suffix added to path :
$config["suffix"] = '';

//Total number of items (database results)
$config["total_rows"] = '6';

// Max number of items you want shown per page
$config["per_page"] = '2';

// Number of "digit" links to show before/after the currently viewed page
$config["num_links"] = '2';

// The current page being viewed
$config["cur_page"] = '0';

// Use page number for segment instead of offset
$config["use_page_numbers"] = 'FALSE';

// Alternative URL for the First Page.
$config["first_url"] = '';

//Enclose the entiere pagination
$config["full_tag_open"]='<p>'; //the beginning tag 
$config["full_tag_close"]='</p>'; //the ending tag

/* End of file pagination.php */
/* Location: ./application/config/pagination.php */
