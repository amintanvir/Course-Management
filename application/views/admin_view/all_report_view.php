	

			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Total Report <small>View/Print</small>
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
											<i class="fa fa-reorder"></i><span id="localTitle">Report of </span>Total Income Expense
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
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label col-md-2">From</label>
															<div class="col-md-4">
                                                                <div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd"  data-date-viewmode="years">
																	<input type="text" id="txtFromDate" name="txtFromDate" placeholder="Enter from date" class="form-control" readonly>
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
																<span class="help-block" id="msgFromDate"></span>
															</div>
															
															<label class="control-label col-md-2">To</label>
															<div class="col-md-4">
                                                                <div style="width:100% !important" class="input-group input-large date date-picker" data-date-format="yyyy-mm-dd"  data-date-viewmode="years">
																	<input type="text" id="txtToDate" name="txtToDate" placeholder="Enter to date" class="form-control" readonly>
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
																<span class="help-block" id="msgToDate"></span>
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
								Overall Report 
							</div>
							<span class="btn blue btn-sm" onclick="printDiv()">Print</span>
							<div class="tools">

								<a href="javascript:;" class="collapse">
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

				function ClearData () {
					$("#txtFromDate").val("");
					$("#txtToDate").val("");
					
					$('select[name^="ddlIncomeType"] option[value=""]').attr("selected","selected");
					$("#txtSpecificDate").val("");
				}



				$("#btnViewReport").click(function  (argument) {


					var formData = new FormData($("#data")[0]);
					

					var fromDate = $("#txtFromDate").val();
					var toDate = $("#txtToDate").val();
					

					if(fromDate==""){
						alert("Please select date from");
						return false;
					}else if(toDate==""){
						alert("Please select to date");
						return false;
					}
					var message = "Total report from "+fromDate+" to "+toDate;
					

					var urls=baseUrl+"admin/all_report/find_report";

				    $.ajax({
				        url: urls,
				        type: 'POST',
				        data: formData,
				        async: false,
				        success: function (data) {
				        	//alert(data);
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