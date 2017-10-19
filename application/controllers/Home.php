<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
         $this->load->model('Login_model');
        $this->load->library('session');
        $this->load->library('pagination');

    }

    public function index()
    {
        $data['title']="Vikn Login Form";
        $this->load->view('static/head');
       $this->load->view('static/menu');
        $this->load->view('home/index',$data);
        $this->load->view('static/footer');
       $this->load->view('static/script');

    }
}