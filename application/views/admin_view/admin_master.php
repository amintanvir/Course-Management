<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8"/>
<title><?php echo isset($title)?$title:""?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all"  rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->


<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
<!-- END PAGE LEVEL STYLES -->


<!--BEGIN DataTable PAGE LEVEL STYLES-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/select2/select2-metronic.css"/>
<!--END DataTable PAGE LEVEL STYLES-->



<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url(); ?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/custom/css/custom.style.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->




<!--MyCustomStyles-->
<link href="<?php echo base_url(); ?>assets/custom/css/style.custom.css" rel="stylesheet" type="text/css"/>
<!--EndMyCustomStyles-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/custom/js/validation.js" type="text/javascript"></script>


<link rel="shortcut icon" href="favicon.ico"/>

<style type="text/css">
    .help-block{
        margin-top: 0 !important;
        margin-bottom: 0 !important;
        height: 16px !important;
        font-size: 10 px !important;
    }
    .edit_selected{
        color:green;
        font-weight: bold;
    }
    .cutom-readonly{
        cursor: pointer !important; background-color: white !important;
    }

</style>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed" id="main_body">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
        <!-- BEGIN LOGO -->
        <a class="navbar-brand" href="index.html">
            <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" class="img-responsive"/>
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="<?php echo base_url(); ?>assets/img/menu-toggler.png" alt=""/>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">
             <!-- BEGIN INBOX DROPDOWN -->
            <li class="dropdown" id="header_inbox_bar">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <?php 
                        $date = date("Y-m-d");
                        $data=array();
                        $data["in_DueDate"]=$date;
                        $due_payment_date = $this->course_registration_model->select_due_today($data);
                    ?>
                    <i class="fa fa-envelope"></i>
                    <span class="badge">
                         <?php echo count($due_payment_date); ?>
                    </span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <li>
                        
                        <p>
                           Today: <?php echo count($due_payment_date); ?> payment date
                        </p>
                    </li>
                    <li>
                        <ul class="dropdown-menu-list scroller" style="height: 250px;">
                            <?php 
                                foreach ($due_payment_date as $key => $value) {
                            ?>
                                <li>
                                    <a href="inbox.html?a=view">
                                        <span style='display:<?php echo $value->Picture!=""?"inline":"none";?>' class="photo">
                                            <img src="<?php echo base_url().$value->Picture;?>" alt=""/>
                                        </span>
                                        <span class="subject">
                                            <span class="from">
                                                <?php echo $value->FullName;?>
                                            </span>
                                            <span class="time">
                                                
                                            </span>
                                        </span>
                                        <span class="message">
                                            On Course: <?php echo $value->CourseName;?><br/>
                                            Payble Mone: <?php echo $value->PaybleAmount; ?>
                                        </span>
                                    </a>
                                </li>
                            <?php 
                                }
                            ?>
                            
                        </ul>
                    </li>
                    <li class="external">
                        <a href="<?php echo base_url();?>admin/user/see_all_due">
                             See all messages <i class="m-icon-swapright"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END INBOX DROPDOWN -->
            
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" src="<?php echo base_url(); ?>assets/img/avatar1_small.jpg"/>
                    <span class="username">
                        <?php 
                            $user_name = $this->session->userdata("UserName");
                            echo isset($user_name)?$user_name:"";
                        ?>
                    </span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url();?>admin/user/user_profile">
                            <i class="fa fa-user"></i> My Profile
                        </a>
                    </li>
                  
                    <li class="divider">
                    </li>
                    <li>
                        <a href="javascript:;" id="trigger_fullscreen">
                            <i class="fa fa-arrows"></i> Full Screen
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-lock"></i> Lock Screen
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>admin/user/logout">
                            <i class="fa fa-key"></i> Log Out
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                <li class="sidebar-toggler-wrapper">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler hidden-phone">
                    </div>
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                </li>
                <li class="start first_menu_start">
                    <a href="<?php echo base_url();?>admin/user/user_profile">
                        <i class="fa fa-home"></i>
                        <span class="title">
                            Dashboard
                        </span>
                    </a>
                </li>
                
               
                <li class="menu_main">
                    <a href="javascript:;">
                        <i class="fa fa-puzzle-piece"></i>
                        <span class="title">
                            Course
                        </span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/course_category">
                                Add Course Category
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/course_details">
                                Add Course Details
                            </a>
                        </li>
                        
                    </ul>
                </li>



                <li class="menu_main">
                    <a href="javascript:;">
                        <i class="fa fa-puzzle-piece"></i>
                        <span class="title">
                            Student
                        </span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/student_info">
                                Add Student Info
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/course_registration">
                                Register on Course
                            </a>
                        </li>
                        
                    </ul>
                </li>


                <li class="menu_main">
                    <a href="javascript:;">
                        <i class="fa fa-puzzle-piece"></i>
                        <span class="title">
                            Employee
                        </span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/courseteacher_info">
                                Add Teacher Info
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/assign_teacher_to_course">
                                Assign Teacher To Course
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/employee_info">
                                Add Employee Info
                            </a>
                        </li>
                    </ul>
                </li>
                

                <li class="menu_main">
                    <a href="javascript:;">
                        <i class="fa fa-puzzle-piece"></i>
                        <span class="title">
                            Accounts
                        </span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/expense_category">
                                Add Expense Category
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/expense_details">
                                Add Expense Details
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/income_category">
                                Add Income Category
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/income_details">
                                Add Income Details
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/employee_salary">
                                Employee Salary
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu_main">
                    <a href="javascript:;">
                        <i class="fa fa-bar-chart-o"></i>
                        <span class="title">
                            Reports
                        </span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/income_report">
                                Income Report
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/expense_report">
                                Expense Report
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/all_report">
                                Total Income Expense Report
                            </a>
                        </li>
                    </ul>
                </li>



            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN STYLE CUSTOMIZER -->
            <div class="theme-panel hidden-xs hidden-sm">
                <div class="toggler">
                </div>
                <div class="toggler-close">
                </div>
                <div class="theme-options">
                    <div class="theme-option">
                        <span>
                             Layout
                        </span>
                        <select class="layout-option form-control input-small">
                            <option value="fluid" selected="selected">Fluid</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span>
                             Header
                        </span>
                        <select class="header-option form-control input-small">
                            <option value="fixed" selected="selected">Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span>
                             Sidebar
                        </span>
                        <select class="sidebar-option form-control input-small">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span>
                             Sidebar Position
                        </span>
                        <select class="sidebar-pos-option form-control input-small">
                            <option value="left" selected="selected">Left</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span>
                             Footer
                        </span>
                        <select class="footer-option form-control input-small">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- END STYLE CUSTOMIZER -->
            

            


            <!--Main Mastering-->
            <?php 
                if(isset($main_content)){
                    echo $main_content;
                }
            ?>
            <!--End Main Mastering-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="footer-inner">
         2014 &copy; Metronic by keenthemes.
    </div>
    <div class="footer-tools">
        <span class="go-top">
            <i class="fa fa-angle-up"></i>
        </span>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script> 
    <![endif]-->

<script src="<?php echo base_url(); ?>assets/custom/js/validation.js" type="text/javascript"></script>

    <?php 
        if(isset($title)&&$title!="Add Student Info"){
    ?>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
    <?php }?>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap2-typeahead.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS DATATABLE -->



<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/scripts/core/app.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/custom/components-pickers.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->


<!-- BEGIN DROPDOWN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/scripts/custom/components-dropdowns.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->



<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/scripts/custom/table-advanced.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>

        jQuery(document).ready(function() {       
           // initiate layout and plugins
           App.init();

           ComponentsPickers.init();
           TableAdvanced.init();
        });   



        var title = $("title").text().trim();
        //alert(title);
        if(title=="Dashboard"){
            var ht = '<span class="selected"></span><span class="arrow open"></span>';
            $(".first_menu_start").addClass("active");
        }else{
            $(".menu_main").each(function  (argument) {
                $(this).children("ul").hide();
                var objThis = $(this);
                $(this).children().find("a").each(function(){
                    var subMenuObj = $(this);
                    var menuText = $(this).text().trim();
                    if(menuText==title){
                        objThis.children("ul").show();
                        subMenuObj.parent().addClass("active");
                        var ht = '<span class="selected"></span><span class="arrow open"></span>';
                        objThis.children("a").append(ht);
                        objThis.addClass("active");
                    }
                });
            });
        }

</script>
<!-- END JAVASCRIPTS -->





</body>
<!-- END BODY -->
</html>

