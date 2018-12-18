		<!-- <section class="parallax-window"  data-image-src="assets/bg1.jpg">
			<div class="parallax-content-2">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-8">
							<div class="img-src">
								<img src="https://www.vatrena.com/image.php?w=95&h=60&file=uploads/images/logo-anamel.jpg">
							</div>
							<h1><?= (is_arabic() ?  limit_text($vatrena->company_name_ar, 20) : limit_text($vatrena->company_name_en, 20)); ?></h1>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="bgphone">
								<i class="icon_set_1_icon-90"></i>
								<h4><span>Call</span> by phone</h4>
								<?php foreach($phone_numbers as $phone_number): ?>
								<a href="tel:<?= $phone_number->phone_number ?>" class="phone"><?= $phone_number->phone_number ?></a>
								<?php endforeach ?>
							</div>
							<div id="price_single_main">
								<span><?= $category ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->

		<div class=".container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<img src="assets/bg1.jpg">
						<div class="card-cover">
							<div class="bg-bord">
								<img src="assets/new_uploads/<?= $vatrena->logo ?>">
							</div>
							<h5 class="card-category"><?= (is_arabic() ?  limit_text($vatrena->company_name_ar, 20) : limit_text($vatrena->company_name_en, 20)); ?></h5>
						</div>
						<?php if($vatrena->bannar): ?>
						<div class="middle-bannar">
							<img src="<?= base_url() ?>assets/new_uploads/<?= $vatrena->bannar ?>">
						</div>
						<?php endif ?>
						<div class="middle-social">
							<ul>
								<?php if($vatrena->website): ?><li><a target="_blank" href="<?= $vatrena->website ?>"><i class="fas fa-globe-americas"></i></a></li><?php endif ?>
								<?php if($vatrena->instagram): ?><li><a target="_blank" href="<?= $vatrena->instagram ?>"><i class="fab fa-instagram"></i></a></li><?php endif ?>
								<?php if($vatrena->linkedin): ?><li><a target="_blank" href="<?= $vatrena->linkedin ?>"><i class="fab fa-linkedin"></i></a></li><?php endif ?>
								<?php if($vatrena->google_plus): ?><li><a target="_blank" href="<?= $vatrena->google_plus ?>"><i class="fab fa-google-plus-g"></i></a></li><?php endif ?>
								<?php if($vatrena->twitter): ?><li><a target="_blank" href="<?= $vatrena->twitter ?>"><i class="fab fa-twitter-square"></i></a></li><?php endif ?>
								<?php if($vatrena->facebook): ?><li><a target="_blank" href="<?= $vatrena->facebook ?>"><i class="fab fa-facebook"></i></a></li><?php endif ?>
							</ul>
						</div>
						<div class="phone-number">
							<?php if(!empty($phone_numbers)):?>
							<h4>Call Mobile</h4>
							<?php foreach($phone_numbers as $phone_number): ?>
							<a href="tel:<?= $phone_number->phone_number ?>" class="phone"><?= $phone_number->phone_number ?></a>
							<?php endforeach ?>
							<?php endif; ?>
							<?php //if(!array_key_exists(0 ,$arrayTele)){?>
							<?php if(count($arrayTele) > 0): ?><h4>Call Telephone</h4><?php endif ?>
							<?php foreach($arrayTele as $key => $tele): ?>
							<a href="tel:<?= $key ?><?= $tele ?>" class="phone"><?= !empty($tele) ?  $tele : '' ?></a>
							<?php endforeach ?>
						<?php //} ?>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<!-- End section -->

	<main>
		<div id="position">
			<div class="container">
				<span class="aalanspan"><?= is_arabic() ? $vatrena->adress_ar:$vatrena->adress_en  ?>, <?= get_moha_name($vatrena->mohafaza) ?>, <?= get_city_name($vatrena->city) ?>, <?= get_dist_name($vatrena->district) ?>, <?= get_area_name($vatrena->area) ?></span>
			</div>
		</div>
		<!-- End Position -->


		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-md-8" id="single_tour_desc">
					<div id="single_tour_feat">
						<ul class="tabs-single">
							<li><a href="#" class="But Album"><i class="icon_set_1_icon-12"></i>Albums</a></li>
							<li><a href="#" class="But Videos"><i class="icon_set_1_icon-34"></i>Videos</a></li>
							<li><a href="#" class="But Branches"><i class="icon_set_1_icon-49"></i>Branches</a></li>
							<li><a href="javascript:void(0)" class="But Views"><i class="icon_set_1_icon-46"></i><?= $vatrena->count_views ?> Views </a></li>
							<li><a href="#" class="But comment"><i class="icon_set_1_icon-85"></i>Comments</a></li>
							<li><a href="#" class="But Schedule"><i class="icon_set_1_icon-83"></i>Schedule</a></li>
						</ul>
					</div>

					<p class="visible-sm visible-xs"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>
					<!-- Map button for tablets/mobiles -->
					<?php //if($photos && !empty($vatrena->company_about_en) && !empty($vatrena->company_about)): ?>
					<div class="cont-desc">
						<?php if($photos): ?>
						<div id="Img_carousel" class="slider-pro Album_pic">
							<div class="sp-slides">
								<?php foreach($photos as $photo): ?>
								<div class="sp-slide center-block">
									<img alt="Image" class="sp-image img-responsive" src="assets/new_uploads/<?= $photo->photo ?>" data-src="assets/new_uploads/<?= $photo->photo ?>" data-small="assets/new_uploads/<?= $photo->photo ?>" data-medium="assets/new_uploads/<?= $photo->photo ?>" data-large="assets/new_uploads/<?= $photo->photo ?>" data-retina="assets/new_uploads/<?= $photo->photo ?>">
									<?php if($photo->desc_ar || $photo->desc_en): ?>
									<p class="sp-layer sp-black sp-padding" >
										<?= (is_arabic() ? $photo->desc_ar : $photo->desc_en); ?>
									</p>
									<?php endif; ?>
								</div>
								<?php endforeach; ?>
							</div>
							<div class="sp-thumbnails">
								<?php foreach($photos as $photo): ?>
									<img alt="Image" class="sp-thumbnail" src="assets/new_uploads/<?= $photo->photo ?>">
								<?php endforeach; ?>
							</div>
						</div>
						<?php //endif ?>
						<!-- <div class="cont-desc"> -->

						<?php if(!empty($vatrena->company_about) AND !empty($vatrena->company_about_en)): ?>

						<div class="row">
							<div class="col-md-3 marg-50">
								<h3>Description</h3>
							</div>
							<div class="col-md-12 marg-50">
								<p>
									<?= (is_arabic() ? $vatrena->company_about : $vatrena->company_about_en); ?>
								</p>
							</div>
						</div>
						<?php endif ?>
					</div>
					<?php endif; ?>
					<?php if($vatrena->starting_hour != ' ' AND $vatrena->ending_hour !=' ' || $vatrena->starting_hour != '' AND $vatrena->ending_hour !='' || $vatrena->starting_hour_night != ' ' AND $vatrena->ending_hour_night !=' ' || $vatrena->starting_hour_night != '' AND $vatrena->ending_hour_night !=''){ ?>
					<?php if($schedule): ?>
					<div class="cont-desc">	
						<div class="row Schedule_S ">
							<div class="col-md-3">
								<h3>Schedule</h3>
							</div>
							<div class="col-md-12">

								<div class=" table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>
													Days
												</th>
												<th>
													<?=is_arabic() ? 'فترة صباحية' : 'A.M' ?>
												</th>
												<?= is_night_shift_th($vatrena->companies_id) ?>
											</tr>
										</thead>
										<tbody>
											<?= $schedule ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<?php endif ?>
					<?php } ?>
					<?php if($videos): ?>
					<div class="cont-desc">
						<div class="row Videos_V">
							<?php foreach($videos as $video): ?>
							<div class="col-md-6">

								<h5><?= $video->video_name ?></h5>
								  
								<div class="videoWrapper videoWrapper169 js-videoWrapper">
								  
								    <iframe width="560" height="315" src="<?= $video->video_link ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								  
								</div>
								  
							</div>
							<?php endforeach ?>
						</div>
					</div>
					<hr>
				<?php endif ?>
					<!-- <div class="row Brances_V" id="Brances_B">
						<div class="col-md-3">
							<h3>Branches</h3>
						</div>
						<div class="col-md-9 spliter">
							<select class="form-control spliter get_district" data-bran="<?= $vatrena->companies_id ?>">
								<option value="">المدينة</option>
								<?= vatrenas_places($vatrena->companies_id); ?>
							</select>
							<select class="form-control spliter dist_cont get_bran" data-bran="<?= $vatrena->companies_id ?>">
								<option>الحى</option>
							</select>
						</div>
						<div class="col-md-3">
							
						</div>
						<div class="col-md-9">
							<table class="table">
							  <tbody class="bran_cont">
							  	<?php foreach($branches as $branch): ?>
							    	<tr>
							      		<td class="linkStyle"><a href="<?= base_url() ?>guide/<?= no_dashes($branch->company_name_en); ?>/<?= $branch->companies_id ?>"><?= $branch->company_name_ar ?></a></td>
							    	</tr>
								<?php endforeach; ?>
							  </tbody>
							</table>
						</div>
					</div> -->

					<div class="cont-desc">
						<div class="row">
							<div class="col-md-12">
								<h3>Reviews </h3>
								<a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Leave a review</a>
								<div id="general_rating">11 Reviews
									<div class="rating">
										<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<!-- End general_rating -->
								<div class="row" id="rating_summary">
									<div class="col-md-6">
										<ul>
											<li>Position
												<div class="rating">
													<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
												</div>
											</li>
											<li>Tourist guide
												<div class="rating">
													<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i>
												</div>
											</li>
										</ul>
									</div>
									<div class="col-md-6">
										<ul>
											<li>Price
												<div class="rating">
													<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
												</div>
											</li>
											<li>Quality
												<div class="rating">
													<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<!-- End row -->
								<hr>
								<div class="review_strip_single comment_c">
									<img src="assets/img/avatar1.jpg" alt="Image" class="img-circle">
									<small> - 10 March 2015 -</small>
									<h4>Jhon Doe</h4>
									<p>
										"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
									</p>
									<div class="rating">
										<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
									</div>
								</div>
								<!-- End review strip -->

								<div class="review_strip_single">
									<img src="assets/img/avatar3.jpg" alt="Image" class="img-circle">
									<small> - 10 March 2015 -</small>
									<h4>Jhon Doe</h4>
									<p>
										"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
									</p>
									<div class="rating">
										<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
									</div>
								</div>
								<!-- End review strip -->

								<div class="review_strip_single last">
									<img src="assets/img/avatar2.jpg" alt="Image" class="img-circle">
									<small> - 10 March 2015 -</small>
									<h4>Jhon Doe</h4>
									<p>
										"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
									</p>
									<div class="rating">
										<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
									</div>
								</div>
								<!-- End review strip -->
							</div>
						</div>
					</div>
				</div>
				<!--End  single_tour_desc-->

				<aside class="col-md-4">

					<!-- <div class="box_style_4">
						<i class="icon_set_1_icon-90"></i>
						<h4><span>Call</span> by phone</h4>
						<?php foreach($phone_numbers as $phone_number): ?>
						<a href="tel:<?= $phone_number->phone_number ?>" class="phone"><?= $phone_number->phone_number ?></a>
						<?php endforeach ?>
					</div> -->

					<p class="hidden-sm hidden-xs">
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">موقعها على الخريطة</a>
					</p>
					<!--<?php base_url() ?>guide/<?= no_dashes($branch->company_name_en); ?>/<?= $branch->companies_id ?>-->
					<?php if($branches): ?>
					<div class="controy" id="Branches_B">
						<div class="list-branch">
							<h5 class="branch-head">الفروع</h5>
							<?php foreach($branches as $branch): ?>
								<div class="sdiv">
									<a class="toggleDetials" data-br=".tog<?= $branch->companies_id ?>" data-case="closed" data-comp="<?= $branch->companies_id ?>" href="<?= base_url() ?>guide/<?= no_dashes($branch->company_name_en); ?>/<?= $branch->companies_id ?>"><?= is_arabic() ? $branch->company_name_ar:$branch->company_name_en  ?></a>
								</div>
								<div class="DetialsApp tog<?= $branch->companies_id ?>">
									
								</div>
							<?php endforeach ?>
							
						</div>
					</div>
					<?php endif ?>

				</aside>
			</div>
			<!--End row -->
		</div>
		<!--End container -->
        
        <div id="overlay"></div>
		<!-- Mask on input focus -->
        
	</main>