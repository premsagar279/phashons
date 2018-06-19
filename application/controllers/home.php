<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


	public function index()
	{
		$this->drawHeader('Home');
		$this->load->view('home');
		$this->drawFooter();
	}
}
