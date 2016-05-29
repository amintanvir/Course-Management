	<!-- BEGIN PAGE HEADER-->




<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Teacher Info <small>Save/Update/Remove</small>
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
											<i class="fa fa-reorder"></i><span id="localTitle">Add</span> Teacher
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
																<span class="help-block" id="msgAddress">
																	
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>


												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Contact Number</label>
															<div class="col-md-8">
																<input type="text" class="form-control" name="txtContactNumber" id="txtContactNumber" placeholder="Enter Your Phone Number">
																<span class="help-block" id="msgContactNumber">
																	
																</span>
															</div>
														</div>
													</div>

													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Email</label>
															<div class="col-md-8">
																<input type="text" class="form-control" name="txtEmail" id="txtEmail" placeholder="Enter Teachers Email Address">
																<span class="help-block" id="msgEmail">
																	
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>



												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Interested Area</label>
															<div class="col-md-8">
																<textarea class="form-control" name="txtInterestedArea" id="txtInterestedArea" placeholder="Enter Teachers Interested Area"></textarea>
																<span class="help-block" id="msgInterestArea"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Designation</label>
															<div class="col-md-8">
																<input type="text" class="form-control" name="txtDesignation" id="txtDesignation" placeholder="Enter Teacher Designation"></textarea>
																<span class="help-block" id="msgDesignation"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->

                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Academic Description</label>
															<div class="col-md-8">
																<textarea class="form-control" name="txtAcademicDescription" id="txtAcademicDescription" placeholder="Enter Teachers Academic Description"></textarea>
																<span class="help-block" id="msgAcademicDescription"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Message</label>
															<div class="col-md-8">
																<textarea  class="form-control" name="txtMessage" id="txtMessage" placeholder="Enter Teachers Messages "></textarea>
																<span class="help-block" id="msgMessage"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												




												<!--row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Join Date</label>
															<div class="col-md-8">
                                                                <div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd"  data-date-viewmode="years">
																	<input type="text" id="txtJoinDate" name="txtJoinDate" class="form-control" readonly>
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
																<span class="help-block" id="msgJoinDate"></span>
															</div>
														</div>
													</div>
                                                    
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label col-md-4">Picture</label>
																<div class="col-md-8">
																 	<input type="file" name="flPicture" id="flPicture">
																 	<span class="help-block" style="color:#ea5347">Max file size 500KB</span>	
																 	<div class="prevImage" style="width:100px; height:60px; display:block">
																 	</div>
																</div>
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label col-md-4">Salary</label>
																<div class="col-md-8">
																 	<input type="text" class="form-control" name="txtSalary" id="txtSalary" placeholder="Enter Teacher Salary"/>
																 	<span class="help-block" id="msgSalary"></span>
																</div>
															</div>
														</div>


														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label col-md-4">Gender</label>
																<div class="col-md-8">
																 	<select name="ddlGender" class="form-control" id="ddlGender">
																 		<option value="">Select Gender</option>
																 		<option value="m">Male</option>
																 		<option value="f">Female</option>
																 	</select>
																 	<span class="help-block" id="msgGender"></span>
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

            <!------Start Table---->
          
          <div class="row">
				<div class="col-md-12">

					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box half-black" id="dataTable">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>List of Teachers
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
							
							<div class="table-responsive" style="overflow:scroll">
								<table class="table filter-table table-striped table-bordered table-hover"  id="mainTable">
								<thead>
								<tr>
									<th>Full Name</th>
									<th>Contact No</th>
									<th>Email</th>
									<th>Address</th>
									<th>Gender</th>
									<th>Join Date</th>
									<th>Designation</th>
									<th>Academic Description</th>
									<th>Message</th>
									<th>Salary</th>
									<th>Interested Area</th>
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
										foreach ($all_teacher as $v_teacher) {
											$picture = $v_teacher->Picture!=""?$v_teacher->Picture:"";
											echo "<tr>";
											echo "<td class='fullName'>$v_teacher->FullName</td>";
											echo "<td class='contactNumber'>$v_teacher->ContactNumber</td>";
											echo "<td class='email'>$v_teacher->Email</td>";
											echo "<td class='address'>$v_teacher->Address</td>";
											echo "<td class='gender'>";
												echo $v_teacher->Gender=="m"?"Male":"Female";
											echo "</td>";
											echo "<td class='joinDate'>$v_teacher->JoinDate</td>";
											echo "<td class='designation'>$v_teacher->Designation</td>";
                                            echo "<td class='academicDescription'>$v_teacher->AcademicDescription</td>";
											echo "<td class='message'>$v_teacher->Message</td>";
											echo "<td class='salary'>$v_teacher->Salary</td>";
											echo "<td class='interestedArea'>$v_teacher->InterestedArea</td>";
											echo "<td class='picture'><img src='".base_url()."$picture' width='100' height='60' /></td>";
											echo "<td class='operation'><i title='Edit' class='fa fa-edit edit' data-val='".$v_teacher->Id."'></i></td>";
											echo "<td class='operation'><i href='#portlet-config' data-toggle='modal' class='config fa fa-times delete' data-val='".$v_teacher->Id."'></i></td>";											
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


            <!------Start Table---->

			



<script type="text/javascript">
				
				var baseUrl = "<?php echo base_url();?>";
				
				$("#flPicture").change(function (event) {
					//alert("hi");
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

					
					var urls = "";
					var message = "";

					if(updId != ""){
						urls = baseUrl+"admin/courseteacher_info/update";
						message = "<font color='green'>Update Successfully</font>";
					}else if(deleteId!=""){
						urls = baseUrl+"admin/courseteacher_info/delete";
						message = "<font color='green'>Successfully Deleted</font>";
					}else{
						urls = baseUrl+"admin/courseteacher_info/save";
						message = "<font color='green'>Successfully Saved</font>";
					}

					var gender = $("#ddlGender option:selected");
					//alert(gender);return false;


					if(deleteId==""){
						var reqFullNameValidate = RequiredValid("#txtFullName","#msgFullName");
						var reqContactNumberValidate = RequiredValid("#txtContactNumber","#msgContactNumber");
						var expEmailValidate = ExpressionValid("#txtEmail",isEmail,"#msgEmail","Invalid Email");
						var reqDesignationValidate = RequiredValid("#txtDesignation","#msgDesignation");
						var reqJoinDateValidate = RequiredValid("#txtJoinDate","#msgJoinDate");
						var expSalaryValid = ExpressionValid("#txtSalary",isFloat,"#msgSalary","Only numbers allowed");
						var reqGenderValid = RequiredValid(gender,"#msgGender");
						if(reqFullNameValidate==0||reqContactNumberValidate==0||expEmailValidate==0||reqDesignationValidate==0||reqJoinDateValidate==0||expSalaryValid==0||reqGenderValid==0){
							return false;
						}
					}

					$("#loader").text("Saving....");

					/*alert(urls);
					return false;*/
					
					var formData = new FormData($("#data")[0]);

				    $.ajax({
				        url: urls,
				        type: 'POST',
				        data: formData,
				        async: false,
				        success: function (data) {
				        	if(data=="1"){
				            	ShowMessage(message);
				            	ClearData();
				            	$("#loader").text("");
	                    		$("#mainTable").load(location.href + " #mainTable",function(){
	                    			MakePaging(12);
	                    		});
				            }else if(data=="2"){
				            	$("#message").html("<font color='red'>The email already exist</font>");
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
				});

				$("#btnDelete").click(function (argument) {
					$("#btnSave").click();
				})


				$(document).on("click",".edit",function(){
					ClearData();
					$(window).scrollTop(80);
					$("#localTitle").text("Edit");
					$(this).parents("tr").addClass("edit-color");
					$("#frmTeacher").attr("action",baseUrl+"admin/courseteacher_info/update");
					var id = $(this).attr("data-val");
					var fullName = $(this).parents("tr").children(".fullName").text();
					var contactNumber = $(this).parents("tr").children(".contactNumber").text();
					var email = $(this).parents("tr").children(".email").text();
					var address = $(this).parents("tr").children(".address").text();
					var designation = $(this).parents("tr").children(".designation").text();
					var academicDescription = $(this).parents("tr").children(".academicDescription").text();
					var message = $(this).parents("tr").children(".message").text();
					var interestedArea = $(this).parents("tr").children(".interestedArea").text();
					var joinDate = $(this).parents("tr").children(".joinDate").text();
					var picture = $(this).parents("tr").children(".picture").html();
					var salary = $(this).parents("tr").children(".salary").text();
					var gender = $(this).parents("tr").children(".gender").text();
					//alert(picture);

					$("#txtUpdId").val(id);
					$("#txtFullName").val(fullName);
					$("#txtContactNumber").val(contactNumber);
					$("#txtEmail").val(email);
					$("#txtAddress").val(address);
					$("#txtInterestedArea").val(interestedArea);
					$("#txtDesignation").val(designation);
					$("#txtAcademicDescription").val(academicDescription);
					$("#txtJoinDate").val(joinDate);
					$("#txtMessage").val(message);
					$("#txtSalary").val(salary);
					$("#ddlGender option").filter(function(index) { return $(this).text() === gender; }).attr('selected', 'selected');
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
					ClearTr();
					$("#txtUpdId").val("");
					$("#txtDeleteId").val("");
					$("#txtFullName").val("");
					$("#txtContactNumber").val("");
					$("#txtEmail").val("");
					$("#txtAddress").val("");
					$("#txtInterestedArea").val("");
					$("#txtDesignation").val("");
					$("#txtAcademicDescription").val("");
					$("#txtJoinDate").val("");
					$("#txtMessage").val("");
					$("#btnSave").text("SAVE");
					$("#flPicture").val("");
					$(".prevImage").html("");
					$("#localTitle").text("Add");
					$("#txtSalary").val("");

					$("#msgFullName").html("");
					$("#msgAddress").html("");
					$("#msgContactNumber").html("");
					$("#msgEmail").html("");
					$("#msgInterestArea").html("");
					$("#msgDesignation").html("");
					$("#msgAcademicDescription").html("");
					$("#msgMessage").html("");
					$("#msgJoinDate").html("");
					$("#msgSalary").html("");
					$("#msgGender").html("");

				}



				function ShowMessage(message){
					$("#messageContainer").show();
					$("#message").html(message);
					setTimeout( function(){
						$("#messageContainer").children().find("#message").html("");
						$('#messageContainer').hide();} , 
					6000);
				}

				function ClearTr () {
					$(".filter-table>tbody>tr").each(function (argument) {
						$(this).removeClass("edit-color");
						// body...
					})
				}




	</script>