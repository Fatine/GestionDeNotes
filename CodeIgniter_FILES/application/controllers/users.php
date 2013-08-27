<?php
class users extends Controller{

 function users(){
 	parent::Controller();
	$this->load->library("pagination");
 }

 function index(){
 	$data=array();
	$data2['body']=$this->load->view('users_module', $data, true);
 	$this->load->view('template', $data2);    
 }

 function add_user(){
 	$data=array();
	$data2['body']=$this->load->view('user_add_new', $data, true);
 	$this->load->view('template', $data2);    
 }
}
