<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public $firstname;
	public $lastname;
	public $email;
	
	public function __construct()
	{
			parent::__construct();
			// Your own constructor code
	}		

	public function get_users()
	{
			$query = $this->db->get('users');
			return $query->result();
	}
	
	function get_user($id){
		
		$query = $this->db->get_where('users', array('id' => $id), 1, 0);
		
		if ($query->num_rows() > 0) {
		
		   $row = $query->row(); 
		
		   return  $row;
		} 	
	}
	
	function insert_user($data) {
	
		$this->db->insert('users', $data); 	
	}

	function update_user($data, $id){
	
		$this->db->where('id', $id);
		$this->db->update('users', $data); 	
		
	}
	
	public function delete_user($id)
	{
			$this->db->delete('users', array('id' => $id));
	}
}