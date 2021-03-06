<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Payments extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Card_model');
        $this->load->model('Account_model');
        $this->load->model('Payment_model');
        $this->load->model('Discount_model');
        $this->load->model('Ledger_model');
        $this->load->model('Common_model');
        $this->load->library('session');
        $this->load->library('pagination');
    }

    public function payments_add()
    {
        $data['btn'] = "Save";
        $data['all_type_item'] = $this->Card_model->get_all_card_type();
        $title['title'] = "Vikn Software | Payments";
        if(isset($_POST['Save']))
        {
            $payment_no=$_POST['payment_no'];
            $payment_into=$_POST['payment_into'];
            $payment_from=$_POST['payment_from'];
            $amount=$_POST['amount'];
            $discount=$_POST['discount'];
            $actul_amount=$amount-$discount;
            $Narration=$_POST['Narration'];
            $date=$_POST['date'];
            $query = [
                'payment_number' => $payment_no,
                'payment_into' => $payment_into,
                'payment_from' => $payment_from,
                'amount' => $amount,
                'discount' => $discount,
                'Narration' => $Narration,
                'datetime' => $date
            ];
            $id=  $this->Payment_model->insert($query);
            $query1 = [
                'discount_amount'=>$discount,
                'payment_id'=>$id,
                'received_into'=>8,
                'received_from'=>$payment_into,
                'datetime'=>$date,
                'Narration'=>$Narration,
                'receipts_number'=>$payment_no
            ];
            $this->Discount_model->insert($query1);
//transation
     $querypu = [
        'fin_year_id' => 1,
        'ref_id' => 4,
        'ref_key' =>  $id,
        'ledger_dr' => $payment_from,
        'ledger_cr' => $payment_into,
        'amount' => $actul_amount,
        'entry_date' => date('Y-m-d h:m:s'),
        'entry_user' => $this->session->userdata('ID')
    ];  
$purled_id= $this->Ledger_model->insert($querypu);
$this->Common_model->update("UPDATE `vikn_accounts` SET `balance`=`balance`+".$actul_amount." WHERE `account_id`=".$payment_into."");
$this->Common_model->update("UPDATE `vikn_accounts` SET `balance`=`balance`-".$actul_amount." WHERE `account_id`=".$payment_from."");
            
            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Payment Added Sucessfully</p>");
            header('Location:' . base_url . 'payments_add');
        }


        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('payments/payments_add', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function payments_list()
    {
        $title['title'] = "Vikn Software | Receipts View";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('payments/payments_list');
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
}