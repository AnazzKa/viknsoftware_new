<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Card_model extends CI_Model {

    var $db;

    function __construct() {
        parent::__construct();

        $this->db = $this->load->database('default', TRUE); //db connection
    }

    public function insert_card_type($query) {
        $this->db->insert('vikn_card_type', $query);
        return true;
    }

    public function get_all_card_type() {
        $result = $this->db->get('vikn_card_type');
        return $result->result();
    }

    public function delete_card_type($id) {
        $this->db->delete('vikn_card_type', array('card_type_id' => $id));
        return true;
    }

    public function get_one_card_type($id) {
        $result = $this->db->get_where('vikn_card_type', array('card_type_id' => $id));
        return $result->result();
    }

    public function update_card_type($query, $id) {
        $this->db->where('card_type_id', $id);
        $this->db->update('vikn_card_type', $query);
        return true;
    }

    public function insert_cards($query) {
        $this->db->insert('vikn_cards', $query);
        return true;
    }

    public function get_all_cards_cat($id) {
        $this->db->select('*');
        $this->db->from('vikn_cards');
        $this->db->join('vikn_card_type', 'vikn_card_type.card_type_id = vikn_cards.card_type_id');
        $this->db->where(array('vikn_cards.card_type_id' =>$id));
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_cards() {
        $this->db->select('*');
        $this->db->from('vikn_cards');
        $this->db->join('vikn_card_type', 'vikn_card_type.card_type_id = vikn_cards.card_type_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_card($id) {
        $this->db->delete('vikn_cards', array('card_id' => $id));
        return true;
    }

    public function get_one_cards($id) {
        $this->db->select('*');
        $this->db->from('vikn_cards');
        $this->db->join('vikn_card_type', 'vikn_card_type.card_type_id = vikn_cards.card_type_id');
        $this->db->where('`vikn_cards.card_id',$id);
        $query = $this->db->get();
        return $query->result();
//        $result = $this->db->get_where('vikn_cards', array('card_id' => $id));
//        return $result->result();
    }
    public function update_cards($query, $id) {
        $this->db->where('card_id', $id);
        $this->db->update('vikn_cards', $query);
        return true;
    }

    public function purchase_cards($query) {
        $this->db->insert('vikn_purchase', $query);
        return true;
    }
    public function get_all_purchase_cards($id)
    {
        $this->db->select('*');
        $this->db->from('vikn_purchase');
        $this->db->join('vikn_cards', 'vikn_cards.card_id = vikn_purchase.card_id');
        $this->db->join('vikn_card_type', 'vikn_card_type.card_type_id = vikn_cards.card_type_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function insert_cards_new($qry)
    {
        $this->db->insert('vikn_cards_new', $qry);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function import_cards($qry)
    {
        $this->db->insert('vikn_cards_export', $qry);
    }
    public function get_cards_stock($item_id,$user_id)
    {
        $count=0;
        $result = $this->db->get_where('vikn_cards_new', array('card_item_id' => $item_id,'user_id'=>$user_id));
//        return $result->result();
        foreach($result->result() as $val)
        {
            $cards_new_id= $val->cards_new_id;
            $log = $this->db->query("SELECT COUNT(*) as 'count' FROM vikn_cards_export WHERE card_new_id='$cards_new_id' AND sale='0' AND owen_user_id=$user_id");
            $data=$log->row();
            $count=$count+$data->count;
        }
        return $count;
    }
    public function customer_card_purchase($query,$id)
    {
        $this->db->where('export_id', $id);
        $this->db->update('vikn_cards_export', $query);
        return true; 
    }
    public function get_all_stock_card_type($id)
    {
        
    }
}
