<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('user/users_model');
	}
	public function index()
	{
		if(isset($_POST['signup']))	
		{
			//perform validation


			$email=$this->input->post('email');
			$first_name=$this->input->post('firstname');
			$last_name=$this->input->post('lastname');
			$mobile=$this->input->post('mobile');
			$pass=$this->input->post('password');
			$date= $date = date('Y-m-d H:i:s');
			

			$count1=count($this->db->where(array('email'=>$email))->get('users')->result_array());
			$count2=count($this->db->where(array('mobile'=>$mobile))->get('users')->result_array());
			if($count1>=1 || $count2>=1)
			{
				echo "Email or Mobile is already registered<br>";
				echo"<a href=".base_url().">Click here to Go to Home Page</a>";
				
				
			}
			else
			{

			

				// if all validation is true
				$data=array(
					'email'			=>$email,
					'fname'			=>$first_name,
					'lname'			=>$last_name,
					'mobile'		=>$mobile,
					'password'		=> $this->authorization->encode_password($pass, $date),
					'created_date'	=>$date
				);
				 $this->users_model->insert($data);
				 echo "User Registration Successfull<br>";
				 echo"<a href=".base_url().">Click here to Go to Home Page</a>";
		  }

		}
		

	}

	function logout() 
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
