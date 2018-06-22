<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BulkOrder extends MY_Controller {
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->drawHeader();
		$this->load->view('bulkOrder');
		$this->drawFooter();
		if($this->input->post('submit')){
			$data=[
				'name'		=>	$this->input->post('name'),
				'address'	=>	$this->input->post('address'),
				'quantity'	=>	$this->input->post('units'),
				'date'	=>	$this->input->post('date'),
				'product_id'	=>	$this->input->post('item'),

			];
			// $this->data->insertBulkOrder($data);
		}
	}
}
