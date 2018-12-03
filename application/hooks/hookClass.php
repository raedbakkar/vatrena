<?php

class hookClass { 

	// public $CI;
	// private $CI;
	public $lang;

	public function initHook(){


		$CI =& get_instance();

		$CI->load->library('session');
		$CI->load->helper('language');

		// echo $CI->session->userdata('lang');

	 	if(is_arabic()){
	 		 $CI->lang->load('ar','arabic');
	 	}else if(is_english()){
	 		 $CI->lang->load('en','english');
	 	} 
	
	}

}