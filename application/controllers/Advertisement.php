<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Advertisement extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $this->load->model('Card_model');
        $this->load->library('session');
        $this->load->library('pagination');
    }

    public function advertisement_add()
    {
        $data['btn'] = "Save";
        $title['title'] = "Vikn Software | Income";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('advertisement/advertisement_add', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function advertisement_list()
    {
        $title['title'] = "Vikn Software | Cards View";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('advertisement/advertisement_list');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
}