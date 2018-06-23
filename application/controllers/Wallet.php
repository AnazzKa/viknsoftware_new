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
        $this->load->model('Ledger_model');
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
        if(isset($_REQUEST['id']))
        $data['user_id']=$_REQUEST['id'];
    else
    $data['user_id']=$this->session->userdata('ID');
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
            $data['uid']= $_REQUEST['uid'];
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
        if(isset($_REQUEST['id']))
       $data['id']=$id=$_REQUEST['id'];
   if(isset($_REQUEST['uid']))
       $data['uid']= $uid=$_REQUEST['uid'];
        if(isset($_POST['save']))
        {
            $id=$_POST['id'];
            $uid=$_POST['uid'];
            $sales_rate=$_POST['sales_rate'];
            $quantity=$_POST['quantity'];
            $type_mode=$_POST['type_mode'];
            $total=$_POST['total'];
            $account_id=$this->session->userdata('account_id');
            $account=$this->Account_model->get_one_accounts($account_id);
            if($account[0]->wallet>=$total){
$count=$this->Common_model->direct_query("SELECT c.sales_rate,COUNT(*)AS 'count' FROM `vikn_cards_export` e INNER JOIN vikn_cards_new n ON e.card_new_id = n.cards_new_id INNER JOIN vikn_cards c ON n.card_item_id=c.card_id WHERE `owen_user_id`=$uid AND `sale`=0");
$sales_rate=$count[0]->sales_rate;
$count=$count[0]->count;
if(($sales_rate*$count)>$total){
$cards=$this->Common_model->direct_query("SELECT e.*,c.sales_rate FROM `vikn_cards_export` e INNER JOIN vikn_cards_new n ON e.card_new_id = n.cards_new_id INNER JOIN vikn_cards c ON n.card_item_id=c.card_id WHERE `owen_user_id`=$uid AND `sale`=0 ");
for ($i=0; $i < $quantity; $i++) { 
    $export_id= $cards[$i]->export_id;
$qry=[
    'date_purchase' => date('Y-m-d h:m:s'),
    'cus_purchse_id' => $uid,
    'owen_user_id' => $this->session->userdata('ID')
];
$this->Card_model->customer_card_purchase($qry,$export_id);
$this->session->set_flashdata("msg", "<p class='alert alert-success'>Cards Purchased</p>");
             header('Location:' . base_url . 'wallet_cards_buy?id='.$id.'&uid='.$uid.''); 
}
$this->Common_model->update("UPDATE `vikn_accounts` SET `wallet`=`wallet`-".$total." WHERE `account_id`=".$this->session->userdata('account_id'));


}else{
  $this->session->set_flashdata("msg", "<p class='alert alert-success'>Cards No Stock</p>");
             header('Location:' . base_url . 'wallet_cards_buy?id='.$id.'&uid='.$uid.'');   
}
            }else{
             $this->session->set_flashdata("msg", "<p class='alert alert-success'>Wallet Balnce is low</p>");
             header('Location:' . base_url . 'wallet_cards_buy?id='.$id.'&uid='.$uid.''); 
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
    $data['suppliers']=$this->Account_model->get_all_supplier($log_user_id,3);
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
public function suppliers_list()
{
    $title['title'] = "Vikn Software | Receipts ADD";
    $data['suppliers']=$this->Account_model->get_supplier_list($this->session->userdata('parent_id'));
    $this->load->view('static/head', $title);
    $this->load->view('static/menu');
    $this->load->view('static/header');
    $this->load->view('wallet/suppliers_list', $data);
    $this->load->view('static/footer');
    $this->load->view('static/script');  
}
public function wallet_card_sales()
{
    $title['title'] = "Vikn Software | Sales";
    $data['owner_cards']=$this->Common_model->direct_query("SELECT * FROM `vikn_cards_export` WHERE `owen_user_id`=".$this->session->userdata('ID')." AND `sale`=0 GROUP BY `card_new_id` ");
    $data['uid']='';
    $this->load->view('static/head', $title);
    $this->load->view('static/menu');
    $this->load->view('static/header');
    $this->load->view('wallet/wallet_card_sales', $data);
    $this->load->view('static/footer');
    $this->load->view('static/script');    
}
public function wallet_cards_sales()
{
    $data['title']="Vikn Software | Wallet";
        if(isset($_REQUEST['id']))
       $data['id']=$id=$_REQUEST['id'];
   if(isset($_REQUEST['uid']))
       $data['uid']= $uid=$_REQUEST['uid'];
        if(isset($_POST['save']))
        {
            $id=$_POST['id'];
            $uid=$_POST['uid'];
            $sales_rate=$_POST['sales_rate'];
            $quantity=$_POST['quantity'];
            $type_mode=$_POST['type_mode'];
            $total=$_POST['total'];
            $customer_id=$_POST['customer_id'];
            $account_id=$this->session->userdata('account_id');
            $account=$this->Account_model->get_one_accounts($account_id);


$count=$this->Common_model->direct_query("SELECT c.sales_rate,COUNT(*)AS 'count' FROM `vikn_cards_export` e INNER JOIN vikn_cards_new n ON e.card_new_id = n.cards_new_id INNER JOIN vikn_cards c ON n.card_item_id=c.card_id WHERE `owen_user_id`=$uid AND `sale`=0");
$sales_rate=$count[0]->sales_rate;
$count=$count[0]->count;
if(($sales_rate*$count)>$total){
$cards=$this->Common_model->direct_query("SELECT e.*,c.sales_rate FROM `vikn_cards_export` e INNER JOIN vikn_cards_new n ON e.card_new_id = n.cards_new_id INNER JOIN vikn_cards c ON n.card_item_id=c.card_id WHERE `owen_user_id`=$uid AND `sale`=0 ");
for ($i=0; $i < $quantity; $i++) { 
    $export_id= $cards[$i]->export_id;
$qry=[
    'date_purchase' => date('Y-m-d h:m:s'),
    'cus_purchse_id' => $uid,
    'owen_user_id' => $customer_id
];
$this->Card_model->customer_card_purchase($qry,$export_id);
$this->Common_model->update("UPDATE `vikn_accounts` SET `balance`=`balance`+".$total." WHERE `account_id`=".$this->session->userdata('account_id'));
 //transation
     $querypu = [
        'fin_year_id' => 1,
        'ref_id' => 1,
        'ref_key' =>  $export_id,
        'ledger_dr' => $customer_id,
        'ledger_cr' => $this->session->userdata('ID'),
        'amount' => $total,
        'entry_date' => date('Y-m-d h:m:s'),
        'entry_user' => $this->session->userdata('ID')
    ];  
$purled_id= $this->Ledger_model->insert($querypu);

$this->session->set_flashdata("msg", "<p class='alert alert-success'>Salling Sucessfully Done</p>");
             header('Location:' . base_url . 'wallet_cards_sales?id='.$id.'&uid='.$uid.''); 
}


}else{
  $this->session->set_flashdata("msg", "<p class='alert alert-success'>Cards No Stock</p>");
             header('Location:' . base_url . 'wallet_cards_sales?id='.$id.'&uid='.$uid.'');   
}
           
     }
     $data['cards']=$this->Card_model->get_one_cards($id);
     $data['custmoers']=$this->Account_model->get_all_accounts($this->session->userdata('ID'),3);
     $this->load->view('static/head',$data);
     $this->load->view('static/menu');
     $this->load->view('static/header');
     $this->load->view('wallet/wallet_cards_sales');
     $this->load->view('static/footer');
     $this->load->view('static/script');
}
}