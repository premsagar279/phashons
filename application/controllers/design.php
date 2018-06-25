<!-- <script src="threejs/OrbitControls.js"></script>
<script src="threejs/OBJLoader.js"></script>
<script src="threejs/loader.js"></script>
<script src="threejs/progress.js"></script>
<script src="threejs/spectrum.js"></script>
-->
<!--
<link rel="stylesheet" type="text/css" href="assets/phasons/progress_style.css">
<link rel="stylesheet" type="text/css" href="threejs/spectrum.css">
<link rel="stylesheet" type="text/css" href="threejs/design.css"> -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design extends MY_Controller {


	public function index()
	{
		$this->addJS('assets/js/three.min.js');
		$this->addJS('assets/js/OBJLoader.js');
		$this->addJS('assets/js/model.js');
		$this->addJS('assets/js/OrbitControls.js');
		$this->addJS('assets/js/progress.js');
		$this->addJS('assets/js/spectrum.js');
		$this->addJS('assets/js/design.js');
		$this->addJS('assets/js/loader.js');


		$this->addCSS('assets/phasons/progress_style.css');
		$this->addCSS('assets/phasons/spectrum.css');
		$this->addCSS('assets/phasons/design.css');


		$this->drawHeader('Design');
		$this->load->view('design');
		$this->drawFooter();
	}
}
