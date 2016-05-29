<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page_2">
    <div class="b-inner-page-header__content">
        <div class="container">
            <h1 class="f-secondary-l c-white">Course details</h1>
            
        </div>
    </div>
</div>


<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs b-bg-breadcrumbs">
        <div class="container">
            <ul>
                <li class="f-secondary-l"><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="f-secondary-l"><i class="fa fa-angle-right"></i><a href="#"><?php echo $course->CategoryName; ?></a></li>
                <li class="f-secondary-l"><i class="fa fa-angle-right"></i><a href="#"><?php echo $course->CourseName; ?></a></li>
                <li class="f-secondary-l c-primary"><i class="fa fa-angle-right"></i><span>Detail</span></li>
            </ul>
        </div>
    </div>
    <section class=" b-infoblock">
        <div class="container">
            <div class="f-carousel-secondary b-portfolio__example-box f-some-examples-tertiary b-carousel-reset b-carousel-arr-square b-carousel-arr-square--big f-carousel-arr-square">
                <div class="b-carousel-title f-carousel-title f-carousel-title__color f-secondary-b">
                    <?php echo $course->CourseName; ?>
                    <div class="b-arrow-title-box f-arrow-title-box">
                        <!-- <a href="#"><i class="fa fa-angle-left"></i></a>
                        <a href="#"><i class="fa fa-angle-right"></i></a> -->
                    </div>
                </div>
                <!-- <div class="b-portfolio-slider-box__items">
                    <div class="b-slider-images j-slider-images">
                        <img class="" data-retina="" src="img/slider/education-slide.jpg" alt="">
                        <img class="" data-retina="" src="img/slider/education-slide.jpg" alt="">
                        <img class="" data-retina="" src="img/slider/education-slide.jpg" alt="">
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <section class="b-education-detail-box b-diagonal-line-bg-light b-infoblock">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="b-tabs f-tabs j-tabs b-tabs-reset">
                        <ul>
                            <li><a href="#tabs-21">Description</a></li>
                            <li><a href="#tabs-22">Timing</a></li>
                        </ul>
                        <div class="b-tabs__content">
                            <div id="tabs-21">
                                <h4 class="f-tabs-vertical__title f-primary-b">Course description</h4>
                                <p>
                                    <?php echo read_file($course->CourseDetails);?>
                                </p>
                            </div>
                            <div id="tabs-22">
                                <h4 class="f-tabs-vertical__title f-primary-b">Course timing</h4>
                                <p>
                                    The course will be started on : <?php echo date('d M, Y', strtotime($course->StartDate)); ?><br/>
                                    Course Schedule on a week : <?php echo $course->CourseSchedule; ?><br/>
                                    Course Start time on scheduled day : <?php echo $course->CourseTime; ?>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="f-secondary-b f-title-b-hr f-h4-special f-title-medium">For Admission</div>
                    <div class="b-information-box f-information-box f-primary-b b-information--max-size">
                        <ul>
                            <li>
                                <strong class="f-information-box__name b-information-box__name f-secondary-b">Starts</strong>
                                <i class="b-dotted f-dotted">:</i>
                                <span class="f-information_data"><?php echo date('d M, Y', strtotime($course->StartDate)); ?></span>
                            </li>
                            <li>
                                <strong class="f-information-box__name b-information-box__name f-secondary-b">Duration</strong>
                                <i class="b-dotted f-dotted">:</i>
                                <span class="f-information_data"><?php echo $course->CourseDuration;?></span>
                            </li>
                            <li>
                                <strong class="f-information-box__name b-information-box__name f-secondary-b">Instructors</strong>
                                <i class="b-dotted f-dotted">:</i>
                                <span class="f-information_data">Instructor 1</span>
                            </li>
                            <li>
                                <strong class="f-information-box__name b-information-box__name f-secondary-b">Price</strong>
                                <i class="b-dotted f-dotted">:</i>
                                <span class="f-information_data"><?php echo $course->CoursePrice; ?> BDT</span>
                            </li>
                        </ul>
                    </div>
                    <div class="b-overview__comment">
                        <div class="b-mention-short-item">
                            <div class="b-mention-short-item__comment">
                                <div class="f-mention-short-item__comment_name f-primary-b">Really great work</div>
                                <div class="b-mention-short-item__comment_text f-mention-short-item__comment_text c-29">usce eu nisi risus. Vestibulum mattis, velit nec pellentesque varius, mi est dignissim massa, at volutpat mi augue quis risus. </div>
                                <div class="b-stars-group f-stars-group">
                                    <i class="fa fa-star is-active-stars"></i>
                                    <i class="fa fa-star is-active-stars"></i>
                                    <i class="fa fa-star is-active-stars"></i>
                                    <i class="fa fa-star is-active-stars"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="b-mention-short-item__user">
                                <div class="b-mention-short-item__user_img b-right">
                                    <img class="fade-in-animate" data-retina src="img/users/user.png" alt="" />
                                </div>
                                <div class="b-mention-short-item__user_info f-right">
                                    <div class="f-mention-short-item__user_name f-primary-b">Mark Alexis</div>
                                    <div class="f-mention-short-item__user_position">MSc Money Finance - Students</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container b-infoblock--without-border">
        <div class="f-secondary-b f-title-b-hr">related courses</div>
        
        <div class="row b-shortcode-example">
            <?php 
                $count = count($related_course)>6?6:count($related_course);
                for ($i=0; $i < $count; $i++) { 
                    ?>
                    <div class="col-sm-6 col-md-4" style="margin-top:10px">
                        <div class="b-some-examples__item f-some-examples__item">
                            <div class="b-some-examples__item_img view view-sixth">
                                <a href="<?php echo base_url(); ?>homepage/home/course_details/<?php echo my_encode($related_course[$i]->Id);?>"><img class="j-data-element" data-animate="fadeInDown" data-retina src="<?php echo base_url();?>uploads/images/computer_learning_thum_img/thumb_com.jpg" alt="" /></a>
                                <div class="b-item-hover-action f-center mask">
                                    <div class="b-item-hover-action__inner">
                                        <div class="b-item-hover-action__inner-btn_group">
                                            <a href="<?php echo base_url(); ?>homepage/home/course_details/<?php echo my_encode($related_course[$i]->Id);?>" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="b-some-examples__item_info">
                                <div class="b-some-examples__item_info_level b-some-examples__item_name f-some-examples__item_name f-secondary-b c-primary"><a href="education_detail.html">MA Advertising and Design</a></div>
                                <div class="b-some-examples__item_info_level b-some-examples__item_double_info f-some-examples__item_double_info f-uppercase f-title-extra-small">
                                    <div class="b-right">Duration: <?php echo $related_course[$i]->CourseDuration;?></div>
                                    <div class="b-remaining">Starts: <?php echo date('d M, Y', strtotime($related_course[$i]->StartDate)); ?></div>
                                </div>
                                <div style="height:28px; overflow:hidden" class="b-some-examples__item_info_level b-some-examples__item_description f-some-examples__item_description f-secondary-l ">
                                    <?php echo read_file($related_course[$i]->CourseDetails);?>
                                </div>
                            </div>
                            <div class="b-some-examples__item_action">
                                <div class="b-right">
                                    <a href="<?php echo base_url(); ?>homepage/home/course_details/<?php echo my_encode($related_course[$i]->Id);?>" class="b-btn f-btn b-btn-sm f-btn-sm b-btn-default f-secondary-b">Read Details</a>
                                </div>
                                <div class="b-remaining b-some-examples__item_total f-some-examples__item_total f-secondary-b"><b>Price: </b><?php echo $related_course[$i]->CoursePrice;?> BDT</div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix visible-sm-block"></div>

                    <?php 
                }
            ?>

            
        </div>
    </section>

</div>



