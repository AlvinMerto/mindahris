	
jQuery(document).ready(function() {
	jQuery(document).find("#accom_id").jqxEditor({ height: "400px", width: '100%', theme: 'arctic' });
	
	//var selection = jQuery(document).find("#dates_calendar").jqxDateTimeInput('getRange');
	
	jQuery(document).on("click","#remove_accom", function() {
		var month_ = jQuery(document).find("#month_select").val();
		var day_   = jQuery(document).find("#day_select").val();
		var year_  = jQuery(document).find("#year_select").val();
			
		var conf = confirm("Are you sure you want to proceed?");
	
		if (conf) {
			performajax(["My/removeaccom",{ thedate: month_+"/"+day_+"/"+year_ }], function(data) {
				if (data){
					alert("Accomplishment report for this date has been removed successfully.");
				}
			})
		}
	})
})
	