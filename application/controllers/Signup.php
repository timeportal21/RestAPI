<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('register');
	}

	public function login()
	{
		$this->load->view('login');
	}

}

/* End of file Signup.php */
/* Location: ./application/controllers/Signup.php */