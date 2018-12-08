<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index(){
		$data['category'] = $this->db->where('featured_item', 1)->where('is_category', 1)->get('cat_keywords')->result();
		$data['area'] = $this->db->get('governorate')->result();
		$data['vatrenas'] = $this->db->where('featured_item', 1)->where('companies.active', 1)->where('parent', 0)->limit(9)->get('companies')->result();
		$this->load->view('site/header');
		$this->load->view('site/home', $data);
		$this->load->view('site/footer');

	}


	public function register(){

		$data['area'] = $this->db->get('governorate')->result();
		$data['categories'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
		// $data['moha'] = $this->db->get('mohafazat')->result();
		// $data['city'] = $this->db->get('city')->result();
		// $data['dist'] = $this->db->get('district')->result();

		$this->load->view('site/header');
		$this->load->view('site/register', $data);
		$this->load->view('site/footer');
	}

	public function current_user_debt($user_id){

   		$user_debt = $this->db->where('user_id', $user_id)->get('users')->row('vat_coin');

   		$all_albums=$this->db->select('photo_cat_id')->where('user_id', $user_id)->get('photo_category')->result();


   		$all_album_ids = array();
   		foreach($all_albums as $all_album){
   			array_push($all_album_ids, $all_album->photo_cat_id);
   		}

   		$count_photos=$this->db->where_in('photo_category', $all_album_ids)->count_all_results('photo');

   		$photo_price=$this->db->where('per_id', 2)->get('permissions')->row('vat_coin');

   		$photos_debt = $count_photos * $photo_price;

   		$user_debt = $photos_debt;

   		return $user_debt;

   	}

	public function profile($company_name, $id){


		$data['user'] = $this->db->where('user_id', $id)->get('users')->row();

		$data['debt'] = $this->current_user_debt($id);

		$data['company'] = $this->db->where('user_id', $id)->get('companies')->result();

		$data['slider'] = $this->db->where('user_id', $id)->get('photo_category')->result();

		// echo '<pre>';
		// 	print_r($data['slider']);
		// echo '</pre>';
		// die();
		$this->load->view('site/header');
		$this->load->view('site/profile', $data);
		$this->load->view('site/footer');
	}

	public function langChanger($lang){
		
		$this->session->unset_userdata('lang');
		if ($lang == 'ar')
            $lang_session['lang'] = 'ar';
        else
         $lang_session['lang'] = $lang;
        
        $this->session->set_userdata($lang_session);
    	if (isset($_SERVER['HTTP_REFERER'])){
       		redirect($_SERVER['HTTP_REFERER'], 'refresh');
    	}
        
        
	}

	


	public function get_moh(){

		$id = $this->input->post('id');
		
		$moha_vars = $this->db->where('governorate_id', $id)->get('mohafazat')->result();
		
		$moha = $this->load->view('site/mohafazat', array('options'=>$moha_vars), true);

		echo json_encode(array('data'=>$moha));

	}

	public function get_city(){

		$id = $this->input->post('id');
		
		$city_vars = $this->db->where('moha_id', $id)->get('city')->result();
		
		$city = $this->load->view('site/city', array('options'=>$city_vars), true);

		echo json_encode(array('data'=>$city));

	}

	public function get_district(){

		$id = $this->input->post('id');
		
		$city_district = $this->db->where('city_id', $id)->get('district')->result();
		
		$district = $this->load->view('site/district', array('options'=>$city_district), true);

		echo json_encode(array('data'=>$district));

	}


	public function get_attr(){

		$id = $this->input->post('id');
		
		$attr = $this->db->where('feature_active', 1)->where('feature_category_id', $id)->get('feature')->result();
		
		$gene_attr = $this->load->view('site/attr_search', array('attr'=>$attr), true);

		echo json_encode(array('data'=>$gene_attr));

	}

	public function init_search_guide(){
		
		header("Content-Type: application/xml; charset=utf-8");
		
		echo '<pre>';
			print_r($this->input->post());
		echo '</pre>';


		$guide_search_input = $this->input->post('guide_search_input');
		$near_me = $this->input->post('near_me');
		$area = $this->input->post('area');
		$moha = $this->input->post('moha');
		$city = $this->input->post('city');
		$district = $this->input->post('district');

		$search_result = $this->guide_search_input_category($guide_search_input, $area, $moha, $city, $district);

		echo '<pre>';
			print_r($search_result);
		echo '</pre>';


	}

	public function get_companies_by_location($lat, $lng)
	{
	    $radius=5;

	    $select=sprintf("( 3959 * acos( cos( radians('%s') ) * cos( radians( companies.lat ) ) * cos( radians( companies.lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( companies.lat ) ) ) ) AS distance", $lat, $lng, $lat);
	    $this->db->select($select, false);
	    $this->db->having('distance <', $radius);
	}

	public function finder(){

		$guide_search_input_type = $this->input->get('search_type');
		$guide_search_input_type_id = $this->input->get('search_type_id');
		$guide_search_input = $this->input->get('guide_search_input');
		$near_me = $this->input->get('near_me');
		$area = $this->input->get('area');
		$moha = $this->input->get('moha');
		$city = $this->input->get('city');
		$district = $this->input->get('district');

		$limit = 20;
		$offset = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
		// if($offset)
			// $offset = $offset * $limit - $limit - 1;

		$data['current_page'] = $offset;

		$data['get_param'] = '&guide_search_input='.$guide_search_input.'&area='.$area.'&moha='.$moha.'&city='.$city.'&district='.$district.'&near_me='.$near_me;

		switch ($guide_search_input_type) {
			case 'category':
				$data['all_rel_categories'] = $this->get_related_category_by_category($guide_search_input_type_id);
				$data['all_rel_brands'] = $this->get_related_category_by_brand($guide_search_input_type_id);
				$data['all_rel_cities'] = $this->get_related_category_by_city($guide_search_input_type_id);

				break;
			
			case 'keyword':
				$data['all_rel_categories'] = $this->get_related_keyword_by_category($guide_search_input_type_id);
				$data['all_rel_brands'] = $this->get_related_keyword_by_brand($guide_search_input_type_id);
				$data['all_rel_cities'] = $this->get_related_keyword_by_city($guide_search_input_type_id);

				break;
				
			case 'brand':
				$data['all_rel_categories'] = $this->get_related_brand_by_category($guide_search_input_type_id);
				$data['all_rel_brands'] = $this->get_related_brand_by_brand($guide_search_input_type_id);
				$data['all_rel_cities'] = $this->get_related_brand_by_city($guide_search_input_type_id);

				break;

			default:
				$search_result_ids =  $this->guide_search_input($guide_search_input_type, $guide_search_input_type_id, $guide_search_input, $area, $moha, $city, $district, $offset, false, true);

				$companies_ids=array();
				if($search_result_ids)
					foreach ($search_result_ids as $comp) {
						$companies_ids[]=$comp->companies_id;
					}

				$data['all_rel_categories'] = $this->get_related_company_by_category($companies_ids);
				$data['all_rel_brands'] = $this->get_related_company_by_brand($companies_ids);
				$data['all_rel_cities'] = $this->get_related_company_by_city($companies_ids);

				break;
		}
		
		$data['search_result'] =  $this->guide_search_input($guide_search_input_type, $guide_search_input_type_id, $guide_search_input, $area, $moha, $city, $district, $offset, $limit);

		$this->load->view('site/header');
		$this->load->view('site/finder', $data);
		$this->load->view('site/footer');

	}

	public function guide_search_input($guide_search_input_type, $guide_search_input_type_id, $guide_search_input, $area, $moha, $city, $district, $offset, $limit, $ids=false){

		$this->db->start_cache();
		switch ($guide_search_input_type) {
			case 'category':
				$this->db
					->join('vatrena_keys_category', 'vatrena_keys_category.vatrena_id = companies.companies_id')
					->where('vatrena_keys_category.category_id', $guide_search_input_type_id)
					->where('vatrena_keys_category.priority !=','')
					->order_by('vatrena_keys_category.priority', 'ASC')
					;

				break;
			
			case 'keyword':
				$this->db
					->join('vatrena_keys_keyword', 'vatrena_keys_keyword.vatrena_id = companies.companies_id')
					->where('vatrena_keys_keyword.keyword_id', $guide_search_input_type_id)
					->where('vatrena_keys_keyword.priority !=','')
					->order_by('vatrena_keys_keyword.priority', 'ASC')
					;

				break;
				
			case 'brand':
				$this->db
					->join('related_brand_vatrena', 'related_brand_vatrena.company_id = companies.companies_id')
					->where('related_brand_vatrena.brand_id', $guide_search_input_type_id)
					->where('related_brand_vatrena.priority !=','')
					;

				break;
			
			default:
				$this->db
					->like('company_name_en', $guide_search_input)
					->or_like('company_name_ar', $guide_search_input)
					;

				break;
		}
		
		if($area)
			$this->db->where('area', $area);
		if($moha)
			$this->db->where('mohafaza', $moha);
		if($city)
			$this->db->where('city', $city);
		if($district)
			$this->db->where('district', $district);

		if($this->input->get('lat') && $this->input->get('lng'))
			$this->get_companies_by_location($this->input->get('lat'), $this->input->get('lng'));

		$this->db->where('companies.active', 1);
		$this->db->stop_cache();
		
		if($ids){
			$this->db->select('companies.companies_id');
		}else{
		    // $count_rows = 10;
		    $count_rows = $this->db->get('companies')->num_rows();

	        $config['base_url'] = base_url('finder');
	        $config['total_rows'] = $count_rows;
	        $config['per_page'] = $limit;

	        $this->load->library('pagination');
	        $this->pagination->initialize($config);


		    // < limit >
		    if($limit)
		        $this->db->limit($limit, $offset);
		    // < / limit >

		    $this->db->select(array(
'companies_id','company_name_ar','company_name_en','logo','companyType','area','mohafaza','city','district','lat','lng','adress_ar','adress_en','email','password','company_about','employee_name','employee_job','employee_phone','company_mobile','company_telephone','company_about_en','website','featured_item','facebook','twitter','google_plus','linkedin','instagram','video','starting_hour','ending_hour','starting_hour_night','ending_hour_night','holidays','count_views','active','parent','user_id','bannar'));

		}

		$companies= $this->db->get('companies')->result();
		$this->db->flush_cache();

		return $companies;
	}

// ----------category-----------
	public function get_related_category_by_category($category_id){

		$this->db
			->join('categories_related', 'cat_keywords.keywords_id = categories_related.cat_child_id')
			->where('categories_related.cat_dad_id', $category_id)
			;
		
		$categories=$this->db
			->get('cat_keywords')->result();

		return $categories;
	}

	public function get_related_category_by_brand($category_id){

		$this->db
			->join('brand_keys_category', 'brand.brand_id = brand_keys_category.brand_id')
			->where('brand_keys_category.keyword_id', $category_id)
			;
		
		$brands=$this->db
			->get('brand')->result();

		return $brands;
	}

	public function get_related_category_by_city($category_id){

		$this->db
			->select(array('city.city_id','city.city_name','city.city_name_ar'))
			->join('companies', 'companies.city = city.city_id')
			->join('vatrena_keys_category', 'companies.companies_id = vatrena_keys_category.vatrena_id')
			->where('vatrena_keys_category.category_id', $category_id)
			->where('vatrena_keys_category.priority !=','')
			->where('companies.active', 1)
			->order_by('vatrena_keys_category.priority', 'ASC')
			->group_by('companies.city')
			;
		
		$cities=$this->db
			->get('city')->result();

		return $cities;
	}
// ----------keyword----------
	public function get_related_keyword_by_category($keyword_id){

		$this->db
			->join('related_keyword_category', 'cat_keywords.keywords_id = related_keyword_category.category_id')
			->where('related_keyword_category.keyword_id', $keyword_id)
			;
		
		$categories=$this->db
			->get('cat_keywords')->result();

		return $categories;
	}

	public function get_related_keyword_by_brand($keyword_id){

		$this->db
			->join('keyword_brand_related', 'brand.brand_id = keyword_brand_related.related_brand_id')
			->where('keyword_brand_related.related_keyword_id', $keyword_id)
			;
		
		$brands=$this->db
			->get('brand')->result();

		return $brands;
	}

	public function get_related_keyword_by_city($keyword_id){

		$this->db
			->select(array('city.city_id','city.city_name','city.city_name_ar'))
			->join('companies', 'companies.city = city.city_id')
			->join('vatrena_keys_keyword', 'companies.companies_id = vatrena_keys_keyword.vatrena_id')
			->where('vatrena_keys_keyword.keyword_id', $keyword_id)
			->where('vatrena_keys_keyword.priority !=','')
			->where('companies.active', 1)
			->order_by('vatrena_keys_keyword.priority', 'ASC')
			->group_by('companies.city')
			;
		
		$cities=$this->db
			->get('city')->result();

		return $cities;
	}
// ----------brand----------
	public function get_related_brand_by_category($brand_id){

		$this->db
			->join('brand_keys_category', 'cat_keywords.keywords_id = brand_keys_category.keyword_id')
			->where('brand_keys_category.brand_id', $brand_id)
			;
		
		$categories=$this->db
			->get('cat_keywords')->result();

		return $categories;
	}

	public function get_related_brand_by_brand($brand_id){

		return array();
	}

	public function get_related_brand_by_city($brand_id){

		$this->db
			->select(array('city.city_id','city.city_name','city.city_name_ar'))
			->join('companies', 'companies.city = city.city_id')
			->join('related_brand_vatrena', 'companies.companies_id = related_brand_vatrena.company_id')
			->where('related_brand_vatrena.brand_id', $brand_id)
			->where('related_brand_vatrena.priority !=','')
			->where('companies.active', 1)
			->order_by('related_brand_vatrena.priority', 'ASC')
			->group_by('companies.city')
			;
		
		$cities=$this->db
			->get('city')->result();

		return $cities;
	}
// ----------brand----------
	public function get_related_company_by_category($companies_ids){
		if(! $companies_ids)
			return array();

		$this->db
			->join('vatrena_keys_category', 'cat_keywords.keywords_id = vatrena_keys_category.category_id')
			->where_in('vatrena_keys_category.vatrena_id', $companies_ids)
			;
		
		$categories=$this->db
			->get('cat_keywords')->result();

		return $categories;
	}

	public function get_related_company_by_brand($companies_ids){
		if(! $companies_ids)
			return array();

		$this->db
			->join('related_brand_vatrena', 'brand.brand_id = related_brand_vatrena.brand_id')
			->where_in('related_brand_vatrena.company_id', $companies_ids)
			;
		
		$brands=$this->db
			->get('brand')->result();

		return $brands;
	}

	public function get_related_company_by_city($companies_ids){
		if(! $companies_ids)
			return array();

		$this->db
			->select(array('city.city_id','city.city_name','city.city_name_ar'))
			->join('companies', 'companies.city = city.city_id')
			->where_in('companies.companies_id', $companies_ids)
			->where('companies.active', 1)
			->group_by('companies.city')
			;
		
		$cities=$this->db
			->get('city')->result();

		return $cities;
	}
// --------------------


	// public function get_relative_category($guide_search_input){

	// 	$all_rel_category = array();

	// $try_category = $this->db->where('is_category', 1)->or_like('keyword_title', $guide_search_input)->or_like('cat_keywords_en', $guide_search_input)->get('cat_keywords')->row('keywords_id');


	// $try_company  = $this->db->like('company_name_ar', $guide_search_input)->or_like('company_name_en', $guide_search_input)->get('companies')->row('companies_id');

	// if($try_company){
	    
	//     $relative_comp = $this->db->select('category_id')->where('vatrena_id', $try_company)->get('vatrena_keys_category')->result();

	// 	if(!empty($relative_comp))foreach($relative_comp as $rel_comp){
	// 		if(!in_array($rel_comp->category_id,$all_rel_category)){
	// 			array_push($all_rel_category, $rel_comp->category_id);
	// 		}
	// 	}
	// }

	// 	if($try_category){
	// 		$relative_category = $this->db->select('cat_child_id')->where('cat_dad_id', $try_category)->get('categories_related')->result();
	// 		if($relative_category)foreach($relative_category as $rel_category){
	// 			if(!in_array($rel_category->cat_child_id, $all_rel_category)){
	// 				array_push($all_rel_category, $rel_category->cat_child_id);
	// 			}
	// 		}
	// 	}


	// 	if(!empty($all_rel_category)){	
	// 		return $this->db->where_in('keywords_id', $all_rel_category)->get('cat_keywords')->result();
	// 	} 
		
	// }


	public function get_relative_brand($guide_search_input){

		$brand = array();

		$try_category = $this->db->where('is_category', 1)->or_like('keyword_title', $guide_search_input)->or_like('cat_keywords_en', $guide_search_input)->get('cat_keywords')->row('keywords_id');


		if($try_category){
			$relative_category = $this->db->select('brand_id')->where('keyword_id', $try_category)->get('brand_keys_category')->result();
			if($relative_category)foreach($relative_category as $rel_category){
				if(!in_array($rel_category->brand_id, $brand)){
					array_push($brand, $rel_category->brand_id);
				}
			}
		}

		if(!empty($brand)){	
			return  $this->db->where_in('keywords_id', $brand)->get('cat_keywords')->result();
		} 
	}

	public function single_page($vatrena_name, $id){


		// vatrenas_places($id);
		// die();
		$data['vatrena'] = $this->db->where('companies_id', $id)->get('companies')->row();
		//$data['photos'] = $this->db->where('vatrena_id', $id)->join('photo_desc','photo_desc.photo_id = photo.photo_id')->get('photo')->result();
		$plusOne = (int) $data['vatrena']->count_views + 1;

		$data['viewer'] = $this->db->where('companies_id', $id)->update('companies', array('count_views'=>$plusOne));
		// videos 
		$data['videos'] = $this->db->where('video_vatrena_id', $id)->order_by('video_id', 'DESC')->get('video')->result();
		// photos 
		$data['photos'] = $this->db->where('vatrena_id', $id)->join('photo_desc','photo_desc.photo_id = photo.photo_id')->get('photo')->result();
		// files 
		$data['files'] = $this->db->where('file_vatrena_id', $id)->get('files')->result();
		//phone_numbers 
		$data['phone_numbers'] = $this->db->where('vatrena_id', $id)->get('phone_numbers')->result();

		$data['photo_categories'] = $this->db->select('photo_id ,photo_category')->where('vatrena_id', $id)->group_by('photo_category')->get('photo')->result();

		$data['photo_counts'] = $this->db->where('photo_category')->get('photo')->row();


		if($data['vatrena']->parent == 0){	
			$data['branches'] = $this->db->select('companies_id,company_name_ar,company_name_en')->where('parent', $id)->get('companies')->result();
		}else{
			$parent_id=$this->db->where('parent', $data['vatrena']->parent)->get('companies')->row('parent');
			// print_r($data['vatrena']->companies_id);
		
			$data['branches'] = $this->db->select('companies_id,company_name_ar,company_name_en')->where('companies_id', $parent_id)->or_where('parent', $parent_id)->where_not_in('companies_id', $id)->get('companies')->result();
			// echo $this->db->last_query();
			// echo '<pre>';
			// 	print_r($data['branches']);
			// echo '</pre>';
			// die();
		}

		$data['schedule'] = $this->Schedule($id);
			
		$data['photo_counts'] = count($data['photos']);

		$categories = $this->db->join('cat_keywords', 'vatrena_keys_category.category_id = cat_keywords.keywords_id')->where('vatrena_keys_category.vatrena_id', $id)->get('vatrena_keys_category')->result();
		$keywords = $this->db->join('cat_keywords', 'vatrena_keys_keyword.keyword_id = cat_keywords.keywords_id')->where('vatrena_keys_keyword.vatrena_id', $id)->get('vatrena_keys_keyword')->result();


		$telephone_comp = $this->db->where('companies_id', $id)->get('companies')->row('company_telephone');

		$data['arrayTele'] = array();
		if(!empty($telephone_comp)){

			
			$tele_composer = array();
			$telephone_with_code = explode(',', $telephone_comp);

			// foreach($telephone_with_code as $tele_code){
				// $tele_code_spliter = explode('-', $tele_code);
				// echo $imploded_code=implode('-', $tele_code_spliter);
				// if(isset($tele_code_spliter[1]) && isset($tele_code_spliter[0])){
				// foreach($tele_code_spliter as $key => $spliter){
					// $tele_composer[$key]=$spliter;
					// $data['arrayTele'][]
					// array_push($data['arrayTele'], $tele_composer);
				// }
				// }	
			// }
			// die();
			$data['arrayTele'] = $telephone_with_code;

		}
		
		// echo '<pre>';
		// print_r($telephone_with_code);
		// echo '</pre>';die();
		$category = array();
		foreach ($categories as $category_ex) {
			if(is_arabic()){
				array_push($category, $category_ex->keyword_title);
			}else{
				array_push($category, $category_ex->cat_keywords_en);
			}
		}
		$data['keyword'] = array();
		foreach ($keywords as $keyword_ex) {
			if(is_arabic()){
				array_push($data['keyword'], $keyword_ex->keyword_title);
			}else{
				array_push($data['keyword'], $keyword_ex->cat_keywords_en);
			}
		}

		$data['category'] = implode(',', $category);

		$data['cities'] = $this->db->order_by('city_name_ar', 'ASC')->get('city')->result();
		if(!empty($data['vatrena'])){
			$this->load->view('site/header');
			$this->load->view('site/single_page', $data);
			$this->load->view('site/footer');
		}else{
			redirect(base_url());
		}
	
	}	

	public function Schedule($id){

		$schedule = $this->db->where('companies_id', $id)->get('companies')->row();

		$holidays_array = explode('-', $schedule->holidays);
		$holidays = array();
		foreach($holidays_array as $holiday){
			array_push($holidays, $holiday);
		}

		$days = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday'); 
		if($schedule->starting_hour != ' ' AND $schedule->ending_hour !=' ' || $schedule->starting_hour != '' AND $schedule->ending_hour !='' || $schedule->starting_hour_night != ' ' AND $schedule->ending_hour_night !=' ' || $schedule->starting_hour_night != '' AND $schedule->ending_hour_night !=''){

			$trs = '';
			foreach($days as $day){
				$trs.='<tr>
						<td>
							'.$day.'
						</td>
						<td>
							'.(in_array(strtolower($day), $holidays_array)  ? '<span class="label label-danger">Closed</span>':$schedule->starting_hour.' - '.$schedule->ending_hour).'
						</td>
							'.is_night_shift($day, $holidays_array, $schedule->holidays, $schedule->starting_hour_night, $schedule->ending_hour_night).'
					</tr>';
			}
			return $trs;
		}
	}

	// public function guide_search_input($guide_search_input=null, $area=null, $moha=null, $city=null, $district=null, $offset, $limit){


	// 	// if($area != null)$this->db->where('area', $area);
	// 	// if($moha != null)$this->db->where('mohafaza', $area);
	// 	// if($city != null)$this->db->where('city', $area);
	// 	// if($district != null)$this->db->where('district', $area);

	// 	if($guide_search_input != null){

	// 		$companies_try_arabic = $this->db->like('company_name_ar', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->get('companies')->result();

	// 		if(!$companies_try_arabic){

	// 			$companies_try_english = $this->db->like('company_name_en', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->get('companies')->result();

	// 			if($companies_try_english){

	// 				return $companies_try_english;
				
	// 			}else{

	// 				$companies_try_Mobile = $this->db->like('company_mobile', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->get('companies')->result();

	// 				if($companies_try_Mobile){

	// 					return $companies_try_Mobile;

	// 				}else{

	// 					$companies_try_telephone = $this->db->like('company_telephone', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->get('companies')->result();

	// 					if($companies_try_telephone){

	// 						return $companies_try_telephone;

	// 					}else{

	// 						$companies_try_address_ar = $this->db->like('adress_ar', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->get('companies')->result();
							
	// 						if($companies_try_address_ar){

	// 							return $companies_try_address_ar;

	// 						}else{

	// 							$companies_try_address_en = $this->db->like('adress_en', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->get('companies')->result();
								
	// 							if($companies_try_address_en){

	// 								return $companies_try_address_en;

	// 							}else{

	// 								$category_id = $this->db->like('cat_keywords_en', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->where('is_category', 1)->get('cat_keywords')->row('keywords_id');
									
	// 								if($category_id){


	// 									$vatrena_keys_category = $this->db->select('vatrena_id')->where('category_id', $category_id)->order_by("priority", "ASC")->get('vatrena_keys_category')->result();
										
	// 									$vatrena_ids = array();

	// 									foreach($vatrena_keys_category as $vatrena_id){

	// 										array_push($vatrena_ids, $vatrena_id->vatrena_id);

	// 									}


	// 									$companies_try_category = $this->db->where_in('companies_id', $vatrena_ids)->order_by('companies_id', 'DESC')->limit($limit, $offset)->get('companies')->result();

	// 									if($companies_try_category){

	// 										return $companies_try_category;

	// 									}

										

	// 								}else{

	// 									$category_id = $this->db->like('keyword_title', $this->db->escape_str($guide_search_input))->where('is_category', 1)->get('cat_keywords')->row('keywords_id');

	// 									if($category_id){

	// 									$vatrena_keys_category = $this->db->select('vatrena_id')->where('category_id', $category_id)->order_by("priority", "ASC")->get('vatrena_keys_category')->result();

										
	// 									$vatrena_ids = array();

	// 									foreach($vatrena_keys_category as $vatrena_id){

	// 										array_push($vatrena_ids, $vatrena_id->vatrena_id);

	// 									}


	// 									$companies_try_category = $this->db->where_in('companies_id', $vatrena_ids)->order_by('companies_id', 'ASC')->limit($limit, $offset)->get('companies')->result();

	// 									if($companies_try_category){

	// 										return $companies_try_category;

	// 									}

	// 									}else{
											
	// 										$keyword_id = $this->db->like('cat_keywords_en', $this->db->escape_str($guide_search_input))->get('cat_keywords')->row('keywords_id');

	// 										if($keyword_id){

	// 											$vatrena_keys_keyword = $this->db->select('vatrena_id')->where('keyword_id', $keyword_id)->get('vatrena_keys_keyword')->result();
												
	// 											$vatrena_ids = array();

	// 											foreach($vatrena_keys_keyword as $vatrena_id){

	// 												array_push($vatrena_ids, $vatrena_id->vatrena_id);

	// 											}

	// 											$companies_try_keyword = $this->db->where_in('companies_id', $vatrena_ids)->order_by('companies_id', 'DESC')->limit($limit, $offset)->get('companies')->result();

	// 											if($companies_try_keyword){

	// 												return $companies_try_keyword;

	// 											}

													

	// 										}else{

	// 											$keyword_id = $this->db->like('keyword_title', $this->db->escape_str($guide_search_input))->get('cat_keywords')->row('keywords_id');

	// 											if($keyword_id){

	// 												$vatrena_keys_keyword = $this->db->select('vatrena_id')->where('keyword_id', $keyword_id)->get('vatrena_keys_keyword')->result();
													
	// 												$vatrena_ids = array();

	// 												foreach($vatrena_keys_keyword as $vatrena_id){

	// 													array_push($vatrena_ids, $vatrena_id->vatrena_id);

	// 												}

	// 												$companies_try_keyword = $this->db->where_in('companies_id', $vatrena_ids)->order_by('companies_id', 'DESC')->limit($limit, $offset)->get('companies')->result();

	// 												if($companies_try_keyword){

	// 													return $companies_try_keyword;

	// 												}
	// 											}
	// 										}
	// 									}
	// 								}
	// 							}
	// 						}
	// 					}
	// 				}	
	// 			}
	// 		}else{
	// 			return $companies_try_arabic;
	// 		}
	// 	}
	// }
	public function guide_search_input_category($guide_search_input=null, $area=null, $moha=null, $city=null, $district=null, $offset, $limit){


		// if($area != null)$this->db->where('area', $area);
		// if($moha != null)$this->db->where('mohafaza', $area);
		// if($city != null)$this->db->where('city', $area);
		// if($district != null)$this->db->where('district', $area);
		header("Content-Type: application/xml; charset=utf-8");

   		$search_value = $this->input->post('search_value');
   		
   		$categories = $this->db->where('is_category', 1)->like('keyword_title', $search_value)->or_like('cat_keywords_en', $search_value)->get('cat_keywords')->result();
   		$keyword  = $this->db->where('is_category', 0)->like('keyword_title', $search_value)->or_like('cat_keywords_en', $search_value)->get('cat_keywords')->result();
   		$company  = $this->db->like('company_name_ar', $search_value)->or_like('company_name_en', $search_value)->get('companies')->result();






		// die();

		if($guide_search_input != null){

			$companies_try_arabic = $this->db->like('company_name_ar', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->get('companies')->result();

			if(!$companies_try_arabic){

				$companies_try_english = $this->db->like('company_name_en', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->get('companies')->result();

				if($companies_try_english){

					return $companies_try_english;
				
				}else{

					$companies_try_Mobile = $this->db->like('company_mobile', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->get('companies')->result();

					if($companies_try_Mobile){

						return $companies_try_Mobile;

					}else{

						$companies_try_telephone = $this->db->like('company_telephone', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->get('companies')->result();

						if($companies_try_telephone){

							return $companies_try_telephone;

						}else{

							$companies_try_address_ar = $this->db->like('adress_ar', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->get('companies')->result();
							
							if($companies_try_address_ar){

								return $companies_try_address_ar;

							}else{

								$companies_try_address_en = $this->db->like('adress_en', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->get('companies')->result();
								
								if($companies_try_address_en){

									return $companies_try_address_en;

								}else{

									$category_id = $this->db->like('cat_keywords_en', $this->db->escape_str($guide_search_input))->limit($limit, $offset)->where('is_category', 1)->get('cat_keywords')->row('keywords_id');
									
									if($category_id){


										$vatrena_keys_category = $this->db->select('vatrena_id')->where('category_id', $category_id)->order_by("priority", "ASC")->get('vatrena_keys_category')->result();
										
										$vatrena_ids = array();

										foreach($vatrena_keys_category as $vatrena_id){

											array_push($vatrena_ids, $vatrena_id->vatrena_id);

										}


										$companies_try_category = $this->db->where_in('companies_id', $vatrena_ids)->order_by('companies_id', 'DESC')->limit($limit, $offset)->get('companies')->result();

										if($companies_try_category){

											return $companies_try_category;

										}

										

									}else{

										$category_id = $this->db->like('keyword_title', $this->db->escape_str($guide_search_input))->where('is_category', 1)->get('cat_keywords')->row('keywords_id');

										if($category_id){

										$vatrena_keys_category = $this->db->select('vatrena_id')->where('category_id', $category_id)->order_by("priority", "ASC")->get('vatrena_keys_category')->result();

										
										$vatrena_ids = array();

										foreach($vatrena_keys_category as $vatrena_id){

											array_push($vatrena_ids, $vatrena_id->vatrena_id);

										}


										$companies_try_category = $this->db->where_in('companies_id', $vatrena_ids)->order_by('companies_id', 'ASC')->limit($limit, $offset)->get('companies')->result();

										if($companies_try_category){

											return $companies_try_category;

										}

										}else{
											
											$keyword_id = $this->db->like('cat_keywords_en', $this->db->escape_str($guide_search_input))->get('cat_keywords')->row('keywords_id');

											if($keyword_id){

												$vatrena_keys_keyword = $this->db->select('vatrena_id')->where('keyword_id', $keyword_id)->get('vatrena_keys_keyword')->result();
												
												$vatrena_ids = array();

												foreach($vatrena_keys_keyword as $vatrena_id){

													array_push($vatrena_ids, $vatrena_id->vatrena_id);

												}

												$companies_try_keyword = $this->db->where_in('companies_id', $vatrena_ids)->order_by('companies_id', 'DESC')->limit($limit, $offset)->get('companies')->result();

												if($companies_try_keyword){

													return $companies_try_keyword;

												}

													

											}else{

												$keyword_id = $this->db->like('keyword_title', $this->db->escape_str($guide_search_input))->get('cat_keywords')->row('keywords_id');

												if($keyword_id){

													$vatrena_keys_keyword = $this->db->select('vatrena_id')->where('keyword_id', $keyword_id)->get('vatrena_keys_keyword')->result();
													
													$vatrena_ids = array();

													foreach($vatrena_keys_keyword as $vatrena_id){

														array_push($vatrena_ids, $vatrena_id->vatrena_id);

													}

													$companies_try_keyword = $this->db->where_in('companies_id', $vatrena_ids)->order_by('companies_id', 'DESC')->limit($limit, $offset)->get('companies')->result();

													if($companies_try_keyword){

														return $companies_try_keyword;

													}
												}
											}
										}
									}
								}
							}
						}
					}	
				}
			}else{
				return $companies_try_arabic;
			}
		}
	}

	public function count_all_result_search($guide_search_input=null, $area=null, $moha=null, $city=null, $district=null){
		// if($area != null)$this->db->where('area', $area);
		// if($moha != null)$this->db->where('mohafaza', $area);
		// if($city != null)$this->db->where('city', $area);
		// if($district != null)$this->db->where('district', $area);

		if($guide_search_input != null){

			$companies_try_arabic = $this->db->like('company_name_ar', $this->db->escape_str($guide_search_input))->count_all_results('companies');

			if(!$companies_try_arabic){

				$companies_try_english = $this->db->like('company_name_en', $this->db->escape_str($guide_search_input))->count_all_results('companies');

				if($companies_try_english){

					return $companies_try_english;
				
				}else{

					$companies_try_Mobile = $this->db->like('company_mobile', $this->db->escape_str($guide_search_input))->count_all_results('companies');

					if($companies_try_Mobile){

						return $companies_try_Mobile;

					}else{

						$companies_try_telephone = $this->db->like('company_telephone', $this->db->escape_str($guide_search_input))->count_all_results('companies');

						if($companies_try_telephone){

							return $companies_try_telephone;

						}else{

							$companies_try_address_ar = $this->db->like('adress_ar', $this->db->escape_str($guide_search_input))->count_all_results('companies');
							
							if($companies_try_address_ar){

								return $companies_try_address_ar;

							}else{

								$companies_try_address_en = $this->db->like('adress_en', $this->db->escape_str($guide_search_input))->count_all_results('companies');
								
								if($companies_try_address_en){

									return $companies_try_address_en;

								}else{

									$category_id = $this->db->like('cat_keywords_en', $this->db->escape_str($guide_search_input))->where('is_category', 1)->get('cat_keywords')->row('keywords_id');
									
									if($category_id){


										$vatrena_keys_category = $this->db->select('vatrena_id')->where('category_id', $category_id)->order_by("priority", "ASC")->get('vatrena_keys_category')->result();
										
										$vatrena_ids = array();

										foreach($vatrena_keys_category as $vatrena_id){

											array_push($vatrena_ids, $vatrena_id->vatrena_id);

										}


										$companies_try_category = $this->db->where_in('companies_id', $vatrena_ids)->order_by('companies_id', 'DESC')->count_all_results('companies');

										if($companies_try_category){

											return $companies_try_category;

										}

										

									}else{

										$category_id = $this->db->like('keyword_title', $this->db->escape_str($guide_search_input))->where('is_category', 1)->get('cat_keywords')->row('keywords_id');

										if($category_id){

										$vatrena_keys_category = $this->db->select('vatrena_id')->where('category_id', $category_id)->order_by("priority", "ASC")->get('vatrena_keys_category')->result();
										
										$vatrena_ids = array();

										foreach($vatrena_keys_category as $vatrena_id){

											array_push($vatrena_ids, $vatrena_id->vatrena_id);

										}


										$companies_try_category = $this->db->where_in('companies_id', $vatrena_ids)->order_by('companies_id', 'DESC')->count_all_results('companies');

										if($companies_try_category){

											return $companies_try_category;

										}

										}else{
											
											$keyword_id = $this->db->like('cat_keywords_en', $this->db->escape_str($guide_search_input))->get('cat_keywords')->row('keywords_id');

											if($keyword_id){

												$vatrena_keys_keyword = $this->db->select('vatrena_id')->where('keyword_id', $keyword_id)->order_by("priority", "ASC")->get('vatrena_keys_keyword')->result();
												
												$vatrena_ids = array();

												foreach($vatrena_keys_keyword as $vatrena_id){

													array_push($vatrena_ids, $vatrena_id->vatrena_id);

												}

												$companies_try_keyword = $this->db->where_in('companies_id', $vatrena_ids)->order_by('companies_id', 'DESC')->count_all_results('companies');

												if($companies_try_keyword){

													return $companies_try_keyword;

												}

													

											}else{

												$keyword_id = $this->db->like('keyword_title', $this->db->escape_str($guide_search_input))->get('cat_keywords')->row('keywords_id');

												if($keyword_id){

													$vatrena_keys_keyword = $this->db->select('vatrena_id')->where('keyword_id', $keyword_id)->order_by("priority", "ASC")->get('vatrena_keys_keyword')->result();
													
													$vatrena_ids = array();

													foreach($vatrena_keys_keyword as $vatrena_id){

														array_push($vatrena_ids, $vatrena_id->vatrena_id);

													}

													$companies_try_keyword = $this->db->where_in('companies_id', $vatrena_ids)->order_by('companies_id', 'DESC')->count_all_results('companies');

													if($companies_try_keyword){

														return $companies_try_keyword;

													}
												}
											}
										}
									}
								}
							}
						}
					}	
				}
			}else{
				return $companies_try_arabic;
			}
		}
	}

	public function get_dist_branch(){
		
		$city_id = $this->input->post('id');
		$bran = $this->input->post('bran');

		$districts = $this->db->where('city_id', $city_id)->get('district')->result();

		$district_option = ''; 

		$district_option .= '<option>الحى</option>'; 
		foreach($districts as $district){
			
			$district_option .= '<option value="'.$district->district_id.'">'.$district->district_title_ar.'</option>'; 
		} 			

		$branches1 = $this->db->select('companies_id,company_name_ar,company_name_en')->where('city', $city_id)->where('parent', $bran)->get('companies')->result();

		$branches= '';

		foreach($branches1 as $brans){
			$branches.='<tr>
				      		<td class="linkStyle"><a href="'. base_url() .'guide/'. no_dashes($brans->company_name_en) .'/'. $brans->companies_id .'">'. $brans->company_name_ar .'</a></td>
				    	</tr>';
		}


		echo json_encode(array('dist'=>$district_option,'branches'=> $branches));

	}

	public function get_branch(){
		
		$district_id = $this->input->post('id');
		$bran = $this->input->post('bran');

		$branches1 = $this->db->select('companies_id,company_name_ar,company_name_en')->where('district', $district_id)->where('parent', $bran)->get('companies')->result();

		$branches= '';

		foreach($branches1 as $brans){
			$branches.='<tr>
				      		<td class="linkStyle"><a href="'. base_url() .'guide/'. no_dashes($brans->company_name_en) .'/'. $brans->companies_id .'">'. $brans->company_name_ar .'</a></td>
				    	</tr>';
		}


		echo json_encode(array('branches'=> $branches));

	}


	public function add_new_phone(){

		$element_number = $this->input->post('element_number');

		$phone_cont = $this->load->view('site/phone_number',array('element_number'=>$element_number), true);

		echo json_encode(array('phone_container'=>$phone_cont));

	}

	public function add_new_telephone(){

		$element_number = $this->input->post('element_number');

		$phone_cont = $this->load->view('site/telephone_number',array('element_number'=>$element_number), true);

		echo json_encode(array('telephone_container'=>$phone_cont));

	}


	public function login_landing(){
    
		$this->load->library('form_validation');

        $data = new stdClass();
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        // set variables from the form
        $email    = $this->input->post('email');
        $password = $this->input->post('password');

        if ($this->form_validation->run()){
	        if ($this->resolve_user_login($email, $password)) {

	            $user_id                       = $this->get_user_id($email, $password);
	            $user_name                           = $this->get_username($user_id);
	            //send session data
	            $sessiondata['user_id']        = $user_id;
	            $sessiondata['user_email']     = (string) $email;
	            $sessiondata['user_name']     = (string) $user_name;
	            $sessiondata['user_logged_in'] = (bool) true; //for check login true or false

	            $this->session->set_userdata($sessiondata);
	            
	            //redirect if  register sucsess


	            if($sessiondata){

	            	// redirect(base_url('profile/'. profile_name_dash($user_name) .'/'.$user_id));

	                echo json_encode(array('done'=>'correct','redirect'=>base_url().'profile/'. profile_name_dash($user_name) .'/'.$user_id));

	            }else{

	                echo json_encode(array('error'=>'incorrect password or email'));
	                
	            }

	        } else {
	    
	            echo json_encode(array('error'=>'incorrect password or email or account may has been removed'));
	        
	        }

	    }else{

	    	echo json_encode(array('error'=>validation_errors()));
	   	}
    }

    public function get_username($id) {

        $this->db->select('user_name');

        $this->db->from('users');

        $this->db->where('user_id', $id);

        return $this->db->get()->row('user_name');

    }

    public function get_user_id($email, $password) {

        $this->db->select('user_id');

        $this->db->from('users');

        $this->db->where('email', $email);
        $this->db->or_where('user_name', $email);
        $this->db->where('password', md5($password));

        return $this->db->get()->row('user_id');

    }

    public function resolve_user_login($email, $password) {



        $this->db->select('password');

        $this->db->from('users');

        $this->db->where('email', $email);
        $this->db->or_where('user_name', $email);

        // $this->db->where('adv_active', 1);

        $userpassword = $this->db->get()->row('password');

        if($userpassword == md5($password)){

        	return true;

        }

        else
        {

         	return false;

        }

    }

	public function insert_free_vatrena(){
		
		header("Content-Type: application/xml; charset=utf-8");

		$user_name = $this->input->post('user_name');
	    $password = $this->input->post('password');
	    $confPassword = $this->input->post('confPassword');
	    $CompanyEnglish = $this->input->post('CompanyEnglish');
	    $CompanyArabic = $this->input->post('CompanyArabic');
	    $categories = $this->input->post('categories');
	    $email = $this->input->post('email');
	    $area = $this->input->post('area');
	    $moha = $this->input->post('moha');
	    $city = $this->input->post('city');
	    $district = $this->input->post('district');
	    $englishAddress = $this->input->post('englishAddress');
	    $arabicAddress = $this->input->post('arabicAddress');
	    $englishDescription = $this->input->post('englishDescription');
	    $arabicDescription = $this->input->post('arabicDescription');
	    $logo = $this->input->post('logo');
	    

	   
	    $mobile = $this->input->post('mobile');

	    $code = $this->input->post('code');
	    $telephone = $this->input->post('telephone');

	    $this->form_validation->set_rules('user_name', 'user_name', 'required');
	    $this->form_validation->set_rules('confPassword', 'confPassword', 'required');
	    $this->form_validation->set_rules('password', 'password', 'required|matches[confPassword]');
	    $this->form_validation->set_rules('CompanyEnglish', 'CompanyEnglish', 'required');
	    $this->form_validation->set_rules('CompanyArabic', 'CompanyArabic', 'required');
	    $this->form_validation->set_rules('categories', 'categories', 'required');
	    $this->form_validation->set_rules('email', 'email', 'required');
	    $this->form_validation->set_rules('area', 'area', 'required');
	    $this->form_validation->set_rules('moha', 'moha', 'required');
	    $this->form_validation->set_rules('city', 'city', 'required');
	    $this->form_validation->set_rules('district', 'district', 'required');
	    $this->form_validation->set_rules('englishAddress', 'englishAddress', 'required');
	    $this->form_validation->set_rules('arabicAddress', 'arabicAddress', 'required');
	    $this->form_validation->set_rules('englishDescription', 'englishDescription', 'required');
	    $this->form_validation->set_rules('arabicDescription', 'arabicDescription', 'required');
	    $this->form_validation->set_rules('mobile', 'mobile', 'required');
	    $this->form_validation->set_rules('code', 'code', 'required');
	    $this->form_validation->set_rules('telephone', 'telephone', 'required');

	    $mobile = implode('-', $mobile);


	    $tele = array_combine($telephone, $code);

	    $tele_container = array();
	    foreach($tele as $telephone => $code){
	    	if(empty($code) || empty($telephone)){
	    		continue;
	    	}else{
	    		$code_tele = $code.'-'.$telephone;
	    		array_push($tele_container, $code_tele);
	    	}
	    }

	    $tele_container = implode(',', $tele_container);
	 
     	
     	if(empty($tele_container)){
     		$tele_container = '';
     	}   



     	$data = array(

     		'user_name'=>$user_name,
     		'password'=>md5($password),
     		'is_admin'=>0,
     		'phone'=>$mobile,
     		'email'=>$email,
     		'vat_coin'=>1200
     	);

     	if($this->db->insert('users', $data)){
     		$last_inserted_user_id =  $this->db->insert_id();
     	}else{
     		echo json_encode(array('error'=>'check your data'));
     	}

     	 $comp = array(

     		'company_name_ar'=> $CompanyArabic,
     		'company_name_en'=> $CompanyEnglish,
     		'logo'=> $logo, 
     		'area'=> $area, 
     		'mohafaza'=> $moha, 
     		'city'=> $city, 
     		'district'=> $district, 
     		'adress_ar'=> $arabicAddress, 
     		'adress_en'=> $englishAddress, 
     		'email'=> $email, 
     		'company_about'=> $arabicDescription, 
     		'company_mobile'=> $mobile, 
     		'company_telephone'=> $tele_container,
     		'company_about_en'=> $englishDescription,
     		'active'=> 0,
     		'parent'=> 0,
     		'user_id'=> $last_inserted_user_id

     	);

     	 if($this->db->insert('companies', $comp)){
     	 	$last_inserted_company_id = $this->db->insert_id();
     	 }else{
     		echo json_encode(array('error'=>'check your data'));
     	 }
     	
     	 if($this->db->insert('vatrena_keys_category', array(
     	 	
     	 	'vatrena_id' =>$last_inserted_company_id, 
     	 	'category_id' =>$categories

     	 ))){

            
            //send session data
            $sessiondata['user_id']        = $last_inserted_user_id;
            $sessiondata['user_email']     = (string) $email;
            $sessiondata['user_name']     = (string) $user_name;
            $sessiondata['user_logged_in'] = (bool) true; //for check login true or false

            $this->session->set_userdata($sessiondata);
            
            if($sessiondata){
     	 		echo json_encode(array('done'=>'Your Company Has been Created','redirect'=>base_url().'profile/'. profile_name_dash($user_name) .'/'.$last_inserted_user_id));
            }
     	 }else{
     		echo json_encode(array('error'=>'check your data'));
     	 }
	}

	public function resize_image($path, $data_image)
    {
        $this->load->library('image_lib');
        
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['maintain_ratio'] = TRUE;
        
        $config['width']     = $data_image['image_width'];
        if($data_image['image_width'] >= 600)
            $config['width']     = 700;
        else
            return false;
        
        // $config['width']     = 75;
        $config['height']   = $data_image['image_height'];
    
        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }

	public function post_logo_register(){

		$date=date('Y').'/'.date('m').'/';
    	$path='./assets/new_uploads/'.$date;
    	if(! file_exists($path))
			mkdir($path, 0777, true);

		$config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 1000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file')) {
	        die( json_encode(array('status'=>'error', 'error'=>$this->upload->display_errors())) );	    		
        } else {
            $data_image = $this->upload->data();
            $this->resize_image($path.$data_image['file_name'], $data_image);
            $filename=$date.$data_image['file_name'];
	        die( json_encode(array('status'=>'success', 'filename'=>$filename)) );	    		
        }

	}

	public function post_picture_album(){

		$date=date('Y').'/'.date('m').'/';
    	$path='./assets/new_uploads/'.$date;
    	if(! file_exists($path))
			mkdir($path, 0777, true);

		$config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 1000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file')) {
	        die( json_encode(array('status'=>'error', 'error'=>$this->upload->display_errors())) );	    		
        } else {
            $data_image = $this->upload->data();
            $this->resize_image($path.$data_image['file_name'], $data_image);
            $filename=$date.$data_image['file_name'];
	        die( json_encode(array('status'=>'success', 'filename'=>$filename)) );	    		
        }

	}


	public function signout()
    {
        // $this->session->sess_destroy();
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_logged_in');
        $this->session->unset_userdata('user_name');
        // $this->session->unset_userdata('precentage');
        // $this->session->unset_userdata('user_type');
        redirect(base_url(), 'refresh');
    }

    public function create_album(){

    	header("Content-Type: application/xml; charset=utf-8");

    	if(is_login()){

	    	$this->load->library('form_validation');

	        $data = new stdClass();
	        $this->form_validation->set_rules('album_name_ar', 'Album name arabic', 'trim|required');
	        $this->form_validation->set_rules('album_name_en', 'Album name english', 'trim|required');

	    	$album_name_ar = $this->input->post('album_name_ar');
	    	$album_name_en = $this->input->post('album_name_en');
	    	$user_id = $this->session->userdata('user_id');


	        if ($this->form_validation->run()){
	    				

	        	$data = array(

	        		'photo_cat_name'=>$album_name_ar,
	        		'photo_category_en'=>$album_name_en,
	        		'user_id'=>$user_id
	        	);

	    		if($this->db->insert('photo_category', $data)){
	    			echo json_encode(array('done'=>'Album is been Add success','album_name_en'=>$album_name_en,'album_id'=>$this->db->insert_id()));

	    		}else{

	    			echo json_encode(array('error'=>'try Again later'));

	    		} 
	    		    
	        }else{
	        	echo json_encode(array('error'=>validation_errors()));	
	        }

    	}else{
    		echo json_encode(array('redirect'=>base_url()));
    	}

    }


    public function album_maker(){
    	

    	$img = $this->input->post('img');
    	$photo_album = $this->input->post('photo_album');
    	$desc_ar = $this->input->post('desc_ar');
    	$desc_en = $this->input->post('desc_en');

    	$photo = array(
    		'photo'=>$img,
    		'photo_category'=>$photo_album
    	);

    	if($this->db->insert('photo', $photo)){
    		$last_photo_id = $this->db->insert_id();

    		if($last_photo_id){

    			$photo_desc = array(

    				'desc_en'=> $desc_en,
    				'desc_ar'=> $desc_ar,
    				'photo_id'=> $last_photo_id

    			);

    			if($this->db->insert('photo_desc', $photo_desc)){
    			
    				echo json_encode(array('done'=>'photo is added to your album','last_photo_id' => $last_photo_id,'img'=>$img));
    			
    			}

    		}

		}

    }

   	public function get_recommendation(){
   	
   		header("Content-Type: application/xml; charset=utf-8");

   		$search_value = $this->input->post('search_value');
   		
   		
   		$categories = $this->db->where('is_category', 1)->like('keyword_title', $search_value)->or_like('cat_keywords_en', $search_value)->get('cat_keywords')->result();
   		$keyword  = $this->db->where('is_category', 0)->like('keyword_title', $search_value)->or_like('cat_keywords_en', $search_value)->get('cat_keywords')->result();
   		$company  = $this->db->like('company_name_ar', $search_value)->or_like('company_name_en', $search_value)->get('companies')->result();
   		$brands  = $this->db->like('brand_title', $search_value)->or_like('brand_title_ar', $search_value)->get('brand')->result();

   		$category_template = '';
   		$keyword_template = '';
   		$company_template = '';
   		$brand_template = '';

   		foreach($categories as $category){
   			$category_template .= '<li data-id="'.$category->keywords_id.'" class="list-search-btn">'.(is_arabic() ? $category->keyword_title:$category->cat_keywords_en).'</li>';
   		}

   		foreach($keyword as $keywords){
   			$keyword_template .= '<li data-id="'.$keywords->keywords_id.'" class="list-search-btn">'.(is_arabic() ?  $keywords->keyword_title:$keywords->cat_keywords_en).'</li>';
   		}

   		foreach($company as $comp){
   			$company_template .= '<li data-id="'.$comp->companies_id.'" class="list-search-btn">'.(is_arabic() ? $comp->company_name_ar:$comp->company_name_en).'</li>';
   		}

   		foreach($brands as $brand){
   			$brand_template .= '<li data-id="'.$brand->brand_id.'" class="list-search-btn">'.(is_arabic() ? $brand->brand_title_ar:$brand->brand_title).'</li>';
   		}


   		echo json_encode(array('category_template'=> $category_template,'keyword_template'=> $keyword_template,'company_template'=> $company_template,'brand_template'=>$brand_template));

   	}

   	public function ad_controller(){

   		$ad_id=$this->input->post('ad_id');
   		$link=$this->input->post('link');
   		$ip=$this->input->post('ip');
   		$per_what=$this->input->post('per_what');
   		$per_what_answer=$this->input->post('per_what_answer');

   			if($per_what==1){
   				$per_what_answer++;
   				$count_clicked=$this->db->where('ad_id', $ad_id)->count_all_results('ad_controller');		
		   		$ip_count=$this->db->where('ad_id', $ad_id)->where('clicker_ip',$ip)->count_all_results('ad_controller');	
			   	if($ip_count > 1){
			   		echo json_encode(array('link'=>$link));
			   	}else{
			   		if($count_clicked >=$per_what_answer){
			   			$this->db->where('ad_id', $ad_id)->delete('ad_system');
			   		}
			   		$data = array(
						'ad_id'=>$ad_id,
						'clicker_ip'=>$ip
			   		);

			   		if($this->db->insert('ad_controller', $data)){
			   			echo json_encode(array('link'=>$link));
			   		}
			   	}
   			}else{
   				echo json_encode(array('link'=>$link));
   			}
   	}

   	public function get_branch_details(){
   		
   		$companies_id = $this->input->post('comp_id');
   		// print_r($companies_id);
   		$companies_details=$this->db->where('companies_id', $companies_id)->get('companies')->row();
   		
   		$phone_telephone = $this->db->where('vatrena_id', $companies_id)->get('phone_numbers')->result();	
   		
   		$telephone_comp = $this->db->where('companies_id', $companies_id)->get('companies')->row('company_telephone');


   		$branch_template='<div class="comp-details">';
   		$branch_template.='<div class="comp-address">';
   		$branch_template.='<p>'.is_arabic() ? $companies_details->adress_ar:$companies_details->adress_en.','. get_moha_name($companies_details->mohafaza) .', '. get_city_name($companies_details->city). ', '.get_dist_name($companies_details->district) .','.get_area_name($companies_details->area).'</p>';
   		$branch_template.='</div>';

   		$tele_composer = array();
		$telephone_with_code = explode(',', $telephone_comp);
	   		$branch_template.='<ul class="list-of-phone">';
   				foreach($phone_telephone as $phone){
	   				$branch_template.='<li><a href="tel:'.$phone->phone_number.'">'.$phone->phone_number.'</a></li>';
   				}
	   		$branch_template.='</ul>';
	   		$branch_template.='<ul class="list-of-tele">';
	   			foreach($telephone_with_code as $tele){
	   				$branch_template.='<li><a href="tel:'.$tele.'">'.$tele.'</a></li>';
   				}
	   		$branch_template.='</ul>';
	   		$branch_template.='<a class="block-read" target="_blank" href="'.base_url().'guide/'. no_dashes($companies_details->company_name_en) .'/'. $companies_details->companies_id.' ">للمزيد من التفاصيل</a>';
   		$branch_template.='</div>';
   		// echo '<pre>';
   		// 	print_r($branch_template);
   		// echo '</pre>';
   		// die();
   		echo json_encode(array('branch'=>$branch_template));

   	}

}
