var emptype = null;

function loaddatetime(emptype_, coverid = false) {
	performajax(['hr/displaydates',{ emptype : emptype_ }], function(data){
		$(document).find("#datecovers").children().remove();
		
		for(var i = data.length-1; i >= 0; i--) {
			var sel = (coverid == data[i].dtr_cover_id)?"selected":"";
			$("<option value='"+data[i].date_started+"-"+
								data[i].date_ended+"-"+
								data[i]['dtr_cover_id']+"-"+
								data[i]['date_deadline']+"-"+
								data[i]['is_active']+"-"+
								data[i]['is_allow_to_submit']+"'"+sel+">"+
					data[i].date_started+" - "+data[i].date_ended+"</option>")
				.appendTo("#datecovers");
		}
		
		displaycovereddate( $(document).find("#datecovers") )
		
	});
}

function displaycovereddate(d) {
	var thisdate = d.val().split("-"); // 0 = started,  1= ended
		$(document).find("#datestart").text(thisdate[0]);
		$(document).find("#dateend").text(thisdate[1]);
		$(document).find("#datedeadline").text(thisdate[3]);
		
	var hrcovid = thisdate[2];
	
		// $("<span id='editlink_covered'> EDIT </span>").appendTo("#editdcovered");
		// $(document).find("#editlink_covered").attr({"data-dtrcoverid":thisdate[2]});
		
		$(document).find("#editlink_dead").remove();
		$("<span id='editlink_dead' data-hrid = '"+hrcovid+"'> delete </span>").appendTo("#editdddate");
		$(document).find("#editlink_dead").attr({"data-dtrcoverid":thisdate[2]});
		
		
		// setting for the active and inactive button 
			var activelabel = null;
			var classname   = null;
			
			if (thisdate[4] == 1) {	
				activelabel = "Set as inactive";
				classname 	= "activebtn";
				
				$(document).find("#setasactive").text(activelabel)
				.attr({"data-dtrcoverid":thisdate[2],"data-status":thisdate[4]})
					.addClass(classname)
					
			} else if (thisdate[4] == 0) {
				activelabel = "Set as Active";
				classname 	= null;
				
				$(document).find("#setasactive").text(activelabel)
				.attr({"data-dtrcoverid":thisdate[2],"data-status":thisdate[4]})
					.removeClass("activebtn")
			}
			
			

		// end setting active inactive 
		
		// setting on allowed submitted 
			var isallowedlbl  = null;
			var classname_    = null;
			
			if (thisdate[5] == 1) {
				isallowedlbl    = "Disallow submission";
				classname_ 		= "activebtn";
				
				$(document).find("#allowsubmit").text(isallowedlbl)
				.attr({"data-dtrcoverid":thisdate[2],"data-status":thisdate[5]})
					.addClass(classname_)
					
			} else if (thisdate[5] == 0) {
				isallowedlbl    = "Allow submission";
				classname_ 		= null;
				
				$(document).find("#allowsubmit").text(isallowedlbl)
				.attr({"data-dtrcoverid":thisdate[2],"data-status":thisdate[5]})
					.removeClass("activebtn")
			}
			
			

		// end setting 
				
}

function setactive(dtrcoverid_, stat_) {
	performajax(['hr/s_active',{ dtrcoverid : dtrcoverid_ , status : stat_ }],function(data){
		/*
		var emptype = $(document).find("#emptype").val();
		
		switch(emptype) {
			case "Job Order":
				emptype = "JO";
				break;
			case "Regular":
				emptype = "REGULAR";
				break;
		}
		
		loaddatetime(emptype);
		*/
	})
}

function allowsubmit(dtrcoverid_, stat_) {
	performajax(['hr/a_submit',{ dtrcoverid : dtrcoverid_ , status : stat_ }],function(data){
		/*
		var emptype = $(document).find("#emptype").val();
		
		switch(emptype) {
			case "Job Order":
				emptype = "JO";
				break;
			case "Regular":
				emptype = "REGULAR";
				break;
		}
		
		loaddatetime(emptype);
		*/
	})
}

function addnewdtrcoverage() {
	if (emptype == null || null === emptype) {
			alert("Please select the type of employee"); return;
		}
		
	var selecteddate = $("#calendarthis").val();
	var deadline 	 = $("#deadlinethis").val();
		performajax(["hr/addnew",{ date_ : selecteddate , emptype_ : emptype , deadline_ : deadline }], function(data){
			if (data) {
				alert("New DTR coverage is saved")
				loaddatetime(emptype)
			}
		})
		// 
}

function delete__(covid) {
	var conf = confirm("Are you sure you want to delete?");
		
	if (conf) {		
		performajax(["hr/delete__",{ coverid : covid }], function(data){
			if (data) {
				alert("Delete successful");
				loaddatetime(emptype)
			}
		})
	}
}

function listen_() {
	$(document).on("click",".addnewbtn",function(){
		
		
		addnewdtrcoverage();
	})
	
	$(document).on("click","#allowsubmit",function(){
		allowsubmit( $(this).data("dtrcoverid"), $(this).data("status") )
	})
	
	$(document).on("click","#setasactive",function(){
		setactive( $(this).data("dtrcoverid"), $(this).data("status") )
	})
	
	$(document).on("change","#datecovers",function(){
		displaycovereddate( $(this) );
	})
	
	$(document).on("change","#emptype",function(){
		emptype = $(this).val();
		
		switch(emptype) {
			case "Job Order":
				emptype = "JO";
				break;
			case "Regular":
				emptype = "REGULAR";
				break;
		}
		loaddatetime(emptype);
	})
	
	// delete link
		$(document).on("click","#editlink_dead",function(){
			delete__( $(this).data("hrid") );
		})
	// end
}

listen_();
