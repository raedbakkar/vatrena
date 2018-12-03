<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function index()
	{

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/home');
		$this->load->view('dashboard/footer');
	}

	public function login(){	


		if(!$_POST){

			$this->load->view('dashboard/login');

		}else{

			$this->load->library('form_validation');

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

		            	 // echo json_encode(array('done'=>'correct','redirect'=>base_url('Dashboard'));
		            	redirect(base_url('Dashboard'));

		            }else{

		            	$data['error'] = 'sorry but we coudn\'t recognize you';

		                $this->load->view('dashboard/login', $data);
		                
		            }

		        } else {

		            $data['error'] = 'sorry but we coudn\'t recognize you';
		    
		            $this->load->view('dashboard/login', $data);
		        
		        }

		    }else{

		    	echo json_encode(array('error'=>validation_errors()));
		   	}

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

	public function all_options(){
		$data['options'] = $this->db->get('single_option')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/all_option', $data);
		$this->load->view('dashboard/footer');
	}

	public function edit_option($id){
		$data['option'] = $this->db->where('single_option_id', $id)->get('single_option')->row();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/edit_option', $data);
		$this->load->view('dashboard/footer');
	}

	public function choose_feature_init(){

			
		$categories = $this->input->post('categories');

		$options = $this->input->post('option');

		if(!empty($categories) AND !empty($options)){

			$key = array();
			$value = array();

			foreach($options as $option){


				$f = explode(',', $option);

				array_push($key, $f[0]);
				array_push($value, $f[1]);


			}
			
			foreach(array_combine($value, $key) as $k => $v){
				$returned_value[$k] = $v;
			}


			$count = 0;
			foreach($returned_value as $val => $k){

				if(is_feature_option_exist($val, $k, $categories)){
					continue;
				}

				$arr = array(

					'base_option_id'=>$val,
					'base_feature_id'=>$k,
					'base_category_id'=>$categories

				);

				if($this->db->insert('base_feature', $arr)){
					$count++;
				}else{
					return false;
				}



			}

			if($count > 0){
				echo json_encode(array('done'=>$count.' '.'option has been inserted'));
			}else{
				echo json_encode(array('error'=>'somthing went wrong'));
			}

		}else{
			echo json_encode(array('error'=>'Check Option and Category'));

		}	

	}


	public function toggle_option(){
		
		$category = $this->input->post('category');
		$feature = $this->input->post('feature');
		$option = $this->input->post('option');
		$check = $this->input->post('check');
		$base_id = $this->db->where('base_category_id', $category)->where('base_feature_id', $feature)->where('base_option_id', $option)->get('base_feature')->row('base_id');
		
		if($check == 'unmark'){

			if(is_feature_option_exist($option, $feature, $category)){
				echo json_encode(array('error'=>'exist','check'=>$check));
			}else{

				$arr = array(

					'base_option_id'=>$option,
					'base_feature_id'=>$feature,
					'base_category_id'=>$category

				);

				if($this->db->insert('base_feature', $arr)){
					echo json_encode(array('done'=>'option has been marked','check'=>$check));
				}else{
					echo json_encode(array('error'=>'somthing went wrong','check'=>$check));
				}

			}

		}else if($check=='marked'){

			if($this->db->where('base_id', $base_id)->delete('base_feature')){
				echo json_encode(array('done'=>'option is been unmarked','check'=>$check));
			}else{
				echo json_encode(array('error'=>'somthing went wrong','check'=>$check));
			}

		}

	}

	public function edit_feature_option($category_id){
		
		$data['categories'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
		$data['features'] = $this->db->get('single_feature')->result();
		// $data['base_category'] = $this->db->where('base_category_id', $category_id)->group_by('base_category_id')->get('base_feature')->row('base_cae');

		$base_feature_id = $this->db->select('base_feature_id')->from('base_feature')->where('base_category_id', $category_id)->group_by('base_feature_id')->get()->result();
		
		$base_f_id = array();

		foreach($base_feature_id as $f){
			array_push($base_f_id, $f->base_feature_id);
		}
		
		$feature = $this->db->where_in('single_feature_id', $base_f_id)->get('single_feature')->result();

		$data['check'] = $this->load->view('dashboard/edit_option_checkboxes', array('feature'=>$feature,'category_id'=>$category_id), true);



		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/edit_feature_option', $data);
		$this->load->view('dashboard/footer');
	}

	public function all_feature_option(){

		// $data['base_feature'] = $this->db->get('base_feature')->result();
		$data['base_feature'] = $this->db->group_by('base_category_id')->get('base_feature')->result();
		
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/all_feature_option', $data);
		$this->load->view('dashboard/footer');
	}

	public function edit_base_feature(){


		$categories = $this->input->post('categories');

		$options = $this->input->post('option');

		$base_id = $this->input->post('base_id');

		if(!empty($categories) AND !empty($options)){

			$key = array();
			$value = array();

			foreach($options as $option){

				$f = explode(',', $option);

				array_push($key, $f[0]);
				array_push($value, $f[1]);

			}
			
			foreach(array_combine($value, $key) as $k => $v){
				$returned_value[$k] = $v;
			}


			$count = 0;
			foreach($returned_value as $val => $k){

				if(is_feature_option_exist($val, $k, $categories)){
					continue;
				}

				$arr = array(

					'base_option_id'=>$val,
					'base_feature_id'=>$k,
					'base_category_id'=>$categories

				);

				if($this->db->insert('base_feature', $arr)){
					$count++;
				}else{
					return false;
				}



			}

			echo json_encode(array('done'=>'option has been inserted'));

		}else{
			echo json_encode(array('error'=>'Check Option and Category'));

		}	
	}

	public function edit_method_option(){
		
		$title_ar = $this->input->post('option_arabic');
		$title_en = $this->input->post('option_english');
		$option_id = $this->input->post('option_id');

		$options = array(

			'single_option_title'=>$title_en,
			'single_option_title_ar'=>$title_ar

		);

		if($this->db->where('single_option_id', $option_id)->update('single_option',$options)){
			echo json_encode(array('done'=>'single option has been updated'));
		}else{
			echo json_encode(array('error'=>'please try again later'));
		}

	}

	public function choose_feature_for_category(){

		$data['categories'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
		$data['features'] = $this->db->get('single_feature')->result();

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/choose-feature-for-category', $data);
		$this->load->view('dashboard/footer');
	}

	public function get_feature_checkboxes(){

		header("Content-Type: application/xml; charset=utf-8");

	
		$feature = $this->db->where_in('single_feature_id', $this->input->post('id'))->get('single_feature')->result();
		
		$check = $this->load->view('dashboard/option_checkboxes', array('feature'=>$feature), true);

		echo json_encode(array('check'=>$check)); 		

	}

	public function add_categoies_features(){

		// if(!is_login()){ redirect(base_url('admin-login')); }

		$data['categories'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/add-category-features', $data);
		$this->load->view('dashboard/footer');

	}


	public function add_product(){

		// if(!is_login()){ redirect(base_url('admin-login')); }

		$data['categories'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
		$data['companies'] = $this->db->get('companies')->result();
		$data['brands'] = $this->db->get('brand')->result();

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/add_product', $data);
		$this->load->view('dashboard/footer');

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

	public function upload_images(){
		$date=date('Y').'/'.date('m').'/';
    	$path='./assets/images/product_upload/'.$date;
    	if(! file_exists($path))
			mkdir($path, 0777, true);

		$config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 1000;

        $this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file')) {
	        die( json_encode(array('status'=>'error', 'error'=>$this->upload->display_errors())) );	    		
        } else {
            $data_image = $this->upload->data();
            $filename=$date.$data_image['file_name'];
	        $images_details = array('photo_title'=>$filename);
        	$this->db->insert('photo_product', $images_details);
			$slider_id = $this->db->insert_id();
	        die( json_encode(array('status'=>'success', 'slider_id'=>$slider_id)) );	    		
        }
	}

	public function product_thumbnail(){

		$date=date('Y').'/'.date('m').'/';
    	$path='./assets/images/thumbnail/'.$date;
    	if(! file_exists($path))
			mkdir($path, 0777, true);

		$config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 1000;

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

	public function add_feat_category_b(){
		// if(!is_login()){ redirect(base_url('dashboard/add_categoies_features')); }

		$this->form_validation->set_rules('cate_id', 'Category', 'required');
		$this->form_validation->set_rules('feature_category', 'feature Title', 'required');
		$this->form_validation->set_rules('feature_category_ar', 'feature Title arabic', 'required');
		$this->form_validation->set_rules('input_type', 'input type', 'required');
		$this->form_validation->set_rules('filter_activation', 'Filter Activation', 'required');

		$cate_id = $this->input->post('cate_id');
		$feature_category = $this->input->post('feature_category');
		$feature_category_ar = $this->input->post('feature_category_ar');
		$input_type = $this->input->post('input_type');
		$filter_activation = $this->input->post('filter_activation');
		$option_maker_ar = $this->input->post('option_maker_ar');
		$option_maker = $this->input->post('option_maker');

		if($input_type == 'text'){
			$data = array(

				'feature_title'=>$feature_category,
				'feature_title_ar'=>$feature_category_ar,
				'feature_input_type'=>$input_type,
				'feature_category_id'=>$cate_id,
				'feature_active'=>$filter_activation

			);

			if($this->db->insert('feature', $data)){
				echo json_encode(array('done'=>'Feature has been added Successfully'));
			}else{
				echo json_encode(array('error'=>'somthing went wrong'));
			}
		}else if($input_type == 'dropdownlist'){
			
			$data = array(

				'feature_title'=>$feature_category,
				'feature_title_ar'=>$feature_category_ar,
				'feature_input_type'=>$input_type,
				'feature_category_id'=>$cate_id,
				'feature_active'=>$filter_activation

			);

			if($this->db->insert('feature', $data)){

				$last_id = $this->db->insert_id();
		
				foreach(array_combine($option_maker_ar, $option_maker)as $option_ar => $option_en){
					
					$feature_option = array(
						'f_option_title'=>$option_en,
						'f_option_title_ar'=>$option_ar,
						'f_option_feature_id'=>$last_id
					);
					if($this->db->insert('feature_options', $feature_option)){
					}
				}
				echo json_encode(array('done'=>'Feature has been added Successfully'));
				
			}
		}
	}


	public function edit_product_excute(){

		$this->form_validation->set_rules('cate_id', 'Category', 'required');
		$this->form_validation->set_rules('title_ar', 'title arabic', 'required');
		$this->form_validation->set_rules('title_en', 'title english', 'required');
		$this->form_validation->set_rules('advertiser', 'Vatrena', 'required');
		$this->form_validation->set_rules('price', 'price', 'required');
		$this->form_validation->set_rules('percentage', 'percentage', 'required');
		$this->form_validation->set_rules('stock', 'Stock', 'required');


		$ad_title_ar = $this->input->post('title_ar');
		$ad_title_en = $this->input->post('title_en');
		$ad_desc_ar = $this->input->post('ad_desc_ar');
		$ad_desc_en = $this->input->post('ad_desc_en');
		$advertiser = $this->input->post('advertiser');
		$ad_cate_id = $this->input->post('cate_id');
		$ad_time_posted = time();
		$ad_price = $this->input->post('price');
		$ad_percentage = $this->input->post('percentage');
		$photo = $this->input->post('thumbnail');
		$slider = $this->input->post('sliders');
		$stock = $this->input->post('stock');
		$last_id = $this->input->post('ad_id');
		$supplier = $this->input->post('supplier');
		$supplier_price = $this->input->post('supplier_price');
		$brand_id = $this->input->post('brands');
		$dilivery_price = $this->input->post('dilivery_price');


		if ($this->form_validation->run()){



			$data = array(

				'ad_title'=>$ad_title_en,
				'ad_title_ar'=>$ad_title_ar,
				'ad_desc_ar'=>$ad_desc_ar,
				'ad_desc_en'=>$ad_desc_en,
				'ad_advertiser_id'=>$advertiser,
				'ad_cate_id'=>$ad_cate_id,
				'brand_id'=>$brand_id,
				'ad_time_posted'=>$ad_time_posted,
				'ad_price'=>$ad_price,
				'ad_photo'=>$photo,
				'ad_percentage'=>$ad_percentage,
				'supplier'=>$supplier,
				'supplier_product_price'=>$supplier_price,
				'delivery_price'=>$dilivery_price,
				'stock'=>$stock

			);



			if($this->db->where('ad_id', $last_id)->update('ads', $data)){
				// $last_id = $this->db->insert_id();
				$sliders = explode(',', $slider);

				if($sliders)foreach($sliders as $slide){
					if(!photo_in_slider($slide, $last_id)){
						$this->db->where('photo_id', $slide)->update('photo_product', array('photo_product_id'=>$last_id));
					}
				}

				$features_keys = $this->db->where('feature_category_id', $ad_cate_id)->get('feature')->result();

				foreach($features_keys as $key){
					// echo $this->input->post(attr_name($key->feature_title));
					$this->db->where('ad_id', $last_id)->where('feature_key_id', $key->feature_id)->update('feaures_answer', 
						array(
							'feature_value' => $this->input->post(attr_name($key->feature_title)),
						)

					);
				}

				echo json_encode(array('done'=>'it worked'));
			}

		}else{
			echo json_encode(array('error'=>validation_errors()));
		}
		
	}

	public function post_new_product(){

		$this->form_validation->set_rules('cate_id', 'Category', 'required');
		$this->form_validation->set_rules('title_ar', 'title arabic', 'required');
		$this->form_validation->set_rules('title_en', 'title english', 'required');
		$this->form_validation->set_rules('advertiser', 'Vatrena', 'required');
		$this->form_validation->set_rules('price', 'price', 'required');
		$this->form_validation->set_rules('percentage', 'percentage', 'required');
		$this->form_validation->set_rules('stock', 'Stock', 'required');
		$this->form_validation->set_rules('brands', 'Brand', 'required');
		$this->form_validation->set_rules('thumbnail', 'thumbnail', 'required');


		$ad_title_ar = $this->input->post('title_ar');
		$ad_title_en = $this->input->post('title_en');
		$ad_desc_ar = $this->input->post('ad_desc_ar');
		$ad_desc_en = $this->input->post('ad_desc_en');
		$advertiser = $this->input->post('advertiser');
		$ad_cate_id = $this->input->post('cate_id');
		$ad_time_posted = time();
		$ad_price = $this->input->post('price');
		$ad_percentage = $this->input->post('percentage');
		$photo = $this->input->post('thumbnail');
		$slider = $this->input->post('sliders');
		$stock = $this->input->post('stock');
		$brand = $this->input->post('brands');
		$supplier = $this->input->post('supplier');
		$supplier_price = $this->input->post('supplier_price');
		$dilivery_price = $this->input->post('dilivery_price');

		if ($this->form_validation->run()){



			$data = array(

				'ad_title'=>$ad_title_en,
				'ad_title_ar'=>$ad_title_ar,
				'ad_desc_ar'=>$ad_desc_ar,
				'ad_desc_en'=>$ad_desc_en,
				'ad_advertiser_id'=>$advertiser,
				'ad_cate_id'=>$ad_cate_id,
				'brand_id'=>$brand,
				'ad_time_posted'=>$ad_time_posted,
				'ad_price'=>$ad_price,
				'ad_photo'=>$photo,
				'ad_percentage'=>$ad_percentage,
				'supplier'=>$supplier,
				'supplier_product_price'=>$supplier_price,
				'delivery_price'=>$dilivery_price,
				'stock'=>$stock

			);



			if($this->db->insert('ads', $data)){
				$last_id = $this->db->insert_id();
				$sliders = explode(',', $slider);

				if($sliders)foreach($sliders as $slide){


					$this->db->where('photo_id', $slide)->update('photo_product', array('photo_product_id'=>$last_id));
				}

				$features_keys = $this->db->where('feature_category_id', $ad_cate_id)->get('feature')->result();

				foreach($features_keys as $key){
					// echo $this->input->post(attr_name($key->feature_title));
					$this->db->insert('feaures_answer', 
						array('feature_key_id' => $key->feature_id,
						      'feature_value' => $this->input->post(attr_name($key->feature_title)),
							  'ad_id' => $last_id)
						);
				}

				echo json_encode(array('done'=>'Product has Been Updated'));
			}

		}else{
			echo json_encode(array('error'=>validation_errors()));
		}

	}

	public function all_x_product(){

		$data['products'] = $this->db->get('ads')->result();

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/all_product', $data);
		$this->load->view('dashboard/footer');
	}

	public function all_x_feature(){

		$data['feature'] = $this->db->order_by('arrange', 'ASC')->get('feature')->result();
		$data['count'] = count($data['feature']);
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/all_feature', $data);
		$this->load->view('dashboard/footer');
	}

	public function all_x_brand(){
		$data['brand'] = $this->db->get('brand')->result();

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/all_brand', $data);
		$this->load->view('dashboard/footer');
	}

	public function change_arrangment(){


		$id = $this->input->post('id');
		$feature_id = $this->input->post('feat');

		if($this->db->where('feature_id', $feature_id)->update('feature', array('arrange'=> $id))){
			echo json_encode(array('done'=>'arragnment has been updated'));
		}else{
			echo json_encode(array('error'=>'somthing went wrong'));
		}

	}

	public function add_brand(){
		$data['categories'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
		
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/add_brand', $data);
		$this->load->view('dashboard/footer');
	}


	public function edit_brand($id){
		$data['categories'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
		$data['vatrenas'] = $this->db->where('brand_id', $id)->get('related_brand_vatrena')->result();
		$data['brand'] = $this->db->where('brand_id', $id)->get('brand')->row();

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/edit_brand', $data);
		$this->load->view('dashboard/footer');
	}

	public function edit_brand_excute(){
		header("Content-Type: application/xml; charset=utf-8");

		if(!empty($this->input->post())){

			$priority = $this->input->post('priority');
			$vatrena_name = $this->input->post('vatrena_name');

			$data = array(
				'brand_title'=> $this->input->post('brand_en'),
				'brand_title_ar'=> $this->input->post('brand_ar'),
				'picutre'=> $this->input->post('thumbnail')
			);


			$this->db->where('company_id', $vatrena_name)->update('related_brand_vatrena', array('priority'=>$priority));
			
			if(!empty($this->input->post('categories'))){
				if($this->db->where('brand_id', $this->input->post('brand_id'))->update('brand', $data)){
					// echo $brand_id = $this->db->insert_id();

					foreach($this->input->post('categories') as $category){
						if(!existed_category($category, $this->input->post('brand_id'))){
							$this->db->insert('brand_keys_category', array(

								'brand_id' => $this->input->post('brand_id'),
								'keyword_id' => $category

							));
						}
					}
				}	
				echo json_encode(array('done'=>'brand has been updated'));
			}else{
				echo json_encode(array('error'=>'sorry somthing went wrong'));
			}
		}
	}


	public function edit_product($id){


		$data['categories'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
		$data['companies'] = $this->db->get('companies')->result();
		$data['brands'] = $this->db->get('brand')->result();
		$data['ads'] = $this->db->where('ad_id', $id)->get('ads')->row();
		$data['picture'] = $this->db->where('photo_product_id', $id)->get('photo_product')->result();

		$category_id = $data['ads']->ad_cate_id;

		$attr = $this->db->where('feature_category_id', $category_id)->get('feature')->result();

		$data['attr'] = $this->load->view('dashboard/gene-attr-edit', array('attr'=>$attr ,'id'=>$id), true);



		$sliders = array();
		foreach($data['picture'] as $photo){
			array_push($sliders, $photo->photo_id);
		}

		$sliders = implode(',', $sliders);

		$data['sliders'] = $sliders;

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/edit_product', $data);
		$this->load->view('dashboard/footer');
	}


	

	public function excute_brand(){
		header("Content-Type: application/xml; charset=utf-8");

		if(!empty($this->input->post())){

			$data = array(
				'brand_title'=> $this->input->post('brand_en'),
				'brand_title_ar'=> $this->input->post('brand_ar'),
				'picutre'=> $this->input->post('thumbnail')
			);

			if(!empty($this->input->post('categories'))){
				if($this->db->insert('brand', $data)){
					$brand_id = $this->db->insert_id();

					foreach($this->input->post('categories') as $category){
						$this->db->insert('brand_keys_category', array(

							'brand_id' => $brand_id,
							'keyword_id' => $category

						));
					}
				}	
				echo json_encode(array('done'=>'brand has been added'));
			}else{
				echo json_encode(array('error'=>'sorry your Category Field is required'));
			}
		}
	}

	public function brand_logo(){
		$date=date('Y').'/'.date('m').'/';
    	$path='./assets/images/logo_brand/'.$date;
    	if(! file_exists($path))
			mkdir($path, 0777, true);

		$config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 1000;

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
	public function gene_option_maker(){

		$options_maker = $this->load->view('dashboard/option-maker',array(), true);

		echo json_encode(array('option_maker'=>$options_maker));

	}

	public function gene_feat(){

		header("Content-Type: application/xml; charset=utf-8");

		$category = $this->input->post('category');
		
		$attr = $this->db->where('feature_category_id', $category)->get('feature')->result();
		
		$options = $this->load->view('dashboard/gene-attr', array('attr' => $attr), true);

		echo json_encode(array('options'=>$options));
	}

	public function all_categories(){
		$data['categories'] = $this->db->where('is_category', 1)->order_by('featured_item', 1)->get('cat_keywords')->result();
		// $data['cat_keywords'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
		// $data['options'] = $this->db->select('keywords_id,keyword_title')->join('cat_keywords','categories_related.cat_child_id = cat_keywords.keywords_id')->get('categories_related')->result();
		// echo '<pre>';
		// 	print_r($data['options']);
		// echo '</pre>';
		// die();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/Allcategory',$data);
		$this->load->view('dashboard/footer');
	}

	public function itmes_vatrena(){
		$data['comps'] = $this->db->get('companies')->result();
		
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/all_items', $data);
		$this->load->view('dashboard/footer');

/*		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/items_vatrena', $data);
		$this->load->view('dashboard/footer');*/
	}
	public function edit_category_view($id){
		if($id){
			$data['categories'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
			$data['category_row'] = $this->db->where('is_category', 1)->where('keywords_id', $id)->get('cat_keywords')->row();

			$data['vatrenas'] = $this->db->where('category_id', $id)->get('vatrena_keys_category')->result();


			$this->load->view('dashboard/header');
			$this->load->view('dashboard/navbar');
			$this->load->view('dashboard/edit_category', $data);
			$this->load->view('dashboard/footer');
		}
	}

	public function edit_keyword_view($id){
		if($id){
			$data['cat_keywords'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
			$data['brands'] = $this->db->get('brand')->result();
			$data['keywords'] = $this->db->where('is_category', 0)->get('cat_keywords')->result();
			$data['keyword_row'] = $this->db->where('is_category', 0)->where('keywords_id', $id)->get('cat_keywords')->row();
			$data['related_brand'] = $this->db->where('related_keyword_id', $id)->get('keyword_brand_related')->result();
			$data['vatrenas'] = $this->db->where('keyword_id', $id)->get('vatrena_keys_keyword')->result();
			$data['keyword_id'] = $id;
			$this->load->view('dashboard/header');
			$this->load->view('dashboard/navbar');
			$this->load->view('dashboard/edit_keyword', $data);
			$this->load->view('dashboard/footer');
		}
	}

	public function add_ad_view(){
		
		$data['cat_keywords'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();		
		$data['keywords'] = $this->db->where('is_category', 0)->get('cat_keywords')->result();
		$data['brands'] = $this->db->get('brand')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/ad_view', $data);
		$this->load->view('dashboard/footer');
	}

	public function ad_maker(){
		// echo '<pre>';
		// 	print_r($_POST);
		// 	print_r($_FILES);
		// echo '</pre>';
		header("Content-Type: application/xml; charset=utf-8");
		$this->load->library('upload');

		$ad_name = $this->input->post('ad_name');
		$horivert = $this->input->post('horivert');
		$ad_link = $this->input->post('ad_link');
		$category = $this->input->post('category');
		$category_count_prioirty = $this->input->post('category_count_prioirty');
		$keyword = $this->input->post('keyword');
		$keyword_count_prioirty = $this->input->post('keyword_count_prioirty');
		$brand = $this->input->post('brand');
		$brand_count_prioirty = $this->input->post('brand_count_prioirty');
		$clickTime = $this->input->post('clickTime');
		$per_click = $this->input->post('per_click');
		$photo_link = $_FILES['ad_photo']['name'];

		//if
		
		$photo = $_FILES;		
		if(!empty($_FILES['ad_photo']['name'])){
			$_FILES['ad_photo']['name']= $photo['ad_photo']['name'];
	        $_FILES['ad_photo']['type']= $photo['ad_photo']['type'];
	        $_FILES['ad_photo']['tmp_name']= $photo['ad_photo']['tmp_name'];
	        $_FILES['ad_photo']['error']= $photo['ad_photo']['error'];
	        $_FILES['ad_photo']['size']= $photo['ad_photo']['size'];
	        $this->upload->initialize($this->set_upload_options());
				        
	        if($this->upload->do_upload('ad_photo')){

	        	$ad_fullname = $this->upload->data('file_name');

	        
	        	$add=array(
					'name'=>$ad_name,
					'photo'=>$this->upload->data('file_name'),
					'link'=>$ad_link,
					'category'=>$category,
					'keyword'=>$keyword,
					'brand'=>$brand,
					'category_pos'=>$category_count_prioirty,
					'keyword_pos'=>$keyword_count_prioirty,
					'brand_pos'=>$brand_count_prioirty,
					'per_what'=>$clickTime, // 1 per_click, 2 per_time
					'per_what_answer'=>$per_click, // peranwer
					'ad_type'=>$horivert, //hori-> 1 , vert 2 
				);

				if($this->db->insert('ad_system', $add)){
	    		}else{
	    			$logo_name = 'nope';
	    		}
	    	}
			echo json_encode(array('done'=>'ad has been generated'));
		}else{
			echo json_encode(array('done'=>'Sorry somthing went wrong'));
		}
	}


	public function ad_module_generator(){

		$ad_module = $this->input->post('ad_module');

		switch ($ad_module) {
			case 1:
				$data['cat_keywords'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();	
				$dropdownlist = $this->load->view('dashboard/load_category_module_dropdownlist', $data, true);
				echo json_encode(array('droper'=>$dropdownlist));
				break;
			case 2:
				$data['keyowrds'] = $this->db->where('is_category', 0)->get('cat_keywords')->result();	
				$dropdownlist = $this->load->view('dashboard/load_keyword_module_dropdownlist', $data, true);
				echo json_encode(array('droper'=>$dropdownlist));
				break;
			case 3:
				$data['brands'] = $this->db->get('brand')->result();	
				$dropdownlist = $this->load->view('dashboard/load_brand_module_dropdownlist', $data, true);
				echo json_encode(array('droper'=>$dropdownlist));
				break;
		}
	}


	public function per_click_input(){

		$ad_click=$this->input->post('ad_click');
		$id = $this->input->post('id');
		if(!empty($id)){

			$per_what=$this->db->where('ad_id',$id)->get('ad_system')->row();
			switch ($ad_click) {
				case 1:
					$per_click_input = $this->load->view('dashboard/perClick', array('per_what'=>$per_what), true);
					echo json_encode(array('inputs'=>$per_click_input));
					break;
				case 2:
					$time_input = $this->load->view('dashboard/per_time', array('per_what'=>$per_what), true);
					echo json_encode(array('inputs'=>$time_input));
					break;
			}
		}else{
			switch ($ad_click) {
				case 1:
					$per_click_input = $this->load->view('dashboard/perClick', array(), true);
					echo json_encode(array('inputs'=>$per_click_input));
					break;
				case 2:
					$time_input = $this->load->view('dashboard/per_time', array(), true);
					echo json_encode(array('inputs'=>$time_input));
					break;
			}
		}
	}

	public function all_area(){

		$data['area'] = $this->db->get('governorate')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/all_area', $data);
		$this->load->view('dashboard/footer');
	}

	public function edit_area($id){
		if($id){
			$data['area'] = $this->db->where('gover_id', $id)->get('governorate')->row();

			$this->load->view('dashboard/header');
			$this->load->view('dashboard/navbar');
			$this->load->view('dashboard/edit_area', $data);
			$this->load->view('dashboard/footer');
		}
	}

	public function edit_area_ex(){

		header("Content-Type: application/xml; charset=utf-8");
		$title_ar_edit = $this->input->post('title_ar_edit');
		$title_en_edit = $this->input->post('title_en_edit');
		$id = $this->input->post('id');
		

		$data = array(
			'gover_title_ar' => $title_ar_edit,
			'gover_title' => $title_en_edit,
		);

		if($this->db->where('gover_id', $id)->update('governorate', $data)){
			echo json_encode(array('done'=> 'area has been updated'));
		}else{
			echo json_encode(array('error'=> 'somthing went wrong'));
		}
	}

	public function delete_area(){
		if($this->db->where('gover_id', $this->input->post('id'))->delete('governorate')){
			echo json_encode(array('done'=> 'area has been deleted'));
		}else{
			echo json_encode(array('error'=> 'somthing went wrong'));
		}
	}

	public function all_moha(){
		$data['moha'] = $this->db->get('mohafazat')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/all_moha', $data);
		$this->load->view('dashboard/footer');
	}

	public function edit_moha($id){
		if($id){
			$data['moha'] = $this->db->where('moha_id', $id)->get('mohafazat')->row();
			$data['governorate'] = $this->db->get('governorate')->result();

			$this->load->view('dashboard/header');
			$this->load->view('dashboard/navbar');
			$this->load->view('dashboard/edit_moha', $data);
			$this->load->view('dashboard/footer');
		}
	}

	public function edit_moha_ex(){

		header("Content-Type: application/xml; charset=utf-8");
		$title_ar_edit = $this->input->post('title_ar_edit');
		$title_en_edit = $this->input->post('title_en_edit');
		$id = $this->input->post('id');
		$area = $this->input->post('area');
		

		$data = array(
			'moha_title_ar' => $title_ar_edit,
			'moha_title' => $title_en_edit,
			'governorate_id' => $area,
		);

		if($this->db->where('moha_id', $id)->update('mohafazat', $data)){
			echo json_encode(array('done'=> 'area has been updated'));
		}else{
			echo json_encode(array('done'=> 'somthing went wrong'));
		}
	}

	public function delete_moha(){
		if($this->db->where('moha_id', $this->input->post('id'))->delete('mohafazat')){
			echo json_encode(array('done'=> 'area has been deleted'));
		}else{
			echo json_encode(array('error'=> 'somthing went wrong'));
		}
	}

	public function all_cities(){
		$data['city'] = $this->db->get('city')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/all_cities', $data);
		$this->load->view('dashboard/footer');
	}

	public function edit_city($id){
		if($id){
			$data['city'] = $this->db->where('city_id', $id)->get('city')->row();
			$data['mohafazat'] = $this->db->get('mohafazat')->result();

			$this->load->view('dashboard/header');
			$this->load->view('dashboard/navbar');
			$this->load->view('dashboard/edit_city', $data);
			$this->load->view('dashboard/footer');
		}
	}

	public function edit_city_ex(){

		header("Content-Type: application/xml; charset=utf-8");
		$title_ar_edit = $this->input->post('title_ar_edit');
		$title_en_edit = $this->input->post('title_en_edit');
		$id = $this->input->post('id');
		$moha = $this->input->post('moha');
		

		$data = array(
			'city_name_ar' => $title_ar_edit,
			'city_name' => $title_en_edit,
			'moha_id' => $moha
		);

		if($this->db->where('city_id', $id)->update('city', $data)){
			echo json_encode(array('done'=> 'area has been updated'));
		}else{
			echo json_encode(array('done'=> 'somthing went wrong'));
		}
	}

	public function delete_city(){
		if($this->db->where('city_id', $this->input->post('id'))->delete('city')){
			echo json_encode(array('done'=> 'area has been deleted'));
		}else{
			echo json_encode(array('error'=> 'somthing went wrong'));
		}
	}

	
	public function all_district(){
		$data['district'] = $this->db->get('district')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/all_district', $data);
		$this->load->view('dashboard/footer');
	}

	public function edit_district($id){
		if($id){
			$data['district'] = $this->db->where('district_id', $id)->get('district')->row();
			$data['city'] = $this->db->get('city')->result();

			$this->load->view('dashboard/header');
			$this->load->view('dashboard/navbar');
			$this->load->view('dashboard/edit_district', $data);
			$this->load->view('dashboard/footer');
		}
	}	

	public function edit_district_ex(){

		header("Content-Type: application/xml; charset=utf-8");
		$title_ar_edit = $this->input->post('title_ar_edit');
		$title_en_edit = $this->input->post('title_en_edit');
		$id = $this->input->post('id');
		$city = $this->input->post('city');

		

		$data = array(
			'district_title_ar' => $title_ar_edit,
			'district_title' => $title_en_edit,
			'city_id'=> $city
		);

		if($this->db->where('district_id', $id)->update('district', $data)){
			echo json_encode(array('done'=> 'area has been updated'));
		}else{
			echo json_encode(array('done'=> 'somthing went wrong'));
		}
	}

	public function delete_district(){
		if($this->db->where('district_id', $this->input->post('id'))->delete('district')){
			echo json_encode(array('done'=> 'area has been deleted'));
		}else{
			echo json_encode(array('error'=> 'somthing went wrong'));
		}
	}

	public function add_keywords(){

		$data['cat_keywords'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
		$data['brands'] = $this->db->get('brand')->result();
		$data['keywords'] = $this->db->where('is_category', 0)->get('cat_keywords')->result();
		// $data['keyword_row'] = $this->db->where('is_category', 0)->where('keywords_id', $id)->get('cat_keywords')->row();

		// $data['vatrenas'] = $this->db->where('keyword_id', $id)->get('vatrena_keys_keyword');

    	$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/add_keywords', $data);
		$this->load->view('dashboard/footer');
	}

	public function add_vatrena(){

		// // die('Loading...');
		$data['governorate'] = $this->db->get('governorate')->result();
		$data['cat_keywords'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
		$data['keywords'] = $this->db->where('is_category', 0)->get('cat_keywords')->result();
		$data['brands'] = $this->db->get('brand')->result();

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/add_vatrena', $data);
		$this->load->view('dashboard/footer');

	}

	public function update_category_photo(){

		$photo_category = $this->input->post('photo_category');
		$photo_id = $this->input->post('photo_id');

		$this->db->where('photo_id', $photo_id)->update('photo', array('photo_category'=>$photo_category));
	}

	public function get_more_vatrenas(){

		$pageNumber = $this->input->post('pageNumber');
		
		$back = $pageNumber - 1;
		
		$forword = $pageNumber + 1;

		$number = $pageNumber * 20;

		$offset = $number - 20;

		$comps = $this->db->limit(20,$offset)->get('companies')->result();

		$items = $this->load->view('dashboard/items_rows', array('comps'=> $comps), true);

		echo json_encode(array('items'=>$items));

	}

	public function vat_coin(){
		echo 'vat coin terms here';
	}

	public function keywords(){
		$data['keywords'] = $this->db->where('is_category', 0)->get('cat_keywords')->result();
		
		
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/Allkeywords', $data);
		$this->load->view('dashboard/footer');
	}

	public function all_photo_categories(){
		echo 'all_photo_categories';
	}

	public function photo_categories(){
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/category_photo');
		$this->load->view('dashboard/footer');
	}

	// area -> mohafza -> city -> district(7ay)
 	public function add_area(){

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/add_area');
		$this->load->view('dashboard/footer');
	}

	public function area_inject(){

		$title_ar = $this->input->post('title_ar');
		$title_en = $this->input->post('title_en');


		$data = array(

			'gover_title' => $title_en, 
			'gover_title_ar' => $title_ar
		);

		if($this->db->insert('governorate', $data)){
			echo json_encode(array('done'=>'place added successfully'));
		}else{
			echo json_encode(array('error'=>'somthing went wrong'));
		}

	}

	public function add_mohafza (){
		$data['governorate'] = $this->db->get('governorate')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/add_moha', $data);
		$this->load->view('dashboard/footer');
	}


	public function mohafza_inject(){

		$title_ar = $this->input->post('title_ar');
		$title_en = $this->input->post('title_en');
		$area = $this->input->post('area');


		$data = array(

			'moha_title' => $title_en, 
			'moha_title_ar' => $title_ar,
			'governorate_id' => $area
		);

		if($this->db->insert('mohafazat', $data)){
			echo json_encode(array('done'=>'place added successfully'));
		}else{
			echo json_encode(array('error'=>'somthing went wrong'));
		}

	}

	public function add_city(){
		$data['mohafazat'] = $this->db->get('mohafazat')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/add_city', $data);
		$this->load->view('dashboard/footer');
	}

	public function city_inject(){
		
		$title_ar = $this->input->post('title_ar');
		$title_en = $this->input->post('title_en');
		$moha = $this->input->post('moha');


		$data = array(

			'city_name' => $title_en, 
			'city_name_ar' => $title_ar,
			'moha_id' => $moha
		);

		if($this->db->insert('city', $data)){
			echo json_encode(array('done'=>'place added successfully'));
		}else{
			echo json_encode(array('error'=>'somthing went wrong'));
		}

	}


	public function add_district(){
		$data['city'] = $this->db->get('city')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/add_dist', $data);
		$this->load->view('dashboard/footer');
	}


	public function district_inject(){
		

		$title_ar = $this->input->post('title_ar');
		$title_en = $this->input->post('title_en');
		$city = $this->input->post('city');


		$data = array(

			'district_title' => $title_en, 
			'district_title_ar' => $title_ar,
			'city_id' => $city
		);

		if($this->db->insert('district', $data)){
			echo json_encode(array('done'=>'place added successfully'));
		}else{
			echo json_encode(array('error'=>'somthing went wrong'));
		}

	}

	public function about(){
		echo 'about';
	}


	public function mails(){
		echo 'mails';
	}


	public function add_category_photo(){

		$data = array(

			'photo_cat_name'=> $this->input->post('category_photo_ar'),
			'photo_category_en'=> $this->input->post('category_photo_en')
		);

		if($this->db->insert('photo_category', $data)){
			echo json_encode(array('done'=> 'photo category has been added successfully'));
		}else{
			echo json_encode(array('error'=>'somthing went wrong'));
		}

	}

	public function addBranches($id){

		if($id){
			$data['id'] = $id;
			$data['governorate'] = $this->db->get('governorate')->result();
			$data['cat_keywords'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
			$data['keywords'] = $this->db->where('is_category', 0)->get('cat_keywords')->result();
			$data['default'] = $this->db->where('companies_id', $id)->get('companies')->row();
			$data['brands'] = $this->db->get('brand')->result();

			$emails_comp = $this->db->where('companies_id', $id)->get('companies')->row('email');
			$emails = explode('-', $emails_comp);

			$data['emails'] = $this->load->view('dashboard/email_edit', array('emails'=>$emails), true);

			$videos = $this->db->where('video_vatrena_id', $id)->get('video')->result();

			$data['vidoes'] = $this->load->view('dashboard/video_branches_boxes', array('videos'=>$videos), true);

			$data['count_videos'] = count($data['vidoes']);

			$data['user_photos'] = $this->db->where('vatrena_id', $id)->join('photo_desc','photo_desc.photo_id = photo.photo_id')->get('photo')->result();

			$data['count_photos'] = count($data['user_photos']);


			$this->load->view('dashboard/header');
			$this->load->view('dashboard/navbar');
			$this->load->view('dashboard/addBranches', $data);
			$this->load->view('dashboard/footer');
		}else{
			redirect(base_url('dashboard/view_all_branches'));
		}
	}

	public function ExcuteVatrena(){
		

		header("Content-Type: application/xml; charset=utf-8");
		


		$company_name_ar = $this->input->post('company_name_ar');
		$company_name_en = $this->input->post('company_name_en');
		$logo_name = $this->input->post('logo_name');
		$area = $this->input->post('area');
		$Moha = $this->input->post('Moha');
		$city = $this->input->post('city');
		$dist = $this->input->post('dist');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$address_ar = $this->input->post('address_ar');
		$address_en = $this->input->post('address_en');
		$email = $this->input->post('email');
		$company_about_ar = $this->input->post('company_about_ar');
		$field_tele = $this->input->post('field_tele');
		$company_about_en = $this->input->post('company_about_en');
		$website = $this->input->post('website');
		$facebook = $this->input->post('facebook');
		$twitter = $this->input->post('twitter');
		$google_plus = $this->input->post('google_plus');
		$linkedin = $this->input->post('linkedin');
		$instagram = $this->input->post('instagram');
		$startingHour = $this->input->post('startingHour');
		$enddingHour = $this->input->post('enddingHour');
		$startingHourNight = $this->input->post('startingHourNight');
		$enddingHourNight = $this->input->post('enddingHourNight');
		$holidays = $this->input->post('holidays');
		$video_name = $this->input->post('video_name');
		$codeTelepone = $this->input->post('codeTelepone');
		$phone_number = $this->input->post('phone_number');
		// $user_id = $this->input->post('user_id');
		$Telepone = $this->input->post('Telepone');
		$categories = $this->input->post('categories');
		$keywords = $this->input->post('keywords');
		$person_name = $this->input->post('person_name');
		$video_link = $this->input->post('video_link');
		$count_views = $this->input->post('count_views');
		$logoTriggerExample = $this->input->post('logoTriggerExample');

		if(count($holidays) > 1){
			$holidays = implode('-', $holidays);
		}else{
			$holidays = $this->input->post('holidays')[0];
		}

		$this->load->library('upload');

		//count all generated forms of Album

		$countAlbum = (int) $this->input->post('photoAlbum')+1;
		$fileAlbum = (int) $this->input->post('fileAlbum')+1;
		$countVideos = count($video_name);

		


		if(empty($logoTriggerExample) && isset($_FILES['logoTrigger'])){

			$logos = $_FILES;		
			if(!empty($_FILES['logoTrigger']['name'])){
				$_FILES['logoTrigger']['name']= $logos['logoTrigger']['name'];
		        $_FILES['logoTrigger']['type']= $logos['logoTrigger']['type'];
		        $_FILES['logoTrigger']['tmp_name']= $logos['logoTrigger']['tmp_name'];
		        $_FILES['logoTrigger']['error']= $logos['logoTrigger']['error'];
		        $_FILES['logoTrigger']['size']= $logos['logoTrigger']['size'];
		        $this->upload->initialize($this->set_upload_options());
					        
		        if($this->upload->do_upload('logoTrigger')){
		        	$logo_name = $this->upload->data('file_name');
		    	}else{
		    		$logo_name = 'nope';
		    	}
			}
		}else{
			$logo_name = $logoTriggerExample;
		}





		if(!empty($email)){
			if(is_array($email)){
				$emails = implode('-', $this->input->post('email'));
			}else{
				$emails = $email;
			}
		}

		$arr_tele = array();

		
		if(isset($codeTelepone)){

    		$count_telephones =  count($codeTelepone);
			for($i=0;$i<$count_telephones;$i++){
				$telephone[$i] =  $codeTelepone[$i].'-'.$Telepone[$i];
				array_push($arr_tele, $telephone[$i]); 
			}
		}else{
			$codeTelepone = '';
		}


    	$field_tele =  implode(',', $arr_tele);

    	


		if($company_name_ar)$add['company_name_ar'] = $company_name_ar;
		if($company_name_en)$add['company_name_en'] = $company_name_en;
		if($logo_name)$add['logo'] = $logo_name;
		if($area)$add['area'] = $area;
		if($Moha)$add['mohafaza'] = $Moha;
		if($city)$add['city'] = $city;
		if($dist)$add['district'] = $dist;
		if($latitude)$add['lat'] = $latitude;
		if($longitude)$add['lng'] = $longitude;
		if($address_ar)$add['adress_ar'] = $address_ar;
		if($address_en)$add['adress_en'] = $address_en;
		if($email)$add['email'] = $emails;
		if($company_about_ar)$add['company_about']=$company_about_ar;
		if($field_tele)$add['company_telephone'] =$field_tele;
		if($company_about_en)$add['company_about_en']=$company_about_en;
		if($website)$add['website'] =$website;
		if($facebook)$add['facebook'] =$facebook;
		if($twitter)$add['twitter'] =$twitter;
		if($google_plus)$add['google_plus'] =$google_plus;
		if($linkedin)$add['linkedin'] =$linkedin;
		if($instagram)$add['instagram'] = $instagram;
		if($startingHour)$add['starting_hour'] = $startingHour;
		if($enddingHour)$add['ending_hour'] = $enddingHour;
		if($startingHourNight)$add['starting_hour_night'] =$startingHourNight;
		if($enddingHourNight)$add['ending_hour_night'] =$enddingHourNight;
		if($holidays)$add['holidays'] =$holidays;
		if($count_views)$add['count_views'] = $count_views;

		if($this->db->insert('companies', $add)){
			$user_id = $this->db->insert_id();

			if($this->db->where('video_vatrena_id', $user_id)->delete('video')){

	    		for($v=0;$v<$countVideos;$v++){
					if(!empty($video_name[$v])){

		    			$data_video = array(
		    				'video_name'=>$video_name[$v],
		    				'video_link'=>video_converter($video_link[$v]),
		    				'video_vatrena_id'=>$user_id
		    			);
		    			
	    				if($this->db->insert('video', $data_video)){
	    					
	    				}else{

	    				}
		    			
		    		}
				}	    			
	    	}	


	    	$brand = $this->input->post('brand');
	    	$cos = 0;
			if($brand)foreach($brand as $brands){
				if($this->db->insert('related_brand_vatrena', array('brand_id'=> $brands,'company_id'=> $user_id))){
					$cos++;
				}
			}
			
	    	$files_fil = $_FILES;
			for($f=0;$f<$fileAlbum;$f++){
				if(!isset($_FILES['filepdf'.$f]))continue;
				$file_input = $this->input->post('file_id'.$f);
		    	if(empty($_FILES['filepdf'.$f])){
					if($this->db->where('file_id', $file_input)->where('file_vatrena_id', $user_id)->delete('files')){		
		    			$_FILES['filepdf'.$f]['name']= $files_fil['filepdf'.$f]['name'][$f];
				        $_FILES['filepdf'.$f]['type']= $files_fil['filepdf'.$f]['type'][$f];
				        $_FILES['filepdf'.$f]['tmp_name']= $files_fil['filepdf'.$f]['tmp_name'][$f];
				        $_FILES['filepdf'.$f]['error']= $files_fil['filepdf'.$f]['error'][$f];
				        $_FILES['filepdf'.$f]['size']= $files_fil['filepdf'.$f]['size'][$f]; 

		    			$this->upload->initialize($this->set_upload_file_options());
		    			
		    			if($this->upload->do_upload('filepdf'.$f)){

				        	$file_details = array(

				        		'file_title'=> $this->input->post('filepdfname'.$f),
				        		'file_name'=> $this->upload->data('file_name'),
				        		'file_vatrena_id'=> $user_id
				        	);

				        	if($this->db->insert('files', $file_details)){
				        	}else{

				        	}
				        }
				    }
				}else{
		   			$_FILES['filepdf'.$f]['name']= $files_fil['filepdf'.$f]['name'][$f];
			        $_FILES['filepdf'.$f]['type']= $files_fil['filepdf'.$f]['type'][$f];
			        $_FILES['filepdf'.$f]['tmp_name']= $files_fil['filepdf'.$f]['tmp_name'][$f];
			        $_FILES['filepdf'.$f]['error']= $files_fil['filepdf'.$f]['error'][$f];
			        $_FILES['filepdf'.$f]['size']= $files_fil['filepdf'.$f]['size'][$f]; 

	    			$this->upload->initialize($this->set_upload_file_options());
	    			
	    			if($this->upload->do_upload('filepdf'.$f)){

			        	$file_details = array(

			        		'file_title'=> $this->input->post('filepdfname'.$f),
			        		'file_name'=> $this->upload->data('file_name'),
			        		'file_vatrena_id'=> $user_id
			        	);

			        	if($this->db->insert('files', $file_details)){
			        	}else{
			        	}
			        }
			   	}
			}

			$last_photo_inserted = 0;
			$files = $_FILES;
			for($photoCount=1;$photoCount<$countAlbum;$photoCount++){
				if(!isset($_FILES['inputTriggerd'.$photoCount]))continue;

				$photo_input = $this->input->post('photo_id'.$photoCount);
				if(empty($_FILES['inputTriggerd'.$photoCount])){
					if($this->db->where('photo_id', $photo_input)->where('vatrena_id', $user_id)->delete('photo')){
		    			$_FILES['inputTriggerd'.$photoCount]['name']= $files['inputTriggerd'.$photoCount]['name'];
				        $_FILES['inputTriggerd'.$photoCount]['type']= $files['inputTriggerd'.$photoCount]['type'];
				        $_FILES['inputTriggerd'.$photoCount]['tmp_name']= $files['inputTriggerd'.$photoCount]['tmp_name'];
				        $_FILES['inputTriggerd'.$photoCount]['error']= $files['inputTriggerd'.$photoCount]['error'];
				        $_FILES['inputTriggerd'.$photoCount]['size']= $files['inputTriggerd'.$photoCount]['size'];    

				        $this->upload->initialize($this->set_upload_options());
				        
				        if($this->upload->do_upload('inputTriggerd'.$photoCount)){

				        	$images_details = array(

				        		'photo'=> $this->upload->data('file_name'),
				        		'photo_category'=>$this->input->post('photoCategory'.$photoCount),
				        		'vatrena_id'=> $user_id
				        	);

				        	
			        		if($this->db->insert('photo', $images_details)){
			        			$last_photo_inserted = $this->db->insert_id();
							    if($last_photo_inserted > 0){
					    			$photo_desc = array(
					    				'desc_en' =>$this->input->post('photoDescriptionEn'.$photoCount),
					    				'desc_ar' =>$this->input->post('photoDescriptionAr'.$photoCount),
					    				'photo_id'=>$last_photo_inserted
					    			);


					    			if($this->db->insert('photo_desc', $photo_desc)){
				    				}else{
				    				}
				    			}

			        		}else{
			        		}
			        	
			        	}
			   		}
			   	}else{
		   			$_FILES['inputTriggerd'.$photoCount]['name']= $files['inputTriggerd'.$photoCount]['name'];
			        $_FILES['inputTriggerd'.$photoCount]['type']= $files['inputTriggerd'.$photoCount]['type'];
			        $_FILES['inputTriggerd'.$photoCount]['tmp_name']= $files['inputTriggerd'.$photoCount]['tmp_name'];
			        $_FILES['inputTriggerd'.$photoCount]['error']= $files['inputTriggerd'.$photoCount]['error'];
			        $_FILES['inputTriggerd'.$photoCount]['size']= $files['inputTriggerd'.$photoCount]['size'];    

			        $this->upload->initialize($this->set_upload_options());
			        
			        if($this->upload->do_upload('inputTriggerd'.$photoCount)){

			        	$images_details = array(

			        		'photo'=> $this->upload->data('file_name'),
			        		'photo_category'=>$this->input->post('photoCategory'.$photoCount),
			        		'vatrena_id'=> $user_id
			        	);

			        	
		        		if($this->db->insert('photo', $images_details)){
		        			$last_photo_inserted = $this->db->insert_id();
						    if($last_photo_inserted > 0){
				    			$photo_desc = array(
				    				'desc_en' =>$this->input->post('photoDescriptionEn'.$photoCount),
				    				'desc_ar' =>$this->input->post('photoDescriptionAr'.$photoCount),
				    				'photo_id'=>$last_photo_inserted
				    			);

				    			if($this->db->insert('photo_desc', $photo_desc)){
			    				}else{
			    				}
			    			}

		        		}else{
		        		}
		        	
		        	}
			   	}
			}

			// insert keywords
			$new_keyword_ids = array();
			$current_keyword_ids = $this->db->where('vatrena_id', $user_id)->get('vatrena_keys_keyword')->result(); 

			foreach($keywords as $keyword){
							
				//if keyword exist on the keywords table


				if(isset_keyword($keyword)){
					$keyword_id = $this->db->where('keyword_title', $keyword)->get('cat_keywords')->row('keywords_id');
					if(!empty($keyword_id)){
						array_push($new_keyword_ids, $keyword_id);
						if(!isset_keyword_id($keyword_id, $user_id)){
							$this->db->insert('vatrena_keys_keyword', array(

								'vatrena_id'=>$user_id,
								'keyword_id'=>$keyword_id
							
							));
						}
					}
				// else if keyword is a new one
				}else{
					$this->db->insert('cat_keywords', array(

						'keyword_title'=> $keyword,
						'is_category'=>0

					));
					$keyword_inserted_id = $this->db->insert_id();
					array_push($new_keyword_ids, $keyword_inserted_id);
					if(!empty($keyword_inserted_id)){
						$this->db->insert('vatrena_keys_keyword', array(

							'vatrena_id'=>$user_id,
							'keyword_id'=>$keyword_inserted_id

						));
					}
				}
			}

			missing_keyword_checker($new_keyword_ids, $current_keyword_ids, $user_id);

			// insert categories
			if($this->db->where('vatrena_id', $user_id)->delete('vatrena_keys_category')){
			
	    		foreach($categories as $category){

					$this->db->insert('vatrena_keys_category',array(
						'vatrena_id'=>$user_id,
						'category_id'=>$category
					));
	    		}
	    		
	    	}

			if(isset($phone_number)){
	    		$count_phone_numbers = count($phone_number);

	    		if($this->db->where('vatrena_id', $user_id)->delete('phone_numbers')){

	    			for($p_count=0;$p_count<$count_phone_numbers;$p_count++){

	    				$phones_arr['phone_number']=$phone_number[$p_count];
		    			$phones_arr['person_name']=$person_name[$p_count];
		    			if(isset($Primary[$p_count])){
		    				$phones_arr['main_number']=$Primary[$p_count];
		    			}
		    			$phones_arr['vatrena_id']=$user_id;

	    				if($this->db->insert('phone_numbers', $phones_arr)){
	    				}else{
	    				}
	    			}
	    		}
			}

			echo json_encode(array('done'=>'item has been added successfully'));
		}else{
			echo json_encode(array('error'=>'sorry check your attribute'));
		}
		

	}

	public function excute_branch(){

		header("Content-Type: application/xml; charset=utf-8");
		


		$company_name_ar = $this->input->post('company_name_ar');
		$company_name_en = $this->input->post('company_name_en');
		$logo_name = $this->input->post('logo_name');
		$area = $this->input->post('area');
		$Moha = $this->input->post('Moha');
		$city = $this->input->post('city');
		$dist = $this->input->post('dist');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$address_ar = $this->input->post('address_ar');
		$address_en = $this->input->post('address_en');
		$email = $this->input->post('email');
		$company_about_ar = $this->input->post('company_about_ar');
		$field_tele = $this->input->post('field_tele');
		$company_about_en = $this->input->post('company_about_en');
		$website = $this->input->post('website');
		$facebook = $this->input->post('facebook');
		$twitter = $this->input->post('twitter');
		$google_plus = $this->input->post('google_plus');
		$linkedin = $this->input->post('linkedin');
		$instagram = $this->input->post('instagram');
		$startingHour = $this->input->post('startingHour');
		$enddingHour = $this->input->post('enddingHour');
		$startingHourNight = $this->input->post('startingHourNight');
		$enddingHourNight = $this->input->post('enddingHourNight');
		$holidays = $this->input->post('holidays');
		$video_name = $this->input->post('video_name');
		$codeTelepone = $this->input->post('codeTelepone');
		$phone_number = $this->input->post('phone_number');
		// $user_id = $this->input->post('user_id');
		$Telepone = $this->input->post('Telepone');
		$categories = $this->input->post('categories');
		$keywords = $this->input->post('keywords');
		$person_name = $this->input->post('person_name');
		$video_link = $this->input->post('video_link');
		$count_views = $this->input->post('count_views');
		$logoTriggerExample = $this->input->post('logoTriggerExample');
		$branch_parent = $this->input->post('branch_parent');

		if(count($holidays) > 1){
			$holidays = implode('-', $holidays);
		}else{
			$holidays = $this->input->post('holidays')[0];
		}	

		$this->load->library('upload');

		//count all generated forms of Album

		$countAlbum = (int) $this->input->post('photoAlbum')+1;
		$fileAlbum = (int) $this->input->post('fileAlbum')+1;
		$countVideos = count($video_name);

		


		if(empty($logoTriggerExample) && isset($_FILES['logoTrigger'])){

			$logos = $_FILES;		
			if(!empty($_FILES['logoTrigger']['name'])){
				$_FILES['logoTrigger']['name']= $logos['logoTrigger']['name'];
		        $_FILES['logoTrigger']['type']= $logos['logoTrigger']['type'];
		        $_FILES['logoTrigger']['tmp_name']= $logos['logoTrigger']['tmp_name'];
		        $_FILES['logoTrigger']['error']= $logos['logoTrigger']['error'];
		        $_FILES['logoTrigger']['size']= $logos['logoTrigger']['size'];
		        $this->upload->initialize($this->set_upload_options());
					        
		        if($this->upload->do_upload('logoTrigger')){
		        	$logo_name = $this->upload->data('file_name');
		    	}else{
		    		$logo_name = 'nope';
		    	}
			}
		}else{
			$logo_name = $logoTriggerExample;
		}


		if(!empty($email)){
			if(is_array($email)){
				$emails = implode('-', $this->input->post('email'));
			}else{
				$emails = $email;
			}
		}else{
			echo 'a7eh';
		}

		$arr_tele = array();

		
		if(isset($codeTelepone)){

    		$count_telephones =  count($codeTelepone);
			for($i=0;$i<$count_telephones;$i++){
				$telephone[$i] =  $codeTelepone[$i].'-'.$Telepone[$i];
				array_push($arr_tele, $telephone[$i]); 
			}
		}else{
			$codeTelepone = '';
		}


    	$field_tele =  implode(',', $arr_tele);

    	


		if($company_name_ar)$add['company_name_ar'] = $company_name_ar;
		if($company_name_en)$add['company_name_en'] = $company_name_en;
		if($logo_name)$add['logo'] = $logo_name;
		if($area)$add['area'] = $area;
		if($Moha)$add['mohafaza'] = $Moha;
		if($city)$add['city'] = $city;
		if($dist)$add['district'] = $dist;
		if($latitude)$add['lat'] = $latitude;
		if($longitude)$add['lng'] = $longitude;
		if($address_ar)$add['adress_ar'] = $address_ar;
		if($address_en)$add['adress_en'] = $address_en;
		if($email)$add['email'] = $emails;
		if($company_about_ar)$add['company_about']=$company_about_ar;
		if($field_tele)$add['company_telephone'] =$field_tele;
		if($company_about_en)$add['company_about_en']=$company_about_en;
		if($website)$add['website'] =$website;
		if($facebook)$add['facebook'] =$facebook;
		if($twitter)$add['twitter'] =$twitter;
		if($google_plus)$add['google_plus'] =$google_plus;
		if($linkedin)$add['linkedin'] =$linkedin;
		if($instagram)$add['instagram'] = $instagram;
		if($startingHour)$add['starting_hour'] = $startingHour;
		if($enddingHour)$add['ending_hour'] = $enddingHour;
		if($startingHourNight)$add['starting_hour_night'] =$startingHourNight;
		if($enddingHourNight)$add['ending_hour_night'] =$enddingHourNight;
		if($holidays)$add['holidays'] =$holidays;
		if($count_views)$add['count_views'] = $count_views;
		$add['parent'] = $branch_parent;

		if(!empty($add['parent'])){
			if($this->db->insert('companies', $add)){
				$user_id = $this->db->insert_id();

				if($this->db->where('video_vatrena_id', $user_id)->delete('video')){

		    		for($v=0;$v<$countVideos;$v++){
						if(!empty($video_name[$v])){

			    			$data_video = array(
			    				'video_name'=>$video_name[$v],
			    				'video_link'=>video_converter($video_link[$v]),
			    				'video_vatrena_id'=>$user_id
			    			);
			    			
		    				if($this->db->insert('video', $data_video)){
		    					
		    				}else{

		    				}
			    			
			    		}
					}	    			
		    	}	

		    	$files_fil = $_FILES;
				for($f=0;$f<$fileAlbum;$f++){
					if(!isset($_FILES['filepdf'.$f]))continue;
					$file_input = $this->input->post('file_id'.$f);
			    	if(empty($_FILES['filepdf'.$f])){
						if($this->db->where('file_id', $file_input)->where('file_vatrena_id', $user_id)->delete('files')){		
			    			$_FILES['filepdf'.$f]['name']= $files_fil['filepdf'.$f]['name'][$f];
					        $_FILES['filepdf'.$f]['type']= $files_fil['filepdf'.$f]['type'][$f];
					        $_FILES['filepdf'.$f]['tmp_name']= $files_fil['filepdf'.$f]['tmp_name'][$f];
					        $_FILES['filepdf'.$f]['error']= $files_fil['filepdf'.$f]['error'][$f];
					        $_FILES['filepdf'.$f]['size']= $files_fil['filepdf'.$f]['size'][$f]; 

			    			$this->upload->initialize($this->set_upload_file_options());
			    			
			    			if($this->upload->do_upload('filepdf'.$f)){

					        	$file_details = array(

					        		'file_title'=> $this->input->post('filepdfname'.$f),
					        		'file_name'=> $this->upload->data('file_name'),
					        		'file_vatrena_id'=> $user_id
					        	);

					        	if($this->db->insert('files', $file_details)){
					        	}else{

					        	}
					        }
					    }
					}else{
			   			$_FILES['filepdf'.$f]['name']= $files_fil['filepdf'.$f]['name'][$f];
				        $_FILES['filepdf'.$f]['type']= $files_fil['filepdf'.$f]['type'][$f];
				        $_FILES['filepdf'.$f]['tmp_name']= $files_fil['filepdf'.$f]['tmp_name'][$f];
				        $_FILES['filepdf'.$f]['error']= $files_fil['filepdf'.$f]['error'][$f];
				        $_FILES['filepdf'.$f]['size']= $files_fil['filepdf'.$f]['size'][$f]; 

		    			$this->upload->initialize($this->set_upload_file_options());
		    			
		    			if($this->upload->do_upload('filepdf'.$f)){

				        	$file_details = array(

				        		'file_title'=> $this->input->post('filepdfname'.$f),
				        		'file_name'=> $this->upload->data('file_name'),
				        		'file_vatrena_id'=> $user_id
				        	);

				        	if($this->db->insert('files', $file_details)){
				        	}else{
				        	}
				        }
				   	}
				}

				$last_photo_inserted = 0;
				$files = $_FILES;
				for($photoCount=1;$photoCount<$countAlbum;$photoCount++){
					if(!isset($_FILES['inputTriggerd'.$photoCount]))continue;

					$photo_input = $this->input->post('photo_id'.$photoCount);
					if(empty($_FILES['inputTriggerd'.$photoCount])){
						if($this->db->where('photo_id', $photo_input)->where('vatrena_id', $user_id)->delete('photo')){
			    			$_FILES['inputTriggerd'.$photoCount]['name']= $files['inputTriggerd'.$photoCount]['name'];
					        $_FILES['inputTriggerd'.$photoCount]['type']= $files['inputTriggerd'.$photoCount]['type'];
					        $_FILES['inputTriggerd'.$photoCount]['tmp_name']= $files['inputTriggerd'.$photoCount]['tmp_name'];
					        $_FILES['inputTriggerd'.$photoCount]['error']= $files['inputTriggerd'.$photoCount]['error'];
					        $_FILES['inputTriggerd'.$photoCount]['size']= $files['inputTriggerd'.$photoCount]['size'];    

					        $this->upload->initialize($this->set_upload_options());
					        
					        if($this->upload->do_upload('inputTriggerd'.$photoCount)){

					        	$images_details = array(

					        		'photo'=> $this->upload->data('file_name'),
					        		'photo_category'=>$this->input->post('photoCategory'.$photoCount),
					        		'vatrena_id'=> $user_id
					        	);

					        	
				        		if($this->db->insert('photo', $images_details)){
				        			$last_photo_inserted = $this->db->insert_id();
								    if($last_photo_inserted > 0){
						    			$photo_desc = array(
						    				'desc_en' =>$this->input->post('photoDescriptionEn'.$photoCount),
						    				'desc_ar' =>$this->input->post('photoDescriptionAr'.$photoCount),
						    				'photo_id'=>$last_photo_inserted
						    			);


						    			if($this->db->insert('photo_desc', $photo_desc)){
					    				}else{
					    				}
					    			}

				        		}else{
				        		}
				        	
				        	}
				   		}
				   	}else{
			   			$_FILES['inputTriggerd'.$photoCount]['name']= $files['inputTriggerd'.$photoCount]['name'];
				        $_FILES['inputTriggerd'.$photoCount]['type']= $files['inputTriggerd'.$photoCount]['type'];
				        $_FILES['inputTriggerd'.$photoCount]['tmp_name']= $files['inputTriggerd'.$photoCount]['tmp_name'];
				        $_FILES['inputTriggerd'.$photoCount]['error']= $files['inputTriggerd'.$photoCount]['error'];
				        $_FILES['inputTriggerd'.$photoCount]['size']= $files['inputTriggerd'.$photoCount]['size'];    

				        $this->upload->initialize($this->set_upload_options());
				        
				        if($this->upload->do_upload('inputTriggerd'.$photoCount)){

				        	$images_details = array(

				        		'photo'=> $this->upload->data('file_name'),
				        		'photo_category'=>$this->input->post('photoCategory'.$photoCount),
				        		'vatrena_id'=> $user_id
				        	);

				        	
			        		if($this->db->insert('photo', $images_details)){
			        			$last_photo_inserted = $this->db->insert_id();
							    if($last_photo_inserted > 0){
					    			$photo_desc = array(
					    				'desc_en' =>$this->input->post('photoDescriptionEn'.$photoCount),
					    				'desc_ar' =>$this->input->post('photoDescriptionAr'.$photoCount),
					    				'photo_id'=>$last_photo_inserted
					    			);

					    			if($this->db->insert('photo_desc', $photo_desc)){
				    				}else{
				    				}
				    			}

			        		}else{
			        		}
			        	
			        	}
				   	}
				}

				// insert keywords
				foreach($keywords as $keyword){
					//if keyword exist on the keywords table
					if(isset_keyword($keyword)){
						$keyword_id = $this->db->where('keyword_title', $keyword)->get('cat_keywords')->row('keywords_id');
						if(!empty($keyword_id)){
							if(!isset_keyword_id($keyword_id, $user_id)){
								$this->db->insert('vatrena_keys_keyword', array(

									'vatrena_id'=>$user_id,
									'keyword_id'=>$keyword_id
								
								));
							}
						}
					// else if keyword is a new one
					}else{
						$this->db->insert('cat_keywords', array(

							'keyword_title'=> $keyword,
							'is_category'=>0

						));
						$keyword_inserted_id = $this->db->insert_id();
						if(!empty($keyword_inserted_id)){
							$this->db->insert('vatrena_keys_keyword', array(

								'vatrena_id'=>$user_id,
								'keyword_id'=>$keyword_inserted_id

							));
						}
					}
				}

				// insert categories
				if($this->db->where('vatrena_id', $user_id)->delete('vatrena_keys_category')){
				
		    		foreach($categories as $category){

						$this->db->insert('vatrena_keys_category',array(
							'vatrena_id'=>$user_id,
							'category_id'=>$category
						));
		    		}
		    		
		    	}

				if(isset($phone_number)){
		    		$count_phone_numbers = count($phone_number);

		    		if($this->db->where('vatrena_id', $user_id)->delete('phone_numbers')){

		    			for($p_count=0;$p_count<$count_phone_numbers;$p_count++){

		    				$phones_arr['phone_number']=$phone_number[$p_count];
			    			$phones_arr['person_name']=$person_name[$p_count];
			    			if(isset($Primary[$p_count])){
			    				$phones_arr['main_number']=$Primary[$p_count];
			    			}
			    			$phones_arr['vatrena_id']=$user_id;

		    				if($this->db->insert('phone_numbers', $phones_arr)){
		    				}else{
		    				}
		    			}
		    		}
				}

				$last_photo_inserted_example = 0;
				for($photoCount=1;$photoCount<$countAlbum;$photoCount++){

						if($this->input->post('photo_id_example'.$photoCount) && !empty($this->input->post('photo_id_example'.$photoCount))){
							$images_details = array(

				        		'photo'=> $this->input->post('photo_id_example'.$photoCount),
				        		'photo_category'=>$this->input->post('photo_category_example'.$photoCount),
				        		'vatrena_id'=> $user_id
				        	);
							if($this->db->insert('photo', $images_details)){
				    			$last_photo_inserted_example = $this->db->insert_id();
							    if($last_photo_inserted_example > 0){
					    			$photo_desc = array(
					    				'desc_en' =>$this->input->post('desc_en_example'.$photoCount),
					    				'desc_ar' =>$this->input->post('desc_ar_example'.$photoCount),
					    				'photo_id'=>$last_photo_inserted_example
					    			);


					    			if($this->db->insert('photo_desc', $photo_desc)){
				    				}else{
				    				}
				    			}

				    		}else{
				    		}
						}
				}

				echo json_encode(array('done'=>'item has been added successfully'));
			}else{
				echo json_encode(array('error'=>'sorry check your attribute'));
			}
		}

	}

	public function editBranches($id){



		// die('Loading...');
		$data['governorate'] = $this->db->get('governorate')->result();
		$data['cat_keywords'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
		$data['keywords'] = $this->db->where('is_category', 0)->get('cat_keywords')->result();
		$data['brands'] = $this->db->get('brand')->result();
		if(!empty($id)){

			$data['companies'] = $this->db->where('companies_id', $id)->get('companies')->row();
			$data['phone_numbers'] = $this->db->where('vatrena_id', $id)->get('phone_numbers')->result();
			$data['selected_keywords'] = $this->db->where('vatrena_id', $id)->join('cat_keywords','cat_keywords.keywords_id = vatrena_keys_keyword.keyword_id')->get('vatrena_keys_keyword')->result();
			
			$emails_comp = $this->db->where('companies_id', $id)->get('companies')->row('email');
			$telephone_comp = $this->db->where('companies_id', $id)->get('companies')->row('company_telephone');
			
			

			if(!empty($telephone_comp)){

				$data['arrayTele'] = array();



				$telephone_with_code = explode(',', $telephone_comp);

				$tele_composer = array();
				foreach($telephone_with_code as $tele_code){
					$tele_code_spliter = explode('-', $tele_code);
					if(!empty($tele_code_spliter))$tele_composer[$tele_code_spliter[0]]=$tele_code_spliter[1];
					array_push($data['arrayTele'], $tele_composer);
				}
				
			}else{
				$data['arrayTele'] = array();
			}

			$files = $this->db->where('file_vatrena_id', $id)->get('files')->result();

			$data['files'] =  $this->load->view('dashboard/file_edit_load', array('files'=>$files), true);

			$data['user_photos'] = $this->db->where('vatrena_id', $id)->join('photo_desc','photo_desc.photo_id = photo.photo_id')->get('photo')->result();
			
			

			$videos = $this->db->where('video_vatrena_id', $id)->get('video')->result();

			$data['vidoes'] = $this->load->view('dashboard/video_edit_boxes', array('videos'=>$videos), true);

			$emails = explode('-', $emails_comp);

			$data['emails'] = $this->load->view('dashboard/email_edit', array('emails'=>$emails), true);

			$data['place'] = $this->db->select('area,mohafaza,city,district')->where('companies_id', $id)->get('companies')->row();

			$data['mohafaza'] = $this->db->get('mohafazat')->result();
			$data['city'] = $this->db->get('city')->result();
			$data['district'] = $this->db->get('district')->result();
			// echo '<pre>';
			// 	print_r($data['arrayTele'] );
			// echo '</pre>';
			// die();

			$this->load->view('dashboard/header');
			$this->load->view('dashboard/navbar');
			$this->load->view('dashboard/editBranches', $data);
			$this->load->view('dashboard/footer');
			
		}else{


		}
	}

	public function view_all_branches($id){

		$data['branches'] = $this->db->where('parent', $id)->get('companies')->result();
		if($id)$data['id'] = $id;
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/view_all_branches', $data);
		$this->load->view('dashboard/footer');		
	}

	
	public function testingsomthing(){

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/testingsomthing');
		$this->load->view('dashboard/footer');
	}

	public function testDrop(){
		echo '<pre>';
		print_r($_POST);
		print_r($_FILES);
		echo '</pre>';
	}

	public function featured_category(){

		$featred = $this->input->post('is_feature');

		if($featred == 0){
			$featred = 1;
		}elseif($featred == 1){
			$featred = 0;
		}
		// $data['featured_item'] = $this->input->post('is_feature');
		$data = array(
			'featured_item' => $featred
		);
		if($this->db->where('keywords_id', $this->input->post('Featured_id'))->update('cat_keywords', $data)){
			echo json_encode(array('checker'=> $featred));
		}
	}


	public function featured_item(){

		$featred = $this->input->post('is_feature');

		if($featred == 0){
			$featred = 1;
		}elseif($featred == 1){
			$featred = 0;
		}
		// $data['featured_item'] = $this->input->post('is_feature');
		$data = array(
			'featured_item' => $featred
		);
		if($this->db->where('companies_id', $this->input->post('Featured_id'))->update('companies', $data)){
			echo json_encode(array('checker'=> $featred));
		}
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
		        ->resize_crop(600,400)
		        // ->resize(500,400,TRUE)
		        ->save_dynamic();
		}
	}

	public function related_categories(){
		// echo '<pre>';
		// 	print_r($this->input->post());
		// echo '</pre>';

		$childIds = $this->input->post('childIds');
		$dadId = $this->input->post('dadId');

		foreach($childIds as $childId){
			if($this->categories($childId, $dadId)){
				continue;
			}else{
				$this->db->insert('categories_related', array('cat_child_id'=>$childId,'cat_dad_id'=>$dadId));
			}
		}

	}

	public function categories($childId, $dadId){
		$related = $this->db->where('cat_child_id',$childId)->where('cat_dad_id',$dadId)->get('categories_related')->row();
		if($related){
			return true;
		}else{
			return false;
		}
	}

	public function edit_category(){

		$id = $this->input->post('id');
		$title_ar_edit = $this->input->post('title_ar_edit');
		$title_en_edit = $this->input->post('title_en_edit');
		$desc_ar_edit = $this->input->post('desc_ar_edit');
		$desc_en_edit = $this->input->post('desc_en_edit');
		$vatrena_name = $this->input->post('vatrena_name');
		$priority = $this->input->post('priority');


		$this->db->where('vatrena_id', $vatrena_name)->update('vatrena_keys_category', array('priority'=>$priority));

		$data = array(
			'keyword_title'=>$title_ar_edit,
			'cat_keywords_en'=>$title_en_edit,
			'category_desc'=>$desc_ar_edit,
			'category_desc_en'=>$desc_en_edit
		);


		if($this->db->where('keywords_id', $id)->update('cat_keywords', $data)){

			$last_id = $this->db->insert_id();

			if($this->db->where('cat_dad_id', $id)->delete('categories_related')){

	   			if($this->input->post('keywords'))foreach($this->input->post('keywords') as $keywordy):
		   			$dadData = array(

		   				'cat_child_id'=>$keywordy,
		   				'cat_dad_id'=>$id

		   			);

		   			$count_insert_related = 0;
		   			if($this->categories($keywordy, $last_id)){
						continue;
					}else{
						$this->db->insert('categories_related',$dadData);
						$count_insert_related++;
					}
	   			endforeach;

			}
			echo json_encode(array('done'=>'Edit Works Fine'));
		}
	}

	public function edit_keyword(){

		$id = $this->input->post('id');
		$title_ar_edit = $this->input->post('title_ar_edit');
		$title_en_edit = $this->input->post('title_en_edit');
		$desc_ar_edit = $this->input->post('desc_ar_edit');
		$desc_en_edit = $this->input->post('desc_en_edit');
		$vatrena_name = $this->input->post('vatrena_name');
		$priority = $this->input->post('priority');
		$category = $this->input->post('category');


		$this->db->where('vatrena_id', $vatrena_name)->update('vatrena_keys_keyword', array('priority'=>$priority));

		$data = array(
			'keyword_title'=>$title_ar_edit,
			'cat_keywords_en'=>$title_en_edit,
			'category_desc'=>$desc_ar_edit,
			'category_desc_en'=>$desc_en_edit
		);

		$brands = $this->input->post('brand');
		$co = 0;
		$cos = 0;

		if($category)$this->db->where('keyword_id', $id)->delete('related_keyword_category');
		if($category)foreach($category as $categories){
			if(!category_exist($categories, $id)){
				if($this->db->insert('related_keyword_category', array('keyword_id'=> $id,'category_id'=> $categories))){
					$cos++;
				}
			}
		}

		if($brands)$this->db->where('related_keyword_id', $id)->delete('keyword_brand_related');
		if($brands)foreach($brands as $brand){
			if(!brand_exist($brand, $id)){
				if($this->db->insert('keyword_brand_related', array('related_keyword_id'=> $id,'related_brand_id'=> $brand))){
					$co++;
				}
			}
		}

		if($this->db->where('keywords_id', $id)->update('cat_keywords', $data)){
			echo json_encode(array('done'=>'Edit Works Fine','count_rel'=>$co,'cos'=>$cos));
		}else{
			echo json_encode(array('error'=>'something went wrong'));
		}
	}



	public function upload_category_photo(){
		// echo '<pre>';
		// 	print_r($_POST);
		// echo '</pre>';
		$cat_id = $this->input->post('category_id');

		$config['upload_path']          = './assets/new_uploads/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data() , 'done'=>'Edit Works Fine');

            if($data['upload_data']['file_name']){

            	$data_upload = array(
					'picutre'=>$data['upload_data']['file_name'],
				);

            	if($this->db->where('keywords_id', $cat_id)->update('cat_keywords', $data_upload)){
            		echo json_encode($data);
				}


            }else{
            }
        	
        }
	}

	public function edit_itmes(){



		if(!empty($this->input->post())){
			extract($this->input->post());
		
			$data = array(

				'company_name_ar' => $Company_name_ar, 
				'company_name_en' => $Company_name_en,
				'logo' => $logo,
				'companyType' => $CompanyType,
				'area' => $Area,
				'mohafaza' => $Mohafaza,
				'city' => $City,
				'district' => $District,
				'adress_ar' => $Adress_ar,
				'adress_en' => $Adress_en,
				'email' => $Email,
				'company_about' => $Company_about,
				'employee_name' => $employee_name,
				'employee_job' => $employee_job,
				'employee_phone' => $employee_phone,
				'company_mobile' => $company_mobile,
				'company_telephone' => $company_telephone,
				'company_about_en' => $company_about_en,
				'website' => $website,
				'featured_item' => $featured_item

			);

			if($this->db->where('companies_id', $id)->update('companies', $data)){
				echo json_encode(array('done'=> 'i love you guys <3'));
			}
		}
	}


	public function add_itmes(){



		if(!empty($this->input->post())){
			extract($this->input->post());
		
			$data = array(

				'company_name_ar' => $Company_name_ar, 
				'company_name_en' => $Company_name_en,
				'logo' => $logo,
				'companyType' => $CompanyType,
				'area' => $Area,
				'mohafaza' => $Mohafaza,
				'city' => $City,
				'district' => $District,
				'adress_ar' => $Adress_ar,
				'adress_en' => $Adress_en,
				'email' => $Email,
				'company_about' => $Company_about,
				'employee_name' => $employee_name,
				'employee_job' => $employee_job,
				'employee_phone' => $employee_phone,
				'company_mobile' => $company_mobile,
				'company_telephone' => $company_telephone,
				'company_about_en' => $company_about_en,
				'website' => $website,
				'featured_item' => $featured_item

			);

			if($this->db->insert('companies', $data)){
				echo json_encode(array('done'=> 'i love you guys <3'));
			}
		}
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

    public function photo_Autoload(){

    	$data['ids']['insert']['inputNumber'] = (int) $this->input->post('containerNumber')+1;

    	$data['photo_Autoload'] = $this->load->view('dashboard/photo_auroload', $data['ids']['insert'], true);

 		echo json_encode($data);

    }

    public function video_Autoload(){

    	$data['ids']['insert']['inputNumber'] = (int) $this->input->post('containerNumber')+1;

    	$data['video_autoload'] = $this->load->view('dashboard/video_autoload', $data['ids']['insert'], true);

 		echo json_encode($data);

    }

    public function file_Autoload(){

    	$data['ids']['insert']['inputNumber'] = (int) $this->input->post('containerNumber')+1;

    	$data['file_autoload'] = $this->load->view('dashboard/flies_auto_load', $data['ids']['insert'], true);

 		echo json_encode($data);

    }

    private function set_upload_options()
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = './assets/new_uploads/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['encrypt_name'] = TRUE;
	    $config['overwrite']     = FALSE;

	    return $config;
	}


	private function set_upload_file_options()
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = './assets/file_uploads/';
	    $config['allowed_types'] = 'doc|docx|txt|xla|xls|xlsx';
	    $config['encrypt_name'] = TRUE;
	    $config['overwrite']     = FALSE;

	    return $config;
	}

    public function wizerd_handling(){

    	header("Content-Type: application/xml; charset=utf-8");

    		
    		$error = '';


			$company_name_ar = $this->input->post('company_name_ar');
    		$company_name_en = $this->input->post('company_name_en');
    		$logo_name = $this->input->post('logo_name');
    		$area = $this->input->post('area');
			$moha = $this->input->post('moha');
			$city = $this->input->post('city');
			$dist = $this->input->post('dist');
			$latitude = $this->input->post('latitude');
			$longitude = $this->input->post('longitude');
			$address_ar = $this->input->post('address_ar');
			$address_en = $this->input->post('address_en');
			$email = $this->input->post('email');
			$company_about_ar = $this->input->post('company_about_ar');
			$field_tele = $this->input->post('field_tele');
			$company_about_en = $this->input->post('company_about_en');
			$website = $this->input->post('website');
			$facebook = $this->input->post('facebook');
			$twitter = $this->input->post('twitter');
			$google_plus = $this->input->post('google_plus');
			$linkedin = $this->input->post('linkedin');
			$instagram = $this->input->post('instagram');
			$startingHour = $this->input->post('startingHour');
			$enddingHour = $this->input->post('enddingHour');
			$startingHourNight = $this->input->post('startingHourNight');
			$enddingHourNight = $this->input->post('enddingHourNight');
			$holidays = $this->input->post('holidays');
			$video_name = $this->input->post('video_name');
			$codeTelepone = $this->input->post('codeTelepone');
    		$phone_number = $this->input->post('phone_number');
    		$user_id = $this->input->post('user_id');
    		$Telepone = $this->input->post('Telepone');
    		$categories = $this->input->post('categories');
    		$keywords = $this->input->post('keywords');
    		$person_name = $this->input->post('person_name');
    		$video_link = $this->input->post('video_link');
    		$count_views = $this->input->post('count_views');
    		
    		if(count($holidays) > 1){
   				$holidays = implode('-', $holidays);
    		}else{
				$holidays = $this->input->post('holidays')[0];
			}
			
    		$this->load->library('upload');

    		//count all generated forms of Album

    		$countAlbum = (int) $this->input->post('photoAlbum')+1;
    		$fileAlbum = (int) $this->input->post('fileAlbum')+1;
    		$countVideos = count($video_name);

    		if($this->db->where('video_vatrena_id', $user_id)->delete('video')){

	    		for($v=0;$v<$countVideos;$v++){
					if(!empty($video_name[$v])){

		    			$data_video = array(
		    				'video_name'=>$video_name[$v],
		    				'video_link'=>video_converter($video_link[$v]),
		    				'video_vatrena_id'=>$user_id
		    			);
		    			
	    				if($this->db->insert('video', $data_video)){
	    				}else{
	    				}
		    			
		    		}
				}	    			
	    	}	

	    	$brand = $this->input->post('brand');
	    	$cos = 0;

	    	if(!isset($brand)){

		    	$this->db->where('company_id', $user_id)->delete('related_brand_vatrena');

	    	}else{

				if($brand)foreach($brand as $brands){
					if(!brand_company_exist($brands, $user_id)){
						if($this->db->insert('related_brand_vatrena', array('brand_id'=> $brands,'company_id'=> $user_id))){
							$cos++;
						}
					}
				}
	    	}




    		$files_fil = $_FILES;
    		for($f=0;$f<$fileAlbum;$f++){
    			if(!isset($_FILES['filepdf'.$f]))continue;
    			$file_input = $this->input->post('file_id'.$f);
		    	if(empty($_FILES['filepdf'.$f])){
					if($this->db->where('file_id', $file_input)->where('file_vatrena_id', $user_id)->delete('files')){		
		    			$_FILES['filepdf'.$f]['name']= $files_fil['filepdf'.$f]['name'][$f];
				        $_FILES['filepdf'.$f]['type']= $files_fil['filepdf'.$f]['type'][$f];
				        $_FILES['filepdf'.$f]['tmp_name']= $files_fil['filepdf'.$f]['tmp_name'][$f];
				        $_FILES['filepdf'.$f]['error']= $files_fil['filepdf'.$f]['error'][$f];
				        $_FILES['filepdf'.$f]['size']= $files_fil['filepdf'.$f]['size'][$f]; 

		    			$this->upload->initialize($this->set_upload_file_options());
		    			
		    			if($this->upload->do_upload('filepdf'.$f)){

				        	$file_details = array(

				        		'file_title'=> $this->input->post('filepdfname'.$f),
				        		'file_name'=> $this->upload->data('file_name'),
				        		'file_vatrena_id'=> $user_id
				        	);

				        	if($this->db->insert('files', $file_details)){
				        	}else{

				        	}
				        }
				    }
				}else{
		   			$_FILES['filepdf'.$f]['name']= $files_fil['filepdf'.$f]['name'][$f];
			        $_FILES['filepdf'.$f]['type']= $files_fil['filepdf'.$f]['type'][$f];
			        $_FILES['filepdf'.$f]['tmp_name']= $files_fil['filepdf'.$f]['tmp_name'][$f];
			        $_FILES['filepdf'.$f]['error']= $files_fil['filepdf'.$f]['error'][$f];
			        $_FILES['filepdf'.$f]['size']= $files_fil['filepdf'.$f]['size'][$f]; 

	    			$this->upload->initialize($this->set_upload_file_options());
	    			
	    			if($this->upload->do_upload('filepdf'.$f)){

			        	$file_details = array(

			        		'file_title'=> $this->input->post('filepdfname'.$f),
			        		'file_name'=> $this->upload->data('file_name'),
			        		'file_vatrena_id'=> $user_id
			        	);

			        	if($this->db->insert('files', $file_details)){
			        	}else{
			        	}
			        }
			   	}
    		}
    
    		
			$logos = $_FILES;		
    		if(!empty($_FILES['logoTrigger']['name'])){
	    		$_FILES['logoTrigger']['name']= $logos['logoTrigger']['name'];
		        $_FILES['logoTrigger']['type']= $logos['logoTrigger']['type'];
		        $_FILES['logoTrigger']['tmp_name']= $logos['logoTrigger']['tmp_name'];
		        $_FILES['logoTrigger']['error']= $logos['logoTrigger']['error'];
		        $_FILES['logoTrigger']['size']= $logos['logoTrigger']['size'];
		        $this->upload->initialize($this->set_upload_options());
					        
		        if($this->upload->do_upload('logoTrigger')){
		        	$logo_name = $this->upload->data('file_name');
	        	}else{
	        		$logo_name = 'nope';
	        	}
        	}
    			

    		$bannar = $_FILES;
	    	$_FILES['bannar']['name']= $bannar['bannar']['name'];
	        $_FILES['bannar']['type']= $bannar['bannar']['type'];
	        $_FILES['bannar']['tmp_name']= $bannar['bannar']['tmp_name'];
	        $_FILES['bannar']['error']= $bannar['bannar']['error'];
	        $_FILES['bannar']['size']= $bannar['bannar']['size']; 

			$this->upload->initialize($this->set_upload_options());
			
			if($this->upload->do_upload('bannar')){

	        	$bannar_t = array(

	        		'bannar'=> $this->upload->data('file_name'),
	        	);

	        	if($this->db->where('companies_id', $user_id)->update('companies', $bannar_t)){
	        		// echo json_encode(array('ss'=>'one'));
	        	}else{
	        		// echo json_encode(array('ss'=>'s'));
	        		// die();
	        	}
	        }else{

	        	// print_r($_FILES);
	        	// die('didn');

	        }



			$last_photo_inserted = 0;
			$files = $_FILES;
    		for($photoCount=1;$photoCount<$countAlbum;$photoCount++){
    			if(!isset($_FILES['inputTriggerd'.$photoCount]))continue;

    			$photo_input = $this->input->post('photo_id'.$photoCount);
    			if(empty($_FILES['inputTriggerd'.$photoCount])){
					if($this->db->where('photo_id', $photo_input)->where('vatrena_id', $user_id)->delete('photo')){
		    			$_FILES['inputTriggerd'.$photoCount]['name']= $files['inputTriggerd'.$photoCount]['name'];
				        $_FILES['inputTriggerd'.$photoCount]['type']= $files['inputTriggerd'.$photoCount]['type'];
				        $_FILES['inputTriggerd'.$photoCount]['tmp_name']= $files['inputTriggerd'.$photoCount]['tmp_name'];
				        $_FILES['inputTriggerd'.$photoCount]['error']= $files['inputTriggerd'.$photoCount]['error'];
				        $_FILES['inputTriggerd'.$photoCount]['size']= $files['inputTriggerd'.$photoCount]['size'];    

				        $this->upload->initialize($this->set_upload_options());
				        
				        if($this->upload->do_upload('inputTriggerd'.$photoCount)){

				        	$images_details = array(

				        		'photo'=> $this->upload->data('file_name'),
				        		'photo_category'=>$this->input->post('photoCategory'.$photoCount),
				        		'vatrena_id'=> $user_id
				        	);

				        	
			        		if($this->db->insert('photo', $images_details)){
			        			$last_photo_inserted = $this->db->insert_id();
							    if($last_photo_inserted > 0){
					    			$photo_desc = array(
					    				'desc_en' =>$this->input->post('photoDescriptionEn'.$photoCount),
					    				'desc_ar' =>$this->input->post('photoDescriptionAr'.$photoCount),
					    				'photo_id'=>$last_photo_inserted
					    			);

					    			if($this->db->insert('photo_desc', $photo_desc)){
				    				}else{
				    				}
				    			}

			        		}else{
			        		}
			        	
			        	}
			   		}
			   	}else{
		   			$_FILES['inputTriggerd'.$photoCount]['name']= $files['inputTriggerd'.$photoCount]['name'];
			        $_FILES['inputTriggerd'.$photoCount]['type']= $files['inputTriggerd'.$photoCount]['type'];
			        $_FILES['inputTriggerd'.$photoCount]['tmp_name']= $files['inputTriggerd'.$photoCount]['tmp_name'];
			        $_FILES['inputTriggerd'.$photoCount]['error']= $files['inputTriggerd'.$photoCount]['error'];
			        $_FILES['inputTriggerd'.$photoCount]['size']= $files['inputTriggerd'.$photoCount]['size'];    

			        $this->upload->initialize($this->set_upload_options());
			        
			        if($this->upload->do_upload('inputTriggerd'.$photoCount)){

			        	$images_details = array(

			        		'photo'=> $this->upload->data('file_name'),
			        		'photo_category'=>$this->input->post('photoCategory'.$photoCount),
			        		'vatrena_id'=> $user_id
			        	);

			        	
		        		if($this->db->insert('photo', $images_details)){
		        			$last_photo_inserted = $this->db->insert_id();
						    if($last_photo_inserted > 0){
				    			$photo_desc = array(
				    				'desc_en' =>$this->input->post('photoDescriptionEn'.$photoCount),
				    				'desc_ar' =>$this->input->post('photoDescriptionAr'.$photoCount),
				    				'photo_id'=>$last_photo_inserted
				    			);

				    			if($this->db->insert('photo_desc', $photo_desc)){
			    				}else{
			    				}
			    			}

		        		}else{
		        		}
		        	
		        	}
			   	}
			}

			if(!empty($email)){
				if(is_array($email)){
    				$emails = implode('-', $this->input->post('email'));
				}else{
					$emails = $email;
				}
			}else{
				echo 'try to add and email';
			}

    		$arr_tele = array();

    		
    		if(isset($codeTelepone)){

	    		$count_telephones =  count($codeTelepone);
				for($i=0;$i<$count_telephones;$i++){
					$telephone[$i] =  $codeTelepone[$i].'-'.$Telepone[$i];
					array_push($arr_tele, $telephone[$i]); 
				}
			}else{
				$codeTelepone = '';
			}
			
			$new_keyword_ids = array();
			$current_keyword_ids = $this->db->where('vatrena_id', $user_id)->get('vatrena_keys_keyword')->result();
			// insert keywords
			if($keywords)foreach($keywords as $keyword){
				//if keyword exist on the keywords table
				if(isset_keyword($keyword)){
					$keyword_id = $this->db->where('keyword_title', $keyword)->get('cat_keywords')->row('keywords_id');
					if(!empty($keyword_id)){
						array_push($new_keyword_ids, $keyword_id);
						if(!isset_keyword_id($keyword_id, $user_id)){
							$this->db->insert('vatrena_keys_keyword', array(

								'vatrena_id'=>$user_id,
								'keyword_id'=>$keyword_id
							
							));
						}
					}
				// else if keyword is a new one
				}else{
					$this->db->insert('cat_keywords', array(

						'keyword_title'=> $keyword,
						'is_category'=>0

					));
					$keyword_inserted_id = $this->db->insert_id();
					if(!empty($keyword_inserted_id)){
						array_push($new_keyword_ids, $keyword_inserted_id);
						$this->db->insert('vatrena_keys_keyword', array(

							'vatrena_id'=>$user_id,
							'keyword_id'=>$keyword_inserted_id

						));
					}
				}
			}

			missing_keyword_checker($new_keyword_ids, $current_keyword_ids, $user_id);

			// insert categories
			if($this->db->where('vatrena_id', $user_id)->delete('vatrena_keys_category')){
			
	    		if($categories)foreach($categories as $category){

					$this->db->insert('vatrena_keys_category',array(
						'vatrena_id'=>$user_id,
						'category_id'=>$category
    				));
	    		}
	    		
	    	}
    		$field_tele =  implode(',', $arr_tele);



    		if(isset($phone_number)){
	    		$count_phone_numbers = count($phone_number);

	    		if($this->db->where('vatrena_id', $user_id)->delete('phone_numbers')){

	    			for($p_count=0;$p_count<$count_phone_numbers;$p_count++){

	    				$phones_arr['phone_number']=$phone_number[$p_count];
		    			$phones_arr['person_name']=$person_name[$p_count];
		    			if(isset($Primary[$p_count])){
		    				$phones_arr['main_number']=$Primary[$p_count];
		    			}
		    			$phones_arr['vatrena_id']=$user_id;

	    				if($this->db->insert('phone_numbers', $phones_arr)){
	    				}else{
	    				}
	    			}
	    		}

    		}

    		if($company_name_ar)$add['company_name_ar'] = $company_name_ar;
    		if($company_name_en)$add['company_name_en'] = $company_name_en;
    		if($logo_name)$add['logo'] = $logo_name;
    		if($area)$add['area'] = $area;
			if($moha)$add['mohafaza'] = $moha;
			if($city)$add['city'] = $city;
			if($dist)$add['district'] = $dist;
			if($latitude)$add['lat'] = $latitude;
			if($longitude)$add['lng'] = $longitude;
			$add['adress_ar'] = $address_ar;
			$add['adress_en'] = $address_en;
			if($email)$add['email'] = $emails;
			if($company_about_ar)$add['company_about']=$company_about_ar;
			if($field_tele)$add['company_telephone'] =$field_tele;
			if($company_about_en)$add['company_about_en']=$company_about_en;
			if($website)$add['website'] =$website;
			if($facebook)$add['facebook'] =$facebook;
			if($twitter)$add['twitter'] =$twitter;
			if($google_plus)$add['google_plus'] =$google_plus;
			if($linkedin)$add['linkedin'] =$linkedin;
			if($instagram)$add['instagram'] = $instagram;
			if($startingHour)$add['starting_hour'] = $startingHour;
			if($enddingHour)$add['ending_hour'] = $enddingHour;
			if($startingHourNight)$add['starting_hour_night'] =$startingHourNight;
			if($enddingHourNight)$add['ending_hour_night'] =$enddingHourNight;
			if($holidays)$add['holidays'] =$holidays;
			if($count_views)$add['count_views'] = $count_views;

			$added_items = 0;
			foreach ($add as $key => $value) {
				if(empty($add['company_name_ar']) && empty($add['company_name_en']) && empty($add['area']) && empty($add['mohafaza']) && empty($add['city']) && empty($add['district']) && empty($add['email'])){
					continue;
				}else{
					if($this->db->where('companies_id', $user_id)->update('companies', array($key=>$value))){
						$added_items++;	
		    		}
				}
			}

			if($added_items > 0){
				echo json_encode(array('done'=>''.$added_items.' has been updated'));
			}else{
				echo json_encode(array('error'=>'0 item has been updated'));
			}
			/*
			if(!isset($Moha) || !isset($city) || !isset($dist)){
			   		
    		
	    		$data  = array(
					'company_name_ar'=>$company_name_ar,
					'company_name_en'=>$company_name_en,
					'logo'=>$logo_name,
					'area'=> $area,
					'lat'=> $latitude,
					'lng'=> $longitude,
					'adress_ar'=> $address_ar,
					'adress_en'=> $address_en,
					'email'=> $emails,
					'company_telephone'=>$field_tele,
					'website'=>$website,
					'facebook'=>$facebook,
					'twitter'=>$twitter,
					'google_plus'=>$google_plus,
					'linkedin'=>$linkedin,
					'instagram'=>$instagram,
					'starting_hour'=>$startingHour,
					'ending_hour'=>$enddingHour,
					'starting_hour_night'=>$startingHourNight,
					'ending_hour_night'=>$enddingHourNight,
					'holidays'=>$holidays

	    		);

    		}else{
    			$data  = array(
					'company_name_ar'=>$company_name_ar,
					'company_name_en'=>$company_name_en,
					'logo'=>$logo_name,
					'area'=> $area,
					'mohafaza'=> $Moha,
					'city'=> $city,
					'district'=> $dist,
					'lat'=> $latitude,
					'lng'=> $longitude,
					'adress_ar'=> $address_ar,
					'adress_en'=> $address_en,
					'email'=> $emails,
					'company_about'=>$company_about_ar,
					'company_telephone'=>$field_tele,
					'company_about_en'=>$company_about_en,
					'website'=>$website,
					'facebook'=>$facebook,
					'twitter'=>$twitter,
					'google_plus'=>$google_plus,
					'linkedin'=>$linkedin,
					'instagram'=>$instagram,
					'starting_hour'=>$startingHour,
					'ending_hour'=>$enddingHour,
					'starting_hour_night'=>$startingHourNight,
					'ending_hour_night'=>$enddingHourNight,
					'holidays'=>$holidays

	    		);
    		}
    		if($this->db->where('companies_id', $user_id)->update('companies', $data)){
    			echo json_encode(array('done'=>'edit company'));
    		}else{
    			echo json_encode(array('error'=> 'somthing went wrong'));
    		}
    		*/
    }

    public function email_Autoload(){

    	$data['email_autoload'] = $this->load->view('dashboard/email_autoload', array(), true);

 		echo json_encode($data);
    }

    public function phone_Autoload(){
    	
    	$data['phone_autoload'] = $this->load->view('dashboard/phone_loader', array(), true);

 		echo json_encode($data);
    }


    public function update_photo_desc_ar(){

    	$desc_id = $this->input->post('desc_id');
    	$desc_ar = $this->input->post('desc_ar');
    	$desc_en = $this->input->post('desc_en');
    	
    	$data = array(
    		'desc_ar' => $desc_ar,
    	);

    	if($this->db->where('desc_id', $desc_id)->update('photo_desc', $data)){
    		echo json_encode(array('done'=> 'update has been done'));
    	}

    }

    public function update_photo_desc_en(){

    	$desc_id = $this->input->post('desc_id');
    	$desc_ar = $this->input->post('desc_ar');
    	$desc_en = $this->input->post('desc_en');
    	
    	$data = array(
    		'desc_en' => $desc_en
    	);

    	if($this->db->where('desc_id', $desc_id)->update('photo_desc', $data)){
    		echo json_encode(array('done'=> 'update has been done'));
    	}

    }


    public function telephone_Autoload(){
    	
    	$data['telephone_autoload'] = $this->load->view('dashboard/telephone_autoloader', array(), true);

 		echo json_encode($data);
    }

    public function delete_edit_photo(){
    	if($this->db->where('photo_id', $this->input->post('photo_id'))->delete('photo')){
    		$this->db->where('photo_id', $this->input->post('photo_id'))->delete('photo_desc');
    		echo json_encode(array('done'=>'photo is deleted'));
    	}else{
    		echo json_encode(array('error'=>'photo is not deleted'));
    	}
    }

    public function delete_edit_file(){
    	if($this->db->where('file_id', $this->input->post('file_id'))->delete('files')){
    		echo json_encode(array('done'=>'file is deleted'));
    	}else{
    		echo json_encode(array('error'=>'file is not deleted'));
    	}
    }

    public function delete_edit_video(){
    	if($this->db->where('video_id', $this->input->post('video_id'))->delete('video')){
    		echo json_encode(array('done'=>'video is deleted'));
    	}else{
    		echo json_encode(array('error'=>'video is not deleted'));
    	}
    }


    public function active_vatrena(){
    	$var = $this->input->post('value');
    	$id  = $this->input->post('id');
    	$data = array('active', $var);
    	if($this->db->where('companies_id', $id)->update('companies', $data)){
    		echo json_encode(array('done'=>'video has been activated'));
    	}
    }

    public function feature_vatrena(){
    	$var = $this->input->post('value');
    	$id  = $this->input->post('id');
    	$data = array('featured_item', $var);
    	if($this->db->where('companies_id', $id)->update('companies', $data)){
    		echo json_encode(array('done'=>'video has been activated'));
    	}
    }

    public function add_category(){

    	$data['cat_keywords'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
    	$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/add_category', $data);
		$this->load->view('dashboard/footer');
    }


    public function add_category_insert(){

    	header("Content-Type: application/xml; charset=utf-8");

    	$category_ar = $this->input->post('category_ar');
    	$category_en = $this->input->post('category_en');
   		foreach($this->input->post('keywords') as $keywordy){
   			// echo $keywordy.'<br />';
   		}


   		$data = array(


   			'keyword_title'=>$category_ar,
   			'cat_keywords_en'=>$category_en,
   			'is_category'=>1,
   			'featured_item'=>0


   		);

   		if($this->db->insert('cat_keywords', $data)){
   			
   			$last_id = $this->db->insert_id();


   			foreach($this->input->post('keywords') as $keywordy):
	   			$data = array(

	   				'cat_child_id'=>$keywordy,
	   				'cat_dad_id'=>$last_id

	   			);

	   			$count_insert_related = 0;
	   			if($this->categories($keywordy, $last_id)){
					continue;
				}else{
					$this->db->insert('categories_related',$data);
					$count_insert_related++;
				}
   			endforeach;


   			echo json_encode(array('done'=>$count_insert_related));


   		}else{
   			echo json_encode(array('error'=>'sorry sonthing went wrong'));

   		}
    }

    public function add_keyword_insert(){

    	header("Content-Type: application/xml; charset=utf-8");

    	$category_ar = $this->input->post('category_ar');
    	$category_en = $this->input->post('category_en');
   		


   		$data = array(


   			'keyword_title'=>$category_ar,
   			'cat_keywords_en'=>$category_en,
   			'is_category'=>0,
   			'featured_item'=>0


   		);

   		if($this->db->insert('cat_keywords', $data)){
   			

   			echo json_encode(array('done'=>'keyword has been added successfully'));


   		}else{
   			echo json_encode(array('error'=>'sorry sonthing went wrong'));

   		}
    }


    public function delete_Vatrena(){
    	if($this->db->where('companies_id', $this->input->post('id'))->delete('companies')){
   			echo json_encode(array('done'=>'item has been deleted'));
    	}else{
   			echo json_encode(array('error'=>'sorry sonthing went wrong'));
    	}
    }

    public function delete_category(){
    	if($this->db->where('keywords_id', $this->input->post('id'))->delete('cat_keywords')){
   			echo json_encode(array('done'=>'item has been deleted'));
    	}else{
   			echo json_encode(array('error'=>'sorry sonthing went wrong'));
    	}
    }
    public function delete_keywords(){
    	if($this->db->where('keywords_id', $this->input->post('id'))->delete('cat_keywords')){
   			echo json_encode(array('done'=>'item has been deleted'));
    	}else{
   			echo json_encode(array('error'=>'sorry sonthing went wrong'));
    	}
    }

    public function is_category(){
    	if($this->db->where('keywords_id', $this->input->post('Featured_id'))->update('cat_keywords', array('is_category'=>1))){
   			echo json_encode(array('done'=>'keyword is turned into a category'));
    	}else{
   			echo json_encode(array('error'=>'keyword is category already'));
    	}
    }

    public function delete_ad_by_id(){


    	if($this->db->where('ad_id', $this->input->post('ad_id'))->update('ads', array('publish'=>1))){
   			echo json_encode(array('done'=>'product has been removed'));
    	}else{
   			echo json_encode(array('error'=>'somthing went wrong'));
    	}
    }
    
    public function delete_brand_by_id(){


    	if($this->db->where('brand_id', $this->input->post('brand_id'))->delete('brand')){
   			echo json_encode(array('done'=>'product has been removed'));
    	}else{
   			echo json_encode(array('error'=>'somthing went wrong'));
    	}
    }

    public function edit_feature($id){

    	$data['feature'] = $this->db->where('single_feature_id', $id)->get('single_feature')->row();
    	$data['feature_option'] = $this->db->where('single_feature_id', $data['feature']->single_feature_id)->get('single_option')->result();

    	$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/edit_feature', $data);
		$this->load->view('dashboard/footer');
    }

    public function edit_single_feature(){
    
    	$this->form_validation->set_rules('feature_category', 'feature Title', 'required');
		$this->form_validation->set_rules('feature_category_ar', 'feature Title arabic', 'required');
		$this->form_validation->set_rules('input_type', 'input type', 'required');

		$feature_category = $this->input->post('feature_category');
		$feature_category_ar = $this->input->post('feature_category_ar');
		$input_type = $this->input->post('input_type');
		$option_maker_ar = $this->input->post('option_maker_ar');
		$option_maker = $this->input->post('option_maker');
		$single_feature_id = $this->input->post('single_feature_id');

		if($input_type == 'text'){
			$data = array(

				'single_feature_title'=>$feature_category,
				'single_feature_title_ar'=>$feature_category_ar,
				'single_feature_input_type'=>$input_type

			);

			if($this->db->where('single_feature_id', $single_feature_id)->update('single_feature', $data)){
				echo json_encode(array('done'=>'Feature has been added Successfully'));
			}else{
				echo json_encode(array('error'=>'somthing went wrong'));
			}
		}else if($input_type == 'dropdownlist'){
			
			$data = array(

				'single_feature_title'=>$feature_category,
				'single_feature_title_ar'=>$feature_category_ar,
				'single_feature_input_type'=>$input_type

			);

			if($this->db->where('single_feature_id', $single_feature_id)->update('single_feature', $data)){

				if(!empty($option_maker_ar)){
					if($this->db->where('single_feature_id', $single_feature_id)->delete('single_option')){
						foreach(array_combine($option_maker_ar, $option_maker) as $option_ar => $option_en){
							
							$feature_option = array(
								'single_option_title'=>$option_en,
								'single_option_title_ar'=>$option_ar,
								'single_feature_id'=>$single_feature_id
							);

							if($this->db->insert('single_option', $feature_option)){
							}
						}
						echo json_encode(array('done'=>'Feature has been added Successfully'));
					}
				}
			}
		}
    }

    public function all_feature_without_category(){

    	$data['features'] = $this->db->get('single_feature')->result();
    	$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/all_feature_without_category', $data);
		$this->load->view('dashboard/footer');
    }

    public function add_feature(){

    	$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/add-feature');
		$this->load->view('dashboard/footer');
    }

    public function choose_feature(){

    	$data['categories'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();
    	$data['features'] = $this->db->get('single_feature')->result();
    	$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/choose-feature', $data);
		$this->load->view('dashboard/footer');
    }

    public function create_feature(){

		$this->form_validation->set_rules('feature_category', 'feature Title', 'required');
		$this->form_validation->set_rules('feature_category_ar', 'feature Title arabic', 'required');
		$this->form_validation->set_rules('input_type', 'input type', 'required');

		$feature_category = $this->input->post('feature_category');
		$feature_category_ar = $this->input->post('feature_category_ar');
		$input_type = $this->input->post('input_type');
		$option_maker_ar = $this->input->post('option_maker_ar');
		$option_maker = $this->input->post('option_maker');

		if($input_type == 'text'){
			$data = array(

				'single_feature_title'=>$feature_category,
				'single_feature_title_ar'=>$feature_category_ar,
				'single_feature_input_type'=>$input_type

			);

			if($this->db->insert('single_feature', $data)){
				echo json_encode(array('done'=>'Feature has been added Successfully'));
			}else{
				echo json_encode(array('error'=>'somthing went wrong'));
			}
		}else if($input_type == 'dropdownlist'){
			
			$data = array(

				'single_feature_title'=>$feature_category,
				'single_feature_title_ar'=>$feature_category_ar,
				'single_feature_input_type'=>$input_type

			);

			if($this->db->insert('single_feature', $data)){

				$last_id = $this->db->insert_id();
		
				foreach(array_combine($option_maker_ar, $option_maker)as $option_ar => $option_en){
					
					$feature_option = array(
						'single_option_title'=>$option_en,
						'single_option_title_ar'=>$option_ar,
						'single_feature_id'=>$last_id
					);
					if($this->db->insert('single_option', $feature_option)){
					}
				}
				echo json_encode(array('done'=>'Feature has been added Successfully'));
				
			}
		}
    }

    public function create_permission_view(){

    	$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/create_permission_view');
		$this->load->view('dashboard/footer');
	}

	public function all_created_permission(){


		$data['all_permission'] = $this->db->get('permissions')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/all_created_permission', $data);
		$this->load->view('dashboard/footer');
	}

	public function create_permission(){

		if(!empty($this->input->post())){

			$data = array(

				'permission_ar'=> $this->input->post('per_arabic'), 
				'permission_en'=> $this->input->post('per_english'), 
				'per_type'=> $this->input->post('per_type'), 
				'vat_coin'=> $this->input->post('vat_coin')

			);


			if($this->db->insert('permissions', $data)){
				echo json_encode(array('done'=>'permission has been added successfully'));
			}else{
				echo json_encode(array('error'=>'somthing went wrong'));
			}
		}else{

			echo json_encode(array('error'=>'somthing went wrong'));

		}
	}

	public function edit_created_permission_view(){

			$data = array(

				'permission_ar'=> $this->input->post('per_arabic'), 
				'permission_en'=> $this->input->post('per_english'), 
				'per_type'=> $this->input->post('per_type'), 
				'vat_coin'=> $this->input->post('vat_coin')

			);


			if($this->db->where('per_id', $this->input->post('per_id'))->update('permissions', $data)){
				echo json_encode(array('done'=>'permission has been added successfully'));
			}else{
				echo json_encode(array('error'=>'somthing went wrong'));
			}

			
	}

	public function edit_created_permission($id){
		$data['permission_row'] = $this->db->where('per_id', $id)->get('permissions')->row();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/edit_created_permission_view', $data);
		$this->load->view('dashboard/footer');
	}
	
	public function delete_permission(){

		$per_id = $this->input->post('per_id');

		if($this->db->where('per_id', $per_id)->delete('permission')){
			echo json_encode(array('done'=>'permission has been deleted'));
		}else{
			echo json_encode(array('error'=>'permission has been deleted'));
		}
	}

	public function create_user_view(){

	}

	public function create_user(){

	}


	public function choose_user_permission_view(){

	}

	public function choose_user_permission(){

	}



	public function get_vatrena_priority()
	{
		$SelectXor=$this->input->post('SelectXor');
		$vatrena_priority=$this->db->where('vatrena_id', $SelectXor)->get('vatrena_keys_category')->row('priority');

		$priority='<div class="form-group m-form__group">
						<label for="message-text" class="form-control-label">
							priority:
						</label>
						<input type="text" class="form-control m-input m-input--solid" name="priority" value="'.$vatrena_priority.'">
					</div>';

		echo json_encode(array('priority'=> $priority));
	}	


	public function get_vatrena_keyword_priority()
	{
		$SelectXor=$this->input->post('SelectXor');
		$vatrena_priority=$this->db->where('vatrena_id', $SelectXor)->get('vatrena_keys_keyword')->row('priority');

		$priority='<div class="form-group m-form__group">
						<label for="message-text" class="form-control-label">
							priority:
						</label>
						<input type="text" class="form-control m-input m-input--solid" name="priority" value="'.$vatrena_priority.'">
					</div>';

		echo json_encode(array('priority'=> $priority));
	}

	public function active_vatrena_comp(){
    	$comp_id = $this->input->post('comp_id');
    	$is_active  = $this->input->post('is_active');

    	if($is_active == 1){
    		$is_active = 0;
    	}else if($is_active == 0){
    		$is_active = 1;
    	}

    	if($this->db->where('companies_id', $comp_id)->update('companies', array('active'=>$is_active))){
    		echo json_encode(array('done'=>'vatrena has been activated'));
    	}
    }
	
	public function get_all_ads(){

		$data['ads']=$this->db->get('ad_system')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/all_ads', $data);
		$this->load->view('dashboard/footer');
	}

	public function edit_ad_view($id){
		$data['cat_keywords'] = $this->db->where('is_category', 1)->get('cat_keywords')->result();		
		$data['keywords'] = $this->db->where('is_category', 0)->get('cat_keywords')->result();
		$data['brands'] = $this->db->get('brand')->result();
		$data['ads']=$this->db->where('ad_id', $id)->get('ad_system')->row();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/navbar');
		$this->load->view('dashboard/edit-ads', $data);
		$this->load->view('dashboard/footer');
	}

	public function delete_ads()
	{
		
		$ad_id = $this->input->post('id');

		$ad_system = $this->db->where('ad_id', $ad_id)->delete('ad_system');

		if($ad_system){
			echo json_encode(array('done'=>'ad has been deleted'));
		}else{
			echo json_encode(array('error'=>'something went wrong'));
		}

	}

	public function edit_ad_maker()
	{


		// echo '<pre>';
		// 	print_r($_POST);
		// 	print_r($_FILES);
		// echo '</pre>';
		header("Content-Type: application/xml; charset=utf-8");
		$this->load->library('upload');

		$ad_name = $this->input->post('ad_name');
		$horivert = $this->input->post('horivert');
		$ad_link = $this->input->post('ad_link');
		$category = $this->input->post('category');
		$category_count_prioirty = $this->input->post('category_count_prioirty');
		$keyword = $this->input->post('keyword');
		$keyword_count_prioirty = $this->input->post('keyword_count_prioirty');
		$brand = $this->input->post('brand');
		$brand_count_prioirty = $this->input->post('brand_count_prioirty');
		$clickTime = $this->input->post('clickTime');
		$per_click = $this->input->post('per_click');
		$photo_link = $_FILES['ad_photo']['name'];
		$ad_id=$this->input->post('ad_id');
		$ad_photo_hidden= $this->input->post('ad_photo_hidden');
		//if

		$photo = $_FILES;		
		if(!empty($_FILES['ad_photo']['name'])){
			$_FILES['ad_photo']['name']= $photo['ad_photo']['name'];
	        $_FILES['ad_photo']['type']= $photo['ad_photo']['type'];
	        $_FILES['ad_photo']['tmp_name']= $photo['ad_photo']['tmp_name'];
	        $_FILES['ad_photo']['error']= $photo['ad_photo']['error'];
	        $_FILES['ad_photo']['size']= $photo['ad_photo']['size'];
	        $this->upload->initialize($this->set_upload_options());
				        
	        if($this->upload->do_upload('ad_photo')){

	        	$ad_fullname = $this->upload->data('file_name');

	        
	        	$add=array(
					'name'=>$ad_name,
					'photo'=>$this->upload->data('file_name'),
					'link'=>$ad_link,
					'category'=>$category,
					'keyword'=>$keyword,
					'brand'=>$brand,
					'category_pos'=>$category_count_prioirty,
					'keyword_pos'=>$keyword_count_prioirty,
					'brand_pos'=>$brand_count_prioirty,
					'per_what'=>$clickTime, // 1 per_click, 2 per_time
					'per_what_answer'=>$per_click, // peranwer
					'ad_type'=>$horivert, //hori-> 1 , vert 2 
				);

				if($this->db->where('ad_id', $ad_id)->update('ad_system', $add)){
	    		}else{
	    			$logo_name = 'nope';
	    		}
	    	}
			echo json_encode(array('done'=>'ad has been generated'));
		}else{
			if(!empty($ad_photo_hidden)){

	        	$add=array(
					'name'=>$ad_name,
					'photo'=>$ad_photo_hidden,
					'link'=>$ad_link,
					'category'=>$category,
					'keyword'=>$keyword,
					'brand'=>$brand,
					'category_pos'=>$category_count_prioirty,
					'keyword_pos'=>$keyword_count_prioirty,
					'brand_pos'=>$brand_count_prioirty,
					'per_what'=>$clickTime, // 1 per_click, 2 per_time
					'per_what_answer'=>$per_click, // peranwer
					'ad_type'=>$horivert, //hori-> 1 , vert 2 
				);

				if($this->db->where('ad_id', $ad_id)->update('ad_system', $add)){
	    			$logo_name = 'nope';
	    		}else{
	    			$logo_name = 'nope';
	    		}
			}
			echo json_encode(array('done'=>'you just edit this ad'));
		}
	}

}



// companies_id
// company_name_ar
// company_name_en
// logo
// area
// mohafaza
// companyType
// city
// district
// lat
// lng
// adress_ar
// adress_en
// email
// password
// company_about
// employee_name
// employee_job
// employee_phone
// company_mobile
// company_telephone
// company_about_en
// website
// featured_item