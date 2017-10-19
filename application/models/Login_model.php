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
			$log=$this->db->query("SELECT * FROM vk_users WHERE email='$user' AND password='$pass' ");
			$sql=$log->num_rows();
			if($sql>0)
			{
				$data=$log->row();
				$sq=array('ID'=>$data->userid,'NAME'=>$data->fname,'TYPE'=>$data->type_id);
		
				$this->session->set_userdata($sq);
				return true;
			}

		}
	}