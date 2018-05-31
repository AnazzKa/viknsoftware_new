<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

		var $db;
		function __construct() {
		parent::__construct();
		
		$this->db = $this->load->database('default', TRUE);//db connection
		}	
		public function login_action($user,$pass)
		{
			$log=$this->db->query("SELECT * FROM vikn_users WHERE username='$user' AND password='$pass' ");
			$sql=$log->num_rows();
			if($sql>0)
			{
				$data=$log->row();
				$sq=array('ID'=>$data->user_id,'NAME'=>$data->username,'TYPE'=>$data->user_type,'USER_NAME'=>$data->user_name,'account_id'=>$data->account_id,'parent_id'=>$data->parent_id);
				$this->session->set_userdata($sq);
				return true;
			}

		}
	}