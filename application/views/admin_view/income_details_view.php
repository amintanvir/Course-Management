




<!-- BEGIN PAGE HEADER-->
			


			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Pickers <small>Income Details</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						
						
						<li>
							<a href="#">
								Add Income Details:- &nbsp; Save/Update/Delete
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
										<i class="fa fa-reorder"></i>Add Income Details 
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
									<form  action="" method="post" class="form-horizontal">
										<div class="form-body">
											<input type="hidden" name="txtUpdId" id="txtUpdId" />
											<div class="row" id="messageContainer">
												<div class="form-group">
													<label class="control-label col-md-3"></label>
													<div class="col-md-3">
														<div class="col-md-7" id="message"></div>
													</div>
												</div>
											</div>


											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-4">Income Tittle</label>
														<div class="col-md-8">

															<input type="text" class="form-control" name="txtIncomeTitle" id="txtIncomeTitle" placeholder="Enter Income Title">
															<span class="help-block" id="msgIncomeTitle">
															</span>
														</div>
													</div>
												</div>

												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-4">Income Money</label>
														<div class="col-md-8">
															<input type="text" class="form-control editor" name="txtIncomeMoney" id="txtIncomeMoney" placeholder="Enter Income Money">
															<span class="help-block" id="msgIncomeMoney">
															</span>
														</div>
													</div>
												</div>
												<!--/span-->
											</div>



											
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label col-md-2">Income Description</label>
														<div class="col-md-10">
															<textarea class="form-control" name="txtIncomeDescription" id="txtIncomeDescription" placeholder="Enter Income Description"></textarea>
															<span class="help-block" id="msgIncomeDescription"></span>
														</div>
													</div>
												</div>
											</div>


											<!--/row-->

											<!--row-->

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-4">IncomeCategory</label>															<div class="col-md-8">
													 	<select id="txtIncomeCategoryName" name="txtIncomeCategoryName" class="form-control">
															<option value="">Select Income Category</option>
															<?php fetch_option("Id","IncomeCategoryName",$all_income_category); ?>
														</select>
														<span class="help-block" id="msgIncomeCategory"></span>
														</div>
													</div>
												</div>

												<!--/row-->

                                               <div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-4">Income Date</label>
														<div class="col-md-8">
														 	<div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
																<input type="text" id="txtIncomeDate" name="txtIncomeDate" class="form-control" readonly>
																<span class="input-group-btn">
																	<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
															</div>
															<span class="help-block" id="msgIncomeDate"></span>
														</div>
													</div>
										   		</div>
										   <!--/row-->
											
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
								<i class="fa fa-cogs"></i>List of Income  Details Table
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
									<th>Income Title</th>
									<th>Income Description</th>
									<th>Income Money</th>
									<th>Income Category Name</th>
									<th>Income Date</th>
									
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
										foreach ($all_income as $v_income) {
											echo "<tr>";
											
											echo "<td class='incomeTittles'>$v_income->IncomeTitle</td>";
											echo "<td class='incomeDescriptions'>$v_income->IncomeDescription</td>";
											echo "<td class='incomeMoneys'>$v_income->IncomeMoney</td>";
											echo "<td class='incomeCategorys'>$v_income->IncomeCategoryName</td>";
											echo "<td class='incomedates'>$v_income->IncomeDate</td>";
											echo "<td class='operation'><i title='Edit' class='fa fa-edit edit' data-val='".$v_income->Id."'></i></td>";
											echo "<td class='operation'><i href='#portlet-config' data-toggle='modal' class='config fa fa-times delete' data-val='".$v_income->Id."'></i></td>";											
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
							MakePaging(6);
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
                    	<input type="hidden" id="txtDeleteId" name="txtDeleteId" />
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








			

			


<script type="text/javascript">
				
				var baseUrl = "<?php echo base_url();?>";




				$("#btnSave").click(function  (argument) {
					var updId = $("#txtUpdId").val();
					var deleteId = $("#txtDeleteId").val();
					var urls = "";
					var message = "";


					if(updId != ""){
						urls = baseUrl+"admin/income_details/update";
						message = "<font color='green'>Successfully Updated</font>";
					}else if(deleteId!=""){
						urls = baseUrl+"admin/income_details/delete";
						message = "<font color='green'>Successfully Deleted</font>";
					}else{
						urls = baseUrl+"admin/income_details/save";
						message = "<font color='green'>Successfully Saved</font>";
					}
					//alert(urls);
					//return false;
					
					var incomeTitle = $("#txtIncomeTitle").val();
					var IncomeMoney = $("#txtIncomeMoney").val();
					var IncomeDescription = $("#txtIncomeDescription").val();
					var IncomeCategoryName = $("#txtIncomeCategoryName").val();
					var IncomeDate = $("#txtIncomeDate").val();
					
					
					var reqIncomeTitleValid = RequiredValid("#txtIncomeTitle","#msgIncomeTitle");
					var expIncomeMoneyValid = ExpressionValid("#txtIncomeMoney",isFloat,"#msgIncomeMoney","Only numbers allowed");
					var reqIncomeCategoryValid = RequiredValid("#txtIncomeCategoryName","#msgIncomeCategory");
					var reqIncomeDateValid = RequiredValid("#txtIncomeDate","#msgIncomeDate");

					if(deleteId==""){
						if(reqIncomeTitleValid==0||expIncomeMoneyValid==0||reqIncomeCategoryValid==0||reqIncomeDateValid==0){
							alert("Please correct the errors");
							return false;
						}
					}
					
					$.ajax({
	                    type: "POST",
	                    url: urls,
	                    data: { postUpdId:updId,  postDeleteId:deleteId,  postIncomeTitle:incomeTitle,
	                    	     postIncomeDescription:IncomeDescription, postIncomeMoney:IncomeMoney, 
	                    	      postIncomeCategoryId:IncomeCategoryName, postIncomeDate:IncomeDate },
	                    success: function (data) {
	                    	//alert(data);
	                    	if(data!="0"){
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
				//alert("Hi");
			});
            
            $("#btnDelete").click(function (argument) {
				$("#btnSave").click();
				// body...
			});
				  
       
	       $(".modal").click(function (e) {
	       	if(e.target == this){
	       		ClearData();
	       	}
	       });
		  

        
		 

           $(document).on("click",".edit", function(){
          	  ClearData();
          	  ///ClearTr();
          	  $("#titleText").text("Edit");
          	  $(this).parents("tr").addClass("edit-color");
              ShowMessage(message);
              var id = $(this).attr("data-val");
              var incomeTittle = $(this).parents("tr").children(".incomeTittles").text();
              var incomeDescription = $(this).parents("tr").children(".incomeDescriptions").text();
              var incomeMoney = $(this).parents("tr").children(".incomeMoneys").text();
              var incomeCategory = $(this).parents("tr").children(".incomeCategorys").text();
              var incomedate = $(this).parents("tr").children(".incomedates").text();
             
              $("#txtUpdId").val(id);
              $("#txtIncomeTitle").val(incomeTittle);
              $("#txtIncomeDescription").val(incomeDescription);
              $("#txtIncomeMoney").val(incomeMoney);
              $("#txtIncomeCategoryName option").filter(function(index) { return $(this).text() === incomeCategory; }).attr('selected', 'selected');
              $("#txtIncomeDate").val(incomedate);
              $("#btnSave").text("Update");   

          });  


          	$(document).on("click",".delete", function(){
          	 	ClearData();
		        var id= $(this).attr("data-val");
		        $("#txtDeleteId").val(id);

		    });        
   


          	function ClearData () {
      	       	$("#txtUpdId").val("");
				$("#txtIncomeTitle").val("");
				$("#txtIncomeDescription").val("");
				$("#txtIncomeMoney").val("");
				$("#txtIncomeCategoryName").val("");
				$("#txtExpenseDate").val("");
				$("#txtIncomeDate").val("");
				$("#btnSave").text("SAVE");

				$("#msgIncomeTitle").html("");
				$("#msgIncomeDescription").html("");
				$("#msgIncomeDescription").html("");
				$("#msgIncomeMoney").html("");
				$("#msgIncomeDate").html("");
				$("#msgIncomeCategory").html("");
			}

			
          	function ShowMessage(message){
					$("#messageContainer").show();
					$("#message").html(message);
					setTimeout( function(){
						$("#messageContainer").children().find("#message").html("");
						$('#messageContainer').hide();} , 
					12000);
			}

	</script>