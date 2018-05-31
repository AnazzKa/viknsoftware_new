<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Agent extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Agent_model');
        $this->load->library('session');
        $this->load->library('pagination');
    }

    public function create_agent()
    {
        $data['btn'] = "Save";
        if (isset($_POST['Save'])) {
            $agent_id = $_POST['agent_id'];
            $agent_name = $_POST['agent_name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $query = [
                'agent_id_new' => $agent_id,
                'agent_name' => $agent_name,
                'address' => $address,
                'email' => $email,
                'phone' => $phone,
                'password' => $password,
                'date' => date('Y-m-d h:m:s')
            ];
            $insert_id= $this->Agent_model->insert_agent($query);
            $query1 = [
                'username' => $email,
                'password' => $password,
                'user_type' => 2,
                'user_name' => $agent_name,
                'agent_id' => $insert_id,
                'date' => date('Y-m-d h:m:s')
            ];
            $this->Agent_model->insert_agent_login($query1);
            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Agent Creation Done</p>");
            header('Location:' . base_url . 'list_agent');
        }
        if (isset($_GET['edit'])) {
            $edit = $_GET['edit'];
            $data['edit'] = $edit;
            $data['single_agent'] = $this->Agent_model->get_one_agent($edit);
            $data['btn'] = "Update";
        }
        if (isset($_POST['Update'])) {
            $edit = $_POST['edit'];
            $agent_id = $_POST['agent_id'];
            $agent_name = $_POST['agent_name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $query = [
                'agent_id_new' => $agent_id,
                'agent_name' => $agent_name,
                'address' => $address,
                'email' => $email,
                'phone' => $phone,
                'password' => $password,
                'date' => date('Y-m-d h:m:s')
            ];
            $this->Agent_model->update_agent($query, $edit);

            $query1 = [
                'username' => $email,
                'password' => $password,
                'user_name' => $agent_name,
                'date' => date('Y-m-d h:m:s')
            ];
            $this->Agent_model->update_agent_login($query1,$edit);

            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Agent Modification Sucessfully Done</p>");
            header('Location:' . base_url . 'list_agent');
        }

        $title['title'] = "Vikn Software | Income";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('agent/create_agent', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function list_agent()
    {
        if (isset($_GET['delete'])) {
            $delete = $_GET['delete'];
            $this->Agent_model->delete_agent($delete);
            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Agent Deleted</p>");
        }
        $title['title'] = "Vikn Software | Cards View";
        $data['all_agent'] = $this->Agent_model->get_all_agents();
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('agent/list_agent',$data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }

    public function agent_view()
    {
        $data['title']="Vikn Software | Customer";
        $data['agent_full']=$this->Agent_model->get_all_agents();
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('agent/agent_view');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function agent_transactions()
    {
        $data['title']="Vikn Software | Customer | Transaction";
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('agent/agent_transactions');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }

}