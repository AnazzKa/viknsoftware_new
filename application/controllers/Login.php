<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        // $this->load->model('User_model');
        $this->load->library('session');
        $this->load->library('pagination');

    }

    public function index()
    {
        $this->load->view('static/head');
        $this->load->view('static/menu');
        $this->load->view('login/index');
        $this->load->view('static/footer');
        $this->load->view('static/script');

    }



}
