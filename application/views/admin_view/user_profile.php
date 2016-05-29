<!-- BEGIN PAGE CONTENT-->
            <div class="row profile">
                <div class="col-md-12">
                    <!--BEGIN TABS-->
                    <div class="tabbable tabbable-custom tabbable-full-width">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_3" data-toggle="tab">
                                    Account
                                </a>
                            </li>
                           
                        </ul>
                        <div class="tab-content">
                           
                            <div class="tab-pane active" id="tab_1_3">
                                <div class="row profile-account">
                                    <div class="col-md-3">
                                        <ul class="ver-inline-menu tabbable margin-bottom-10">
                                            <li class="active">
                                                <a data-toggle="tab" href="#tab_1-1">
                                                    <i class="fa fa-cog"></i> Personal info
                                                </a>
                                                <span class="after">
                                                </span>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab_2-2">
                                                    <i class="fa fa-picture-o"></i> Change Avatar
                                                </a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab_3-3">
                                                    <i class="fa fa-lock"></i> Change Password
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tab-content">
                                            <div id="tab_1-1" class="tab-pane active">
                                                <form role="form" action="#">
                                                    <div class="form-group">
                                                        <label class="control-label">Full Name</label>
                                                        <input type="text" name="txtFullName" id="txtFullName" placeholder="Full Name" class="form-control" />
                                                    </div>
                                                    
                                                    <div class="margiv-top-10">
                                                        <a href="#" class="btn green">
                                                            Save Changes
                                                        </a>
                                                        <a href="#" class="btn default">
                                                            Cancel
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="tab_2-2" class="tab-pane">
                                                <p>
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                </p>
                                                <form action="#" role="form">
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                            </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new">
                                                                        Select image
                                                                    </span>
                                                                    <span class="fileinput-exists">
                                                                        Change
                                                                    </span>
                                                                    <input type="file" name="...">
                                                                </span>
                                                                <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
                                                                    Remove
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix margin-top-10">
                                                            <span class="label label-danger">
                                                                NOTE!
                                                            </span>
                                                            <span>
                                                                Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="margin-top-10">
                                                        <a href="#" class="btn green">
                                                            Submit
                                                        </a>
                                                        <a href="#" class="btn default">
                                                            Cancel
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="tab_3-3" class="tab-pane">
                                                <form action="#">
                                                    <div class="form-group" id="messageContainer">
                                                        <label class="control-label" id="message"></label>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label">Current Password</label>
                                                        <input type="password" id="txtCurrentPassword" name="txtCurrentPassword" placeholder="Enter Current Password" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">New Password</label>
                                                        <input type="password" id="txtNewPassword" name="txtNewPassword" placeholder="Enter New Password" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Re-type New Password</label>
                                                        <input type="password" id="txtNewPasswordRetype" name="txtNewPasswordRetype" placeholder="Re-type New Password" class="form-control" />
                                                    </div>
                                                    <div class="margin-top-10">
                                                        <button type="button" id="btnChangePassword" class="btn green">
                                                            Change Password
                                                        </button>
                                                        <button type="button" onclick="ClearDataPassword()" class="btn default">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <!--end col-md-9-->
                                </div>
                            </div>
                            <!--end tab-pane-->
                            
                        </div>
                    </div>
                    <!--END TABS-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->





            <script type="text/javascript">
                $("#btnChangePassword").click(function (argument) {
                    var currentPassword = $("#txtCurrentPassword").val();
                    var newPassword = $("#txtNewPassword").val();
                    var retypeNewPassword = $("#txtNewPasswordRetype").val();

                    if(newPassword!=retypeNewPassword){
                        alert("New Password doesn't match");
                    }

                    //alert(retypeNewPassword);
                    $.ajax({
                        type: "POST",
                        url:  "<?php echo base_url();?>admin/user/change_password",
                        data: { postCurrentPassword:currentPassword, postNewPassword:newPassword },

                         success: function (data) {
                            //alert(data);
                            if(data=="2"){
                                alert("Your old password didn't match");
                            }else if(data=="1"){
                                ClearData();
                                ShowMessage("<font color='green'>Password successfully changed</font>");
                            }else{
                                alert("Failed");
                            }
                        },

                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });
                });


                function ShowMessage(message){
                    $("#messageContainer").show();
                    $("#message").html(message);
                    setTimeout( function(){
                        $("#messageContainer").children().find("#message").html("");
                        $('#messageContainer').hide();} , 
                    6000);
                }


                function ClearData () {
                    $("#txtCurrentPassword").val("");
                    $("#txtNewPassword").val("");
                    $("#txtNewPasswordRetype").val("");
                }



            </script>