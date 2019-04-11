<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;


require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class User extends REST_Controller
{
	public function __construct() {
    	parent::__construct();
        $this->load->model('user_model');
        header('Access-Control-Allow-Origin: *');
   	}

   	public function apiRegister_post()
   	{
   		$password =$this->input->post('password');
   		$password = password_hash($password, PASSWORD_DEFAULT);
   		$data = array(
       		'user_name' => $this->input->post('name'),
       		'user_password' => $password,
       	);
   		$r = $this->user_model->insert($data);
       	$this->response($r); 
   	} 

   	public function apiLogin_post()
   	{
   		$username = $this->input->post('name');
   		$password = $this->input->post('password');

   		$result= $this->user_model->getLogin($username, $password);
   		if ($result) {
   			$this->response($result);
   			// $this->load->view('dashboard');
   		} else {
   			$this->response('yoyo',REST_Controller::HTTP_BAD_REQUEST);
   		}	
   	}

   // 	public function login_get(){
   // 		if ($this->uri->segment(4) != NULL) {
   // 			$id = $this->uri->segment(4);
   // 			$r = $this->user_model->readWithId($id);
   // 			$this->response($r);
   // 		} else {
			// $r = $this->user_model->read();
   //     		$this->response($r); 
   // 		}
   // 	}

   	public function user_put(){
       	$id = $this->uri->segment(3);

       	$data = array(
       		'name' => $this->input->get('name'),
       		'pass' => $this->input->get('pass'),
       		'type' => $this->input->get('type')
       	);

        $r = $this->user_model->update($id,$data);
        $this->response($r); 
   	}

   	public function user_post(){
       	$data = array(
       		'name' => $this->input->post('name'),
       		'pass' => $this->input->post('pass'),
       		'type' => $this->input->post('type')
       	);
       	$r = $this->user_model->insert($data);
       	$this->response($r); 
   	}

   	public function user_delete(){
       $id = $this->uri->segment(3);
       $r = $this->user_model->delete($id);
       $this->response($r); 
   	}
}