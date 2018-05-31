<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account_model extends CI_Model
{
    var $db;
    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE); //db connection
    }
    public function insert_account_type($query)
    {
        $this->db->insert('vikn_account_type', $query);
        return true;
    }
    public function get_all_customers($id)
    {
        if ($id == 1)
            $result = $this->db->get_where('vikn_users', array('user_type' => 2));
        else
            $result = $this->db->get_where('vikn_users', array('user_id' => $id));
        return $result->result();
    }

    public function get_all_account_type()
    {
        $result = $this->db->get('vikn_account_type');
        return $result->result();
    }

    public function delete_account_type($id)
    {
        $this->db->delete('vikn_account_type', array('account_type_id' => $id));
        return true;
    }

    public function get_one_account_type($id)
    {
        $result = $this->db->get_where('vikn_account_type', array('account_type_id' => $id));
        return $result->result();
    }

    public function update_account_type($query, $id)
    {
        $this->db->where('account_type_id', $id);
        $this->db->update('vikn_account_type', $query);
        return true;
    }

    public function insert_accounts($query)
    {
        $this->db->insert('vikn_accounts', $query);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function get_all_accounts()
    {
        $this->db->select('*');
        $this->db->from('vikn_accounts');
        $this->db->join('vikn_account_type', 'vikn_account_type.account_type_id = vikn_accounts.account_type');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_accounts($id)
    {
        $this->db->delete('vikn_accounts', array('account_id' => $id));
        return true;
    }

    public function get_one_accounts($id)
    {
        $result = $this->db->get_where('vikn_accounts', array('account_id' => $id));
        return $result->result();
    }

    public function update_accounts($query, $id)
    {
        $this->db->where('account_id', $id);
        $this->db->update('vikn_accounts', $query);
        return true;
    }

    public function get_single_account($id)
    {
        $user_id = $this->session->userdata('ID');
        $user_type = $this->session->userdata('TYPE');
        $account_id = $this->session->userdata('account_id');
        if ($user_id == 1)
            $result = $this->db->get_where('vikn_accounts', array('account_type' => $id, 'created_user_id' => 1));
        else if ($user_type == 2)
            $result = $this->db->get_where('vikn_accounts', array('account_type' => $id, 'created_user_id' => $user_id));
        else
            $result = $this->db->get_where('vikn_accounts', array('account_type' => $id, 'created_user_id' => $user_id));
        return $result->result();
    }

    public function get_single_accounts()
    {
        $user_id = $this->session->userdata('account_id');
        $result = $this->db->get_where('vikn_accounts', array('account_id' => $user_id));
        return $result->result();
    }
}
