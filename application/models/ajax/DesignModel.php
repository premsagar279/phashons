<?
/**
 *
 */
class DesignModel extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function checkProductAccess(){
		$user = $this->session->userdata('id_num');
		$pro = $this->input->post('pro_id');
		$res = $this->db->where(['user_id'	=>	$user,'id'	=>	$pro])->get('products')->result_array();
		return (count($res) === 1);
	}

	function saveData(){
		$save = $this->input->post('save');
		$pro = $this->input->post('pro_id');
		$path = 'assets/designs/'.$pro;
		$myfile = fopen($path, "w") or die("Unable to open file!");
		fwrite($myfile,$save);
		fclose($myfile);
		return $this->db->where(['id'	=> 	$pro])->update('products',['save'	=>	$path]);
	}
}


?>
