<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('data');
	}

	public function index($id){
		$data['item'] = $this->data->get('products',['id'	=>	$id])[0];
		if(is_null($data['item'])){
			show_404();
		}
		// prettyDump($data['item']);
		$this->drawHeader($data['item']['name']);
		$data['images'] = $this->data->getImagesProduct($id);

		$this->load->view('details',$data);
		$this->drawFooter();
	}
}
