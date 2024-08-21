
var c = $;

var tds_filled 		= [];
var months 		 	= Array("01","02","03","04","05","06","07","08","09","10","11","12");
var spl_specific 	= null;
var sl_specific  	= null;
var proceed_to_save = false;
var previous 		= false;
var rem_coc 		= null;
var accom_daid 	 	= null;
// var link 			= "https://office.minda.gov.ph:9003";
var link 			= BASE_URL;
// var link 			= "https://192.168.1.9";

// accom 
var accom_event     = null;

var ishalfday_sl    = false;

var applied 		= new Object();
	applied.dates 	= [];
	
	applied._for 	 = null;
	applied.selected = null;
	
		// if type is leave
			applied.leave_type 	   = null; 
			applied.leave_specific = null; 
		// end leave
		
	applied.specify = null;
	applied.grp_id  = null;
	
	// emp id 
		var	theempid		= null;
	// end 
	
	// kind of leave 
		var thekindofleave  = null;
	// end 
	
c(document).ready(function() {
	var app = new application();
		app.get_applied_dates();
			
	c(document).on("click","#signatories_text", function() {
		var h = c(document).find(".signatories").height();
		
			if (h > 45) {
				c(document).find(".signatories").height("45px");
				c(document).find("#icon_sign").html("<i class='fa fa-chevron-circle-left' aria-hidden='true'></i>");
			} else {
				c(document).find(".signatories").height("auto");
				c(document).find("#icon_sign").html("<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>");
			}
		
	})
	
	c("#applyleave").on("click", function() {
		if ( applied.dates.length == 0 ) {
			alert("Please select date(s)");
			return;
		}
		
		c(document).find("#notification_cancel").hide();
		c(document).find(".filefor_div").show();
		
		// reset  values
			c(document).find("#selectleavetype").removeAttr("disabled");
			c(document).find("#cancel_application").hide();
			c(document).find("#resendform").hide();
			c(document).find("#viewform").hide();
			c(document).find(".hallow_child").hide();
			
		// select the default value 
			c(document).find("#selectleavetype").val("def")
			
			
			c(document).find("#attach_sig_update").hide();
			c(document).find("#attach_sig_submit").show();
			c(document).find(".signatories").show();
		// reset values
		
		// hide panels
			c(document).find("#CTO_div, #OT_div, #PS_div, #PAF_div, #OB_div, #LEAVE_div, #ot_accom_added").hide();
		// end hiding of panels
		
		$('#modal_exceptions').modal('show');
		
		c(document).find("#date_select").html("<strong style='font-size: 20px;'>Applied date(s):</strong> <br/> &nbsp;&nbsp;&nbsp; ");
		for (var i=0;i<=applied.dates.length-1;i++) {				
			c(document).find("#date_select").append("<span>["+applied.dates[i] + "] - </span>");
		}
		
	})
		
	// add accomplishment report 
		c("#addaccom").on("click",function(){
			if (applied.dates.length == 0) {
				alert("Please select date(s)");
				return;
			}
			
			c("#addaccom_modal").modal("show")
			c(document).find("#addaccom_status").hide();
			
			// footer details 
				c(document).find(".footerspan").remove();
				c(document).find("#footerdivid").remove();
			// end 
			
			c("#dates_accom").children().remove();
			
			for(var i=0;i<=applied.dates.length-1;i++) {
				c("<span>",{text: "["+applied.dates[i]+"]"}).appendTo("#dates_accom");
				if (i < applied.dates.length-1) {
					c("<span>",{text:" - "}).appendTo("#dates_accom");
				}
			}
			// dates_accom
			
			if (applied.dates.length == 1) {
				// getaccom_js()
				app.__showupdate_window();
			} else if (applied.dates.length > 1) {
				c(document).find(".alterclass").hide();
				c(document).find("#add_accom_modal_text").val("");
				c(document).find("#saveaccom").show();
			}
		})
		
		// update button
			c(document).on("click","#updateaccom",function(){
				var conf = confirm("Are you sure you want to update?");
				
				if (conf) {
					c(document).find("#addaccom_status").show().html("<p> updating accomplishment report... please wait. </p>");
					performajax(["My/alteraccom",{ dates : applied.dates, alteraction : "update" , daid : accom_daid, accom : c(document).find("#add_accom_modal_text").val() }],function(data){
						if(data == true || data == 1) {
							c(document).find("#addaccom_status").html("<p style='text-align: center; color: green; font-size: 16px;'> Accomplishment Report has been updated. </p>");
							
							var app = new application();	
								app._removedates();
								app.get_applied_dates();
							
							setTimeout(function(){
								c("#addaccom_modal").modal("hide");
							},100)
						} else {
							c(document).find("#addaccom_status").html("<p style='text-align: center; color: #d20f0f; font-size: 16px;'> updating has encountered an error. </p>");
						}
					})
				}
			})
		// end 
		
		// delete button 
			c(document).on("click","#deleteaccom",function(){
				var conf = confirm("Are you sure you want to delete?");
				
				if (conf) {					
					c(document).find("#addaccom_status").show().html("<p> deleting accomplishment report... please wait. </p>");
					performajax(["My/alteraccom",{ dates : applied.dates, alteraction : "delete" , daid : accom_daid, accom : c(document).find("#add_accom_modal_text").val() }],function(data){
						if(data == true || data == 1) {
							c(document).find("#addaccom_status").html("<p style='text-align: center; color: green; font-size: 16px;'> Accomplishment Report has been deleted. </p>");
							// window.location.reload();
							
							var app = new application();	
								app._removedates();
								app.get_applied_dates();
						
							setTimeout(function(){
								c("#addaccom_modal").modal("hide");
							},100)
						} else {
							c(document).find("#addaccom_status").html("<p style='text-align: center; color: #d20f0f; font-size: 16px;'> deleting has encountered an error. </p>");
						}
					})
				}
			})
		// end 

		
		c(document).on("click","#saveaccom",function(){
			// My/saveaccom_js
			var _accom = c(document).find("#add_accom_modal_text").val();
			
			c(document).find("#addaccom_status").show().html("<p> saving accomplishment report... please wait. </p>");
			performajax(["My/saveaccom_js",{ dates : applied.dates , accom : _accom }], function(data){
				if(data == true) {
					c(document).find("#addaccom_status").html("<p style='text-align: center; color: green; font-size: 16px;'> Accomplishment Report is saved. </p>");
					
					var app = new application();	
						app._removedates();
						app.get_applied_dates();
						
					setTimeout(function(){
						c("#addaccom_modal").modal("hide");
					},100)
				} else {
					c(document).find("#addaccom_status").html("<p style='text-align: center; color: #d20f0f; font-size: 16px;'> saving has encountered an error. </p>");
				}
			})
			
		})
		
		c("#app_close").on("click",function(){
			c("#addaccom_modal").modal("hide")
			applied.dates = [];
		})
		
		
		c(document).find("#add_accom_modal_text").jqxEditor({ height: "400px", width: '100%', theme: 'arctic' });
	// end 
	
	c('#calendar').fullCalendar({
		dayClick: function(date, jsEvent, view) {
			
			var	result = {
				"CHECKDATE": months[date._d.getMonth()]+"/"+date._d.getDate()+"/"+date._d.getFullYear()
			};
			
			// mark me here

			// clear accom variable
				if (accom_event == true) {
					applied.dates = [];
					accom_event = false;
				}
			// end 
			
			var app = new application();		
			var found = app.find_in_dates( result['CHECKDATE'] );
			
				if (found == true) {
					c(this).removeAttr("style");
					//$(document).find("#applydiv").remove();
				} else if (found == false){
					$(this).css('background-color', 'rgb(60, 141, 188)');
					//$(document).find("#applydiv").remove();
					//$("<div>",{ id : "applydiv" }).appendTo($(this));
					//$("<p>",{ text : "Apply" , id : "applyleave"}).appendTo("#applydiv");
				}
				
				//console.log(applied.dates)	 background-color: rgb(60, 141, 188);

		},
		eventClick: function(event, jsevent, view) {
			// here 1
			//alert( event.url )
			bgcolor = event.backgroundColor;
			
			var the_grp_id = event.id,
				app 	   = new application();
				
				app.get_information(the_grp_id);
			
			
			// alert(the_grp_id);
			
			var seldate = event['start']._i;
			
			var d = new Date();
			
			var _day = ["00","01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","17","18","19",
						"20","21","22","23","24","25","26","27","28","29","30","31"];
			var month = months[d.getMonth()];
			var day   = _day[d.getDate()];
			var year  = d.getFullYear();
			
			// 2018-04-12
			
			if ( seldate >= year+"-"+month+"-"+day ) {
				c(document).find("#cancel_application").show();
				c(document).find("#resendform").show();
				previous = false;
			} else {
				if (bgcolor == "#a9a9a9" || bgcolor == "#ff6d54") { // waiting or // declined
					// "not approved
					c(document).find("#cancel_application").show();
					c(document).find("#resendform").show();
				} else if (bgcolor == "#56bf6c") { // approved
					// approved
					c(document).find("#cancel_application").hide();
					c(document).find("#resendform").hide();
				}
				previous = true;
			}
			
		}
	});
	
	c("#selectleavetype").on("change", function() {
		var val = c(this).val();
		var div = null;
		
		/*
		if (val === "CTO") {
			c(document).find("#sendapl").show();
			c(document).find("#attach_sig_submit").hide();
		} else {
			c(document).find("#sendapl").hide();
			c(document).find("#attach_sig_submit").show();
		}
		*/
		
		applied.selected = val;
		switch(val) {
			case "CTO":

				rem_coc   = c(document).find("#coc_clean_val").val().split(":");
				
				if (rem_coc[0] == "00" && rem_coc[1] == "00" && rem_coc[2] == "00") {
					rem_coc = 0;
				}
				
			//	console.log(rem_coc);
				/*
					0:"1"
					1:"21"
					2:"10"
				*/
				
				if (applied.dates.length >= 2 && rem_coc[0] >= 2) {
					c(document).find("#ctotable").hide();
					c(document).find("#ctofordays").show();
					
					c(document).find("#numofdays").text(applied.dates.length);
					//alert("Im sorry. The application of CTO for more than 2 days is not yet handled. Please apply separately.")
					//return;
				} else if (applied.dates.length >= 2 && rem_coc[0] < 2) { 
					alert("You only have "+rem_coc[0]+" remaining days. Please check your COC ledger.");
					return;
				} else {
					c(document).find("#ctotable").show();
					c(document).find("#ctofordays").hide();
				}
				
				var ret = app.checkdate( applied.dates );
				if (ret.proceed == false || ret.proceed == "false") {
					proceed_to_save = false;
					alert("Cannot apply CTO to this date.")
					return;
				}
				div = "#CTO_div";
				c(".signatories").fadeIn();
				break;
			case "OT":
				var ret = app.checkdate( applied.dates );
				
				if (applied.dates.length > 1) {
					alert("The application of OT is only allowed for 1 day. Apply separately.");
					return;
				}
				
				if (ret.proceed == false || ret.proceed == "false") {
					proceed_to_save = false;
					alert("Cannot apply OT to this date.")
					return;
				}
				
				div = "#OT_div";
				c(".signatories").fadeIn();
				break;
			case "PS":
				div = "#PS_div";
				
				if (applied.dates.length >=2) {
					alert("The application of Pass Slip is only allowed for 1 day. Apply separately.");
					return;
				}
				
				var ret = app.checkdate( applied.dates );
					
					if (ret == false) {
						return;
					}
					
					if (ret.proceed == false || ret.proceed == "false") {
						proceed_to_save = false;
						alert("Cannot apply pass slip at this date.")
						return;
					}
					
				c(document).find("#attach_sig_submit").text("Send Application");
				c(".signatories").fadeIn();
				break;
			case "PAF":
				div = "#PAF_div";
				
				if (applied.dates.length >=2) {
					alert("The application of PAF is only allowed for 1 day. Apply separately.");
					return;
				}
				
				var ret = app.checkdate( applied.dates );
				
					if (ret == false) {
						return;
					}
					
					if (ret.proceed == false || ret.proceed == "false") {
						proceed_to_save = false;
						alert("Cannot apply PAF at this date.")
						return;
					}
				c(document).find("#attach_sig_submit").text("Send Application");
				c(".signatories").fadeIn();
				break;
			case "OB":
				div = "#OB_div";
				c(document).find("#attach_sig_submit").text("Submit");
				c(".signatories").fadeOut();
				/*
				var ret = app.checkdate( applied.dates );
					
					if (ret.proceed == false || ret.proceed == "false") {
						proceed_to_save = false;
						alert("Cannot apply OB at this date.")
						return;
					}
				*/
				break;
			case "LEAVE":
				// mark slad
				div = "#LEAVE_div";
				/*
				var ret = app.checkdate( applied.dates , true );
					
					if (ret == false) {
						return;
					}
				
				
					if (ret.msg != null) {
						c(document).find("#PS_div").hide();
						c(document).find("#PAF_div").hide();
						c(document).find("#OB_div").hide();
						c(document).find("#LEAVE_div").hide();
						
						proceed_to_save = false;
						alert(ret.msg);
						return;
					}
				*/
				c(document).find("#attach_sig_submit").text("Send Application");
				c(".signatories").fadeIn();
				break;
			case "CTO_PAF":
				// mark slad
				div = "#PAF_div_coc";
				/*
				var ret = app.checkdate( applied.dates , true );
					
					if (ret == false) {
						return;
					}
				
				
					if (ret.msg != null) {
						c(document).find("#PS_div").hide();
						c(document).find("#PAF_div").hide();
						c(document).find("#OB_div").hide();
						c(document).find("#LEAVE_div").hide();
						
						proceed_to_save = false;
						alert(ret.msg);
						return;
					}
				*/
				c(document).find("#attach_sig_submit").text("Send Application");
				c(".signatories").fadeIn();
				break;
		}
			
		proceed_to_save = true;
		c(".filefor_content").children(".shown").hide().removeClass("shown");
		// c(".filefor_content").children(".shown").hide();

		c(div).fadeIn().addClass("shown");
		// c(div).fadeIn();
	})
	
	// special leave components 
	
		c("#pm,#po,#fo,#pt").on("click", function(){
			// hide sick leave 
				proceed_saving = null;
			// hide sick leave
			
			var ret = app.checkdate( applied.dates , true );

			if (ret.proceed == true || ret.proceed == "true") {
				c("#genericleave_name").text( c("#leaveselect :selected").text() );
				c(show).fadeIn();
			} else if (ret.proceed == false || ret.proceed == "false") {
				proceed_to_save = false;
				if (ret.msg == null) {
					alert("Other than sick leave, you are not allowed to apply for a leave prior from today.");
				} else {
					alert( ret.msg );
				}
				return;
			}
		})
		
	// end 
	
	// special leave component: calamity, accident, hospitalization leave
		$("#cahl, #de").on("click", function(){
			proceed_to_save = true;
		})
	// end 
	
	// slad1
	c("#leaveselect").on("change", function() {
		var val  = c(this).val();
		var show = null;
		
	/*
		var l_val = null;
		
		if (val != 1) {
			l_val = true;
		} else {
			l_val = "sl";
		}
	*/
				/*
		var ret = app.checkdate( applied.dates , l_val );
				
			if (ret == false) {
				c(document).find(".hallow_child").hide();
				return;
			}
				*/
		switch(val) {
			case "1":
				show = "#sickleave";
				//c(document).find(".small_width .modal-body").css({"background":"#8fb8d0"})
				jQuery(document).on("click","#halfdaysl",function(){
					if (ishalfday_sl == false){
						ishalfday_sl = true;
					} else {
						ishalfday_sl = false;
					}
					jQuery(document).find("#halfday_div").toggle();
				})
				// mark timetext
				jQuery(document).find(".timetext_").jqxDateTimeInput({ 
					width: '100%',
					formatString: 't',
					showTimeButton: true, 
					showCalendarButton: false
				});
				break;
			case "2":
				show = "#vacationleave";
				//c(document).find(".small_width .modal-body").css({"background":"#f3c3cb"})
				break;
			case "4":
				show = "#specialleave"; // mark 1
				//c(document).find(".small_width .modal-body").css({"background":"#f3c3cb"})
				var remaining_spl = null;
				performajax(['Dashboard/remaining_spl',{empid:"empty"}], function(data) {
					remaining_spl = data.count;
					
					c(document).find("#rem_spl").html(remaining_spl + " remaining SPL for this year");
					if (remaining_spl == 0) {
						c(document).find("#attach_sig_submit").hide();
					}
				})
				break;
			default:
				show = "#genericleave";
				//c(document).find(".small_width .modal-body").css({"background":"#f3c3cb"})
				break;
		}

		if ( val != 1 && val != 4 ) {
			// hide sick leave 
				c("#sickleave").hide();
				proceed_saving = null;
			// hide sick leave
			
			var ret = app.checkdate( applied.dates , true );

			if (ret.proceed == true || ret.proceed == "true") {
				c("#leave_id_table").children(".hallow_child").hide();
				c("#genericleave_name").text( c("#leaveselect :selected").text() );
				c(show).fadeIn();
			} else if (ret.proceed == false || ret.proceed == "false") {
				proceed_to_save = false;
				if (ret.msg == null) {
					alert("Other than sick leave, you are not allowed to apply for a leave prior from today.");
				} else {
					alert( ret.msg );
				}
				return;
			}
			
		} else {
			c("#leave_id_table").children(".hallow_child").hide();
			c("#genericleave_name").text( c("#leaveselect :selected").text() );
			c(show).fadeIn();
		}
		
		proceed_to_save = true;
	})
	
	c("#attach_sig_submit").on("click", function() {
			applied._for = c(document).find("#selectleavetype").val();
			
			if (proceed_to_save == false) {
				alert("Cannot proceed");
				return;
			}
			
			var ot = false;
			if (applied._for == "OT") {
				ot = true;
			}
			
				if (applied._for == "LEAVE") { // for LEAVE
					applied.leave_type 	   = c(document).find("#leaveselect").val(); 
					
					if (applied.leave_type == 2) { // vacation 
						applied.leave_specific = c(document).find("#vl_spec_val").val();
						applied.specify 	   = c(document).find("#vl_specific").val();
					} else if (applied.leave_type == 1) { // sick
						applied.leave_specific = sl_specific;
						applied.specify 	   = c(document).find("#sick_leave_spec").val();
						
					} else if (applied.leave_type == 4) { // SPL
						applied.leave_specific = 0;
						applied.specify 	   = spl_specific;
					} else {
						applied.leave_specific = 0;
						applied.specify 	   = c(document).find("#generic_spec_txt").val();
					}
				} else if ( applied._for == "PS" ) { // PS 
					// ps_reason
					applied.leave_type 	   = c(document).find("#ps_type").val(); 
					applied.leave_specific = 0;
					applied.specify 	   = c(document).find("#ps_reason").val();
				} else if ( applied._for == "OB" ) { // OB 
					applied.leave_type 	   = 0; 
					applied.leave_specific = c(document).find("#ob_type :selected").val();
					applied.specify 	   = c(document).find("#ob_reason").val();
				} else if ( applied._for == "PAF" ) { // PAF 
					applied.leave_type 	   = 0; 
					applied.leave_specific = c(document).find("#paf_remarks").val();
					applied.specify 	   = c(document).find("#paf_reason_just").val();
					
					var paf_time_select    = c(document).find("#paf_time").val();
					
					applied.timein  	   = null;	//c('#paf_timein').val();
					applied.timeout 	   = null;	//c('#paf_timeout').val();
					
					if (paf_time_select == "morning") {
						applied.timein	   = "08:00 AM";
						applied.timeout	   = "12:00 PM";
						applied.halfwhole  = "half";
					} else if (paf_time_select == "wholeday") {
						applied.timein	   = "08:00 AM";
						applied.timeout	   = "05:00 PM";
						applied.halfwhole  = "whole";
					}
					
				} else if ( applied._for == "OT" ) {
					// mark here
					applied.typemode      = "OT";
					applied.tasktobedone  = c(document).find("#task_to_be_done").val();
					applied.timein 		  = c(document).find("#ot_timein").val();
					applied.timeout 	  = c(document).find("#ot_timeout").val();
					applied.tasktype 	  = c(document).find("#task_type").val();
					applied.remarks_ot 	  = c(document).find("#remarks_ot").val();
					
						if (applied.tasktype == 1) {
							applied.reason_rw = c(document).find("#reason_rw").val();
						}
					
				} else if ( applied._for == "CTO" ) { // mark CTO
					// =========
						/*
							if remaining coc is equual to zero
							or the remaining coc is less than the applied cto
						*/
					// =========
					
					applied.cto_remarks = c(document).find("#cto_remarks").val();
					// applied.timein      = c(document).find("#cto_start").val();
					// applied.timeout     = c(document).find("#cto_end").val();
					applied.timein      = "0:00";
					applied.timeout     = "0:00";
					applied.hours 		= c(document).find("#numofhrs").val();
					
					if (applied.hours === null || applied.hours === NULL || undefined === applied.hours) {
						alert("Please specify the number of hours"); return;
					}
				/*
					applied.cto_remarks = c(document).find("#cto_remarks").val();
					applied.timein      = c(document).find("#cto_start").val();
					applied.timeout     = c(document).find("#cto_end").val();
					
					// remaining hours 
					if (rem_coc == 0) {
						alert("You have 0 remaining CTO. You cannot proceed."); return;
					}
					
					if (rem_coc[2] == 0) { 
						var rem_hours = rem_coc[1];
							
						var t1 		= applied.timein.split(":"),
							t1_hour = t1[0],
							t1_mins = t1[1].split(" ")[0],
							t1_ampm = t1[1].split(" ")[1];
							
						var t2  	= applied.timeout.split(":"),
							t2_hour	= t2[0],
							t2_mins = t2[1].split(" ")[0],
							t2_ampm = t2[1].split(" ")[1];
						
						var noon_in_hour = null,
							noon_in_mins = null;
							
						var noon_out_hour = null,
							noon_out_mins = null;
						
						var final_t1   = null,
							final_t2   = null,
							final_mins = null;
						
						
						var total_time = null;
							if( t2_ampm == "PM" ) { // if the end of coc is PM
								// noon out 
								noon_out_hour = "12";
								noon_out_mins = "00";
								
								// noon in 
								noon_in_hour  = "1";
								noon_in_mins  = "00";
								
								var a = (12 - t1_hour);
								var b = (t2_hour - 1);
								
									final_t1 = (a*60*60); // t1 morning hour in seconds
									final_t2 = (b*60*60); // t2 afternoon hour in seconds

								var a_mins     = (t1_mins*60)+(0*60); // morning minutes converted into seconds
								var b_mins     = (t2_mins*0)+(t2_mins*60); // afternoon minutes converted into seconds 
									final_mins = a_mins + b_mins; // total minutes converted into seconds		
							} else if ( t2_ampm == "AM" ) { // if the end of COC is AM
								var amhour   = t2_hour - t1_hour;
								//final_t1	 = (t1_hour*60*60)+(t2_hour*60*60);
								final_t1	 = amhour*60*60;
								final_t2     = 0;
								final_mins   = (t1_mins*60)+(t2_mins*60);
							} else if ( t1_ampm == "PM" ) { // if the start of coc is PM
								final_t1   = 0;
								//final_t2   = (t1_hour*60*60)+(t2_hour*60*60);
								var pmhour = t2_hour - t1_hour;
								final_t2   = (pmhour*60*60);
								final_mins = (t1_mins*60)+(t2_mins*60);
							}
		
							total_time = (final_t1+final_t2+final_mins);
							
							if ((total_time) > (rem_hours*60*60)){
								//alert("The total number of hours you are applying is greater than your remaining COC.");
								//return;
							} else {
								// console.log("remaining: "+ ((rem_hours*60*60) - total_time));
								// balance left after being deducted by the applied COC
									// ((rem_hours*60*60) - total_time)
								// return;
							}
							
					} else {
						// days is not equal to zero.
					}
					*/
					
				}
			
			// the signatories
				// division 
					applied.division_chief_email = c(document).find("#division_chief_email").val();
					applied.division_chief_id 	 = c(document).find("#division_chief_id").val();
				// end division
				
				// last approving official 
					applied.dbm_chief_email 	 = c(document).find("#dbm_chief_email").val();
					applied.dbm_chief_id 	     = c(document).find("#dbm_chief_id").val();
				// end last approving official 
			// end signatories
			
		//	console.log(applied);
			
		//	applied.specify = escape(applied.specify);
			
			if (!ot) {
				var conf = confirm("Please make sure that all important data is provided. click ok to Proceed.");
				
				if (conf) {
					//alert("hi")
					// console.log(applied); return;
					performajax(["Leave/saveapplication",{ details : applied }], function(data) {	
						if (data.result == true) {
							var grpid = data.grp_id;
							var empid = data.empid;
								// console.log(grpid); return;
								performajax(["Dashboard/recordrem",{ grpid_ : grpid , empid_ : empid }], function(remret) {
									var sent = app.sendemail(grpid,empid, "false");
								})
						}
					})
				}
			} else {
				//var conf
				//console.log(applied); return;
				performajax(['Leave/fileot',{ details : applied }], function(data){
					
					if (data.exactot != null) {
						// send email OT
						var exactot = data.exactot;
						var empid = data.empid;
							
							performajax(["Dashboard/recordrem",{ grpid_ : exactot , empid_ : empid }], function(remret) {
								var sent = app.sendemail(exactot, empid, "OT");
							})
						
						if (sent) {
							app.get_applied_dates();
						}
						
					}
				})
			}
		
		
	})
	
	// update :: not in used
		c(document).on("click","#attach_sig_update", function() {
			
			applied._for = c(document).find("#selectleavetype").val();
			
				if (applied._for == "LEAVE") { // for LEAVE
					applied.leave_type 	   = c(document).find("#leaveselect").val(); 
					
					if (applied.leave_type == 2) { // vacation 
						applied.leave_specific = c(document).find("#vl_spec_val").val();
						applied.specify 	   = c(document).find("#vl_specific").val();
					} else if (applied.leave_type == 1) { // sick
						applied.leave_specific = sl_specific;
						applied.specify 	   = c(document).find("#sick_leave_spec").val();
					} else if (applied.leave_type == 4) { // SPL
						applied.leave_specific = 0;
						applied.specify 	   = spl_specific;
					} else {
						applied.leave_specific = 0;
						applied.specify 	   = c(document).find("#generic_spec_txt").val();
					}
				} else if ( applied._for == "PS" ) { // PS 
					// ps_reason
					applied.leave_type 	   = c(document).find("#ps_type").val(); 
					applied.leave_specific = 0;
					applied.specify 	   = c(document).find("#ps_reason").val();
				} else if ( applied._for == "OB" ) { // OB 
					applied.leave_type 	   = 0; 
					applied.leave_specific = c(document).find("#ob_type :selected").val();
					applied.specify 	   = c(document).find("#ob_reason").val();
				} else if ( applied._for == "PAF" ) { // PAF 
					applied.leave_type 	   = 0; 
					applied.leave_specific = c(document).find("#paf_remarks").val();
					applied.specify 	   = c(document).find("#paf_reason_just").val();
					
					var paf_time_select    = c(document).find("#paf_time").val();
					
					applied.timein  	   = null;	//c('#paf_timein').val();
					applied.timeout 	   = null;	//c('#paf_timeout').val();
					
					if (paf_time_select == "morning") {
						applied.timein	   = "08:00 AM";
						applied.timeout	   = "12:00 PM";
					} else if (paf_time_select == "wholeday") {
						applied.timein	   = "08:00 AM";
						applied.timeout	   = "05:00 PM";
					}
					
				}
				
				// the signatories
					// division 
						applied.division_chief_email = c(document).find("#division_chief_email").val();
						applied.division_chief_id 	 = c(document).find("#division_chief_id").val();
					// end division
					
					// last approving official 
						applied.dbm_chief_email 	 = c(document).find("#dbm_chief_email").val();
						applied.dbm_chief_id 	     = c(document).find("#dbm_chief_id").val();
					// end last approving official 
				// end signatories
							
				performajax(["Leave/update_the_leave",{ updates:applied }], function(ret) {
					console.log(ret);
				})
				
		})
	// end update :: not is used
	
	// view button click event
		c(document).on("click", "#viewform" ,function() {
			var grpid = applied.grp_id;
			
			if (grpid == null) {
				alert( "group id is set to null." )
				return;
			}
			
			app.__show_form_of(grpid);
			// if leave
			//	window.location.href = "http://office.minda.gov.ph:9003/view/form/"+grpid;
			// end 
			
			// if 
		})
	// end view button click event
	
	// request for recall button 
		c(document).on("click","#reqrecall",function(){
			alert("this facility is still on development stage");
			
			
		})
	// end requesting recall
	
	c(document).on("click","#show_div_sign", function() {
		c(document).find("#division_sign").fadeIn();
	})
	
	c(document).on("click","#show_last_sign", function() {
		c(document).find("#last_div_sign").fadeIn();
	})
	
	c("#modal_exceptions").on("click", function(e) {
		if (e.target.id == "modal_exceptions") {
			var div = ["#PS_div","#PAF_div","#OB_div","#LEAVE_div"];
			for (var i = 0; i <= div.length-1; i++) {
				c(document).find(div[i]).hide();
			}
		}
	})
	
	c("#application_cancel").on("click", function() {
		$('#modal_exceptions').modal('hide');
		
		var div = ["#PS_div","#PAF_div","#OB_div","#LEAVE_div"];
		for (var i = 0; i <= div.length-1; i++) {
			c(document).find(div[i]).hide();
		}
	})
	
	c(".vl_specs").on("click",function() {
		c(document).find("#vl_spec_val").val( c(this).val() )
	})
	
	c(document).on("click",".spl_radio", function(){
		spl_specific = c(this).val();
	})
	
	c(document).on("click", ".sick_leave_spec", function() {
		sl_specific = c(this).val();
	})
	
	c(document).on("click",".task_type_radio", function() {
		var task_type_val = c(this).val();
		
		if (task_type_val == 1) {
			c(document).find("#reason_rw_tbody").show();
		} else {
			c(document).find("#reason_rw_tbody").hide();
		}
		
		c(document).find("#task_type").val( task_type_val );
	})
	
	// PS 
		/*
	 c("#ps_time_out").jqxDateTimeInput({ 
			formatString: 't', 
			showTimeButton: true, 
			showCalendarButton: false
		});
		
	 c("#ps_time_in").jqxDateTimeInput({ 
			formatString: 't', 
			showTimeButton: true, 
			showCalendarButton: false
		});
		*/
	// end PS
	
	// OT
	 c("#ot_timeout").jqxDateTimeInput({
			formatString: 't', 
			showTimeButton: true, 
			showCalendarButton: false
		});
		
	 c("#ot_timein").jqxDateTimeInput({ 
			formatString: 't', 
			showTimeButton: true, 
			showCalendarButton: false
		});		
	// end OT
	
	/*
	// for time 
		c(".timetxtbox").jqxDateTimeInput({
			formatString: 't', 
			showTimeButton: true, 
			showCalendarButton: false
		})
	// end for time 
	
	// CTO
	 c("#cto_end").jqxDateTimeInput({
			formatString: 't', 
			showTimeButton: true, 
			showCalendarButton: false
		});
		
	 c("#cto_start").jqxDateTimeInput({ 
			formatString: 't', 
			//formatString: 'hh:mm tt', 
			showTimeButton: true, 
			showCalendarButton: false
		});
	
	// end CTO
	*/
	
	// PAF
	c("#paf_timeout").jqxDateTimeInput({
			width: '100%',
			formatString: 't', 
			showTimeButton: true, 
			showCalendarButton: false
		});
		
	 c("#paf_timein").jqxDateTimeInput({ 
			width: '100%',
			formatString: 't',
			showTimeButton: true, 
			showCalendarButton: false
		});
	// end PAF
	
	// ot time
	c(".ottime_txt").jqxDateTimeInput({ 
			width: '100%',
			formatString: 't',
			showTimeButton: true, 
			showCalendarButton: false
		});
	// end 
	
	// upload window 
		c(document).on("click","#open_hris_upload_window",function() {
			open_hris_upload_window();
		})
	// end upload window 
	
	// signatories 
		// division 
			c(document).on("change","#division_signatory", function() {
				var emp_email = c("#division_signatory option:selected").data('div_email') ;
					emp_email = emp_email.trim();
					
				var div_name  = c("#division_signatory option:selected").text();
				
				if (emp_email.length == 0) {
					alert("The employee does not have a valid email address");
					return;
				}
				
				c(document).find("#div_name").text( div_name );
				c(document).find("#div_email").text( emp_email )
				
				c(document).find('#division_chief_id').val( c(this).val() )
				c(document).find('#division_chief_email').val( emp_email )
			})
		// end division 
		
		// last approving 
			c(document).on("change","#dbm_signatory", function() {
				var lap = c("#dbm_signatory option:selected").data('dbm_other_email');
					lap = lap.trim();
				
				var name = c("#dbm_signatory option:selected").text();
					
				if ( lap.length == 0) {
					alert("The employee does not have a valid email address");
					return;
				}
				
				c(document).find("#dbm_name").text( name );
				c(document).find("#dbm_email").text( lap )
				
				c(document).find('#dbm_chief_id').val( c(this).val() )
				c(document).find('#dbm_chief_email').val( lap )
			})
		// end last approving
	// end signatories 
	
	// cancel leave
		c(document).on("click","#cancel_application",function() {
			var grp_id = applied.grp_id;
			
			var conf = confirm("Are you sure you want to cancel your application?");
			
			if (conf) {
				app.cancel_leave(grp_id);
			}
		})
	// end cancel leave
	
	
	var isam_otacc = false;
	var ispm_otacc = false;
	// submit OT accomplishment report 
		c(document).on("click","#submit_ot_accom", function(){
			var ot_accom_obj 			 = new Object();
				ot_accom_obj.grp_id 	 = applied.grp_id;
				
				if (isam_otacc == true) {
					ot_accom_obj.am_timein   = c(document).find("#am_timein").val();
					ot_accom_obj.am_timeout  = c(document).find("#am_timeout").val();
				} else {
					ot_accom_obj.am_timein = ot_accom_obj.am_timeout = null;
				}
				
				if (ispm_otacc == true) {
					ot_accom_obj.pm_timein   = c(document).find("#pm_timein").val();
					ot_accom_obj.pm_timeout  = c(document).find("#pm_timeout").val();
				} else {
					ot_accom_obj.pm_timein = ot_accom_obj.pm_timeout = null;
				}
				
			if (isam_otacc == false && ispm_otacc == false) {
				alert("Please input time.")
				return;
			}
				
				// or use escape
				ot_accom_obj.acc_report  = escape( c(document).find("#accom_report").val() );
			
			if (ot_accom_obj.acc_report.length == 0) {
				alert("Please add accomplishment report");
				return;
			}
			
			var conf = confirm("Are you sure you want to proceed?");
			
			if (conf) {
				c(document).find("#report_status").html("<span style='color:red;'> Please wait while we are preparing your report... </span>");
				performajax(["My/save_ot_accom",{ ssave : ot_accom_obj }], function(data) {
					if (data) {
						c(document).find("#report_status").html("<span style='color:green;'> Your accomplishment report has been submitted. </span>");
					} else {
						alert("Your OT application is not approved yet.");
					}
				})
			}
		})
	// end 
	
	// isam checkbox 
		c(document).on("click","#isam_lbl", function() {
			if (isam_otacc == false) {
				isam_otacc = true;
				c(document).find("#morningtime").show();
			} else {
				isam_otacc = false;
				c(document).find("#morningtime").hide();
			}
		})
	// end 
	
	// ispm checkbox 
		c(document).on("click","#ispm_lbl", function() {
			if (ispm_otacc == false) {
				ispm_otacc = true;
				c(document).find("#afternoontime").show();
			} else {
				ispm_otacc = false;
				c(document).find("#afternoontime").hide();
			}
		})
	// end 	
	
	// accom report editor 
	jQuery(document).find("#accom_report").jqxEditor({ height: "400px", width: '100%', theme: 'arctic' });
	// end 
	
	// change password 
		c(document).on("click","#changepassword", function(){
			// newpassword
			// confpassword
			var newpass  = c(document).find("#newpassword").val(),
				confpass = c(document).find("#confpassword").val();
				
			if (newpass != confpass) {
				alert("Cannot Proceed. Passwords do not match.");
				return;
			}
			
			if (newpass.length == 0 || confpass.length == 0) {
				alert("Please fill up all the fields.");
				return;
			}
			
			var conf = confirm("Are you sure you want to proceed?");
			
			if (conf) {
				performajax(["My/changepass",{ pw : confpass }], function(data){
					if (data==true){
						alert("Password has been changed.");
						window.location.reload();
					}
 				})
			}
			
		})
		
		c(document).on("click","#imokwithmypass", function(){
			var conf = confirm("Are you sure you want to proceed?");
			
			if (conf) {
				performajax(["My/imokay",{ ok : true }],function(data) {
					if (data) {
						alert("Update successful. To change your password go to PROFILE > SETTINGS, then provide your old password and supply it with a new one, then hit 'CHANGE PASSWORD'");
						window.location.reload();
					}
				})
			}
		})
	// end change password 
	
	// close window 
		c(document).on("click","#closechangepass",function(){
			var conf = confirm("Cliking OK will only temporarily hide this window. To permanently hide this it, click 'IM OKAY WITH MY PASSWORD'");
			
			if (conf) {
				c(document).find(".isfirsttime").fadeOut(function(){
					c(document).find(".isfirsttime").remove();	
				})
			}
		
		})
	// end 
	
	// resend email 
		c(document).on("click","#resendform",function() {
			var conf = confirm("Are you sure you want to resend?");
			
			if (conf) {
				//var app = new application();
				// alert(applied.grp_id +":"+ theempid +":"+thekindofleave);
				
				var linker = false;
				if (thekindofleave == "OT") {
					linker = "OT";
				}
				app.sendemail(applied.grp_id, theempid, linker);
					
			}
			
			// data.grp_id, data.empid, "false"
			// OT for OT 
			// false for not OT
		})
		// sendemail = function(grp_id, emp_id, typemode)
	// resend email 
})

function application() {
	this.__reset = function() {
		applied._for 		   = null;
		applied.leave_type 	   = null; 
		applied.leave_specific = null; 
		applied.specify 	   = null;
	}
	
	this._removedates = function() {
		applied.dates = [];
		 
		$(document).find("#calendar table tr td div table tr td").removeAttr("style");
	}
	
	this.__displayTocalendar = function(exact_id) {

					var newEvent = new Object();
						newEvent.title = "newly";
						newEvent.start = "2017-10-25";
                    $('#calendar').fullCalendar('renderEvent', newEvent);

		for (var i = 0; i <= tds_filled.length-1; i++) {
			c(tds_filled[i]).css("background-color","rgb(133, 239, 224)"); //.attr("data-exact_id",exact_id);
		}
	}
	
	this.find_in_dates = function(date_val) {
			// applied.dates;
		
		/*
		var d = new Date(date_val);
			d.adlaw = d.getDay();
			// 0 and 6 = sunday and saturday
	
		if (d.adlaw == 0 || d.adlaw == 6) {
			alert("Weekends are not allowed");
			return null;
		}
		*/
		
		for(var i = 0; i <= applied.dates.length-1; i++) {
			var date_str = applied.dates[i];
			var index    = date_str.indexOf(date_val);
			if (index != -1) {
				//alert(index);
				applied.dates.splice(i,1);
				return true;
			}
		}
		applied.dates.push( date_val );
		return false;
	}
	
	this.display_the_accom = function(m,d,y) {
		// not working yet
		var accom 		= new Object();
						
		var d = new Date(data[i].date);
							
		var month  = m;
		var day    = d;
		var year   = y;
							
		// 05/15/2018
		var date__ = months[month] + "/" + day + "/" + year;
						
		accom.id 	= "ar:"+date__;
		accom.start = data[i].date;
		accom.title = "accomplishment added";
						    						
		c('#calendar').fullCalendar( 'renderEvent', accom, true );
	}
	
	this.get_applied_dates = function() {

		c(document).find("#statustext").hide();
		c("#loadingitems").show();
		
		c("#calendar").fullCalendar("removeEvents");
		
		
		performajax(["Leave/get_applied_leaves", { empid:50 }], function(leaves) {
			// console.log(leaves);
			
			for(var i = 0; i <= leaves.length-1; i++) {
				var event_det = new Object();
				
				var spect = "";

					if (leaves[i].type_mode == "LEAVE"){
						spect = leaves[i].leave_name;
					} else if (leaves[i].type_mode == "OB") {
						spect = leaves[i].type_mode_details;
					}
			
				/*
				event_det.backgroundColor = "#56bf6c";
				event_det.color			  = "#0a271c";
				event_det.borderColor	  = "#37a98e";
				*/	
				
				var status = null;

				if (leaves[i].is_approved == 0) {
					event_det.backgroundColor = "#a9a9a9";
					event_det.borderColor	  = "#827f7f";
					status 					  = "(waiting for approval)";
				} else if (leaves[i].is_approved == 1) {
					event_det.backgroundColor = "#56bf6c";
					event_det.color			  = "#0a271c";
					event_det.borderColor	  = "#37a98e";
					
					status 					  = "(Approved)";
				} else if (leaves[i].is_approved == 2) {
					event_det.backgroundColor = "#ff6d54";
					event_det.borderColor	  = "#ff5454";
					
					status 					  = "(Declined)";
				}
				
				event_det.title = leaves[i].type_mode + ": " + spect + status;
				
				var d = new Date(leaves[i].checkdate);
				//console.log(d);
					var month = d.getMonth();
					var day   = d.getDate();
					var year  = d.getFullYear();
					
					if (day <= 9){
						day = "0"+day;
					}
				// mark event
				event_det.start = year + "-" + months[month] + "-" + day;
				event_det.id    = leaves[i].grp_id;
				
				theempid	    = leaves[i].employee_id; // employee id
				// here 1
				// event_det.url = leaves[i].employee_id; // employee id
				//console.log(event_det);	
				//	event_det.start = "2017-11-01";
				
				var samp = new Object();
					samp.title 			 = "sample sample sample";
					samp.start			 = "2018-04-01";
					samp.end 			 = "2018-04-05";
				
				 c('#calendar').fullCalendar( 'renderEvent', event_det, true );
				 //c('#calendar').fullCalendar( 'renderEvent', samp, true );
				
			}
			
			performajax(["Leave/getaccom_reps",{ empid : 389 }], function(data){
				
				for (var i = 0 ; i < data.length; i++) {
					
					var accom 		= new Object();
						
						var d = new Date(data[i].date);
							
						var month  = d.getMonth();
						var day    = d.getDate();
						var year   = d.getFullYear();
							
						// 05/15/2018
						var date__ = months[month] + "/" + day + "/" + year;
						
						accom.id 	= "ar:"+date__;
						accom.start = data[i].date;
						accom.title = "accomplishment added";
						    						
						 c('#calendar').fullCalendar( 'renderEvent', accom, true );
				}
				c("#loadingitems").animate({
					"top":"-100px"
				},1000, function(){
					c("#loadingitems").css({"top":"0px"}).hide();
				})
			})
			
		})
		
		performajax(['Leave/get_applied_ot',{ empid : 368 }], function(data){
			
			//console.log(data);
			//console.log(data[0].ot_task_done);
			
			for (var i = 0 ; i <= data.length-1; i++) {
				var ot_det = new Object();
					
					// default
						ot_det.backgroundColor = "#a9a9a9";
						ot_det.borderColor	  = "#827f7f";
					// default 
					
					// when division chief is approved
						if(data[i].div_is_approved == 1) {
							ot_det.backgroundColor = "#f96a71";
							ot_det.borderColor	  = "#f55c63";
						}
					// end div chief
						
					// when last approving official is approved
						if(data[i].act_div_is_approved == 1) {
							ot_det.backgroundColor = "#56bf6c";
							ot_det.borderColor	  = "#37a98e";
						}
					// end last approving official 
					
					ot_det.start = data[i].ot_checkdate;
					ot_det.title = "OT: "+data[i].ot_task_done;
					ot_det.id    = data[i].checkexact_ot_id;
					
					c("#calendar").fullCalendar("renderEvent", ot_det, true);
			}
		})
		
	}
	
	this.sendemail = function(grp_id, emp_id, typemode) {
		// text_status 
		// red:  ff8686
		// gree: 3fc037
				
		c(document).find("#statustext").show().html("<p class='text_status' style='background:#ff8686;'> <i class='fa fa-spinner fa-spin' style='font-size:24px'></i> Processing Request. </p> ");
		c(document).find("#attach_sig_submit").hide();
		
		performajax(["Attendance/send_email",{ grpid:grp_id , empid:emp_id, type_mode:typemode }], function(ret) {
			// console.log(ret);
			
			c(document).find("#statustext").html("<p class='text_status' style='background:#3fc037;'> <i class='fa fa-check' aria-hidden='true' style='font-size:24px;'></i> Application Successful </p> ");
			setTimeout(function() {
				window.location.reload();
				
				var app = new application();
					app.get_applied_dates();
					
				c('#modal_exceptions').modal('hide');
			}, 2000)
			
		})
	}
	
	// mark fchkdt
	this.checkdate = function( dates , isleave) { // = []  = false
		
		var ret 		= new Object();
			ret.msg 	= null;
			ret.proceed = true;
		
		for(var i=0;i<=dates.length-1;i++){
			var d = new Date(dates[i]);
			var month = d.getMonth();
			var day   = d.getDate();
			var year  = d.getFullYear();
			var adlaw = d.getDay();
			
			var today = new Date();
			var t_month = today.getMonth();
			var t_day   = today.getDate();
			var t_year  = today.getFullYear();
	
			if (adlaw == 0 || adlaw == 6) {
				// mark adlaw
				if (applied.selected != "OB") {
					if (applied.selected != "OT") {
						alert("Only Official Business (OB) and Overtime (OT) are allowed to be applied during weekends.");
						jQuery(document).find("#CTO_div,#OT_div,#OB_div,#PS_div,#PAF_div,#LEAVE_div").hide();
						return;
					}
					
				}
			}
			
		//	console.log("this year: "+year);
		//	console.log("target year: "+t_year);
			
			if (year >= t_year) {
				if ( months[month] >= months[t_month] ) {
					if (day < t_day && months[month] == months[t_month]) {
						ret.proceed = false;
					}
				} else if ( /* months[month] <= months[t_month] && */ year >= t_year ) {
					ret.proceed = true;
			    } else {
					ret.proceed = false;
				}
			} else {
				console.log("Here 2");
				ret.proceed = false;
			}
			
			if (isleave == true) {
				if ( day >= t_day ) {
					if ( (parseInt(day)-parseInt(t_day)) <= 5 && t_month >= month && t_year >= year ) {
						ret.proceed = false;
						ret.msg = "You are only allowed to file a leave 5 days from today.";
					}
				}	
			}
		}
		
		return ret;
	}
	
	this.get_information = function(grp_id) {
		applied.grp_id = grp_id;
		
	//	alert(grp_id); return;
		
		if (grp_id == null) {
			alert("This is a DTR attachment. View it on the DTR.")
			return;
		}
		
		var coder = null; 
		
		try {
			coder = grp_id.split(":")[0];
		} catch(err) {
			coder = grp_id;
		}
	//	alert(coder);
		if (coder == "ar") {
			
			applied.dates = [];
			
			c("#calendar").find("table tbody tr td").removeAttr("style");
			
			var app = new application();
				app.find_in_dates(grp_id.split(":")[1]);
				
			if (applied.dates.length == 0) {
				alert("Please select date(s)");
				return;
			}
			
			c("#addaccom_modal").modal("show")
			c(document).find("#addaccom_status").hide();
			
			// footer details 
				c(document).find(".footerspan").remove();
				c(document).find("#footerdivid").remove();
			// end 
			
			c("#dates_accom").children().remove();
			
			for(var i=0;i<=applied.dates.length-1;i++) {
				c("<span>",{text: "["+applied.dates[i]+"]"}).appendTo("#dates_accom");
				if (i < applied.dates.length-1) {
					c("<span>",{text:" - "}).appendTo("#dates_accom");
				}
			}
			// dates_accom
			
				app.__showupdate_window();
			
			accom_event = true;
			return;
		}
		
		c(document).find("#cancel_application").show();
		c(document).find("#resendform ").show();
		c(document).find("#viewform").show();
		c(document).find(".filefor_div").hide();
		// c(document).find(".filefor_content").hide();
		c(document).find("#notification_cancel").show();
		c(document).find(".signatories").hide();
		
		performajax(["Leave/kindofleave",{ grpid : grp_id }], function(data) {
			thekindofleave = data[0];
			
			if (data[2] == 0) {
				$(document).find("#resendform").hide();
			}
		
			switch(data[0]) {
				case "PS":
				case "PAF":
				case "LEAVE":
				case "CTO":
				case "OB":
					//$(document).find(".ot_accom_divbox").hide();
					//alert('hi')
					$(document).find("#ot_accom_added").hide();
					$(document).find(".ot_accom_divbox").hide();
					break;
				case "OT":
					// mark OT
					performajax(["My/getot_accom",{ otaccom : grp_id }], function(data) {
						$(document).find("#ot_accom_added").children().remove();
						if (data.length == 0) {
							$(document).find(".ot_accom_divbox").show();
						} else if (data.length >= 1) {
							$(document).find(".ot_accom_divbox").hide();
							
							// ot_accom_added
							$("<table>",{ id : "ot_accom_tbl"}).appendTo("#ot_accom_added");
							
							$("<tr>",{ id : "tbl_header" }).appendTo("#ot_accom_tbl");
								$("<td colspan='3' style='font-weight:bold;'> Submitted Accomplishment Report </td>").appendTo("#tbl_header");
							
							$("<tr>",{ id : "tbl_header_1" }).appendTo("#ot_accom_tbl");
								$("<td style='font-weight:bold;'> Date of Submission </td>").appendTo("#tbl_header_1");
								$("<td style='font-weight:bold;'> Status </td>").appendTo("#tbl_header_1");
								$("<td style='font-weight:bold;'> Action </td>").appendTo("#tbl_header_1");
								
							for(var i = 0 ; i <= data.length-1; i++) {
								$("<tr>",{ id : "tr"+i }).appendTo("#ot_accom_tbl");
									$("<td> "+data[i]['date_added']+" </td>").appendTo("#tr"+i);
									
									var approvalstatus = null;
									if (data[i]['approval_status'] == 0) {
										approvalstatus = "<p style='color:gray;'> Submitted for Approval </p> ";
									} else if (data[i]['approval_status'] == 1) {
										approvalstatus = "<p style='color:bluegreen;'> Approved by Recommending approver </p>";
									} else if (data[i]['approval_status'] == 2) {
										approvalstatus = "<p style='color:green;'> Approved </p>";
									}
									
									$("<td> "+approvalstatus+" </td>").appendTo("#tr"+i);
									$("<td>",{ id : "action_"+i }).appendTo("#tr"+i);
										
										if (previous == false) {
											$("<button data-accom_id = '"+data[i]['ot_accid']+"' class='btn btn-default btn-xs moveright deleteclass'> <i class='fa fa-bomb'></i> delete </button>").appendTo("#action_"+i).on("click",function(){
												var conf = confirm("Are you sure you want to delete this accomplishment Report?");
												
												if (conf) {
													performajax(["My/delete_accom",{ ot_accid : $(this).data("accom_id") }], function(data){
														if (data) {
															// $(document).find("#tr"+i).remove();
															$(this).find("tr").fadeOut().remove();
														}
													})
												}
											});
										}
										
										$("<button data-exact_ot_id = '"+data[i]['ot_exact_id']+"' class='btn btn-default btn-xs moveright'> <i class='fab fa-audible'></i> view </button>").appendTo("#action_"+i).on("click",function(){
											// http://office.minda.gov.ph:9003/my/ot/accomplishment/1114
											window.location.href = link+"/my/ot/accomplishment/"+$(this).data("exact_ot_id");
										});
										
										if (data[i]['approval_status'] < 2){
											$("<button data-exact_ot_id = '"+data[i]['ot_exact_id']+"' class='btn btn-default btn-xs moveright'> re-send </button>")
												.appendTo("#action_"+i).on("click",function(){
												// http://office.minda.gov.ph:9003/my/ot/accomplishment/1114
												// mark OT accom
												$(document).find("#statustext").html("<p style='background: #ff6161; margin: 0px; color: #fff;'> Please wait... </p>").show();
												
												var otexact_ = $(this).data("exact_ot_id");
												performajax(["My/resendot",{ otexact : otexact_ }], function (data){
													if (data) {
														$(document).find("#statustext").hide();
														alert("OT accomplishment report has been sent");
														$("#modal_exceptions").modal("hide");
													}
												})
											});
										}
										
							}
							
							// $("<button> Add New </button>").appendTo("#ot_accom_added");
							$(document).find("#ot_accom_added").show();
						}
					})
					
					break;

			}
		})
		
		/*
		performajax(["Leave/get_leave",{ group_id : grp_id }], function(ret) {
			console.log(ret);
			c(document).find("#date_select").html("<strong> Applied Date(s): </strong>");
			
			for(var a = 0; a <= ret['data'].length-1; a++) {
				c(document).find("#date_select").append("["+ret['data'][a].checkdate+"]");
				c(document).find("#date_select").append(" - ");
						
		//	c(document).find("#selectleavetype").val(ret['data'][a].type_mode).attr("disabled","disabled");
			c(document).find(".filefor_div").hide();
				switch( ret['data'][a].type_mode ) {
					case "PAF":
						c(document).find("#PAF_div").show();
						c(document).find(".signatories").show();
						c(document).find("#paf_reason_just").text(ret['data'][a].reasons);
						c(document).find("#paf_remarks").text(ret['data'][a].remarks);
						
						var paf_time = null;
							
							if (ret['data'][a].time_out == "12:00 PM") {
								paf_time = "morning";
							} else if (ret['data'][a].time_out == "05:00 PM") {
								paf_time = "wholeday";
							}
							
						c(document).find("#paf_time").val( paf_time );
						break;
					
				}
			
			c(document).find("#td_division").text("Approved by division chief ");
				c(document).find("#div_name").html(ret['division'][0].f_name);
				c(document).find("#div_email").html(ret['division'][0].email_2);
					c(document).find("#division_chief_id").html(ret['division'][0].employee_id);
					c(document).find("#division_chief_email").html(ret['division'][0].email_2);

			c(document).find("#td_dbm").text("Approved by ");			
				c(document).find("#dbm_name").html(ret['dbm'][0].f_name);
				c(document).find("#dbm_email").html(ret['dbm'][0].email_2);
					c(document).find("#dbm_chief_id").html(ret['dbm'][0].employee_id);
					c(document).find("#dbm_chief_email").html(ret['dbm'][0].email_2);
			
			}
			c(document).find("#attach_sig_submit").hide();
			c(document).find("#attach_sig_update").hide();
		})
		*/
		c(document).find("#attach_sig_submit").hide();
		c(document).find("#attach_sig_update").hide();
		
		c('#modal_exceptions').modal('show');
	}
	
	this.cancel_leave = function(grp_id) {
		c(document).find("#statustext").html("<p class='text_status'> Cancelling the application.. please wait... </p> ");
		performajax(['Leave/cancel_leave',{ group_id : grp_id }], function(ret) {
			c(document).find("#statustext").html("<p class='text_status'> Your application has been cancelled. </p> ");
			if (ret == true) {
				setTimeout(function() {
					window.location.reload();
				var app = new application();
					app.get_applied_dates();
					
					c('#modal_exceptions').modal('hide');
				}, 1000)
			}
		})
	}
	
	this.__show_form_of = function(grp_id) {
		// 2245
		performajax(["Leave/kindofleave",{ grpid : grp_id }], function(data) {
			// alert(data[0])
			switch(data[0]) {
				case "PS":
					window.location.href = link+"/reports/applications/"+data[1]+"/PS";
					break;
				case "PAF":
					window.location.href = link+"/reports/applications/"+data[1]+"/PAF";
					break;
				case "OT":
					window.location.href = link+"/reports/applications/"+data[1]+"/OT";
					break;
				case "LEAVE":
					window.location.href = link+"/view/form/"+grp_id;
					break;
				case "CTO":
					window.location.href = link+"/view/form/"+grp_id;
					break;
				case "OB":
					alert("Please go to your online DTR to attach your OB.");
					break;
			}
		})
	}
	
	this.__showupdate_window = function() {
		performajax(["My/getaccom_js",{ dates : applied.dates }],function(data){
			c("<span>",{text: data.length + " accomplishment report(s) found.", class : "footerspan"}).appendTo("#footerdetails");
			c("<div>",{ id : "footerdivid"}).appendTo("#footerdetails");
				if (data.length > 1 ) {
					for(var i = 0, j = 1; i <= data.length-1; i++, j++) {
						c("<span>",{ text : j , class : "btn btn-default", "data-daid" : data[i]['d_a_ID'] })
							.appendTo("#footerdivid")
								.on("click",function(){
									var _daid = c(this).data("daid");
									
									performajax(["My/get_specific",{ daid : _daid}],function(data){
										// remove attr 
											c(document).find("#updateaccom").removeAttr("data-daid");
											c(document).find("#deleteaccom").removeAttr("data-daid");
										// end 
											
										c(document).find("#add_accom_modal_text").val( data['accom'] );
										c(document).find("#saveaccom").hide();
									
										// details 
											c(document).find("#updateaccom").attr({"data-daid":data['daid']});
											c(document).find("#deleteaccom").attr({"data-daid":data['daid']});
											c(document).find(".alterclass").show();
												
											accom_daid = data['daid'];
												
										// details 		
									});
								});
									
						c("<span>",{ text : " " }).appendTo("#footerdivid");
					}
				} else if ( data.length == 1 ) {
					c(document).find("#add_accom_modal_text").val( data[0]['accomplishment'] );
					c(document).find("#saveaccom").hide();
			
					// details 
						c(document).find("#updateaccom").attr({"data-daid":data[0]['d_a_ID']});
						c(document).find("#deleteaccom").attr({"data-daid":data[0]['d_a_ID']});
						c(document).find(".alterclass").show();
							
						accom_daid = data[0]['d_a_ID'];
					// end 
				} else if (data.length == 0) {
					c(document).find(".alterclass").hide();
					c(document).find("#add_accom_modal_text").val("");
					c(document).find("#saveaccom").show();
				}
		})
	}
	
	this.recordrem = function(exact,empid) {
		// performajax("")
	}
}
