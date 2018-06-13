<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transation_model extends CI_Model {
    var $db;
    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE); //db connection
    }
    public function get_all_entries($id)
    {
        $array = array('ledger_dr' => $id, 'ledger_cr' => $id);
        $this->db->select('*');
        $this->db->from('vikn_transation');
        $this->db->or_where($array);
        $query = $this->db->get();
        return $query->result();
    }
}