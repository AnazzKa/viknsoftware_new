<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ledger_model extends CI_Model
{
    var $db;
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE); //db connection
    }
    public function insert($query)
    {
        $this->db->insert('vikn_transation', $query);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
}