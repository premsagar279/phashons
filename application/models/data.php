<?php
class Data extends CI_Model {
	public function get($table,$cond=[])
	{
		$res = $this->db->where($cond)->get($table);
		return $res->result_array();
	}

	public function getCat($gender=''){
		$res = $this->db->select('*')
						->where(['type'	=>	$gender])
						->get('categories');
		return $res->result_array();
	}

	public function getUser()
	{
		$user_id = $this->session->userdata('user_id');
		if(!isset($uid)){
			return;
		}
		$res = $this->db->where(['id'	=>	$uid])->get('users');
		return $res->result_array()[0];
	}


	public function getFollowers($id){
		$res = $this->db->select('follower_id')
						->where(['following_id'	=>	$id])
						->get('followers');
		$ret['follower_id'] = $res->result_array();
		$ret['followers'] = count($ret['follower_id']);
		return $ret;
	}

	public function getFollowings($id){
		$res = $this->db->select('following_id')
						->where(['follower_id'	=>	$id])
						->get('followers');
		$ret['following_id'] = $res->result_array();
		$ret['followings'] = count($ret['following_id']);
		return $ret;
	}

	public function getImagesProduct($id){
		$str = $this->db->select('image')->from('products')->where(['id'	=>	$id])->get()->result_array()[0]['image'];
		// prettyDump($str);
		$ret = json_decode($str);
		return $ret;

	}

	function getUserById($id = '')
	{
		

		$query = $this->db->where(array('mobile'=>$id))->or_where(array('email'=>$id))->get('users'); 

		if ($query->num_rows() === 1)
		{
			
			return $query->row();

		}

		else
		{
			
			return array();
		}

	}






}
?>
