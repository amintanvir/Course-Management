




			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Pickers <small>Expense Details</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						
						
						<li>
							<a href="#">
								Add Expense Details:- &nbsp; Save/Update/Delete
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
										<i class="fa fa-reorder"></i>Add Expense Details 
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
													<label class="control-label col-md-2"></label>
													<div class="col-md-8">
														<div class="col-md-12" id="message"></div>
													</div>
												</div>
											</div>


											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-4">ExpenseTitle</label>
														<div class="col-md-8">

															<input type="text" class="form-control" name="txtExpenseTitle" id="txtExpenseTitle" placeholder="Enter Your Expense Title">
															<span class="help-block" id="msgExpenseTitle">
																
															</span>
														</div>
													</div>
												</div>

												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-4">Expense Money</label>
														<div class="col-md-8">
															 <input type="text" class="form-control editor" name="txtExpenseMoney<" id="txtExpenseMoney" placeholder="Enter Amount Of Expense Money">
															<span class="help-block" id="msgExpenseMoney">
															</span>
														</div>
													</div>
												</div>
												<!--/span-->
											</div>



											
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label col-md-2">Expense Description</label>
														<div class="col-md-10">
															<textarea class="form-control" name="txtExpenseDescription" id="txtExpenseDescription" placeholder="Enter Your Expense Description"></textarea>
															<span class="help-block" id="msgExpenseDescription"></span>
														</div>
													</div>
												</div>
											</div>


											<!--row-->

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-4">Expense Category</label>															
														<div class="col-md-8">
														 	<select id="txtExpenseCategory" name="txtExpenseCategory" class="form-control">
																<option value="">SELECT EXPENSE CATEGORY</option>
																<?php fetch_option("Id","ExpenseCategoryName",$all_expense_category); ?>
															</select>
															<span class="help-block" id="msgExpenseCategory"></span>
														</div>
													</div>
												</div>

												<!--/row-->

                                               <div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-4">Expense Date</label>
														<div class="col-md-8">
														 	<div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
																<input type="text" id="txtExpenseDate" name="txtExpenseDate" class="form-control" readonly>
																<span class="input-group-btn">
																	<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
															</div>
															<span class="help-block" id="msgExpenseDate"></span>
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
								<i class="fa fa-cogs"></i>List of Expense  Details Table
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
									<th>Expense Title</th>
									<th>Expense Description</th>
									<th>Expense Money</th>
									<th>Expense Category Name</th>
									<th>Expense Date</th>
									
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
										foreach ($all_expense as $v_expense) {
											echo "<tr>";
												echo "<td class='expenseTittles'>$v_expense->ExpenseTitle</td>";
												echo "<td class='expenseDescriptions'>$v_expense->ExpenseDescription</td>";
												echo "<td class='expenseMoneys'>$v_expense->ExpenseMoney</td>";
												echo "<td class='expenseCategorys'>$v_expense->ExpenseCategoryName</td>";
												echo "<td class='expensedates'>$v_expense->ExpenseDate</td>";
												echo "<td class='operation'><i title='Edit' class='fa fa-edit edit' data-val='".$v_expense->Id."'></i></td>";
												echo "<td class='operation'><i href='#portlet-config' data-toggle='modal' class='config fa fa-times delete' data-val='".$v_expense->Id."'></i></td>";											
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
					var message = "";
					var updId = $("#txtUpdId").val();
					var deleteId = $("#txtDeleteId").val();
					var urls = "";

					if(updId != ""){
						urls = baseUrl+"admin/expense_details/update";
						message = "<font color='green'>Successfully Updated</font>";
					}else if(deleteId!=""){
						urls = baseUrl+"admin/expense_details/delete";
						message = "<font color='green'>Successfully Deleted</font>";
					}else{
						urls = baseUrl+"admin/expense_details/save";
						message = "<font color='green'>Successfully Saved</font>";
					}
					//alert(urls);
					//return false;

					
					var expenseTitle = $("#txtExpenseTitle").val();
					var expenseDescription = $("#txtExpenseDescription").val();
					var expenseMoney = $("#txtExpenseMoney").val();
					var expenseCategoryId = $("#txtExpenseCategory option:selected").val();
					var expenseDate = $("#txtExpenseDate").val();

					var reqExpenseTitleValid = RequiredValid("#txtExpenseTitle","#msgExpenseTitle");
					var expExpenseMoneyValid = ExpressionValid("#txtExpenseMoney",isFloat,"#msgExpenseMoney","Numbers allowed only");	
					var reqExpenseDateValid = RequiredValid("#txtExpenseDate","#msgExpenseDate");
					var reqExpenseCategory = RequiredValid("#txtExpenseCategory option:selected","#msgExpenseCategory");
					
					if(deleteId==""){
						if(reqExpenseTitleValid==0||expExpenseMoneyValid==0||reqExpenseDateValid==0){
							alert("Please correct the errors");
							return false;
						}
					}
					$.ajax({
	                    type: "POST",
	                    url:  urls,
	                    data: { postUpdId:updId, postDeleteId:deleteId, postExpenseTitle:expenseTitle,
	                    	     postExpenseDescription:expenseDescription, postExpenseMoney:expenseMoney,
	                    	     postExpenseCategoryId:expenseCategoryId, postExpenseDate:expenseDate },

	                     success: function (data) {
	                     	//alert(data);
	                    	if(data=="1"){
	                    		ShowMessage(message);
	                    		ClearData();

	                    		$("#mainTable").load(location.href + " #mainTable",function(){
	                    			MakePaging(12);
	                    		});
	                    	}else{
	                    		alert("Failed");
	                    	}
	                    },

	                    error: function (XMLHttpRequest, textStatus, errorThrown) {
	                        alert(textStatus);
	                    }
	                });
				//alert("Hi");
			});

		  	$("#btnDelete").click(function (argument) {
				$("#btnSave").click();
			});
       
       $(".modal").click(function (e) {
       	if(e.target == this){
       		ClearData();
       	}
       });
		     

          $(document).on("click",".edit", function(){
          	   ShowMessage(message);
          	 
          	  ClearData();
              ClearTr();
              $(window).scrollTop(100);
              $(this).parents("tr").addClass("edit-color");

              var id= $(this).attr("data-val");
              var expenseTitle = $(this).parents("tr").children(".expenseTittles").text();
              var expenseDescription = $(this).parents("tr").children(".expenseDescriptions").text();
              var expenseMoney = $(this).parents("tr").children(".expenseMoneys").text(); 
              var expenseCategory = $(this).parents("tr").children(".expenseCategorys").text();
              var expenseDate = $(this).parents("tr").children(".expensedates").text();
              
              $("#txtUpdId").val(id);
              $("#txtExpenseTitle").val(expenseTitle);
              $("#txtExpenseDescription").val(expenseDescription);
              $("#txtExpenseMoney").val(expenseMoney);
              $("#txtExpenseCategory option").filter(function(index) { return $(this).text() === expenseCategory; }).attr('selected', 'selected');
              $("#txtExpenseDate").val(expenseDate);
              $("#btnSave").text("Update");
              $("#msgExpenseTitle").html("");   
              $("#msgExpenseDescription").html("");
              $("#msgExpenseMoney").html("");
              $("#msgExpenseDate").html("");
              $("#msgExpenseCategory").html("");
          });  


        $(document).on("click",".delete", function(){
      	  ShowMessage(message);
      	  ClearData();
          var id= $(this).attr("data-val");
          $("#txtDeleteId").val(id);
        });        
   


        function ClearData () {
			ClearTr();          	
		    $("#txtUpdId").val("");
			$("#txtExpenseTitle").val("");
			$("#txtExpenseDescription").val("");
			$("#txtExpenseMoney").val("");
			$("#txtExpenseCategory").val("");
			$("#txtExpenseDate").val("");
			$("#txtDeleteId").val("");
			$("#btnSave").text("SAVE");
			$("#msgExpenseTitle").html("");
			$("#msgExpenseDescription").html("");
	        $("#msgExpenseMoney").html("");
	        $("#msgExpenseDate").html("");
	        $("#msgExpenseCategory").html("");
		}

        function ShowMessage(message){
			$("#messageContainer").show();
			$("#message").html(message);
			setTimeout( function(){
				$("#messageContainer").children().find("#message").html("");
				$('#messageContainer').hide();} , 
			12000);
		}

		function ClearTr(){
			$(".filter-table>tbody>tr").each(function () {
				$(this).removeClass("edit-color");
			});
		}	

	</script>



			


			
					




