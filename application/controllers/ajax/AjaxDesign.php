<?
/**
 *
 */
class AjaxDesign extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('ajax/designModel','design');
	}

	function save_design(){
		if($this->design->checkProductAccess()){
			if($this->design->saveData()){
				echo "saved";
				return true;
			}
			else{
				echo "error";
				return false;
			}
		}
	}

}


?>
