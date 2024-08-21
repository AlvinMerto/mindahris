// by alvin

var mll = $;
var in_lmgt = new leavemgt();

var fullname = null;

mll(document).ready(function() {
	
	// mll(document).find(".content-wrapper .content_wrapper").css("margin-left" , "230px !important");
	
	performajax(["My/checking",{ empid : 1235123 }], function(data) {
		fullname = data[2];
		var emp_id = data[1];
		
		mll(document).find("#spl_span_val").html("N/A");
			performajax(['My/remaining',
							{ 
							empid : emp_id , 
							type : "SPL" 
							}
						], function(data) {
							mll(document).find("#spl_span_val").text(data);
						})
		
		mll(document).find("#fl_span_val").html("N/A");
			performajax(['My/remaining',
							{ 
							  empid : emp_id , 
							  type : "FL" 
							}
						], function(data) {
							mll(document).find("#fl_span_val").text(data);
						})
			
		performajax(['Leave/getleavecredits',{empid:data[1]}], function(data) {
			
			//mll(document).find("#employeename").html( fullname );
			mll(document).find("#the_name_of_emp").html( fullname );
			//mll("<div class='btn-group' style='float:right; margin-right: 20px;'><button class='btn btn-default btn-sm' id='rem_fl' data-empid='"+emp_id+"'> <i class='fa fa-clock-o' aria-hidden='true'></i> Remaining FL</button><button class='btn btn-primary btn-sm' id='rem_spl' data-empid='"+emp_id+"'> <i class='fa fa-clock-o' aria-hidden='true'></i> Remaining SPL</button></div>").prependTo("#employeename");
			
			
			mll(document).find(".content_wrapper .rightbox").show().animate({
				"width":"100%",
				// "margin-left":"230px"
			}, 300);
		
			
			mll(document).find(".rightbox .theheader").css("margin-bottom","0px")
					
			mll(document).find(".content_wrapper .leftbox").animate({
				"margin-left":"-286px"
			},300).hide();
			
			mll(document).find("#name_div_box").addClass("margin_left_0px_");
			
			in_lmgt.print_to_leavetable(data,"#leavetable");
			
		})
	})
	
})