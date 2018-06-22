<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('resultModel','result');
	}

	public function index($uri=''){
		$ret = $this->result->parseURI($uri);
		$this->addCSS('assets/phasons/results.css');
		// Can create a good string for every result
		$this->drawHeader('Results');

		$data['cat'] = $this->result->getCategories();
		$data['gender'] = $this->result->getGender();
		$data['art'] = $this->result->getArt();
		$data['products'] = $this->result->getProducts($ret);

		// prettyDump($ret);
		$this->load->view('results',$data);

		// think how to add a footer
		// $this->drawFooter();

	}
}
