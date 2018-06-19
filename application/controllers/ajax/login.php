<?
/**
* 
*/
class Login extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user/users_model');
	}

	
	public function validate_user_signup($type='')
	{

		if($type=='email')
		{	
			$email=$this->input->post('email');
			$count=count($this->db->where(array('email'=>$email))->get('users')->result_array());
			if($count>=1)
			{
				echo "Email is already registered";
			}
			
		}
		else if($type=='mobile')
		{
			$mobile=$this->input->post('mobile');
			
			$count=count($this->db->where(array('mobile'=>$mobile))->get('users')->result_array());
			if($count>=1)
			{
				echo "Mobile is already registered";
			}
						
		}
	}
	

	public function validate_user_signin() 
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');

		if(!empty($username))	
		{
			
			if(!empty($password))
			{
				$this->signin_user($username,$password);
			}
			else
			{
				echo "1";
			}
		}
		else
		{
			echo "2";
		}

	}


	private function signin_user() 
	{

		$user = $this->input->post('username');
		$pass = $this->input->post('password');

			
		
		// //Ensure values exist for user and pass, and validate the user's credentials
		if( $user && $pass && $this->users_model->validate_user($user,$pass))
		{
				echo "0";
		}
		else
		{
			echo "3";
		}
	}


	function logout() 
	{
		$this->session->sess_destroy();
	}

}
?>