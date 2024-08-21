// alvin
var forfindings = [];

var empid_ = null;
var cntid_ = null;
var visitoremp = null;
// var link = "https://office.minda.gov.ph:9003";
// var link = "https://192.168.1.9";
// https://192.168.1.9/
var link    = location.href;
	link    = "https://"+link.split("/")[2];
	
jQuery(document).ready(function() {
	jQuery(document).on("click","#listofpeople li", function(e){
		
		var classs = $(e.target).attr("class").split(" ");
		
		for(var i = 0; i <= classs.length-1; i++) {
			if (classs[i] == "revertback") {
				return;
			}
		}
		/*
		if (e.target.hasClass("revertback")) { // name ::  a_if_1
			
		} else {
		*/
		
		jQuery(document).find("#findingdiv").hide();	
		jQuery("#dtrforcheck").modal("show");
		
		cntid_ = jQuery(this).data('cntid');
		empid_ = jQuery(this).data('emp_id');
		
		jQuery("#thedtr").html("<p style='text-align: center; padding: 18px; background: #fff;'> loading.. please wait.. </p>");
		jQuery("#thedtr").load(link+"/hr/dtr",{
			emp_id   : jQuery(this).data('emp_id'),
			retwat   : jQuery(this).data('retwat'), 
			cntid    : jQuery(this).data('cntid'), 
			coverage : jQuery(this).data('coverage')
		}, function() {
			
			performajax(["Dtr/gettoken",{ cntid_ : cntid_ }], function(data) {
				// approvedtr
				/*console.log(data);*/
				jQuery(document).find("#approvedtr").attr({ "href":link+"/dtr/approval/"+data.vercode+"/"+data.password+"/"+data.username });
				visitoremp = data.userid;
			})
			
			$('#jqxfullname').val( empname );
				processdtr(datefrom , dateto , bioid , areaid , empid);
				$(document).find("#statmsg").text("");
		})
		
		jQuery(document).on("click","#addfinding",function() {
			if (empid_ == 389) {
				// alert("something is not right!!!"); return;
			}
			jQuery(document).find("#findingdiv").fadeIn();	
		})
		
		jQuery(document).find("#findingdate").jqxDateTimeInput({ width: 330, height: 25 })
		jQuery('#findingdate').on('close', function (event) { 
			jQuery(document).find("#themsgtext").val("");
		}); 
		
		// addfinding 
		jQuery(document).on("click","#addnow", function() {
			
			var date__ = jQuery(document).find("#findingdate").jqxDateTimeInput('getDate');
			var months = ['January',"February","March","April","May","June","July","August","September","October","November","December"];
			
			var details 	 = new Object();
				details.date = months[date__.getMonth()] + " " + date__.getDate() + ", " + date__.getFullYear();
				details.msg  = jQuery(document).find("#themsgtext").val();
			
			if (forfindings.length > 0) {
				for(var i = 0; i <= forfindings.length-1; i++) {
					var datecomp = forfindings[i].date;
					var index = datecomp.indexOf(details.date);
					
					if (index != -1) {
						forfindings.splice(i,1);
					} 
				}
				forfindings.push(details);
			} else {
				forfindings.push(details);
			}
						
			jQuery(document).find(".nofindingsyet").hide();
			
			// display to findings
			displaytofindings();
			
		})
		
		jQuery(document).on("click",".removefindings", function() {
			var ddindex_ = jQuery(this).data("dindex");
				
				forfindings.splice(ddindex_,1);
				
				// display to findings
				displaytofindings();
		})
		
		jQuery(document).on("click","#returnbackwithfindings", function() {
			if (forfindings.length > 0) {
				var conf = confirm("Proceed?");
				
				if(conf) {
					var commentfrom = jQuery(this).data('findingsfrom');
					var stringged = JSON.stringify(forfindings);
					
					jQuery(document).find("#statustext").html("The DTR is being ready.");
					performajax(["Dtr/returnwithfindings",{ details : stringged , emp : empid_ , cnterid : cntid_ , com_from : commentfrom}], function(data) {
						if (data == true) {
							jQuery(document).find("#statustext").html("DTR has been forwarded back to the owner.");
							
							setTimeout(function(){
								window.location.reload();
							},1000)
							
						}
					})
				} 
			} else {
				alert("Cannot proceed with empty findings.");
			}
		})
		
		jQuery(document).on("click","#allowsubmit",function(){
			var conf = confirm("Proceed?");
			
			if (conf) {
				jQuery(document).find("#statustext").html("please wait...");

				performajax(["Dtr/return_good",{ emp : empid_ , cnterid : cntid_ }], function(data) {
					if (data == true) {
						//performajax(["Leave/award_credit",{ a_emp_id : empid_ }], function(data) {
							jQuery(document).find("#statustext").html("Owner has been flagged as ready to go.");
						
							setTimeout(function(){
								window.location.reload();
							},1000)
						//})
					}
				})
			}
		})
		
		// } // end if else statement :: a_if_1
	})
	
	jQuery("#approveall").on("click", function(){
		
	})
	
	jQuery(document).on("click","#alvintest",function(){
		// alert( "hello" )
	})
	
	// revert back button 
		$(document).on("click",".revertback",function(){
			var cntid_ = $(this).data("cntid");
			var __this = $(this);
			performajax(["Dtr/revertbackdtr", { cntid : cntid_ }], function(data){
				if (data == true) {
					__this.parent().parent().parent().remove();
				}
			})
			return;
			//$(this).parent().parent().parent().remove();
		})
	// end revert back button 
	
	// searching 
		$(document).on("input change keyup paste keypress","#searchthebar",function(e){	
			var thisval = $(this).val();
		
			if (thisval.length == 0) {
				$("#listofpeople li").show();
			}
			
			if (e.charCode == 13) {
				var ulcnt   = $(document).find("#listofpeople li").length;
				for(var i = 0 ; i <= ulcnt-1; i++) {
					if ( $("#listofpeople li").eq(i).find(".thefname").text().toUpperCase().indexOf( thisval.toUpperCase() ) != -1) {  // found
						found = true;
						$("#listofpeople li").eq(i).siblings().hide();
					} else {
						found = false;
						// not found
						// $("#listofpeople li").eq(i).siblings().show();
					}
				}
				
			}
		})
	// end searching 
	
	// clear:: focal person's end
		$(document).on("click","#cleardtr",function(e){
			e.preventDefault();
			alert("hi");
			performajax(["Dtr/clearfocal",{ cntid : cntid_ }], function(data){
				if (data == true) {
					window.location.reload();
				}
			})
		})
	// end 
	
})

function displaytofindings() {
	jQuery(document).find("#findingsul").children().remove();
	for( var i = 0; i <= forfindings.length-1; i++) {
		jQuery(document).find("#findingsul").prepend("<li>"+
														"<strong> "+forfindings[i].date+" </strong>" + "<span class='removefindings' data-dindex='"+i+"'> remove </span>"+
														"<p> "+forfindings[i].msg+" </p>"+
													 "</li>");
	}
}