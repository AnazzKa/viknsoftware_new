<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Stock extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Wallet_model');
        $this->load->model('Card_model');
        $this->load->model('Account_model');
        $this->load->model('Agent_model');
        $this->load->model('Common_model');
        $this->load->model('Ledger_model');
        $this->load->library('session');
        $this->load->library('pagination');

    }
    public function stock_card()
    {
        $data['title']="Vikn Software | Wallet";
        if(isset($_REQUEST['id']))
            $data['user_id']=$_REQUEST['id'];
        else
            $data['user_id']=$this->session->userdata('ID');
        $data['cards_type']=$this->Card_model->get_all_card_type();
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('stock/stock_card');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function stock_wallet_cards()
    {
        $data['title']="Vikn Software | Wallet";
        if(isset($_REQUEST['id']))
        {
            $type_id=$_REQUEST['id'];
            $data['stocks']=$this->Common_model->direct_query("SELECT e.*,t.card_type_id,c.card_name,t.card_type FROM `vikn_cards_export` e INNER JOIN `vikn_cards_new` n ON e.`card_new_id`= n.`cards_new_id` INNER JOIN `vikn_cards` c ON c.card_id=n.card_item_id INNER JOIN `vikn_card_type` t ON t.card_type_id=c.card_type_id WHERE e.`sale`=0 AND e.`owen_user_id`=".$this->session->userdata('ID')." AND t.card_type_id=".$type_id);
        $this->load->view('static/head',$data);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('stock/stock_card_view',$data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
        }
    }
}