function dtrprocs() {
	// checked date
		var checkdates = [];
	// end checkdate 

	// attachments 
		var attachments = new Object();
	// end attachments 

	// needs supporting documents 
		var needs_sup_docs;
	// end 
	
	// selected element
		var selected_el = null;
	// selected element
	
	// variables 
		var vars = new Object();
	// variables
	
	this.__construct = function() {
		// if documents are all in ready
			$(document).ready(function(){
				
				if (typeof fromwhatwindow == "undefined") {
				// display the table 
					dp.displaytime(empid, empbio, from, to);
				// end 
				
				// atmclue click
					dp.attclue();
				// end
				
				// FILTER THE DATE OF DTR COVERAGES
					dp.filterdate();
				// END  
				
				if (isowner	== 1) {
					// STASHING OF FILE 
						dp.stashfile();
					// END 
				
					// TABLE CLICK
						dp.tableclick();
					// END 
				
					// select what kind of attachment 
						dp.whattoatt();
					// end 
				

					
					// attachment click 
						$(document).on("click",".attach_click", function(){
							selected_el = $(this).data("elid");
						})
					// end 
					
					// listen to save button
						dp.savethefile();
					// end 
					
					// listen to removal of attachment 
						dp.removeatt();
					// end 
				
					// listen to submit dtr button 
						dp.submitdtr();
					// end 
					
					// listen to re-send button 
						dp.resenddtr();
					// end 
				}
				
				if (isadmin == 1) {
					dp.adminpanel();
				}
				
				// listen to use calendar
					dp.usecalendar();
				// end 
			} else {// should not be called when this script is attached to TO
				dp.stashfile();
				selected_el = 0;
			}
		})
		// end 
	}
	
	this.remindi = function(a,exactid) {
		var id = a.id;
		
		if (id == 'remtimeindi') {
			$(document).find("#wrapleft").remove();
			$("<div>",{ id:"wrapleft" }).insertAfter(a);
			$("<ul>",{ id:"ulid"}).appendTo("#wrapleft");
			
			performajax(["My/getamstime",{ ei : exactid	}],function(data){
					
				if (data.length > 0) {
					for(var i=0;i<=data.length-1;i++) {
						$("<li>"+data[i]['checktime']+" <button class='btn-danger btn-xs removecheckams' data-chckams='"+data[i]['exact_logs_id']+"'> remove </button> </li>")
							.appendTo("#ulid");
					}
					$("<i class='fa fa-times closebtn' aria-hidden='true'></i>")
						.on("click",function(){
							$(document).find("#wrapleft").remove();
						}).appendTo("#wrapleft");
				} else {
					$("<p> No record found </p>").appendTo("#wrapleft");
				}
			})
			
			$(document).on("click",".removecheckams",function(){
				performajax(["My/chckams_delete",{ chcklogs : $(this).data("chckams"), ei : exactid}],function(removed){
					if (removed[0]) {
						alert("Time succesfully removed");
						
						if (removed[1]) {
							window.location.reload();
						} else {
							dp.remindi(a,exactid);
						}
					}
				})
			})
		}
	}
	
	this.ticks = function(what) {
		
		var lbl = document.getElementById("pstype");
		var todisplay = null;
		var classname = null;
		
		switch(what){
			case "personal":
				todisplay = "PERSONAL";
				classname = "personaltypeps";
				break;
			case "official":
				todisplay = "OFFICIAL";
				classname = "officialtypeps";
				break;
		}
		
		lbl.removeAttribute("class");
		lbl.setAttribute("class",classname);
		
		vars['pstype'] = todisplay;
		lbl.innerHTML  = todisplay;
		
	}
	
	this.adminpanel = function() {
		$(document).on("click","#timetable tbody tr", function(e){
			
		})
	}
	
	this.usecalendar = function() {
		
		$(document).on("click","#usecalendar",function(){
			// modal show 
				$(document).find('#selectcalendar').modal('show');
			// end modal
		})
		
		$(document).on("click","#showdates",function(){
			// https://office.minda.gov.ph:9003/my/dailytimerecords/389/306/2019-10-08/2019-10-21
			// 10/15/2019 - 10/23/2019
			
			var dates = calendarvar.split("-");
			var d1    = dates[0].split("/");
			var d2    = dates[1].split("/");
			
			var link = BASE_URL+"my/dailytimerecords/"+empid+"/"+empbio+"/"+d1[2].trim()+"-"+d1[0].trim()+"-"+d1[1].trim()+"/"+d2[2].trim()+"-"+d2[0].trim()+"-"+d2[1].trim();
			
			window.open(link,"_self");
		})
	}
	
	this.resenddtr = function() {
		$(document).on("click","#resendnow",function(){
			$("<div class='blackerdiv'></div>").prependTo(".leftdtr_div");
			var dtrsumrep  = $(this).data("dtrsumrep");
			
			var recom_updt = $(document).find("#recomappr").val();
			var finalappr  = $(document).find("#finalappr").val();
			
			$(document).find(".aatat").addClass("processing").text("resending DTR, please wait...");
			
			performajax(["My/resenddtr",{ dtrsumrep_ : dtrsumrep,
										  recom_ : recom_updt,
										  final_ : finalappr }],function(data){
				$(document).find(".aatat").addClass("processing").text("sending DTR to email, please wait...");
					performajax(["My/sendemail",{ empid_ : empid , bio_ : empbio , 
												  from_ : from , to_ : to ,
												  sendto : data['empid'],
												  unid_ : data['unid'],
												  subject : "resending you my DTR"}],function(sent){
						if (sent) {
							$(document).find(".aatat").removeClass("processing").text("DTR has been submitted. Reloading.");
								setTimeout(function(){
									window.location.reload();
								},3000)
							}
					})
			})
		})
	}
	
	this.submitdtr = function() {
		// submitnow
		// leftdtr_div
		$(document).on("click","#submitnow",function(){
			$("<div class='blackerdiv'></div>").prependTo(".leftdtr_div");
			var recomappr = $(document).find("#recomappr").val();
			var finalappr = $(document).find("#finalappr").val();
			
			$(document).find(".btmdiv").remove();
			
			$(document).find(".rstat").addClass("processing").text("computing DTR. Please wait...");
				setTimeout(function(){
					performajax(["My/deductionlogs",{ empid_ : empid , bio_ : empbio , 
													 from_ : from , to_ : to }], function(deds){
							
					$(document).find(".rstat").addClass("processing").text("please wait while we are including your information into the summary of reports...");
						setTimeout(function(){
							performajax(["My/submitdtr",{ from_:from, 
														  to_ : to, 
														  deds_ : deds,
														  recom : recomappr, 
														  fappr : finalappr }], function(unid){
															  
								$(document).find(".rstat").addClass("processing").text("creating a handshake request. Please wait...");
									setTimeout(function(){
										performajax(["My/createcountersign",{ recom  : recomappr, 
																			  fappr  : finalappr,
																			  unid_ : unid 
																			}], function(sendto_){
									
											$(document).find(".rstat").addClass("processing").text("Sending your DTR. Please wait.");
											performajax(["My/sendemail",{ empid_ : empid , bio_ : empbio , 
																		  from_ : from , to_ : to ,
																		  sendto : sendto_,
																		  unid_ : unid,
																		  subject : "I need approval of my DTR."}],function(sent){
												if (sent) {
													$(document).find(".rstat").removeClass("processing").text("Success.");
													alert("Your DTR has been submitted successfully");
													window.location.reload();
														/*
														setTimeout(function(){
															window.location.reload();
														},3000)
														*/
												}
											})
										})
									},3000);
							})
						},3000);
					})
				},3000)
		}) 
	}
	
	this.savethefile = function() {
		$(document).on("click","#savethefile",function(){
			vars['vartype'] = attachments[selected_el]['name'];
			// check for computation
			
			// end of checking
			
			/*
			if (attachments[selected_el]['attachment'].length == 0) { 
				var conf = confirm("You have not attached a supporting document. Are you sure you want to proceed?"); 
				if (!conf) { return; } 
			}
			*/
			
			// for pass slip 
				if (attachments[selected_el]['name'] == "PS") {
					vars['timeout'] = $(document).find("#timeout").val();
					vars['timein']  = $(document).find("#timein").val();
				}
			// end for pass slip
			
			// for justification 
				if (attachments[selected_el]['name'] == "J") {
					vars['time']    = $(document).find("#timevalue").val();
					vars['tofday']  = $(document).find("#timeofday").val();
					vars['reasons'] = $(document).find("#remarks").val();
 				}
			// end for justification 
		
			performajax(["My/savefile",{ att : attachments , 
										 thevars : vars ,
										 dates_ : checkdates ,
										 empid_ : empid }], function(data){
				if (data) {
					alert("Success");
					dp.resetapp();
					// window.location.reload();
				}
				// alert(data);
			})
			
		})
	}
	
	this.resetapp = function() {
		// checked date
			checkdates = [];
		// end checkdate 

		// attachments 
			attachments = new Object();
		// end attachments 

		// needs supporting documents 
			needs_sup_docs;
		// end 
					
		// selected element
			selected_el = null;
		// selected element
					
		// modal show 
			$(document).find('#modaldtrpop').modal('hide');
		// end modal
					
		dp.displaytime(empid, empbio, from, to);
		$(document).find("#showtblbtn").remove();
		
		$(document).find("#rightwindow").children().remove();
		$(document).find("#rightbottomdiv").children().remove();
		$(document).find("#attachmenttitle_m").children().remove();
	}
	
	this.removeatt = function() {
		// remove attachment 
			$(document).on("click",".removethisatm",function(){
				var exact_id = $(this).data("exactid");
				
				var conf = confirm("Deletion of an attachment cannot be undone. Do you want to proceed?");
				
				if (conf) {
					performajax(['My/delete_atm',{ exact_id : exact_id }], function (data){
						if (data == true) {
							// displaytimetable(empid, empbio, from, to);
							window.location.reload();
						}
					})
				}
			})
		// end removal of attachment 
	}
	
	this.attclue = function() {
		// add click event to atmtext
			$(document).on("click",".atmtext", function(){
				$(this).parent().parent().next().toggle("fast");
			})
		// end adding of click event to atmtext
	}
	
	this.whattoatt = function() {
		$(document).on("change","#attachmentselect",function(){
			var choice = $(this).val();
			
			var elid 		= "el-"+$("#attachmentsul").children().length;
			
			// set the selected element id 
				selected_el = elid;
			// end 
			
			var att_what = {"name"		   : null,
							"elid"		   : elid,
							"attachment"   : []
							};
			
			switch(choice) {
				case "att_ca":
					att_what['name']			= "CA";
					att_what['desc']			= "Certificate of Appearance";
					att_what['file']			= "attca";
					break;
				case "att_ps":
					att_what['name']			= "PS";
					att_what['desc']			= "Pass Slip";
					att_what['file']			= "attps";
					break;
				case "att_lv":
					
					break;
				case "att_ob":
					att_what['name']			= "OB";
					att_what['desc']			= "Official Business";
					att_what['file']			= "attob";
					break;
					
				case "att_am":
					att_what['name']			= "AMS";
					att_what['desc']			= "Official Business";
					att_what['file']			= "attam";
					break;
				case "att_js":
					att_what['name']			= "J";
					att_what['desc']			= "Justification";
					att_what['file']			= "attjust";
					break;
				case "att_pf":
					att_what['name']			= "PAF";
					att_what['desc']			= "Personnel Attendance Form";
					att_what['file']			= "attpaf";
					break;
				case "att_ab":
					att_what['name']			= "A";
					att_what['desc']			= "Absent - Without pay";
					att_what['file']			= "attabs";
					break;
			}
		
			attachments[elid] = att_what;
			
			dp.showwindow( att_what['file'] );
			dp.putname( att_what['desc'] );
			dp.rightbtm();
			
		})
	}
		
	this.putname = function(name) {
		$(document).find(".attachmenttitle_m").html("loading...")
			.load(BASE_URL+"My/putname",{name_:name},function(){
				
			})
	}
	
	this.remove_supportingdoc = function(filename) {	
		attachments[selected_el]['attachment'].splice( attachments[selected_el]['attachment'].indexOf(filename),1 );
		
		var text = "";
		for(var i = 0; i <= attachments[selected_el]['attachment'].length - 1; i++) {
			text += "<span>"+attachments[selected_el]['attachment'][i]+" <i class='fa fa-times-circle removedoc' title='remove this file' data-filename='"+filename+"'></i>  </span>, ";
		}
		
		return text;
	}
	
	this.filterdate = function() {
		// filter select 
			$(document).on("change","#filterselect",function(){
				var dates = $(this).val().split("|");
				
				var from = dates[0].trim();
				var to   = dates[1].trim();
				window.location.href = dtrurl+"my/dailytimerecords/"+empid+"/"+empbio+"/"+from+"/"+to;
			})
		// end filter 
	}
	
	this.tableclick = function() {
		// time table click		
		$(document).on("click","#timetable tbody tr", function(e){
			if ($(this).hasClass("attachmenttbl")) {
				return;
			}
			
			dp.addcheckdate( $(this).data("nicedate") );
			
			if ( $(this).hasClass("timeclicked") ) {
				$(this).removeClass("timeclicked");
				$(this).children("td").eq(0).children().remove();
			} else {
				$(this).addClass("timeclicked");
				$(this).children("td").eq(0).append("<i class='fa fa-check'></i>");
			}
			
			$(document).find("#showtblbtn").remove();
				
		//	var x = $(this).offset().top;
		//	var y = $(this).offset().left;
			
			var a = $(document).find(".timeclicked").length;
				//console.log( $(document).find(".timeclicked").eq(a-1) );
			
			var x = $(document).find(".timeclicked").eq(a-1).offset().top;
			var y = $(document).find(".timeclicked").eq(a-1).offset().left;	
			
			if (checkdates.length == 0) {
				$(document).find("#showtblbtn").remove();
			} else {
				if (e.target.className != "atmtext") {
					$("<p>",{ id : "showtblbtn" , class : "optiontbl_show" , html : " <i class='fa fa-paperclip' aria-hidden='true'></i> &nbsp; Attach Supporting document(s)" })
						.css({"top":x+31,"left":y,"position":"absolute"})
							.appendTo(document.body).on("click",function(){
								dp.addsupporting();
							});
				}
			}
		})
		// end time table click
	}
	
	this.stashfile = function() {
		// stash the file 
				$(document).on("change","#file",function(){
				
						var form = $('#fileinfo')[0]; // standard javascript object here
						var formData = new FormData(form);
						
						$("#savethefile").addClass("disabled");
						$('#output').html("uploading file please wait...");
						
						$.ajax({
							url: BASE_URL+'/upload/beginupload',
							type: 'POST',
							data: formData,
							processData: false,
							contentType: false,
							dataType : "json",
							success:function(data){
								$('#output').html(data['msg']);
								
								if (data['isok'] == 1) {
									var text = dp.add_supportingdoc(data['filename']);
									
								}
								
								$("#savethefile").removeClass("disabled");
							},
							error : function(a,b,c) {
								alert("Please check the file type of the file")
							},
							cache: false,
							contentType: false,
							processData: false
						});
					// });
				})
		// end of stashing the file 
		
		// remove supporting document 
			$(document).on("click",".removedoc",function(){
				var text = dp.remove_supportingdoc( $(this).data("filename") );
				
				$("#listofattachments").html( text );
			})
		// end 
	}
	
	this.showwindow = function(what_) {
		$(document).find("#rightwindow").html("loading please wait...")
			.load(BASE_URL+"My/showwindow",{ what : what_ },function(){
				
				// for CA
					$(document).on("change","#ca_timeselect",function(){
						attachments[selected_el]['timeoftheday'] = $(this).val();
					})
				// end 
				
				// tick 
					// dp.ticks();
				// end 
			
			})
	}
	
	this.rightbtm = function() {
		// attaching of documents and saving 
		$(document).find("#rightbottomdiv")
			.html("loading.. please wait")
			.load(BASE_URL+"my/rightbtm_window");
	}
	
	this.add_supportingdoc = function(filename, nameindb=false) {
		if (attachments[selected_el]['attachment'].length == 0) {
			attachments[selected_el]['attachment'].push(filename);
		} else {
			if ( attachments[selected_el]['attachment'].indexOf(filename) != -1 ) { // found
				attachments[selected_el]['attachment'].splice( attachments[selected_el]['attachment'].indexOf(filename),1 );
			} else { // not found
				attachments[selected_el]['attachment'].push(filename);
			}
		}
		
		var text = "";
		for(var i = 0; i <= attachments[selected_el]['attachment'].length - 1; i++) {
			text += "<span>"+attachments[selected_el]['attachment'][i]+" <i class='fa fa-times-circle removedoc' title='remove this file' data-filename='"+attachments[selected_el]['attachment'][i]+"'></i>  </span>, ";
		}
		
		$('#listofattachments').html( text );
		
		// return text;
	}
	
	this.addsupporting = function() {
		if (checkdates.length >= 1) {
			var texts = "";
			for(var i = 0; i<= checkdates.length-1; i++) {
				texts += " - ["+checkdates[i]+"]";
			}
			$("#checkdates").text(texts);
			$('#modaldtrpop').modal('show');
			
			// get the attached files
				// disp_att_files();
			// end getting the attached files
			
			$(document).find("#attachmentselect").show();
		}
	}
	
	this.displaytime = function(empid, empbio, from, to) {
		$("#timetbl_holder").html("loading...")
		needs_sup_docs = 0;
		$("#timetbl_holder").load(BASE_URL+"/my/timetable",{
									token  : "2309f30f02-0sj00234" ,  // not dynamic for the meantime
									from   : from, 					  // 2018-3-1
									to     : to, 					  // 2018-3-31
									emp    : empid,
									empbio : empbio }, function(data){
										var ns = $(document).find(".needsupp").children(".atmclue");
											for(var i = 0; i <= ns.length-1; i++) {
												needs_sup_docs += 1;
											}
								
									$("#dtrstatus").load(dtrurl+"/my/dtrstatus",{ datefrom : from , dateto : to , emp : empid , ic_dates : needs_sup_docs })
									return;
									
										if (isadmin==0){
											
											$("#dtrstatus").load(dtrurl+"/my/dtrstatus",{ datefrom : from , dateto : to , emp : empid , ic_dates : needs_sup_docs })
										} else if (isadmin==1){
											// display the admin side
											$("#dtrstatus").load(dtrurl+"Hr/adminpanel",{ datefrom : from , 
																						  dateto : to , 
																						  emp : empid , 
																						  empbio : empbio
																						  }, function() {
																							
																						  });
										}
									});
	}
	
	this.addcheckdate = function(date) {
		if (checkdates.length == 0) {
			checkdates.push(date);
		} else {
			if (checkdates.indexOf(date) != -1) { // found 1
				checkdates.splice( checkdates.indexOf(date), 1 );
			} else { // not found; returned negative 1
				checkdates.push(date);
			}
		}
	}
}

var dp = new dtrprocs();
	dp.__construct();