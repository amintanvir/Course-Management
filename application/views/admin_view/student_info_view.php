	<!-- BEGIN PAGE HEADER-->




<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Student Info <small>Save/Update/Remove</small>
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
											<i class="fa fa-reorder"></i><span id="localTitle">Add</span> Student
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
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-2"></label>
															<div class="col-md-8">
																<div class="col-md-12" id="message"></div>
															</div>
														</div>
													</div>
												</div>


												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Full Name</label>
															<div class="col-md-8">
																<input type="text" class="form-control" name="txtFullName" id="txtFullName" placeholder="Enter Your Full Name">
																<span class="help-block" id="msgFullName">
																	
																</span>
															</div>
														</div>
													</div>

													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Address</label>
															<div class="col-md-8">
																<input type="text" class="form-control" name="txtAddress" id="txtAddress" placeholder="Enter Your Address">
																<span class="help-block">
																	
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>



												
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-2">Academic Description</label>
															<div class="col-md-10">
																<textarea class="form-control" name="txtAcademicDescription" id="txtAcademicDescription" placeholder="Enter Student Academic Description"></textarea>
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
															<label class="control-label col-md-4">Student Id</label>
															<div class="col-md-8">
															 	<input type="text" class="form-control" name="txtStudentId" placeholder="Enter Student Id" id="txtStudentId">	
															 	<span class="help-block" id="msgStudentId"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Join Date</label>
															<div class="col-md-8">
															 	<div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
																	<input type="text" id="txtJoinDate" name="txtJoinDate" class="form-control" readonly>
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
															</div>
														</div>
													</div>      

													
												</div>
												<!--/row-->

												
												<!--row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Email</label>
															<div class="col-md-8">
															 	<input type="text" class="form-control" name="txtEmail" placeholder="Enter Student Email" id="txtEmail">	
															 	<span class="help-block" id="msgEmail"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Contact</label>
															<div class="col-md-8">
															 	<input type="text" class="form-control" name="txtContact" placeholder="Enter Student Contact" id="txtContact">
															 	<span class="help-block" id="msgContact"></span>	
															</div>
														</div>
													</div>

													
												</div>
												<!--/row-->



                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Other Info</label>
															<div class="col-md-8">
															 	<input type="text" class="form-control" name="txtOtherInfo" id="txtOtherInfo" placeholder="Enter Other Information">	
															 	<span class="help-block" id="msgOtherInfo"></span>
															</div>
														</div>
													</div>


													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Picture</label>
															<div class="col-md-8">
															 	<input type="file" name="flPicture" id="flPicture">
															 	<span class="help-block" style="color:#e12d2d" id="msgPicture">**Max 500 KB allowed</span>
															 	<div class="prevImage" style="width:100px; height:60px; display:block">
															 	</div>	
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
								<i class="fa fa-cogs"></i>List of Students
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
									<div id="sample_2_filter" class="dataTables_filter">
										<label><span id="clickMe">Search: </span><input class="form-control input-small input-inline" id="txtDataTableSearch" type="text"></label>
									</div>
								</div>
							</div>
							
							<div class="table-responsive" id="mainTable">
								<table class="table filter-table table-striped table-bordered table-hover">
								<thead>
								<tr>
									<th>Student Id</th>
									<th>Student Name</th>
									<th>Address</th>
									<th>Academic Description</th>
									<th>Join Date</th>
									<th>Other Info</th>
									<th>Email</th>
									<th>Contact</th>
									<th>Picture</th>
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
										foreach ($all_student as $v_student) {
											echo "<tr>";
											echo "<td class='studentId'>$v_student->StudentId</td>";
											echo "<td class='fullName'>$v_student->FullName</td>";
											echo "<td class='address'>$v_student->Address</td>";
											echo "<td class='academicDescription'>$v_student->AcademicDescription</td>";
											echo "<td class='joinDate'>$v_student->JoinDate</td>";
											echo "<td class='otherInfo'>$v_student->OtherInfo</td>";
											echo "<td class='contact'>$v_student->Contact</td>";
											echo "<td class='email'>$v_student->Email</td>";
											echo "<td class='picture'><img src='".base_url()."$v_student->Picture' width='100' height='60' /></td>";
											echo "<td class='operation'><i title='Edit' class='fa fa-edit edit' data-val='".$v_student->Id."'></i></td>";
											echo "<td class='operation'><i href='#portlet-config' data-toggle='modal' class='config fa fa-times delete' data-val='".$v_student->Id."'></i></td>";											
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
									<div class="dataTables_paginate paging_bootstrap">
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
            <div class="modal-dialog">
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
        </div>
        <!-- /.modal -->




<script type="text/javascript">
				
				var baseUrl = "<?php echo base_url();?>";
				
				$("#flPicture").change(function (event) {
					//alert("hi");
					var fileName = event.target.files[0];
					var fileSize = fileName.size;
					fileSize = Math.ceil(fileSize/1024);
					//alert(fileSize);
					var tmppath = URL.createObjectURL(event.target.files[0]);
					if(fileSize>500){
						$("#flPicture").val("");
						alert("Picture size must be less than 500 KB");
					}else{
						$(".prevImage").html("<img src='"+tmppath+"' width='100' height='60' />");
					}

					// body...
				});

				


				$("#btnSave").click(function  (argument) {
					
					var updId = $("#txtUpdId").val();
					var deleteId = $("#txtDeleteId").val();

					//return false;
					var urls = "";
					var message = "";

					if(updId != ""){
						urls = baseUrl+"admin/student_info/update";
						message = "<font color='green'>Update Successfully</font>";
					}else if(deleteId!=""){
						urls = baseUrl+"admin/student_info/delete";
						message = "<font color='green'>Successfully Deleted</font>";
					}else{
						urls = baseUrl+"admin/student_info/save";
						message = "<font color='green'>Successfully Saved</font>";
					}

					var reqFullNameValid = RequiredValid("#txtFullName","#msgFullName");
					var reqStudentIdValid = RequiredValid("#txtStudentId","#msgStudentId");
					var reqJoinDateValid = RequiredValid("#txtJoinDate","#msgStudentId");
					var expEmailValid = ExpressionValid("#txtEmail",isEmail,"#msgEmail","Invalid Email");

					if(deleteId==""){
						if(reqFullNameValid=="0"||reqStudentIdValid=="0"||reqJoinDateValid=="0"||expEmailValid=="0")	{
							return false;
						}
					}

					$("#loader").text("Saving....");
					
					var formData = new FormData($("#data")[0]);

				    $.ajax({
				        url: urls,
				        type: 'POST',
				        data: formData,
				        async: false,
				        success: function (data) {
				        	alert(data);
				            if(data=="2"){
				            	$("#message").html("<font color='red'>This email or Student Id or Contact is already registered</font>");
				            }else if(data=="1"){
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
				        cache: false,
				        contentType: false,
				        processData: false,
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
					$(window).scrollTop(80);
					$("#localTitle").text("Edit");
					$("#frmStudent").attr("action",baseUrl+"admin/student_info/update");
					var id = $(this).attr("data-val");
					var fullName = $(this).parents("tr").children(".fullName").text();
					var studentId = $(this).parents("tr").children(".studentId").text();
					var address = $(this).parents("tr").children(".address").text();
					var academicDescription = $(this).parents("tr").children(".academicDescription").text();
					var joinDate = $(this).parents("tr").children(".joinDate").text();
					var otherInfo = $(this).parents("tr").children(".otherInfo").text();
					var contact = $(this).parents("tr").children(".contact").text();
					var email = $(this).parents("tr").children(".email").text();
					var picture = $(this).parents("tr").children(".picture").html();

					//alert(picture);

					$("#txtUpdId").val(id);
					$("#txtFullName").val(fullName);
					$("#txtAddress").val(address);
					$("#txtAcademicDescription").val(academicDescription);
					$("#txtStudentId").val(studentId);
					$("#txtJoinDate").val(joinDate);
					$("#txtOtherInfo").val(otherInfo);
					$("#txtContact").val(contact);
					$("#txtEmail").val(email);
					$("#btnSave").text("UPDATE");
					$(".prevImage").html(picture);
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
					$("#localTitle").text("Add");
					$("#txtUpdId").val("");
					$("#txtDeleteId").val("");
					$("#txtFullName").val("");
					$("#txtAddress").val("");
					$("#txtAcademicDescription").val("");
					$("#txtStudentId").val("");
					$("#txtJoinDate").val("");
					$("#txtOtherInfo").val("");
					$("#btnSave").text("SAVE");
					$("#txtContact").val("");
					$("#txtEmail").val("");
					$("#flPicture").val("");
					$(".prevImage").html("");

					$("#frmStudent").attr("action",baseUrl+"admin/student_info/save");
				}



				function ShowMessage(message){
					$("#messageContainer").show();
					$("#message").html(message);
					setTimeout( function(){
						$("#messageContainer").children().find("#message").html("");
						$('#messageContainer').hide();} , 
					6000);
				}




	</script>