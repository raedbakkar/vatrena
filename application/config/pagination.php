<?php
$config['display_pages']=TRUE;
$config['anchor_class']='ajax_pag_a';
$config['page_query_string'] = TRUE;
$config['num_links']=5;
$config['use_page_numbers']=TRUE;
$config['enable_query_strings']=TRUE;
$config['reuse_query_string'] = true;

$config['full_tag_open'] = '<ul class="pagination">';
$config['full_tag_close'] = '</ul>';

$config['first_link'] = is_arabic() ? 'الاول' : 'First';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';

$config['last_link'] = is_arabic() ? 'الاخير' : 'Last';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['next_link'] = is_arabic() ? 'التالي' : 'Next';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = is_arabic() ? 'السابق' : 'Prev';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="active"><a href="javascript:;">';
$config['cur_tag_close'] = '</a></li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
?>