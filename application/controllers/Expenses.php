<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Expenses extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Card_model');
        $this->load->library('session');
        $this->load->library('pagination');
    }

    public function expenses_add()
    {
        $data['btn'] = "Save";
        $data['all_type_item'] = $this->Card_model->get_all_card_type();
        $title['title'] = "Vikn Software | Income";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('expenses/expenses_add', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function expenses_list()
    {
        $title['title'] = "Vikn Software | Cards View";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('expenses/expenses_list');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
}