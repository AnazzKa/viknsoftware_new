<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct() {
		parent::__construct();
		// $this->load->model('User_model');
		$this->load->library('session');
		$this->load->library('pagination');
		
	}

	public function index()
	{
		$this->load->view('index');
		
		
	}
	
	

}
