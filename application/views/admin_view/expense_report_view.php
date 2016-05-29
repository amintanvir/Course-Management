



			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Expense Report <small>Save/Update/Remove</small>
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
											<i class="fa fa-reorder"></i><span id="localTitle">Report of </span>Expense
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
										<form id="data" method="post" class="form-horizontal">
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
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-1">From</label>
															<div class="col-md-3">
                                                                <div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd"  data-date-viewmode="years">
																	<input type="text" id="txtFromDate" name="txtFromDate" placeholder="Enter from date" class="form-control" readonly>
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
																<span class="help-block" id="msgFromDate"></span>
															</div>
															
															<label class="control-label col-md-1">To</label>
															<div class="col-md-3">
                                                                <div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd"  data-date-viewmode="years">
																	<input type="text" id="txtToDate" name="txtToDate" placeholder="Enter to date" class="form-control" readonly>
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
																<span class="help-block" id="msgToDate"></span>
															</div>

															<label class="control-label col-md-1">Income Type</label>
															<div class="col-md-3">
																<select id="ddlExpenseType" name="ddlExpenseType" class="form-control">
																	<option value="">SELECT INCOME TYPE</option>
																	<option value="teacher">Employee Salary</option>
																	<option value="others">Others</option>																																		
																</select>
																<span class="help-block" id="msgExpenseType">
																	
																</span>
															</div>

														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															

															<label class="control-label col-md-1">OR Date</label>
															<div class="col-md-3">
																<div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd"  data-date-viewmode="years">
																	<input type="text" id="txtSpecificDate" name="txtSpecificDate" placeholder="Enter specific dated to view" class="form-control" readonly>
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
																<span class="help-block" id="msgSpecificDate"></span>
															</div>
														</div>
													</div>

												</div>




											</div>
											<!--End Form Body Here-->


											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-3 col-md-9">
															<button type="button" name="btnViewReport" id="btnViewReport" class="btn green">VIEW REPORT</button>
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
								<i class="fa fa-cogs"></i>Expense Report <a target="_blank" href="#" onclick="printDiv()">Print</a>
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
						<div class="portlet-body" id="print_area">
							
							
							<div class="table-responsive" id="feedback" style="overflow:scroll">
								
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
					</div>
					<!-- END SAMPLE TABLE PORTLET-->


					<div id="response"></div>
				</div>
			</div>





			



<script type="text/javascript">
				
				var baseUrl = "<?php echo base_url();?>";
			


				function ShowMessage(message){
					$("#messageContainer").show();
					$("#message").html(message);
					setTimeout( function(){
						$("#messageContainer").children().find("#message").html("");
						$('#messageContainer').hide();} , 
					6000);
				}

				$("#btnViewReport").click(function  (argument) {


					var formData = new FormData($("#data")[0]);
					

					var specificDate = $("#txtSpecificDate").val();
					var fromDate = $("#txtFromDate").val();
					var toDate = $("#txtToDate").val();
					var expenseType = $("#ddlExpenseType option:selected").val();
					var expenseTypeText = $("#ddlIncomeType option:selected").text();


					var message = "Income report";
					if(specificDate!=""){
						message += " on:- "+specificDate;
					}else{
						if(fromDate!=""){
							message+=" from "+fromDate;
						}
						if(toDate!=""){
							message+=" till "+toDate;
						}
						if(expenseType!=""){
							message+=" for "+expenseTypeText;
						}
					}
					
					var urls = "";
					if(specificDate!=""){
						urls=baseUrl+"admin/expense_report/find_report_specific_date";
					}else{
						urls=baseUrl+"admin/expense_report/find_report";
					}
					/*alert(urls);
					alert(expenseType);return false;*/
					
				    $.ajax({
				        url: urls,
				        type: 'POST',
				        data: formData,
				        async: false,
				        success: function (data) {
				        	alert(data);
				        	$("#feedback").html("<h2>"+message+"</h2>");
				        	$("#feedback").append(data);
				        },
				        cache: false,
				        contentType: false,
				        processData: false,
				        error: function (XMLHttpRequest, textStatus, errorThrown) {
	                        alert(XMLHttpRequest.responseText);
	                    }
				    });
				});


				

		function printDiv() {    
	    	var printContents = document.getElementById('dataTable').innerHTML;
	    	var originalContents = document.body.innerHTML;
	     	document.body.innerHTML = printContents;
	     	window.print();
	     	document.body.innerHTML = originalContents;
    	}
	</script>