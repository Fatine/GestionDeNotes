<?php
class users extends Controller{

 function users(){
 parent::Controller();

 }

 function index(){
 $this->load->view('users_module');
 }

 function add_user(){
 $this->load->view('user_add_new');
 }
}
