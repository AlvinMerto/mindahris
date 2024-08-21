function utilities() {
	this.listen  = function() {
		$(document).ready(function(){
			u.thelist();
		});
		
		$(document).on("click","#addnewbtnshow",function(){
			$.ajax({
				url	: BASE_URL+"hr/addnewto",
				type: "GET",
				data: {},
				dataType: "html",
				success : function(a) {
					$(document).find("#showwindow").html(a);
				}
			});
		});
		
		$(document).on("change keydown paste input","#chargeto",function(e){
			
			if (e.key == " " ||
			  e.code == "Space" ||      
			  e.keyCode == 32      
		  ) {
			  e.preventDefault();
			return;
		  }
			var len = $(document).find("#contnum").val();
			
			var office = $(this).val();
			var year   = len.split("-")[2];
			var mon    = len.split("-")[3];
			var count  = len.split("-")[4];
			
			var newcont = "TO-"+office.toUpperCase()+"-"+year+"-"+mon+"-"+count;
			len.text = newcont.trim("");
			$(document).find("#contdisplay").text( newcont.trim(""));
			$(document).find("#contnum").val( newcont.trim("") );
		});
		
		// add new button
		
		$(document).on("click","#savenewentry",function(){
		//	e.preventDefault();
			
			var info_ = new Object();
			
			var len = $(document).find("#contnum").val();
			
			if (len.length == 0) { alert("No control Number. Please press CTRL+F5 to hard refresh the page."); }
			
		//	var formData = new FormData( $(this) );
		
		//	var thefile_		 = $(document).find("#attfile")[0].files[0];
			info_['contnum']     = $(document).find("#contnum").val();
			info_['nmoftravs']   = $(document).find("#nmoftravs").val();
			info_['dtoftrav']	 = $(document).find("#dtoftrav").val();
			info_['dtoftrav_to'] = $(document).find("#dtoftrav_to").val();
			info_['natoftrav']	 = $(document).find("#natoftrav").val();
			info_['isforeign']   = $(document).find("#isforeign").is(":checked");
			info_['dest']		 = $(document).find("#dest").val();
			info_['purpose']	 = $(document).find("#purpose").val();
			info_['reqby']		 = $(document).find("#reqby").val();
			
			console.log( info_ ); 
			
				$.ajax({
					url 	: BASE_URL+"hr/saveasnewent",
					type 	: "POST",
					data 	: { a : info_ },
					// data : { formData },
					dataType: "json",
					// processData: false,
					// contentType: false,
					success : function() {
						alert("Successfull");
						
						$(document).find("#contnum").val("");
						$(document).find("#nmoftravs").val("");
						$(document).find("#dtoftrav").val("");
						$(document).find("#dtoftrav_to").val("");
						$(document).find("#dest").val("");
						$(document).find("#purpose").val("");
						$(document).find("#reqby").val("");
						
						var i = new utilities();
							i.thelist();
					},
					error: function(){
						alert("an error occured");
					}
				});
			
		});
		
		// end 
		
		// close entry 
			$(document).on("click","#closeentry",function(){
				$(document).find("#showwindow").children().remove();
			});
		// end 
		
		// show search 
			$(document).on("click","#searchbtn",function(){
				$.ajax({
					url 	: BASE_URL+"hr/searchto",
					data 	: {},
					dataType: "html", 
					success : function(a) {
						$(document).find("#showwindow").html(a);
					}
				})
			});
		// end 
		
		$(document).on("click","#findnow",function(){
			var cats = $(document).find("#cats").val();
			var key  = $(document).find("#keyword").val();
			
			$.ajax({
				url 	: BASE_URL+"hr/findnow",
				type 	: "POST",
				data 	: { cat_ : cats , key_ : key },
				dataType: "html",
				success : function(a) {
					$(document).find("#thelist").html(a);
				}
			})
		});
		
		var toid; 
		
		// click on the table 
			$(document).on("click",".tableutil tbody tr", function(){
				toid = $(this).data("toid");
				
			//	$(document).find(".cancelbtn").text("Cancel");
				$(this).addClass("forcancel").siblings().removeClass("forcancel")
				
			});
		// end 
		
			// approve 
			$(document).on("click","#approvebtn",function(){
				var i = new utilities();
					i.approvenow(toid);
			});
			// end 
		// cancel 
			$(document).on("click",".cancelbtn",function(){
			
			var conf = confirm("Are you sure you want to cancel this?");
			
			if (!conf) {
				return;
			}
				
				$.ajax({
					url 	: BASE_URL+"hr/cancel",
					type 	: "POST",
					data	: { toid_ : toid },
					dataType: "json",
					success : function(a){
						var i = new utilities();
							i.thelist();
					},
					error : function() {
						alert("an error occured");
					}
				});
			});
		// end 
		
		// cancelled 
		/*
			$(document).on("click",".cancelled", function(){
				$(document).find(".cancelbtn").text("uncancel");
			});
		*/
		// end 
	}
	
	this.approvenow = function(thetoid) {
		var conf = confirm("Are you sure you want to approve this travel order?");
		
		if (!conf) {
			return;
		}
		
		$.ajax({
			url 	 : BASE_URL+"hr/approvenow",
			type 	 : "post",
			data 	 : { toid_ : thetoid },
			dataType : "json",
			success  : function(a) {
				if (a == true) {
					alert("Approved Successfully");
					window.location.reload();
				}
			}, error : function(a,b,c) {
				alert(a+b+c);
			}
		});
	}
	
	this.thelist = function() {
		
			$.ajax({
				url 	: BASE_URL+"hr/showall",
				data 	: {},
				dataType: "html",
				success : function(a) {
					$(document).find("#thelist").html(a);
				}
			})
		
	}
}

var u = new utilities();
	u.listen();