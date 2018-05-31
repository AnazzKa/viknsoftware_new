<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment_model extends CI_Model
{
    var $db;
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE); //db connection
    }
    public function insert($query)
    {
        $this->db->insert('vikn_payment', $query);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function get_all_entries($id)
    {
        $query= $this->db->get_where('vikn_payment','received_into='.$id.' or received_from='.$id.'');
        return $query->result();
    }
}