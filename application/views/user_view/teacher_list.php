<section class="b-infoblock f-center">
            <div class="container">
                <h2 class="f-secondary-l"><strong class="f-secondary-b">All</strong> Courses</h2>

                <p class="b-infoblock-description f-desc-section f-secondary-l f-small">
                    All teacher lists are following
                </p>
 
                <div class="b-some-examples f-some-examples f-secondary row" id="example">
                    
                    <?php 

                            $count = count($all_teachers)>6?6:count($all_teachers);
                            if(isset($all_teachers)){
                                for ($i=0; $i < count($all_teachers); $i++) { 
                                   ?>
                                    
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="b-employee-item b-employee-item--color f-employee-item">
                                            <div class=" view view-sixth">
                                                <?php 
                                                    if($all_teachers[$i]->Picture!=""){
                                                        ?>
                                                        <a href="<?php echo base_url();?>homepage/home/teacher_details/<?php echo my_encode($all_teachers[$i]->Id);?>"><img class="j-data-element" data-animate="fadeInDown" height="200" data-retina src="<?php echo base_url().$all_teachers[$i]->Picture;?>" alt="" /></a>
                                                        <?php 
                                                    }else{
                                                ?>
                                                        <a href="#"><img class="j-data-element" data-animate="fadeInDown" data-retina src="<?php echo base_url();?>uploads/images/gender/<?php echo $all_teachers[$i]->Gender=='m'?'Male':'Female';?>" alt="" /></a>
                                                <?php 
                                                    }
                                                ?>
                                                
                                                <div class="b-item-hover-action f-center mask">
                                                    <div class="b-item-hover-action__inner">
                                                        <div class="b-item-hover-action__inner-btn_group">
                                                            <a href="about_us_meet_our_team_detail.html" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="f-primary-b"><?php echo $all_teachers[$i]->FullName;?></h4>
                                            <div class="b-employee-item__position f-employee-item__position">Designation: <?php echo $all_teachers[$i]->Designation; ?></div>
                                            <p>Email: <?php //echo $all_teachers[$i]->Email;  ?></p>
                                            <div class="b-employee-item__social">
                                                <a href="#" class="b-employee-item__social_btn"><i class="fa fa-twitter"></i></a>
                                                <a href="#" class="b-employee-item__social_btn"><i class="fa fa-google-plus"></i></a>
                                                <a href="#" class="b-employee-item__social_btn"><i class="fa fa-thumbs-up"></i></a>
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
