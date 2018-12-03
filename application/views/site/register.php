<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
<main>
<section id="search_container" class="login">
	<div class="container">
    	<div class="row">
        	<div class="col-md-6 col-md-offset-3 col-sm-12">
            	<div id="login">
                		<div class="text-center logo-cont"><img src="assets/img/logo_vatrena.png" alt="Image" data-retina="true" ></div>
                        <hr>
                		<h4 class="regist-heading">Company Details</h4>
                       <form id="insert_free_vatrnea" method="POST">
                       		<div class="row">
		                        <div class="col-md-4">
		                            <div class="form-group ">
		                            	<label>User Name</label>
		                                <input type="text" class=" form-control regist" name="user_name"  placeholder="Company Poster">
		                            </div>
		                        </div>
		                        <div class="col-md-4">    
		                            <div class="form-group">
		                            	<label>Password</label>
		                                <input type="password" class=" form-control regist" name="password" id="password1" >
		                            </div>
		                        </div>
		                        <div class="col-md-4">
		                            <div class="form-group">
		                            	<label>Confirm password</label>
		                                <input type="password" class=" form-control regist" name="confPassword" id="password2">
		                            </div>
		                        </div>  
		                         <div class="col-md-6">
		                            <div class="form-group">
		                            	<label>Company English Name</label>
		                                <input type="text" class=" form-control regist" name="CompanyEnglish"  placeholder="Company English Name">
		                            </div>
		                        </div>  
		                        <div class="col-md-6">
		                            <div class="form-group">
		                            	<label>Company Arabic Name</label>
		                                <input type="text" class=" form-control regist" name="CompanyArabic" placeholder="Company Arabic Name">
		                            </div>
		                        </div> 
		                        <div class="col-md-6">
									<div class="form-group">
										<label>Categories</label>
										<select name="categories" style="width: 100%;height:30px">
											<option>Choose Country</option>
											<?php foreach($categories as $category): ?>
											<option value="<?= $category->keywords_id ?>"><?= $category->cat_keywords_en ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
		                        <div class="col-md-6">  
		                            <div class="form-group">
		                            	<label>Email</label>
		                                <input type="text" class=" form-control regist" name="email" placeholder="Avalible Email">
		                            </div>
		                        </div>
		                    </div>
		                    <hr>
		                    <h4 class="regist-heading">Address</h4>
		                    <!-- <hr> -->
		                    <div class="row">
								<div class="col-md-6">
		                            <div class="form-group">
		                                <label>Area</label>
		                                <select class="gover" name="area" style="width: 100%;height:30px">
		                                  <option>Choose Area</option>
			                              <?php foreach($area as $areas): ?>
			                                <option value="<?= $areas->gover_id ?>"><?= (is_arabic() ? $areas->gover_title_ar : $areas->gover_title); ?></option>
			                              <?php endforeach ?>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
										<label>Mohafaza</label>
										<select class="moh city_maker" name="moha" style="width: 100%;height:30px">
											<option></option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>City</label>
										<select class="district_maker city_appender" name="city" style="width: 100%;height:30px">
											<option></option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>District</label>
										<select class="district_appender" name="district" style="width: 100%;height:30px">
											<option></option>
										</select>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label>English Address</label>
										<input type="text" class="young-font form-control regist" name="englishAddress" placeholder="Number of building & street name English">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Arabic Address</label>
										<input type="text" class="young-font form-control regist" name="arabicAddress"  placeholder="Number of building & street name Arabic">
									</div>
								</div>
							</div>
							<hr>
							<h4 class="regist-heading">Description</h4>
							<!-- <hr> -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>English Describation</label>
										<!-- <input type="text" class="young-font form-control regist" placeholder="Wright any thing about your company Arabic"> -->
										<textarea class="young-font form-control regist" name="englishDescription" placeholder="Wright any thing about your company Arabic"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Arabic Describation</label>
										<!-- <input type="text" class="young-font form-control regist" placeholder="Wright any thing about your company English"> -->
										<textarea class="young-font form-control regist" name="arabicDescription"  placeholder="Wright any thing about your company English"></textarea>
									</div>
								</div>
							</div>
							<hr>
							<h4 class="regist-heading">Logo</h4>
							<!-- <hr> -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="hidden" name="logo">
										<div class="dropzone text-center drop-bord" action="<?=base_url('Home/post_logo_register')?>" id="m-dropzone-one">
                                        </div>
									</div>
								</div>
							</div>
							<hr>
							<h4 class="regist-heading">Contact Information</h4>
							<!-- <hr> -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Mobile</label>
										<input type="text" name="mobile[]" class="form-control regist" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<!-- <button class="add-btn del-btn">Delete Mobile</button> -->
										<button class="add-btn add-new-cont" data-number="1">Add Mobile</button>
									</div>
								</div>
								<div class="new-phone-container"></div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Telephone</label>
										<div class="tele">
											<input type="text" name="code[]" class=" form-control regist codes" placeholder="02">
											<input type="text" name="telephone[]" class=" form-control regist" placeholder="">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<button class="add-btn add-new-cont-telephone" data-number="1">Add Telephone</button>
									</div>
								</div>
								<div class="new-tele-container"></div>
							</div>
							
                       		
                            <div id="pass-info" class="clearfix"></div>
                            <button type="submit" class="btn_full">Create an account</button>
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