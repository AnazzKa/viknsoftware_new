<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Cards extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Agent_model');
        $this->load->model('Card_model');
        $this->load->model('Wallet_model');
        $this->load->model('Account_model');
        $this->load->model('Purchase_model');
        $this->load->model('Ledger_model');
        $this->load->model('Common_model');
        $this->load->library('session');
        $this->load->library('pagination');

    }

    public function create_cards_type()
    {
        $data['btn'] = "Save";
        if (isset($_POST['Save'])) {
            $card_type = $_POST['card_type'];
            $query = [
                'card_type' => $card_type,
                'date' => date('Y-m-d h:m:s')
            ];
            $this->Card_model->insert_card_type($query);
            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Card Type Added Sucessfully</p>");
            header('Location:' . base_url . 'create_cards_type');
        }
        if (isset($_GET['delete'])) {
            $delete = $_GET['delete'];
            $this->Card_model->delete_card_type($delete);
            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Card Type Deleted</p>");
            header('Location:' . base_url . 'create_cards_type');
        }
        if (isset($_GET['edit'])) {
            $edit = $_GET['edit'];
            $data['edit'] = $edit;
            $data['single_type_item'] = $this->Card_model->get_one_card_type($edit);
            $data['btn'] = "Update";
        }
        if (isset($_POST['Update'])) {
            $card_type = $_POST['card_type'];
            $edit = $_POST['edit'];
            $query = [
                'card_type' => $card_type,
                'date' => date('Y-m-d h:m:s')
            ];
            $this->Card_model->update_card_type($query, $edit);
            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Card Type Modify Sucessfully</p>");
            header('Location:' . base_url . 'create_cards_type');
        }
        $data['all_type_item'] = $this->Card_model->get_all_card_type();
        $title['title'] = "Vikn Software | Card Type";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('cards/card_type', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }

    public function create_cards()
    {
        $data['btn'] = "Save";
        if (isset($_POST['Save']) || isset($_POST['Update'])) {
            $editid = $_POST['edit'];
            $card_name = $_POST['card_name'];
            $card_type = $_POST['card_type'];
            $purchase_rate = $_POST['purchase_rate'];
            $sales_rate = $_POST['sales_rate'];
            $details = $_POST['details'];
            $narration = $_POST['narration'];
            $link = $_POST['link'];

            $config['upload_path'] = './cards/';
            $config["allowed_types"] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if ($editid == "") {
                if (!$this->upload->do_upload('pics')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata("msg", "<p class='alert alert-success'>$error</p>");
                } else {
                    //success
                    $file = $this->upload->data();
                    $imagename = $file['file_name'];

                    $query = [
                        'card_name' => $card_name,
                        'card_type_id' => $card_type,
                        'purchase_rate' => $purchase_rate,
                        'sales_rate' => $sales_rate,
                        'details' => $details,
                        'narration' => $narration,
                        'link' => $link,
                        'pics' => $imagename,
                        'date' => date('Y-m-d h:m:s')
                    ];


                    $this->Card_model->insert_cards($query);
                    $this->session->set_flashdata("msg", "<p class='alert alert-success'>Card Added Sucessfully</p>");
                    header('Location:' . base_url . 'list_cards');
                }
            } else {

                if (!$this->upload->do_upload('pics')) {

                    $query = [
                        'card_name' => $card_name,
                        'card_type_id' => $card_type,
                        'purchase_rate' => $purchase_rate,
                        'sales_rate' => $sales_rate,
                        'details' => $details,
                        'narration' => $narration,
                        'link' => $link,
                        'date' => date('Y-m-d h:m:s')
                    ];

                } else {
                    //success
                    $file = $this->upload->data();
                    $imagename = $file['file_name'];

                    $query = [
                        'card_name' => $card_name,
                        'card_type_id' => $card_type,
                        'purchase_rate' => $purchase_rate,
                        'sales_rate' => $sales_rate,
                        'details' => $details,
                        'narration' => $narration,
                        'link' => $link,
                        'pics' => $imagename,
                        'date' => date('Y-m-d h:m:s')
                    ];
                }
                $this->Card_model->update_cards($query, $editid);
                $this->session->set_flashdata("msg", "<p class='alert alert-success'>Card Modify Sucessfully</p>");
                header('Location:' . base_url . 'list_cards');
            }


        }
        if (isset($_GET['edit'])) {
            $edit = $_GET['edit'];
            $data['edit'] = $edit;
            $data['single_item'] = $this->Card_model->get_one_cards($edit);
            $data['btn'] = "Update";
        }


        $data['all_type_item'] = $this->Card_model->get_all_card_type();
        $title['title'] = "Vikn Software | Cards";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('cards/card_add', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }

    public function list_cards()
    {
        if (isset($_GET['delete'])) {
            $delete = $_GET['delete'];
            $this->Card_model->delete_card($delete);
            $this->session->set_flashdata("msg", "<p class='alert alert-success'>Card Deleted</p>");
            header('Location:' . base_url . 'list_cards');
        }
        $log_id=$this->session->userdata("ID");
        $data['all_cards'] = $this->Card_model->get_all_cards($log_id);
        $title['title'] = "Vikn Software | Cards View";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('cards/card_list', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }

    public function create_gps_direction()
    {
        $data['btn'] = "Save";
        $title['title'] = "Vikn Software | Cards View";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('cards/create_gps_direction', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }

    public function list_cards_all()
    {
        $data['all_cards'] = $this->Card_model->get_all_cards();
        $title['title'] = "Vikn Software | Cards View";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('cards/list_cards_all', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    function purchase_card()
    {
        $quantity = $_POST['quantity'];
        $card_id = $_POST['card_id'];
        $prize = $_POST['prize'];
        $agent_id = $_POST['agent_id'];
        $total = $quantity * $prize;
        $query = [
            'agent_id' => $agent_id,
            'card_id' => $card_id,
            'quantity' => $quantity,
            'one_prize' => $prize,
            'total' => $total,
            'date' => date('Y-m-d h:m:s')
        ];
        $this->Card_model->purchase_cards($query);
        $this->session->set_flashdata("msg", "<p class='alert alert-success'>Card Purchase Sucessfully</p>");
        header('Location:' . base_url . 'list_cards_all');
    }
    function purchase_cards_list()
    {
        $data['all_cards'] = $this->Card_model->get_all_purchase_cards($this->session->userdata("ID"));
        $title['title'] = "Vikn Software | Cards View";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('cards/purchase_card_list', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    function add_cards_stock()
    {
        $data['btn'] = "Save";
        if(isset($_POST['save_item'])){
            $user_id=$this->session->userdata('ID');
            $editid = $_POST['edit'];
            $card_name = $_POST['card_name'];
            $card_type = $_POST['card_type'];
            $purchase_rate = $_POST['purchase_rate'];
            $sales_rate = $_POST['sales_rate'];
            $details = $_POST['details'];
            $narration = $_POST['narration'];
            $link = $_POST['link'];

            $config['upload_path'] = './cards/';
            $config["allowed_types"] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if ($editid == "") {
                if (!$this->upload->do_upload('pics')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata("msg", "<p class='alert alert-success'>$error</p>");
                } else {
                    //success
                    $file = $this->upload->data();
                    $imagename = $file['file_name'];

                    $query = [
                        'card_name' => $card_name,
                        'card_type_id' => $card_type,
                        'purchase_rate' => $purchase_rate,
                        'sales_rate' => $sales_rate,
                        'details' => $details,
                        'narration' => $narration,
                        'link' => $link,
                        'pics' => $imagename,
                        'date' => date('Y-m-d h:m:s'),
                        'user_id' =>$user_id
                    ];


                    $this->Card_model->insert_cards($query);
                    $this->session->set_flashdata("msg", "<p class='alert alert-success'>Card Added Sucessfully</p>");
                    //header('Location:' . base_url . 'list_cards');
                }
            } else {

                if (!$this->upload->do_upload('pics')) {

                    $query = [
                        'card_name' => $card_name,
                        'card_type_id' => $card_type,
                        'purchase_rate' => $purchase_rate,
                        'sales_rate' => $sales_rate,
                        'details' => $details,
                        'narration' => $narration,
                        'link' => $link,
                        'date' => date('Y-m-d h:m:s'),
                        'user_id' =>$user_id
                    ];

                } else {
                    //success
                    $file = $this->upload->data();
                    $imagename = $file['file_name'];

                    $query = [
                        'card_name' => $card_name,
                        'card_type_id' => $card_type,
                        'purchase_rate' => $purchase_rate,
                        'sales_rate' => $sales_rate,
                        'details' => $details,
                        'narration' => $narration,
                        'link' => $link,
                        'pics' => $imagename,
                        'date' => date('Y-m-d h:m:s'),
                        'user_id' =>$user_id
                    ];
                }
                $this->Card_model->update_cards($query, $editid);
                $this->session->set_flashdata("msg", "<p class='alert alert-success'>Card Modify Sucessfully</p>");
                //header('Location:' . base_url . 'list_cards');
            }


        }
        if (isset($_GET['edit'])) {
            $edit = $_GET['edit'];
            $data['edit'] = $edit;
            $data['single_item'] = $this->Card_model->get_one_cards($edit);
            $data['btn'] = "Update";
        }
if(isset($_POST['save_card'])){
    $this->load->library('PHPExcel');
    $user_id=$this->session->userdata('ID');
    $configUpload['upload_path'] = FCPATH.'cards/excel/';
    $configUpload['allowed_types'] = 'xls|xlsx|csv';
    $configUpload['max_size'] = '5000';
    $this->load->library('upload', $configUpload);
    $this->upload->do_upload('import_card');
    $upload_data = $this->upload->data();
    $file_name = $upload_data['file_name'];
    $extension=$upload_data['file_ext'];
    $objReader= PHPExcel_IOFactory::createReader('Excel2007');
    $objReader->setReadDataOnly(true);
    $objPHPExcel=$objReader->load(FCPATH.'cards/excel/'.$file_name);
    $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);
    $supplier_id=$_POST['supplier_id'];
    $query = [
        'customer_id' => $_POST['supplier_id'],
        'card_item_id' => $_POST['card_type'],
        'total_number' => $totalrows-1,
        'narration' => $_POST['Narration'],
        'user_id' => $user_id
    ];
    $lst_id= $this->Card_model->insert_cards_new($query);
     $qry="SELECT purchase_rate FROM vikn_cards WHERE card_id=(SELECT card_item_id FROM vikn_cards_new WHERE customer_id='$supplier_id' AND user_id='$user_id'  LIMIT 0,1)";
     $get_pur_rate=$this->Common_model->direct_query($qry);
     $amt=($totalrows-1)*$get_pur_rate[0]->purchase_rate;
      
//purchase
     $rnd=rand(1000,1000000);
$pur=[
        'purchase_number' =>  $rnd,
        'ledger_dr' => $supplier_id,
        'ledger_cr' => $user_id,
        'amount' => $amt,
        'entry_date' => date('Y-m-d h:m:s'),
        'entry_user' => $user_id
    ];
    $pur_id= $this->Purchase_model->insert($pur);
    //sales
    // $sal=[
    //     'sales_number' => rand(1000,1000000),
    //     'ledger_dr' => $supplier_id,
    //     'ledger_cr' => $user_id,
    //     'amount' => $amt,
    //     'entry_date' => date('Y-m-d h:m:s'),
    //     'entry_user' => $user_id
    // ];
    //transation
     $querypu = [
        'fin_year_id' => 1,
        'ref_id' => 2,
        'ref_key' => $pur_id,
        'ledger_dr' => $supplier_id,
        'ledger_cr' => $user_id,
        'amount' => $amt,
        'entry_date' => date('Y-m-d h:m:s'),
        'entry_user' => $user_id
    ];
    
$purled_id= $this->Ledger_model->insert($querypu);

    for($i=2;$i<=$totalrows;$i++)
    {
        $slno= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
        $userid= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(); //Excel Column 1
        $password= $objWorksheet->getCellByColumnAndRow(2,$i)->getValue(); //Excel Column 2
        //$Mobile=$objWorksheet->getCellByColumnAndRow(3,$i)->getValue(); //Excel Column 3
        //$Address=$objWorksheet->getCellByColumnAndRow(4,$i)->getValue(); //Excel Column 4
        $data_user=array('slno'=>$slno, 'user_id'=>$userid ,'password'=>$password,'card_new_id'=>$lst_id,'created_user_id'=>$user_id,'purchase_user_id'=>$supplier_id,'owen_user_id'=>$user_id);
        $this->Card_model->import_cards($data_user);


    }
    //unlink('././uploads/excel/'.$file_name); //File Deleted After uploading in database .
    $this->session->set_flashdata("msg", "<p class='alert alert-success'>Card Imported Sucessfully</p>");


}

        $user_id=$this->session->userdata('ID');
        $data['all_type_item'] = $this->Card_model->get_all_card_type();
        $data['all_accounts'] = $this->Account_model->get_all_supplier($user_id,3);
        $data['all_cards'] = $this->Card_model->get_all_cards();
        $title['title'] = "Vikn Software | Cards";
        $this->load->view('static/head', $title);
        $this->load->view('static/menu');
        $this->load->view('static/header');
        $this->load->view('cards/card_add_stock', $data);
        $this->load->view('static/footer');
        $this->load->view('static/script');
    }
    public function card_save_item()
    {
        if(isset($_POST['save'])){
            echo "<pre>";print_r($_POST);exit;
        }
    }
}