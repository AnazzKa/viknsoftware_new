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
    $result = $this->db->get_where('vikn_users', array('user_id' => $id));
    return $result->result();
}
}