function procs() {
	var info = new Object();
	var openedcomponent = null, openedshowid = null, openedval = null, openedtbl = null, openedfld = null;
	
	// for educlist 
	var seleduclist = null, selfield = null, selboxbel = null;
	
	this.listen = function() {
		var id  = null;
		var dis = null;
		$(document).on("focus",".boxprocs",function(){
			id  = $(this).attr('id');
			dis = $(this);
		}).on("blur",".boxprocs",function(){
			info.field = id;
			info.value = $(this).val();
			
			// check if address textbox 
			// var isaddr = $(this).data("isaddr");
				if (undefined !== $(this).data("isaddr")) {
			
					// found the textbox to be address type
					info.isaddr   = true;
					info.addrinfo = "addrtype";
					info.boxbelong = "pdsdb.dbo.addresses";
				} else {
					// found that the textbox is not address type
					delete info.boxbelong;
					delete info.addrinfo;
					// delete info.fldval;
				}
			// end 
		//	console.log(info);
			if (undefined === info.boxbelong) {
				info.boxbelong = $(document).find("#headertext").data("boxbelong");
			}
			
			// for question tbl 
				if (undefined !== $(this).data('hasextra')) {
					info.extra   = true;
					info.xfld 	 = "fld";
					info.xfldval = $(this).data("xfldval");
				}
			// end 
			
			// console.log(info); return;
			// console.log(info);
		
		//	if (info.value.length > 0) {
				p.save(dis);
		//	}
		});
		
		$(document).on("click",".usetexttodate",function(){
			var use = $(this).data("use");
			var ph  = null

			if (use == "monyear") {
				ph = "mm/YYYY";
			} else if (use == "year") {
				ph = "YYYY";
			}
			
			$(document).find("#from_").removeAttr("type").attr({type:"text",
																placeholder:ph
																});
			$(document).find("#to_").removeAttr("type").attr({type:"text",
															  placeholder:ph
															});
			
			$(document).find(".usetexttodate").removeAttr("style")
			$(this).attr("style","font-weight:bold");
		});
		
		$(document).on("click",".resetlink",function(){
			$(document).find("#from_").removeAttr("type").attr("type","date");
			$(document).find("#to_").removeAttr("type").attr("type","date");
			$(document).find(".usetexttodate").removeAttr("style")
		});
		
		$(document).on("click",".editcomponent",function(){
			var educid = $(this).data("value");
			var fld    = $(this).data("fld");
			var tbl    = $(this).data("tbl");
			
			var educbgtype = $(document).find(".educselect").data("eductype");
			
			$(document).find("#addanother").hide();
			$(document).find("#updateedit").remove();
			
			p.getData(educid,fld,tbl, function(d){
				$(document).find("#nameofsch").val(d[0].nameofsch);
				$(document).find("#course").val(d[0].course);
				$(document).find("#from_").val(d[0].from_);
				$(document).find("#to_").val(d[0].to_);
				$(document).find("#hlevel_unitsearned").val(d[0].hlevel_unitsearned);
				$(document).find("#yeargrad").val(d[0].yeargrad);
				$(document).find("#scho_honorrec").val(d[0].scho_honorrec);
				
				$("<button class='btn btn-primary' id='updateedit'> Update </button>")
					.on("click",function(){
						info.boxbelong = "pdsdb.dbo."+tbl;
						info.fld 	   = fld;
						info.listid    = educid;
						
						info.vals 	   = [];
						info.vals.push({
							"educbgtype"		 :educbgtype,
							"nameofsch" 		 :$(document).find("#nameofsch").val(),
							"course"			 :$(document).find("#course").val(),
							"from_"	    		 :$(document).find("#from_").val(),
							"to_"				 :$(document).find("#to_").val(),
							"hlevel_unitsearned" :$(document).find("#hlevel_unitsearned").val(),
							"yeargrad"			 :$(document).find("#yeargrad").val(),
							"scho_honorrec"		 :$(document).find("#scho_honorrec").val()
						});
						
						p.callfunction("updateexisting");
						// p.opencomponent("educlist","pds/contents/c1/pi_components/educlist.php",thevall,"educbg","educbgtype");
						p.opencomponent("educlist","pds/contents/c1/pi_components/educlist.php",educbgtype,"educbg","educbgtype");
						$(document).find("#addanother").show();
						$(this).remove();
						
						$(document).find("#nameofsch").val(null);
						$(document).find("#course").val(null);
						$(document).find("#from_").val(null);
						$(document).find("#to_").val(null);
						$(document).find("#hlevel_unitsearned").val(null);
						$(document).find("#yeargrad").val(null);
						$(document).find("#scho_honorrec").val(null);
						
					}).appendTo("#btndivholder");
			});
		});
		
		$(document).on("click",".editcomponenteligs",function(){
			var eligid = $(this).data("value");
			var fld    = $(this).data("fld");
			var tbl    = $(this).data("tbl");
			
			// hide add button
			$(document).find("#addelig").hide();
			$(document).find("#updatecomp").remove();
				
			p.getData(eligid, fld, tbl, function(d){
				if (d.length > 0) {
					var fndmatch 	   = false;
					
						$("#etype > option").each(function(){
							if (d[0].etype == this.value) {
								fndmatch = true;
							}
						});
						
					if (fndmatch == false) {
						$("<option value='"+d[0].etype+"' selected> "+d[0].etype+" </option>").appendTo("#etype");
					} else {
						$(document).find("#etype").val(d[0].etype);
					}					
					
					/*
					if (etype == "others"){
						$(document).find("#eligothers").show();
						$(document).find("#eligotherstext").val(etype);
					} else {
						$(document).find("#eligothers").hide();
					}
					*/
					
					let encodedval = decodeURI(d[0].placeofexam);
					
					$(document).find("#rating").val(d[0].rating);
					$(document).find("#dateofexam").val(d[0].dateofexam);
					$(document).find("#placeofexam").val(encodedval);
					$(document).find("#licnum").val(d[0].licnum);
					$(document).find("#dateofval").val(d[0].dateofval);
					
					if (d[0].dateofval.length <= 1) {
						$(document).find("#notapp").prop('checked', true);
					} else {
						$(document).find("#notapp").prop('checked', false);
					}
					
					$("<button class='btn btn-primary' id='updatecomp'> Update </button>")
						.on("click", function(){
							info.boxbelong = "pdsdb.dbo.eligibility";
							info.fld 	   = fld;
							info.tbl 	   = tbl;
							info.listid    = eligid;
							
							var ispresent = document.getElementById("notapp");
							
							var dateval   = null;
							if (ispresent.checked) {
								dateval = null;
							} else {
								dateval = $(document).find("#dateofval").val()
							}
							
							info.vals 	   = [];
							info.vals.push({
								"etype"		  : $(document).find("#etype").val(),
								"rating"	  : $(document).find("#rating").val(),
								"dateofexam"  : $(document).find("#dateofexam").val(),
								"placeofexam" : $(document).find("#placeofexam").val(),
								"licnum"	  : $(document).find("#licnum").val(),
								"dateofval"	  : dateval
							});
							
							//console.log(info);
							p.callfunction("updateexisting");
							p.opencomponent("listofeligs","pds/contents/c2/c2_components/listofeligs.php","1","eligibility","1");
							
							$(document).find("#rating").val(null);
							$(document).find("#dateofexam").val(null);
							$(document).find("#placeofexam").val(null);
							$(document).find("#licnum").val(null);
							$(document).find("#dateofval").val(null);
							$(document).find("#notapp").prop('checked', false);
							
							$(document).find("#addelig").show();
							$(this).remove();
								
						}).appendTo("#divholder");
				}
			});
		});

		$(document).on("click",".editcomponent_work",function(){
			var workid = $(this).data("value");
			var fld    = $(this).data("fld");
			var tbl    = $(this).data("tbl");
			
			var from_val = null;
			var to_val   = null;
			
			// hide  the save buttn
				$(document).find("#addworkexp").hide();
			// end 
			// remove update work 
				$(document).find("#updatework").remove();
			// end 
			
			$(document).on("change","#from_",function(){
				from_val = $(this).val();
			});
			
			$(document).on("change","#to_",function(){
				to_val   = $(this).val();
			});
						
			p.getData(workid,fld,tbl,function(data){
				if (data.length > 0) {
					$(document).find("#fromedit").text(data[0].from_);
					$(document).find("#toedit").text(data[0].to_);
				
					//$(document).find("#from_").val(data[0].from_);
					//$(document).find("#to_").val(data[0].to_);
					
					$(document).find("#postitle").val(data[0].postitle);
					$(document).find("#dept").val(data[0].dept);
					$(document).find("#monthsal").val(data[0].monthsal);
					$(document).find("#paygrade").val(data[0].paygrade);
					$(document).find("#statofapp").val(data[0].statofapp);
					$(document).find("#govserv").val(data[0].govserv);
					
					from_val = data[0].from_;
					to_val   = data[0].to_;
					
					$("<button class='btn btn-primary' id='updatework'> Update </button>")
						.on("click",function(){
							info.boxbelong = "pdsdb.dbo.workexp";
							info.listid    = workid;
							info.fld 	   = fld;
							info.tbl 	   = tbl;
							
							info.vals 	   = [];
							
							var ispresent = document.getElementById("presentchck");
								
							if (ispresent.checked) {
								to_val = "present";
							} else {
								to_val   = data[0].to_;
							}
							
							var a_from = $(document).find("#from_").val();
							var a_to   = $(document).find("#to_").val();
							
							if (a_from.length != 0) {
								from_val = a_from;
							}
							
							if (a_to.length != 0) {
								to_val = a_to;
							}
							
							info.vals.push({
								"from_"	: from_val, // $(document).find("#from_").val(),
								"to_"	: to_val, //$(document).find("#to_").val(),
								"postitle"	: $(document).find("#postitle").val(),
								"dept"	: $(document).find("#dept").val(),
								"monthsal"	: $(document).find("#monthsal").val(),
								"paygrade"	: $(document).find("#paygrade").val(),
								"statofapp"	: $(document).find("#statofapp").val(),
								"govserv"	: $(document).find("#govserv").val(),
							});
							
							p.callfunction ("updateexisting");
							p.opencomponent("listofwexp","pds/contents/c2/c2_components/workexp.php","1","workexp","1");
							
							$(document).find("#from_").val(null);
							$(document).find("#to_").val(null);
							$(document).find("#postitle").val(null);
							$(document).find("#dept").val(null);
							$(document).find("#monthsal").val(null);
							$(document).find("#paygrade").val(null);
							$(document).find("#statofapp").val(null);
							$(document).find("#govserv").val(null);
							
							$(this).remove();
							
							// show the add button
								$(document).find("#addworkexp").show();
							// end 
							
							// clean the dates
							$(document).find("#fromedit").text(null);
							$(document).find("#toedit").text(null);
							// end cleaning dates
							
							// uncheck the present checkbox 
							$(document).find("#presentchck").prop("checked", false);
							//
							
						}).appendTo("#divholder");
				}
			});
		});
		
		$(document).on("click",".deletecomponent",function(){
			var conf = confirm("Are you sure you want to delete this item?");
			if (!conf) { return; }
			
			var val = $(this).data("value");
			var fld = $(this).data('fld');
			var tbl = $(this).data("tbl");	
			
			var details = [];
				details["boxbelong"] = tbl;
				details["field"]     = fld,
				details["value"]	 = val;
			
			info.boxbelong = tbl;
			info.field 	   = fld;
			info.value 	   = val;
			
			p.callfunction("deleteitem");
			// p.opencomponent( "listofchild" , "pds/contents/c1/pi_components/listofchildren.php",'1',"children","1" );
			
			//	alert(openedshowid+","+openedcomponent+","+openedval+","+openedtbl+","+openedfld);
			
			if (openedcomponent == null) {
				alert("Deleted");
				window.location.reload();
			} else {
				p.opencomponent(openedshowid,openedcomponent,openedval,openedtbl,openedfld);
			}
		});
		
		$(document).on("click",".editcomponent_inv", function(){
			var invid  = $(this).data("value");
			var fld    = $(this).data("fld");
			var tbl    = $(this).data("tbl");
			
			// hide the add button 
				$(document).find("#addinv").hide();
			// end
			
			// remove the existing update button of invi 
				$(document).find("#invidbtn").remove();
			// 
			
			var from_val = null, to_val = null;
			
			$(document).on("change","#from_",function(){
				from_val = $(this).val();
			});
					
			$(document).on("change","#to_",function(){
				to_val   = $(this).val();
			});
			
			p.getData(invid,fld,tbl,function(data){
				if (data.length > 0) {
					
					from_val = data[0].from_;
					to_val   = data[0].to_;

					$(document).find("#org").val(data[0].org);
					$(document).find("#addroforg").val(data[0].addroforg);
					$(document).find("#from_text").text(from_val);
					$(document).find("#to_text").text(to_val);
					$(document).find("#numofhrs").val(data[0].numofhrs);
					$(document).find("#post_natofwork").val(data[0].post_natofwork);
					
					$("<button class='btn btn-primary' id='invidbtn'> Update </button>")
						.on("click", function(){
							info.boxbelong = "pdsdb.dbo.involvements";
							info.listid    = invid;
							info.fld 	   = fld;
							info.tbl 	   = tbl;
							
							info.vals 	   = [];
							
							var ispresent  = document.getElementById("presentchckinv");
						
							if (ispresent.checked) {
								to_val  = "present";
							} else {
								to_val  = data[0].to_;
							}
							
							var a_from = $(document).find("#from_").val();
							var a_to   = $(document).find("#to_").val();
							
							if (a_from.length != 0) {
								from_val = a_from;
							}
							
							if (a_to.length != 0) {
								to_val = a_to;
							}
							
							info.vals.push({
								"org" 				: $(document).find("#org").val(),
								"addroforg" 		: $(document).find("#addroforg").val(),
								"from_" 			: from_val,
								"to_" 				: to_val,
								"numofhrs" 			: $(document).find("#numofhrs").val(),
								"post_natofwork" 	: $(document).find("#post_natofwork").val()
							});
							
							p.callfunction("updateexisting");
							p.opencomponent("invs","pds/contents/c3/c3_components/invs.php","1","involvements","1");
							
							// reset the doms
							$(document).find("#org").val(null);
							$(document).find("#addroforg").val(null);
							$(document).find("#from_text").text(null);
							$(document).find("#to_text").text(null);
							$(document).find("#from_").val(null);
							$(document).find("#to_").val(null);
							$(document).find("#numofhrs").val(null);
							$(document).find("#post_natofwork").val(null);
							// end 
							
							// remove the update button 
								$(this).remove();
							// 
							
							// show the add button 
								$(document).find("#addinv").show();
							// end
							
							// uncheck the present checkbox 
								$(document).find("#presentchckinv").prop("checked", false);
							// end 
						}).appendTo("#divholder");
				}
			});
		});
		
		$(document).on("click",".editcomponent_sems",function(){
			var semsid = $(this).data("value");
			var fld    = $(this).data("fld");
			var tbl    = $(this).data("tbl");
			
			$(document).find("#addnewsem").hide(); // hide the save button
			$(document).find("#semidbtn").remove(); // remove the update button 
			
			// add an update button
			p.getData(semsid,fld,tbl,function(data){
				if (data.length > 0) {
					$(document).find("#titleofprog").val(data[0].titleofprog).html();
					$(document).find("#from_").val(data[0].from_);
					$(document).find("#to_").val(data[0].to_);
					$(document).find("#numofhrs").val(data[0].numofhrs);
					$(document).find("#typeofsem").val(data[0].typeofsem);
					$(document).find("#conductedby").val(data[0].conductedby);
					
					$("<button class='btn btn-primary' id='semidbtn'> Update </button>")
						.on("click",function(){
							info.boxbelong = "pdsdb.dbo.seminars";
							info.listid    = semsid;
							info.fld 	   = fld;
							info.tbl 	   = tbl;
							
							info.vals 	   = [];
							info.vals.push({
								"titleofprog"	: $(document).find("#titleofprog").val(),
								"from_"			: $(document).find("#from_").val(),
								"to_"			: $(document).find("#to_").val(),
								"numofhrs"		: $(document).find("#numofhrs").val(),
								"typeofsem"		: $(document).find("#typeofsem").val(),
								"conductedby"	: $(document).find("#conductedby").val()
							});
							
							p.callfunction("updateexisting");
							p.opencomponent("tands","pds/contents/c3/c3_components/seminars.php","1","seminars","1");
							
							$(document).find("#titleofprog").val(null);
							$(document).find("#from_").val(null);
							$(document).find("#to_").val(null);
							$(document).find("#numofhrs").val(null);
							$(document).find("#typeofsem").val(null);
							$(document).find("#conductedby").val(null);
							
							$(this).remove();
							$(document).find("#addnewsem").show();
						}).appendTo("#btnholder");
				}
			});
		});
		
		$(document).on("click",".editcomponentotherinfo", function(){
			var oiid = $(this).data("value");
			var fld    = $(this).data("fld");
			var tbl    = $(this).data("tbl");
			
			$(document).find("#updateoi").remove();
			$(document).find("#addnewoi").hide();
			
			p.getData(oiid,fld,tbl,function(data){
				if (data.length > 0) {
					$(document).find("#typeofoi").val(data[0].typeofoi);
					//$(document).find("#typeofoi").text(data[0].oidescription);
					$(document).find("#theoi").val(data[0].theinfo);
					
					var typeofoi = $(document).find("#typeofoi").val(data[0].typeofoi);
					
					$("<button class='btn btn-primary' id='updateoi'> Update </button>")
						.on("click", function(){		
							info.boxbelong = "pdsdb.dbo.otherinfo";
							info.listid    = oiid;
							info.fld 	   = fld;
							info.tbl 	   = tbl;
							
							info.vals 	   = [];
							info.vals.push({
								"typeofoi" 		: $(document).find("#typeofoi").val(),
								"oidescription" : $(document).find("#typeofoi").text(),
								"theinfo"		: $(document).find("#theoi").val()
							});
							
							var toi  = $(document).find("#typeofoi").val();
							var comp = null;
							switch(toi) {
								case "ssh":
									comp = "ss";
									break;
								case "nadr":
									comp = "recog";
									break;
								case "miao":
									comp = "mems";
									break;
							}
							
							p.callfunction("updateexisting");
							p.opencomponent(comp,"pds/contents/c3/c3_components/otherinfo.php",toi,"otherinfo","typeofoi");
							
							$(document).find("#theoi").val(null);
							
							$(this).remove();
							$(document).find("#addnewoi").show();
			
						}).appendTo("#btnholder");
				}
			});
		});
		
		$(document).on("click",".editcomponent_ref", function(){
			var refid  = $(this).data("value");
			var fld    = $(this).data("fld");
			var tbl    = $(this).data("tbl");
			
			$(document).find("#updateref").remove();
			$(document).find("#addref").hide();
			
			p.getData(refid,fld,tbl,function(data){
				if (data.length > 0) {
					$(document).find("#name").val(data[0].name);
					$(document).find("#addr").val(data[0].addr);
					$(document).find("#telnum").val(data[0].telnum);
					
					$("<button class='btn btn-primary' id='updateref'> Update </button>")
						.on("click", function(){
							info.boxbelong = "pdsdb.dbo.reference";
							info.listid    = refid;
							info.fld 	   = fld;
							info.tbl 	   = tbl;
							
							info.vals 	   = [];
							info.vals.push({
								"name"		: $(document).find("#name").val(),
								"addr"		: $(document).find("#addr").val(),
								"telnum"	: $(document).find("#telnum").val()
							});
							
							p.callfunction("updateexisting");
							p.opencomponent("refs","pds/contents/c4/c4_components/references.php",'1',"reference","1");
							
							// reset doms
								$(document).find("#name").val(null);
								$(document).find("#addr").val(null);
								$(document).find("#telnum").val(null);
								
								$(this).remove();
								$(document).find("#addref").show();
							// end 
							
						}).appendTo("#divbtnholder");
				}
			});
		});
		
		$(document).on("click",".editcomponent_ids",function(){
			var idsid  = $(this).data("value");
			var fld    = $(this).data("fld");
			var tbl    = $(this).data("tbl");
			
			$(document).find("#updatebtn").remove();
			$(document).find("#addanid").hide();
			
			p.getData(idsid,fld,tbl,function(data){
				if (data.length > 0) {
					$(document).find("#issuedid").val(data[0].issuedid);
					$(document).find("#idnum").val(data[0].idnum);
					$(document).find("#dateofiss").val(data[0].dateofiss);
					$(document).find("#placeofiss").val(data[0].placeofiss);
					
					$("<button class='btn btn-primary' id='updatebtn'> Update </button>")
						.on("click", function(){
							info.boxbelong = "pdsdb.dbo.identification";
							info.listid    = idsid;
							info.fld 	   = fld;
							info.tbl 	   = tbl;
							
							info.vals 	   = [];
							info.vals.push({
								"issuedid"		: $(document).find("#issuedid").val(),
								"idnum"			: $(document).find("#idnum").val(),
								"dateofiss"		: $(document).find("#dateofiss").val(),
								"placeofiss"	: $(document).find("#placeofiss").val(),
							});
							
							p.callfunction("updateexisting");
							p.opencomponent("idsissd","pds/contents/c4/c4_components/listofids.php",'1',"identification","1");
							
							//reset 
								$(document).find("#issuedid").val(null);
								$(document).find("#idnum").val(null);
								$(document).find("#dateofiss").val(null);
								$(document).find("#placeofiss").val(null);
								
								$(this).remove();
								$(document).find("#addanid").show();
							//end 	
						}).appendTo("#btnholder");
				}
			});
		});
		
		$(document).find(".selecttype").on("change",function(){
			info.field = $(this).attr("id");
			info.value = $(this).val();
			info.boxbelong = $(document).find("#headertext").data("boxbelong");
			
			p.save( $(this) );
		});
		
		$(document).on("click","#createbtn",function(){
			$.ajax({
				url 		: url+"Pdsajax/createpds",
				type 		: "GET",
				data 		: { a : true },
				dataType 	: "json",
				success 	: function(data) {
					if (data == "true") {
						window.location.reload();
					}
				}, error 	: function(a,b,c) {
					alert(a+b+c);
				}
			})
		});
		
		$(document).on("click",".printbtn",function(){
			$(document).find("#loadingtxt").html("loading...");
			var sec  = 3000;
			
			var printwhat = $(this).data("print");
			
			var printthis = null;
			switch(printwhat) {
				case "all": printthis = "printpds"; break;
				case "c1": printthis = "printc1"; break;
				case "c2": printthis = "printc2"; break;
				case "c3": printthis = "printc3"; break;
				case "c4": printthis = "printc4"; break;
			}
			
			var site = url+"Pds/"+printthis;
				document.getElementById("printablearea").src = site;
				
			var count = 3;
			
			var play = setInterval(function(){
							if (count==0) {
								var myIframe = document.getElementById("printablearea").contentWindow;
									myIframe.focus();
									myIframe.print();
								
								$(document).find("#loadingtxt").html("");
								clearInterval(play);
								return;
							}
						
						var lbl = "seconds";
							if (count==1) {
								lbl = "second";
							}
							
							$(document).find("#loadingtxt").html("preparing in <g class='cnt'>"+count+"</g> "+lbl);
							count--;
							
						},1000);
			
		});
		
		$(document).on("click",".btnanswer",function(){
			info.boxbelong = "pdsdb.dbo.questiontbl";
			info.fld 	   = $(this).data("val");
			info.val  	   = $(this).val();
			
			if (info.val == "no") {
				$(this).parent().parent().find(".inputdiv").hide();
			} else {
				$(this).parent().parent().find(".inputdiv").show();
			}
			
			$(this).parent().removeClass("btn-secondary").addClass("btn-primary");
			$(this).parent().siblings("label").removeClass("btn-primary").addClass("btn-secondary");
			
			p.callfunction("insertupdate_q");
			
			
		});
		
		$(document).on("click","#addref",function(){
			info.boxbelong = "pdsdb.dbo.reference";
			
			info.vals 	   = [];
				
				info.vals.push({
					"name"		: $(document).find("#name").val(),
					"addr"		: $(document).find("#addr").val(),
					"telnum"	: $(document).find("#telnum").val()
				});
			
			p.callfunction("appendasnew");
			
			setTimeout(function(){
				p.opencomponent("refs","pds/contents/c4/c4_components/references.php",'1',"reference","1");
			},300);
		});
		
		$(document).on("click","#addanid",function(){
			info.boxbelong = "pdsdb.dbo.identification";
			
			info.vals 	   = [];
				
				info.vals.push({
					"issuedid"		: $(document).find("#issuedid").val(),
					"idnum"			: $(document).find("#idnum").val(),
					"dateofiss"		: $(document).find("#dateofiss").val(),
					"placeofiss"	: $(document).find("#placeofiss").val()
				});
			
			$(document).find("#issuedid").val(null);
			$(document).find("#idnum").val(null);
			$(document).find("#dateofiss").val(null);
			$(document).find("#placeofiss").val(null);
			
			p.callfunction("appendasnew");
			
			setTimeout(function(){
				p.opencomponent("idsissd","pds/contents/c4/c4_components/listofids.php",'1',"identification","1");
			},300);
		});
		
		$(document).on("click",".chckbox",function(){
			var ticked 	   = $(this).is(":checked");
			var id 	   	   = $(this).attr("id");

			info.field 	   = id;
			info.value 	   = ticked;
			info.boxbelong = $(document).find("#headertext").data("boxbelong");
			
			if (id != "isdual") {
				// save 
				p.save( $(this) );
			} else {
				$(document).find(".disappearing").show();
			}
		});
		
		$(document).find(".tabselect li").on("click",function(){
			$(this).addClass("citsselect").siblings().removeClass("citsselect");
			
			var citselect = $(this).data("citselect");
			
			// info.boxbelong = citselect;
			info.field 	   = "addrtype";
			info.value 	   = info.fldval = citselect;
			info.boxbelong = "pdsdb.dbo.addresses";
		
			p.save($(this),"savenew");
			
			// 
			$(document).find("#saved").remove();
			$(document).find("#addrbox").show();
			
			// display the addr 
				// opencomponent = function(showid,component)
				p.opencomponent("addrbox","pds/contents/c1/pi_components/address.php",citselect,"addresses","addrtype");
			// end
		});
		
		$(document).on("click","#addchild",function(){
			info.boxbelong 	= "pdsdb.dbo.children";
			info.vals 	= [];
				
				info.vals.push( {"childname": $(document).find("#childname").val() ,"childbdate": $(document).find("#childbdate").val()} );
			//	info.vals.push( {"childname":"jalvin"} );
			//	info.vals.push( {"childname":"malvin"} );
				
			p.callfunction( "appendasnew" );
			
			// opencomponent = function(showid,component, val, tbl, fld)
			p.opencomponent( "listofchild" , "pds/contents/c1/pi_components/listofchildren.php",'1',"children","1" );
		});
		
		// for edit list of child button :: mark here
		$(document).on("click",".editcomponent_listofchildren",function(){
			// id_, idfld_ , tbl_ 
			var childid = $(this).data("value");
			p.getData(childid,"childid", "children",function(data){
				if (data.length > 0) {
					$(document).find("#childname").val(data[0].childname);
					$(document).find("#childbdate").val(data[0].childbdate);
					
					// hide add button
					$(document).find("#addchild").hide();
					// end 
					
					$("<button class='btn btn-primary'>Update</button>")
						.on("click", function(){
							// mark here
							info.boxbelong 	= "pdsdb.dbo.children";
							info.listid     = childid;
							info.fld 		= "childid";
							info.vals 		= [];
						
								info.vals.push({"childname": $(document).find("#childname").val() ,
												 "childbdate": $(document).find("#childbdate").val() });
												 
								// console.log(info);
							p.callfunction( "updateexisting" );
							p.opencomponent( "listofchild" , "pds/contents/c1/pi_components/listofchildren.php",'1',"children","1" );
								
							// unhide add button
							$(document).find("#addchild").show();
							$(this).remove();
							
							// reset 
							$(document).find("#childbdate").val(null)
							$(document).find("#childname").val(null)
							
						}).appendTo("#childbtndiv");
				}
			});
		});
		// end
		
		
		$(document).on("click",".closeright",function(){
			var conf = confirm("Are you sure you want to delete this?");
			
			if (conf) {
				info.boxbelong = "children";
				info.field     = "childid";
				info.value     = $(this).data("childid");
				
				p.callfunction( "deleteitem" );
				p.opencomponent( "listofchild" , "pds/contents/c1/pi_components/listofchildren.php",'1',"children","1" );
			}
		});
		
		$(document).on("click",".eductype",async function() {
			info.boxbelong = selboxbel = "pdsdb.dbo.educbg";
			info.field 	   = selfield = "educbgtype";
			info.value 	   = info.eductype = seleduclist = $(this).data("eductype");
			
		//	p.save( $(this), "savenew");
			p.opencomponent("educcontent","pds/contents/c1/pi_components/educbg.php",info.value,'educbg',info.field);
			
			$(this).siblings().removeClass("educselect");
			$(this).addClass("educselect");
			
		 	setTimeout(function(){
				p.opencomponent("educlist","pds/contents/c1/pi_components/educlist.php",info.eductype,"educbg","educbgtype");
			},2000);
		
		});
		
		$(document).on("change","#etype",function(){
			if ($(this).val()=="others"){
				$(document).find("#eligothers").show();
			} else {
				$(document).find("#eligothers").hide();
			}
		})
		
		$(document).on("click","#addelig",function(){
			info.boxbelong = "pdsdb.dbo.eligibility";
			info.vals = [];
				/*
					etype
					rating
					dateofexam
					placeofexam
					licnum
					dateofval
				*/
			var dateofval = $(document).find("#dateofval").val();
			var ischeck   = document.getElementById("notapp");
			
			if (ischeck.checked == true) {
				dateofval = null;
			}
			
			var etype = $(document).find("#etype").val();
			
			if (etype == "others") {
				etype = $(document).find("#eligotherstext").val();
			} else {
				etype = $(document).find("#etype").val();
			}
			
				info.vals.push({
					"etype"			: etype,
					"rating"		: $(document).find("#rating").val(),
					"dateofexam"	: $(document).find("#dateofexam").val(),
					"placeofexam"	: $(document).find("#placeofexam").val(),
					"licnum"		: $(document).find("#licnum").val(),
					"dateofval"		: dateofval
				});
			
			$(document).find("#rating").val(null);
			$(document).find("#dateofexam").val(null);
			$(document).find("#placeofexam").val(null);
			$(document).find("#licnum").val(null);
			$(document).find("#dateofval").val(null);
			
			p.callfunction("appendasnew");
			
			setTimeout(function(){
				p.opencomponent("listofeligs","pds/contents/c2/c2_components/listofeligs.php","1","eligibility","1");
			},300);
		});
		
		
		$(document).on("click","#addworkexp",function(){
			info.boxbelong = "pdsdb.dbo.workexp";
			info.vals      = [];
			
				/*
					from_
					to_
					postitle
					dept
					monthsal
					paygrade
					statofapp
					govserv
				*/
				
				var todate = $(document).find("#to_").val();
				
				var ischeck = document.getElementById("presentchck");
				
				if (ischeck.checked == true) {
					todate = "present";
				}
				
				info.vals.push({
					"from_"		: $(document).find("#from_").val(),
					"to_"		: todate,
					"postitle"  : $(document).find("#postitle").val(),
					"dept"		: $(document).find("#dept").val(),
					"monthsal"	: $(document).find("#monthsal").val(),
					"paygrade"	: $(document).find("#paygrade").val(),
					"statofapp" : $(document).find("#statofapp").val(),
					"govserv"	: $(document).find("#govserv").val()
				});
				
				p.callfunction("appendasnew");
				
				setTimeout(function(){
					p.opencomponent("listofwexp","pds/contents/c2/c2_components/workexp.php","1","workexp","1");
				},300);
		});
		
		$(document).find("#oi_caption").text( $(document).find("#typeofoi :selected").text() );
		
		$(document).on("change","#typeofoi",function(){
			var txt = $(document).find("#typeofoi :selected").text(), val = $(this).val();
			
			$(document).find("#oi_caption").text(txt);
			
			info.typeofoi = val;
			info.oidesc   = txt;
		});
		
		$(document).on("click","#addnewoi",function(){
			info.boxbelong = "pdsdb.dbo.otherinfo";
			
			// var typeofoi = info.typeofoi;
			var typeofoi = info.typeofoi = $(document).find("#typeofoi").val();
			var oidesc   = info.oidesc = $(document).find("#theoi").val();
			
			info.vals 	   = [];
			
				info.vals.push({
					"typeofoi"			: typeofoi,
					"oidescription"		: oidesc,
					"theinfo"			: $(document).find("#theoi").val()
				});
			
			// call function appendasnew
			p.callfunction("appendasnew");
			
			var comp = null;
			switch(typeofoi) {
				case "ssh":
					comp = "ss";
					break;
				case "nadr":
					comp = "recog";
					break;
				case "miao":
					comp = "mems";
					break;
			}
			
			// open a component 
			
			setTimeout(function(){
				p.opencomponent(comp,"pds/contents/c3/c3_components/otherinfo.php",typeofoi,"otherinfo","typeofoi");
			},300);
		});
		
		$(document).on("click","#addnewsem",function(){
			info.boxbelong = "pdsdb.dbo.seminars";
			info.vals 	   = [];
			
				/*
				titleofprog
				from_
				to_
				numofhrs
				typeofsem
				conductedby
				*/
				
				info.vals.push({
					"titleofprog"	: $(document).find("#titleofprog").val(),
					"from_"			: $(document).find("#from_").val(),
					"to_"			: $(document).find("#to_").val(),
					"numofhrs"		: $(document).find("#numofhrs").val(),
					"typeofsem"		: $(document).find("#typeofsem").val(),
					"conductedby"	: $(document).find("#conductedby").val()
				});
				
			p.callfunction("appendasnew");
			
			setTimeout(function(){
				p.opencomponent("tands","pds/contents/c3/c3_components/seminars.php","1","seminars","1");
			},300);
		});
		
		$(document).on("click","#addinv",function(){
			info.boxbelong = "pdsdb.dbo.involvements";
			info.vals	   = [];
			
			/*
			org
			addroforg
			from_
			to_
			numofhrs
			post_natofwork
			status
			*/
			
			var to_ = $(document).find("#to_").val();
			
			var ischeck = document.getElementById("presentchckinv");
				
				if (ischeck.checked == true) {
					to_ = "present";
				}
			
				info.vals.push({
					"org"				: $(document).find("#org").val(),
					"addroforg"			: $(document).find("#addroforg").val(),
					"from_"				: $(document).find("#from_").val(),
					"to_"				: to_,
					"numofhrs"			: $(document).find("#numofhrs").val(),
					"post_natofwork"	: $(document).find("#post_natofwork").val()
				});
				
				p.callfunction("appendasnew");
				
				setTimeout(function(){
					p.opencomponent("invs","pds/contents/c3/c3_components/invs.php","1","involvements","1");
				},300);
		});
	
		$(document).on("click","#addanother",function(){
			
			info.boxbelong = selboxbel;
			info.eductype  = seleduclist;
			info.field     = selfield;
			info.value     = seleduclist;
			
			info.vals = [];
				/*
				educbgtype
				nameofsch
				course
				from
				to
				hlevel_unitsearned
				yeargrad
				scho_honorrec
				*/
			var order = null;
			
			// for redunduncy 
			var thevall = info.eductype;
			
			switch(info.eductype) {
				case "elementary":	order = 1; break;
				case "secondary":	order = 2; break;
				case "voctrd":		order = 3; break;
				case "college":		order = 4; break;
				case "gradstud":	order = 5; break;
			}
				info.vals.push( { "educbgtype" 			: info.eductype,
								  "nameofsch"  			: $(document).find("#nameofsch").val(),
								  "course"	   			: $(document).find("#course").val(),
								  "from_"	   			: $(document).find("#from_").val(),
								  "to_"		   			: $(document).find("#to_").val(),
								  "hlevel_unitsearned" 	: $(document).find("#hlevel_unitsearned").val(),
								  "yeargrad"   			: $(document).find("#yeargrad").val(),
								  "scho_honorrec" 		: $(document).find("#scho_honorrec").val(),
								  "poorder"				: order
								} );
	
			p.callfunction("appendasnew");
			
			setTimeout(function(){
				p.opencomponent("educlist","pds/contents/c1/pi_components/educlist.php",thevall,"educbg","educbgtype");
			},300);
			
		});
		
		$(document).on("click","#saveandexit",function(){
			alert("All information is successfully saved. You will be redirected to the main page after you click ok.");
			window.location.href = url+"/pds";
		});
	}

	this.save = function(dis, func = "saveinput") {
			$(document).find("#saved").remove();
			$("<small id='saved' class='saving'>saving...</small>").appendTo( dis.parent() );
			
			$.ajax({
				url 	 : url+'Pdsajax/'+func,
				type	 : "GET",
				data 	 : { d : info },
				dataType : "json",
				success	 : function(data) {
					if (data == true) {
						// $("<small id='saved'>saved</small>").appendTo( dis.parent() );
						$(document).find("#saved").removeClass("saving").addClass("saveclass").text("Saved"); //saveclass
						//info = new Object();
					
						// remove address residues
						delete info.isaddr;
					}
					
					if (func != "saveinput") {
						// console.log(data);
					}
					
					if ( typeof data == "object" ) {
						$(document).find("#saved").remove();
					}
				}, error : function(a,b,c) {
					// alert(a+b+c);
					$(document).find("#saved").remove();
					$("<small id='saved' class='errorclass'>error saving...</small>").appendTo( dis.parent() );
					alert("an error occured");
				}
			});
	
	}
	
	this.callfunction = function( func ) {
			$.ajax({
				url 	: url+"Pdsajax/"+func,
				type 	: "GET",
				data 	: { d : info },
				dataType: "json",
				success : function(data) {
					if (data) {
						
					}
					info = new Object();
				}, error : function() {
					alert("Your log in must have expired. This page is refreshing."); window.location.reload();
				}
			})
	}
	
	this.opencomponent = function(showid,component, val, tbl, fld) {
		$(document)
			.find("#"+showid).html("loading component...")
				.load(url+"Pdsajax/opencomponent",{ view : component,
													theval : val,
													tbl_ : tbl,
													field : fld },function(){
			
				});
				
		openedcomponent 	= component, 
		openedshowid 		= showid, 
		openedval 			= val, 
		openedtbl 			= tbl, 
		openedfld 			= fld;
	}
	
	this.checklogin = function() {
		$.ajax({
			url 	: url+"Pdsajax/checklogin",
			type 	: "GET",
			dataType: "json",
			success : function(data) {
				if (data !== null) {
					window.location.reload();
				} else {
					var pp = new procs();
						p.checklogin();

				}
			}, error : function() {
				alert("error");
			}
		})
	}
	
	this.getData = function(id_, idfld_ , tbl_ , func) {
		$.ajax({
			url 	 : url+"Pdsajax/getdata",
			type 	 : "GET",
			data 	 : { id : id_ , idfld : idfld_ , tbl : tbl_ },
			dataType : "json",
			success  : function(data) {
				func(data);
			}, error : function() {
				alert("error");
			}
		})
	}
	
	/*
	this.editcomponent = function(tblid, tblfld, tbl, func) {
		$.ajax({
			url 	 : url+"Pdsajax/getdata",
			type 	 : "GET",
			data 	 : id : tblid, idfld : tblfld , tbl : tbl,
			dataType : "json",
			success  : function(data) {
				func(data);
			}, error : function() {
				alert("error in editing children");
				window.location.reload();
			}
		});
	}
	*/
}

var p = new procs();

window.onload = function() {
	p.listen();
	
	//:: https://office.minda.gov.ph:9003/pds/
	var url = window.location.href;
		
	var urlsplit = url.split("/");
	
	if (urlsplit[3] === "pds") {
		//p.checklogin();
	}
}