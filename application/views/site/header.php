<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
    <meta name="author" content="Ansonika">
    <title>CITY TOURS - City tours and travel site template by Ansonika</title>
    
    <!-- Favicons-->
    <base href="<?= base_url() ?>">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="assets/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="assets/img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- Google web fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- CSS -->
    <?php if(is_arabic()){ ?>
        <link href="assets/ar/css/base.css" rel="stylesheet">
        <link href="assets/css/slider-pro.min.css" rel="stylesheet">
        <!-- SPECIFIC CSS -->
        <link href="assets/ar/css/skins/square/grey.css" rel="stylesheet">
        <link href="assets/ar/css/date_time_picker.css" rel="stylesheet">
        <link href="assets/ar/css/rlt_handle.css" rel="stylesheet">
    <?php }else{ ?>
        <link href="assets/css/base.css" rel="stylesheet">
        <link href="assets/css/slider-pro.min.css" rel="stylesheet">
        <!-- SPECIFIC CSS -->
        <link href="assets/css/skins/square/grey.css" rel="stylesheet">
        <link href="assets/css/date_time_picker.css" rel="stylesheet">
    <?php } ?>
        <!-- <link href="assets/css/select2-bootstrap.css" rel="stylesheet"> -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-typeahead.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <?php if(is_arabic()){ ?>
        <link rel="stylesheet" href="https://cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">
    <?php } ?> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
        <link href="assets/css/admin.css" rel="stylesheet">
        <link href="assets/css/jquery.switch.css" rel="stylesheet">
        <link href="assets/css/lobibox.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css"> -->
        <link href="assets/css/leto.css" rel="stylesheet">
    <?php if(is_arabic()){ ?>
        <link href="assets/css/leto_ar.css" rel="stylesheet">
    <?php } ?>
        
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
        
</head>
<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
    <!-- End Preload -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

     <!-- Header================================================== -->
    <header>
        <div id="top_line">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6"><i class="icon-phone"></i><strong>0045 043204434</strong></div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <ul id="top_links">
                            <li>
                                <div class="dropdown dropdown-access">
                                   
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Sign in</a>
                                    
                                </div><!-- End Dropdown access -->
                            </li>
                            <li><a href="wishlist.html" id="wishlist_link">Wishlist</a></li>
                            <li><a href="<?= base_url() ?>langChanger/en">en</a></li>
                            <li><a href="<?= base_url() ?>langChanger/ar">عربي</a></li>
                        </ul>
                    </div>
                </div><!-- End row -->
            </div><!-- End container-->
        </div><!-- End top line-->
        
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div>
                        <h1 class="logofit"><a href="<?= base_url() ?>"><img src="assets/img/logo_vatrena.png"></a></h1>
                    </div>
                </div>
                <nav class="col-md-9 col-sm-9 col-xs-9">
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="<?= base_url() ?>langChanger/en"><span>en</span></a>
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="<?= base_url() ?>langChanger/ar"><span>عربي</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="assets/img/logo_vatrena.png" width="160" height="34" alt="City tours" data-retina="true">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul>
                            <li class="submenu">
                                <a href="<?= base_url() ?>" class="show-submenu"><?= lang('v_home'); ?></a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu"><?= lang('v_Stores'); ?></a>
                            </li>
                            <li class="submenu"> 
                                 <a href="<?= base_url() ?>register" class="show-submenu"><?= lang('v_Register'); ?></a>
                            </li>
                        </ul>
                    </div><!-- End main-menu -->
                    <ul id="top_tools">
                        <!-- <li>
                            <div class="ar-en dropdown dropdown-search">
                                <a href="#" class="ar-en search-overlay-menu-btn" data-toggle="dropdown"><i class="icon-search"></i></a>
                            </div>
                        </li> -->
                        <li>
                            <?php if(is_arabic()){ ?>
                            <div class="ar-en dropdown dropdown-search">
                                <a href="<?= base_url() ?>langChanger/en">EN</a>
                               
                            <?php }else{ ?>
                            <div class="ar-en dropdown dropdown-search">
                                <a href="<?= base_url() ?>langChanger/ar">AR</a>
                            </div>
                            <?php } ?>
                        </li>
                        <?php is_logged_in(); ?>
                    </ul>
                </nav>
            </div>
        </div><!-- container -->
    </header><!-- End Header -->