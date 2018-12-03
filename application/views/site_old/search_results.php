<hr>



<div class="main-section">

    <div class="container">

        <div class="row">   <!-- Start Of Main Section Row -->

        

            <div class="col-md-8 col-xs-12">

                <div class="right-section">

                    

                    <div class="lists">

                        

                        <li class="right">

                            <p>التصنيفات</p>

                            <i class="fa fa-chevron-down"></i>

                            

                            <ul class="tasnief">

                                <li><a href="#">مطاعم</a></li>

                                <li><a href="#">مطاعم</a></li>

                                <li><a href="#">مطاعم</a></li>

                                <li><a href="#">مطاعم</a></li>

                                <li><a href="#">مطاعم</a></li>

                            </ul>

                            

                        </li>

                        

                        <li class="middle">

                            <p>العلامات التجارية</p>

                            <i class="fa fa-chevron-down"></i>

                               

                            <ul class="mark">

                                <li><a href="#">مطاعم</a></li>

                                <li><a href="#">مطاعم</a></li>

                                <li><a href="#">مطاعم</a></li>

                                <li><a href="#">مطاعم</a></li>

                                <li><a href="#">مطاعم</a></li>

                            </ul>

                            

                        </li>

                        

                        <li class="left">

                            <p>الأماكن</p>

                            <i class="fa fa-chevron-down"></i>

                                   

                            <ul class="places">

                                <li><a href="#">مطاعم</a></li>

                                <li><a href="#">مطاعم</a></li>

                                <li><a href="#">مطاعم</a></li>

                                <li><a href="#">مطاعم</a></li>

                                <li><a href="#">مطاعم</a></li>

                            </ul>

                            

                        </li>

                        

                    </div>

                    

                    <div class="results">

                        <p>نتائج البحث عن <span>"<?= $search_param ?>"<span></p>

                        <p class="num">اظهار 1-<?= $count_result ?> من نتائج البحث</p>

                    </div>

                    

                    <?php $this->load->view('site/result_boxes', array('search_results'=> $search_results)); ?>

                    

                    <div class="banner">

                        <img src="assets/images/spa.png" />

                    </div>

                    

                </div> <!-- End Of Right section div -->

            </div>

            

            <!-- Start Of Sidebar -->

            <div class="col-md-4 col-xs-12">

                <div class="sidebar">

                    <div class="widget">

                        <img src="assets/images/shampo.jpg" />

                    </div>

                    

                    <div class="widget2">

                        <img src="assets/images/shampo.jpg" />

                    </div>

                    

                    <div class="widget3">

                        <img src="assets/images/shampo.jpg" />

                    </div>

                    

                    <div class="widget4">

                        <img src="assets/images/shampo.jpg" />

                    </div>

                </div>

            </div>

            <!-- End Of Sidebar -->

            

        </div>   <!-- End Of Main Section Row -->

    </div>

</div>