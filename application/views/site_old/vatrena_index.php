<hr>

<div class="sections">
    <div class="container">
        <div class="row">
            
            <div class="col-xs-8 col-md-push-1">
                <form action="#" method="post" class="sections-form">
                    <div class="searchbar second">
                        <input type="text" class="form-control" placeholder="ابحث هنا عن اي شيء تحتاج إليه" />
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
                
                <botton class="look">ابحث</botton>
              </div>
              
            <div class="col-md-12 col-xs-8 col-xs-offset-1">
          
              <div class="anch">
                  <a href="#myModal" role="button" data-toggle="modal">بحث متقدم</a>
              </div>
              
              <!--<div class="sec-guide">-->
              <!--    <a href="vatrena-sections.html">دليل اقسام فاترينا</a>-->
              <!--</div>-->
              
          </div>  
            
            <div class="col-xs-12">
                <ol class="ordering pagy">
                    <?php foreach($categories as $category): ?>
                    <li><a href="<?= base_url() ?>home/vatrena_finder/<?= $category->keywords_id ?>"><?= $category->keyword_title ?></a></li>
                  <?php endforeach ?>
                </ol>
            </div>
            <div class="col-md-8 col-md-offset-2 col-xs-12">
              <ul class="pagination">
                <nav class="pagination-nav">
                <ul class="pagination pull-right"><li class="pagenator" data-page="1"><a href="javascript:void(0)">الأول</a></li></ul>
                  <ul class="pagination pull-center">
                      <li class="pagenator backy"  data-page=""><a href="javascript:void(0)">السابق</a></li>
                    <?php for($i=1;$i <= $count_pages;$i++){ ?>  
                      <li class="pagenator" data-page="<?= $i ?>"><a href="javascript:void(0)"><?= $i ?></a></li>
                    <?php } ?>
                      <li class="pagenator fronty" data-page=""><a href="javascript:void(0)">التالى</a></li>
                  </ul>
                <ul class="pagination pull-left pagenator"  data-page="<?= $count_pages ?>"><li><a href="javascript:void(0)">الأخير</a></li></ul>
                </nav>  
              </ul>
            </div>
        </div>
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
                                <li><a href="#">العلامات التجارية</a><
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
                        </div>
                    </div>
                    
                </div>
            </section>
        </div>
    </div>

<hr>