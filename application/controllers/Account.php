<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Account extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Account_model');
        $this->load->model('Agent_model');
        $this->load->library('session');
        $this->load->library('pagination');
    }

    public function account_type() {
        $data['btn'] = "Save";
        if (isset($_POST['Save'])) {
            $account_type = $_POST['account_type'];
            $query = [
                'account_type' => $account_type,
                'date' => date('Y-m-d h:m:s')
            ];
            $this->Account_model->insert_account_type($query);
            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Account Type Added Sucessfully</p>");
            header('Location:' . base_url . 'account_type');
        }
        if (isset($_GET['delete'])) {
            $delete = $_GET['delete'];
            $this->Account_model->delete_account_type($delete);
            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Account Type Deleted</p>");
            header('Location:' . base_url . 'account_type');
        }
        if (isset($_GET['edit'])) {
            $edit = $_GET['edit'];
            $data['edit'] = $edit;
            $data['single_type_item'] = $this->Account_model->get_one_account_type($edit);
            $data['btn'] = "Update";
        }
        if (isset($_POST['Update'])) {
            $account_type = $_POST['account_type'];
            $edit = $_POST['edit'];
            $query = [
                'account_type' => $account_type,
                'date' => date('Y-m-d h:m:s')
            ];
            $this->Account_model->update_account_type($query, $edit);
            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Account Type Modify Sucessfully</p>");
            header('Location:' . base_url . 'account_type');
        }
        $data['all_type_item'] = $this->Account_model->get_all_account_type();
        $title['title'] = "Vikn Software | Account Type";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('account/account_type', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    //create account
    public function create_account()
    {
        $data['btn'] = "Save";
        if (isset($_POST['Save'])) {
            $account_name=$_POST['account_name'];
            $account_type = $_POST['account_type'];
            if(isset($_POST['address']))
                $address=$_POST['address'];
            else
                $address="";
            if(isset($_POST['phone']))
                $phone=$_POST['phone'];
            else
                $phone="";
            if(isset($_POST['email']))
                $email=$_POST['email'];
            else
                $email="";
            if(isset($_POST['password']))
                $password=$_POST['password'];
            else
                $password="";
            if(isset($_POST['commission_per_card']))
                $commission_per_card=$_POST['commission_per_card'];
            else
                $commission_per_card="";
            $query = [
                'account_name' =>$account_name,
                'account_type' => $account_type,
                'date' => date('Y-m-d h:m:s'),
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
                'password' => $password,
                'commission_per_card' => $commission_per_card,
                'created_user_id' => $this->session->userdata('ID')
            ];
           $last_id= $this->Account_model->insert_accounts($query);
            $query1 = [
                'username' => $email,
                'password' => $password,
                'user_type' => 2,
                'user_name' => $account_name,
                'account_id' => $last_id,
                'date' => date('Y-m-d h:m:s'),
                'parent_id' => $this->session->userdata('ID')
            ];
            $this->Agent_model->insert_agent_login($query1);

            // $query2 = [
            //     'account_name' =>'Cash',
            //     'account_type' => 7,
            //     'date' => date('Y-m-d h:m:s'),
            //     'created_user_id' => $this->session->userdata('ID'),
            //     'account_link_id'=>$last_id
            // ];
            // $this->Account_model->insert_accounts($query2);

            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Account  Added Sucessfully</p>");
            header('Location:' . base_url . 'create_account');
        }
        if (isset($_GET['delete'])) {
            $delete = $_GET['delete'];
            $this->Account_model->delete_accounts($delete);
            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Account  Deleted</p>");
            header('Location:' . base_url . 'create_account');
        }
        if (isset($_GET['edit'])) {
            $edit = $_GET['edit'];
            $data['edit'] = $edit;
            $data['single_item'] = $this->Account_model->get_one_accounts($edit);
            $data['btn'] = "Update";
        }
        if (isset($_POST['Update'])) {
            $account_name=$_POST['account_name'];
            $account_type = $_POST['account_type'];
            if(isset($_POST['address']))
                $address=$_POST['address'];
            else
                $address="";
            if(isset($_POST['phone']))
                $phone=$_POST['phone'];
            else
                $phone="";
            if(isset($_POST['email']))
                $email=$_POST['email'];
            else
                $email="";
            if(isset($_POST['password']))
                $password=$_POST['password'];
            else
                $password="";
            if(isset($_POST['commission_per_card']))
                $commission_per_card=$_POST['commission_per_card'];
            else
                $commission_per_card="";
            $edit = $_POST['edit'];
            $query = [
                'account_name' =>$account_name,
                'account_type' => $account_type,
                'date' => date('Y-m-d h:m:s'),
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
                'password' => $password,
                'commission_per_card' => $commission_per_card
            ];
            $this->Account_model->update_accounts($query, $edit);
            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Account Modify Sucessfully</p>");
            header('Location:' . base_url . 'create_account');
        }
        $data['all_type_item'] = $this->Account_model->get_all_account_type();
        $data['all_item'] = $this->Account_model->get_all_accounts($this->session->userdata('ID'),'');
        $title['title'] = "Vikn Software | Account Creation";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('account/account_creation', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script'); 
    }
}
