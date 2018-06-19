
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 * Authorization
	 *
	 *
	 */
class Authorization
{

	var $CI;

	public function __construct()
	{
		log_message('debug', "Authorization Class Initialized");

		// Set the super object to a local variable for use throughout the class
		$this->CI =& get_instance();
	}

	function auth()
	{
		//$args = func_get_args();

		if($this->CI->session->userdata('isLoggedIn')  &&  $this->login_check())
			return true;


		
		return false;
	
	}

	function login_check()
	{
		if($this->CI->session->userdata('id') && $this->CI->session->userdata('login_string') )
		{
			$user_id = $this->CI->session->userdata('id');
			$login_string = $this->CI->session->userdata('login_string');
			$user_browser = $_SERVER['HTTP_USER_AGENT'];
			$query =  $this->CI->db->where(array('mobile'=>$user_id))->or_where(array('email'=>$user_id))->get('users')->result_array();

			if($query)
			{
				
				 if(count($query)== 1)
				{
					
					$password = $query[0]['password'];
					return (hash('sha512', $password . $user_browser) == $login_string);

				}
			}
		}

		return false;
	}


	function encode_password($pass, $created_date)
	{
		$date = strtotime($created_date);
		$year = date('Y', $date);
		$salt = 'PHASHONS';

		$tempHash = $pass . (string)$date . (string)$salt;
		for($i=0; $i < $year; $i++) $tempHash = md5($tempHash);
		//echo  $tempHash; echo "pass"; die();
		return $tempHash;
	}

	function strclean($str)
	{
		//global $mysqli;
		$str = @trim($str);
		if(get_magic_quotes_gpc()) $str = stripslashes($str);
		return $this->CI->db->escape_str($str);
	}

	function esc_url($url)
	{

		if ('' == $url) return $url;

		$url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

		$strip = array('%0d', '%0a', '%0D', '%0A');
		$url = (string) $url;

		$count = 1;
		while ($count) $url = str_replace($strip, '', $url, $count);

		$url = str_replace(';//', '://', $url);
		$url = htmlentities($url);
		$url = str_replace('&amp;', '&#038;', $url);
		$url = str_replace("'", '&#039;', $url);

		if ($url[0] !== '/') return '';
		else return $url;
	}
}
