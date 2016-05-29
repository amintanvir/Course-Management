
<script type="text/javascript">
				
						$(".filter-table>tbody>tr").hide();
							var perPage = 12;
							$(document).on("keyup","#txtDataTableSearch",function(e) {
								$(".filter-table>tbody>tr").show();
								var val=$(this).val();
								var totalRows = $(".filter-table>tbody>tr").length;
								
						        $(".filter-table>tbody>tr").each(function(index, element) {
									var search_term=$(this).children("td").text();
									search_term = $.trim(search_term);
									if(search_term.indexOf(val)>=0){
										$(this).show();
									}else{
										$(this).hide();
									}
									
						        });
								
								var totalVisibleRows = $(".filter-table>tbody>tr:visible").length;
								
								if(totalVisibleRows>0){
								var newPaging = "";
										$('.filter-table>tbody>tr:visible').slice(perPage, totalRows).hide();
										var highest = Math.ceil(totalVisibleRows/perPage);
										var page_val = 0;
										for(var i=0;i<highest; i++){
											newPaging += '<li class="pg" data-page="'+page_val+'" ><a href="#">'+(parseInt(i)+1)+'</a></li>';//"<span class='pager' data-page='"+page_val+"'>"+(parseInt(i)+1)+" </span> || ";
											page_val += perPage;
										}
									$(".paging").html(newPaging);
								}else{
									$(".paging").html("No results matched");
								}
						    });
							
							
							var totalRows = $(".filter-table>tbody>tr").length;
							
							
							
							$(document).on("click",".pg",function(){
								var page_index = parseInt($(this).attr("data-page"));
								$(".filter-table>tbody>tr").hide();
								var endRange = parseInt(page_index)+parseInt(perPage);

								$('.filter-table>tbody>tr').slice(page_index, endRange).show();
								$('html,body').animate({ scrollTop: 400 }, 'slow');
							});
							
							
							
							function MakePaging(perPageArg){
								$(".filter-table>tbody>tr").hide();
								var totalRowsArg=$(".filter-table>tbody>tr").length;
								var paging = "";
								var highest = Math.ceil(totalRowsArg/perPageArg);
									$('.filter-table>tbody>tr').slice(0, perPageArg).show();
								
								var page_val = 0;
								for(var i=0;i<highest; i++){
									paging += '<li class="pg" data-page="'+page_val+'" ><a href="#">'+(parseInt(i)+1)+'</a></li>';//'<li class="pager" data-page="'+page_val+'"><a href="#">'+(parseInt(i)+1)+'</a></li>';//"<span class='pager' data-page='"+page_val+"'>"+(parseInt(i)+1)+" </span> || ";
									page_val += perPageArg;
								}
							
								$(".paging").html(paging);
							}


			
</script>