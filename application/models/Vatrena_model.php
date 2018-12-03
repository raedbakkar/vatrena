<?php 
class Vatrena_model extends CI_Model {

	public function get_dropdown_by_table_name($table,$selected_field ,$field_where, $id=null){
		

		$fields = explode(',', $selected_field);
		$options_id = $fields[0];
		$options_title = $fields[1];

		$drop_options = $this->db->select($selected_field)->get($table)->result();
		
		foreach($drop_options as $option){
			if($this->dropChecker($table,$selected_field ,$field_where, $id)){
				
				echo '<option class="selected" data-selected="'.$option->$options_title.'" value="'.$option->$options_id.'" >'.$option->$options_title.'</option>'; 
			
			}else{

				echo '<option value="'.$option->$options_id.'">'.$option->$options_title.'</option>'; 

			}
		}

	}


	public function dropChecker($table,$selected_field ,$field_where, $id=null){

		$this->db->select($selected_field);
		
		if($id != null){
			$this->db->where($field_where, $id);
		}

		$drop_options = $this->db->get($table)->result();
		if($drop_options){
			return true;
		}else{
			return false;
		}
	}

	public function get_all_branch($id){
		return $this->db->where('comp_id',$id)->get('vatrena')->result();
		
	}

/*vat_id
vatrena_name
latitude
longitude
comp_id
video_id
photo_id
rate_id
company_telephone_id
company_mobile_id
address_ar
address_en*/

}