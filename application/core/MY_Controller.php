<? if(!defined("BASEPATH")){ exit("No direct script access allowed"); }
	/**
	 * Authorization Extended Controller Class
	 *
	**/
	class MY_Controller extends CI_Controller {

		var $CI;
		/**
		 *@var strings
		 *hold js file
		 */
		protected $js; 

		/**
		 *
		 * @var islogged 
		 */

		protected $islogged;
		/*
		 *@var string
		 *hold css file
		 */
		protected $css; 

		function __construct($args = array())
		{

			parent::__construct();


			$this->CI =& get_instance();
		    // defined and initialize  js to be type of array
			$this->js = array();


			// defined and initialize  css to be type of array
			$this->css = array();

			// load the helper and make available to all controller
			$this->load->helper(array('url','html'));

			// load the model to fetch data for header
			$this->load->model('data');	
			if($this->CI->authorization->auth())
			{
				$this->islogged=true;
			}
			else
			{
				$this->islogged=false;

			}
		}



		/**
		 *
		 * @param  $title   string     title of page  
		 * loads the css, js file and header of page
		 *
		 */

		public function drawHeader($title = "Phasons") {

			// category for men section
			$data['mCat'] = $this->data->getCat('M');

			// category for women section
			$data['wCat'] = $this->data->getCat('W');

			// fetching the no of item in cart 
			$data['card_count'] = $this->CI->session->userdata('cart') ? count($this->session->userdata('cart')) : 0;

			// fetching the user detail 
			$data['user'] = $this->data->getUserById($this->CI->session->userdata('id'));
			
			//print_r($_SESSION);
			// fetching css file
			$head['css']=$this->css;

			// fetching js file
			$head['js']=$this->js;

			// print_r($head);

			// title of page
			$head['title']=$title;

			$data['islogged']=$this->islogged;
			// loading basic css and js file required for page
			$this->load->view('common/header_assets',$head);

			// load the nav bar of page
			$this->load->view('common/header',$data);

			// if not logged in
			if(!$this->islogged)
			$this->load->view('common/login');
			
		}


		/**
		 *
		 * loads the footer of page
		 *
		 */

		public function drawFooter(){

			$this->load->view('common/footer');
		}



		/**
		 *
		 * @param  $path  				 string    		relative path for js file or url
		 * @param  $prepend_base_url 	 bool    		relative path is url or file
		 *
		 */

		public function addJS($path,$prepend_base_url=true)
		{
			if($prepend_base_url)
			{   
				
				$this->js[] = base_url().$path;
			}
			else
			{
				$this->js[] = $path;
			}
			
		}

		/**
		 *
		 * @param  $path  				 string    		relative path for css file or url
		 * @param  $prepend_base_url 	 bool    		relative path is url or file
		 *
		 */

		public function addCSS($path,$prepend_base_url=true)
		{
			if($prepend_base_url)
			{   
				
				$this->css[] = base_url().$path;
			}
			else
			{
				$this->css[] = $path;
			}
		}


	}
	?>
