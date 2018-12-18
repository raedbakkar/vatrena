<?php 

function limit_text($text, $limit) {
      
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
}

function truncateString($str, $chars, $to_space, $replacement="...") {
  if($chars > strlen($str)) return $str;

  $str = substr($str, 0, $chars);
  $space_pos = strrpos($str, " ");
  if($to_space && $space_pos >= 0) 
      $str = substr($str, 0, strrpos($str, " "));

  return($str . $replacement);
}

function category_options($categories){
  foreach($categories as $category): 
    echo '<option value="'.$category->keywords_id.'" data-tokens="'.$category->keyword_title.'">'.$category->keyword_title.'</option>';
  endforeach;
}

function return_category_id($id){
  $CI =& get_instance();

  $categories = $CI->db->select('keywords_id,keyword_title')->where('cat_dad_id', $id)->join('cat_keywords','categories_related.cat_child_id = cat_keywords.keywords_id')->get('categories_related')->result(); 
  // echo '<pre>';
  //   print_r($childs);
  // echo '</pre>';
  category_options($categories);

  // category_options($categories);
}


function droper($dropdown_name, $id=null){

    $CI =& get_instance();

    $CI->load->model('Vatrena_model');

    switch ($dropdown_name) {
      case 'CompanyType':
          $CI->Vatrena_model->get_dropdown_by_table_name('cat_keywords','keywords_id,keyword_title' ,'keywords_id', $id);
          break;
      case 'Mohafaza':
          $CI->Vatrena_model->get_dropdown_by_table_name('governorate','gover_id,gover_title_ar' ,'gover_id', $id);
          break;
      case 'Area':
          $CI->Vatrena_model->get_dropdown_by_table_name('mohafazat','moha_id,moha_title_ar' ,'moha_id', $id);
          break;
      case 'City':
          $CI->Vatrena_model->get_dropdown_by_table_name('city','city_id,city_name_ar' ,'city_id', $id);
          break;
      case 'District':
          $CI->Vatrena_model->get_dropdown_by_table_name('district','district_id,district_title_ar' ,'district_id', $id);
          break;
     
    }

}


function featured($id, $table, $field_where){

  $CI =& get_instance();

  $CI->load->model('Vatrena_model');
  
  $case = $CI->db->where($field_where, $id)->get($table)->row('featured_item');

  if($case == 1){

      echo '<option class="selected" data-selected="نعم" value="1">نعم</option>'; 
      echo '<option value="0">لا</option>'; 
  
  }else{

      echo '<option class="selected" data-selected="لا" value="0">لا</option>';
      echo '<option value="1">نعم</option>'; 

  
  }

}


function featured_generator($id, $table_name){

    switch ($table_name) {
      case 'category':
        featured($id, 'cat_keywords', 'keywords_id');
        break;      

      case 'items':
        featured($id, 'companies', 'companies_id');
        break;      
    }
}


function Branches($id){
  
  $CI =& get_instance();

  $CI->load->model('Vatrena_model'); 

  $branches = $CI->Vatrena_model->get_all_branch($id); 

  // echo '<pre>';
  //   print_r($branches);
  // echo '</pre>';

  foreach($branches as $branch):

    echo  '<div class="row">
            <div class="col-md-6">
              <button type="submit" class="floater btn m-btn--pill m-btn--air btn-danger">
                <i class="la la-trash"></i>
                Delete
              </button>
              <button type="submit" class="btn m-btn--pill m-btn--air btn-info floater">
                <i class="la la-edit"></i>
                Edit
              </button>
            </div>
            <div class="col-md-6">
              <span class="floater-right">'.$branch->vatrena_name.'</span>  
            </div>                            
          </div>';

  endforeach;

}


function get_user_type($id){
    
    if($id){
      $CI =& get_instance();
      return $CI->db->where('keywords_id', $id)->get('cat_keywords')->row('keyword_title');
    }
}


function get_area_name($id){
    
    if($id){
      $CI =& get_instance();
      if(is_arabic()){
        return $CI->db->where('gover_id', $id)->get('governorate')->row('gover_title_ar');
      }else{
        return $CI->db->where('gover_id', $id)->get('governorate')->row('gover_title');
      }

    }
}

function get_moha_name($id){
    
    if($id){
      $CI =& get_instance();
      if(is_arabic()){
        return $CI->db->where('moha_id', $id)->get('mohafazat')->row('moha_title_ar');
      }else{
        return $CI->db->where('moha_id', $id)->get('mohafazat')->row('moha_title');
      }
    }


}


function get_city_name($id){
    
    if($id){
      $CI =& get_instance();
      if(is_arabic()){
        return $CI->db->where('city_id', $id)->get('city')->row('city_name_ar');
      }else{
        return $CI->db->where('city_id', $id)->get('city')->row('city_name');
      }
    }


}


function get_dist_name($id){
    
    if($id){
      $CI =& get_instance();
      if(is_arabic()){
        return $CI->db->where('district_id', $id)->get('district')->row('district_title_ar');
      }else{
        return $CI->db->where('district_id', $id)->get('district')->row('district_title');
      }
    }


}

function selected_keyword($key_id, $vat_id, $type){
   
    $CI =& get_instance();
    
    if($type == 'keyword'){
	    if($vat_id && $key_id){
	      $keyword = $CI->db->where('vatrena_keys_keyword.vatrena_id', $vat_id)->where('vatrena_keys_keyword.keyword_id', $key_id)->join('cat_keywords','cat_keywords.keywords_id = vatrena_keys_keyword.keyword_id')->get('vatrena_keys_keyword')->result();
		    if(!empty($keyword)){
		      	echo 'selected="selected"';
		    }else{
		      	echo '';
		    }
	    }
	}else{

		if($vat_id && $key_id){
	      $category = $CI->db->where('vatrena_keys_category.vatrena_id', $vat_id)->where('vatrena_keys_category.category_id', $key_id)->join('cat_keywords','cat_keywords.keywords_id = vatrena_keys_category.category_id')->get('vatrena_keys_category')->result();
		    if(!empty($category)){
		      	echo 'selected="selected"';
		    }else{
		      	echo '';
		    }
	    }

	}
}


function selected_keyword_by_brand_id($key_id, $brand_id){
   
    $CI =& get_instance();
    
    if($brand_id && $key_id){
      $keyword = $CI->db->where('brand_keys_category.brand_id', $brand_id)->where('brand_keys_category.keyword_id', $key_id)->join('cat_keywords','cat_keywords.keywords_id = brand_keys_category.keyword_id')->get('brand_keys_category')->result();
      if(!empty($keyword)){
          echo 'selected="selected"';
      }else{
          echo '';
      }
    }
}

function existed_category($key_id, $brand_id){

    $CI =& get_instance();

    if($brand_id && $key_id){
      $keyword = $CI->db->where('brand_keys_category.brand_id', $brand_id)->where('brand_keys_category.keyword_id', $key_id)->join('cat_keywords','cat_keywords.keywords_id = brand_keys_category.keyword_id')->get('brand_keys_category')->result();
      if(!empty($keyword)){
          return true;
      }else{
          return false;
      }
    }
}

function selected_keyword_by_dad_id($key_id, $dad_id, $type){
   
    $CI =& get_instance();
    
    if($type == 'keyword'){
      if($vat_id && $key_id){
        $keyword = $CI->db->where('vatrena_keys_keyword.vatrena_id', $vat_id)->where('vatrena_keys_keyword.keyword_id', $key_id)->join('cat_keywords','cat_keywords.keywords_id = vatrena_keys_keyword.keyword_id')->get('vatrena_keys_keyword')->result();
        if(!empty($keyword)){
            echo 'selected="selected"';
        }else{
            echo '';
        }
      }
  }else{

    if($key_id && $dad_id){
        $category = $CI->db->where('categories_related.cat_child_id', $key_id)->where('categories_related.cat_dad_id', $dad_id)->join('cat_keywords','cat_keywords.keywords_id = categories_related.cat_dad_id')->get('categories_related')->result();
        if(!empty($category)){
            echo 'selected="selected"';
        }else{
            echo '';
        }
      }

  }
}


function selected_time($time_value, $vat_id, $time_exactly){
   
    $CI =& get_instance();
    
    switch ($time_exactly) {
    	case 'starting_hour':
				$timer = $CI->db->where('companies_id', $vat_id)->get('companies')->row($time_exactly);
    			if($timer == $time_value){
    				return 'selected="selected"';
    			}else{
    				return '';
    			}
    		break;
    	case 'ending_hour':
    			$timer = $CI->db->where('companies_id', $vat_id)->get('companies')->row($time_exactly);
    			if($timer == $time_value){
    				return 'selected="selected"';
    			}else{
    				return '';
    			}
    		break;
    	case 'starting_hour_night':
    			$timer = $CI->db->where('companies_id', $vat_id)->get('companies')->row($time_exactly);
    			if($timer == $time_value){
    				return 'selected="selected"';
    			}else{
    				return '';
    			}
    		break;
    	case 'ending_hour_night':
    			$timer = $CI->db->where('companies_id', $vat_id)->get('companies')->row($time_exactly);
    			if($timer == $time_value){
    				return 'selected="selected"';
    			}else{
    				return '';
    			}
    		break;
    }

}

function fetch_timer($time_value, $vat_id, $time_exactly){

  $times = array(

    '1 am',
    '2 am',
    '3 am',
    '4 am',
    '5 am',
    '6 am',
    '7 am',
    '8 am',
    '9 am',
    '10 am',
    '11 am',
    '12 am',
    '1 pm',
    '2 pm',
    '3 pm',
    '4 pm',
    '5 pm',
    '6 pm',
    '7 pm',
    '8 pm',
    '9 pm',
    '10 pm',
    '11 pm',
    '12 pm'
  );

  switch ($time_exactly) {
    case 'starting_hour':
        foreach($times as $time => $time_value){
          if($time_value != null || $vat_id != null){
            echo '<option value="'.$time_value.'"'.selected_time($time_value, $vat_id, $time_exactly).'>'.$time_value.'</option>';
          }else{
            echo '<option value="'.$time_value.'">'.$time_value.'</option>';
          }
        }
      break;
    case 'ending_hour':
        foreach($times as $time => $time_value){
         if($time_value != null || $vat_id != null){
            echo '<option value="'.$time_value.'"'.selected_time($time_value, $vat_id, $time_exactly).'>'.$time_value.'</option>';
          }else{
            echo '<option value="'.$time_value.'">'.$time_value.'</option>';
          }
				}
			break;
		case 'starting_hour_night':
			foreach($times as $time => $time_value){
					if($time_value != null || $vat_id != null){
            echo '<option value="'.$time_value.'"'.selected_time($time_value, $vat_id, $time_exactly).'>'.$time_value.'</option>';
          }else{
            echo '<option value="'.$time_value.'">'.$time_value.'</option>';
          }
				}
			break;
		case 'ending_hour_night':
			    foreach($times as $time => $time_value){
					if($time_value != null || $vat_id != null){
            echo '<option value="'.$time_value.'"'.selected_time($time_value, $vat_id, $time_exactly).'>'.$time_value.'</option>';
          }else{
            echo '<option value="'.$time_value.'">'.$time_value.'</option>';
          }
				}
			break;
	}

}

function explode_holidays($holidays){

 	$days = array('saturday', 'sunday', 'monday', 'tuesday', 'wendosday', 'thursday', 'friday');

	if(!empty($holidays)){

		$holidays_exploder = explode('-', $holidays);
		foreach($days as $day){
			echo '<option value="'. $day .'"'. (in_array($day, $holidays_exploder) ? 'selected="selected"':'') .'">'. $day .'</option>';
		}

	}else{

    foreach($days as $day){
      echo '<option value="'.$day.'">'. $day .'</option>';
    }
  
  }


}

function photo_category($selected_id=1){

	$CI =& get_instance();

	$photo_category = $CI->db->get('photo_category')->result();

	 foreach($photo_category as $Category):
		echo '<option value="'.$Category->photo_cat_id.'" '.(($Category->photo_cat_id == $selected_id) ? 'selected="selected"' :'').'>'.$Category->photo_cat_name.'</option>';
	 endforeach ;
}

function isset_keyword($keyword){

	$CI =& get_instance();

	if($keyword){
		$isset_keyword = $CI->db->where('keyword_title', $keyword)->get('cat_keywords')->row('keyword_title');
		if(!empty($isset_keyword)){
			return true;
		}else{
			return false;
		}
	}
}

function isset_keyword_id($keyword_id, $user_id){

	$CI =& get_instance();

	if($keyword_id){
		$isset_keyword = $CI->db->where('keyword_id', $keyword_id)->where('vatrena_id', $user_id)->get('vatrena_keys_keyword')->row('keyword_id');
		if(!empty($isset_keyword)){
			return true;
		}else{
			return false;
		}
	}
}

function missing_keyword_checker($new_keyword_ids, $current_keyword_ids, $user_id){

    $CI =& get_instance();

    $current_listof_keywords = array();
    foreach($current_keyword_ids as $current_keyword_id){
      array_push($current_listof_keywords, $current_keyword_id->keyword_id);
    }

    foreach($current_listof_keywords as $keys){
       if(in_array($keys, $new_keyword_ids)){
          continue;
          // echo 'we dont want to delete CI key : '.$keys.'<br />';
       }else{
          // echo 'we  want to delete CI key : '.$keys.'<br />';
          $CI->db->where('vatrena_id', $user_id)->where('keyword_id', $keys)->delete('vatrena_keys_keyword');
       }
    }

}


function isset_category_id($category_id, $user_id){
	$CI =& get_instance();

	if($category_id && $user_id){
		$isset_category = $CI->db->where('category_id', $category_id)->where('vatrena_id', $user_id)->get('vatrena_keys_category')->row('vat_key_id');
		if(!empty($isset_category)){
			return true;
		}else{
			return false;
		}
	}
}


function video_converter($video){
	//https://www.youtube.com/watch?v=w_RMmrsUZxc
	//https://www.youtube.com/embed/w_RMmrsUZx
	$video_exploder = explode('=', $video);


	if(!empty($video_exploder[1])){
		$embed_video = 'https://www.youtube.com/embed/' . $video_exploder[1] . '';
		return $embed_video;
	}else{
		return $video;
	}

	

}


function photo_category_name($category){
	$CI =& get_instance();

	return $CI->db->where('photo_cat_id', $category)->get('photo_category')->row('photo_cat_name');

}

function time_handler($starting_hour, $ending_hour, $holidays){

	$days = array('satarday'=>'السبت', 'sunday'=>'الأحد', 'monday'=>'الأئنين', 'tuesday'=>'الثلثاء', 'wendosday'=>'الاربعاء', 'thursday'=>'الخميس', 'friday'=>'الجمعه');

	if($starting_hour && $ending_hour){
		echo'<li>
          	  <span>كل يوم من الساعه :</span>
              '.$starting_hour.'   '.$ending_hour.'
     	   	</li>';
	}


  if(!empty($holidays)){
	  $holimoly = explode('-', $holidays);

  	$holi = array();
  	foreach($holimoly as $moly){
  		
  		array_push($holi, $days[$moly]);

  	}


  	$hol=implode('-', $holi);

      echo'<li>
      		مغلق
          	<span>:'.$hol.' </span>
      	</li>';
  }
}

function time_handler_night($starting_hour_night, $ending_hour_night, $holidays){

	$days = array('satarday'=>'السبت', 'sunday'=>'الأحد', 'monday'=>'الأئنين', 'tuesday'=>'الثلثاء', 'wendosday'=>'الاربعاء', 'thursday'=>'الخميس', 'friday'=>'الجمعه');

	if($starting_hour_night && $ending_hour_night){
		echo'<li>
          	  <span>كل يوم من الساعه :</span>
              '.$starting_hour_night.'  '.$ending_hour_night.'
     	   	</li>';
	}


  if(!empty($holidays)){
	  
    $holimoly = explode('-', $holidays);
   
  	$holi = array();
  	foreach($holimoly as $moly){
  		
  		array_push($holi, $days[$moly]);

  	}


  	$hol=implode('-', $holi);

      echo'<li>
      		مغلق
          	<span>:'.$hol.' </span>
      	</li>';
  }

}


function pick_first_category($vatrena_id){
	$CI =& get_instance();

	$category_id = $CI->db->where('vatrena_id',$vatrena_id)->order_by('vat_key_id','ASC')->get('vatrena_keys_category')->row('category_id');


  if(is_arabic()){
    return $CI->db->where('keywords_id', $category_id)->get('cat_keywords')->row('keyword_title');
	}elseif(!$CI->session->userdata('lang')){
    return $CI->db->where('keywords_id', $category_id)->get('cat_keywords')->row('keyword_title');
  }else{
    return $CI->db->where('keywords_id', $category_id)->get('cat_keywords')->row('cat_keywords_en');
  }
}

function get_all_category($company_id, $type){

  $CI =& get_instance();

  $categories = $CI->db->join('cat_keywords', 'vatrena_keys_category.category_id = cat_keywords.keywords_id')->where('vatrena_keys_category.vatrena_id', $company_id)->get('vatrena_keys_category')->result();

  if(!empty($categories)){

    $category = array();
    $category_links = array();

    foreach ($categories as $category_ex) {
      array_push($category, $category_ex->keyword_title);
      $category_link = '<a class="cat-links"  href="'.base_url().'finder?page=1&guide_search_input='.$category_ex->keyword_title.'&area=&moha=&city=&district=&near_me=">'.$category_ex->keyword_title.'</a>';
      array_push($category_links, $category_link);
    }


    $count_categories = count($category);

    $main_category =  $category[$count_categories - 1];


    

    switch ($type) {
      case 'main_category':
        echo $category[$count_categories - 1];
        break;
      
      case 'count':
        echo '+ '.$count_categories;
        break;

      case 'all_categories':
        $category = implode(' / ', $category_links);
        echo $category;
        break;

    }
  }

}


function get_all_keywords($company_id, $type){

  $CI =& get_instance();

  $keywords = $CI->db->join('cat_keywords', 'vatrena_keys_keyword.keyword_id = cat_keywords.keywords_id')->where('vatrena_keys_keyword.vatrena_id', $company_id)->get('vatrena_keys_keyword')->result();
  if(isset($keywords[0]->keyword_title)){

    if($type == 'keywords'){

      if(!empty($keywords)){

        $keyword = array();
        $keyword_links = array();

        foreach ($keywords as $keyword_ex) {
          
          array_push($keyword, $keyword_ex->keyword_title);
          $keyword_link = '<a class="cat-links"  href="'.base_url().'finder?page=1&guide_search_input='.$keyword_ex->keyword_title.'&area=&moha=&city=&district=&near_me=">'.$keyword_ex->keyword_title.'</a>';
          array_push($keyword_links, $keyword_link);
        }

        echo implode(' / ', $keyword_links);

      }
    }elseif($type == 'first'){
       echo $keywords[0]->keyword_title;
    }else{

      if(!empty($keywords)){

        echo '+ '.count($keywords);

      }

    }
  }
  
}

function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}

function checker($checker){

  if($checker && $checker == 1){
    echo 'checked';
  }else{
    echo '';
  }

}

function check_value_dist($option, $dist_id){
  $CI =& get_instance();
  if($dist_id){
    $city_id = $CI->db->where('district_id', $dist_id)->get('district')->row('city_id');
    if($city_id == $option){
      echo 'selected="selected"';
    }else{
      echo '';
    }
  }else{
    echo '';
  }
}

function check_value_city($option, $city_id){
  $CI =& get_instance();
  if($city_id){
    $moha_id = $CI->db->where('city_id', $city_id)->get('city')->row('moha_id');
    if($moha_id == $option){
      echo 'selected="selected"';
    }else{
      echo '';
    }
  }else{
    echo '';
  }
}

function check_value_moha($option, $moha_id){
  $CI =& get_instance();
  if($moha_id){
    $gover_id = $CI->db->where('moha_id', $moha_id)->get('mohafazat')->row('governorate_id');
    if($gover_id == $option){
      echo 'selected="selected"';
    }else{
      echo '';
    }
  }else{
    echo '';
  }
}

function get_branch_phone_number($id){
  $CI = get_instance();
  if($id){
    $number = $CI->db->where('vatrena_id', $id)->get('phone_numbers')->result();
    foreach($number as $numbers){

      echo '<li class="phones">
              <span>الموبايل: </span>
              <a href="tel:'.$numbers->phone_number.'">01223819057</a>
          </li>';
    }

  }
}

function get_branch_telephone($id){
  $CI = get_instance();
  if($id){
    
    
    $telephone_comp = $CI->db->where('companies_id', $id)->get('companies')->row('company_telephone');


      if(!empty($telephone_comp)){

        $data['arrayTele'] = array();

        $telephone_with_code = explode(',', $telephone_comp);

        foreach($telephone_with_code as $tele_code){
          $tele_code_spliter = explode('-', $tele_code);
          if(isset($tele_code_spliter[1]) && isset($tele_code_spliter[0])){

            $tele_composer[$tele_code_spliter[0]]=$tele_code_spliter[1];
            array_push($data['arrayTele'], $tele_composer);

          }
              if($data['arrayTele'])foreach($data['arrayTele'] as $code => $number): 
                  foreach($number as $val_number => $number): 
                    echo '<li class="phones">
                      <span>التليفون الأرضى: </span>
                      <a href="tel:'.$number.'">'.$number.'</a>
                    </li>';
                  endforeach;
                endforeach;

          }

        }
      }else{
        $data['arrayTele'] = array();
      }

    
  }

function attr_name($title){
    return str_replace(' ','_', $title);
}


function get_attr($feat_id){

    $CI =& get_instance();
    
    $feat = $CI->db->where('f_option_feature_id', $feat_id)->get('feature_options')->result();

    return $CI->load->view('dashboard/gene-feature-options', array('feat'=> $feat), true);
      
}

function get_attr_edit($feat_id, $ad_id){

    $CI =& get_instance();
    
    $feat = $CI->db->where('f_option_feature_id', $feat_id)->get('feature_options')->result();

    $feat_answer = $CI->db->where('ad_id', $ad_id)->where('feature_key_id', $feat_id)->get('feaures_answer')->row();

    return $CI->load->view('dashboard/gene-feature-options-edit', array('feat'=> $feat,'ans'=>$feat_answer), true);
      
}

  
function get_value_feature_answer($feat_id, $ad_id){
    $CI =& get_instance();
    
    $feat = $CI->db->where('f_option_feature_id', $feat_id)->get('feature_options')->result();

    return $CI->db->where('ad_id', $ad_id)->where('feature_key_id', $feat_id)->get('feaures_answer')->row('feature_value');
}

function get_category_by_id($keyword_id){

  $CI =& get_instance();

  return $CI->db->where('keywords_id', $keyword_id)->get('cat_keywords')->row('keyword_title');

}

function get_brand_by_id($brand_id){

  $CI =& get_instance();

  return $CI->db->where('brand_id', $brand_id)->get('brand')->row('brand_title');

}

function get_single_feature_title_by_id($feat_id){

  $CI =& get_instance();

  return $CI->db->where('single_feature_id', $feat_id)->get('single_feature')->row('single_feature_title_ar');

}

function get_single_option_title_by_id($option_id){

  $CI =& get_instance();

  return $CI->db->where('single_option_id', $option_id)->get('single_option')->row('single_option_title_ar');

}

function get_vatrena_by_id($vatrena_id){

  $CI =& get_instance();

  return $CI->db->where('companies_id', $vatrena_id)->get('companies')->row('company_name_ar');

}


function after_discount($price, $ad_percentage){
   return $price - $price * ($ad_percentage / 100);
}


function photo_in_slider($slide, $last_id){
    
    $CI =& get_instance();

    $id = $CI->db->where('photo_id', $slide)->where('photo_product_id', $last_id)->get('photo_product')->row('photo_id');
    if($id){
        return true;
    }else{
    
        return false;
    }
}


function is_english(){

    $CI =& get_instance(); 

    if($CI->session->userdata('lang')){

      if($CI->session->userdata('lang') == 'en'){

        return true;

      }else{

        return false;
     
      }

    }else{
        return false;
    }
}

function is_arabic(){

    $CI =& get_instance(); 

    if($CI->session->userdata('lang')){

      if($CI->session->userdata('lang') == 'ar'){

        return true;

      }else{

        return false;
     
      }

    }else{

        return false;
    
    }

}

function get_attr_option($feature_id){
    
    $CI =& get_instance(); 

    $options = $CI->db->where('f_option_feature_id', $feature_id)->get('feature_options')->result();
    echo '<pre>';
      print_r($options);
    echo '</pre>';
    return $CI->load->view('site/attr_option', array('options'=>$options), true);
}

function get_feature_option($feature){

  $CI =& get_instance(); 

  $options = $CI->db->where('single_feature_id', $feature)->get('single_option')->result();  
  
  return $CI->load->view('dashboard/checkboxes', array('options'=>$options,'feature_id'=>$feature), true); 
  

}


function is_feature_exist($feature_id ,$category_id){
    
    $CI =& get_instance(); 

    $features = $CI->db->select('base_feature_id')->from('base_feature')->where('base_category_id', $category_id)->get()->result();  
      
    foreach($features as $feature){
        if($feature->base_feature_id == $feature_id){
           echo 'selected="selected"';
        }else{
           echo '';
        }
    }

    // return $CI->load->view('dashboard/checkboxes', array('options'=>$options,'feature_id'=>$feature), true); 

}

function get_category_by_base_id($base_id){
    
    $CI =& get_instance();

    return $CI->db->where('base_id', $base_id)->get('base_feature')->row('base_category_id');

}

function get_feature_option_edit($feature, $category_id){

    $CI =& get_instance(); 

    $options = $CI->db->where('single_feature_id', $feature)->get('single_option')->result();

    return $CI->load->view('dashboard/edit_checkboxes', array('options'=>$options,'feature_id'=>$feature,'category_id'=>$category_id), true); 
}


function is_option_exist($current_option, $feature_id, $category_id){

    $CI =& get_instance(); 

    $option = $CI->db->where('base_option_id', $current_option)->where('base_category_id', $category_id)->where('base_feature_id', $feature_id)->get('base_feature')->row();  
    
    if($option){
       echo 'data-option="'.$current_option.'" data-feature="'.$feature_id.'" value="'.$feature_id.','.$current_option.'"  data-category="'.$category_id.'"  data-check="marked" checked="checked"';
    }else{
       echo 'data-option="'.$current_option.'" data-feature="'.$feature_id.'"  data-category="'.$category_id.'"  data-check="unmark"';
    }
}

function is_feature_option_exist($val, $k, $categories){

    $CI =& get_instance();

    $categories = $CI->db->where('base_feature_id', $k)->where('base_option_id', $val)->where('base_category_id', $categories)->get('base_feature')->row();

    if($categories){
        return true;
    }else{
        return false;
    }

}

function get_all_feature_by_category_id($category_id){
    $CI =& get_instance();

    $features = $CI->db->select('base_feature_id')->where('base_category_id', $category_id)->group_by('base_feature_id')->get('base_feature')->result();

    $feature_container = array();
    foreach($features as $feature){

        array_push($feature_container, get_single_feature_title_by_id($feature->base_feature_id));

    }

    if(!empty($feature_container)){
      $features_imploded =  implode(',', $feature_container);
    }

    return $features_imploded;

}


function get_all_option_by_category_id($category_id){

    $CI =& get_instance();

    $options = $CI->db->select('base_option_id')->where('base_category_id', $category_id)->group_by('base_option_id')->get('base_feature')->result();

    $option_container = array();

    foreach($options as $option){

        array_push($option_container, get_single_option_title_by_id($option->base_option_id));

    }   

    $options_imploded = implode(',', $option_container); 

    return $options_imploded;

}

function no_dashes($name){
  if($name){
    return str_replace(' ','-', $name);
  }else{
    return 'product';
  }
}

function profile_name_dash($name){
  if($name){
    return str_replace(' ','-', $name);
  }else{
    return 'product';
  } 
}
// function try_company($try_company){

// }

 function is_night_shift($day, $holidays_array, $schedule_holidays, $schedule_starting_hour_night, $schedule_ending_hour_night){

  if($schedule_starting_hour_night != '' OR $schedule_ending_hour_night != '' OR $schedule_starting_hour_night != ' ' OR $schedule_ending_hour_night != ' '){
      return  '<td>
                '.(in_array(strtolower($day),$holidays_array) ? '<span class="label label-danger">Closed</span>':$schedule_starting_hour_night.' - '.$schedule_ending_hour_night).'
              </td>';
  }

}

function is_night_shift_th($id){
 
  $CI =& get_instance();

  $schedule = $CI->db->where('companies_id', $id)->get('companies')->row();

  if($schedule->starting_hour_night != '' OR $schedule->ending_hour_night != ''){
      return  '<th> '.(is_arabic() ? 'فترة مسائية' : 'P.M').'</th>';
  }
}

function trans_am_pm($value)
{
    if( str_replace(' ', '', $value) == '12am' )
      return is_arabic() ? '12 منتصف اليل' : '12 midnight';

    if( str_replace(' ', '', $value) == '12pm' )
      return is_arabic() ? '12 ظهراً' : '12 afternoon';

    if( strrpos($value, 'am') && is_arabic() )
      return str_ireplace('am', 'صباحاً', $value);
    if( strrpos($value, 'pm') && is_arabic() )
      return str_ireplace('pm', 'مساءاً', $value);

    return $value;
}

function vatrenas_places($id){ 
  $CI =& get_instance();

  $branches_chities = $CI->db->select('city')->where('parent', $id)->group_by('city')->get('companies')->result();

  // echo '<pre>';
  //   print_r($branches_chities);
  // echo '</pre>';
  // echo $CI->db->last_query();
  $cities_ids = array();
  foreach($branches_chities as $cities){
    array_push($cities_ids, $cities->city);
  }

  if(!empty($cities_ids))$cityOptions=$CI->db->where_in('city_id', $cities_ids)->get('city')->result();
  if(!empty($cityOptions)){

    $option='';
    foreach($cityOptions as $options){
      $option .= '<option value="'.$options->city_id.'">'.$options->city_name_ar.'</option>';
    }

    return $option;
  }

}

function is_logged_in(){



  $CI =& get_instance();



  $is_login = $CI->session->userdata('user_logged_in');

  $user_name = $CI->session->userdata('user_name');

  $user_id = $CI->session->userdata('user_id');

  if($is_login){

    $CI->load->view('site/nav-user', array('user_name'=>$user_name,'user_id'=>$user_id));

  }else{

    $CI->load->view('site/nav-not-logged-in');

  }

}

function is_login(){

   $CI =& get_instance(); 

   if($CI->session->userdata('user_logged_in')){

      return true;

   }else{

      return false;

   }

}

function get_albums_photos($alb_id){
   $CI =& get_instance();

   $album_photos=$CI->db->where('photo_category', $alb_id)->join('photo_desc','photo_desc.photo_id = photo.photo_id')->get('photo')->result();

   $photo_details = '';
   foreach($album_photos as $photo){
      $photo_details .= '<div class="photos"><img src="./assets/new_uploads/'.$photo->photo.'"><span class="p_desc">'.$photo->desc_en.'</span></div>';
   }

    return $photo_details;

}

function selected_related_brand($brand_id, $keyword_id){

  $CI =& get_instance();

  $keyword_related = $CI->db->where('related_keyword_id', $keyword_id)->where('related_brand_id', $brand_id)->get('keyword_brand_related')->row();

  if(!empty($keyword_related)){
    echo 'selected="selected"';
  }else{
    echo '';
  }

}

function brand_exist($brand, $keyword_id){

  $CI =& get_instance();

  $keyword_related = $CI->db->where('related_keyword_id', $keyword_id)->where('related_brand_id', $brand)->get('keyword_brand_related')->row();

  if($keyword_related){
    return true;
  }else{
    return false;
  }


} 

function selected_related_catKey($category_id, $keyword_id){
  $CI =& get_instance();

  $keycat_related = $CI->db->where('keyword_id', $keyword_id)->where('category_id', $category_id)->get('related_keyword_category')->row();

  if(!empty($keycat_related)){
    echo 'selected="selected"';
  }else{
    echo '';
  }
}


function category_exist($category, $keyword_id){
  
  $CI =& get_instance();

  $keyword_related = $CI->db->where('keyword_id', $keyword_id)->where('category_id', $category)->get('related_keyword_category')->row();

  if($keyword_related){
    return true;
  }else{
    return false;
  }


} 

function selected_related_compKey($brand_id, $vatrena_id){

  $CI =& get_instance();

  $compKey = $CI->db->where('brand_id', $brand_id)->where('company_id', $vatrena_id)->get('related_brand_vatrena')->row();

  if(!empty($compKey)){
    echo 'selected="selected"';
  }else{
    echo '';
  }

} 

function brand_company_exist($brand_id, $vatrena_id){
  
  $CI =& get_instance();

  $brand_related = $CI->db->where('brand_id', $brand_id)->where('company_id', $vatrena_id)->get('related_brand_vatrena')->row();

  if($brand_related){
    return true;
  }else{
    return false;
  }


}


function relative_categoies_brand($brand_id){

    $CI =& get_instance();

    $categories = $CI->db->select('keyword_id')->where('brand_id', $brand_id)->get('brand_keys_category')->result();

    $listof_category_id = array();
    foreach($categories as $category){
      array_push($listof_category_id, $category->keyword_id);
    }

    if(!empty($listof_brand_id)){

        $listof_category_title = array();
        $list_category_title=$CI->db->select('keyword_title')->where_in('keywords_id', $listof_category_id)->get('cat_keywords')->result();
        foreach($list_category_title as $title){
          array_push($listof_category_title, $title->keyword_title);
        } 

        return implode(',', $listof_category_title);
    }
}

 function get_relative_brand($companies_id){

    $CI =& get_instance();

    $brands = $CI->db->select('brand_id')->where('company_id', $companies_id)->get('related_brand_vatrena')->result();

    $listof_brand_id = array();
    foreach($brands as $brand){
      array_push($listof_brand_id, $brand->brand_id);
    }

    if(!empty($listof_brand_id)){

      $listof_brand_title = array();
      $list_brand_title=$CI->db->select('brand_title_ar')->where_in('brand_id', $listof_brand_id)->get('brand')->result();
      foreach($list_brand_title as $title){
        array_push($listof_brand_title, $title->brand_title_ar);
      } 

      return implode(',', $listof_brand_title);
    }
}

 function get_relative_keyword($companies_id){

    $CI =& get_instance();

    $keywords = $CI->db->select('keyword_id')->where('vatrena_id', $companies_id)->get('vatrena_keys_keyword')->result();

    $listof_keywords_id = array();
    foreach($keywords as $keyword){
      array_push($listof_keywords_id, $keyword->keyword_id);
    }


    if(!empty($listof_keywords_id)){

      $listof_keywords_title = array();
      $list_keyword_title=$CI->db->select('keyword_title')->where_in('keywords_id', $listof_keywords_id)->get('cat_keywords')->result();
      foreach($list_keyword_title as $title){
        array_push($listof_keywords_title, $title->keyword_title);
      } 

      return implode(',', $listof_keywords_title);

    }
}

function ad_hori_detecter($guide_search_input, $loop_pos){
  
  $CI =& get_instance();

  $category_search_id = $CI->db->where('is_category', 1)->where('keyword_title', $guide_search_input)->or_where('cat_keywords_en', $guide_search_input)->get('cat_keywords')->row('keywords_id');

  $template = '';
  if($category_search_id){
   
    $ad_data_by_category =$CI->db->where('ad_type', 1)->where('category', $category_search_id)->get('ad_system')->result();
    foreach($ad_data_by_category as $data_cate){
      if($loop_pos == $data_cate->category_pos){
        $template.='<div class="strip_all_tour_list wow fadeIn ad_clicker" data-wow-delay="0.4s" data-priorty="'.$data_cate->category_pos.'-'.$loop_pos.'" data-id="'.$data_cate->ad_id.'" data-link="'.$data_cate->link.'" data-ip="'.$_SERVER['REMOTE_ADDR'].'" data-per="'.$data_cate->per_what.'" data-count="'.$data_cate->per_what_answer.'">';
        $template.='<div class="row">';
        $template.='<div class="clearfix visible-xs-block"></div>';
        $template.='<div class="col-lg-12 col-md-12 col-sm-12 colorb">';
        $template.='<div class="s-maker">';
        $template.='<img src="assets/new_uploads/'.$data_cate->photo.'">';
        $template.='</div>';
        $template.='</div>';
        $template.='</div>';
        $template.='</div>';
      }else{
        continue;
      }

    }
    

    return $template;
  }

  $keyword_search_id = $CI->db->where('is_category', 0)->where('keyword_title', $guide_search_input)->or_where('cat_keywords_en', $guide_search_input)->get('cat_keywords')->row('keywords_id');

  if($keyword_search_id){
    $ad_data_by_keyword=$CI->db->where('ad_type', 1)->where('keyword', $keyword_search_id)->get('ad_system')->result();
    foreach($ad_data_by_keyword as $data_keyword){
      if($loop_pos == $data_keyword->keyword_pos){
        '<a href="javascript:void(0)" class="ad_clicker" data-id="'.$data_keyword->ad_id.'" data-link="'.$data_keyword->link.'" data-ip="'.$_SERVER['REMOTE_ADDR'].'" data-per="'.$data_keyword->per_what.'" data-count="'.$data_keyword->per_what_answer.'" target="_blank">';
        $template.='<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.4s" data-priorty="'.$data_keyword->category_pos.'-'.$loop_pos.'">';
        $template.='<div class="row">';
        $template.='<div class="clearfix visible-xs-block"></div>';
        $template.='<div class="col-lg-12 col-md-12 col-sm-12 colorb">';
        $template.='<div class="s-maker">';
        $template.='<img src="assets/new_uploads/'.$data_keyword->photo.'">';
        $template.='</div>';
        $template.='</div>';
        $template.='</div>';
        $template.='</div>';
        $template.='</a>';
      }else{
        continue;
      }

    }

    return $template;
  }

  $brand_search_id = $CI->db->where('brand_title', $guide_search_input)->or_where('brand_title_ar', $guide_search_input)->get('brand')->row('brand_id');

  if($brand_search_id){
    $ad_data_by_brand=$CI->db->where('ad_type', 1)->where('brand', $brand_search_id)->get('ad_system')->result();
    foreach($ad_data_by_brand as $data_brand){
      if($loop_pos == $data_brand->brand_pos){
        '<a href="javascript:void(0)" class="ad_clicker" data-id="'.$data_brand->ad_id.'" data-link="'.$data_brand->link.'" data-ip="'.$_SERVER['REMOTE_ADDR'].'" data-per="'.$data_brand->per_what.'" data-count="'.$data_brand->per_what_answer.'" target="_blank">';
        $template.='<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.4s" data-priorty="'.$data_brand->category_pos.'-'.$loop_pos.'">';
        $template.='<div class="row">';
        $template.='<div class="clearfix visible-xs-block"></div>';
        $template.='<div class="col-lg-12 col-md-12 col-sm-12 colorb">';
        $template.='<div class="s-maker">';
        $template.='<img src="assets/new_uploads/'.$data_brand->photo.'">';
        $template.='</div>';
        $template.='</div>';
        $template.='</div>';
        $template.='</div>';
        $template.='</a>';
      }else{
        continue;
      }

    }

    return $template;
  }

}

function ad_detective($guide_search_input){

  $CI =& get_instance();

  $category_search_id = $CI->db->where('is_category', 1)->where('keyword_title', $guide_search_input)->or_where('cat_keywords_en', $guide_search_input)->get('cat_keywords')->row('keywords_id');

  $template = '';
  if($category_search_id){
   
    $ad_data_by_category =$CI->db->where('ad_type', 2)->where('category', $category_search_id)->get('ad_system')->result();
    foreach($ad_data_by_category as $data_cate){
      $template.='<div class="aalan" >';
      $template.='<a href="javascript:void(0)" class="ad_clicker" data-id="'.$data_cate->ad_id.'" data-link="'.$data_cate->link.'" data-ip="'.$_SERVER['REMOTE_ADDR'].'" data-per="'.$data_cate->per_what.'" data-count="'.$data_cate->per_what_answer.'" target="_blank">';
      $template.='<img src="assets/new_uploads/'.$data_cate->photo.'">';
      $template.='</a>';
      $template.='</div>';
    }
    

    return $template;
  }

  $keyword_search_id = $CI->db->where('is_category', 0)->where('keyword_title', $guide_search_input)->or_where('cat_keywords_en', $guide_search_input)->get('cat_keywords')->row('keywords_id');

  if($keyword_search_id){
    $ad_data_by_keyword=$CI->db->where('ad_type', 2)->where('keyword', $keyword_search_id)->get('ad_system')->result();
    foreach($ad_data_by_keyword as $data_keyword){
      $template.='<div class="aalan">';
      $template.='<a href="javascript:void(0)" class="ad_clicker" data-id="'.$data_keyword->ad_id.'" data-link="'.$data_keyword->link.'" data-ip="'.$_SERVER['REMOTE_ADDR'].'" data-per="'.$data_keyword->per_what.'" data-count="'.$data_keyword->per_what_answer.'" target="_blank">';
      $template.='<img src="assets/new_uploads/'.$data_keyword->photo.'">';
      $template.='</a>';
      $template.='</div>';
    }

    return $template;
  }

  $brand_search_id = $CI->db->where('brand_title', $guide_search_input)->or_where('brand_title_ar', $guide_search_input)->get('brand')->row('brand_id');

  if($brand_search_id){
    $ad_data_by_brand=$CI->db->where('ad_type', 2)->where('brand', $brand_search_id)->get('ad_system')->result();
    foreach($ad_data_by_brand as $data_brand){
      $template.='<div class="aalan">';
      '<a href="javascript:void(0)" class="ad_clicker" data-id="'.$data_brand->ad_id.'" data-link="'.$data_brand->link.'" data-ip="'.$_SERVER['REMOTE_ADDR'].'" data-per="'.$data_brand->per_what.'" data-count="'.$data_brand->per_what_answer.'" target="_blank">';
      $template.='<img src="assets/new_uploads/'.$data_brand->photo.'">';
      $template.='</a>';
      $template.='</div>';
    }

    return $template;
  }

}


function ad_clicker(){
   echo $_SERVER['REMOTE_ADDR'];
}