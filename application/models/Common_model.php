<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model
{
	var $db;
	function __construct()
	{
		parent::__construct();
        $this->db = $this->load->database('default', TRUE); //db connection
    }
    public function direct_query($qry)
    {
    	$query = $this->db->query($qry);
    	return $query->result();
    }
    public function update($qry)
    {
    	$query = $this->db->query($qry);
    }
}