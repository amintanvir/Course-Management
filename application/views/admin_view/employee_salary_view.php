<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Employee Salary <small>Save/Update/Delete</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="#">
								Home
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Entry of Employee Salary
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

					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box half-black" id="dataTable">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>List of Course Category
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
								<div class="col-md-6 col-sm-12" id="message">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-12">
								</div>
								<div class="col-md-6 col-sm-12">
									<div id="sample_2_filter" class="dataTables_filter pull-right">
										<label>Search: <input class="form-control input-small input-inline" id="txtDataTableSearch" type="text"></label>
									</div>
								</div>
							</div>
							
							<div class="table-responsive" id="mainTable">
							<form id="data" action="<?php echo base_url();?>admin/employee_salary/check" method="post">
								<table class="table filter-table table-striped table-bordered table-hover">
								<thead>
								<tr>
									<th>
										 Full Name
									</th>
									<th>
										 Email
									</th>
									<th>
										 Employee Contact No
									</th>
									<th>
										Regular Salary
									</th>
									<th>
										 Salary Given
									</th>
									<th>
										 <input title="Click to Check all" type="checkbox" data-click-state="1" id="parentCheck" />
									</th>
								</tr>
								</thead>
								<tbody id="ajaxData">
									
									<?php 
										$this->load->model("employee_salary_model");
										$date = date("Y-m");
										$i=0;
										if(isset($all_employees)){
											foreach ($all_employees as $v_employees) {
												$data = $this->employee_salary_model->select_employee_on_salary($v_employees->Id,$date);
												if(count($data)==0){
													echo "<tr>";
														echo "<input type='hidden' value='".$v_employees->Id."' name='employeeId[]' class='employeeId' />";
														echo "<td class='fullName'>$v_employees->FullName</td>";
														echo "<td class='email'>$v_employees->Email</td>";
														echo "<td class='contact'>$v_employees->ContactNumber</td>";
														echo "<td class='regularSalary'>$v_employees->Salary</td>";
														echo "<td class='salary'><input type='text' name='txtSalary[]' /></td>";
														echo "<td><input type='checkbox' value='".$i."' name='chk[]' class='chk' /></td>";
													echo "</tr>";
													$i++;
												}
											}
										}
									?>
									<tr>
										<td colspan="7">
											<input type="button" class="btn btn-success" id="btn" value="SUBMIT SALARY">
										</td>
									</tr>
								</tbody>
								</table>
								</form>
								<!-- <div class="paging"></div> -->
								<div class="row">
									<div class="col-md-7 pull-right">
										<div class="dataTables_paginate paging_bootstrap pull-right">
											<ul class="pagination paging" style="visibility: visible;">
												
											</ul>
										</div>
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









			<script type="text/javascript">
				var baseUrl = "<?php echo base_url();?>";

				$(document).on("click","#parentCheck",function  (argument) {
					//alert("Hi");
				
					if($(this).attr('data-click-state') == "1") {
						$(this).attr('data-click-state', "0");
					 	$("input[type=checkbox]").each(function(){
							$(this).attr("checked","checked");
							$(this).parent().addClass("checked");
						});			 
					} else {
						$(this).attr('data-click-state', "1");
					 	$("input[type=checkbox]").each(function(){
							$(this).removeAttr("checked");
							$(this).parent().removeClass("checked");
						});
					}

				});

				$(document).on("click","#btn",function  (argument) {
					
					// body...
					var formData = new FormData($("#data")[0]);
					//alert("hi");
					$.ajax({
				        url: "<?php echo base_url()?>admin/employee_salary/check",
				        type: 'POST',
				        data: formData,
				        async: false,
				        success: function (data) {
				        	alert(data);
				        	if(data!=""){
				        		$("#message").html("<font color='green'>"+data+" employees salary submitted</font>");
				        		$("#mainTable").load(location.href + " #mainTable",function(){
	                    			MakePaging(6);
	                    		});
				        	}
				        	//$("#message").html(data);
				        		
				            
				        },
				        cache: false,
				        contentType: false,
				        processData: false,
				        error: function (XMLHttpRequest, textStatus, errorThrown) {
	                        alert(XMLHttpRequest.responseText);
	                    }
	                });
						                    		

				});
				

				

			</script>


			
					

