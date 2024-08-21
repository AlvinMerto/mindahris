// alvin

var jos_db 			= [];
var reg_db 			= [];
var selected_emps 	= [];
var selected_off    = null,
	selected_div    = null;

function displaytotable(data) {
	// jostable
	// regstable
	jos_db 		  = [];
	reg_db 		  = [];
	selected_emps = [];
	
	$(document).find("#jostable").children().remove();
	$(document).find("#regstable").children().remove();
	for (var i = 0; i <= data.length-1; i++) {
		var seltb = null;
		if (data[i]['employment_type'].toLowerCase() == "regular") {
			// regstable
			reg_db.push(Array(data[i]["employee_id"], data[i]['f_name']));
			
			seltb = "#regstable";
			
		} else if (data[i]['employment_type'].toLowerCase() == "jo") {
			// jostable
			jos_db.push(Array(data[i]["employee_id"], data[i]['f_name']));
			
			seltb = "#jostable";
		}
		
		$("<tbody>")
				.append("<tr data-empid = '"+data[i]['employee_id']+"' class='empselect'>"+
							"<td> <span class='liner'></span>"+
								  "<div class='thetickbox'></div> <span style='position:relative; top:-2px;'> "+data[i]['f_name']+" </span>"+
							"</td>"+
						"</tr>")
					.appendTo(seltb);
					
	}
	
}

function selectall(_this, selectwhat) {
	if (_this.find(".thetickbox").hasClass("resettick")) {
		_this.find(".thetickbox").removeClass("resettick").children().remove();
		
		var thedb = null;
		switch(selectwhat) {
			case "jos":
				// jos_db jostable
					thedb = jos_db;
					$("#jostable").find(".thetickbox").removeClass("resettick").children().remove();
				break;
			case "reg":
				// reg_db regstable
					thedb = reg_db;
					$("#regstable").find(".thetickbox").removeClass("resettick").children().remove();
				break;
		}
		
		for (var i = 0; i <= thedb.length-1; i++) {
			selected_emps.splice( selected_emps.indexOf(thedb[i]) , 1 );
		}
		
	} else {
		_this.find(".thetickbox").addClass("resettick").append("<i class='fa fa-check-square blueit'></i>");
		
		var thedb = null;
		switch(selectwhat) {
			case "jos":
				// jos_db jostable
					thedb = jos_db;
					$("#jostable").find(".thetickbox").removeClass("resettick").children().remove();
					$("#jostable").find(".thetickbox").addClass("resettick").append("<i class='fa fa-check-square blueit'></i>");
				break;
			case "reg":
				// reg_db regstable
					thedb = reg_db;
					$("#regstable").find(".thetickbox").removeClass("resettick").children().remove();
					$("#regstable").find(".thetickbox").addClass("resettick").append("<i class='fa fa-check-square blueit'></i>");
				break;
		}
		
		for (var i = 0; i <= thedb.length-1; i++) {
			if ( selected_emps.indexOf(thedb[i][0]) != -1 ){
				// existed
				continue;
			} else {
				// not existed
				selected_emps.push( thedb[i][0] );
			}
			
		}
		
	}
	
	// console.log( selected_emps )
}

$(document).ready(function() {
	$(document).on("click","#changesig",function(){
		$("#modalchangepersonel").modal("show");
	})
	
	// .headdiv     = heads
	// .olwrapdiv	= units 
	
	$(document).on("click",".retdata", function(){
		// roomid u-0_o-1
		
		$(document).find("#divoptionlbl").text( $(this).find("p").text() );
		$(document).find(".retsel").removeClass("retsel");
		$(this).addClass("retsel");
		
		var uo = $(this).data("roomid").split("_");
		
		var __office	 = uo[1].split("-")[1],
			__division	 = uo[0].split("-")[1];
			
			selected_off = __office;
			selected_div = __division;
	
		performajax(["Hr/getemployees",{ office : __office , division : __division }],function(data) {
			displaytotable(data);
		})
	})
	
	$(document).on("click",".empselect", function(){
		var id 	= $(this).data("empid");
	
		if (selected_emps.length == 0) {
			selected_emps.push(id);
			$(this).find(".thetickbox").addClass("resettick").append("<i class='fa fa-check-square blueit'></i>");
		} else {
			if (selected_emps.indexOf(id) != -1) {
				selected_emps.splice( selected_emps.indexOf(id) ,1);
				$(this).find(".thetickbox").removeClass("resettick").children().remove();
			} else {
				selected_emps.push(id);
				$(this).find(".thetickbox").addClass("resettick").append("<i class='fa fa-check-square blueit'></i>");
			}
		}
		// console.log(selected_emps)
	})
	
	$(document).on("change","#divoption",function(){
		// u-0_o-1
		var ou = $(this).val().split("_"),
			o  = ou[1].split("-")[1],
			u  = ou[0].split("-")[1];
			
			performajax(["Hr/changediv",{ office : o , division : u , emps : selected_emps }],function(data){
				if(data == true) {
					performajax(["Hr/getemployees",{ office : selected_off , division : selected_div }],function(data) {
						displaytotable(data);
					})
				}
			})
	})
	
	$(document).on("change",".headchange",function(){
		var changeid = $(this).data("chngid"),
			empid    = $(this).val();
			
			// u-0_o-1 :: value
			// office
			// division
			// emp
			
			var parent = $(this).parent();
			
			var uo = changeid.split("_"),
				u  = uo[0].split("-")[1], // unit/division
				o  = uo[1].split("-")[1]; // office
			
			performajax(["Hr/changesig",{ office : o, division : u, emp : empid }], function(data){
				if (data == true) {
					parent.find(".statustext").remove();
					$("<span class='statustext' style='color: green;'><i class='fa fa-check'></i>"+
					  "<span style='font-size: 13px; margin-left: 3px;'>"+
						"Signatory has been successfully changed."+
					  "</span></span>").appendTo(parent);
					
					setTimeout(function() {
						parent.find(".statustext").remove();
					},1500);
				}
			});
	})
	
	$(document).on("click","#jos_select",function(event){
		selectall($(this),"jos");
	})
	
	$(document).on("click","#reg_select",function(event){
		selectall($(this),"reg");
	})
	
	
})