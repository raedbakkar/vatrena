	<footer class="revealed-s">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-3">
                    <h3>Need help?</h3>
                    <a href="tel://004542344599" id="phone">+45 423 445 99</a>
                    <a href="mailto:help@citytours.com" id="email_footer">help@citytours.com</a>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Register</a></li>
                         <li><a href="#">Terms and condition</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h3>Discover</h3>
                    <ul>
                        <li><a href="#">Community blog</a></li>
                        <li><a href="#">Tour guide</a></li>
                        <li><a href="#">Wishlist</a></li>
                         <li><a href="#">Gallery</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-3">
                    <h3>Settings</h3>
                    <div class="styled-select">
                        <select class="form-control" name="lang" id="lang">
                            <option value="English" selected>English</option>
                            <option value="French">French</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Russian">Russian</option>
                        </select>
                    </div>
                    <div class="styled-select">
                        <select class="form-control" name="currency" id="currency">
                            <option value="USD" selected>USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="RUB">RUB</option>
                        </select>
                    </div>
                </div>
            </div><!-- End row -->
            <div class="row">
                <div class="col-md-12">
                    <div id="social_footer">
                        <ul>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-google"></i></a></li>
                            <li><a href="#"><i class="icon-instagram"></i></a></li>
                            <li><a href="#"><i class="icon-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon-vimeo"></i></a></li>
                            <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        </ul>
                        <p>© Citytours 2015</p>
                    </div>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </footer><!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Search Menu -->
	<div class="search-overlay-menu">
		<span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="Search..." />
			<button type="submit"><i class="icon_set_1_icon-78"></i>
			</button>
		</form>
	</div><!-- End Search Menu -->

 <!-- Common scripts -->
<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="assets/js/common_scripts_min.js"></script>
<script src="assets/js/functions.js"></script>

 <!-- Specific scripts -->
<script src="assets/js/icheck.js"></script>
<script>
$('input').iCheck({
   checkboxClass: 'icheckbox_square-grey',
   radioClass: 'iradio_square-grey'
 });
 </script>
 <script src="assets/js/bootstrap-timepicker.js"></script>
 <script src="assets/js/bootstrap-datepicker.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

 <script src="assets/js/jquery.sliderPro.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function ($) {
        $('#Img_carousel').sliderPro({
            width: 960,
            height: 500,
            fade: true,
            arrows: true,
            buttons: false,
            fullScreen: false,
            smallSize: 500,
            startSlide: 0,
            mediumSize: 1000,
            largeSize: 3000,
            thumbnailArrows: true,
            autoplay: true
        });

        $('#video_carousel').sliderPro({
            width: 960,
            height: 500,
            fade: true,
            arrows: true,
            buttons: false,
            fullScreen: false,
            smallSize: 500,
            startSlide: 0,
            mediumSize: 1000,
            largeSize: 3000,
            thumbnailArrows: true,
            autoplay: false
        });

    });
</script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 <script>
  $('input.date-pick').datepicker('setDate', 'today');
  $('input.time-pick').timepicker({
    minuteStep: 15,
    showInpunts: false
  });
  </script>
  <script src="assets/js/jquery.ddslick.js"></script>
   <script>
        $("select.ddslick").each(function(){
            $(this).ddslick({
                showSelectedHTML: true 
            });
        });
    </script>

    <!--Review modal validation -->
    <script src="assets/validate.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js.map"></script>
    <script type="text/javascript" src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
    <!-- Map -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDwNBXmHBDQ29JWsRH8gwNVkf7mM0-flaI"></script>
                                   
    <script type="text/javascript">var base_url = '<?= base_url() ?>';</script>                             
    <script src="assets/js/map.js"></script>
    <script src="assets/js/infobox.js"></script>
    <script src="assets/js/pw_strenght.js"></script>

    <script src="assets/lolibox/js/lobibox.js"></script>
    <script src="assets/lolibox/demo/demo.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        // new CBPFWTabs(document.getElementById('tabs'));
    </script>
    <script>
//     raed code
    $('#list-categories-home').owlCarousel({
        rtl: true,
        loop:true,
        margin:10,
        autoplay:true,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    });

    $(document).on('click', '.list-search-btn', function () {
        $('[name=search_type]').val($(this).parent('ul').attr('class'));
        $('[name=search_type_id]').val($(this).data('id'));
    })

    function reuse_query_string(parameters) {
        var urlParams = new URLSearchParams(window.location.search);
        $.each(parameters, function (parameter, value) {
            urlParams.delete(parameter);
            urlParams.append(parameter, value);
        })
        urlParams.delete('per_page');

        return urlParams.toString();
    }

    $('[name=finder_category]').on('change', function () {
        window.location.href=
            window.location.origin+
            window.location.pathname+
            '?'+reuse_query_string({'search_type':'category', 'search_type_id':$(this).val()});
    })
    $('[name=finder_brand]').on('change', function () {
        window.location.href=
            window.location.origin+
            window.location.pathname+
            '?'+reuse_query_string({'search_type':'brand', 'search_type_id':$(this).val()});
    })

    $('[name=finder_city]').on('change', function () {
        window.location.href=
            window.location.origin+
            window.location.pathname+
            '?'+reuse_query_string({'city':$(this).val()});
    })


// ----------------------------
    function get_nearest_location() {        
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
        } 
        //Get the latitude and the longitude;
        function successFunction(position) {
            $('[name=lat]').val(position.coords.latitude);
            $('[name=lng]').val(position.coords.longitude);
            $('form#form-search-finder').submit();            
        }

        function errorFunction(){
            alert("Geocoder failed");
        }
        return false;
    }

// ----------------------------
    $('.wishlist_close_admin').on('click', function (c) {
        $(this).parent().parent().parent().fadeOut('slow', function (c) {});
    });

    var $owl = $('.owl-carousel');
    var $owl_vid = $('.owl-carousel-vid');

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
        navText:["<button class='btn-slid' type='button'>Previous</button>","<button class='btn-slid' type='button'>Next</button>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    $(document).ready(function () {

        $('.owl-one.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:true,
            navText:["<button class='btn-slid' type='button'>Previous</button>","<button class='btn-slid' type='button'>Next</button>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:4
                },
                1000:{
                    items:8
                }
            }

        });
        $('.datetimepicker3').datetimepicker({
            format: 'LT'
        });
    });

    </script>

   
    <script src="assets/js/leto.js"></script>


  </body>
</html>