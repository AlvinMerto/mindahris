// uses jquery

var ccc = jQuery;
var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
var ddays  = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

ccc(document).ready(function() {
	getcto_ot(t_emp_id);
})


function getcto_ot(emp_id) {
	performajax(["My/getcto_ot",{ empid:emp_id }], function(data){
		var contents = data;
		
		console.log(data);
		
		// tbody_contents
		var trid = null;
		
		if (data.length == 0 ) {
			ccc("<tr> <td colspan=17 style='color: #868686; font-size: 13px; padding: 20px;'> Silence is golden. </td> </tr>").appendTo("#tbody_contents");
		}
		
		for(var i = 0; i <= contents.length-1; i++) {
			
			trid = i+"_trid";
			ccc("<tr>",{ id : trid }).appendTo("#tbody_contents");
			
			var ddate = new Date( contents[i]['date_of_application'] );
			var dmon  = months[ddate.getMonth()];
			var dday  = ddate.getDate();
			var dyer  = ddate.getFullYear();
			
			var dd    = ddays[ddate.getDay()];
			
			if (contents[i]['credit_type'] == "OT") {
				ccc("<td>",{ text : dmon + " " + dday + ", " + dyer }).appendTo("#"+trid);
				ccc("<td>",{ text : dd }).appendTo("#"+trid);
				ccc("<td>",{ text : contents[i]['am_in'] }).appendTo("#"+trid);
				ccc("<td>",{ text : contents[i]['am_out'] }).appendTo("#"+trid);
				ccc("<td>",{ text : contents[i]['pm_in'] }).appendTo("#"+trid);
				ccc("<td>",{ text : contents[i]['pm_out'] }).appendTo("#"+trid);
				
				ccc("<td>",{ text : contents[i]['total'] }).appendTo("#"+trid); // total before credits
				
				// credits :: 1x
				var o_oh = null;
				var o_om = null;
				
				// credits :: 1.5x
				var p_ph = null;
				var p_pm = null;
				
				// exploded
				var exp_h = null;
				var exp_m = null;
				
				exp_h = contents[i]['total'].split(":")[0];
				exp_m = contents[i]['total'].split(":")[1];
				
				if (contents[i]['mult'] == 1.5) {
					// xf = "<i class='fa fa-check'></i>";
					var o_oh = exp_h;
					var o_om = exp_m;
				
				} else if (contents[i]['mult'] == 1) {
					// xo = "<i class='fa fa-check'></i>";
					var p_ph = exp_h;
					var p_pm = exp_m;
				}
				
				// 1x
					ccc("<td>",{ html : p_ph }).appendTo("#"+trid);
					ccc("<td>",{ html : p_pm }).appendTo("#"+trid);
				// end 
				
				// 1.5x
					ccc("<td>",{ html : o_oh }).appendTo("#"+trid);
					ccc("<td>",{ html : o_om }).appendTo("#"+trid);
				// end 
				
				ccc("<td>",{ text : contents[i]['cred_total'] }).appendTo("#"+trid); // total credits after multiplication
				
				ccc("<td>",{ text : ""}).appendTo("#"+trid);
				ccc("<td>",{ text : ""}).appendTo("#"+trid);
				ccc("<td>",{ text : ""}).appendTo("#"+trid);
				ccc("<td>",{ text : contents[i]['total_credit'] }).appendTo("#"+trid);
				ccc("<td>",{ text : ""}).appendTo("#"+trid);
				
			} else if (contents[i]['credit_type'] == "CTO") {
				ccc("<td>",{ text : ""}).appendTo("#"+trid); // date of overtime 
				ccc("<td>",{ text : ""}).appendTo("#"+trid); // day
				ccc("<td>",{ text : ""}).appendTo("#"+trid); // am : IN
				ccc("<td>",{ text : ""}).appendTo("#"+trid); // am : OUT
				ccc("<td>",{ text : ""}).appendTo("#"+trid); // pm : IN
				ccc("<td>",{ text : ""}).appendTo("#"+trid); // pm : OUT
				ccc("<td>",{ text : ""}).appendTo("#"+trid); // total
				ccc("<td>",{ text : ""}).appendTo("#"+trid); // 1x : hh
				ccc("<td>",{ text : ""}).appendTo("#"+trid); // 1x : mm
				ccc("<td>",{ text : ""}).appendTo("#"+trid); // 1.5 : hh
				ccc("<td>",{ text : ""}).appendTo("#"+trid); // 1.5 : mm
				
				// newly added
				ccc("<td>",{ text : ""}).appendTo("#"+trid);	// total in credits
				
				ccc("<td>",{ text : contents[i]['date_of_application'] }).appendTo("#"+trid);
				
				ccc("<td>",{ text : contents[i]['cto_hours'] }).appendTo("#"+trid);
				ccc("<td>",{ text : contents[i]['cto_mins'] }).appendTo("#"+trid);
				
				ccc("<td>",{ text : contents[i]['total_credit'] }).appendTo("#"+trid);
				ccc("<td>",{ text : ""}).appendTo("#"+trid);
			} else if (contents[i]['credit_type'] == "FB") {
				ccc("<td>",{ text : dmon + " " + dday + ", " + dyer}).appendTo("#"+trid);
				ccc("<td>",{ text : dd }).appendTo("#"+trid);
				ccc("<td>",{ text : ""}).appendTo("#"+trid);
				ccc("<td>",{ text : ""}).appendTo("#"+trid);
				ccc("<td>",{ text : ""}).appendTo("#"+trid);
				ccc("<td>",{ text : ""}).appendTo("#"+trid);
				
				// credits 
					ccc("<td>",{ text : "" }).appendTo("#"+trid);
					ccc("<td>",{ text : "" }).appendTo("#"+trid);
					ccc("<td>",{ text : "" }).appendTo("#"+trid);
					ccc("<td>",{ text : "" }).appendTo("#"+trid);
					ccc("<td>",{ text : "" }).appendTo("#"+trid);
				// end 
				
				ccc("<td>",{ text : contents[i]['total']}).appendTo("#"+trid);
				ccc("<td>",{ text : ""}).appendTo("#"+trid);
				ccc("<td>",{ text : ""}).appendTo("#"+trid);
				ccc("<td>",{ text : ""}).appendTo("#"+trid);
				
				/*
				ccc("<td>",{ text : "" }).appendTo("#"+trid);
				ccc("<td>",{ text : "" }).appendTo("#"+trid);
				ccc("<td>",{ text : "" }).appendTo("#"+trid);
				*/
				ccc("<td>",{ text : contents[i]['total_credit'] }).appendTo("#"+trid);
				ccc("<td>",{ text : ""}).appendTo("#"+trid);
			}
		}
		
	})
}

/*
am_in				:null
am_out				:null
credit_type			:"CTO"
cto_end				:"Thu Feb 22 2018 15:00:00 GMT+0800 (Taipei Standard Time)"
cto_hours			:"5"
cto_mins			:"0"
cto_start			:"Thu Feb 22 2018 10:00:00 GMT+0800 (Taipei Standard Time)"
date_of_application :"Feb 21 2018 12:00:00:000AM"
elc_otcto_id		:14
emp_id				:"62"
mult				:null
pm_in				:null
pm_out				:null
total				:"5.0"
total_credit		:"5.5"
*/