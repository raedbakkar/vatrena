
<!-- Search start -->
<div class="searchwrap">
  <div class="container">
    <h3>ليه تلف وتحتار فاترينا هتساعدك تختار</h3>
    <p>ابحث عن اى نشاط (تجارى - صناعى - خدمى - ترفيهى) وخلى صباحك فاترينا</p>
    <div class="searchbar row">
      <div class="col-xs-8 col-md-push-1">
       
         <form id="form-country_v1" method="post" action="<?= base_url() ?>home/vatrena_finder" name="form-country_v1">
            <div class="typeahead__container">
                <div class="typeahead__field">
         
                    <span class="typeahead__query">
                        <!-- <input class="js-typeahead-country_v1" name="country_v1[query]" type="search" placeholder="Search" autocomplete="off"> -->
                         <input type="text" name="search_param" class="form-control js-typeahead-country_v1 searchOnItem" placeholder="ابحث هنا عن اي شيء تحتاج إليه" autocomplete="off" />
                    </span>
                    <span class="typeahead__button">
                        <input type="submit" class="look" value="ابحث">
                    </span>
         
                </div>
            </div>
        </form>
      </div>
      <div class="col-md-2 col-xs-4 col-md-push-1">
        <!--<select class="form-control">-->
        <!--  <option>اختر مدينة</option>-->
        <!--  <option>القاهرة</option>-->
        <!--  <option>اسكندرية</option>-->
        <!--  <option>اسوان</option>-->
        <!--  <option>مطروح</option>-->
        <!--</select>-->
        
        
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
                                
                                <label>المدينة</label>
                                <select>
                                  <option>اختر مدينة</option>
                                  <option>القاهرة</option>
                                  <option>اسكندرية</option>
                                  <option>اسوان</option>
                                  <option>مطروح</option>
                                </select>
                                
                                <label>المنطقة</label>
                                <select>
                                  <option>اختر المنطقة</option>
                                  <option>مدينة نصر</option>
                                  <option>المعادي</option>
                                  <option>المعصرة</option>
                                  <option>حلوان</option>
                                </select>
                                
                                <label>الحي</label>
                                <select>
                                  <option>اختر الحي</option>
                                  <option>مدينة نصر</option>
                                  <option>المعادي</option>
                                  <option>المعصرة</option>
                                  <option>حلوان</option>
                                </select>
                                
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
    </div>
    <!-- title end -->
    
    <ul class="gridlist itemgrid">
      <?php foreach($category as $categories): ?>
      <li class="item">
        <div class="adimg"><a href="<?= base_url() ?>home/vatrena_finder/<?= $categories->keywords_id ?>"><img src="assets/new_uploads/<?= $categories->picutre ?>" alt=""></a></div>
        <div class="innerad top">
          <h3><a href="<?= base_url() ?>home/vatrena_finder/<?= $categories->keywords_id ?>"><?= $categories->keyword_title ?></a></h3>
        </div>
      </li>
    <?php endforeach ?>
    </ul>
  </div>
</div>
<!-- Featured Ads end --> 



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
    </div>
    <!-- title end -->
    
    <ul class="row gridlist">

      <?php $this->load->view('site/companies',array('vatrenas', $vatrenas)); ?>

      <div class="adsAppender"></div>
    </ul>
    <div class="viewallbtn loadMoreBtn" data-page="1" data-records="8" data-offset="1"><a href="#">اعرض المزيد</a></div>
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