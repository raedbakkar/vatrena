	<section class="parallax-window" data-parallax="scroll" data-image-src="assets/bg1.jpg" data-natural-width="1200" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>نتائج البحث</h1>
				<!-- <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p> -->
			</div>
		</div>
	</section>
	<!-- End section -->

	<main>

		<div id="position">
			<div class="container">
				<ul>
					<li><a href="#">Home</a>
					</li>
					<li><a href="#">Category</a>
					</li>
					<li>Page active</li>
				</ul>
			</div>
		</div>
		<!-- Position -->

		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->


		<div class="container margin_60">

			<div class="row">
			
				<div class="col-lg-9 col-md-9">

					<div id="tools">

						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="styled-select-filters">
									<select name="sort_rating" id="sort_rating">
										<option value="" selected>التصنيفات</option>
										<?php foreach($all_rel_categories as $category): ?>
											<option value="<?= $category->keywords_id ?>">
												<?=(is_arabic() ? $category->keyword_title:$category->cat_keywords_en)?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="styled-select-filters">
									<select name="sort_rating" id="sort_rating">
										<option value="" selected>المركات</option>
										<?php foreach($all_rel_brands as $brand): ?>
											<option value="<?= $brand->brand_id ?>">
												<?=(is_arabic() ? $brand->brand_title_ar:$brand->brand_title)?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<div class="styled-select-filters">
									<select name="sort_rating" id="sort_rating">
										<option value="" selected>الاماكن</option>
										<?php foreach($all_rel_cities as $city): ?>
											<option value="<?= $city->city_id ?>">
												<?=(is_arabic() ? $city->city_name_ar:$city->city_name)?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

						</div>
					</div>
					<!--/tools -->
                    <?php $count = 0; ?>
					<?php if($search_result)foreach($search_result as $result): ?>
					<?php

					//wru
		                 if($_GET['guide_search_input']) echo ad_hori_detecter($_GET['guide_search_input'], $count); ?>
		             <?php   
		            ?>
					<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.4s">
						<div class="row">
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-3 col-md-3 col-sm-12 logoHolder">
								<div class="tour_list_desc">
									<div class="logo-hold inlineMe">
										<a class="color-link-logo" target="_blank" href="<?= base_url() ?>guide/<?= no_dashes($result->company_name_en); ?>/<?= $result->companies_id ?>"><img src="<?= (!empty($result->logo) ? 'assets/new_uploads/'.$result->logo:'assets/images/logo%20vatrena.png');  ?>"></a>
									</div>
								</div>
							</div>
							<div class="col-lg-9 col-md-9 col-sm-12">
								<span class="details-hold inlineMe">
									<h4 class="head-holder"><a class="color-link" target="_blank" href="<?= base_url() ?>guide/<?= no_dashes($result->company_name_en); ?>/<?= $result->companies_id ?>"><?= (is_arabic() ? $result->company_name_ar :$result->company_name_en); ?></a></h4>
								</span>
								<p class="vatrena-about address"><a class="color-link-address" target="_blank" href="<?= base_url() ?>guide/<?= no_dashes($result->company_name_en); ?>/<?= $result->companies_id ?>"><?= $result->adress_ar ?>, <?= get_dist_name($result->district) ?>, <?= get_city_name($result->city) ?> , <?= get_moha_name($result->mohafaza) ?> </a></p>
								<p class="vatrena-about"><a class="color-link-about" target="_blank" href="<?= base_url() ?>guide/<?= no_dashes($result->company_name_en); ?>/<?= $result->companies_id ?>"><?= (is_arabic() ?  mb_strimwidth($result->company_about, 0, 100, "...") : mb_strimwidth($result->company_about_en, 0, 100, "...")) ?></a></p>
								<div class="cat-keyword">
									<span class="category-holder">التصنيفات: <?php get_all_category($result->companies_id, 'main_category'); ?> </span>
									<div class="tooltip_styled tooltip-effect-4">
										<span class="tooltip-item cat-counter"><?php get_all_category($result->companies_id, 'count'); ?></span>
										<div class="tooltip-content">
											<?php get_all_category($result->companies_id, 'all_categories'); ?>
										</div>
									</div>
								</div>
								<div class="cat-keyword">
									<span class="category-holder">كلمات دلالية: <?php get_all_keywords($result->companies_id, 'first'); ?> </span>
									<div class="tooltip_styled tooltip-effect-4">
										<span class="tooltip-item cat-counter"><?php get_all_keywords($result->companies_id, 'count'); ?></span>
										<div class="tooltip-content">
											<?php get_all_keywords($result->companies_id, 'keywords'); ?>
										</div>
									</div>
								</div>
								<?php //get_all_category($result->companies_id, 'count'); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 btn-holders">
								<button class="finder-controller"><i class="pe-7s-call"></i> تليفون</button>
								<button class="finder-controller" onclick="window.open('<?= base_url() ?>guide/<?= no_dashes($result->company_name_en); ?>/<?= $result->companies_id ?>#Brances_B','_blank');"><i class="ipe-7s-map"></i> فروع</button>
								<button class="finder-controller"><i class="pe-7s-mail-open"></i> راسلنا</button>
								<button class="finder-controller" onclick="window.open('<?= $result->website ?>','_blank');"><i class="pe-7s-global"></i> الموقع</button>
								<button class="finder-controller"><i class="pe-7s-map-marker"></i> الاتجاهات</button>
								<span class="details-option">
									<button class="finder-controller finder-details" onclick="window.open('<?= base_url() ?>guide/<?= no_dashes($result->company_name_en); ?>/<?= $result->companies_id ?>','_blank');"> معلومات اكتر</button>
									<button class="finder-controller finder-details"> منتجاتي</button>
								</span>
							</div>
						</div>
					</div>
					<?php $count++; ?>
					<?php endforeach ?>
					<!--End strip -->
					

					<hr>

					<!-- <div class="text-center">
						<ul class="pagination">
							<li><a href="<?= base_url() ?>finder?page=<?= $current_page == 1 ? 1: $current_page - 1 ?><?= $get_param ?>">Prev</a>
							</li>
							<?php for($i=$first_appered_number;$i<=$last_apperd_number;$i++){ ?>
							<li><a href="<?= base_url() ?>finder?page=<?=$i?><?= $get_param ?>"><?= $i ?></a>
							</li>
							<?php } ?>
							<li><a href="<?= base_url() ?>finder?page=<?= $current_page == $last_apperd_number ? $last_apperd_number : $current_page + 1 ?><?= $get_param ?>">Next</a>
							</li>
						</ul>
					</div> -->
					<!-- end pagination-->

				</div>
				<!-- End col lg-9 -->

				<aside class="col-lg-3 col-md-3">
					<?php if($_GET['guide_search_input']) echo ad_detective($_GET['guide_search_input']); ?>
				</aside>
				<!--End aside -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->
<style type="text/css">
	
	.strip_all_tour_list.wow.fadeIn.ad_clicker:hover {
    cursor: pointer;
}
	
</style>