<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agent_model extends CI_Model {
   var $db;
    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE); //db connection
    }
    public function insert_agent($query) {
        $this->db->insert('vikn_agents', $query);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function insert_agent_login($query) {
        $this->db->insert('vikn_users', $query);
        return  true;
    }
    public function get_all_agents() {
        $result = $this->db->get('vikn_agents');
        return $result->result();
    }
    public function delete_agent($id) {
        $this->db->delete('vikn_agents', array('agent_id' => $id));
        return true;
    }
    public function get_one_agent($id) {
        $result = $this->db->get_where('vikn_agents', array('agent_id' => $id));
        return $result->result();
    }

    public function update_agent($query, $id) {
        $this->db->where('agent_id', $id);
        $this->db->update('vikn_agents', $query);
        return true;
    }
    public function update_agent_login($query, $id) {
        $this->db->where('agent_id', $id);
        $this->db->update('vikn_users', $query);
        return true;
    }
}