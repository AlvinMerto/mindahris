$(document).ready(function(){
	var __addfield = function() {
		var current = $(document).find(".added_areaclass").length;
		var next    = current+1;
		$("<tr>")
			.append("<td><input type='text' id='area_added_"+next+"' class='added_areaclass' name='area_name_' placeholder='Area Name'/></td>"+
			    	"<td><input type='text' id='ip_added_"+next+"' class='added_ipclass' name='area_ip_' placeholder='IP Address'/></td>")
				.appendTo("#tbodyfields");
	}
	
	var __savefields = function(vals) {
		performajax(["Systemsettings/biometricsettings", vals], function(data) {
			console.log(data);
			if (data==true || data=="true"){
				window.location.reload(true);
			}
		});
	}
	
	// delete 
	$(".delete_area").on("click",function(){
		
		var conf = confirm("Are you sure you want to delete this area?");
		
		if (conf){			
			performajax(["Systemsettings/deletebio", {del:$(this).data("ar_code")}], function(data){
				console.log(data);
				if (data==true || data=="true") {
					window.location.reload(true);
				}
			});
		} 
	})
	
	// ping
	$(".testconn").on("click",function(){
		var ar_code = $(this).data("ar_code_test");	 
		var show_id = $(this).data("show_id"); 
		
		$("#"+show_id).text("testing connection.. please wait...");
		performajax(["Systemsettings/ping", {area_code:ar_code}], function(data) {
			console.log("hello"+data);
			var appendtext = "";
			if (data != "Failed") {
				// appendtext = "<a href='http://office.minda.gov.ph:9003/attendance/attrecord/"+ar_code+"'> Download log </a>"
			}
			$("#"+show_id).html(data+appendtext);
		})
	})
	
	// savebtn_bio
	$("#savebtn_bio").on("click",function(){
		// updates
		var for_update = [];
		var for_update_count = $(document).find(".ipclass").length;
		
		for(var i=0;i<=for_update_count-1;i++) {
			var dom    = "#ip_id_"+i;
			var update = [$(dom).data("area_code"),$(dom).val()];
				for_update.push(update);
		}
		
		// save newly added area
		var new_entries = [];
		var new_entries_count = $(document).find(".added_areaclass").length;
		
		for(var o=1;o<=new_entries_count;o++) {
			var areadom = "#area_added_"+o;
			var ipdom   = "#ip_added_"+o;
						
			var new_ = [$(document).find(areadom).val(), $(document).find(ipdom).val()];
				new_entries.push(new_);
		}
		
		__savefields({"update":for_update, "new":new_entries});
		
	})
	
	$("#addfield").on("click",function(){
		__addfield();
	})
})