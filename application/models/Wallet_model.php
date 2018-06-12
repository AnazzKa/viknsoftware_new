<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wallet_model extends CI_Model {
    var $db;
    function __construct() {
        parent::__construct();

        $this->db = $this->load->database('default', TRUE); //db connection
    }
public function get_all_suppliers($id)
{
    $result = $this->db->get_where('vikn_suppliers', array('entry_user' => $id));
    return $result->result();
}
 public function insert_supplier($qry)
{
	$this->db->insert('vikn_suppliers', $qry);
        return true;
}
}