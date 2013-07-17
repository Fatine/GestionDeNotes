<?php
class users extends Controller{

 function users(){
 	parent::Controller();
	$this->load->library("pagination");
 }

 function index(){
 $this->load->view('users_module');
 }

 function add_user(){
 $this->load->view('user_add_new');
 }
}
