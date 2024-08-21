var grpid 	   = null;
var elcid 	   = null;
var checkexact = null;

$(document).ready(function(){
	$(document).on("click",".recallbtn",function(){
		$(document).find("#editwindow").hide();
		grpid = $(this).data("grpid");
		elcid = $(this).data("elcid");
		
		ttext  = $(this).parent("td").parent("tr").children().eq(0).text(); // parent text
		// recall 
			// delete from 
				// checkexact
				// checkexact_leave_logs 
				// checkexact_logs 
				// employee_leave_credits
		
			//if (grpid === null) {
			$(document).find("#apps").children().remove();
				performajax(["Leave/checkforexact_ids",{ grpid : grpid }], function(data){
					
					if (data.length >= 1) {
						for(var i = 0; i <= data.length-1; i++) {
							$("<li>"+
								"<p class='thecheckdates'>"+data[i]['checkdate']+data[i]['is_approved']+"</p>"+
								"<span class='realrecall' data-elcid = '"+elcid+"' data-grpid = '"+grpid+"' data-exactid='"+data[i]['exact_id']+"'> <i class='fa fa-minus-circle'></i> Recall </span>"+
								// "<span class='editthis'> <i class='fa fa-edit'></i> Edit </span>"+
							  "</li>").appendTo("#apps");
						}
						$(document).find("#apps").show();
						$("#modalrecall").modal("show");
					} else {
						recall(elcid, null, grpid);
						/*
						$("<li>"+
							"<p class='thecheckdates'> "+ttext+" </p>"+
							"<span class='realrecall' data-elcid = '"+elcid+"' data-grpid = '"+grpid+"' data-exactid='null'> <i class='fa fa-minus-circle'></i> Recall </span>"+
						  "</li>").appendTo("#apps");
						  $(document).find("#apps").show();
						$("#modalrecall").modal("show"); 
						*/
					}
				});
			//}
	})
	
	$(document).on("click",".realrecall",function(){
		recall( $(this).data("elcid") , $(this).data("exactid") , $(this).data("grpid") )
	})

	//============ update ================
		var fieldname       = null;
		var fieldvalue      = null;
		var theelcforupdate = null;
		
		$(document).on("click",".editthis",function(){
			fieldname 		= $(this).data("field");
			theelcforupdate = $(this).parent("tr").data("elctr");
				
			var vall 		= $(this).text();
			
			$(document).find("#editthistext").text( $(this).parent("tr").children().eq(0).text() );
			$(document).find("#editthisval").val(vall);
			$(document).find("#editwindow").show();
			$(document).find("#apps").hide();
			
			if (vall.length == 0) {
				$(document).find("#updatethis").text("Save");
			} else {
				$(document).find("#updatethis").text("Update");
			}
			
			$("#modalrecall").modal("show");
		})
		

		$(document).on("click","#updatethis",function(){
			fieldvalue = $(document).find("#editthisval").val();
			performajax(["Leave/updatethefield",{ field : fieldname , value : fieldvalue , elc : theelcforupdate }], function(data){
				if (data === true) {
					window.location.reload();
				}
			})
		})
	//============ update ================
	
	var widthh = 255;
	$(document).on("click",".closewin",function(){
		$(".theempsdiv").animate({
			"width":widthh+"px"
		},100);
		
		if (widthh == 0) {
			widthh = 255;
		} else if (widthh = 255) {
			widthh = 0;
		}
		
	})
})

function recall(elcid, exactid, grpid) {
	
	var conf = confirm("Are you sure you want to proceed?");
	
	if (conf) {
		performajax(["Leave/recallthis",{ elcid : elcid , exactid : exactid , grpid : grpid }], function(data){
			if (data === true) {
				window.location.reload();
			}
		});
	}
}