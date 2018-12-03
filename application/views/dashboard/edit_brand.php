<!-- begin::Body -->
<!-- <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css"> -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			<!-- BEGIN: Left Aside -->
			<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
				<i class="la la-close"></i>
			</button>
			<!-- END: Left Aside -->
			<div class="m-grid__item m-grid__item--fluid m-wrapper">
				<!-- BEGIN: Subheader -->
				<div class="m-subheader ">
					<div class="d-flex align-items-center">
						<div class="mr-auto">
							<h3 class="m-subheader__title m-subheader__title--separator">
								Add Products 
							</h3>
							<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
								<li class="m-nav__item m-nav__item--home">
									<a href="#" class="m-nav__link m-nav__link--icon">
										<i class="m-nav__link-icon la la-home"></i>
									</a>
								</li>
								<li class="m-nav__separator">
									-
								</li>
								<li class="m-nav__item">
									<a href="" class="m-nav__link">
										<span class="m-nav__link-text">
											Forms
										</span>
									</a>
								</li>
								<li class="m-nav__separator">
									-
								</li>
								<li class="m-nav__item">
									<a href="" class="m-nav__link">
										<span class="m-nav__link-text">
											Form Controls
										</span>
									</a>
								</li>
								<li class="m-nav__separator">
									-
								</li>
								<li class="m-nav__item">
									<a href="" class="m-nav__link">
										<span class="m-nav__link-text">
											Base Inputs
										</span>
									</a>
								</li>
							</ul>
						</div>
						<div>
							<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
								<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
									<i class="la la-plus m--hide"></i>
									<i class="la la-ellipsis-h"></i>
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav">
													<li class="m-nav__section m-nav__section--first m--hide">
														<span class="m-nav__section-text">
															Quick Actions
														</span>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-share"></i>
															<span class="m-nav__link-text">
																Activity
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-chat-1"></i>
															<span class="m-nav__link-text">
																Messages
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-info"></i>
															<span class="m-nav__link-text">
																FAQ
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-lifebuoy"></i>
															<span class="m-nav__link-text">
																Support
															</span>
														</a>
													</li>
													<li class="m-nav__separator m-nav__separator--fit"></li>
													<li class="m-nav__item">
														<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
															Submit
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END: Subheader -->
				<div class="m-content">
					<div class="row">
					<div class="col-md-12">
						<!--begin::Portlet-->
						<div class="m-portlet m-portlet--tab">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<span class="m-portlet__head-icon m--hide">
											<i class="la la-gear"></i>
										</span>
										<h3 class="m-portlet__head-text">
											Add Brand
										</h3>
									</div>
								</div>
							</div>
							<!--begin::Form-->
							<form class="m-form m-form--fit m-form--label-align-right" id="edit-brand" method="POST">
								<div class="m-portlet__body">
									<div class="form-group m-form__group">
										<label>Brand Title Arabic</label>
										<div class="custom-file">
											<input type="text" name="brand_ar" class="form-control m-input m-input--square" value="<?= $brand->brand_title_ar ?>">
											<input type="hidden" name="brand_id" value="<?= $brand->brand_id ?>">
										</div>
									</div>
									<div class="form-group m-form__group">
										<label>Brand Title English</label>
										<div class="custom-file">
											<input type="text" name="brand_en" class="form-control m-input m-input--square" value="<?= $brand->brand_title ?>">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-form-label ">
											 Categories:
										</label>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<select class="form-control m-select2" id="m_select2_3" name="categories[]" multiple="multiple">
												<?php foreach($categories as $cat_keyword): ?>
													<option value="<?=  $cat_keyword->keywords_id ?>" <?php selected_keyword_by_brand_id($cat_keyword->keywords_id, $brand->brand_id); ?>>
														<?=  $cat_keyword->keyword_title ?>
													</option>
												<?php endforeach ?>
											</select>
										</div>
									</div>

									<div class="GeneAttr"></div>

									<div class="form-group m-form__group">
										<div class="geneOptionMakerFirst"></div>
										<div class="geneOptionMaker"></div>
										<label>Brand logo</label>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<input type="hidden" name="thumbnail" value="<?= $brand->picutre ?>">
											<div class="m-dropzone dropzone m-dropzone--primary" action="<?= base_url('dashboard/brand_logo'); ?>" id="m-dropzone-one">
												<div class="m-dropzone__msg dz-message needsclick">
													<h3 class="m-dropzone__msg-title">
														اضف صورة المركة
													</h3>
													<img style="width: 100px;height: 100px;" src="<?= base_url() ?>assets/images/logo_brand/<?= $brand->picutre ?>">
												</div>
											</div>
										</div>
									</div>
									<div class="form-group m-form__group">
										<label for="exampleInputEmail1">
											choose vatrena for Priority
										</label>
										<select class="form-control m-input m-input--solid m-select2 SelectXors" id="m_select2_5"  name="vatrena_name">
											<option></option>
											<?php foreach($vatrenas as $vatrena): ?>
											<option value="<?=  $vatrena->company_id ?>">
												<?=  get_vatrena_by_id($vatrena->company_id); ?>
											</option>
										    <?php endforeach ?>
										</select>
									</div>
									<div class="priority_appender">
										
									</div>
								</div>
								<div class="m-portlet__foot m-portlet__foot--fit">
									<div class="m-form__actions">
										<button type="submit" class="btn btn-primary">
											Submit
										</button>
									</div>
								</div>
							</form>
							<!--end::Form-->
						</div>
					<!--end::Portlet-->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end:: Body -->
<style> 

	.display-btn {
		display:none;
	}

	.genebuttons {
		margin:20px;
		text-align:center;
	}
	.marg-appends {
		margin:20px;
	}

</style>
	<script src="assets/dashboard/dropzone.js" type="text/javascript"></script>
	
    <script>
        // multiple file upload
	    if ($('#m-dropzone-one').length) {
	        var myDropzone = new Dropzone("#m-dropzone-one", {
	            paramName: "file", // The name that will be used to transfer the file
	            maxFiles: 1,
	            maxFilesize: 1, // MB
	            addRemoveLinks: true,
	            timeout:0,
	            sending: function(file, xhr, formData) {
	            },
	            init: function () {
	                
	            },
	            accept: function(file, done) {
	                if (file.name == "justinbieber.jpg") {
	                    done("Naha, you don't.");
	                } else { 
	                    done(); 
	                }
	            },
	            success: function (file, response) {
	            	console.log(response);
	            	var response=JSON.parse(response);
	            	if (!('status' in response))
	            		return false;

	            	if(response.status == 'success')
		                $(document).find('[name=thumbnail]').val(response.filename);
		            else
		            	alert(response.error);
	            }

	        });
	    }
	    
	</script>