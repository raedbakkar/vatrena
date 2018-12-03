
			<!-- END: Left Aside -->
			<div class="m-grid__item m-grid__item--fluid m-wrapper">
				<!-- BEGIN: Subheader -->
		
				<!-- END: Subheader -->
				<div class="m-content">
					<!--Begin::Main Portlet-->
					<div class="m-portlet m-portlet--full-height">
						<!--begin: Portlet Head-->

						<div class="m-portlet__body m-portlet__body--no-padding">
							<!--begin: Form Wizard-->
							<div class="m-wizard m-wizard--3 m-wizard--success" id="m_wizard">
								<!--begin: Message container -->
								<div class="m-portlet__padding-x">
									<!-- Here you can put a message or alert -->
								</div>
								<!--end: Message container -->
								<div class="row m-row--no-padding">
									<div class="col-xl-3 col-lg-12">
										<!--begin: Form Wizard Head -->
										<div class="m-wizard__head">
											<!--begin: Form Wizard Progress -->
											<div class="m-wizard__progress">
												<div class="progress">
													<div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<!--end: Form Wizard Progress --> 
		            					<!--begin: Form Wizard Nav -->
											<div class="m-wizard__nav">
												<div class="m-wizard__steps">
													<div class="m-wizard__step m-wizard__step--current" data-wizard-target="#m_wizard_form_step_1">
														<div class="m-wizard__step-info">
															<a  class="m-wizard__step-number">
																<span>
																	<span>
																		1
																	</span>
																</span>
															</a>
															<div class="m-wizard__step-line">
																<span></span>
															</div>
															<div class="m-wizard__step-label">
																Address
															</div>
														</div>
													</div>
													<div class="m-wizard__step" data-wizard-target="#m_wizard_form_step_2">
														<div class="m-wizard__step-info">
															<a  class="m-wizard__step-number">
																<span>
																	<span>
																		2
																	</span>
																</span>
															</a>
															<div class="m-wizard__step-line">
																<span></span>
															</div>
															<div class="m-wizard__step-label">
																Contacts
															</div>
														</div>
													</div>
													<div class="m-wizard__step" data-wizard-target="#m_wizard_form_step_3">
														<div class="m-wizard__step-info">
															<a  class="m-wizard__step-number">
																<span>
																	<span>
																		3
																	</span>
																</span>
															</a>
															<div class="m-wizard__step-line">
																<span></span>
															</div>
															<div class="m-wizard__step-label">
																Category/Keywords
															</div>
														</div>
													</div>
													<div class="m-wizard__step" data-wizard-target="#m_wizard_form_step_4">
														<div class="m-wizard__step-info">
															<a  class="m-wizard__step-number">
																<span>
																	<span>
																		4
																	</span>
																</span>
															</a>
															<div class="m-wizard__step-line">
																<span></span>
															</div>
															<div class="m-wizard__step-label">
																Photos
															</div>
														</div>
													</div>
													<div class="m-wizard__step" data-wizard-target="#m_wizard_form_step_5">
														<div class="m-wizard__step-info">
															<a  class="m-wizard__step-number">
																<span>
																	<span>
																		5
																	</span>
																</span>
															</a>
															<div class="m-wizard__step-line">
																<span></span>
															</div>
															<div class="m-wizard__step-label">
																Videos
															</div>
														</div>
													</div>
													<div class="m-wizard__step" data-wizard-target="#m_wizard_form_step_6">
														<div class="m-wizard__step-info">
															<a  class="m-wizard__step-number">
																<span>
																	<span>
																		6
																	</span>
																</span>
															</a>
															<div class="m-wizard__step-line">
																<span></span>
															</div>
															<div class="m-wizard__step-label">
																Working Hours
															</div>
														</div>
													</div>
													<div class="m-wizard__step" data-wizard-target="#m_wizard_form_step_8">
														<div class="m-wizard__step-info">
															<a  class="m-wizard__step-number">
																<span>
																	<span>
																		7
																	</span>
																</span>
															</a>
															<div class="m-wizard__step-line">
																<span></span>
															</div>
															<div class="m-wizard__step-label">
																Files
															</div>
														</div>
													</div>
													<div class="m-wizard__step" data-wizard-target="#m_wizard_form_step_9">
														<div class="m-wizard__step-info">
															<a  class="m-wizard__step-number">
																<span>
																	<span>
																		8
																	</span>
																</span>
															</a>
															<div class="m-wizard__step-line">
																<span></span>
															</div>
															<div class="m-wizard__step-label">
																Confirmation
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--end: Form Wizard Nav -->
										</div>
										<!--end: Form Wizard Head -->
									</div>
									<div class="col-xl-9 col-lg-12">
										<!--begin: Form Wizard Form-->
										<div class="m-wizard__form">
											<!--
						1) Use m-form--label-align-left class to alight the form input lables to the right
						2) Use m-form--state class to highlight input control borders on form validation
					-->
											<form class="m-form m-form--label-align-left- m-form--state-" id="excuteBranch">
												<!--begin: Form Body -->
												<div class="m-portlet__body m-portlet__body--no-padding">
													<!--begin: Form Wizard Step 1-->
													<div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
														<div class="m-separator m-separator--dashed m-separator--lg"></div>
														<div class="m-form__section">
															<div class="m-form__heading">
																<h3 class="m-form__heading-title">
																	Company data
																	<i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info" title="Some help text goes here"></i>
																</h3>
															</div>
															<div class="form-group m-form__group row">
																<label class="col-xl-3 col-lg-3 col-form-label">
																	 Name Arabic:
																</label>
																<div class="col-xl-9 col-lg-9">
																	<input type="text" name="company_name_ar" class="form-control m-input" placeholder="Name Arabic" value="<?= $default->company_name_ar ?>">
																	<span class="m-form__help">
																		Street address, P.O. box, company name, c/o
																	</span>
																</div>
															</div>
															<div class="form-group m-form__group row">
																<label class="col-xl-3 col-lg-3 col-form-label">
																	 Name English:
																</label>
																<div class="col-xl-9 col-lg-9">
																	<input type="text" name="company_name_en" class="form-control m-input" placeholder="Name English" value="<?= $default->company_name_en ?>">
																	<span class="m-form__help">
																		Street address, P.O. box, company name, c/o
																	</span>
																</div>
															</div>
															<div class="form-group m-form__group row">
																<label class="col-xl-3 col-lg-3 col-form-label">
																	 Company Description Arabic:
																</label>
																<div class="col-xl-9 col-lg-9">
																<textarea name="company_about_ar" class="form-control m-input"><?= $default->company_about ?></textarea>
																</div>
															</div>
															<div class="form-group m-form__group row">
																<label class="col-xl-3 col-lg-3 col-form-label">
																	 Company Description english:
																</label>
																<div class="col-xl-9 col-lg-9">
																	<textarea name="company_about_en" class="form-control m-input"><?= $default->company_about_en ?></textarea>
																</div>
															</div>
															<div class="form-group m-form__group row">
																<label class="col-xl-3 col-lg-3 col-form-label">
																	Choose Logo:
																</label>
																<div class="custom-file col-xl-9 col-lg-9">
																	<input type="hidden" class="custom-file-input inputTriggerd" name="logoTriggerExample"  value="<?= $default->logo ?>">
																	<input type="file" class="custom-file-input inputTriggerd" name="logoTrigger"  data-div-appender=".logoExcuter">
																	<label class="custom-file-label" for="customFile">
																		Choose Logo
																	</label>
																</div>
																<div class="col-lg-12">
																	<div class="logoExcuter photoAppender mangerImg">
																		<img src="assets/new_uploads/<?= $default->logo ?>">
																	</div>
																</div>
															</div>
															<div class="m-form__heading">
																<h3 class="m-form__heading-title">
																	Mailing Address
																	<i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info" title="Some help text goes here"></i>
																</h3>
															</div>
															<div class="form-group m-form__group row">
																<label class="col-xl-3 col-lg-3 col-form-label">
																	 Address arabic:
																</label>
																<div class="col-xl-9 col-lg-9">
																	<input type="text" name="address_ar" class="form-control m-input" placeholder="Address arabic" value="">
																	<span class="m-form__help">
																		Street address, P.O. box, company name, c/o
																	</span>
																</div>
															</div>
															<div class="form-group m-form__group row">
																<label class="col-xl-3 col-lg-3 col-form-label">
																	 Address english:
																</label>
																<div class="col-xl-9 col-lg-9">
																	<input type="text" name="address_en" class="form-control m-input" placeholder="Address english" value="">
																	<span class="m-form__help">
																		Street address, P.O. box, company name, c/o
																	</span>
																</div>
															</div>
															<div class="form-group m-form__group row">
																<label class="col-xl-3 col-lg-3 col-form-label">
																	Views:
																</label>
																<div class="col-xl-9 col-lg-9">
																	<input type="text" name="count_views" class="form-control m-input" placeholder="Views" value="">
																</div>
															</div>
															<div class="form-group m-form__group row">
																<label class="col-xl-3 col-lg-3 col-form-label">
																	 Area:
																</label>
																<div class="col-xl-9 col-lg-9">
																	<select name="area" class="areaDroper form-control m-input" data-url="<?= base_url() ?>dashboard/dropDownAppender" data-appenddiv="geneDropMohafza" data-tab="mohafazat" data-fidname="governorate_id" data-view="dashboard/mohafza_options" data-dropname="category">
																		<option>Area</option>
																		<?php foreach($governorate as $gover): ?>
									                                    	<option value="<?= $gover->gover_id ?>"><?= $gover->gover_title_ar ?></option>
									                                  	<?php endforeach ?>
																	</select>
																</div>
															</div>
															
															<div class="form-group m-form__group row geneDropMohafza">
															</div>
															<div class="form-group m-form__group row geneDropCity">
															</div>
															<div class="form-group m-form__group row geneDropDistrict">
															</div>
															<div class="m-form__heading">
																<h3 class="m-form__heading-title">
																	Map
																</h3>
															</div>
														</div>

														<div class="m-portlet m-portlet--tab">

															<div class="m-portlet__head">
																<div class="m-portlet__head-caption">
																	<div class="m-portlet__head-title">
																		<span class="m-portlet__head-icon m--hide">
																			<i class="la la-gear"></i>
																		</span>
																		<h3 class="m-portlet__head-text">
																			Geocoding
																		</h3>
																	</div>
																</div>
															</div>
															<div class="m-portlet__body">
																<div class="input-group">
																	<input type="text" class="form-control" id="m_gmap_8_address" placeholder="address...">
																	<div class="input-group-append">
																		<button class="btn btn-primary" id="m_gmap_8_btn">
																			<i class="fa fa-search"></i>
																		</button>
																	</div>
																</div>
																<div id="map" style="height:300px;"></div>
															</div>
														</div>
														<div class="m-form__section m-form__section--first">
															
															<div class="form-group m-form__group row">
																<div class="col-lg-12">
																	<label class="form-control-label">
																		 latitude:
																	</label>
																	<input type="text" name="latitude" class="form-control m-input" placeholder="" value="">
																</div>
															</div>
															<div class="form-group m-form__group row">
																<div class="col-lg-12">
																	<label class="form-control-label">
																		 longitude:
																	</label>
																	<input type="text" name="longitude" class="form-control m-input" placeholder="" value="372955886840581">
																</div>
															</div>
														</div>
													</div>
													<!--end: Form Wizard Step 1-->
													<!--begin: Form Wizard Step 2-->
													<div class="m-wizard__form-step" id="m_wizard_form_step_2">
														<div>
															<div class="phone_Autoloader">
																
																
															</div>
															<div class="row">
																<br>
																<div class="col-lg-12 AddButPhoto">
																	<button type="button" name="Load More" class="btn btn-brand LoadMorePhoneNumber" data-input-number="1">Add Anther Phone Number</button>
																	<button type="button" name="Load More" class="btn btn-warning removePhoneNumber " data-input-number="1">Delete Last Number</button>
																</div>
															</div>
														</div>
														<div id="m_repeater_2">
															<span class="space-bettwen"></span>
															
															<div class="email_Autoload">
																<?= $emails ?>
															</div>
															<div class="row">
																<br>
																<div class="col-lg-12 AddButPhoto">
																	<button type="button" name="Load More" class="btn btn-brand LoadMoreEmail" data-input-number="1">Add Anther Email</button>
																	<button type="button" name="Load More" class="btn btn-warning removeEmail" data-input-number="1">Delete Email</button>
																</div>
															</div>
														</div>
														<div class="telepone_Autoloader">
															
														</div>
														<div class="form-group m-form__group row">
															<div class="col-lg-12 AddButPhoto">
																<button type="button" name="Load More" class="btn btn-brand LoadMoreTelephone" data-input-number="1">Add Anther Telephone</button>
																<button type="button" name="Load More" class="btn btn-warning removeTele " data-input-number="1">Delete Last Number</button>
															</div>
														</div>
														<div class="form-group m-form__group row">
															<div class="col-lg-12">
																<label class="form-control-label">
																	 Social Media:
																</label>
															</div>
															<div class="col-lg-12">
																<label class="form-control-label">
																	- Facebook:
																</label>
																<input type="text" name="facebook" class="form-control m-input" placeholder="" value="<?= $default->facebook ?>">
															</div>
															<div class="col-lg-12">
																<label class="form-control-label">
																	- Twitter:
																</label>
																<input type="text" name="twitter" class="form-control m-input" placeholder="" value="<?= $default->twitter ?>">
															</div>
															<div class="col-lg-12">
																<label class="form-control-label">
																	- Google Plus:
																</label>
																<input type="text" name="google_plus" class="form-control m-input" placeholder="" value="<?= $default->google_plus ?>">
															</div>
															<div class="col-lg-12">
																<label class="form-control-label">
																	- Linkedin:
																</label>
																<input type="text" name="linkedin" class="form-control m-input" placeholder="" value="<?= $default->linkedin ?>">
															</div>
															<div class="col-lg-12">
																<label class="form-control-label">
																	- instagram:
																</label>
																<input type="text" name="instagram" class="form-control m-input" placeholder="" value="<?= $default->instagram ?>">
															</div>

														</div>
														<div class="form-group m-form__group row">
															<div class="col-lg-12">
																<label class="form-control-label">
																	 WebSite:
																</label>
																<input type="text" name="website" class="form-control m-input" placeholder="" value="<?= $default->website ?>">
															</div>
														</div>
													</div>
													<!--end: Form Wizard Step 2-->
													<!--begin: Form Wizard Step 3-->
													<div class="m-wizard__form-step" id="m_wizard_form_step_3">
														<div class="m-form__section m-form__section--first">
															<div class="m-form__heading">
																<h3 class="m-form__heading-title">
																	Category/keywords
																</h3>
															</div>
															<div class="form-group m-form__group row">
																	<label class="form-control-label">
																		 Keywords:
																	</label>
																	<div class="col-lg-12 col-md-12 col-sm-12">
																		<select class="form-control m-select2" id="m_select2_11" multiple name="keywords[]">
																			<option></option>
																			<?php foreach($keywords as $keyword): ?>
																			<option value="<?=  $keyword->keyword_title ?>" <?php selected_keyword($keyword->keywords_id, $id, 'keyword'); ?>>
																				<?=  $keyword->keyword_title ?>
																			</option>
																		<?php endforeach ?>
																		
																		</select>
																	</div>
																	<!-- <input type="text" class="form-control" id="tokenfield" value="red,green,blue" /> -->
															</div>
															<input type="hidden" name="branch_parent" value="<?= $id ?>">
															<div class="form-group m-form__group row">
																<label class="col-form-label ">
																	 Categories:
																</label>
																<div class="col-lg-12 col-md-12 col-sm-12">
																	<select class="form-control m-select2" id="m_select2_3" name="categories[]" multiple="multiple">
																		<?php foreach($cat_keywords as $cat_keyword): ?>
																			<option value="<?=  $cat_keyword->keywords_id ?>" <?php selected_keyword($cat_keyword->keywords_id, $id, 'category'); ?>>
																				<?=  $cat_keyword->keyword_title ?>
																			</option>
																		<?php endforeach ?>
																	</select>
																</div>
															</div>
															<div class="form-group m-form__group row">
																	<label class="col-form-label ">
																		 Brand:
																	</label>
																	<div class="col-lg-12 col-md-12 col-sm-12">
																		<select class="form-control m-select2" id="m_select2_10" multiple name="brand[]">
																			<option></option>
																			<?php foreach($brands as $brand): ?>
																			<option value="<?=  $brand->brand_id ?>">
																				<?=  $brand->brand_title_ar ?>
																			</option>
																		    <?php endforeach ?>
																		</select>
																	</div>
																</div>
															<!--<div class="form-group m-form__group row">
																	<label class="form-control-label">
																		 Categories:
																	</label>
																	<div class="col-lg-12 col-md-12 col-sm-12">
																	<select name="categories[]" class="form-control form-control--fixed m-bootstrap-select m_selectpicker" multiple  data-max-options="50">
																			<?php foreach($cat_keywords as $cat_keyword): ?>
																			<option value="<?=  $cat_keyword->keywords_id ?>" <?php selected_keyword($cat_keyword->keywords_id, $default->companies_id, 'category'); ?>>
																				<?=  $cat_keyword->keyword_title ?>
																			</option>
																		<?php endforeach ?>
																	</select>
																</div>
															</div>-->
														</div>
													</div>
													<!--end: Form Wizard Step 3-->
													<!--begin: Form Wizard Step 3-->
													<div class="m-wizard__form-step" id="m_wizard_form_step_4">
														<div class="photo_Autoloader">
														<?php $this->load->view('dashboard/user_photo_branch_add', array('user_photos'=>$user_photos)); ?>
														</div>
														<div class="row">
															<br>
															<div class="col-lg-12 AddButPhoto">
																<button type="button" name="Load More" class="btn btn-brand LoadMorePhoto" data-input-number="<?= $count_photos; ?>">Add Anther Photos</button>
																<button type="button" name="Load More" class="btn btn-warning removePhoto " data-input-number="<?= $count_photos; ?>">Delete Anther Photos</button>
															</div>
														</div>
													</div>
													<!--end: Form Wizard Step 4-->
													<!--begin: Form Wizard Step 4-->
													<!--begin: Form Wizard Step 3-->
													<div class="m-wizard__form-step" id="m_wizard_form_step_5">
														<div class="video_autoloader">
															<?= $vidoes; ?>
														</div>
														<input type="hidden"  class="photoAlbum" name="photoAlbum" value="<?= $count_photos; ?>">
														<input type="hidden"  class="fileAlbum" name="fileAlbum" value="1">
														<div class="row">
															<br>
															<div class="col-lg-12 AddButPhoto">
																<button type="button" name="Load More" class="btn btn-brand LoadMoreVideoLink" data-input-number="<?= $count_videos ?>">Add Anther Video</button>
																<button type="button" name="Load More" class="btn btn-warning removeVideoLink" data-input-number="<?= $count_videos ?>">Delete  Video</button>
															</div>
														</div>
													</div>
													<!--end: Form Wizard Step 3-->
													<!--begin: Form Wizard Step 3-->
													<div class="m-wizard__form-step" id="m_wizard_form_step_6">
														<div class="m-form__section m-form__section--first">
															<div class="m-form__heading">
																<h3 class="m-form__heading-title">
																	Working Hours
																</h3>
															</div>
															<div class="form-group m-form__group row">
																<div class="col-lg-12">
																	<label class="form-control-label">
																		 Starting hour:
																	</label>
																	<select class="form-control m-input" name="startingHour">
																		<option value="" selected="selected">
																			Select
																		</option>
																		<?=fetch_timer($default->starting_hour_night, $default->companies_id, 'starting_hour_night')?>
																	</select>
																</div>
																<div class="col-lg-12">
																	<label class="form-control-label">
																		 Endding Hour:
																	</label>
																	<select class="form-control m-input" name="enddingHour">
																		<option value="" selected="selected">
																			Select
																		</option>
																		<?=fetch_timer($default->starting_hour_night, $default->companies_id, 'starting_hour_night')?>
																	</select>
																</div>
															</div>
															<div class="m-form__heading">
																<h3 class="m-form__heading-title">
																	Night shift (اختياري)
																</h3>
															</div>
															<div class="form-group m-form__group row">
																<div class="col-lg-12">
																	<label class="form-control-label">
																		 Starting hour:
																	</label>
																	<select class="form-control m-input" name="startingHourNight">
																		<option value="">
																			Select
																		</option>
																		<?=fetch_timer($default->starting_hour_night, $default->companies_id, 'starting_hour_night')?>
																	</select>
																</div>
																<div class="col-lg-12">
																	<label class="form-control-label">
																		 Endding Hour:
																	</label>
																	<select class="form-control m-input" name="enddingHourNight">
																		<option value="">
																			Select
																		</option>
																		<?=fetch_timer($default->starting_hour_night, $default->companies_id, 'starting_hour_night')?>
																	</select>
																</div>
																<div class="col-lg-12 col-md-9 col-sm-12">
																	<label class="form-control-label">
																		 HoliDays (الأجازة الأسبوعية):
																	</label>
																	<select name="holidays" class="form-control form-control--fixed m-bootstrap-select  m_selectpicker" multiple  data-max-options="2">
																		<?= explode_holidays($default->holidays); ?>
																	</select>
																</div>
															</div>
														</div>
													</div>
													<!--begin: Form Wizard Step 3-->
														<div class="m-wizard__form-step" id="m_wizard_form_step_8">
															<div class="file_autoloader">
															</div>
															<div class="row">
																<br>
																<div class="col-lg-12 AddButPhoto">
																	<button type="button" name="Load More" class="btn btn-brand LoadMoreFileLink" data-input-number="1">Add Anther File</button>
																	<button type="button" name="Load More" class="btn btn-warning removeFileLink" data-input-number="1">Delete File</button>
																</div>
															</div>

														</div>
													</div>

													<div class="m-wizard__form-step" id="m_wizard_form_step_9">
														<!--begin::Section-->
														<div class="m-accordion m-accordion--default" id="m_accordion_1" role="tablist">
															<!--begin::Item-->
															<div class="m-accordion__item active">
																<div class="m-accordion__item-head"  role="tab" id="m_accordion_1_item_1_head" data-toggle="collapse" href="#m_accordion_1_item_1_body" aria-expanded="  false">
																	<span class="m-accordion__item-icon">
																		<i class="fa flaticon-user-ok"></i>
																	</span>
																	<span class="m-accordion__item-title">
																		1. Client Information
																	</span>
																	<span class="m-accordion__item-mode"></span>
																</div>
																<div class="m-accordion__item-body collapse show" id="m_accordion_1_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_1_head" data-parent="#m_accordion_1">
																	<!--begin::Content-->
																	<div class="tab-content active  m--padding-30">
																		<div class="m-form__section m-form__section--first">
																			<div class="m-form__heading">
																				<h4 class="m-form__heading-title">
																					Client Details
																				</h4>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Name:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Email:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						nick.stone@gmail.com
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Phone
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						+206-78-55034890
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="m-separator m-separator--dashed m-separator--lg"></div>
																		<div class="m-form__section">
																			<div class="m-form__heading">
																				<h4 class="m-form__heading-title">
																					Corresponding Address
																					<i data-toggle="m-tooltip" class="m-form__heading-help-icon flaticon-info" title="Some help text goes here"></i>
																				</h4>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Address Line 1:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						Headquarters 1120 N Street Sacramento 916-654-5266
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Address Line 2:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						P.O. Box 942873 Sacramento, CA 94273-0001
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					City:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						Polo Alto
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					State:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						California
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Country:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						USA
																					</span>
																				</div>
																			</div>
																		</div>
																	</div>
																	<!--end::Section-->
																</div>
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="m-accordion__item">
																<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_1_item_2_head" data-toggle="collapse" href="#m_accordion_1_item_2_body" aria-expanded="    false">
																	<span class="m-accordion__item-icon">
																		<i class="fa  flaticon-placeholder"></i>
																	</span>
																	<span class="m-accordion__item-title">
																		2. Account Setup
																	</span>
																	<span class="m-accordion__item-mode"></span>
																</div>
																<div class="m-accordion__item-body collapse" id="m_accordion_1_item_2_body" class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_2_head" data-parent="#m_accordion_1">
																	<!--begin::Content-->
																	<div class="tab-content  m--padding-30">
																		<div class="m-form__section m-form__section--first">
																			<div class="m-form__heading">
																				<h4 class="m-form__heading-title">
																					Account Details
																				</h4>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					URL:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						sinortech.vertoffice.com
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Username:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						sinortech.admin
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Password:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="m-separator m-separator--dashed m-separator--lg"></div>
																		<div class="m-form__section">
																			<div class="m-form__heading">
																				<h4 class="m-form__heading-title">
																					Client Settings
																				</h4>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					User Group:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						Customer
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Communications:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						Phone, Email
																					</span>
																				</div>
																			</div>
																		</div>
																	</div>
																	<!--end::Content-->
																</div>
															</div>
															<!--end::Item--> 
														<!--begin::Item-->
															<div class="m-accordion__item">
																<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_1_item_3_head" data-toggle="collapse" href="#m_accordion_1_item_3_body" aria-expanded="    false">
																	<span class="m-accordion__item-icon">
																		<i class="fa  flaticon-placeholder"></i>
																	</span>
																	<span class="m-accordion__item-title">
																		3. Billing Setup
																	</span>
																	<span class="m-accordion__item-mode"></span>
																</div>
																<div class="m-accordion__item-body collapse" id="m_accordion_1_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_3_head" data-parent="#m_accordion_1">
																	<!--begin::Content-->
																	<div class="tab-content  m--padding-30">
																		<div class="m-form__section m-form__section--first">
																			<div class="m-form__heading">
																				<h4 class="m-form__heading-title">
																					Billing Information
																				</h4>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Cardholder Name:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						bla bla
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Card Number:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						4589
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Exp Month:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						10
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Exp Year:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						2018
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					CVV:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						
																					</span>
																				</div>
																			</div>
																		</div>
																		<div class="m-separator m-separator--dashed m-separator--lg"></div>
																		<div class="m-form__section">
																			<div class="m-form__heading">
																				<h4 class="m-form__heading-title">
																					Billing Address
																				</h4>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Address Line 1:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						Headquarters 1120 N Street Sacramento 916-654-5266
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Address Line 2:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						P.O. Box 942873 Sacramento, CA 94273-0001
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					City:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						Polo Alto
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					State:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						California
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					ZIP:
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						37505
																					</span>
																				</div>
																			</div>
																			<div class="form-group m-form__group m-form__group--sm row">
																				<label class="col-xl-4 col-lg-4 col-form-label">
																					Country:
																					<input type="button" class="leto" name="leto">
																				</label>
																				<div class="col-xl-8 col-lg-8">
																					<span class="m-form__control-static">
																						USA
																					</span>
																				</div>
																			</div>
																		</div>
																	</div>
																	<!--end::Content-->
																</div>
															</div>
															<!--end::Item-->
														</div>
														<!--end::Section-->
															<!--end::Section-->
														<div class="m-separator m-separator--dashed m-separator--lg"></div>
														
													</div>
													<!--end: Form Wizard Step 4-->
												</div>
												<!--end: Form Body -->
												<!--begin: Form Actions -->
												<div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-lg-6 m--align-left">
																<a href="#" class="btn btn-secondary m-btn m-btn--custom m-btn--icon" data-wizard-action="prev">
																	<span>
																		<i class="la la-arrow-left"></i>
																		&nbsp;&nbsp;
																		<span>
																			Back
																		</span>
																	</span>
																</a>
															</div>
															<div class="col-lg-6 m--align-right">
																<button type="submit" class="btn btn-primary m-btn m-btn--custom m-btn--icon" data-wizard-action="submit">
																	<span>
																		<i class="la la-check"></i>
																		&nbsp;&nbsp;
																		<span>
																			Submit
																		</span>
																	</span>
																</button>
																<a href="#" class="btn btn-success m-btn m-btn--custom m-btn--icon" data-wizard-action="next">
																	<span>
																		<span>
																			Save & Continue
																		</span>
																		&nbsp;&nbsp;
																		<i class="la la-arrow-right"></i>
																	</span>
																</a>
															</div>
														</div>
													</div>
												</div>
												<!--end: Form Actions -->
											</form>
										</div>
										<!--end: Form Wizard Form-->
									</div>
								</div>
							</div>
							<!--end: Form Wizard-->
						</div>
						<!--end: Portlet Body-->
					</div>
					<!--End::Main Portlet-->
				</div>
			</div>
		</div>
		<!-- end:: Body -->
<!-- begin::Footer -->
		<footer class="m-grid__item		m-footer ">
			<div class="m-container m-container--fluid m-container--full-height m-page__container">
				<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
					<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
						<span class="m-footer__copyright">
							2017 &copy; Metronic theme by
							<a href="https://keenthemes.com" class="m-link">
								Keenthemes
							</a>
						</span>
					</div>
					<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
						<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
							<li class="m-nav__item">
								<a href="#" class="m-nav__link">
									<span class="m-nav__link-text">
										About
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="#"  class="m-nav__link">
									<span class="m-nav__link-text">
										Privacy
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="#" class="m-nav__link">
									<span class="m-nav__link-text">
										T&C
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="#" class="m-nav__link">
									<span class="m-nav__link-text">
										Purchase
									</span>
								</a>
							</li>
							<li class="m-nav__item m-nav__item">
								<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
									<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<!-- end::Footer -->