<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Discount_model extends CI_Model {
    var $db;
    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE); //db connection
    }
    public function insert($query)
    {
        $this->db->insert('vikn_discount', $query);
        return true;
    }
    public function get_all_entries($id)
    {
        $query= $this->db->get_where('vikn_discount','received_into='.$id.'');
        return $query->result();
    }
}