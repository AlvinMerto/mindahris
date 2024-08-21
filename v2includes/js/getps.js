// alvin

jQuery(document).ready(function(){
	var chosentr = null;
	var exact_id = null;
	var timeout  = null;
	var timein   = null;
	var remarks  = "";
	var names;
	
	performajax(['Monitoring/getapprovedps',{ dets: "no dets"}], function(data) {

		for(var i = 0; i <= data.length-1; i++) {
			var trid = "#trps_"+i;
			jQuery("<tr>").attr({id : "trps_"+i , class: "trpsclass" , "data-exactid":data[i]['exact_id'] }).appendTo("#tblps_tbody");
			jQuery("<td>",{ text : i }).appendTo(trid);
			jQuery("<td>",{ text : data[i]['fullname'] }).appendTo(trid);
			jQuery("<td>",{ text : data[i]['reasons'] }).appendTo(trid);
			jQuery("<td>",{ text : data[i]['date_added'] }).appendTo(trid);
			jQuery("<td>",{ text : data[i]['time_out'] , id : "trps_"+i+"tdout"}).appendTo(trid);
			jQuery("<td>",{ text : data[i]['time_in'] , id : "trps_"+i+"tdin"}).appendTo(trid);
			jQuery("<td>",{ text : "" , id : "trps_"+i+"rem"}).appendTo(trid);
		}
		
		names = data;
		jQuery(".htext").fadeIn();
		
		console.log(names);
	})
	
	jQuery(document).on("keyup","#textsearch",function() {
		//var text = jQuery(this).val();
		
		jQuery(document).find("#tblps_tbody").children().remove();
		var search = jQuery(this).val().toUpperCase();
				
		for(var i = 0; i <= names.length-1; i++) {
			var text  = String(names[i].fullname);
			var index = text.indexOf(search);
			if (index != -1) {
				for(var i = 0; i <= names.length-1; i++) {
					var trid = "#trps_"+i;
					jQuery("<tr>").attr({id : "trps_"+i , class: "trpsclass" , "data-exactid":names[i]['exact_id'] }).appendTo("#tblps_tbody");
					jQuery("<td>",{ text : i }).appendTo(trid);
					jQuery("<td>",{ text : names[i]['fullname'] }).appendTo(trid);
					jQuery("<td>",{ text : names[i]['reasons'] }).appendTo(trid);
					jQuery("<td>",{ text : names[i]['date_added'] }).appendTo(trid);
					jQuery("<td>",{ text : names[i]['time_out'] , id : "trps_"+i+"tdout"}).appendTo(trid);
					jQuery("<td>",{ text : names[i]['time_in'] , id : "trps_"+i+"tdin"}).appendTo(trid);
					jQuery("<td>",{ text : "" , id : "trps_"+i+"rem"}).appendTo(trid);
				}
			}
		}
	})
	
	jQuery(document).on("click",".trpsclass", function(e) {
		
		jQuery("#tblps").find("#showntr").remove();
		
		chosentr = jQuery(this).closest("tr").attr("id");
		exact_id = jQuery(this).closest("tr").attr("data-exactid");
		
		/*
		if ( jQuery(document).find("#"+chosentr+"tdout").text().length != 0 || jQuery(document).find("#"+chosentr+"tdout").text().length != 0 ) {
			return;
		}
		*/
		
		performajax(["Monitoring/getpstime",{ exactid : exact_id }], function(data) {
			timein  = data[0]['time_in'];
			timeout = data[0]['time_out'];
			remarks = (data[0]['remarks'] == null)?"":data[0]['remarks'];
		
		jQuery("#"+chosentr).after("<tr id='showntr'> </tr>");
			jQuery("<td> </td>").appendTo("#showntr");
			jQuery("<td> </td>").appendTo("#showntr");
			jQuery("<td> </td>").appendTo("#showntr");
			jQuery("<td> </td>").appendTo("#showntr");
			
			if (timeout == null || timeout == " " || timeout == "") {
				jQuery("<td>",{ html : "<input type='button' value='Out' id='btnout' class='btn btn-primary'/>" , id : "tdout" }).appendTo("#showntr");
			} else {
				jQuery("<td>",{ html : timeout , id : "tdout" }).appendTo("#showntr");
			}
			
			if (timein == null || timein == " " || timein == "") {
				jQuery("<td>",{ html : "<input type='button' value='In' id='btnin' class='btn btn-primary'/>" , id : "tdin"}).appendTo("#showntr");
			} else {
				jQuery("<td>",{ html : timein , id : "tdin" }).appendTo("#showntr");
			}
			
			jQuery("<td>",{ html :"<input type='text' class='rem_text' id='rem_textid' value='"+remarks+"'/> <button class='btn btn-primary btn-sm' id='btn_updateps'> Update </button> <span id='closetrshow' style='float:right; margin-top: 8px;'> <i class='fa fa-times-circle'></i> </span>" }).appendTo("#showntr");
			
		})
	})
	
	jQuery(document).on("click","#closetrshow", function() {
		jQuery(document).find("#showntr").fadeOut("100",function() {
			jQuery(document).find("#showntr").remove();
		})
	})
	
	jQuery(document).on("click","#btnout", function() {
		jQuery(document).find("#tdout").html("<input type='text' class='pstimetext' id='btnouttext'/>");	
		pstimetext()
	})
	
	jQuery(document).on("click","#btnin", function() {
		jQuery(document).find("#tdin").html("<input type='text' class='pstimetext' id='btnintext'/>");
		pstimetext()
	})

	
	jQuery(document).on("click","#updatepsdata", function() {
		
	})
		
	jQuery(document).on("click","#btn_updateps", function() {
		var v 		  = new Object();
			v.t_in    = jQuery(document).find("#btnintext").val();
			v.t_out   = jQuery(document).find("#btnouttext").val();
			v.remtext = jQuery(document).find("#rem_textid").val();

			if (jQuery(document).find("#btnintext").val() == undefined ) {
				// v.t_in = jQuery(document).find("#btnintext").val();
				v.t_in = null;
			}
			
			if (jQuery(document).find("#btnouttext").val() == undefined) {
				// v.t_out   = jQuery(document).find("#btnouttext").val();
				v.t_out = null;
			}
			
		performajax(['Monitoring/updatepstime',{ exactid : exact_id , val : v }], function(data) {
			console.log(data);
			if (data == true) {
				jQuery(document).find("#showntr").remove();
				
				if ( jQuery(document).find("#"+chosentr+"tdin").text() == "" || jQuery(document).find("#"+chosentr+"tdin").text() == " ") {
					jQuery(document).find("#"+chosentr+"tdin").html( v.t_in );
				}
			
				if ( jQuery(document).find("#"+chosentr+"tdout").text() == "" || jQuery(document).find("#"+chosentr+"tdout").text() == " " ) {
					jQuery(document).find("#"+chosentr+"tdout").html( v.t_out );
				}
				
				if ( jQuery(document).find("#"+chosentr+"rem").text() == "" || 
					 jQuery(document).find("#"+chosentr+"rem").text() == " " || 
					 jQuery(document).find("#"+chosentr+"rem").text() == "null" ) {
					jQuery(document).find("#"+chosentr+"rem").html( v.remtext );
				}
				
			}
		})
	})
		
})

function pstimetext() {
	jQuery(document).find(".pstimetext").jqxDateTimeInput({ 
			width: "auto", 
			height: 25 , 
			formatString: 't',
			showTimeButton: true, 
			showCalendarButton:false 
		})
}