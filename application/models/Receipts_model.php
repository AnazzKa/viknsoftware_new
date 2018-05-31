<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Receipts_model extends CI_Model
{
    var $db;

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE); //db connection
    }
    public function insert($query)
    {
        $this->db->insert('vikn_receipts', $query);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function get_all_entries($id)
    {
//        $this->db->select('*');
//        $this->db->from('vikn_receipts');
//        $this->db->join('vikn_account_type', 'vikn_account_type.account_type_id = vikn_accounts.account_type');
//         $where="";
        $query= $this->db->get_where('vikn_receipts','received_into='.$id.' or received_from='.$id.'');
        return $query->result();
    }
}