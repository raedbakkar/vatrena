<?php 

class Permission extends CI_Controller {
	
	private $is_login;

	public $situation; // count - add - edit - time
	
	public $answer;
	
	public $feature_permission_for_user = array();

	public $vat_coin;

	public $user_type; // admin,normal_user
	
	public $user_id; // admin,normal_user

	public $is_admin; 


	public function set_user_id(){

		if(is_login()){
			return $this->user_id  = $this->session->userdata('user_id');
		}
	}

	private function not_empty($var){

		if(!empty($var)){
			return true; 
		}else{
			return false;
		}

	}

	public function user_exist(){
	
		if(is_login()){
			$this->is_login = true; 
		}else{
			$this->is_login = false; 
		}
	}

	//2
	public function currnt_user_id(){
		// user_id -> 992
		if($this->is_login){
			$this->user_id = $this->session->userdata('user_id');
		}
	}
	
	public function currect_user_type(){

		if(not_empty($this->user_id)){

			$this->user_id = $this->session->userdata('user_id');
			
			if($this->user_id){
					
				$is_admin =	$this->db->where('user_id', $this->user_id)->get('users')->row('is_admin');					
			
				if($is_admin){

					$this->is_admin = true;

				}else{

					$this->is_admin = false;

				}
			}
		}
	}


	public function create_permission_foreach_feature(){

		if(!$this->is_admin){

			$permissions = $this->db->where('user_id', $this->user_id)->get('user_permission')->result();

			foreach($permissions as $permission){

				$this->feature_permission_for_user[$permission->per_id] = array(
																			'situation'=>$permission->per_situation, 
																			'answer'=>$permission->per_answer
																		  );
			}

		}

	}

	public function current_permission_name(){
			


	}
	

	public function current_permission_type(){
		// count - add - edit time 
	}


	public function get_album_cost($photo_count){

		$cost_per_photo = $this->db->where('per_id', 2)->get('permissions')->row('vat_coin');

		$album_cost = $photo_count * $cost_per_photo;

		return $album_cost;

	}

	public function get_video_cost(){

		$video_cost = $this->db->where('per_id', 1)->get('permissions')->row('vat_coin');

		return $video_cost;

	}


	public function save_video(){

		if(is_login()){

			$user_id = $this->session->userdata('user_id');

			$video_title_ar = $this->input->post('video_title_ar');
			$video_title_en = $this->input->post('video_title_en');
			$youtube_link = $this->input->post('youtube_link');

			$data = array(

				'video_link'=>$this->embeded_link($youtube_link),
				'video_name'=>$video_title_ar,
				'video_name_en'=>$video_title_en,
				'video_vatrena_id'=>$this->get_main_branch()
			);

			if($this->db->insert('video', $data)){

				$video_cost = $this->get_video_cost();

				$this->save_progress($user_id, 1, $video_cost, 'addd', 1);

				$this->create_expired_date($user_id);

				$cost_info = $this->cost_update($user_id, $video_cost);

				if($cost_info['progress']){

					echo json_encode(array(
						'done'=>'video is been added succssfully',
						'video_cost'=>$video_cost,
						'video_link'=>$this->embeded_link($youtube_link)
					));
				}
			}

		}else{
			echo json_encode(array('redirect'=>base_url(),'error'=>'sorry Somthing Went Wrong'));
		}

	}

	public function embeded_link($youtube_link){
		
		if($youtube_link){

			$empeded_link = explode('=', $youtube_link);

			return 'https://www.youtube.com/embed/' . $empeded_link[1];

		}

	}

	public function save_album(){
		
		$user_id = $this->session->userdata('user_id');

		if($user_id){

			$photo_ids = $this->input->post('photo_ids');

			$ids_array = explode(',', $photo_ids);
				
			$photo_count = 0;

			foreach($ids_array as $photo_id){
				if($this->db->where('photo_id', $photo_id)->update('photo', array(
					'vatrena_id' => $user_id
				))){
					$photo_count++;
				}
			}

			$cost = $this->get_album_cost($photo_count);

			if($cost){

				$cost_info = $this->cost_update($user_id, $cost);
				
				if($cost_info['progress']){

					$this->create_expired_date($user_id);

					$this->save_progress($user_id, 2, $cost, 'count', $photo_count);

					echo json_encode(array('cost'=>$cost_info['cost']));
					
				}

			}

		}
	}

	public function get_category(){
		$category = $this->db->select('keywords_id,cat_keywords_en')->where('is_category', 1)->get('cat_keywords')->result();
		
		$category_array = array();
		foreach($category as $categories){
			$category_array[$categories->keywords_id] = $categories->cat_keywords_en;
		}
		echo json_encode(array('text'=>$category_array));

	}

	public function get_main_branch(){
		if(is_login()){
		 	return $this->db->where('parent', 0)->where('user_id', $this->session->userdata('user_id'))->get('companies')->row('companies_id');
		}

	}

	public function cost_update($user_id, $cost){

		$cost_before = $this->db->where('user_id', $user_id)->get('users')->row('vat_coin');
			
		$cost_after = $cost_before + $cost;

		if($this->db->where('user_id', $user_id)->update('users', array('vat_coin'=>$cost_after))){

			$cost_result = array('cost'=>$cost_after,'progress'=>true); 

			return $cost_result;

		}else{

			return false;

		}
		

	}


	public function create_expired_date($user_id){

		if($user_id){
		
			$expire_date = $this->db->where('user_id', $user_id)->get('users')->row('expire_date');			
		
			if($expire_date == '0000-00-00'){

				$set_expire_date = date('Y-m-d',strtotime('+1 year'));
			
				$this->db->where('user_id', $user_id)->update('users', array('expire_date'=>$set_expire_date));
			
			}
			// else{

			// 	$count_user_progress = $this->db->where('user_id', $user_id)->count_all_results('user_permission');

			// 	if($count_user_progress == 0){

			// 		$set_expire_date '0000-00-00';
					
			// 		$this->db->where('user_id', $user_id)->update('users', array('expire_date'=>$set_expire_date));	

			// 	}else{

				

			// 	}

			// }


		}

	}

	public function save_progress($user_id, $per_id, $cost, $per_situation, $answer){

		$progress_array = array(

			'user_id'=>$user_id,
			'per_id'=>$per_id,
			'per_situation'=>$per_situation,
			'per_answer'=>$answer,
			'per_price'=>$cost,
			'per_date'=>date('Y-m-d')

		);

		$this->db->insert('user_permission', $progress_array);

	}

	public function delete_album_cost($photo_count, $user_id){

		$cost_per_photo = $this->db->where('per_id', 2)->get('permissions')->row('vat_coin');

		$user_debt = $this->db->where('user_id', $user_id)->get('users')->row('vat_coin');

		$album_cost = $user_debt - $photo_count * $cost_per_photo;

		if($album_cost < 0){
			$album_cost = 0;
		}
		
		return $album_cost;

	}

	public function album_price($user_id, $album_id){
		
		$count_photos=$this->db->where('photo_category', $album_id)->count_all_results('photo');

		$album_price=$this->db->where('per_id', 2)->get('permissions')->row('vat_coin');

		$album_price = $count_photos * $album_price;

		return $album_price;		

	}	

	public function remove_album(){

		$user_id = $this->session->userdata('user_id');

		if($user_id){

			$photo_ids = $this->input->post('photo_ids');

			$ids_array = explode(',', $photo_ids);
				
			$photo_count = 0;

			foreach($ids_array as $photo_id){
				if($this->db->where('photo_id', $photo_id)->delete('photo')){
					$photo_count++;
				}
			}

			// $this->create_expired_date($user_id);

			$cost = $this->delete_album_cost($photo_count, $user_id);

			if($this->db->where('user_id', $user_id)->update('users', array('vat_coin'=>$cost))){

				echo json_encode(array('cost'=>number_format($cost, 2)));
			
			}

		}
	}

	public function DestroyPhoto(){
   		
   		$all_photo_ids = $this->input->post('all_photo_ids');
   		$photo_id = $this->input->post('photo_id');
   		$imgUrl = $this->input->post('imgUrl');
   		$all_photo_ids_after = array();

   		$all_photo_ids = explode(',', $all_photo_ids);

   		foreach($all_photo_ids as $id){
   			if($id == $photo_id){
   				continue;
   			}else{
   				array_push($all_photo_ids_after, $id);
   			}
   		}

   		$all_photo_ids_after = implode(',', $all_photo_ids_after);

   		echo json_encode(array('all_photo_ids'=>$all_photo_ids_after));


   	}

   	public function get_album_photos(){
		
		$album_id = $this->input->post('album_id'); 
		
		$photos=$this->db->where('photo_category', $album_id)->get('photo')->result();	
		$photo_template = '';
		$photo_template.= '<div class="row"><div class="col-md-12"><div class="slider-pictures albumController">';
		$photo_template.= '<p class="edit-note">Select a Photo You Want to Edit Or Delete!</p>';
		foreach($photos as $photo){
			$photo_template .= '<div class="box-pic photo-pre'. $photo->photo_id .'" data-id="' . $photo->photo_id . '"><img src="./assets/new_uploads/'.  $photo->photo .'"><div class=" box-opacity boxHov' . $photo->photo_id . '" data-id="'. $photo->photo_id .'" data-alb="' . $album_id . '"><i class="cla icon_pencil-edit"></i></div></div>';
		}

		$photo_template.='</div>';
		$photo_template.='</div>';
		$photo_template.='</div>';

		echo json_encode(array('template'=>$photo_template));
   	}

   	public function edit_photo_template(){
		
		$photo_id = $this->input->post('photo_id'); 
		
		$photos=$this->db->where('photo_id', $photo_id)->get('photo')->row();
		$desc = $this->db->where('photo_id', $photo_id)->get('photo_desc')->row();

		$form_template ='';
		$form_template.='<div class="row amarg active'. $photo_id .' ">
			<div class="col-md-12 amarg">
				<p class="edit-note">Edit Photo Description</p>
			</div>
			<div class="col-md-4">
				<div class="photo-holder">
					<img src="./assets/new_uploads/'. $photos->photo .'">
				</div>
			</div>
			<div class="col-md-8">
			<div class="form-holder">
				<form class="photo-edit" method="POST">
					<div class="form-group inone">
						<label>Photo Description Arabic</label>
						<textarea type="text" class="form-control" name="photo_desc_ar">'.$desc->desc_ar.'</textarea>
					</div>
					<div class="form-group inone">
						<label>Photo Description English</label>
						<textarea type="text" class="form-control" name="photo_desc_en">'.$desc->desc_en.'</textarea>
					</div>
					<input type="hidden" value="'.$desc->desc_id.'" name="desc_id"> 
					<div class="form-group inone bt">
						<button type="submit" class="edit-pho ed-photo">Save Edit</button>
					</div>
					<div class="form-group inone bt">
						<button type="button" class="del-pho del-photo" data-id="'.$photos->photo_id.'">Delete Photo</button>
					</div>
				</form>
			</div>			   								
			</div>
		</div>';


		echo json_encode(array('template'=>$form_template));
   	}

   	public function add_photo_template(){
   	
   		$album_id = $this->input->post('album_id'); 
		
		$form_template ='';
		$form_template.='<div class="row amarg active'. $album_id .' ">
			<div class="col-md-12 amarg">
				<p class="edit-note">Add Photo</p>
			</div>
			<div class="col-md-4">
				<div class="dropzone text-center drop-bord dropMaker moh add-photo-al" action="' .base_url('Home/post_picture_album') . '"  data-albname="false">
				</div>
			</div>
			<div class="col-md-8">
			<div class="form-holder">
				<form class="photo-edit" method="POST">
					<div class="form-group inone">
						<label>Photo Description Arabic</label>
						<textarea type="text" class="form-control" name="photo_desc_ar"></textarea>
					</div>
					<div class="form-group inone">
						<label>Photo Description English</label>
						<textarea type="text" class="form-control" name="photo_desc_en"></textarea>
					</div>
					<input type="hidden" value="name="desc_id"> 
					<div class="form-group inone bt">
						<button type="submit" class="edit-pho ed-photo">Save Edit</button>
					</div>
					<div class="form-group inone bt">
						<button type="button" class="del-pho del-photo" data-id="'.$album_id.'">Delete Photo</button>
					</div>
				</form>
			</div>			   								
			</div>
		</div>';


		echo json_encode(array('template'=>$form_template));


   	}

   	public function edit_photo_description(){
   	

   		$this->load->library('form_validation');

        $data = new stdClass();
        $this->form_validation->set_rules('photo_desc_ar', 'Description Arabic', 'trim|required');
        $this->form_validation->set_rules('photo_desc_en', 'Description English', 'trim|required');

   		$desc_id = $this->input->post('desc_id');
   		$desc_ar = $this->input->post('photo_desc_ar');
   		$desc_en = $this->input->post('photo_desc_en');

   		if($this->form_validation->run()){

   			$data = array(

   				'desc_ar'=>$desc_ar,
   				'desc_en'=>$desc_en
   			);

   			if($this->db->where('desc_id', $desc_id)->update('photo_desc', $data)){
   				echo json_encode(array('done'=>'Photo Description Has been Updated'));
   			}

   		}else{
	    
	    	echo json_encode(array('error'=>validation_errors()));
	   	
	   	}



   	}

   	public function delete_photo(){
   		
   		$photo_id = $this->input->post('photo_id');

   		if($this->db->where('photo_id', $photo_id)->delete('photo')){

   			$debt = $this->current_user_debt($this->get_user_id());

   			$this->debt($debt);

   			$updated_price = $this->current_user_debt($this->get_user_id());

   			echo json_encode(array('done'=>'selected photo is deleted','debt'=>$updated_price));
   		}else{
   			echo json_encode(array('error'=>'try again later'));
   		}

   	}

   	public function current_user_debt($user_id){

   		if(!is_login()){ redirect(base_url()); }

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

   	public function get_user_id(){
   		if(is_login()){
   			return $this->session->userdata('user_id');
   		}
   	}

   		
   	public function debt($debt){
   		$this->db->where('user_id', $this->get_user_id())->update('users',array('vat_coin'=>$debt));

		
   	}

   	public function delete_album(){

   		if(!is_login()){ redirect(base_url()); }

   		$album_id = $this->input->post('album_id');
   		$user_id = $this->session->userdata('user_id');

   		if($this->db->where('photo_cat_id', $album_id)->delete('photo_category')){

   			$debt = $this->current_user_debt($user_id);

   			$this->debt($debt);

   			$updated_price = $this->current_user_debt($user_id);
   			
   			echo json_encode(array('done'=>'album has been Deleted', 'debt'=>$updated_price));
   		
   		}else{
   			echo json_encode(array('error'=>'Try again later'));
   		}

   	}
	
}