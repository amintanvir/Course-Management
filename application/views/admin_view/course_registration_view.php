	<!-- BEGIN PAGE HEADER-->




<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Course Registration <small>Save/Update/Remove</small>
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
											<i class="fa fa-reorder"></i><span id="localTitle">Add</span> Course Registration
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
												<input type="hidden" id="txtUpdId" name="txtUpdId">
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
															<label class="control-label col-md-4">Student</label>
															<div class="col-md-8">
																<input type="text" data-val="" readonly href="#portlet-config" data-toggle="modal" class="form-control cutom-readonly" name="txtStudentId" id="txtStudentId" placeholder="Select a student">
																<span class="help-block" id="msgStudentId">
																</span>
															</div>
														</div>
													</div>

													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Course</label>
															<div class="col-md-8">
															 	<input type="text" data-val="" href="#portlet-config" readonly data-toggle="modal" class="form-control cutom-readonly" name="txtCourseId" placeholder="Select a course" id="txtCourseId">	
															 	<span class="help-block" id="msgCourseId">
																</span>
															</div>
														</div>
													</div>   													
													<!--/span-->
												</div>



												
												<!--row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Paid Amount</label>
															<div class="col-md-8">
															 	<input type="text" class="form-control" name="txtPaidAmount" placeholder="Enter Paid Amount" id="txtPaidAmount">	
															 	<span class="help-block" id="msgPaidAmount"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Payment Date</label>
															<div class="col-md-8">
															 	<div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
																	<input type="text" id="txtPaymentDate" name="txtPaymentDate" placeholder="Enter Payment Date" class="form-control" readonly>
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
																<span class="help-block" id="msgPaymentDate"></span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->





                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Due Payment Date</label>
															<div class="col-md-8">
															 	<div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
																	<input type="text" id="txtDuePaymentDate" name="txtDuePaymentDate" placeholder="Enter Due Payment Date" class="form-control" readonly>
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
																<span class="help-block" id="msgDuePaymentDate"></span>
															</div>
														</div>
													</div>


													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Registration Date</label>
															<div class="col-md-8">
															 	<div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
																	<input type="text" id="txtRegistrationDate" name="txtRegistrationDate" placeholder="Enter Registration Date" class="form-control" readonly>
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
																<span class="help-block" id="msgRegistrationDate"></span>
															</div>
														</div>
													</div>
                                              	</div>


                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Discount</label>
															<div class="col-md-8">
															 	<div style="width:100% !important" class="input-group input-large">
																	<input type="text" id="txtDiscount" name="txtDiscount" placeholder="Enter Discount Percent" class="form-control">
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><b>%</b></button>
																	</span>
																</div>
															 	<span class="help-block" id="msgDiscount"></span>
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
									<th>Student Name</th>
									<th>Course Price</th>
									<th>Registration Date</th>
									<th>Discount (%)</th>
									<th>Payment Date</th>
									<th>Due Payment Date</th>
									<th>Paid Amount</th>
									<th>Due Amount</th>
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
									if(isset($all_course_registration)){ 
										foreach ($all_course_registration as $v_course_registration) {
											echo "<tr>";
												echo "<td class='courseName'>$v_course_registration->CourseName</td>";
												echo "<td class='fullName'>$v_course_registration->FullName</td>";
												echo "<td class='coursePrice'>$v_course_registration->CoursePrice</td>";
												echo "<td class='registrationDate'>$v_course_registration->RegistrationDate</td>";
												echo "<td class='discount'>$v_course_registration->Discount</td>";
												echo "<td class='paymentDate'>$v_course_registration->PaymentDate</td>";
												echo "<td class='duePaymentDate'>$v_course_registration->DuePaymentDate</td>";
												echo "<td class='paidAmount'>$v_course_registration->PaidAmount</td>";
												echo "<td class='paybleAmount'>$v_course_registration->PaybleAmount</td>";
												echo "<td class='operation'><i title='Edit' class='fa fa-edit edit' data-course-id='".$v_course_registration->CourseId."' data-student-id='".$v_course_registration->StudentId."' data-val='".$v_course_registration->Id."'></i></td>";
												echo "<td class='operation'><i onclick='deleteView()' href='#portlet-config' data-toggle='modal' data-course-id='".$v_course_registration->CourseId."' data-student-id='".$v_course_registration->StudentId."' class='config fa fa-times delete' data-val='".$v_course_registration->Id."'></i></td>";											
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
							MakePaging(12);
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
                        <button type="button" class="close" data-dismiss="modal" onclick="ClearData()" aria-hidden="true"></button>
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
                        <button type="button" id="btnDelete" class="btn blue" data-dismiss="modal" data-dismiss="modal">Delete</button>
                        <button type="button" id="btnClose" onclick="ClearData()" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->


            <div class="modal-dialog" id="studentContainer">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="ClearData()" aria-hidden="true"></button>
                        <h4 class="modal-title">Select a student</h4>
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
	                    		foreach ($all_students as $v_student) {
	                    			echo "<tr>";
	                    				echo "<td><span data-val='".$v_student->Id."' data-dismiss='modal' class='btn studentId btn-success btn-xs'>Select</span></td>";
	                    				echo "<td class='studentName'>".$v_student->FullName."</td>";
	                    				echo "<td class='studentUsername'>".$v_student->StudentId."</td>";
	                    				echo "<td class='email'>".$v_student->Email."</td>";
	                    				echo "<td class='contact'>".$v_student->Contact."</td>";
	                    			echo "</tr>";
	                    		}
	                    	?>
	                    	</table>
	                    </div>
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




		<script type="text/javascript">
		
				var baseUrl = "<?php echo base_url();?>";

				$("#btnSave").click(function  (argument) {
					//alert("Hi");
					
					var updId = $("#txtUpdId").val();
					var deleteId = $("#txtDeleteId").val();


					var studentId = $("#txtStudentId").attr("data-val");
					var courseId = $("#txtCourseId").attr("data-val");
					var paidAmount = $("#txtPaidAmount").val();
					var registrationDate = $("#txtRegistrationDate").val();
					var paymentDate = $("#txtPaymentDate").val();
					var duePaymentDate = $("#txtDuePaymentDate").val();
					var discount = $("#txtDiscount").val();
					//alert(studentId);
					//return false;
					if(deleteId == ""){
						var reqStudentIdValidate = RequiredValid("#txtStudentId","#msgStudentId");
						var reqCourseIdValidate = RequiredValid("#txtCourseId","#msgCourseId");
						var expPaidAmountValidate = ExpressionValid("#txtPaidAmount",isFloat,"#msgPaidAmount","Numbers allowed only");
						var reqRegistrationDateValidate = RequiredValid("#txtRegistrationDate","#msgRegistrationDate");
						var reqPaymentDateValidate = RequiredValid("#txtPaymentDate","#msgPaymentDate");
						var expDiscountValidate=1;
						if(discount!=""){
							expDiscountValidate = ExpressionValid("#txtDiscount",isFloat,"#msgDiscount","Numbers allowed only");	
						}
						if(reqCourseIdValidate==0||reqCourseIdValidate==0||expPaidAmountValidate==0||reqRegistrationDateValidate==0||reqPaymentDateValidate==0||expDiscountValidate==0){
							return false;
						}
					}
					 
					var urls = "";
					var message = "";

					if(updId != ""){
						urls = baseUrl+"admin/course_registration/update";
						message = "<font color='green'>Update Successfully</font>";
					}else if(deleteId!=""){
						urls = baseUrl+"admin/course_registration/delete";
						message = "<font color='green'>Successfully Deleted</font>";
					}else{
						urls = baseUrl+"admin/course_registration/save";
						message = "<font color='green'>Successfully Saved</font>";
					}


					//alert(discount);
					//return false;
					//alert(urls);
					
					$("#loader").text("Saving....");
					
				    $.ajax({
				        url: urls,
				        type: 'POST',
				        data: {postUpdId:updId, postDeleteId:deleteId, postStudentId:studentId, postCourseId:courseId, postPaidAmount:paidAmount, postPaymentDate:paymentDate,
				        	   postRegistrationDate:registrationDate, postDuePaymentDate:duePaymentDate, postDiscount:discount},
				        success: function (data) {
				        	//alert(data);
				            if(data=="1"){
				            	ShowMessage(message);
				            	ClearData();
				            	$("#loader").text("Ok");
	                    		$("#mainTable").load(location.href + " #mainTable",function(){
	                    			MakePaging(12);
	                    		});
				            }else{
				            	alert("Failed");
				            }
				        },
				        error: function (XMLHttpRequest, textStatus, errorThrown) {
	                        alert(errorThrown);
	                    }
				    });

				    return false;
				//alert("Hi");
				});

				$("#btnDelete").click(function (argument) {
					$("#btnSave").click();
				})


				$(document).on("click",".edit",function(){
					ClearData();
					ClearTr();
					$(this).parents("tr").addClass("edit-color");
					$(window).scrollTop(80);
					$("#localTitle").text("Edit");
					$("#btnSave").text("UPDATE");
					var id = $(this).attr("data-val");
					var studentId = $(this).attr("data-student-id");
					var courseId = $(this).attr("data-course-id");
					var studentNameText = $(this).parents("tr").children(".fullName").text();
					var courseNameText = $(this).parents("tr").children(".courseName").text()+", Price:"+$(this).parents("tr").children(".coursePrice").text();
					var paidAmount = $(this).parents("tr").children(".paidAmount").text();
					var registrationDate = $(this).parents("tr").children(".registrationDate").text();
					var paymentDate = $(this).parents("tr").children(".paymentDate").text();
					var duePaymentDate = $(this).parents("tr").children(".duePaymentDate").text();
					var discount = $(this).parents("tr").children(".discount").text();



					$("#txtUpdId").val(id);
					$("#txtStudentId").val(studentNameText);
					$("#txtStudentId").attr("data-val",studentId);

					$("#txtCourseId").val(courseNameText);
					$("#txtCourseId").attr("data-val",courseId);

					$("#txtPaidAmount").val(paidAmount);
					$("#txtPaymentDate").val(paymentDate);
					$("#txtRegistrationDate").val(registrationDate);
					$("#txtDuePaymentDate").val(duePaymentDate);
					$("#txtDiscount").val(discount);

				});

				$(document).on("click",".delete",function(){
					ClearData();
					var id = $(this).attr("data-val");
					$("#txtDeleteId").val(id);
				});


				$(".modal").click(function (e) {
					if(e.target == this){
						ClearData();	
					}
				});


				function ClearData () {
					ClearTr();
					$("#localTitle").text("Add");
					$("#txtUpdId").val("");
					$("#txtDeleteId").val("");
					$("#txtRegistrationDate").val("");
					$("#txtStudentId").val("");
					$("#txtStudentId").attr("data-val","");
					$("#txtCourseId").val("");
					$("#txtCourseId").attr("data-val","");
					$("#txtPaidAmount").val("");
					$("#txtPaymentDate").val("");
					$("#txtDuePaymentDate").val("");
					$("#txtDiscount").val("");


					$("#msgStudentId").html("");
					$("#msgCourseId").html("");
					$("#msgRegistrationDate").html("");
					$("#msgPaymentDate").html("");
					$("#msgDuePaymentDate").html("");
					$("#msgPaidAmount").html("");

					$("#btnSave").text("SAVE");
				}

				function ClearTr(){
					$(".filter-table>tbody>tr").each(function (argument) {
						$(this).removeClass("edit-color");
					});
				}

				$("#txtStudentId").click(function (argument) {
					studentView();
				});

				$("#txtCourseId").click(function (argument) {
					courseView();
				});

				$("#txtCourseId").keyup(function (argument) {
					$(this).val("");
				});

				$(".courseId").click(function(){
					var courseId = $(this).attr("data-val");
					var courseName = $(this).parents("tr").children(".courseName").text();
					var coursePrice = $(this).parents("tr").children(".coursePrice").text();
					$("#txtCourseId").attr("data-val",courseId);
					$("#txtCourseId").val(courseName+", Price:"+coursePrice);
				});

				$(".studentId").click(function (argument) {
					var studentId = $(this).attr("data-val");
					var studentName = $(this).parents("tr").children(".studentName").text();
					$("#txtStudentId").attr("data-val",studentId);
					$("#txtStudentId").val(studentName);					
				});

				function ShowMessage(message){
					$("#messageContainer").show();
					$("#message").html(message);
					setTimeout( function(){
						$("#messageContainer").children().find("#message").html("");
						$('#messageContainer').hide();} , 
					6000);
				}


				function courseView () {
					$("#courseContainer").show();
					$("#deleteContainer").hide();
					$("#studentContainer").hide();
				}


				function studentView () {
					$("#courseContainer").hide();
					$("#deleteContainer").hide();
					$("#studentContainer").show();
				}

				function deleteView () {
					$("#courseContainer").hide();
					$("#deleteContainer").show();
					$("#studentContainer").hide();
				}

	</script>