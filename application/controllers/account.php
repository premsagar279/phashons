<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {


	public function index($id){
		$this->drawHeader('Account');
		$data['users'] = $this->data->get('users',['id'	=>	$id])[0];
		$data['followers'] = $this->data->getFollowers($id);
		$data['followings'] = $this->data->getFollowings($id);
		$data['address'] = $this->data->get('address' , ['user_id'	=>	$id]);
		$data['cards'] = $this->data->get('cards',['user_id'	=>	$id]);

		$this->load->view('account',$data);
		$this->drawFooter();
	}
}
