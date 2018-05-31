<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Wallet extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Wallet_model');
        $this->load->model('Card_model');
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
       $log_p_id=$this->session->userdata('parent_id');
        $data['title']="Vikn Software | Wallet";
        $data['suppliers']=$this->Wallet_model->get_all_suppliers($log_p_id);
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('wallet/suppliers');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
}