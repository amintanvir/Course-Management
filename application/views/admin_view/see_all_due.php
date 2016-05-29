			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<a href="#">
								All Due Payment List
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
								<i class="fa fa-cogs"></i>List of Due Payment
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
									<th>On Course</th>
									<th>Student Name</th>
									<th>Payble Money</th>
									<th>Due Payment Date</th>
									
								</tr>
								</thead>
								<tbody id="ajaxData">
									<?php 
										foreach ($due_courses as $v_due_courses) {
											echo "<tr>";
												echo "<td class='onCourse'>$v_due_courses->CourseName</td>";
												echo "<td class='studentName'>$v_due_courses->FullName</td>";
												echo "<td class='paybleMoney'>$v_due_courses->PaybleAmount</td>";
												echo "<td class='duePaymentDate'>$v_due_courses->DuePaymentDate</td>";
												
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
