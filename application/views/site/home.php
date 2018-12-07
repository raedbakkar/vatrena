	<div class="home-search">
		<!-- <div class="home-search">
		
		</div> -->
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="headic">	
						<h1>Explore your City’s Finest</h1>
						<h5>vatrena help you to find hotels, restaurents, shops, places to visit, etc in over 150+ Cities</h5>
					</div>	
					<div id="search">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tours" data-toggle="tab">دليل فاترينا</a></li>
							<li><a href="#hotels" data-toggle="tab">المنتجات للبيع اون لاين</a></li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane active" id="tours">
								<h3></h3>
								<form method="GET" action="<?= base_url() ?>finder">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="laby"><?= lang('v_search_dalil') ?></label>
												<input type="hidden" name="search_type">
												<input type="hidden" name="search_type_id">
												<input type="text" class="form-control controly" value="" name="guide_search_input" autocomplete="off" placeholder="ابحث بأسم الشركة - نوع النشاط - التليفون - العنوان">
												<div class="recommendation">
													<h4 class="head-list"><i class="fa fa-search"></i> categories</h4>
													<ul class="category"> </ul>

													<h4 class="head-list"><i class="fa fa-search"></i> keywords</h4>
													<ul class="keyword"> </ul>
													
													<h4 class="head-list"><i class="fa fa-search"></i> companies</h4>
													<ul class="related-category"> </ul>
													
													<h4 class="head-list"><i class="fa fa-search"></i> Brands</h4>
													<ul class="brand"> </ul>
												</div>
											</div>
										</div>
										
										<div class="col-md-6">
											<label>المنطقة</label>
											<div class="form-group">
												<select class=" gover" name="area" style="width: 100%;height:30px">
												  <option></option>
												<?php foreach($area as $areas): ?>
												  <option value="<?= $areas->gover_id ?>"><?= (is_arabic() ? $areas->gover_title_ar : $areas->gover_title); ?></option>
												<?php endforeach ?>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<label>المحافظه</label>
											<div class="form-group">
												<select class="moh city_maker" name="moha" style="width: 100%;height:30px">
													<option></option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<label>المدينة</label>
											<div class="form-group">
												<select class="district_maker city_appender" name="city" style="width: 100%;height:30px">
													<option></option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<label>الحى</label>
											<div class="form-group">
												<select class="district_appender" name="district" style="width: 100%;height:30px">
													<option></option>
												</select>
											</div>
										</div>
										
									</div>
									<!-- End row -->
									<hr>
									<input type="hidden" value="" name="near_me">
									<button type="submit" class="btn_1 green"><i class="icon-search"></i>Search now</button>
									<button  class="btn_1 green"><i class="icon-location"></i>بالقرب مني</button>
								</form>
							</div>
							<!-- End rab -->
							<div class="tab-pane" id="hotels">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>البحث في المنتجات</label>
											<input type="text" class="form-control" name="firstname_booking" placeholder="ادخل اسم او نوع المنتج الذي تريد البحث عنه وشرائه">
										</div>
									</div>
									<div class="col-md-6">
										<label>التصنيف</label>
										<div class="form-group">
											<select class="gene-category" name="category" style="width: 100%;height:30px">
											  <?php foreach($category as $categories): ?>
											  	<option value="<?= $categories->keywords_id ?>"><?= (is_arabic() ? $categories->keyword_title : $categories->cat_keywords_en); ?></option>
											  <?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<label>السعر من</label>
										<div class="form-group">
											<select class="district_maker city_appender" name="state" style="width: 100%;height:30px">
												<option></option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<label>السعر إلي</label>
										<div class="form-group">
											<select class="district_maker city_appender" name="state" style="width: 100%;height:30px">
												<option></option>
											</select>
										</div>
									</div>
									<div class="gene-attr"></div>
								</div>
								<hr>
								<button class="btn_1 green"><i class="icon-search"></i>Search now</button>
							</div>
							<div class="tab-pane" id="transfers">
								<h3>Search Transfers in Paris</h3>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="select-label">Pick up location</label>
											<select class="form-control">
												<option value="orly_airport">Orly airport</option>
												<option value="gar_du_nord">Gar du Nord Station</option>
												<option value="hotel_rivoli">Hotel Rivoli</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="select-label">Drop off location</label>
											<select class="form-control">
												<option value="orly_airport">Orly airport</option>
												<option value="gar_du_nord">Gar du Nord Station</option>
												<option value="hotel_rivoli">Hotel Rivoli</option>
											</select>
										</div>
									</div>
								</div>
								<!-- End row -->
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label><i class="icon-calendar-7"></i> Date</label>
											<input class="date-pick form-control" data-date-format="M d, D" type="text">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><i class=" icon-clock"></i> Time</label>
											<input class="time-pick form-control" value="12:00 AM" type="text">
										</div>
									</div>
									<div class="col-md-2 col-sm-3">
										<div class="form-group">
											<label>Adults</label>
											<div class="numbers-row">
												<input type="text" value="1"  class="qty2 form-control" name="quantity">
											</div>
										</div>
									</div>
								</div>
								<!-- End row -->
								<hr>
								<button class="btn_1 green"><i class="icon-search"></i>Search now</button>
							</div>
							<div class="tab-pane" id="restaurants">
								<h3>Search Restaurants in Paris</h3>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Search by name</label>
											<input type="text" class="form-control" id="restaurant_name" name="restaurant_name" placeholder="Type your search terms">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Food type</label>
											<select class="ddslick" name="category_2">
												<option value="0" data-imagesrc="assets/img/icons_search/all_restaurants.png" selected>All restaurants</option>
												<option value="1" data-imagesrc="assets/img/icons_search/fast_food.png">Fast food</option>
												<option value="2" data-imagesrc="assets/img/icons_search/pizza_italian.png">Pizza / Italian</option>
												<option value="3" data-imagesrc="assets/img/icons_search/international.png">International</option>
												<option value="4" data-imagesrc="assets/img/icons_search/japanese.png">Japanese</option>
												<option value="5" data-imagesrc="assets/img/icons_search/chinese.png">Chinese</option>
												<option value="6" data-imagesrc="assets/img/icons_search/bar.png">Coffee Bar</option>
											</select>
										</div>
									</div>
								</div>
								<!-- End row -->
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label><i class="icon-calendar-7"></i> Date</label>
											<input class="date-pick form-control" data-date-format="M d, D" type="text">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><i class=" icon-clock"></i> Time</label>
											<input class="time-pick form-control" value="12:00 AM" type="text">
										</div>
									</div>
									<div class="col-md-2 col-sm-3 col-xs-6">
										<div class="form-group">
											<label>Adults</label>
											<div class="numbers-row">
												<input type="text" value="1"  class="qty2 form-control" name="adults">
											</div>
										</div>
									</div>
									<div class="col-md-2 col-sm-3 col-xs-6">
										<div class="form-group">
											<label>Children</label>
											<div class="numbers-row">
												<input type="text" value="0" class="qty2 form-control" name="children">
											</div>
										</div>
									</div>

								</div>
								<!-- End row -->
								<hr>
								<button class="btn_1 green"><i class="icon-search"></i>Search now</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<main class="mainy">

<!-- TESTIMONIALS -->
<section class="list-categories-area">
	<div class="container">
      <div class="row">
        <div class="col-sm-12">
			<div id="list-categories-home" class="owl-carousel">
				<?php foreach($category as $Categories): ?>
	            <!--TESTIMONIAL 1 -->
	            <div class="item">
	              <div class="shadow-effect">
	                <img class="img-responsive" src="<?= (!empty($Categories->picutre) ? 'assets/new_uploads/'.$Categories->picutre:'assets/images/logo%20vatrena.png');  ?>" alt="">
	                <div class="item-details">
						<a href="<?= base_url() ?>finder/?guide_search_input=<?=(is_arabic() ? $Categories->keyword_title : $Categories->cat_keywords_en)?>"> <?= (is_arabic() ? $Categories->keyword_title : $Categories->cat_keywords_en); ?></a>
					</div>
	              </div>
	            </div>
	            <!--END OF TESTIMONIAL 1 -->
			    <?php endforeach ?>
          </div>
        </div>
    </div>
  </div>
</section>
<!-- END OF TESTIMONIALS -->


		<div class="container margin_60">

			<div class="main_title">
				<h2>Top<span> Vatrena</span></h2>
			</div>

			<div class="row">
				<?php  foreach($vatrenas as $vatrena): ?>
				<div class="col-md-4">
					<div class="vatrena-holder">
						<div class="vatrena-img-holder">
							<a href="<?= base_url() ?>guide/<?= no_dashes($vatrena->company_name_en); ?>/<?= $vatrena->companies_id ?>"><img src="<?= (!empty($vatrena->logo) ? 'assets/new_uploads/'.$vatrena->logo:'assets/images/logo%20vatrena.png');  ?>"></a>
						</div>
						<div class="vatrena-desc-holder">
							<!-- <img src="https://educationwp.thimpress.com/wp-content/uploads/learn-press-profile/7/9c081444f942cc8fe0ddf55631b584e2.jpg"> -->
							<div class="vatrena-title">
								<h2><a href="<?= base_url() ?>guide/<?= no_dashes($vatrena->company_name_en); ?>/<?= $vatrena->companies_id ?>"> <?= (is_arabic() ?  limit_text($vatrena->company_name_ar, 20) : limit_text($vatrena->company_name_en, 20)); ?></a></h2>
							</div>
							<div class="vatrena-category">
								<a href="<?= base_url() ?>guide/<?= no_dashes($vatrena->company_name_en); ?>/<?= $vatrena->companies_id ?>"><?= pick_first_category($vatrena->companies_id); ?></a>
							</div>
						</div>
						<!-- <div class="views-more"></div> -->
						<div class="vatrena-views">
							<div class="icon-more">
								<i class="icon-eye"></i> <?= $vatrena->count_views ?>
							</div>
							<div class="icon-readmore">
								<h4><a href="<?= base_url() ?>guide/<?= no_dashes($vatrena->company_name_en); ?>/<?= $vatrena->companies_id ?>"><i class="icon-right-big"></i></a></h4>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>

			</div>
			<!-- End row -->
			<p class="text-center nopadding">
				<a href="#" class="btn_1 medium">Load more</a>
			</p>
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->

<script type="text/javascript">
	
	

</script>
	