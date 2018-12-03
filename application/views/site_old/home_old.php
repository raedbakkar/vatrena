<!-- Search start -->
<div class="searchwrap">
  <div class="container">
    <h3>ليه تلف وتحتار فاترينا هتساعدك تختار</h3>
    <p>ابحث عن اى نشاط (تجارى - صناعى - خدمى - ترفيهى) وخلى صباحك فاترينا</p>
    <div class="searchbar row">
      <div class="col-xs-8 col-md-push-1">
        <input type="text" class="form-control" placeholder="ابحث هنا عن اي شيء تحتاج إليه" />
      </div>
      <div class="col-md-2 col-xs-4 col-md-push-1">
        <!--<select class="form-control">-->
        <!--  <option>اختر مدينة</option>-->
        <!--  <option>القاهرة</option>-->
        <!--  <option>اسكندرية</option>-->
        <!--  <option>اسوان</option>-->
        <!--  <option>مطروح</option>-->
        <!--</select>-->
        
        <botton class="look">ابحث</botton>
      </div>
      
      <div class="col-md-12 col-xs-8 col-xs-offset-1">
          
          <div class="anch">
              <a href="#myModal" role="button" data-toggle="modal">بحث متقدم</a>
          </div>
          
          <div class="sec-guide">
              <a href="<?= base_url() ?>vatrena_index">دليل اقسام فاترينا</a>
          </div>
          
      </div>
      
      <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <section class="modal-content">
                <div class="row">
                    
                    <div class="col-md-5 col-xs-12">
                        <div class="right-col">
                            <h4>ابحث عن</h4>
                            <ul>
                                <li><a href="#">اسم الشركة</a></li>
                                <li><a href="#">كلمة البحث</a></li>
                                <li><a href="#">العلامات التجارية</a></li>
                                <li><a href="#">التصنيف</a></li>
                                <li><a href="#">رقم التليفون</a></li>
                                <li><a href="#">العنوان</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-7 col-xs-12">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="left-col">
                            <form action="#" method="post">
                                <label>ابحث عن</label>
                                <input type="search" name="search">
                                
                                <label>المنطقة</label>
                                <select class="searchEng"  data-url="<?= base_url() ?>home/dropDownAppender" data-appenddiv="geneDropMohafza" data-tab="mohafazat" data-fidname="governorate_id" data-view="site/mohafza_options" data-dropname="category">
                                    <option value="all">ألكل</option>
                                  <?php foreach($governorate as $gover): ?>
                                    <option value="<?= $gover->gover_id ?>"><?= $gover->gover_title_ar ?></option>
                                  <?php endforeach ?>
                                </select>
                                <div class="geneDropMohafza"></div>

                                <div class="geneDropCity"></div>

                                <div class="geneDropDistrict"></div>
       
                                <button class="sub" type="submit">
                                    <i class="fa fa-search fa-lg"></i>
                                </button>
                                
                            </form>
                            
                            <a href="<?= base_url() ?>vatrena_index" class="sec-anch">دليل اقسام فاترينا</a>
                            
                        </div>
                    </div>
                    
                </div>
            </section>
        </div>
    </div>
      
<!--
      <div class="col-md-2">
        <input type="submit" class="btn" value="Search Ad">
      </div>
-->
    </div>
  </div>
</div>
<!-- Search End --> 

<!-- Featured Ads start -->
<div class="section">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      <h3 class="tth">اقسام <span>مميزة</span></h3>
<!--      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius, orci id facilisis egestas, neque purus sagittis arcu, nec maximus quam odio nec elit Pellentesque eget ipsum mattis</p>-->
    </div>
    <!-- title end -->
    
    <ul class="gridlist itemgrid">
      <?php foreach($category as $categories): ?>
      <li class="item">
        <div class="adimg"><a href="#"><img src="assets/images/ads/01.jpg" alt=""></a></div>
        <div class="innerad top">
          <h3><a href="#"><?= $categories->keyword_title ?></a></h3>
        </div>
      </li>
    <?php endforeach ?>
    </ul>
  </div>
</div>
<!-- Featured Ads end --> 

<!-- Categories start -->
<!--<div class="section catewrap">-->
<!--  <div class="container"> -->
    <!-- title start -->
<!--    <div class="titleTop">-->
<!--      <h3 class="tth">الاقسام <span>الرئيسية</span></h3>-->
<!--      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius, orci id facilisis egestas, neque purus sagittis arcu, nec maximus quam odio nec elit Pellentesque eget ipsum mattis</p>-->
<!--    </div>-->
<!--    <ul class="categoryList row">-->
<!--      <li class="col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="assets/images/category/01.png" alt="Cate Img" /> <span>Vehicles <i>(598)</i></span></a></li>-->
<!--      <li class="col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="assets/images/category/02.png" alt="Cate Img" /> <span>Mobiles <i>(598)</i></span></a></li>-->
<!--      <li class="col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="assets/images/category/03.png" alt="Cate Img" /> <span>Electronics <i>(598)</i></span></a></li>-->
<!--      <li class="col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="assets/images/category/04.png" alt="Cate Img" /> <span>Furniture <i>(598)</i></span></a></li>-->
<!--      <li class="col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="assets/images/category/05.png" alt="Cate Img" /> <span>Jobs <i>(598)</i></span></a></li>-->
<!--      <li class="col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="assets/images/category/06.png" alt="Cate Img" /> <span>Real Estate <i>(598)</i></span></a></li>-->
<!--      <li class="col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="assets/images/category/07.png" alt="Cate Img" /> <span>Services <i>(598)</i></span></a></li>-->
<!--      <li class="col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="assets/images/category/08.png" alt="Cate Img" /> <span>Education <i>(598)</i></span></a></li>-->
<!--      <li class="col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="assets/images/category/09.png" alt="Cate Img" /> <span>Pets <i>(598)</i></span></a></li>-->
<!--      <li class="col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="assets/images/category/10.png" alt="Cate Img" /> <span>Fashion <i>(598)</i></span></a></li>-->
<!--      <li class="col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="assets/images/category/11.png" alt="Cate Img" /> <span>Baby Products <i>(598)</i></span></a></li>-->
<!--      <li class="col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="assets/images/category/12.png" alt="Cate Img" /> <span>Sports <i>(598)</i></span></a></li>-->
<!--    </ul>-->
<!--  </div>-->
<!--</div>-->
<!-- Categories ends --> 

<!-- Start Banners -->

<div class="banners first">
        <div class="container">
            <div class="row">
                
                <div class="col-md-6 col-xs-12">
                    <div class="wideBanner margintop40  right-banner"><img src="assets/images/banners.png" alt=""></div>
                </div>

                <div class="col-md-3 col-xs-12">
                    <div class="wideBanner margintop40  middle-banner"><img src="assets/images/banners.png" alt=""></div>
                </div>

                <div class="col-md-3 col-xs-12">
                    <div class="wideBanner margintop40  left-banner"><img src="assets/images/banners.png" alt=""></div>
                </div>
                
            </div>
        </div>
    </div>

<!-- End Banners -->

<!-- Latest Ads start -->
<div class="section">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      <h3 class="tth">فاترينا <span>مميزة</span></h3>
<!--      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius, orci id facilisis egestas, neque purus sagittis arcu, nec maximus quam odio nec elit Pellentesque eget ipsum mattis</p>-->
    </div>
    <!-- title end -->
    
    <ul class="row gridlist pagy">
      <?php foreach($vatrenas as $vatrena): ?>
      <li class="col-md-3 col-sm-6">
        <div class="adimg"><a href="#"><img src="assets/images/ads/01.jpg" alt=""></a></div>
        <div class="innerad">
          <h3><a href="#"><?= $vatrena->company_name_ar ?></a></h3>
          <div class="row location">
            <div class="col-xs-12 right"> مدينة نصر , القاهرة , مصر <i class="fa fa-tag" aria-hidden="true"></i></div>
            <div class="col-xs-12 right">محلات ملابس <i class="fa fa-map-marker" aria-hidden="true"></i></div>
          </div>
<!--          <div class="price">$206.90</div>-->
        </div>
      </li>
    <?php endforeach ?>
    </ul>
    <div class="row">
      <div class="col-md-8 col-md-offset-2 col-xs-12">
        <ul class="pagination">
          <nav class="pagination-nav">
          <!-- <ul class="pagination pull-right"><li class="pagenatorHomePage" data-page="1"><a href="#">الأول</a></li></ul> -->
            <ul class="pagination pull-center">
                <!-- <li class="pagenatorHomePage backy"  data-page=""><a href="#">السابق</a></li> -->
              <?php for($i=1;$i <= $count_pages;$i++){ ?>  
                <li class="pagenatorHomePage" data-page="<?= $i ?>"><a href="#"><?= $i ?></a></li>
              <?php } ?>

                <!-- <li class="pagenatorHomePage fronty" data-page=""><a href="#">التالى</a></li> -->
            </ul>
          <!-- <ul class="pagination pull-left pagenatorHomePage"  data-page="<?= $count_pages ?>"><li><a href="#">الأخير</a></li></ul> -->
          </nav>  
        </ul>
      </div>
    </div>
<!--    <div class="wideBanner margintop40"><img src="assets/images/google-ad-wide.jpg" alt=""></div>-->
  </div>
</div>
<!-- Latest Ads end --> 
    
    <!-- Banner Starts -->
    
    <div class="banners">
        <div class="container">
            <div class="row">
                
                <div class="col-md-6 col-xs-12">
                    <div class="wideBanner margintop40  right-banner"><img src="assets/images/google-ad-wide.jpg" alt=""></div>
                </div>

                <div class="col-md-6 col-xs-12">
                    <div class="wideBanner margintop40  left-banner"><img src="assets/images/google-ad-wide.jpg" alt=""></div>
                </div>

                <div class="col-md-6 col-xs-12">
                    <div class="wideBanner margintop40  left-banner"><img src="assets/images/google-ad-wide.jpg" alt=""></div>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Banner Ends -->
