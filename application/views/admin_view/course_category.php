<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Course Category <small>Save/Update/Delete</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">
								Home
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Add course category
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
								<i class="fa fa-reorder"></i>Add Course Category
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
							<form action="<?php echo base_url(); ?>" method="post" id="frmCourseCategory" class="form-horizontal form-bordered">
								<input type="hidden" id="txtUpdId" name="txtUpdId">
								<div class="form-body">
									<div class="form-group" id="messageContainer">
										<label class="control-label col-md-3"></label>
										<div class="col-md-3">
											<div class="col-md-7" id="message"></div>
										</div>
									</div>
								</div>
								<div class="form-body">
									<div class="form-group">
										<label class="control-label col-md-3">Category Name</label>
										<div class="col-md-3">
											<input required id="txtCategoryName" name="txtCategoryName" class="form-control form-control-inline input-medium" size="16" type="text"/>
										</div>
										<div class="col-md-3" id="msgCategoryName"></div>
									</div>
								</div>


								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button type="button" id="btnSave" name="btnSave" class="btn blue">SAVE</button>
										<button type="button" id="btnCancel" name="btnCancel" class="btn default" onclick="ClearData()">Cancel</button>
									</div>
								</div>								
							</form>


							<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				            <div class="modal fade" id="portlet-config" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				                <div class="modal-dialog">
				                    <div class="modal-content">
				                        <div class="modal-header">
				                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				                            <h4 class="modal-title">Are you sure !!</h4>
				                        </div>
				                        <div class="modal-body">
				                        	<input id="txtDeleteId" type="hidden" />
				                             You are going to delete the row
				                        </div>
				                        <div class="modal-footer">
				                            <button type="button" id="btnDelete" class="btn blue" data-dismiss="modal">YES</button>
				                            <button type="button" id="btnClose" onclick="ClearData()" class="btn default" data-dismiss="modal">Close</button>
				                        </div>
				                    </div>
				                    <!-- /.modal-content -->
				                </div>
				                <!-- /.modal-dialog -->
				            </div>
				            <!-- /.modal -->
				            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				            
							<!-- END FORM-->




						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>



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
								<div class="col-md-6 col-sm-12">
								</div>
								<div class="col-md-6 col-sm-12">
									<div id="sample_2_filter" class="dataTables_filter pull-right">
										<label>Search: <input class="form-control input-small input-inline" id="txtDataTableSearch" type="text"></label>
									</div>
								</div>
							</div>
							
							<div class="table-responsive">
								<table class="table filter-table table-striped table-bordered table-hover">
								<thead>
								<tr>
									<th>
										 Category Name
									</th>
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
										foreach ($all_course_category as $v_course_category) {
											echo "<tr>";
											echo "<td class='categoryName'>$v_course_category->CategoryName</td>";
											echo "<td class='operation'><i class='fa fa-edit edit' data-val='".$v_course_category->Id."'></i></td>";
											echo "<td class='operation'><i href='#portlet-config' data-toggle='modal' class='config fa fa-times delete' data-val='".$v_course_category->Id."'></i></td>";											
											echo "</tr>";
										}
									?>
								</tbody>
								</table>
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
							MakePaging(12);
						</script>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->



				</div>
			</div>









			<script type="text/javascript">
				var baseUrl = "<?php echo base_url();?>";


				$("#btnSave").click(function(){
					
					var category = RequiredValid("#txtCategoryName","#msgCategoryName");

					if(deleteId==""){
						if(category!=1){
							return false;
						}
					}
					//return false;

					var updId = $("#txtUpdId").val();
					var deleteId = $("#txtDeleteId").val();
					var message = updId!=""?"Successfully Updated":deleteId!=""?"Successfully Deleted":"Successfully Saved";///?deleteId!="Successfully Saved":"Successfully Deleted";
					var urls = "";
					if(updId != ""){
						urls = baseUrl+"admin/course_category/update";
					}else if(deleteId!=""){
						urls = baseUrl+"admin/course_category/delete";
					}else{
						urls = baseUrl+"admin/course_category/save";
					}
					//alert(urls);
					var categoryName = $("#txtCategoryName").val();
					

					$.ajax({
                    type: "POST",
                    url: urls,
                    data: {postId:updId, postDeleteId: deleteId, postCategoryName:categoryName  },
                    success: function (data) {
                        if(data=="0"){
                        	alert("Failed");
                        }else if(data=="2"){
                        	$("#msgCategoryName").html("<font color='red'>Already exist</font>");
                        }else{
                        	var json = jQuery.parseJSON(data)
	                        var loaded = "";
	                        for(fetch in json){
	                        	loaded+="<tr>";
	                        		loaded+="<td class='categoryName'>"+json[fetch].CategoryName+"</td>";
	                        		loaded+="<td class='operation'><i class='fa fa-edit edit' data-val='"+json[fetch].Id+"'></i></td>";
	                        		loaded+="<td class='operation'><i href='#portlet-config' data-toggle='modal' class='config fa fa-times delete' data-val='"+json[fetch].Id+"'></i></td>";
	                        	loaded+="</tr>";
	                        }
	                        $("#ajaxData").html(loaded);
	                        ShowMessage(message);
	                        ClearData();
                        	MakePaging(6);   
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(XMLHttpRequest.responseText);
                    }
	                });
	                MakePaging(6);
				});





				function ClearData(){
					$("#txtCategoryName").val("");
					$("#btnSave").text("SAVE");
					$("#txtUpdId").val("");
					$("#txtDeleteId").val("");

				}
				
				function ClearTr(){
					$(".filter-table>tbody>tr").each(function () {
						$(this).removeClass("edit-color");
					});
				}				

				$(document).on("click",".edit",function(){
					var id = $(this).attr("data-val");
					var categoryName = $(this).parents("tr").children(".categoryName").text();
					$("#txtUpdId").val(id);
					$("#txtCategoryName").val(categoryName);
					$("#frmCourseCategory").attr("action",baseUrl+"course_category/update");
					$("#btnSave").text("UPDATE");
					ClearTr();
					$(this).parents("tr").addClass("edit-color");
					$('html,body').animate({ scrollTop: 80 }, 'slow');
				});


				$(document).on("click",".delete",function(){
					var id = $(this).attr("data-val");
					$("#txtDeleteId").val(id);
				});

				$("#btnDelete").click(function(){
					$("#btnSave").click();

				});

				function ShowMessage(message){
					$("#messageContainer").show();
					$("#message").html(message);
					setTimeout( function(){
						$("#messageContainer").children().find("#message").html("");
						$('#messageContainer').hide();} , 
					4000);
				}

				

			</script>


			
					

