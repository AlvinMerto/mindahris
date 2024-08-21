function applycal() {
	var details = new Object();
	
	this.listen = function() {
		// listen to select change 
			$(document).on("change",".fileforselect",function() {
				details.ltype = $(this).val();
			})
		// end 
		
		/*
			dates 
			grp_id
			leave_specific
			leave_type
			selected = "CTO"
			specify
			_for 
		*/
		
		// listen to send application 
			$(document).on("click","#sendapl",function(){
				// set the remaining COC
					details.coc_rem = $(document).find("#coc_clean_val").val();
				// end 
				
				details.numofhrs  = $(document).find("#numofhrs").val();	
				details.ltype 	  = $(document).find(".fileforselect").val();
				
				newapp.applynow();
			})
		// end 
	}
	
	this.applynow = function() {
		performajax(["Leave/saveapplication",{ details : applied }], function(data) {	
			if (data.result == true) {
				var grpid = data.grp_id;
				var empid = data.empid;
		
				performajax(["Dashboard/recordrem",{ grpid_ : grpid , empid_ : empid }], function(remret) {
					var sent = newapp.sendemail(grpid,empid, "false");
				})
			}
		})		
	}
	
	this.sendemail = function(grp_id,emp_id,typemode) {
		c(document).find("#statustext").show().html("<p class='text_status' style='background:#ff8686;'> <i class='fa fa-spinner fa-spin' style='font-size:24px'></i> Processing Request. </p> ");
		c(document).find("#attach_sig_submit").hide();
		
		performajax(["Attendance/send_email",{ grpid:grp_id , empid:emp_id, type_mode:typemode }], function(ret) {
			// console.log(ret);
			
			c(document).find("#statustext").html("<p class='text_status' style='background:#3fc037;'> <i class='fa fa-check' aria-hidden='true' style='font-size:24px;'></i> Application Successful </p> ");
			setTimeout(function() {
				window.location.reload();
				
				c('#modal_exceptions').modal('hide');
			}, 2000)
			
		})
	}
}

var newapp = new applycal();
	newapp.listen();