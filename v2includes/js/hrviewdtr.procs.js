function hrview() {
	var hrview		= new Object();
	var selectedall = false;
	
	this.listen_ = function() {
		// calendartxt       
        
		// emptype select 
			$(document).on('change',"#emptype",function(){
				hrview.type = $(this).val();
			})
		// end 
		
		// office and division select 
			$(document).on("change","#offdiv",function(){
				var value  = $(this).val(),
					offdiv = value.split("_")[1],
					number = value.split("_")[0];
				
				hrview.offdiv = offdiv;
				hrview.id     = number;
				hrview.value  = value;
			})
		// end 
		
		// showbtn click
			$(document).on("click","#showbtn",function(){
				if (undefined === hrview.type) {
					alert("Please select a type of employee"); return;
				}
				
				if (undefined === hrview.offdiv || undefined === hrview.id) {
					if (hrview.value == "all") {
						hrview.offdiv = "all";
						hrview.id 	  = "0";
					} else {
						alert("Please select a division or office"); return;
					}
				}
				
				$(document).find("#selemp").load(BASE_URL+"Hr/displayemps",{ type : hrview.type , 
																			 offdiv : hrview.offdiv , 
																			 id 	: hrview.id
																			},function(){
					
				})
				
			})
		// end 
		
		// print back 
			$(document).on("click","#printbackbtn",function(){
				$.ajax({
					url		 : BASE_URL+"Hr/printback",
					type 	 : "post",
					dataType : "html",
					success  : function(html) {
						var pb    = window.open("","","width=500","height=700")
							docb  = pb.document.open();
							
							docb.write(html);
							docb.close();
							
							pb.print();
					},error  : function() {
						alert("error in printing the back portion");
					}
				})
				
			})
		// end 
		
		// employee select 
			$(document).on("click","#empullist li",function(){
				var tsdata = $(this).data("empdata");
				
				if (undefined == hrview.selected) {
					hrview.selected = [];
				}
				
				var found = false;
				for(i = 0 ; i <= hrview.selected.length-1; i++) {
					if (hrview.selected[i] == tsdata) {
						found = true; break;
					}
				}
				
				if (found) {
					hrview.selected.splice( hrview.selected.indexOf(tsdata),1 );
					$(this).removeClass("emp_selected");
					
					
				} else {
					hrview.selected.push(tsdata);
					$(this).addClass("emp_selected");
				}
				
				if (hrview.selected.length == 0) {
						$(document).find("#choosewhatodo").children().remove();
				} else {
					$(document).find("#choosewhatodo").load(BASE_URL+"Hr/whattodo",{ numofemps : hrview.selected },function(){
						
					})
				}
				
			})
		// end 
		
		// mass print 
			// massprint
			$(document).on("click","#massprint",function(){
				// return; 
				if (hrview.selected.length == 0){ alert("No employee selected"); return; }
				
				// innerboxdiv
				$("<div style='clear: both;margin-top:10px;' id='calc'><p style='background: #70e870; text-align: center; padding: 6px;'> calculating.. please wait. </p></div>")
					.appendTo("#choosewhattodo");
			//	console.log(calendarvar); return;
 				if (undefined === calendarvar) { alert("Calendar not set."); return; }
				$.ajax({
					url			: BASE_URL+"Hr/massprint",
					type 		: "post",
					data 		: { calendar_ : calendarvar , hrviewdets : hrview },
					dataType 	: 'html',
					success		: function(data){
						$(document).find("#calc").remove();
						// print here
						// console.log(data);
						var newwindow = window.open('','','width=500','height=300'),
							doc 	  = newwindow.document.open();
							
							doc.write(data);
							doc.close();
							
							setTimeout(function(){
								newwindow.print();
							},1000)
							
					}, error 	: function(){
						alert("error on printing");
					}
				});
			});
		// end 
		
		// mass sending of DTR through email
			$(document).on("click","#masssend",function(){
				$(this).text('sending email..');
				$.ajax({
					url			: BASE_URL+"Hr/mass_send",
					type 		: "post",
					data 		: { calendar_ : calendarvar , hrviewdets : hrview },
					dataType 	: 'json',
					success		: function(data){
						console.log(data);	
					}, error 	: function(){
						alert("DTR Sent");
						$(document).find("#masssend").text("SEND MAIL");
					}
				});
			});
		// end 	
		
		// select all 
			$(document).on("click","#selectall",function(){
				hrview.selected = [];
					
				if (selectedall == true) {
					// empullist
					hrview.selected = [];
					$(document).find("#empullist li").removeClass("emp_selected");
					selectedall = false;
					
					$(document).find("#choosewhatodo").children().remove();
				} else {
					var ul = $(document).find("#empullist").children();
				
					for(i = 0 ; i <= ul.length; i++) {
						// console.log(ul.eq(4).data("empdata"));
						hrview.selected.push( ul.eq(i).data("empdata") );
					}
					
					$(document).find("#empullist li").addClass("emp_selected");
					selectedall = true;
					
					$(document).find("#choosewhatodo").load(BASE_URL+"Hr/whattodo",{ numofemps : hrview.selected },function(){
						
					})
				}
				
			})
		// end 	
	}
	
	this.displayprint = function() {
		$(document).find("#choosewhatodo").load(BASE_URL+"Hr/whattodo",{ numofemps : hrview.selected },function(){
						
		})
	}
}

	$(document).ready(function(){
		var hv = new hrview();
		hv.listen_();
	})
	