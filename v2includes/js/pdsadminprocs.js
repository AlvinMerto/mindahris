function pdsadmin() {
	this.listen = function() {
		window.onload = function(){
			pds.loadresult();
		}
		
		$(document).find("#filterbtn").on("click",function(){
			$(document).find(".filterbox").toggle();
		});
		
		$(document).on("click","#offclick",function(){
			var office = $(this).data('off');
			var showin = $(this).data("showin");
			
			pds.display(office,"offclick","#"+showin);
		});
		
		$(document).on("click",".divclick",function(){
			var div    = $(this).data("divid");
			
			var spcl   = false;
			
			if ( undefined != $(this).data("special")) {
				spcl   = true;
			}

			//$("<small> Hide </small>").appendTo($(this));
			
			if (spcl == true) {
				pds.displayemps(div, "#div_"+div+"_spl", $(document).find("#positiontype").val(),spcl);
			} else {
				pds.displayemps(div, "#div_"+div, $(document).find("#positiontype").val(),spcl);
			}
			
		});
		
		$(document).on("click",".empclick",function(){
			var pidn = $(this).data("pidn");
			
			var from_ = $(document).find("#from_").val();
			var to_   = $(document).find("#to_").val();
			var incdates = false;
			
			if (from_.length != 0 && to_.length != 0) {
				incdates = from_+"_"+to_;
			}
			
			var typeofemp = $(document).find("#positiontype").val();
			
			$("<span style='cursor:pointer; padding: 7px;float: left;color: red;font-size: 13px;font-weight: bolder;'> close </span>")
				.on("click",function(){
					$(document).find("#emp_"+pidn).children().remove();
					$(this).remove();
				}).insertAfter($(this));
			
			pds.displaysems(pidn,"#emp_"+pidn, $(document).find("#typeofld").val(),incdates,typeofemp);
		});
		
		$(document).on("click",".hidethis",function(){
			var hidethis = $(this).data("tohide");
			
			$(document).find("#"+hidethis).children().remove();
		});
		
		$(document).find("#applyfilter").on("click",function(){
			$(document).find(".filterbox").hide();
			pds.loadresult();
		});
		
		$(document).find("#closewindow").on("click",function(){
			$(document).find(".filterbox").hide();
		});
	}
	
	this.loadresult = function() {
		$.ajax({
			url 	 : url+"Pdsajax/resultdiv",
			dataType : "html",
			success  : function(dd) {
				$(document).find("#result").html(dd);
			}, error : function () {
				alert("error");
			}
		});
	}
	
	this.displaysems = function(pidn_, showin, showwhat_, incdates_ = false , emptype_) {
		var addfilters = new Object();
			addfilters.ebgrnd = false;
			addfilters.oskil = false;
			
			if (document.getElementById("ebgrnd").checked == true) {
				addfilters.ebgrnd = true;
			}
			
			if (document.getElementById("oskil").checked == true) {
				addfilters.oskil = true;
			}
		
		$.ajax({
			url 	 : url+"Pdsajax/empseminars",
			type 	 : "GET",
			data 	 : { pidn : pidn_ , showwhat : showwhat_ , incdates : incdates_ , emptype : emptype_ , addfil : addfilters},
			dataType : "html",
			success  : function(data) {
				$(document).find(showin).html(data);
			},error : function() {
				alert("error");
			}
		});
	}
	
	this.displayemps = function(divid_, showin, showwhat_, officelevel = false) {
		$.ajax({
			url 	 : url+"Pdsajax/divclick",
			type 	 : "GET",
			data 	 : { divid : divid_ , showwhat : showwhat_ , offlvl : officelevel},
			dataType : "html",
			success  : function(data) {
				$(document).find(showin).html(data);
			},error : function() {
				alert("error");
			}
		});
	}
	
	this.display = function(offid_, click, showin) {
		$.ajax({
			url 	 : url+"Pdsajax/"+click,
			type 	 : "GET",
			data 	 : { offid : offid_ },
			dataType : "html",
			success  : function(data) {
				$(document).find(showin).html(data);
			},error : function() {
				alert("error");
			}
		});
	}
}

var pds = new pdsadmin();
	pds.listen();

