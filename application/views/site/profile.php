	<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

	<main>
		<div class=" container">
			<div id="tabs" class="tabs">
				
				<div class="labdiv">
					<h3>Manage Your Vatrena</h3>
				</div>

				<div class="content mainy">

					<section id="section-1">
						<div class="row">
							<div class="col-md-2">
								<div class="vat-box">
									<h6 class="font-vatcoin"><?= $user->user_name ?></h6>
									<img src="assets/img/logo_vatrena.png" class="logo-vat">
								</div>
							</div>
							<div class="col-md-2">
								<div class="vat-box">
									<h6 class="font-vatcoin">Your Debt</h6>
									<!-- <h5 class="vat-coin">500<span class="v-icon">V<span class="c-icon">C</span></span></h5> -->
									<h5 class="vat-coin"><span class="v-icon cost-counter"><?= $debt ?> L.E</span></h5>
								</div>
							</div>
							<div class="col-md-2">
								<div class="vat-box">
									<h6 class="font-vatcoin">you paid</h6>
									<!-- <h5 class="vat-coin">500<span class="v-icon">V<span class="c-icon">C</span></span></h5> -->
									<h5 class="vat-coin"><span class="v-icon cost-counter"><?= $debt ?> L.E</span></h5>
								</div>
							</div>
							<div class="col-md-5">
								<div class="vat-box">
									<h6 class="font-vatcoin">Vatrena Progress</h6>
									<p>this progress bar tells you how many vat coin you have used from your balance</p>
									<div class="progress">
									  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
									</div>
								</div>
							</div>
						</div>
							<div class="row">
								<div class="col-md-12 tab-cont">
								   <div class="main-tab"  role="tablist">
								        <a class="leto-tab tab-controller  active"  href="#nav-home" data-class="photo-body">Photos</a>
								        <a class="leto-tab tab-controller" href="#nav-profile" data-class="Videos-body">Videos</a>
								        <a class="leto-tab tab-controller" href="#nav-contact" data-class="Categories-keywords-body">Categories & Keywords</a>
								        <a class="leto-tab tab-controller" href="#nav-contact" data-class="Social-website-body">Social Media & website</a>
								        <a class="leto-tab tab-controller" href="#nav-contact" data-class="domain-body">domain</a>
								        <a class="leto-tab tab-controller" href="#nav-contact" data-class="Working-body">Working Hours</a>
								        <a class="leto-tab tab-controller" href="#nav-contact" data-class="Files-body">Files</a>
								        <a class="leto-tab tab-controller" href="#nav-contact" data-class="commerce-body">E-commerce</a>
								        <a class="leto-tab tab-controller" href="#nav-contact" data-class="Branches-body">Branches</a>
								   </div>
								   <div class="body-tab photo-body body-active body-contoller">
							   		<div class="row">
							   			<div class="col-md-6">
							   				<div class='album-maker'>
							   					<div class="album-changer">
						   							<form id="album_maker" method="POST">
									   					<h6 class="album-Maker">Album Maker</h6>
									   					<div class="dropzone text-center drop-bord dropMaker moh" action="<?=base_url('Home/post_picture_album')?>" id="m-dropzone-one" data-albname="false">
	                                        			</div>
	                                        			<!-- <div class="form-group first-inp">
	                                        				<label>Album Name</label>
	                                        				<input type="text" name="album_name" class="form-control desc-ar desc-gator-ar" placeholder="Album name: T-shirst">
									   					</div> -->
									   					<input class="reset-val" type="hidden" name="img">
									   					<input class="hide_photo_alb" type="hidden" name="photo_album">

	                                        			<div class="form-group">
	                                        				<label>Description Arabic</label>
	                                        				<textarea type="text" name="desc_ar" class="form-control desc-ar desc-gator-ar reset-val" placeholder="Description Arabic"></textarea>
									   					</div>
	                                        			<div class="form-group">
	                                        				<label>Description English</label>
	                                        				<textarea type="text" name="desc_en" class="form-control desc-en desc-gator-en reset-val" placeholder="Description English"></textarea>
	                                        			</div>
	                                        			<button type="submit" class="btn_full btn-alb class-sv">Choose A Photo</button>
                                					</form>
                                    			</div>
                                    			<div class="album-names">
                                    				<form class="create-alb" method="POST">
									   					<h6 class="album-Maker">Create Album</h6>
									   					<input class="photo_ids" type="hidden" name="photo_ids">
									   					<input class="photo_counter" type="hidden" name="photo_counter">

									   					<div class="form-group pad-sizing">
	                                        				<label>Create Album Name Arabic</label>
	                                        				<input type="text" name="album_name_ar" class="form-control desc-ar desc-gator-ar" placeholder="مثال: تي شيرت">
									   					</div>
									   					<div class="form-group ">
	                                        				<label>Create Album Name English</label>
	                                        				<input type="text" name="album_name_en" class="form-control desc-ar desc-gator-ar" placeholder="Album name: T-shirst">
									   					</div>
	                                        			<button type="submit" class="btn_full btn-alb class-album class-sv">Create an Album</button>
                                        			</form>
                                    			</div>
							   				</div>
							   			</div>
							   			<div class="col-md-6">
							   				<div class="album-preview">
							   					<h6 class="album-Preview album-appender">Album Preview</h6>
								   				
							   					<div class="owl-carousel owl-theme appender" data-apptype="html">
												    <div class="items notitems"><strong>475×250</strong></div>
												</div>
												<div class="same-class">
								   					<button class="btn_full btn-alb class-sv save_album class-sv" data-action="<?= current_url() ?>">Save Album</button>
												</div>
							   				</div>
							   			</div>
							   		</div>
								   		<?php foreach($slider as $slid): ?>
								   		<div class="row del-albo<?= $slid->photo_cat_id ?>">
								   			<div class="col-md-12">
							   					<div class='album-boxes'>
							   						<div class="row">
	                                    				<div class="col-md-4 ">
		                                    				<div class="owl-one owl-carousel owl-theme">
															    <?= get_albums_photos($slid->photo_cat_id); ?>
															</div>
	                                    				</div>
														<div class="col-md-8">
															<div class="details-list">
																<h5>Created Album - <?= $slid->photo_category_en ?></h5>
															</div>
															<p class="p-deta">Use your edit Or Delete To improve your data On the Searching</p>
															<div class="Btns">
																<button class="edit-album add-al" data-id="<?= $slid->photo_cat_id ?>">Add Photo</button>
																<button class="edit-album edit-alb" data-id="<?= $slid->photo_cat_id ?>">Edit</button>
																<button class="del-alb delete-album" data-id="<?= $slid->photo_cat_id ?>">Delete Album</button>
															</div>
														</div>
							   						</div>
							   						<div class="edit-cont<?= $slid->photo_cat_id ?>"></div>
							   						<div class="edit-form<?= $slid->photo_cat_id ?>">
							   							
							   						</div>
							   						<div class="add-form<?= $slid->photo_cat_id ?>">
                                    			</div>
							   				</div>
							   			</div>
								   		</div>
								   		<?php endforeach; ?>
								   </div>
								   <div class="body-tab Videos-body body-none body-contoller">
								   		<div class="row">
								   			<div class="col-md-6">
								   				<div class='album-maker'>
                                        			<div class="album-names">
                                        				<form class="create-vid" method="POST">
										   					<h6 class="album-Maker">Create Video</h6>
										   					<input class="photo_ids" type="hidden" name="photo_ids">

										   					<div class="form-group pad-sizing-video">
		                                        				<label>Video Title Arabic</label>
		                                        				<input type="text" name="video_title_ar" class="form-control desc-ar desc-gator-ar" placeholder="أسم الفديو عربي">
										   					</div>
										   					<div class="form-group ">
		                                        				<label>Video Title English</label>
		                                        				<input type="text" name="video_title_en" class="form-control desc-ar desc-gator-ar" placeholder="Video Title Arabic">
										   					</div>
										   					<div class="form-group ">
		                                        				<label>Youtube Link</label>
		                                        				<input type="text" name="youtube_link" class="form-control desc-ar desc-gator-ar" placeholder="https://www.youtube.com/watch?v=KVGQWE7T1A">
										   					</div>
		                                        			<button type="submit" class="btn_full btn-alb class-album-video class-sv">Add Video</button>
	                                        			</form>
                                        			</div>
								   				</div>
								   			</div>
								   			<div class="col-md-6">
								   				<div class="album-preview ">
								   					<h6 class="album-Preview album-appender">Video Preview</h6>
									   				<!-- <button class="btn_full btn-alb class-sav class-rem remove-album">Remove Video</button> -->
								   					<div class="owl-carousel-vid owl-theme video-appender pad-sizing-video" data-apptype="html">
													    <div class="items notitems"><strong>VIDEO</strong></div>
													</div>
								   				</div>
								   			</div>
								   		</div>
								   </div>
								   <div class="body-tab Categories-keywords-body body-none body-contoller">
								   	   <div class="row">
								   	   		<div class="col-md-12">
								   	   			<div class="kat-cont">
								   	   				<h5 class="ad-kat">Add Keywords</h5>
								   	   				<div class="row">
								   	   					<div class="col-md-4">
										   	   				<div class="keyword-con">
										   	   					<div class="keyword-form same-section">
										   	   						<form class="user-add-keyword" method="POST">
										   	   							<div class="form-group">
										   	   								<label>Keyword Arabic</label>
																			<input type="text" name="keyword_arabic" class="form-control mar-form">
										   	   							</div>
										   	   							<div class="form-group">
										   	   								<label>Keyword English</label>
																			<input type="text" name="keyword_arabic" class="form-control mar-form">
										   	   							</div>
										   	   							<button type="submit" class="add-keyword">Add Keyword</button>
										   	   						</form>
										   	   					</div>
										   	   				</div>
								   	   					</div>
								   	   					<div class="col-md-8">
								   	   						<div class="keyword-prev">
										   	   					<div class="keyword-form same-section">
										   	   						<h5 class="keywords-pre">Keywords Preview</h5>
										   	   						<div class="thekeyword"><span>car</span><i class="icon_pencil-edit"></i></div>
										   	   						<div class="thekeyword"><span>car</span><i class="icon_pencil-edit"></i></div>
										   	   						<div class="thekeyword"><span>car</span><i class="icon_pencil-edit"></i></div>
										   	   						<div class="thekeyword"><span>car</span><i class="icon_pencil-edit"></i></div>
										   	   						<div class="thekeyword"><span>car</span><i class="icon_pencil-edit"></i></div>
										   	   					</div>
										   	   				</div>
								   	   					</div>
								   	   					<div class="col-md-12">
								   	   						<div class="keyword-edit">
										   	   					<div class="keyword-form same-section">

										   	   						<form>
										   	   							<span class="edit-h">Editing Keyword</span>
										   	   							<input type="text" name="edit_keyword_arabic" class="input-keyword" value="سيارة">
										   	   							<input type="text" name="edit_keyword_english" class="input-keyword" value="Car">
										   	   							<button type="submit" class="edit-keyword">Edit Keyword</button>
										   	   						</form>
										   	   						<!-- <h5 class="keywords-pre">Keywords Preview</h5> -->
										   	   					</div>
										   	   				</div>
								   	   					</div>
								   	   				</div>
								   	   				
								   	   				<h5 class="ad-kat">Add Categories</h5>
								   	   				<div class="row">
								   	   					<div class="col-md-4">
										   	   				<div class="keyword-con">
										   	   					<div class="keyword-form same-section">
										   	   						<form class="user-add-keyword" method="POST">
										   	   							<div class="form-group">
										   	   								<label>Category Arabic</label>
																			<input type="text" name="keyword_arabic" class="form-control mar-form">
										   	   							</div>
										   	   							<div class="form-group">
										   	   								<label>Category English</label>
																			<input type="text" name="keyword_arabic" class="form-control mar-form">
										   	   							</div>
										   	   							<button type="submit" class="add-keyword">Add Category</button>
										   	   						</form>
										   	   					</div>
										   	   				</div>
								   	   					</div>
								   	   					<div class="col-md-8">
								   	   						<div class="keyword-prev">
										   	   					<div class="keyword-form same-section">
										   	   						<h5 class="keywords-pre">Categoies Preview</h5>
										   	   						<div class="thekeyword"><span>car</span><i class="icon_pencil-edit"></i></div>
										   	   						<div class="thekeyword"><span>car</span><i class="icon_pencil-edit"></i></div>
										   	   						<div class="thekeyword"><span>car</span><i class="icon_pencil-edit"></i></div>
										   	   						<div class="thekeyword"><span>car</span><i class="icon_pencil-edit"></i></div>
										   	   						<div class="thekeyword"><span>car</span><i class="icon_pencil-edit"></i></div>
										   	   					</div>
										   	   				</div>
								   	   					</div>
								   	   					<div class="col-md-12 form-pady">
								   	   						<div class="keyword-edit">
										   	   					<div class="keyword-form same-section ">
										   	   						<form>
										   	   							<span class="edit-h">Editing Category</span>
										   	   							<input type="text" name="edit_keyword_arabic" class="input-keyword" value="سيارة">
										   	   							<input type="text" name="edit_keyword_english" class="input-keyword" value="Car">
										   	   							<button type="submit" class="edit-keyword">Edit Category</button>
										   	   						</form>
										   	   						<!-- <h5 class="keywords-pre">Keywords Preview</h5> -->
										   	   					</div>
										   	   				</div>
								   	   					</div>
								   	   				</div>
								   	   			</div>
								   	   		</div>
								   	   </div>
								   </div>
								   <div class="body-tab Social-website-body body-none body-contoller">
								        <div class="row">
								        	<div class="col-md-12">
								        		<div class="form-holder">
								        			<h5 class="ad-kat">Social Media Links</h5>
								        			<form class="add-social Media" method="POST">
								        				<div class="row">
									        				<div class="col-md-4">
										        				<div class="form-group">
										        					<label>Facebook</label>
										        					<input type="text" class="form-control height-input" name="Facebook">
										        				</div>
										        			</div>
										        			<div class="col-md-4">
										        				<div class="form-group">
										        					<label>Twitter</label>
										        					<input type="text" class="form-control height-input" name="Twitter">
										        				</div>
										        			</div>
										        			<div class="col-md-4">
										        				<div class="form-group">
										        					<label>Google plus</label>
										        					<input type="text" class="form-control height-input" name="google_plus">
										        				</div>
										        			</div>
										        			<div class="col-md-4">
										        				<div class="form-group">
										        					<label>Linkedin</label>
										        					<input type="text" class="form-control height-input" name="linkedin">
										        				</div>
										        			</div>
										        			<div class="col-md-4">
										        				<div class="form-group">
										        					<label>Instagram</label>
										        					<input type="text" class="form-control height-input" name="instagram">
										        				</div>
										        			</div>
										        			<div class="col-md-4">
										        				<div class="form-group">
										        					<label>Website</label>
										        					<input type="text" class="form-control height-input" name="website">
										        				</div>
										        			</div>
										        			<div class="col-md-12">
										        				<button type="submit" class="button-media">Save Links</button>
										        			</div>
									        			</div>
								        			</form>
								        			<h5 class="ad-kat">Current Links</h5>
								        			<div class="row">
								        				<div class="col-md-12">
								        					<div class="center-content">
								        						<i class="icon-facebook-squared ico"></i>
								        						<i class="icon-twitter ico"></i>
								        						<i class="icon-googleplus-rect ico"></i>
								        						<i class="icon-linkedin-rect ico"></i>
								        						<i class="icon-instagramm ico"></i>
								        						<i class="icon-website ico"></i>
								        					</div>
								        				</div>
								        				<div class="col-md-4">
								        					<div class="tag-meida"><i class="icon-facebook-squared icos"> Facebook</i> <i class="icon-edit-alt"></i></div>
								        				</div>
								        				<div class="col-md-4">
								        					<div class="tag-meida"><i class="icon-twitter icos"> Twitter</i> <i class="icon-edit-alt"></i></div>
								        				</div>
								        				<div class="col-md-4">
								        					<div class="tag-meida"><i class="icon-googleplus-rect icos"> Google plus</i> <i class="icon-edit-alt"></i></div>
								        				</div>
								        				<div class="col-md-4">
								        					<div class="tag-meida"><i class="icon-linkedin-rect icos"> Linkedin</i> <i class="icon-edit-alt"></i></div>
								        				</div>
								        				<div class="col-md-4">
								        					<div class="tag-meida"><i class="icon-instagramm icos"> Instagram</i> <i class="icon-edit-alt"></i></div>
								        				</div>
								        				<div class="col-md-4">
								        					<div class="tag-meida"><i class="icon-website icos"> Website</i> <i class="icon-edit-alt"></i></div>
								        				</div>
								        			</div>
								        		</div>
								        	</div>
								        </div>
								   </div>
								   <div class="body-tab domain-body body-none body-contoller">
								   		<div class="row">
								        	<div class="col-md-12">
								        		<div class="domin-holder">
								        			<h5 class="ad-kat">Social Media Links</h5>
								        			<form class="add-social Media" method="POST">
								        				<div class="row">
									        				<div class="col-md-6">
										        				<div class="form-group">
										        					<label>Ordered Domin</label>
										        					<input type="text" class="form-control height-input" name="Facebook">
										        				</div>
										        			</div>
										        			<div class="col-md-6">
										        				<button type="submit" class="button-media">Save Links</button>
										        			</div>
									        			</div>
								        			</form>
								        		</div>
								        	</div>
								        </div>
								   </div>
								   <div class="body-tab Working-body body-none body-contoller">
								   		<div class="row">
								        	<div class="col-md-12">
								        		<div class="working-holder">
								        			<h5 class="ad-kat">Working Holder</h5>
								        			<form class="add-working hours" method="POST">
								        				<div class="row">
									        				<div class="col-md-3">
										        				<div class="form-group">
										        					<label>Starting hour</label>
													                <div class='input-group date datetimepicker3'>
													                    <input type='text' class="form-control" />
													                    <span class="input-group-addon">
													                        <span class="glyphicon glyphicon-time"></span>
													                    </span>
													                </div>
													            </div>										        			
													        </div>
										        			<div class="col-md-3">
										        				<div class="form-group">
										        					<label>Endding hour</label>
										        					<div class='input-group date datetimepicker3'>
													                    <input type='text' class="form-control" />
													                    <span class="input-group-addon">
													                        <span class="glyphicon glyphicon-time"></span>
													                    </span>
													                </div>
										        				</div>
										        			</div>
										        			<div class="col-md-3">
										        				<div class="form-group">
										        					<label>Night Shift Starting</label>
										        					<div class='input-group date datetimepicker3'>
													                    <input type='text' class="form-control" />
													                    <span class="input-group-addon">
													                        <span class="glyphicon glyphicon-time"></span>
													                    </span>
													                </div>
										        				</div>
										        			</div>
										        			<div class="col-md-3">
										        				<div class="form-group">
										        					<label>Night Shift Endding</label>
										        					<div class='input-group date datetimepicker3'>
													                    <input type='text' class="form-control" />
													                    <span class="input-group-addon">
													                        <span class="glyphicon glyphicon-time"></span>
													                    </span>
													                </div>
										        				</div>
										        			</div>
										        			<div class="col-md-6">
										        				<div class="form-group">
										        					<label>Closed Day 1</label>
										        					<select name="day1" class="day-dropy form-control">
										        						<option value="Friday">Friday</option>
										        						<option value="Saturday">Saturday</option>
										        						<option value="Sunday">Sunday</option>
										        						<option value="Monday">Monday</option>
										        						<option value="Tuesday">Tuesday</option>
										        						<option value="Wednesday">Wednesday</option>
										        						<option value="Thursday">Thursday</option>
										        					</select>
										        				</div>
										        			</div>
										        			<div class="col-md-6">
										        				<div class="form-group">
										        					<label>Closed Day 2</label>
										        					<select name="day2" class="day-dropy form-control">
										        						<option value="Friday">Friday</option>
										        						<option value="Saturday">Saturday</option>
										        						<option value="Sunday">Sunday</option>
										        						<option value="Monday">Monday</option>
										        						<option value="Tuesday">Tuesday</option>
										        						<option value="Wednesday">Wednesday</option>
										        						<option value="Thursday">Thursday</option>
										        					</select>
										        				</div>
										        			</div>
										        			<div class="col-md-6">
										        				<button type="submit" class="button-media working-btn">Save System Mangment</button>
										        			</div>
									        			</div>
								        			</form>
								        		</div>
								        	</div>
								        </div>
								   </div>
								   <div class="body-tab Files-body body-none body-contoller">
								   		<div class="row">
								        	<div class="col-md-12">
								        		<div class="file-holder">
								        			<h5 class="ad-kat">Uploading files</h5>
								        			<div class="row">
								        				<div class="col-md-6">
								        					
								        					<h5 class="ad-kat uploader-head">File Uploader</h5>
								        					
								        					<form class="file_inserter">
	                                        					<div class="col-md-12">
		                                        					<div class="form-group">
		                                        						<label>File Name</label>
		                                        						<input type="text" class="form-control" name="filename">
		                                        					</div>
	                                        					</div>
	                                        					<div class="col-md-12">
	                                        						<div class="dropzone text-center drop-bord dropMakerFiles app-cont" action="<?=base_url('Home/upload_file')?>" id="m-dropzone-file" data-albname="false">
	                                        						</div>
	                                        					</div>
	                                        					<div class="col-md-12">
	                                        						<button class="btnUpload">Upload File</button>
	                                        					</div>
	                                        				</form>
	                                        				
								        				</div>
								        				<div class="col-md-6">
								        					<h5 class="ad-kat">All Uploaded Files</h5>
								        					<div class="file-holding">
																<div row>
																	<div class="col-md-12">
																		<div class="scrollbar" id="style-3">
																		    <div class="force-overflow">
																		    	<div class="file-conta">
																					<span><i class="icon-folder-4"></i> FileName.pdf</span>
																					<span class="first-span"><i class="icon-trash-4"></i><i class="icon-edit-alt"></i></span>
																				</div>
																				<div class="file-conta">
																					<span><i class="icon-folder-4"></i> FileName.pdf</span>
																					<span class="first-span"><i class="icon-trash-4"></i><i class="icon-edit-alt"></i></span>
																				</div>
																				<div class="file-conta">
																					<span><i class="icon-folder-4"></i> FileName.pdf</span>
																					<span class="first-span"><i class="icon-trash-4"></i><i class="icon-edit-alt"></i></span>
																				</div>
																				<div class="file-conta">
																					<span><i class="icon-folder-4"></i> FileName.pdf</span>
																					<span class="first-span"><i class="icon-trash-4"></i><i class="icon-edit-alt"></i></span>
																				</div>
																				<div class="file-conta">
																					<span><i class="icon-folder-4"></i> FileName.pdf</span>
																					<span class="first-span"><i class="icon-trash-4"></i><i class="icon-edit-alt"></i></span>
																				</div>
																				<div class="file-conta">
																					<span><i class="icon-folder-4"></i> FileName.pdf</span>
																					<span class="first-span"><i class="icon-trash-4"></i><i class="icon-edit-alt"></i></span>
																				</div>
																				<div class="file-conta">
																					<span><i class="icon-folder-4"></i> FileName.pdf</span>
																					<span class="first-span"><i class="icon-trash-4"></i><i class="icon-edit-alt"></i></span>
																				</div>
																				<div class="file-conta">
																					<span><i class="icon-folder-4"></i> FileName.pdf</span>
																					<span class="first-span"><i class="icon-trash-4"></i><i class="icon-edit-alt"></i></span>
																				</div>
																		    </div>
																		</div>
																	</div>
																</div>								        						
								        					</div>
								        				</div>
								        			</div>
								        		</div>
								        	</div>
								        </div>

								   </div>
								   <div class="body-tab Branches-body body-none body-contoller">
								   		<div class="row">
								   			<div class="col-md-12">
								   				<div class="branch-holding">
								   					
								   				</div>
								   			</div>
								   		</div>
								   </div>
								   <div class="body-tab commerce-body body-none body-contoller">E-Commerce</div>
								</div>
							</div>
						</div>
					</section>
					<!-- End section 4 -->

					

					</div>
					<!-- End content -->
				</div>
				<!-- End tabs -->
			</div>
			<!-- end container -->
	</main>
	<!-- End main -->


<script src="<?=base_url('assets/js/dropzone.js')?>"></script>
<script>
        // multiple file upload

        // var album_name = $('#m-dropzone-one').attr('data-albname');

        // if(album_name == 'true'){
        	
        // 	$('#m-dropzone-one').on('click', function(){
        // 		$('.album-preview').hide();
        // 		return false;
        // 	});

        // }else{

        	


        
        // }

        var myDropzone = new Dropzone(".add-photo-al", {
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

            	// var response=JSON.parse(response);
            	// if (!('status' in response))
            	// 	return false;

            	// if(response.status == 'success'){
	            //     var old=$(document).find('[name=img]').val(), mark='';
	            //     if(old)
	            //         mark=',';

	            //     $(document).find('[name=img]').val(old+mark+response.filename);
	            //     $('.').html('<div class="item"><img src="./assets/new_uploads/'+response.filename+'"></div>')
            	// }
	            // else{
	            // 	alert(response.error);
	            // }
            	var response=JSON.parse(response);
            	if (!('status' in response))
            		return false;

            	if(response.status == 'success')
	                $(document).find('[name=img]').val(response.filename);
	            else
	            	alert(response.error);

	            myDropzone.removeFile(file);
            }

        });

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

            	// var response=JSON.parse(response);
            	// if (!('status' in response))
            	// 	return false;

            	// if(response.status == 'success'){
	            //     var old=$(document).find('[name=img]').val(), mark='';
	            //     if(old)
	            //         mark=',';

	            //     $(document).find('[name=img]').val(old+mark+response.filename);
	            //     $('.').html('<div class="item"><img src="./assets/new_uploads/'+response.filename+'"></div>')
            	// }
	            // else{
	            // 	alert(response.error);
	            // }
            	var response=JSON.parse(response);
            	if (!('status' in response))
            		return false;

            	if(response.status == 'success')
	                $(document).find('[name=img]').val(response.filename);
	            else
	            	alert(response.error);

	            myDropzone.removeFile(file);
            }

        });

        var myDropzone = new Dropzone("#m-dropzone-file", {
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

            	// var response=JSON.parse(response);
            	// if (!('status' in response))
            	// 	return false;

            	// if(response.status == 'success'){
	            //     var old=$(document).find('[name=img]').val(), mark='';
	            //     if(old)
	            //         mark=',';

	            //     $(document).find('[name=img]').val(old+mark+response.filename);
	            //     $('.').html('<div class="item"><img src="./assets/new_uploads/'+response.filename+'"></div>')
            	// }
	            // else{
	            // 	alert(response.error);
	            // }
            	var response=JSON.parse(response);
            	if (!('status' in response))
            		return false;

            	if(response.status == 'success')
	                $(document).find('[name=img]').val(response.filename);
	            else
	            	alert(response.error);

	            myDropzone.removeFile(file);
            }

        });

</script>