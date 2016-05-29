<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo isset($title)?$title:"Home";?></title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- bxslider -->
    <link type="text/css" rel='stylesheet' href="js/bxslider/jquery.bxslider.css">
    <!-- End bxslider -->
    <!-- flexslider --
    <link type="text/css" rel='stylesheet' href="js/flexslider/flexslider.css">
    <!-- End flexslider -->
    <!-- bxslider -->
    <link type="text/css" rel='stylesheet' href="<?php echo base_url();?>assets/frontend/js/radial-progress/style.css">
    <!-- End bxslider -->
    <!-- Animate css -->
    <link type="text/css" rel='stylesheet' href="<?php echo base_url();?>assets/frontend/css/animate.css">
    <!-- End Animate css -->
    <!-- Bootstrap css -->
    <link type="text/css" rel='stylesheet' href="<?php echo base_url();?>assets/frontend/css/bootstrap.min.css">
    <link type="text/css" rel='stylesheet' href="<?php echo base_url();?>assets/frontend/js/bootstrap-progressbar/bootstrap-progressbar-3.2.0.min.css">
    <!-- End Bootstrap css -->
    <!-- Jquery UI css -->
    <link type="text/css" rel='stylesheet' href="<?php echo base_url();?>assets/frontend/js/jqueryui/jquery-ui.css">
    <link type="text/css" rel='stylesheet' href="<?php echo base_url();?>assets/frontend/js/jqueryui/jquery-ui.structure.css">
    <!-- End Jquery UI css -->
    <!-- Fancybox -->
    <link type="text/css" rel='stylesheet' href="<?php echo base_url();?>assets/frontend/js/fancybox/jquery.fancybox.css">
    <!-- End Fancybox -->

    <link type="text/css" rel='stylesheet' href="<?php echo base_url();?>assets/frontend/fonts/fonts.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <link type="text/css" data-themecolor="default" rel='stylesheet' href="<?php echo base_url();?>assets/frontend/css/main-default.css">

    <link type="text/css" rel='stylesheet' href="<?php echo base_url();?>assets/frontend/js/rs-plugin/css/settings.css">
    <link type="text/css" rel='stylesheet' href="<?php echo base_url();?>assets/frontend/js/rs-plugin/css/settings-custom.css">
    <link type="text/css" rel='stylesheet' href="<?php echo base_url();?>assets/frontend/js/rs-plugin/videojs/video-js.css">

    <style type="text/css">
        .b-menuMargin{
            margin-right: 100px !important
        }
    </style>
</head>
<body>
    <div class="mask-l" style="background-color: #fff; width: 100%; height: 100%; position: fixed; top: 0; left:0; z-index: 9999999;"></div> <!--removed by integration-->
    <header>
        <div class="container b-header__box b-relative">
            <a href="/" class="b-left b-logo "><img class="color-theme" data-retina src="<?php echo base_url();?>assets/frontend/img/logo-header-default.png" width="170" height="50" alt="Logo" /></a>
            <div class="b-header-r b-right b-header-r--icon">
                <div class="b-header-ico-group f-header-ico-group b-right">
                    <!--<span class="b-search-box">
                        <i class="fa fa-search"></i>
                        <input type="text" placeholder="Enter your keywords" />
                    </span>-->
                    <!-- <span class="b-header-ico b-header-ico-cart-parent">
                        <a href="#" class="b-fa-shopping-cart"><i class="fa fa-shopping-cart"></i>MD. Fakhrul Hasan</a>
                        <div class="b-option-cart__items">
                            <div class="b-option-cart__items__title f-option-cart__items__title f-default-l">Recently added item(s)</div>
                            <ul>
                                <li>
                                    <div class="b-option-cart__items__img">
                                        <div class="view view-sixth">
                                            <img data-retina="" src="<?php echo base_url();?>assets/frontend/img/shop/cart_mini_pic.jpg" alt="">
                                            <div class="b-item-hover-action f-center mask">
                                                <div class="b-item-hover-action__inner">
                                                    <div class="b-item-hover-action__inner-btn_group">
                                                        <a href="#" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="b-option-cart__items__descr">
                                        <strong class="b-option-cart__descr__title f-option-cart__descr__title"><a href="#">Product Example</a></strong>
                                        <span class="b-option-cart__descr__cost f-option-cart__descr__cost">1 x $239</span>
                                    </div>
                                    <i class="fa fa-times b-icon--fa"></i>
                                </li>
                                <li>
                                    <div class="b-option-cart__items__img">
                                        <div class="view view-sixth">
                                            <img data-retina="" src="<?php echo base_url();?>assets/frontend/img/shop/cart_mini_pic.jpg" alt="">
                                            <div class="b-item-hover-action f-center mask">
                                                <div class="b-item-hover-action__inner">
                                                    <div class="b-item-hover-action__inner-btn_group">
                                                        <a href="#" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="b-option-cart__items__descr">
                                        <strong class="b-option-cart__descr__title f-option-cart__descr__title"><a href="#">Product Example</a></strong>
                                        <span class="b-option-cart__descr__cost f-option-cart__descr__cost">1 x $239</span>
                                    </div>
                                    <i class="fa fa-times b-icon--fa"></i>
                                </li>
                            </ul>
                            <div class="b-option-cart__btn">
                                <button class="button-xs button-gray-light">Cancel</button>
                                <button class="button-xs">Check out  </button>
                            </div>
                        </div>
                    </span> -->
                </div>
                <div class="b-top-nav-show-slide f-top-nav-show-slide b-right j-top-nav-show-slide"><i class="fa fa-align-justify"></i></div>
                <nav class="b-top-nav f-top-nav b-right j-top-nav">
                    <ul class="b-top-nav__1level_wrap">
                        <li class="b-top-nav__1level f-top-nav__1level is-active-top-nav__1level f-primary-b">
                            <a href="<?php echo base_url();?>homepage/home"><i class="fa fa-home b-menu-1level-ico"></i>Home <span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>

                        </li>

                        <li class="b-top-nav__1level f-top-nav__1level f-primary-b">
                            <a href="shop_listing_col.html"><i class="fa fa-list b-menu-1level-ico"></i>Courses <span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                            <div class="b-top-nav__dropdomn">
                                <ul class="b-top-nav__2level_wrap">
                                    <li class="b-top-nav__2level_title f-top-nav__2level_title">Courses by Category</li>
                                    <?php 
                                        $all_course_category = $this->session->userdata('all_course_category');
                                        if(isset($all_course_category)){
                                            foreach ($all_course_category as $v_category) {
                                    ?>
                                            <li class="b-top-nav__2level f-top-nav__2level f-primary"><a href="<?php echo base_url();?>homepage/home/category/<?php echo my_encode($v_category->Id); ?>"><i class="fa fa-angle-right"></i><?php echo $v_category->CategoryName; ?></a></li>                                                
                                            <?php 
                                            }
                                        }
                                        $this->session->unset_userdata('all_course_category');
                                    ?>
                                </ul>
                            </div>
                        </li>
                        <li class="b-top-nav__1level f-top-nav__1level f-primary-b">
                            <a href="<?php echo base_url();?>homepage/home/contact_us"><i class="fa fa-folder-open b-menu-1level-ico"></i>Contact us<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        </li>
                        <li class="b-top-nav__1level f-top-nav__1level f-primary-b b-top-nav-big">
                            <a href="<?php echo base_url();?>homepage/home/about_us"><i class="fa fa-folder-open b-menu-1level-ico"></i>About Us<span class="b-ico-dropdown"><i class="fa fa-arrow-circle-down"></i></span></a>
                        </li>
                    </ul>

                </nav>
            </div>
        </div>
    </header>
    <div class="j-menu-container"></div>



    <!--Mastering-->
        <?php echo isset($main_content)? $main_content:"";?>
    <!--End Mastering-->



    <footer>
        <div class="b-footer-primary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12 f-copyright b-copyright">Copyright © <?php echo date("Y"); ?> - All Rights Reserved</div>
                    <div class="col-sm-8 col-xs-12">
                        <div class="b-btn f-btn b-btn-default b-right b-footer__btn_up f-footer__btn_up j-footer__btn_up">
                            <i class="fa fa-chevron-up"></i>
                        </div>
                        <nav class="b-bottom-nav f-bottom-nav b-right hidden-xs">
                            <ul>
                                <li><a href="<?php echo base_url();?>homepage/home">Homepage</a></li>
                                <li><a href="<?php echo base_url();?>homepage/home/contact_us">Contact Us</a></li>
                                <li><a href="<?php echo base_url();?>homepage/home/about_us">About Us</a></li>
                                <li><a href="<?php echo base_url();?>homepage/home/course_lists">Course Lists</a></li>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="b-footer-secondary row">
                <div class="col-md-3 col-sm-12 col-xs-12 f-center b-footer-logo-containter">
                    <a href=""><img data-retina class="b-footer-logo color-theme" src="<?php echo base_url();?>uploads/images/computer_learning_thum_img/logo_thumb.gif" width="180" height="60" alt="Logo" /></a>
                    <div class="b-footer-logo-text f-footer-logo-text">
                        <p>Mauris rhoncus pretium porttitor. Cras scelerisque commodo odio.</p>
                        <div class="b-btn-group-hor f-btn-group-hor">
                            <a href="#" class="b-btn-group-hor__item f-btn-group-hor__item">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="b-btn-group-hor__item f-btn-group-hor__item">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#" class="b-btn-group-hor__item f-btn-group-hor__item">
                                <i class="fa fa-dribbble"></i>
                            </a>
                            <a href="#" class="b-btn-group-hor__item f-btn-group-hor__item">
                                <i class="fa fa-behance"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <h4 class="f-primary-b">Latest blog posts</h4>
                    <div class="b-blog-short-post row">
                        <div class="b-blog-short-post__item col-md-12 col-sm-4 col-xs-12 f-primary-b">
                            <div class="b-blog-short-post__item_text f-blog-short-post__item_text">
                                <a href="blog_detail_left_slidebar.html">Amazing post with all the goodies</a>
                            </div>
                            <div class="b-blog-short-post__item_date f-blog-short-post__item_date">
                                March 23, 2013
                            </div>
                        </div>
                        <div class="b-blog-short-post__item col-md-12 col-sm-4 col-xs-12 f-primary-b">
                            <div class="b-blog-short-post__item_text f-blog-short-post__item_text">
                                <a href="blog_detail_left_slidebar.html">Amazing post with all the goodies</a>
                            </div>
                            <div class="b-blog-short-post__item_date f-blog-short-post__item_date">
                                March 23, 2013
                            </div>
                        </div>
                        <div class="b-blog-short-post__item col-md-12 col-sm-4 col-xs-12 f-primary-b">
                            <div class="b-blog-short-post__item_text f-blog-short-post__item_text">
                                <a href="blog_detail_left_slidebar.html">Amazing post with all the goodies</a>
                            </div>
                            <div class="b-blog-short-post__item_date f-blog-short-post__item_date">
                                March 23, 2013
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <h4 class="f-primary-b">contact info</h4>
                    <div class="b-contacts-short-item-group">
                        <div class="b-contacts-short-item col-md-12 col-sm-4 col-xs-12">
                            <div class="b-contacts-short-item__icon f-contacts-short-item__icon f-contacts-short-item__icon_lg b-left">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="b-remaining f-contacts-short-item__text">
                                World IT solutions Studio<br />
                                1208 - Street Name, City Name,<br />
                                Bangladesh.<br />
                            </div>
                        </div>
                        <div class="b-contacts-short-item col-md-12 col-sm-4 col-xs-12">
                            <div class="b-contacts-short-item__icon f-contacts-short-item__icon b-left f-contacts-short-item__icon_md">
                                <i class="fa fa-skype"></i>
                            </div>
                            <div class="b-remaining f-contacts-short-item__text f-contacts-short-item__text_phone">
                                Skype: skype.id
                            </div>
                        </div>
                        <div class="b-contacts-short-item col-md-12 col-sm-4 col-xs-12">
                            <div class="b-contacts-short-item__icon f-contacts-short-item__icon b-left f-contacts-short-item__icon_xs">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="b-remaining f-contacts-short-item__text f-contacts-short-item__text_email">
                                <a href="mailto:frexystudio@gmail.com">mail@example.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 ">
                    
                        <h3 class="f-primary-b b-title-description f-title-description">like us on facebook</h3>
                        <div class="b-wiget-fb">
                            <div class="b-wiget-fb-content" id="fb-root">
                                <div class="fb-like-box" data-width="285" data-href="https://www.facebook.com/FacebookDevelopers"
                                     data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false"
                                     data-show-border="false"></div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>



    </footer>
    <script src="<?php echo base_url();?>assets/frontend/js/breakpoints.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/jquery/jquery-1.11.1.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url();?>assets/frontend/js/scrollspy.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/bootstrap-progressbar/bootstrap-progressbar.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/bootstrap.min.js"></script>
    <!-- end bootstrap -->
    <script src="<?php echo base_url();?>assets/frontend/js/masonry.pkgd.min.js"></script>
    <script src='<?php echo base_url();?>assets/frontend/js/imagesloaded.pkgd.min.js'></script>
    <!-- bxslider -->
    <script src="<?php echo base_url();?>assets/frontend/js/bxslider/jquery.bxslider.min.js"></script>
    <!-- end bxslider -->
    <!-- smooth-scroll -->
    <script src="<?php echo base_url();?>assets/frontend/js/smooth-scroll/SmoothScroll.js"></script>
    <!-- end smooth-scroll -->
    <!-- carousel -->
    <script src="<?php echo base_url();?>assets/frontend/js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <!-- end carousel -->
    <script src="<?php echo base_url();?>assets/frontend/js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/rs-plugin/videojs/video.js"></script>

    <!-- jquery ui -->
    <script src="<?php echo base_url();?>assets/frontend/js/jqueryui/jquery-ui.js"></script>
    <!-- end jquery ui -->
    <script type="text/javascript" language="javascript"
            src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyCfVS1-Dv9bQNOIXsQhTSvj7jaDX7Oocvs"></script>
    <!-- Modules -->
    <script src="<?php echo base_url();?>assets/frontend/js/modules/sliders.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/modules/ui.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/modules/retina.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/modules/animate-numbers.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/modules/parallax-effect.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/modules/settings.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/modules/maps-google.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/modules/color-themes.js"></script>
    <!-- End Modules -->
    <!-- radial Progress -->
    <script src="<?php echo base_url();?>assets/frontend/js/radial-progress/jquery.easing.1.3.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/d3/3.4.13/d3.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/radial-progress/radialProgress.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/progressbars.js"></script>
    <!-- end Progress -->
    <!-- Google services -->
    <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart']}]}"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/google-chart.js"></script>
    <!-- end Google services -->
    <script src="<?php echo base_url();?>assets/frontend/js/j.placeholder.js"></script>

    <!-- Fancybox -->
    <script src="<?php echo base_url();?>assets/frontend/js/fancybox/jquery.fancybox.pack.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/fancybox/jquery.mousewheel.pack.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/fancybox/jquery.fancybox.custom.js"></script>
    <!-- End Fancybox -->
    <script src="<?php echo base_url();?>assets/frontend/js/user.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/timeline.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/fontawesome-markers.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/markerwithlabel.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/cookie.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/loader.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/scrollIt/scrollIt.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/modules/navigation-slide.js"></script>

</body>
</html>
