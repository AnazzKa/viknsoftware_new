<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
         $this->load->model('Login_model');
        $this->load->library('session');
        $this->load->library('pagination');

    }

    public function index()
    {
        $data['title']="Vikn Login Form";
//        $this->load->view('static/head');
//        $this->load->view('static/menu');
        $this->load->view('login/login',$data);
//        $this->load->view('static/footer');
//        $this->load->view('static/script');

    }
public function login_action()
	{
		$user=$_POST['username'];
		$pass=$_POST['password'];

		$log=$this->Login_model->login_action($user,$pass);
		if($log==true)
		{
			header('Location:'.base_url.'Dashboard');
		}else{
			$this->session->set_flashdata("msg","<p class='alert alert-danger'>Sorry Invalid Login!<p>");
			header("Location:".base_url."login");
		}

	}

	public function logout()
	{

		$sql=array("ID"=>"","NAME"=>"",'TYPE'=>"",'USER_NAME'=>"");
		$this->session->set_userdata($sql);
		$this->session->set_flashdata("msg","<p class='alert alert-success'>You are logged out successfully!</p>");
		header("Location:".base_url."login");

	}


}
