<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Expense Category <small>Save/Update/Delete</small>
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
								Add Expense Category
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
					<div class="portlet box half-black">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i><span id="titleText">Add</span> Expence Category
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="" method="post" id="" class="form-horizontal form-bordered">
								<input type="hidden" id="txtUpdId"  class="form-control form-control-inline input-medium" size="8" name="txtUpdId">
								<div class="form-body">
									<div class="form-group" id="messageContainer">
										<label class="control-label col-md-3"></label>
										<div class="col-md-6">
											<div class="col-md-12" id="message"></div>
										</div>
									</div>
								</div>
								<div class="form-body">
									<div class="form-group">
										<label class="control-label col-md-3">Expence Category Name</label>
										<div class="col-md-3">
											<input required id="txtExpenceCategoryName" name="txtExpenceCategoryName" class="form-control form-control-inline input-medium" size="16" type="text"/>
										</div>
										<div class="col-md-3" id="msgCategoryName"></div>
									</div>
								</div>


								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button type="button" id="btnSave" name="btnSave" class="btn blue" va>SAVE</button>
										<button type="button" id="btnCancel" name="btnCancel" class="btn default" onclick="ClearData()">Cancel</button>
									</div>
								</div>								
							</form>
							<!-- END FORM-->

						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>




	<!---Start DataTables---->

			<div class="row">
				<div class="col-md-12">

					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box half-black" id="dataTable">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>Expense Category
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
									<th>Expense CategoryName</th>
									
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
										foreach ($all_expense_category as $v_expense) {
											echo "<tr>";
											echo "<td class='expenseCat'>$v_expense->ExpenseCategoryName</td>";
											
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
							MakePaging(6);
						</script>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->



				</div>
			</div>







		<!---End DataTables---->



		<div class="modal fade" id="portlet-config" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Are you sure !!</h4>
                    </div>
                    <div class="modal-body">
                    	<input type="hidden" id="txtDeleteId" name="txtDeleteId"/>
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








<script type="text/javascript">
				
				var baseUrl = "<?php echo base_url();?>";





				$(document).ready(function(e) {
					//alert("Hi");
				});



				$("#btnSave").click(function  (argument) {
					var updId = $("#txtUpdId").val();
					var deleteId = $("#txtDeleteId").val();
					var urls = "";
					var message = "";


					if(updId != ""){
						urls = baseUrl+"admin/expense_category/update";
						message = "<font color='green'>Successfully Updated</font>";
					}else if(deleteId!=""){
						urls = baseUrl+"admin/expense_category/delete";
						message = "<font color='green'>Successfully Deleted</font>";
					}else{
						urls = baseUrl+"admin/expense_category/save";
						message = "<font color='green'>Successfully Saved</font>";
					}
					//alert(urls);return false;
					
					var expenseCategory = $("#txtExpenceCategoryName").val();

					var reqExpenseCategoryValid = RequiredValid("#txtExpenceCategoryName","#msgCategoryName");
					if(deleteId==""){
						if(reqExpenseCategoryValid==0){
							return false;
						}
					}
					
					$.ajax({
	                    type: "POST",
	                    url: urls,
	                    data: { postUpdId:updId,  postDeleteId:deleteId,  postExpenseCategoryName:expenseCategory },
	                    success: function (data) {
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
	                        alert(textStatus);
	                    }
	                });
				//alert("Hi");
			});
            
             $("#btnDelete").click(function (argument) {
					$("#btnSave").click();
					// body...
				})
       
	       $(".modal").click(function (e) {
	       	if(e.target == this){
	       		ClearData();
	       	}
	       });
		    


		 

          $(document).on("click",".edit", function(){
          	  ClearData();
          	  ClearTr();
          	  $("#titleText").text("Edit");
          	  $(this).parents("tr").addClass("edit-color");
              ShowMessage(message);
              var id = $(this).attr("data-val");
              var expensecategorys = $(this).parents("tr").children(".expenseCat").text();

              $("#txtUpdId").val(id);
              $("#txtExpenceCategoryName").val(expensecategorys);
              $("#btnSave").text("Update");   

          });  


          	$(document).on("click",".delete", function(){
          	 	ClearData();
		        var id= $(this).attr("data-val");
		        $("#txtDeleteId").val(id);

		    });        
   


          	function ClearData () {
      	        $("#txtUpdId").val("");
      	        $("#titleText").text("Add");
				$("#txtExpenceCategoryName").val("");
				$("#txtDeleteId").val("");
				$("#btnSave").text("SAVE");
			}

			function ClearTr(){
				$(".filter-table>tbody>tr").each(function () {
					$(this).removeClass("edit-color");
				});
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



			


			
					

