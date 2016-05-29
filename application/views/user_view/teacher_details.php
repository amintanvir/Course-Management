<style type="text/css">
.teacher_img{
    width: 100% !important;
    height: 200px !important;
}

.img-container{
    width: 300px !important;
    height: 220px !important;
}

.img-container>img{
    width: 100% !important;
    height: 100% !important;
}

@media screen and (max-width:800px){
    .img-container{
        width: 60% !important;
        height: 220px !important;
    }
}

@media screen and (max-width:600px){
    .img-container{
        width: 70% !important;
        height: 220px !important;
    }
}

@media screen and (max-width:500px){
    .img-container{
        width: 100% !important;
        height: 220px !important;
    }
}



</style>




<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page_2">
    <div class="b-inner-page-header__content">
        <div class="container">
            <h1 class="f-secondary-l c-white">Teacher details</h1>
        </div>
    </div>
</div>


<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs b-bg-breadcrumbs">
        <div class="container">
            <ul>
                <li class="f-secondary-l"><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="f-secondary-l"><i class="fa fa-angle-right"></i><a href="#"><?php echo $teacher->FullName; ?></a></li>
                <li class="f-secondary-l c-primary"><i class="fa fa-angle-right"></i><span>Detail</span></li>
            </ul>
        </div>
    </div>
    <section class=" b-infoblock">
        <div class="container">
            <div class="f-carousel-secondary b-portfolio__example-box f-some-examples-tertiary b-carousel-reset b-carousel-arr-square b-carousel-arr-square--big f-carousel-arr-square">
                <div class="b-carousel-title f-carousel-title f-carousel-title__color f-secondary-b">
                    <?php echo $teacher->FullName; ?>
                    <div class="b-arrow-title-box f-arrow-title-box">
                        <!-- <a href="#"><i class="fa fa-angle-left"></i></a>
                        <a href="#"><i class="fa fa-angle-right"></i></a> -->
                    </div>
                </div>

                <?php 
                    if($teacher->Picture!=""){
                ?>
                <div class="teacher_img">
                        <div class="img-container">
                            <img class="img-responsive" data-retina="" src="<?php echo base_url().$teacher->Picture;?>" alt="">
                        </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>
    <section class="b-education-detail-box b-diagonal-line-bg-light b-infoblock">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="b-tabs f-tabs j-tabs b-tabs-reset">
                        <ul>
                            <li><a href="#tabs-21">Academic Details</a></li>
                            <li><a href="#tabs-22">Personal Details</a></li>
                        </ul>
                        <div class="b-tabs__content">
                            <div id="tabs-21">
                                <h4 class="f-tabs-vertical__title f-primary-b">Academic Details</h4>
                                <p>
                                    Message: <?php echo $teacher->Message==""?"No message":$teacher->Message;?><br/>
                                    Interested Area: <?php echo $teacher->InterestedArea==""?"No message":$teacher->Message;?><br/>
                                    Designation: <?php echo $teacher->Designation; ?><br/>
                                    Academic Description: <?php echo $teacher->AcademicDescription; ?>
                                </p>
                            </div>
                            <div id="tabs-22">
                                <h4 class="f-tabs-vertical__title f-primary-b">Personal Details</h4>
                                <p>
                                    Email : <?php echo $teacher->Email; ?><br/>
                                    Contact : <?php echo $teacher->ContactNumber; ?><br/>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="f-secondary-b f-title-b-hr f-h4-special f-title-medium">Course Taken</div>
                    <div class="b-information-box f-information-box f-primary-b b-information--max-size">
                        <ul>
                            <li>
                                <strong class="f-information-box__name b-information-box__name f-secondary-b">Starts</strong>
                                <i class="b-dotted f-dotted">:</i>
                                <span class="f-information_data"><?php //echo date('d M, Y', strtotime($course->StartDate)); ?></span>
                            </li>
                            <li>
                                <strong class="f-information-box__name b-information-box__name f-secondary-b">Duration</strong>
                                <i class="b-dotted f-dotted">:</i>
                                <span class="f-information_data"><?php //echo $course->CourseDuration;?></span>
                            </li>
                            <li>
                                <strong class="f-information-box__name b-information-box__name f-secondary-b">Price</strong>
                                <i class="b-dotted f-dotted">:</i>
                                <span class="f-information_data"><?php //echo $course->CoursePrice; ?> BDT</span>
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
    

</div>