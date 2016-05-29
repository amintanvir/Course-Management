



<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Assign Teacher on course <small>Save/Update/Remove</small>
					</h3>

					
				</div>
			</div>
			<!-- END PAGE HEADER-->

			<div class="row">
					<div class="col-md-12">
						<!-- BEGIN PORTLET-->
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i><span id="localTitle">Assign Teacher on</span> Course
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="javascript:;" class="reload">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>
									</div>
									
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form id="data" method="post" enctype="multipart/form-data" class="form-horizontal">
											<div class="form-body">
												<input type="hidden" id="txtUpdId" name="txtUpdId" />
												<input type="hidden" id="txtDeleteId" name="txtDeleteId" />

												
												<div class="row" id="messageContainer">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4"></label>
															<div class="col-md-8">
																<div class="col-md-12" id="message"></div>
															</div>
														</div>
													</div>
												</div>



												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Teacher</label>
															<div class="col-md-8">
																<input type="text" data-val="" readonly href="#portlet-config" data-toggle="modal" class="form-control cutom-readonly" name="txtTeacherId" id="txtTeacherId" placeholder="Select a teacher">
																<span class="help-block" id="msgTeacherId">
																</span>
															</div>
														</div>
													</div>

													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Course</label>
															<div class="col-md-8">
															 	<input type="text" onclick="courseView()" data-val="" href="#portlet-config" readonly data-toggle="modal" class="form-control cutom-readonly" name="txtCourseId" placeholder="Select a course" id="txtCourseId">	
															 	<span class="help-block" id="msgCourseId">
																</span>
															</div>
														</div>
													</div>   													
													<!--/span-->
												</div>


												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Other Info/Comment</label>
															<div class="col-md-8">
																<textarea class="form-control" name="txtOtherInfo" id="txtOtherInfo" placeholder="Enter Comment/Other Info"></textarea>
																<span class="help-block" id="msgOtherInfo">
																</span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Assign Date</label>
															<div class="col-md-8">
															 	<div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
																	<input type="text" id="txtAssignDate" name="txtAssignDate" placeholder="Enter Assign Date" class="form-control cutom-readonly" readonly>
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
																<span class="help-block" id="msgAssignDate"></span>
															</div>
														</div>
													</div>

												</div>


											</div>



											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-3 col-md-9">
															<button type="button" name="btnSave" id="btnSave" class="btn green">SAVE</button>
															<button type="button" name="btnCancel" onclick="ClearData()" id="btnCancel" class="btn default">Cancel</button>
															<span id="loader"></span>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
						</div>
				</div>





			<div class="row">
				<div class="col-md-12">

					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box half-black" id="dataTable">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>List of Course Registration Details
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							
							<div class="row">
								<div class="col-md-6 col-sm-12">
								</div>
								<div class="col-md-6 col-sm-12">
									<div id="sample_2_filter" class="dataTables_filter pull-right">
										<label><span id="clickMe">Search: </span><input class="form-control input-small input-inline" id="txtDataTableSearch" type="text"></label>
									</div>
								</div>
							</div>
							
							<div class="table-responsive" id="mainTable">
								<table class="table filter-table table-striped table-bordered table-hover">
								<thead>
								<tr>
									<th>Course Name</th>
									<th>Teacher Name</th>
									<th>Other Info</th>
									<th>Assign Date</th>
									<th class="operation">
										 Edit
									</th>
									<th class="operation">
										 Delete
									</th>
								</tr>
								</thead>
								<tbody id="ajaxData">
									<?php
									if(isset($all_assign_info)){ 
										foreach ($all_assign_info as $v_assign_info) {
											echo "<tr>";
												echo "<td class='courseName'>$v_assign_info->CourseName</td>";
												echo "<td class='fullName'>$v_assign_info->FullName</td>";
												echo "<td class='otherInfo'>$v_assign_info->OtherInfo</td>";
												echo "<td class='assignDate'>$v_assign_info->AssignDate</td>";
												echo "<td class='operation'><i title='Edit' class='fa fa-edit edit' data-course-id='".$v_assign_info->CourseDetailsId."' data-teacher-id='".$v_assign_info->TeacherId."' data-val='".$v_assign_info->Id."'></i></td>";
												echo "<td class='operation'><i onclick='deleteView()' href='#portlet-config' data-toggle='modal' data-course-id='".$v_assign_info->CourseDetailsId."' data-teacher-id='".$v_assign_info->TeacherId."' class='config fa fa-times delete' data-val='".$v_assign_info->Id."'></i></td>";											
											echo "</tr>";
										}
									}
									?>
								</tbody>
								</table>
								<!-- <div class="paging"></div> -->
							</div>

							<div class="row" id="pageContainer">
								<div class="col-md-7 pull-right">
									<div class="dataTables_paginate paging_bootstrap pull-right">
										<ul class="pagination paging" style="visibility: visible;">
											
										</ul>
									</div>
								</div>
							</div>

						</div>
						<script type="text/javascript" src="<?php echo base_url();?>assets/jquery"></script>
						<?php include_once("assets/custom/js/custom-datatable.js");?>
						<script type="text/javascript">
							MakePaging(6);
						</script>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->


					<div id="response"></div>
				</div>
			</div>



                                    

		<!----MODAL AREA---->
        <div class="modal fade" id="portlet-config" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" id="deleteContainer">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="ClearData()" aria-hidden="true"></button>
                        <h4 class="modal-title">Are you sure !!</h4>
                    </div>
                    <div class="modal-body">
                    	
                         You are going to delete
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnDelete" class="btn blue" data-dismiss="modal" data-dismiss="modal">Delete</button>
                        <button type="button" id="btnClose" onclick="ClearData()" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->


            <div class="modal-dialog" id="courseContainer">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Select a course</h4>
                    </div>
                    <div class="modal-body"  style="max-height:360px !important; overflow:scroll">
                    	<div class="row">
								<div class="col-md-6 col-sm-12">
								</div>
								<div class="col-md-6 col-sm-12">
									<div id="sample_2_filter" class="dataTables_filter pull-right">
										<label><span id="clickMe">Search: </span><input class="form-control input-small input-inline" id="txtDataTableSearch" type="text"></label>
									</div>
								</div>
						</div>
							
						<div class="table-responsive" id="mainTableCourse">
	                    	<table class='table table-bordered'>
	                    		<tr>
	                    			<th>#</th>
	                    			<th>Name</th>
	                    			<th>Price</th>

	                    		</tr>
	                    	<?php 
	                    		foreach ($all_courses as $v_course) {
	                    			echo "<tr>";
	                    				echo "<td><span data-val='".$v_course->Id."' data-dismiss='modal' class='btn courseId btn-success btn-xs'>Select</span></td>";
	                    				echo "<td class='courseName'>".$v_course->CourseName."</td>";
			                    		echo "<td class='coursePrice'>".$v_course->CoursePrice."</td>";		
	                    			echo "</tr>";
	                    		}
	                    	?>
	                    	</table>
	                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnClose" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->


            <div class="modal-dialog" id="teacherContainer">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Select a teacher</h4>
                    </div>
                    <div class="modal-body"  style="max-height:360px !important; overflow:scroll">
                    	<div class="row">
								<div class="col-md-6 col-sm-12">
								</div>
								<div class="col-md-6 col-sm-12">
									<div id="sample_2_filter" class="dataTables_filter pull-right">
										<label><span id="clickMe">Search: </span><input class="form-control input-small input-inline" id="txtDataTableSearch" type="text"></label>
									</div>
								</div>
						</div>
							
						<div class="table-responsive" id="mainTableStudent">
	                    	<table class='table table-bordered'>
	                    		<tr>
	                    			<th>#</th>
	                    			<th>FullName</th>
	                    			<th>Student Id</th>
	                    			<th>Email</th>
	                    			<th>Contact</th>
	                    		</tr>
	                    	<?php 
	                    		foreach ($all_teachers as $v_teacher) {
	                    			echo "<tr>";
	                    				echo "<td><span data-val='".$v_teacher->Id."' data-dismiss='modal' class='btn teacherId btn-success btn-xs'>Select</span></td>";
	                    				echo "<td class='teacherName'>".$v_teacher->FullName."</td>";
	                    				echo "<td class='teacherDesignation'>".$v_teacher->Designation."</td>";
	                    				echo "<td class='email'>".$v_teacher->Email."</td>";
	                    				echo "<td class='contactNumber'>".$v_teacher->ContactNumber."</td>";
	                    			echo "</tr>";
	                    		}
	                    	?>
	                    	</table>
	                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnClose" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->

        </div>
        <!-- /.modal -->



        <script type="text/javascript">
        	var baseUrl = "<?php echo base_url();?>";

				function courseView () {
					$("#courseContainer").show();
					$("#deleteContainer").hide();
					$("#teacherContainer").hide();
					
				}

				function teacherView () {
					$("#courseContainer").hide();
					$("#deleteContainer").hide();
					$("#teacherContainer").show();
					
				}

				function deleteView () {
					$("#courseContainer").hide();
					$("#deleteContainer").show();
					$("#teacherContainer").hide();
				}

				$(document).on("click","#txtTeacherId",function (argument) {
					teacherView();
				});

				$(document).on("click",".edit",function (argument) {
					ClearData();
					$(window).scrollTop(80);
					
					$("#btnSave").text("UPDATE");

					var id = $(this).attr("data-val");
					var courseId = $(this).attr("data-course-id");
					var teacherId = $(this).attr("data-teacher-id");
					var courseName = $(this).parents("tr").children(".courseName").text();
					var teacherName = $(this).parents("tr").children(".fullName").text();
					var assignDate = $(this).parents("tr").children(".assignDate").text();
					var otherInfo = $(this).parents("tr").children(".otherInfo").text();
					$("#txtUpdId").val(id);
					$("#txtCourseId").val(courseName);
					$("#txtCourseId").attr("data-val",courseId);
					$("#txtTeacherId").val(teacherName);
					$("#txtTeacherId").attr("data-val",teacherId);
					$("#txtOtherInfo").val(otherInfo);
					$("#txtAssignDate").val(assignDate);
				});

				
				$(document).on("click","#txtCourseId",function (argument) {
					courseView();
				});


				$(document).on("click",".teacherId",function  (argument) {
					var id = $(this).attr("data-val");
					var teacherName = $(this).parents("tr").children(".teacherName").text();
					$("#txtTeacherId").val(teacherName);
					$("#txtTeacherId").attr("data-val",id);
				});

				$(document).on("click",".courseId",function  (argument) {
					var id = $(this).attr("data-val");
					var courseText = $(this).parents("tr").children(".courseName").text()+", Price: "+$(this).parents("tr").children(".coursePrice").text();
					$("#txtCourseId").val(courseText);
					$("#txtCourseId").attr("data-val",id);
				});

				$(document).on("click","#btnSave",function  (argument) {
					var updId = $("#txtUpdId").val();
					var deleteId = $("#txtDeleteId").val();
					var teacherId = $("#txtTeacherId").attr("data-val");
					var courseId = $("#txtCourseId").attr("data-val");
					var assignDate = $("#txtAssignDate").val();
					var otherInfo = $("#txtOtherInfo").val();
					var message = "";
					var urls = "";
					
					var reqTeacherValid = RequiredValid("#txtTeacherId","#msgTeacherId");
					var reqCourseValid = RequiredValid("#txtCourseId","#msgCourseId");
					var reqAssignDateValid = RequiredValid("#txtAssignDate","#msgAssignDate");

					if(reqTeacherValid=="0"||reqCourseValid=="0"||reqAssignDateValid=="0"){
						alert("Please correct the errors");
						return false;
					}

					if(updId!=""){
						urls = baseUrl+"admin/assign_teacher_to_course/update";
						message = "<font color='green'>Successfully Updated</font>";
					}else if(deleteId!=""){
						urls = baseUrl+"admin/assign_teacher_to_course/delete";
						message = "<font color='green'>Successfully Deleted</font>";
					}else{
						urls = baseUrl+"admin/assign_teacher_to_course/save";
						message = "<font color='green'>Successfully Saved</font>";
					}




					$("#loader").text("Saving....");
				    $.ajax({
				        url: urls,
				        type: 'POST',
				        data: {postUpdId:updId, postDeleteId:deleteId, postTeacherId:teacherId, postCourseId:courseId, 
				        		postOtherInfo:otherInfo, postAssignDate:assignDate},
				         success: function (data) {
				        	//alert(data);
				            if(data=="1"){
				            	$("#loader").text("Completed");
				            	ShowMessage(message);
				            	ClearData();
				            	$("#mainTable").load(location.href + " #mainTable",function(){
	                    			MakePaging(6);
	                    		});
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
					$("#txtUpdId").val("");
					$("#txtDeleteId").val("");
					$("#txtTeacherId").val("");
					$("#txtTeacherId").attr("data-val","");
					$("#txtCourseId").val("");
					$("#txtCourseId").attr("data-val","");
					$("#txtCourseId").val("");
					$("#txtAssignDate").val("");
					$("#btnSave").text("SAVE");
				}

        </script>