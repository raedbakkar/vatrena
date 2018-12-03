<!-- Start MainBlbock Div -->
    <div class="main-block">
        <div class="container">
            <div class="row">
                
                <div class="head">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-md-8 col-xs-12">
                                <div class="details">
                                    <p>محلات كارينا ملابس داخلية</p>
                                    <a href="#">ملابس حريمي</a>
                                </div>
                            </div>
                            
                            <div class="col-md-4 col-xs-12">
                                <div class="link">
                                    <a href="index.html">الرئيسية</a>
                                    /
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
            
            <div class="col-md-8 col-xs-12">
                <div class="right-block">
                    <div class="slide">
                        
                        <div class="container-fluid">
                            <div class="row">   <!-- Start main row of div slider -->

                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                  <!-- Indicators -->
                                  <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>  
                                  </ol>

                                  <!-- Wrapper for slides -->
                                  <div class="carousel-inner" role="listbox">


	                                <?php foreach($photos as $photo): ?>
	                                <div class="item sliderPhoto">
	                                  <img src="assets/new_uploads/<?= $photo->photo ?>" alt="...">
	                                    <div class="shad">
	                                        <h3><?= $photo->desc_ar ?></h3>
	                                    </div>         
	                                </div>
	                            	<?php endforeach ?>


                                  </div>

                                </div>

                            </div>  <!-- Start main row of div slider -->
                        </div>
                        
                    </div>
                                    
                    <hr>
                
                    <div class="info">
                        <h4>كمبيوتر</h4>
                        
                        <ul>
                            <li>
                                <i class="fa fa-map-marker" ></i>
                                <p>العنوان الرئيسى</p>
                                <div class="address"><p><?= get_moha_name($company->mohafaza) ?> , <?= get_district_name($company->district) ?></p></div>
                            </li>
                           
                            <?php foreach($phone_numbers as $phone_number): ?> 
                            <li>
                                <i class="fa fa-phone"></i>
                                <span>هاتف :</span>
                                <a href="01000020000"></a>
                            </li>
                        	<?php endforeach ?>
                            
                            
                            <li>
                                <i class="fa fa-envelope"></i>
                                <span>البريد الألكتروني :</span>
                                <a href="mailto:newapp@salonstudios.com"><?= $company->email ?></a>
                            </li>
                            
                            <li>
                                <i class="fa fa-chain"></i>
                                <span>الموقع الألكتروني :</span>
                                <a href="https://www.vatrena.com/"><?= $company->website ?></a>
                            </li>
                            
                            <li>
                                <i class="fa fa-eye"></i>
                                <span>المشاهدات :</span>
                                97
                            </li>
                            
                            <div class="ad-detail-info">
                                <span class="span-right">
                                <a target="_blank" href="https://www.vatrena.com/index.php/ar/show/printview/59ff1042b47cd"><i class="fa fa-print fa-lg"></i> طباعة</a></span>
                            </div>
                            
                            <li>
                                <!--Facebook-->
                                <button type="button" class="btn btn-fb"><i class="fa fa-facebook left"></i> Facebook</button>
                                <!--Google +-->
                                <button type="button" class="btn btn-gplus"><i class="fa fa-google-plus left"></i> Google +</button>
                                <!--Twitter-->
                                <button type="button" class="btn btn-tw"><i class="fa fa-twitter left"></i> Twitter</button>
                                <!--Linkedin-->
                                <button type="button" class="btn btn-li"><i class="fa fa-linkedin left"></i> Linkedin</button>
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
                    <div class="work-time">
                        <div>
                            <i class="fa fa-list-ul fa-lg"></i>
                            <h4>أوقات العمل</h4>
                        </div>
                        <ul>
                            <li>
                                <span>الأحد :</span>
                                10:00 ص - 70:00 م
                            </li>
                            
                            <li>
                                <span>الأثنين :</span>
                                10:00 ص - 70:00 م
                            </li>
                            
                            <li>
                                <span>الثلاثاء :</span>
                                10:00 ص - 70:00 م
                            </li>
                            
                            <li>
                                <span>الأربعاء :</span>
                                10:00 ص - 70:00 م
                            </li>
                            
                            <li>
                                <span>الخميس :</span>
                                10:00 ص - 70:00 م
                            </li>
                            
                            <li>
                                <span>الجمعة :</span>
                                مغلق
                            </li>
                            
                            <li>
                                <span>السبت :</span>
                                مغلق
                            </li>
                        </ul>
                    </div>
                    
                    <hr>
                    
                    <div class="vid">
                        <div>
                            <i class="fa fa-film fa-lg"></i>
                            <h4>فيديو مميز</h4>
                        </div>
                        <iframe class="thumbnail" width="100%" height="420" src="https://www.youtube.com/embed/A6XUVjK9W4o" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                    
                </div> 
            </div>
            
            <div class="col-md-4 col-xs-12">  
                <div class="sidebar">

                    <div class="widget">
                        <i class="fa fa-photo"></i>
                        <p>معرض الصور</p>
                        <hr>
                        <img src="assets/images/carina.jpg" />
                        <img src="assets/images/carina.jpg" />
                        <img src="assets/images/carina.jpg" />
                        <img src="assets/images/carina.jpg" />
                        <img src="assets/images/carina.jpg" />
                    </div>
                    
                    <div class="widget">
                        <i class="fa fa-tags"></i>
                        <p>الكلمات</p>
                        <hr>
                        <a href="#">محل كارينا ملابس ....</a>
                        <a href="#">بيجامات كارينا ....</a>
                        <a href="#">محل كارينا في مصر ....</a>
                        <a href="#">لانجيرى</a>
                    </div>
                        
                    <div class="widget social">
                        <i class="fa fa-share"></i>
                        <p>الروابط الاجتماعية</p>
                        <hr>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#">
                            <i class="fa fa-flag"></i>
                            <p>الإبلاغ عن هذا الإعلان</p>
                        </a>
                        <a href="#">
                            <i class="fa fa-hand-grab-o"></i>
                            <p>الإبلاغ عن هذا إساءة</p>
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

<style>
.vid {
    margin-top: 200px;
}
</style>