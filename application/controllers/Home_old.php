<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		
		$data['vatrenas'] = $this->db->where('featured_item', 1)->limit(8)->get('companies')->result();
		$data['category'] = $this->db->where('is_category', 1)->where('featured_item', 1)->get('cat_keywords')->result();
		$count_rows = $this->db->where('featured_item',1)->count_all_results('companies');	
		$data['count_pages'] = ceil($count_rows / 8) ;
		$data['first_number'] = 1;
		$data['last_number'] = ceil($count_rows / 8 - 1);
		// echo '<pre>';
		// 	print_r($data['vatrenas']);
		// echo '</pre>';
		// die();
		$data['governorate'] = $this->db->get('governorate')->result();
		$this->load->view('site/header');
		$this->load->view('site/home', $data);
		$this->load->view('site/footer');
	}

	public function register(){


		$data['areas'] = $this->db->get('governorate')->result();
		$data['mohafazat'] = $this->db->get('mohafazat')->result();
		$data['city'] = $this->db->get('city')->result();
		$data['district'] = $this->db->get('district')->result();
		$this->load->view('site/header');
		$this->load->view('site/register', $data);
		$this->load->view('site/footer');
	}

	public function about()
	{
		
		$this->load->view('site/header');
		$this->load->view('site/about_us');
		$this->load->view('site/footer');
	}

	public function contact_us()
	{
		
		$this->load->view('site/header');
		$this->load->view('site/contact_us');
		$this->load->view('site/footer');
	}


	public function login()
	{
		
		$this->load->view('site/header');
		$this->load->view('site/login');
		$this->load->view('site/footer');
	}

	public function search()
	{
		
		$this->load->view('site/header');
		$this->load->view('site/search');
		$this->load->view('site/footer');
	}

	public function single_page($id)
	{
			
		if($id){

			// item_data
			$data['company'] = $this->db->where('companies_id', $id)->get('companies')->row();
			// add viewer 
			$plusOne = (int) $data['company']->count_views + 1;

			$data['viewer'] = $this->db->where('companies_id', $id)->update('companies', array('count_views'=>$plusOne));
			// videos 
			$data['videos'] = $this->db->where('video_vatrena_id', $id)->get('video')->result();
			// photos 
			$data['photos'] = $this->db->where('vatrena_id', $id)->join('photo_desc','photo_desc.photo_id = photo.photo_id')->get('photo')->result();
			// files 
			$data['files'] = $this->db->where('file_vatrena_id', $id)->get('files')->result();
			//phone_numbers 
			$data['phone_numbers'] = $this->db->where('vatrena_id', $id)->get('phone_numbers')->result();

			$data['photo_categories'] = $this->db->select('photo_id ,photo_category')->where('vatrena_id', $id)->group_by('photo_category')->get('photo')->result();

			$data['branches'] = $this->db->where('parent', $id)->get('companies')->result();

			
			
			$data['photo_counts'] = count($data['photos']);

			$categories = $this->db->join('cat_keywords', 'vatrena_keys_category.category_id = cat_keywords.keywords_id')->where('vatrena_keys_category.vatrena_id', $id)->get('vatrena_keys_category')->result();
			$keywords = $this->db->join('cat_keywords', 'vatrena_keys_keyword.keyword_id = cat_keywords.keywords_id')->where('vatrena_keys_keyword.vatrena_id', $id)->get('vatrena_keys_keyword')->result();


			$telephone_comp = $this->db->where('companies_id', $id)->get('companies')->row('company_telephone');


			if(!empty($telephone_comp)){

				$data['arrayTele'] = array();

				$telephone_with_code = explode(',', $telephone_comp);

				foreach($telephone_with_code as $tele_code){
					$tele_code_spliter = explode('-', $tele_code);
					if(isset($tele_code_spliter[1]) && isset($tele_code_spliter[0])){

						$tele_composer[$tele_code_spliter[0]]=$tele_code_spliter[1];
						array_push($data['arrayTele'], $tele_composer);

					}
				}
			}else{
				$data['arrayTele'] = array();
			}
			

			$category = array();
			foreach ($categories as $category_ex) {
				array_push($category, $category_ex->keyword_title);
			}
			$data['keyword'] = array();
			foreach ($keywords as $keyword_ex) {
				array_push($data['keyword'], $keyword_ex->keyword_title);
			}

			$data['category'] = implode(',', $category);

			if(!empty($data['company'])){
				$this->load->view('site/header');
				$this->load->view('site/single_page', $data);
				$this->load->view('site/footer');
			}else{
				redirect(base_url());
			}
			
		}

	}

	

	public function vatrena_index()
	{
		$data['categories'] = $this->db->order_by('keyword_title','ASC')->limit(15)->get('cat_keywords')->result();
		$count_rows = $this->db->count_all_results('cat_keywords');	
		$data['count_pages'] = ceil($count_rows / 15) ;
		$data['first_number'] = 1;
		$data['last_number'] = ceil($count_rows / 15 - 1);

		// echo $data['count_rows'];
		$this->load->view('site/header');
		$this->load->view('site/vatrena_index', $data);
		$this->load->view('site/footer');
	}

	public function change_password()
	{
		
		$this->load->view('site/header');
		$this->load->view('site/change_password');
		$this->load->view('site/footer');
	}

	public function forgot_password()
	{
		
		$this->load->view('site/header');
		$this->load->view('site/forgot_password');
		$this->load->view('site/footer');
	}


	


	public function Page404()
	{
		
		$this->load->view('site/header');
		$this->load->view('site/404');
		$this->load->view('site/footer');
	}

	public function register_ex(){
		// echo '<pre>';
		// print_r($this->input->post());
		// print_r($_FILES);
		// echo '</pre>';



		$nameAr  = $this->input->post('nameAr');
		$nameEn  = $this->input->post('nameEn');
		$companyType  = $this->input->post('companyType');
		$area = $this->input->post('area');
		$mohafaza     = $this->input->post('mohafaza');
		$city     = $this->input->post('city');
		$dist 	 = $this->input->post('dist');
		$company_mobile 	 = $this->input->post('mobile');
		$company_telephone 	 = $this->input->post('telephone');
		$phone 	 = $this->input->post('phone');
		$building_number_stname_ar     = $this->input->post('building_number_stname_ar');
		$building_number_stname_en     = $this->input->post('building_number_stname_en');
		$email     = $this->input->post('email');
		$password     = $this->input->post('password');
		$conpass     = $this->input->post('conpass');
		$nabza     = $this->input->post('nabza');
		$nabzaEn     = $this->input->post('nabzaEn');
		$employee_regsiter     = $this->input->post('employee_regsiter');
		$employee_job     = $this->input->post('employee_job');
		$employee_phone     = $this->input->post('employee_phone');

		$this->form_validation->set_rules('nameAr', 'Arabic Name', 'required|min_length[5]');
		$this->form_validation->set_rules('nameEn', 'English Name', 'required|min_length[5]');
		$this->form_validation->set_rules('companyType', 'Company Type', 'required');
		$this->form_validation->set_rules('company_mobile[]', 'Company mobile', 'required|min_length[5]');
		$this->form_validation->set_rules('telephone[]', 'Company telephone', 'required');
		$this->form_validation->set_rules('area', 'Area', 'required');
		$this->form_validation->set_rules('mohafaza', 'Governorate', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('dist', 'District', 'required');
		$this->form_validation->set_rules('building_number_stname_ar', 'english Building number', 'required|min_length[5]');
		$this->form_validation->set_rules('building_number_stname_en', 'arabic Building number', 'required|min_length[5]');
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('conpass', 'RePassword', 'required|min_length[5]|matches[password]');
		$this->form_validation->set_rules('nabza', 'About Your Company', 'required|min_length[5]');
		$this->form_validation->set_rules('nabzaEn', 'About Your Company English', 'required|min_length[5]');
		$this->form_validation->set_rules('employee_regsiter', 'Employee Regsiter Name', 'required|min_length[5]');
		$this->form_validation->set_rules('employee_job', 'Employee Job', 'required|min_length[5]');
		$this->form_validation->set_rules('employee_phone', 'phone', 'required|min_length[5]');

		if(!empty($this->input->post('agree'))){

			if ($this->form_validation->run()){

				$data = array(

					'company_name_ar' => $nameAr,
					'company_name_en' => $nameEn,
					'companyType' => $companyType,
					'company_mobile'=>form_error('company_mobile'),
					'company_telephone'=>form_error('telephone'),
					'area' => $area,
					'mohafaza' => $mohafaza,
					'city' => $city,
					'adress_ar' => $building_number_stname_ar,
					'adress_en' => $building_number_stname_en,
					'email' => $email,
					'password' => $password,
					'company_about' => $nabza,
					'company_about_en' => $nabzaEn,
					'employee_name' => $employee_regsiter,
					'employee_job' => $employee_job,
					'employee_phone' => $employee_phone

				);

				if($this->db->insert('companies', $data)){

					echo json_encode(array('done'=>'تم تسجيل المنشأه بنجاح'));

				}else{

					echo json_encode(array('error'=>'لم يتم التسجيل بنجاح حاول مرة أخرى'));
				}

			}else{
				
				// echo json_encode(array('error'=>validation_errors()));

				echo json_encode(array('nameAr'=>form_error('nameAr'),
									   'nameEn'=>form_error('nameEn'),
									   'companyType'=>form_error('companyType'),
									   'company_mobile'=>form_error('company_mobile'),
									   'telephone'=>form_error('telephone'),
									   'area'=>form_error('area'),
									   'mohafaza'=>form_error('mohafaza'),
									   'city'=>form_error('city'),
									   'dist'=>form_error('dist'),
									   'building_number_stname_ar'=>form_error('building_number_stname_ar'),
									   'building_number_stname_en'=>form_error('building_number_stname_en'),
									   'password'=>form_error('password'),
									   'conpass'=>form_error('conpass'),
									   'nabza'=>form_error('nabza'),
									   'employee_regsiter'=>form_error('employee_regsiter'),
									   'employee_job'=>form_error('employee_job'),
									   'employee_phone'=>form_error('employee_phone')
								));
				


			}

		}else{
			echo json_encode(array('error'=>'يرجى الموافقة على الشروط أولا'));
		}
	}

	public function generateInputs(){

		// echo '<pre>';
		// 	print_r($this->input->post());
		// echo '</pre>';

		$inputType = $this->input->post('type');
		$number = $this->input->post('number');

		$number++;

		if($inputType == 'mobile'){
			$input = $this->load->view('site/input_mobile',array('number' =>$number), true);
		}else{
			$input = $this->load->view('site/input_tele',array('number' =>$number), true);
		}

		echo json_encode(array('input' => $input, 'input_number' => $number));

	}

	public function pagenator(){

		$pageNumber = $this->input->post('pageNumber');
		
		$back = $pageNumber - 1;
		
		$forword = $pageNumber + 1;

		$number = $pageNumber * 15;

		$offset = $number - 15;

		$items = $this->db->order_by('keyword_title','ASC')->limit(15,$offset)->get('cat_keywords')->result();

		$data = $this->load->view('site/indexer', array('items'=>$items),true);

		echo json_encode(array('data' => $data,
							   'back'=>$back,
							   'forword'=>$forword
						));
	}

	public function pagenatorHome(){

		$pageNumber = $this->input->post('pageNumber');
		
		$back = $pageNumber - 1;
		
		$forword = $pageNumber + 1;

		$number = $pageNumber * 8;

		$offset = $number - 8;

		$items = $this->db->where('featured_item',1)->limit(8,$offset)->get('companies')->result();

		$data = $this->load->view('site/items_companies', array('vatrenas'=>$items),true);

		echo json_encode(array('data' => $data,
							   'back'=>$back,
							   'forword'=>$forword
						));
	}

	public function dropDownAppender(){
    	
    	$options = $this->db->where($this->input->post('fIdName'), $this->input->post('id'))->get($this->input->post('childTable'))->result();
		
		$dropDownOptions  = $this->load->view($this->input->post('viewFile'), array('options'=>$options), true);

		if(!empty($options)){
			$data['drops'] = $dropDownOptions;
			echo json_encode($data);
		}else{
			echo json_encode(array('error'=> 'did not find any dropDownOptions'));
		}
			

    }


    public function loadMoreBtn(){

        $page   =  $this->input->post('pages'); //1
        $record =  $this->input->post('records'); // 2 
        $beforeOffset =  $this->input->post('offset'); // 1

  
        if($page == 1){
            $offset = 1;
        }else{
            $offset = ($page * $record) - $record;
        }

        $data['vatrenas'] = $this->db->where('featured_item', 1)->limit($record, $offset)->get('companies')->result();

        $count_result = $this->db->where('featured_item', 1)->count_all_results('companies');
 
        if($beforeOffset > $count_result){
           die(json_encode(array('error'=>'there is no result')));
        }

        $datas = $this->load->view('site/companies',$data, true);


        echo json_encode(array('page'=>$page, 'records'=>$record,'offset' => $offset, 'data'=> $datas));


    }

    public function image_background_black()
	{
		$image=$this->input->get('image');
		$thumbnail=$this->input->get('thumb');
		if(isset($thumbnail) && $thumbnail == 'init'){
			$this->load->library('Image_moo');
			$this->image_moo
		        ->load($image)
		        ->set_background_colour("#00000")
		        ->resize_crop(300,300)
		        // ->resize(500,400,TRUE)
		        ->save_dynamic();
		}else{
			$this->load->library('Image_moo');
			$this->image_moo
		        ->load($image)
		        ->set_background_colour("#00000")
		        ->resize_crop(500,300)
		        // ->resize(500,400,TRUE)
		        ->save_dynamic();
		}
	}
    public function suggestions(){

    	$typing = $this->input->post('typing');

    	$suggestions = $this->db->select('company_name_ar')->where('parent', 0)->like('company_name_ar', $typing)->get('companies')->result();

    	$items = array();
    	foreach($suggestions as $sug){
    		array_push($items, $sug->company_name_ar);
    	}

    	echo json_encode(array('suggestions'=> array_values($items)));
    }


    public function vatrena_finder(){

    	$search_param = $this->input->post('search_param');

    	$search_results = $this->db->like('company_name_ar', $search_param)->get('companies')->result();

    	$count_result = count($search_results); 

    	$this->load->view('site/header');
    	$this->load->view('site/search_results', array('search_results'=>$search_results,'search_param'=>$search_param,'count_result'=>$count_result));
    	$this->load->view('site/footer');

    }



    public function photo_changer(){

    	$vat_id = $this->input->post('vat_id');
    	$photo_cat_id = $this->input->post('photo_cat_id');

    	$photos = $this->db->where('photo_category', $photo_cat_id)->where('vatrena_id', $vat_id)->join('photo_desc','photo_desc.photo_id = photo.photo_id')->get('photo')->result();
    	// $data['photos'] = $this->db->where('vatrena_id', $id)->join('photo_desc','photo_desc.photo_id = photo.photo_id')->get('photo')->result();


    	$photo_template = $this->load->view('site/slider',array('photos'=>$photos), true);

    	echo json_encode(array('photo_template'=>$photo_template));
    }

}