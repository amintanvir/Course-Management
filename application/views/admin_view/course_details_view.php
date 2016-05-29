<style type="text/css">
	.searchedCourseName{
		display: block !important;
	}

	.select2-result-selectable:hover{
		background-color: #e6e6e6 !important;
	}
</style>
<script type="text/javascript" src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
                    tinymce.init({
                        selector: ".editor, .editor2, .editor3",
                        theme: "modern",
                        plugins: [
                            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                            "searchreplace wordcount visualblocks visualchars code fullscreen",
                            "insertdatetime media nonbreaking save table contextmenu directionality",
                            "emoticons template paste textcolor colorpicker textpattern"
                        ],
                        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                        toolbar2: "print preview media | forecolor backcolor emoticons",
                        image_advtab: true,
                        templates: [
                            { title: 'Test template 1', content: 'Test 1' },
                            { title: 'Test template 2', content: 'Test 2' }
                        ]
                    });

</script>
<script type="text/javascript" src="<?php echo base_url();?>/jquery-ui.js"></script>



<!-- BEGIN PAGE HEADER-->
			


			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Course Details <small>Save/Update/Delete</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						
						
						<li>
							<a href="#">
								Add Course Details
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
                                    
                  





                                    
                                    
                                    
                                    
                                    
            <div class="row">
				<div class="col-md-12">
					<!-- BEGIN PORTLET-->
					
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Add Course Details
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
										<form  action="" class="form-horizontal">
											<div class="form-body">
												<input type="hidden" name="txtUpdId" id="txtUpdId" />
												<div class="row" id="messageContainer">
													<div class="form-group">
														<label class="control-label col-md-2"></label>
														<div class="col-md-8">
															<div class="col-md-12" id="message"></div>
														</div>
													</div>
												</div>


												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Course Name</label>
															<div class="col-md-8">

																<input type="text" class="form-control" name="txtCourseName" id="txtCourseName" placeholder="Enter Course Name">
																<span class="help-block" id="msgCourseName">
																	
																</span>
																<div class="select2-drop select2-display-none select2-with-searchbox select2-drop-active" style="display:none !important; width: 91.8%; top: 34px; bottom: auto; padding:0 !important;" id="select2-drop">   
																		<ul class="select2-results" id="suggesstion" style="padding:0 !important">
																			
																		</ul>
																</div>
															</div>
														</div>




													</div>

													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Course Category</label>
															<div class="col-md-8">
																<select id="txtCourseCategory" name="txtCourseCategory" class="form-control">
																	<option value="">SELECT COURSE CATEGORY</option>
																	<?php fetch_option("Id","CategoryName",$all_course_category); ?>
																</select>
																<span class="help-block" style="height:auto; z-index:200 !important" id="msgCourseCategory">
																	
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>



												
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-2">Course Details</label>
															<div class="col-md-10">
																<input type="text" class="form-control editor" name="txtCourseDetails" id="txtCourseDetails" placeholder="Enter Course Details">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>


												<!--/row-->

												<!--row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Course Duration</label>
															<div class="col-md-8">
															 <input type="text" class="form-control" name="txtCourseDuration" placeholder="Enter Your Course Duration" id="txtCourseDuration">	
															</div>
														</div>
													</div>

													<!--/row-->
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Batch No</label>
															<div class="col-md-8">
															 	<input type="text" class="form-control" name="txtBatchNo" placeholder="Enter Batch No" id="txtBatchNo">	
															 	<span class="help-block" id="msgBatchNo">
																</span>
															</div>
															
														</div>
													</div>
												 </div>
											   <!--/row-->


												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Course Price</label>
															<div class="col-md-8">
															 	<input type="text" class="form-control" name="txtCoursePrice" placeholder="Enter Your Course Price" id="txtCoursePrice">	
															 	<span class="help-block" id="msgCoursePrice">
																</span>
															</div>
															
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Course Time</label>
															<div class="col-md-8">
																<div class="input-group">
																	<input type="text" id="txtCourseTime" placeholder="Enter Course time e.g. 10:00 AM" class="form-control timepicker timepicker-no-seconds">
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
																	</span>
																</div>
															</div>
														</div>
													</div>												

												</div>
											   <!--/row-->



                                                <div class="row">
                                              

													
												    <!--row-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Start Date</label>
															<div class="col-md-8">
															 	<div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
																	<input type="text" id="txtStartDate" class="form-control" readonly>
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
															</div>
														</div>
													</div>    


													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Course Schedule</label>
															<div class="col-md-8">
															 <input type="text" class="form-control" name="txtCourseSchedule"  id="txtCourseSchedule"placeholder="Enter Your Course Duration">	
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
															<button type="button" name="btnCancel" id="btnCancel" onclick="ClearData()" class="btn default">Cancel</button>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
					<!-- END Portlet-->
				</div>
			</div>





			<div class="row">
				<div class="col-md-12">

					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box half-black" id="dataTable">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>List of Course Details
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
									<th>Course Category</th>
									<th>Course Name</th>
									<th>Batch No</th>
									<th>Course Details</th>
									<th>Course Price</th>
									<th>Course Duration</th>
									<th>Start Date</th>
									<th>Course Time</th>
									<th>Course Schedule</th>
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
										foreach ($all_course_details as $v_course_details) {
											$courseDetails = read_file($v_course_details->CourseDetails);
											echo "<tr>";
											echo "<td class='courseCategory'>$v_course_details->CategoryName</td>";
											echo "<td class='courseName'>$v_course_details->CourseName</td>";
											echo "<td class='batchNo'>$v_course_details->BatchNo</td>";
											echo "<td class='courseDetails'>$courseDetails</td>";
											echo "<td class='coursePrice'>$v_course_details->CoursePrice</td>";
											echo "<td class='courseDuration'>$v_course_details->CourseDuration</td>";
											echo "<td class='startDate'>$v_course_details->StartDate</td>";
											echo "<td class='courseTime'>$v_course_details->CourseTime</td>";
											echo "<td class='courseSchedule'>$v_course_details->CourseSchedule</td>";
											echo "<td class='operation'><i title='Edit' class='fa fa-edit edit' data-val='".$v_course_details->Id."'></i></td>";
											echo "<td class='operation'><i href='#portlet-config' data-toggle='modal' class='config fa fa-times delete' data-val='".$v_course_details->Id."'></i></td>";											
											echo "</tr>";
										}
										//print_r($all_course_details);
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
							MakePaging(12);
						</script>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->



				</div>
			</div>





<!----MODAL AREA---->
        <div class="modal fade" id="portlet-config" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Are you sure !!</h4>
                    </div>
                    <div class="modal-body">
                    	<input type="hidden" id="txtDeleteId" type="text" />
                         You are going to delete the row
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnDelete" class="btn blue" data-dismiss="modal" data-dismiss="modal">Delete</button>
                        <button type="button" id="btnClose" onclick="ClearData()" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<!--END MODAL AREA-->


<script type="text/javascript">
			
			var baseUrl = "<?php echo base_url();?>";
			


		
			$("#btnSave").click(function  (argument) {
					var courseCategoryName = $("#txtCourseCategory option:selected").text();//alert(courseCategoryId);
					

					var updId = $("#txtUpdId").val();
					var deleteId = $("#txtDeleteId").val();
					var message = updId!=""?"Successfully Updated":deleteId!=""?"Successfully Deleted":"Successfully Saved";///?deleteId!="Successfully Saved":"Successfully Deleted";
					var urls = "";
					
					if(updId != ""){
						urls = baseUrl+"admin/course_details/update";
					}else if(deleteId!=""){
						urls = baseUrl+"admin/course_details/delete";
					}else{
						urls = baseUrl+"admin/course_details/save";
					}
					
					
					var validReqCourseName = RequiredValid("#txtCourseName","#msgCourseName");
					var validReqCourseCategory = RequiredValid("#txtCourseCategory","#msgCourseCategory");
					var validExpCoursePrice = ExpressionValid("#txtCoursePrice",isFloat,"#msgCoursePrice","Numbers allowed only")
					if(validReqCourseName==0 || validReqCourseCategory == 0|| validExpCoursePrice == 0){
						alert("Please correct the errors");
						return false;
					}


					var courseName = $("#txtCourseName").val();
					var courseCategoryId = $("#txtCourseCategory option:selected").val();//alert(courseCategoryId);
					var courseDetails = $("#txtCourseDetails").val();

					tinyMCE.triggerSave();
					var courseDetails = $("#txtCourseDetails").val();
					
					var coursePrice = $("#txtCoursePrice").val();
					var courseDuration = $("#txtCourseDuration").val();
					var startDate = $("#txtStartDate").val();
					var courseTime = $("#txtCourseTime").val();
					var batchNo = $("#txtBatchNo").val();
					//alert(urls);return false;

					var courseSchedule = $("#txtCourseSchedule").val();

					$.ajax({
	                    type: "POST",
	                    url: urls,
	                    data: { postId:updId, postDeleteId: deleteId, postCourseName:courseName, 
	                    		postCourseCategoryId:courseCategoryId, postCourseDetails:courseDetails, 
	                    		postCoursePrice:coursePrice, postCourseDuration:courseDuration, postBatchNo:batchNo,
	                    	postStartDate:startDate,postCourseTime:courseTime,postCourseSchedule:courseSchedule},
	                    success: function (data) {
	                    	alert(data);
	                    	if(data=="1"){
	                    		ClearData();//return false;
	                    		ShowMessage("<font color='green'>"+message+"</font>");
	                    		$("#mainTable").load(location.href + " #mainTable",function(){
	                    			MakePaging(12);
	                    		});
	                    	}
	                    	else if(data=="2"){
	                    		$("#message").html("<font color='red'>Course <b>"+courseName+"</b> is exist on category <b>"+courseCategoryName+"</b> on Batch "+batchNo+"</font>");
	                    	}else{
	                    		alert("Failed");
	                    	}
	                    },
	                    error: function (XMLHttpRequest, textStatus, errorThrown) {
	                        alert(errorThrown);
	                    },
	                    complete: function(){
                		}
	                });
			});

			
			$(document).on("click",".edit",function (argument) {
				ClearData();
				ClearTr();
				$(this).parents("tr").addClass("edit-color");
				$(window).scrollTop(20);			
				var updId = $(this).attr("data-val");
				var courseCategory = $(this).parents("tr").children(".courseCategory").text().trim();
				var courseName = $(this).parents("tr").children(".courseName").text().trim();
				var courseDetails = $(this).parents("tr").children(".courseDetails").html();
				var courseDuration = $(this).parents("tr").children(".courseDuration").text().trim();
				var coursePrice = $(this).parents("tr").children(".coursePrice").text().trim();
				var startDate = $(this).parents("tr").children(".startDate").text().trim();
				var courseTime = $(this).parents("tr").children(".courseTime").text().trim();
				var courseSchedule = $(this).parents("tr").children(".courseSchedule").text().trim();
				var batchNo = $(this).parents("tr").children(".batchNo").text().trim();
				
				$("#txtUpdId").val(updId);
				$("#txtCourseName").val(courseName);
				$("#txtCourseCategory option").filter(function(index) { return $(this).text() === courseCategory; }).attr('selected', 'selected');
            	tinymce.get("txtCourseDetails").setContent(courseDetails);
				$("#txtCourseDuration").val(courseDuration);
				$("#txtCoursePrice").val(coursePrice);
				$("#txtStartDate").val(startDate);
				$("#txtCourseTime").val(courseTime);
				$("#txtCourseSchedule").val(courseSchedule);
				$("#txtBatchNo").val(batchNo);
				$("#btnSave").text("UPDATE");

			});


			$(document).on("keyup","#txtCourseName",function  (argument) {
				var typedCourseName=$(this).val();
				//alert(typedCourseName);
				$.ajax({
	                type: "POST",
	                url: baseUrl+"admin/course_details/search_related_course",
	                data: { postTypedCourseName: typedCourseName},
	                success: function (data) {
	                	//alert(data);
	                	if(typedCourseName!=""){
							if(data!=""){
		                		$("#select2-drop").show();
		                		$("#suggesstion").html(data);
		                		$("#msgCourseName").text("");
		                	}else{
		                		$("#suggesstion").html("");
		                		$("#select2-drop").hide();
		                		$("#msgCourseName").text("No suggesstions found");
		                	}
		                }else{
		                	$("#suggesstion").html("");
		                	$("#select2-drop").hide();

		                }
	                },
	                error: function (XMLHttpRequest, textStatus, errorThrown) {
	                    alert(textStatus);
	                },
	                complete: function(){
	        		}
	            });

			});


			$(document).on("click",".suggession-result",function  (argument) {
				$("#txtCourseName").val($(this).children().text());
				$("#suggesstion").html("");
		        $("#select2-drop").hide();
			});


			$(document).on("click",".delete",function (argument) {
				var deleteId = $(this).attr("data-val");
				$("#txtDeleteId").val(deleteId);
			});

			$("#btnDelete").click(function(){
					$("#btnSave").click();
			});

			function ClearData () {
				
				$("#txtUpdId").val("");
				$("#txtDeleteId").val("");
				$("#message").val("");
				$("#txtCourseName").val("");
				$('#txtCourseCategory option[value=""]').prop('selected', true);
				
            	tinymce.get("txtCourseDetails").setContent("");
            	
				$("#txtCourseDuration").val("");
				$("#txtCoursePrice").val("");
				$("#txtStartDate").val("");
				$("#txtCourseSchedule").val("");
				$("#txtCourseSchedule").val("");
				$("#txtBatchNo").val("");
				$("#btnSave").text("SAVE");
				$("#message").html("");

				$("#msgCourseName").html("");
				$("#msgCourseCategory").html("");
				$("#msgCoursePrice").html("");
				$("#msgCoursePrice").html("");
				$("#msgBatchNo").html("");
				// body...
			}


				function ShowMessage(message){
					$("#messageContainer").show();
					$("#message").html(message);
					setTimeout( function(){
						$("#messageContainer").children().find("#message").html("");
						$('#messageContainer').hide();} , 
					4000);
				}


				function ClearTr(){
					$(".filter-table>tbody>tr").each(function () {
						$(this).removeClass("edit-color");
					});
				}				


			</script>
		



