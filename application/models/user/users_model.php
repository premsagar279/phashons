<?php

class Users_model extends CI_Model
{
	public  $table = 'users';

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function insert($data)
	{
		$this->db->insert($this->table,$data);
		
	}
	
	function validate_user($user_id, $pass)
	{

		$user_id = $this->authorization->strclean($user_id);
		$pass = $this->authorization->strclean($pass);
		
		$row = $this->getUserById($user_id);
		if($row !== false)
		{

			$password = $this->authorization->encode_password($pass, $row->created_date);

			
			if($password == $row->password )
			{

				// Login Successful
				
				// $user_id = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $user_id);
				

				$this->set_session($user_id, $password);
				return true;
			}


		}

		 return false;
	}

	function getUserById($id = '')
	{
		

		$query = $this->db->where(array('mobile'=>$id))->or_where(array('email'=>$id))->get($this->table); 

		if ($query->num_rows() === 1)
		{
			
			return $query->row();

		}

		else
		{
			
			return false;
		}

	}
	
	private function set_session($user_id, $password)
	{
		$this->session->set_userdata(
		 array( 
			'id'=>$user_id,'isLoggedIn'=>true ,
			'login_string'=> hash('sha512', $password . $_SERVER['HTTP_USER_AGENT']),
			)
		);
	}

	function change_password($old_pass , $new_pass)
	{
		$query = $this->db->get_where($this->table,array('id'=>$this->session->userdata('id')));

		$old_pass=$this->authorization->strclean($old_pass);
		$old_hash=$this->authorization->encode_password($old_pass, $query->row()->created_date);

		if($query->num_rows() == 1 && $query->row()->password == $old_hash)
		{
			$new_pass=$this->authorization->strclean($new_pass);
			$new_hash=$this->authorization->encode_password($new_pass,$query->row()->created_date);
			$this->update(array('password'=>$new_hash),array('id'=>$this->session->userdata('id')));
		}
		else
		{
			$this->session->set_flashdata('flashError','Old Password do not match.');
			redirect('change_password');
		}
	}

	function update($data, $where)
	{
		$this->db->update($this->table, $data, $where);
	}
	
	function delete_record($where_array)
	{
		$this->db->delete($this->table,$where_array);
	}
}

