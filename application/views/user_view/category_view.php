<section class="b-infoblock f-center">
            <div class="container">
                <h2 class="f-secondary-l"><strong class="f-secondary-b">Courses by category</strong></h2>

                <p class="b-infoblock-description f-desc-section f-secondary-l f-small">
                    Courses/ <?php echo $course->CategoryName; ?>
                </p>
 
                <div class="b-some-examples f-some-examples f-secondary row" id="example">
                    
                    <?php 
                            //$count = count($course_by_category)>6?6:count($all_courses);
                            if(isset($course_by_category)){

                                for ($i=0; $i < count($course_by_category); $i++) { 
                                   ?>
                                    <div class="col-sm-4 col-xs-12 course-container">
                                        <div class="b-some-examples__item f-some-examples__item">
                                            <div class="b-some-examples__item_img view view-sixth">
                                                <a href="#"><img class="j-data-element" data-animate="fadeInDown" data-retina src="<?php echo base_url();?>uploads/images/computer_learning_thum_img/thumb_com.jpg" alt="" /></a>
                                                <div class="b-item-hover-action f-center mask">
                                                    <div class="b-item-hover-action__inner">
                                                        <div class="b-item-hover-action__inner-btn_group">
                                                            <a href="education_detail.html" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="b-some-examples__item_info">
                                                <div class="b-some-examples__item_info_level b-some-examples__item_name f-some-examples__item_name"><a href="education_detail.html"><?php echo $course_by_category[$i]->CourseName;?></a></div>
                                                <div class="b-some-examples__item_info_level b-some-examples__item_double_info f-some-examples__item_double_info">
                                                    <div class="b-right">Duration: <?php echo $course_by_category[$i]->CourseDuration;?></div>
                                                    <div class="b-remaining">Starts: <?php echo date('d M, Y', strtotime($course_by_category[$i]->StartDate)); ?></div>
                                                </div>
                                                <div style="height:38px !important; overflow:hidden !important" class="b-some-examples__item_info_level b-some-examples__item_description f-some-examples__item_description">
                                                    <?php echo read_file($course_by_category[$i]->CourseDetails);?>
                                                </div>
                                            </div>
                                            <div class="b-some-examples__item_action">
                                                <div class="b-right">
                                                    <a href="<?php echo base_url(); ?>homepage/home/course_details/<?php echo my_encode($course_by_category[$i]->Id);?>" data-toggle="modal" class="b-btn f-btn b-btn-sm f-btn-sm b-btn-default f-secondary-b">Read Details</a>
                                                </div>
                                                <div class="b-remaining b-some-examples__item_total f-some-examples__item_total"><b>Price: </b><?php echo $course_by_category[$i]->CoursePrice;?> BDT</div>
                                            </div>
                                        </div>
                                    </div>             
                                   <?php  
                                }
                            }
                    ?>
                </div>
                <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
                  <script src="<?php echo base_url();?>/assets/frontend/extra/js/jquery.simplePaginationdiv.js"></script>
                  <script>
                      //$(function() {
                        $("#example").simplePagination({
                          previousButtonClass: "btn btn-danger",
                          nextButtonClass: "btn btn-danger"
                        });
                      //});
                  </script>

                

            </div>


        
</section>
