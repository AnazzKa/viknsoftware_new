<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
         $this->load->model('Login_model');
         $this->load->model('Account_model');
         $this->load->model('Agent_model');
         $this->load->model('Common_model');
        $this->load->library('session');
        $this->load->library('pagination');

    }

    public function index()
    {
        $data['title']="Vikn Software | Dashboard";
        $data['account']=$this->Account_model->get_single_account(7);
        $data['agent']=$this->Account_model->get_single_account(3);
        $this->load->view('static/head',$data);
       $this->load->view('static/menu');
       $this->load->view('static/header');
        $this->load->view('home/index');
        $this->load->view('static/footer');
       $this->load->view('static/script');

    }
    public function home()
    {
        $data['title']="Vikn Software | Dashboard2";
        $this->load->view('static/head',$data);
       $this->load->view('static/menu');
       $this->load->view('static/header');
        $this->load->view('home/home');
        $this->load->view('static/footer');
       $this->load->view('static/script');

    }
    public function other_accounts()
    {
        $data['account_type'] = $this->Account_model->get_all_account_type();
        $data['title']="Vikn Software | Dashboard2";
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('home/other_accounts',$data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function cash_in_hand()
    {
        $data['title']="Vikn Software | Cash In Hand";
        $data['account']=$this->Account_model->get_single_account(7);
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('home/cash_in_hand');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function customer()
    {
        $data['title']="Vikn Software | Customer";
        $data['agent']=$this->Account_model->get_single_account(3);
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('home/customer');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function create_customer()
    {
        $data['btn'] = "Save";
        $data['title']="Vikn Software | create_customer";
       if(isset($_POST['Save']))
    {

        $full_name=$_POST['full_name'];
        $phone_number=$_POST['phone_number'];
        $address=$_POST['address'];        
        $date=date('Y-m-d h:m:s');
        $log_user_id= $_SESSION['ID'];
        $query = [
            'account_name' =>$full_name,
            'account_type' => 3,
            'date' => date('Y-m-d h:m:s'),
            'address' => $address,
            'phone' => $phone_number,
            'created_user_id' => $log_user_id
        ];
        $last_id= $this->Account_model->insert_accounts($query);
        $query1 = [
            'username' => $full_name,
            'user_type' => 4,
            'user_name' => $full_name,
            'entry_date' => $date,
            'parent_id' => $log_user_id,
            'account_id' => $last_id

        ];
        $this->Agent_model->insert_agent_login($query1);
        $this->session->set_flashdata("msg", "<p class='alert alert-success'>Supplier Added Sucessfully</p>");
        header('Location:' . base_url . 'customer');
    }
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('home/create_customer');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
}