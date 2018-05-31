<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Ledger extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Receipts_model');
        $this->load->model('Account_model');
        $this->load->model('Discount_model');
        $this->load->library('session');
        $this->load->library('pagination');
    }


    public function ledger_view()
    {
        $id="";
        $title['title'] = "Vikn Software | ledger";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $data['account']=$this->Account_model->get_one_accounts($id);
            foreach($data['account'] as $value)
            {
                $type=$value->account_type;
            }
            $data['account_type']=$this->Account_model->get_one_account_type($type);
            if($id==7 || $id==8)
                $data['entries']=$this->Discount_model->get_all_entries($id);
            else
            $data['entries']=$this->Receipts_model->get_all_entries($id);



        }
        if($id==7 || $id==8)
            $this->load->view('ledger/discount_ledger_view',$data);
        else
            $this->load->view('ledger/ledger_view',$data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
}