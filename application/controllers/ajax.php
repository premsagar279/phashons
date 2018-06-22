<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller {
	public function Logout(){
		if($this->input->post('log')){
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('pwd');
			// redirect(curr_url());
			return true;
		}
	}

	public function Login(){
		$first = $this->input->post('username');
		$pass = $this->input->post('password');

		$res =$this->db->where('password',$pass)
				->group_start()
					->where('username',$first)
					->or_where('email',$first)
				->group_end()
				->get('users')->result_array();
		if(count($res)===1){
			$this->session->set_userdata('id',$res[0]['id']);
			$this->session->set_userdata('pwd',$res[0]['password']);
			return true;
		}
		else{
			echo 'Wrong Password or Username';
			return false;
		}
	}
}
