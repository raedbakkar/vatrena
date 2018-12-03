<!-- Start MainBlbock Div -->
    <div class="main-block">
        <div class="container">
            <div class="row">
                
                <div class="head">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-md-8 col-xs-12">
                                <div class="details">
                                    <p><?= $company->company_name_ar ?></p>
                                </div>
                            </div>
                            
                            <div class="col-md-4 col-xs-12">
                                <div class="link">
                                    <a href="index.html">الرئيسية</a>
                                    <span>التفاصيل التجارية</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End MainBlock Div -->
    
    
            
<!-- start rightBlock Div -->


    <div class="container">
        <div class="row">
            
            <div class="col-md-9 col-xs-12">
                <div class="right-block">
                    
                    <table>
                        <tr>
                            <td><a href="<?= current_url(); ?>#info" class="sec-info noRe" data-value="info">تفاصيل</a></td>
                            <td class="photos"><a href="javascript:void(0)" class="noRe">الصور</a></td>
                            <td class="map"><a href="javascript:void(0)" class="noRe">خريطة</a></td>
                            <td class="contact1-show"><a class="noRe" href="javascript:void(0)">اتصل بنا</a></td>
                            <td><a href="javascript:void(0)" class="noRe">مراجعة</a></td>
                        </tr>
                    </table>
                    
                    <div class="slide">
                        
                        <div class="container-fluid">
                            <div class="row">   <!-- Start main row of div slider -->

                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                  <!-- Indicators -->
	                                  <ol class="carousel-indicators">
	                                  	<?php for($i=1;$i<$photo_counts;$i++): ?>
	                                    <li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>" class="<?= ($i==1) ? 'active':'' ?>"></li>
	                                  	<?php endfor; ?>
	                                  </ol>

		                                <!-- Wrapper for slides -->
		                                <div class="carousel-inner photoAppender" role="listbox">

		                                    <?php foreach($photos as $photo): ?>
				                                <div class="item sliderPhoto">
				                                  <img src="assets/new_uploads/<?= $photo->photo ?>" alt="...">
	                		                    	<?php if(!empty($photo->desc_ar)){ ?>
				                                    <div class="shad">
			                                        	<h5><?= $photo->desc_ar ?></h5>
				                                    </div>  
			    	                                <?php } ?>
				                                </div>
			                            	<?php endforeach ?>

		                                </div>

							    	<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="icon-prev"></span></a>
						     		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="icon-next"></span></a>
                                </div>
                              
                                <div class="col-xs-12">
                                    <ul class="cate">
                                      <?php foreach($photo_categories as $photo_category): ?>
                                      	<li class="AlbumChanger" data-vatrena="<?=$company->companies_id ?>" data-cat-id="<?= $photo_category->photo_category ?>"><a href="javascript:void(0)"><?= photo_category_name($photo_category->photo_category); ?></a></li>
                                      <?php endforeach; ?>
                                    </ul>
                                </div>

                            </div>  <!-- Start main row of div slider -->
                        </div>
                        
                    </div>
                    
                    <div class="mapa">
                        <input type="search" name="search" placeholder="ابحث بالخريطة" >
                        <div id="map"></div>
                    </div>
                    
                    <div class="contact1">
                        <table>
                            <tr>
                                <td>عنوان</td>
                                <td><?= get_moha_name($company->mohafaza) ?>, <?= get_city_name($company->city) ?>, <?= get_dist_name($company->district) ?>, <?= get_area_name($company->area) ?></td>
                            </tr>
                            
                            <tr>
                                <td>الهاتف</td>
                                <td>
                                    <?php foreach($phone_numbers as $phone_number): ?> 
                                            <span><?=$phone_number->phone_number?> </span>
                                            <?php if($phone_number->person_name != ''): ?>
                                            <?=$phone_number->person_name?>
                                            <?php endif; ?>
                                            <?php echo '</br >' ?>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>الموقع الألكتروني</td>
                                <td><?= $company->website ?></td>
                            </tr>
                        </table>
                        
                        <form>
                            <h4>أرسل رسالة الى هذه المنشأة التجارية للحصول على مزيد من المعلومات</h4>
                            <input type="text" name="name" placeholder="الأسم الكامل" >
                            <input type="email" name="email" placeholder="البريد الألكتروني" >
                            <input type="text" name="phone" placeholder="الهاتف" >
                            <input type="text" name="msg-address" placeholder="عنوان الرسالة" >
                            <textarea placeholder="اكتب رسالتك..."></textarea>
                            
                            <div class="g-recaptcha" data-sitekey="6LfBDEUUAAAAAMQ5pcJMQz-pezuL0PI9vMn4VvFy"></div>
                            
                            <input type="submit" name="submit" value="إرسل" >
                        </form>
                        
                    </div>
                                    
                    <hr>
                
                    <div class="info" id="info">
                        <h4><?= $category ?></h4>
                        
                        <ul>
                            <li>
                                <i class="fa fa-map-marker" ></i>
                                <p>العنوان الرئيسى</p>
                                <div class="address"><p><?= $company->adress_ar ?> - <?= get_dist_name($company->district) ?> - <?= get_city_name($company->city) ?> - <?= get_moha_name($company->mohafaza) ?> - <?=get_area_name($company->area) ?></p></div>
                            </li>
                            <?php foreach($phone_numbers as $phone_number): ?> 
                            <li class="phone1">
                                <span><?=$phone_number->phone_number?> :</span>
                                <?php if($phone_number->person_name != ''): ?>
                                <a href="tel:<?=$phone_number->person_name?>" class="det-phone"><?=$phone_number->person_name?> </a>
                                <?php endif; ?>
                                <i class="fa fa-phone"></i>
                            </li>
                        <?php endforeach ?>
                         <?php foreach($phone_numbers as $phone_number): ?> 
                           
                        <?php endforeach ?>
                        <?php 	if($arrayTele)foreach($arrayTele as $code => $number): ?>
							<?php foreach($number as $val_number => $number): ?>
								 <li class="phone1">
	                                <a href="tel:<?= $val_number ?><?= $number ?>" class=""><?= $val_number ?>-<?= $number ?> </a>
	                                <i class="fa fa-phone"></i>
                           		 </li>
							<?php endforeach ?>
						<?php endforeach ?>

                            
                            
                            <li>
                                <a href="#myModal" role="button" data-toggle="modal"><i class="fa fa-envelope"></i></a>
                                <a href="#myModal" role="button" data-toggle="modal" class="back">البريد الألكتروني</a>
                            </li>
                            
                            <li>
                                <a href="https://www.vatrena.com/"><i class="fa fa-chain"></i></a>
                                <!--<span>الموقع الألكتروني :</span>-->
                                <a href="<?= $company->website ?>" target="_blank" class="back">الموقع الألكتروني</a>
                            </li>
                            
                            <li>
                                <i class="fa fa-eye"></i>
                                <span>المشاهدات :</span>
                                <?= $company->count_views ?>
                            </li>
                            
                            <div class="ad-detail-info">
                                <span class="span-right">
                                <a target="_blank" href="https://www.vatrena.com/index.php/ar/show/printview/59ff1042b47cd"><i class="fa fa-print fa-lg"></i> طباعة</a></span>
                            </div>
                            
                            <li class="hidden-sm hidden-xs">
                                <!--Facebook-->
                                <a target="_blank" href="<?= $company->facebook ?>" class="btn btn-fb"><i class="fa fa-facebook left"></i> Facebook</a>
                                <!--Twitter-->
                                <a target="_blank" href="<?= $company->twitter ?>" class="btn btn-tw"><i class="fa fa-twitter left"></i> Twitter</a>
                                <!--Google +-->
                                <a target="_blank" href="<?= $company->google_plus ?>" class="btn btn-gplus"><i class="fa fa-google-plus left"></i> Google +</a>
                                <!--Linkedin-->
                                <a target="_blank" href="<?= $company->linkedin ?>" class="btn btn-li"><i class="fa fa-linkedin left"></i> Linkedin</a>
                                <!--instagram-->
                                <a target="_blank" href="<?= $company->instagram ?>"  class="btn btn-tw"><i class="fa fa-instagram left"></i> instagram</a>
                            </li>
                            






                            <li class="tiny-social hidden-lg hidden-md">
                                <a>
                                    <i class="fa fa-facebook fa-lg"></i>
                                </a>
                                
                                <a>
                                    <i class="fa fa-twitter fa-lg"></i>
                                </a>
                                
                                <a>
                                    <i class="fa fa-google-plus fa-lg"></i>
                                </a>
                                
                                <a>
                                    <i class="fa fa-linkedin fa-lg"></i>
                                </a>
                                
                                <a>
                                    <i class="fa fa-youtube fa-lg"></i>
                                </a>
                                
                                <a>
                                    <i class="fa fa-instagram fa-lg"></i>
                                </a>
                            </li>
                            
                        </ul>
                        
                    </div>  
                    
                    <hr>
                    
                    <div class="article">
                        <div>
                            <i class="fa fa-rocket fa-lg"></i>
                            <h4>تفاصيل</h4>
                        </div>
                        <p><?= $company->company_about ?></p>
                    </div>
                    <hr>
                    <?php if(($company->starting_hour != '') || ($company->ending_hour != '') || ($company->holidays != '')): ?>
                    <div class="work-time">
                        <div>
                            <i class="fa fa-list-ul fa-lg"></i>
                            <h4>أوقات العمل</h4>
                        </div>
                        <ul>
                            <h4>فترة صباحية</h4>
                            
                            <?php time_handler($company->starting_hour, $company->ending_hour, $company->holidays); ?>
                            
                        </ul>
                        
                        
                        <ul>
                            <h4>فترة مسائية</h4>
                            
                            <?php time_handler_night($company->starting_hour_night, $company->ending_hour_night, $company->holidays); ?>
    
                        </ul>
                    </div>
                <?php endif; ?>
                    
                    <hr>
                    <?php if(!empty($videos)){ ?>
                        <?php foreach($videos as $video){ ?>
                            <div class="vid">
                                <div>
                                    <i class="fa fa-film fa-lg"></i>
                                    <h4><?= $video->video_name ?> </h4>
                                </div>
                                    <iframe width="100%" height="420px" src="<?= $video->video_link ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    
                    <hr>
                    
                    <div class="branches">
                        <div>
                            <i class="fa fa-building fa-lg"></i>
                            <h4>فروع اخرى</h4>
                            <!--<ul>-->
                                
                                <!-- Start Of branches section -->
                                <?php foreach($branches as $branch): ?>
                                <button class="more-info"><?= $branch->company_name_ar ?></button>
                                <ul class="submenu">
                                    <li><span>العنوان: <div class="address"><p><?= $branch->adress_ar ?> - <?= get_dist_name($branch->district) ?> - <?= get_city_name($branch->city) ?> - <?= get_moha_name($branch->mohafaza) ?> - <?=get_area_name($branch->area) ?></p></div></span></li>
                                    <?php get_branch_phone_number($branch->companies_id); ?>
        
                                    <?php get_branch_telephone($branch->companies_id); ?>
                                </ul>
                                <?php endforeach ?>
                            <!--</ul>-->
                        </div>
                    </div>
                    
                </div> 
            </div>
            
            <div class="col-md-3 col-xs-12">  
                <div class="sidebar">

                    <!--<div class="widget">-->
                    <!--    <i class="fa fa-photo"></i>-->
                    <!--    <p>معرض الصور</p>-->
                    <!--    <hr>-->
                    <!--    <img src="images/carina.jpg" />-->
                    <!--    <img src="images/carina.jpg" />-->
                    <!--    <img src="images/carina.jpg" />-->
                    <!--    <img src="images/carina.jpg" />-->
                    <!--    <img src="images/carina.jpg" />-->
                    <!--</div>-->
                    
                    <div class="widget">
                        <i class="fa fa-tags"></i>
                        <p>الكلمات</p>
                        <hr>
                        <?php foreach($keyword as $keywordy): ?>
                        <a href="#"><?= $keywordy ?></a>
                    <?php endforeach ?>
                    </div>
                        
                    <div class="widget social">
                        <i class="fa fa-share"></i>
                        <p>الروابط الاجتماعية</p>
                        <hr>
                        <a href="#" class="fa-social">
                            <i class="fa fa-instagram"></i>
                            <i class="fa fa-linkedin"></i>
                            <i class="fa fa-google-plus"></i>
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-flag"></i>
                            <p>الإبلاغ عن هذا الإعلان</p>
                        </a>
                        <a href="#">
                            <i class="fa fa-hand-grab-o"></i>
                            <p>الإبلاغ عن إساءة</p>
                        </a>
                    </div>    
                    
                    <div class="widget">
                        <i class="fa fa-search"></i>
                        <span>أبحث</span>
                        <form>
                            <input type="search" name="search" placeholder="أكتب شيئا">
                            <input type="submit" value="بحث">
                        </form>
                    </div>

                </div>
            </div>
            
        </div>
    </div>

<!-- End rightBlock Div -->    
    
<!-- Start of lide Modal  -->

    <div class="contact">
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <section class="modal-content">
                    
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                    <div class="row">
                        
                        <form action="#" method="post">
                            <h4>أرسل رسالة الى هذه المنشأة التجارية للحصول على مزيد من المعلومات</h4>
                            <input type="text" name="name" placeholder="الأسم الكامل">
                            <input type="email" name="email" placeholder="البريد الألكتروني">
                            <input type="text" name="phone" placeholder="الهاتف" >
                            
                            <input type="text" name="msgaddress" placeholder="عنوان الرسالة" >
                            <textarea placeholder="اكتب رسالتك...."></textarea>
                            
                            <div class="g-recaptcha" data-sitekey="6LfBDEUUAAAAAMQ5pcJMQz-pezuL0PI9vMn4VvFy"></div>
                            
                            <input type="submit" name="submit" value="إرسل">
                        </form>
                        
                    </div>
                </section>
            </div>
        </div>
    </div>