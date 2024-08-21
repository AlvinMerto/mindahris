// alvin

jQuery(document).ready(function() {
	jQuery(document).find("#range_date_print_accom").jqxDateTimeInput({ width: 330, height: 25,  selectionMode: 'range' });
	
	jQuery(document).find("#range_date_print_accom").on('close', function (event) {
		var _selection = jQuery(document).find("#range_date_print_accom").jqxDateTimeInput('getRange');
			
			var months = ["1","2","3","4","5","6","7","8","9","10","11","12"];
			
			var from_  = _selection.from;
			var to_    = _selection.to;
			
			var from_text = months[from_.getMonth()]+"/"+from_.getDate()+"/"+from_.getFullYear();
			var to_text   = months[to_.getMonth()]+"/"+to_.getDate()+"/"+to_.getFullYear();
			
			jQuery("#from_").val( from_text );
			jQuery("#to_").val( to_text );
	})
	
	var att 		 = new Object();
		att.deadline = null;
		att.coverid  = null;
		att.from_ 	 = null;
		att.to_ 	 = null;
		
	var att_id = null;
	
	jQuery(document).on("change","#dtr_select", function(){
		att_id = jQuery(this).val();
		att.deadline  = jQuery(document).find("#"+att_id).data("dedline");
		jQuery(document).find("#deadlineofsub").html("<strong>"+att.deadline+"</strong>");
	})
	
	jQuery(document).on("click","#attachtodtr",function() {
		jQuery('#modal_accomprint').modal('show');
	})
	
	jQuery(document).on("click","#attachnow",function() {
		
		att.coverid   = jQuery(document).find("#"+att_id).data("coverid");
		att.from_	  = jQuery(document).find("#from_").val();
		att.to_		  = jQuery(document).find("#to_").val();
		
		performajax(["My/attach_accom",{ details : att }], function(data) {
			if (data || data == true) {
				jQuery(document).find("#msg_att_text").html("Accomplishment Report has been successfully attached.");
			}
		})
	})
	
	jQuery(document).on("click","#sharetoperson",function(){
		jQuery(document).find(".sharewdiv").fadeIn();
	})
	
	jQuery(document).on("click","#floatr",function(){
		jQuery(document).find(".sharewdiv").fadeOut();
	})
	
	jQuery(document).on("click","#sendlink",function(){
		
		var ds = new Object();
			ds.link  = jQuery(document).find("#sharelink").val();
			ds.eadds = jQuery(document).find("#emailadds").val();
			ds.fname = jQuery(document).find("#fname").val();
		
		if (ds.eadds.length == 0) {
			alert("Please enter an email address");
			return;
		}
		
		jQuery(document).find("#statusp").text("sending...");
		performajax(['My/sendlink',{ details : ds }], function(data){
			jQuery(document).find("#statusp").text(data);
		});
		
	});
	
	// 
	$(document).on("change keydown paste input","#signatory", function(){
		$(document).find("#thepersonincharge").text( $(this).val() );
	});
})