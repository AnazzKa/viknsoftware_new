<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Wallet extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Wallet_model');
        $this->load->model('Card_model');
        $this->load->model('Account_model');
        $this->load->model('Agent_model');
        $this->load->model('Common_model');
        $this->load->library('session');
        $this->load->library('pagination');

    }
    public function wallet()
    {
        $data['title']="Vikn Software | Wallet";
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('wallet/wallet');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function supplier_cards()
    {
        $data['title']="Vikn Software | Wallet";
        $data['cards_type']=$this->Card_model->get_all_card_type();
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('wallet/supplier_cards');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function supplier_wallet_cards()
    {
        $data['title']="Vikn Software | Wallet";
        if(isset($_REQUEST['id'])){
            $id= $_REQUEST['id'];
            $pid= $_REQUEST['pid'];
        }
        $data['cards']=$this->Card_model->get_all_cards_cat($id,$pid);
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('wallet/supplier_wallet_cards');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function wallet_card_details()
    {
        $data['title']="Vikn Software | Wallet";
        $id=$_GET['id'];
        $data['cards']=$this->Card_model->get_one_cards($id);
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('wallet/wallet_card_details');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function wallet_cards_buy()
    {
        $data['title']="Vikn Software | Wallet";
        $id=$_GET['id'];
        if(isset($_POST['save']))
        {
            $sales_rate=$_POST['sales_rate'];
            $quantity=$_POST['quantity'];
            $type_mode=$_POST['type_mode'];
            $total=$_POST['total'];
            
            $account_id=$this->session->userdata('account_id');
            $account=$this->Account_model->get_one_accounts($account_id);
            if($account[0]->wallet>=$total){
              
            }else{
               $this->session->set_flashdata("msg", "<p class='alert alert-success'>Your Wallet Balance Is low</p>");
            header('Location:' . base_url . 'wallet_cards_buy'); 
            }
        }
        $data['cards']=$this->Card_model->get_one_cards($id);
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('wallet/wallet_cards_buy');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function suppliers()
    {
        $log_user_id= $_SESSION['ID'];
        $data['title']="Vikn Software | Wallet";
        $data['suppliers']=$this->Account_model->get_all_supplier($log_user_id);
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('wallet/suppliers');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function add_suppliers()
    {
        $data['btn'] = "Save";
        $title['title'] = "Vikn Software | Receipts ADD";

        if(isset($_POST['Save']))
        {

            $full_name=$_POST['full_name'];
            $phone_number=$_POST['phone_number'];
            $address=$_POST['address'];        
            $date=date('Y-m-d h:m:s');
            $log_user_id= $_SESSION['ID'];
            $query = [
                'account_name' =>$full_name,
                'account_type' => 8,
                'date' => date('Y-m-d h:m:s'),
                'address' => $address,
                'phone' => $phone_number,
                'created_user_id' => $log_user_id
            ];
            $last_id= $this->Account_model->insert_accounts($query);
            $query1 = [
                'username' => $full_name,
                'user_type' => 3,
                'user_name' => $full_name,
                'entry_date' => $date,
                'parent_id' => $log_user_id,
                'account_id' => $last_id

            ];
            $this->Agent_model->insert_agent_login($query1);
            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Supplier Added Sucessfully</p>");
            header('Location:' . base_url . 'suppliers');
        }

        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('wallet/add_suppliers', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function wallet_payment()
    {
     $data['btn'] = "Save";
     $title['title'] = "Vikn Software | Receipts ADD";
     if(isset($_POST['Save']))
     {  
        $customer_id=$_POST['customer_id'];
        $amount=$_POST['amount'];
        $log_user_id= $_SESSION['ID'];
        $query = [
            'customer_id' =>$customer_id,
            'entry_date' => date('Y-m-d h:m:s'),
            'amount' => $amount,
            'enatry_user' => $log_user_id
        ];
        $last_id= $this->Wallet_model->insert_wallet_payment($query);
        $qry2="UPDATE `vikn_accounts` SET `wallet`=`wallet`+$amount WHERE `account_id`=$customer_id";
     $update_supplier=$this->Common_model->update($qry2);

        $this->session->set_flashdata("msg", "<p class='alert alert-success'>Wallet Balance Updated Sucessfully</p>");
        header('Location:' . base_url . 'wallet_payment');
    }
    $data['all_item'] = $this->Account_model->get_all_accounts($this->session->userdata('ID'),3);
    $this->load->view('static/head', $title);
    $this->load->view('static/menu');
    $this->load->view('static/header');
    $this->load->view('wallet/wallet_payment', $data);
    $this->load->view('static/footer');
    $this->load->view('static/script');
}
}