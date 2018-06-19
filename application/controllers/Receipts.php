<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Receipts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Card_model');
        $this->load->model('Account_model');
        $this->load->model('Receipts_model');
        $this->load->model('Discount_model');
        $this->load->model('Ledger_model');
        $this->load->model('Common_model');
        $this->load->library('session');
        $this->load->library('pagination');
    }

public function receipts_add()
{
$data['btn'] = "Save";
$data['all_type_item'] = $this->Card_model->get_all_card_type();
$title['title'] = "Vikn Software | Receipts ADD";

    if(isset($_POST['Save']))
    {
        $receipt_no=$_POST['receipt_no'];
        $received_into=$_POST['received_into'];
        $received_from=$_POST['received_from'];
        $amount=$_POST['amount'];
        $discount=$_POST['discount'];
        $actul_amount=$amount-$discount;
        $Narration=$_POST['Narration'];
        $date=$_POST['date'];
        $query = [
            'receipts_number' => $receipt_no,
            'received_into' => $received_into,
            'received_from' => $received_from,
            'amount' => $amount,
            'discount' => $discount,
            'Narration' => $Narration,
            'datetime' => $date
        ];
      $id=  $this->Receipts_model->insert($query);
        $query1 = [
            'discount_amount'=>$discount,
            'recepit_id'=>$id,
            'received_from'=>$received_from,
            'received_into'=>7,
            'datetime'=>$date,
            'Narration'=>$Narration,
            'receipts_number'=>$receipt_no
        ];
        $this->Discount_model->insert($query1);
        //transation
     $querypu = [
        'fin_year_id' => 1,
        'ref_id' => 3,
        'ref_key' =>  $id,
        'ledger_dr' => $received_from,
        'ledger_cr' => $received_into,
        'amount' => $actul_amount,
        'entry_date' => date('Y-m-d h:m:s'),
        'entry_user' => $this->session->userdata('ID')
    ];  
$purled_id= $this->Ledger_model->insert($querypu);
$this->Common_model->update("UPDATE `vikn_accounts` SET `balance`=`balance`+".$actul_amount." WHERE `account_id`=".$received_into."");
$this->Common_model->update("UPDATE `vikn_accounts` SET `balance`=`balance`-".$actul_amount." WHERE `account_id`=".$received_from."");
        $this->session->set_flashdata("msg", "<p class='alert alert-success'>Receipts Added Sucessfully</p>");
        header('Location:' . base_url . 'receipts_add');
    }



$this->load->view('static/head', $title);
$this->load->view('static/menu');
$this->load->view('static/header');
$this->load->view('receipts/recepits_add', $data);
$this->load->view('static/footer');
$this->load->view('static/script');
}
    public function receipts_list()
    {
        $title['title'] = "Vikn Software | Receipts View";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('receipts/recepits_list');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
}