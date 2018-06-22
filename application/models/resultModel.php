<?php
class ResultModel extends CI_Model {
	public function parseURI($uri=''){
		// a string like this will be transformed to :
		// cat:1_2_3~ind:2_3
		// [
		// 	'cat'	=>	[1,2,3],
		// 	'ind'	=>	[2,3],
		// ]
		if($uri===''){
			return [];
		}
		$ret = [];
		$params = explode('~',$uri);

		foreach ($params as $key) {
			$parts = explode(':',$key);
			$name = $parts[0];
			$values = $parts[1];
			$value = explode('_',$values);
			$ret[$name] = $value;
		}
		$ret = array_filter($ret,"sanitize",ARRAY_FILTER_USE_KEY);
		return $ret;
	}
	public function getCategories(){
		$ret['var'] =	$this->db->get('categories')->result_array();
		$ret['type'] = 'checkbox';
		$ret['var_name'] = 'category';

		return $ret;
	}
	public function getGender(){
		$ret['var'] =
		[
			[
				'name'	=>	'Men',
				'id'	=>	'M',
			],
			[
				'name'	=>	'Women',
				'id'	=>	'W',
			],

		];
		$ret['type'] = 'checkbox';
		$ret['var_name'] = 'gender';
		return $ret;
	}
	public function getArt(){
		$ret['var'] =	$this->db->get('art')->result_array();
		$ret['type'] = 'checkbox';
		$ret['var_name'] = 'art';

		return $ret;
	}
	public function getProducts($cond=''){
		$this->db	->select('P.id,P.name,B.name as brand,C.name as category,P.image,P.price,P.discount as dis,((100-P.discount)/100)*P.price as tprice,')
						->from('products as P')
						->join('categories as C','C.id = P.cat_id')
						->join('brands as B','B.id = P.brand_id');
		foreach ($cond as $key => $value) {
			$this->db->where_in($key,$value);
		}
		$ret['var']=$this->db->get()->result_array();
		foreach ($ret['var'] as &$key) {
			$key['src'] = json_decode($key['image'])[0];
		}
		return $ret;

	}



}
function sanitize($arr){
	return (!($arr===''));
}
