<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

<main>
<section id="search_container" class="login">
	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-md-offset-2 col-sm-12">
            	<div id="login">
                		<div class="text-center logo-cont"><img src="assets/img/logo_vatrena.png" alt="Image" data-retina="true" ></div>
                        <hr>
                       <form id="insert_free_vatrnea" method="POST" enctype="multipart/form-data">
	                		<h4 class="regist-heading"><?=lang('company_details')?></h4>
                       		<div class="row">
		                        <div class="col-md-6">
		                            <div class="form-group ">
		                            	<label><?=lang('username')?></label>
		                                <input type="text" class=" form-control regist" name="user_name">
		                            </div>
		                        </div>
		                        <div class="col-md-6">  
		                            <div class="form-group">
		                            	<label><?=lang('email')?></label>
		                                <input type="email" class=" form-control regist" name="email">
		                            </div>
		                        </div>
		                        <div class="col-md-6">    
		                            <div class="form-group">
		                            	<label><?=lang('password')?></label>
		                                <input type="password" class=" form-control regist" name="password" id="password1" >
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                            	<label><?=lang('confirm_password')?></label>
		                                <input type="password" class=" form-control regist" name="confPassword" id="password2">
		                            </div>
		                        </div>  
		                        <div class="col-md-6">
		                            <div class="form-group">
		                            	<label><?=lang('company_name_ar')?></label>
		                                <input type="text" class="form-control regist" name="CompanyArabic">
		                            </div>
		                        </div> 
		                        <div class="col-md-6">
		                            <div class="form-group">
		                            	<label><?=lang('company_name_en')?></label>
		                                <input type="text" class="form-control regist" name="CompanyEnglish">
		                            </div>
		                        </div>  
		                        <div class="col-md-6">
									<div class="form-group">
										<label><?=lang('categories')?></label>
										<select class="select2 form-control" name="categories">
											<option><?=lang('choose_catrgory')?></option>
											<?php foreach($categories as $category): ?>
											<option value="<?= $category->keywords_id ?>"><?=(is_arabic() ? $category->keyword_title : $category->cat_keywords_en ) ?></option>
											<?php endforeach; ?>
											<option value="other_category">Add other category</option>
										</select>
									</div>
	                                <input type="text" class="form-control hidden" name="other_category">
								</div>
		                        <div class="col-md-6">
									<div class="form-group">
										<label><?=lang('keywords')?></label>
										<select class="select2 form-control" name="keywords">
											<option><?=lang('choose_tag')?></option>
											<?php foreach($keywords as $keyword): ?>
											<option value="<?=$keyword->keywords_id?>">
												<?=(is_arabic() ? $keyword->keyword_title : $keyword->cat_keywords_en ) ?>
											</option>
											<?php endforeach ?>
											<option value="other_tag">Add other tag</option>
										</select>
									</div>
	                                <input type="text" class="form-control hidden" name="other_tag">
								</div>
		                    </div>
		                    <hr>
		                    <h4 class="regist-heading"><?=lang('address')?></h4>
		                    <!-- <hr> -->
		                    <div class="row">
								<div class="col-md-6">
		                            <div class="form-group">
		                                <label><?=lang('area')?></label>
		                                <select class="select2 gover form-control" name="area">
		                                  <option><?=lang('choose_area')?></option>
			                              <?php foreach($area as $areas): ?>
			                                <option value="<?= $areas->gover_id ?>"><?= (is_arabic() ? $areas->gover_title_ar : $areas->gover_title); ?></option>
			                              <?php endforeach ?>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
										<label><?=lang('governorate')?></label>
										<select class="select2 moh city_maker form-control" name="moha">
											<option></option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label><?=lang('city')?></label>
										<select class="select2 district_maker city_appender form-control" name="city">
											<option></option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label><?=lang('district')?></label>
										<select class="select2 district_appender form-control" name="district">
											<option></option>
										</select>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label><?=lang('address_ar')?></label>
										<input type="text" class="young-font form-control regist" name="arabicAddress"  placeholder="Number of building & street name Arabic">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label><?=lang('address_en')?></label>
										<input type="text" class="young-font form-control regist" name="englishAddress" placeholder="Number of building & street name English">
									</div>
								</div>
							</div>
							<hr>
							<h4 class="regist-heading"><?=lang('description')?></h4>
							<!-- <hr> -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label><?=lang('description_ar')?></label>
										<!-- <input type="text" class="young-font form-control regist" placeholder="Wright any thing about your company English"> -->
										<textarea class="young-font form-control regist" name="arabicDescription"  placeholder="Wright any thing about your company English"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label><?=lang('description_en')?></label>
										<!-- <input type="text" class="young-font form-control regist" placeholder="Wright any thing about your company Arabic"> -->
										<textarea class="young-font form-control regist" name="englishDescription" placeholder="Wright any thing about your company Arabic"></textarea>
									</div>
								</div>
							</div>
							<hr>
							<h4 class="regist-heading"><?=lang('logo')?></h4>
							<!-- <hr> -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="file" name="logo">
									</div>
								</div>
							</div>
							<hr>
							<h4 class="regist-heading"><?=lang('contact_information')?></h4>
							<!-- <hr> -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label><?=lang('mobile')?></label>
										<input type="text" name="mobile[]" class="form-control regist" >
										<button class="add-btn add-new-cont" data-number="1">+ <?=lang('mobile')?></button>
									</div>
									<div class="new-phone-container"></div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label><?=lang('telephone')?></label>
										<div class="clearfix"></div>
										<div class="tele">
											<input type="text" name="code[]" class=" form-control regist codes" placeholder="02">
											<input type="text" name="telephone[]" class=" form-control regist" placeholder="">
										</div>
										<button class="add-btn add-new-cont-telephone" data-number="1">+ <?=lang('telephone')?></button>
									</div>
									<div class="new-tele-container"></div>
								</div>
							</div>
                            <div id="pass-info" class="clearfix"></div>
                            <button type="submit" class="btn_full"><?=lang('create_an_account')?></button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>
</main><!-- End main -->

<script src="assets/js/tabs.js"></script>
<script src="<?=base_url('assets/js/dropzone.js')?>"></script>
<script>
        // multiple file upload
        var myDropzone = new Dropzone("#m-dropzone-one", {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: 1, // MB
            addRemoveLinks: true,
            timeout:0,
            sending: function(file, xhr, formData) {
            },
            init: function () {
                // this.on("removedfile", function (file) {
                //     $.post({
                //         url: urlroot+'Administrator/deleteUpload',
                //         data: {name: file.name, _token: _token},
                //         dataType: 'json',
                //         success: function (data) {}
                //     });
                // });
            },
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else { 
                    done(); 
                }
            },
            success: function (file, response) {
            	var response=JSON.parse(response);
            	if (!('status' in response))
            		return false;

            	if(response.status == 'success')
	                $(document).find('[name=logo]').val(response.filename);
	            else
	            	alert(response.error);
            }

        });

</script>