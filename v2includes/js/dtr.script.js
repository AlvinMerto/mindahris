// alvin

// checked date
	var checkdates = [];
// end checkdate 

// attachments 
	var attachments = new Object();
// end attachments 

// needs supporting documents 
	var needs_sup_docs;
// end 
var selected_el = null;
function addsupporting() {
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

function displaytimetable(empid, empbio, from, to) {
	
	// #timetbl_holder
	$("#timetbl_holder").html("loading...")
	needs_sup_docs = 0;
	$("#timetbl_holder").load(dtrurl+"/my/timetable",{ 
								token  : "2309f30f02-0sj00234" ,  // not dynamic for the meantime
								from   : from, //2018-3-1
								to     : to, //2018-3-31
								emp    : empid,
								empbio : empbio }, function(){
									var ns = $(document).find(".needsupp").children(".atmclue");
										for(var i = 0; i <= ns.length-1; i++) {
											needs_sup_docs += 1;
										}
									
									// period date 
									// $(document).find("#theperiod").text( $(document).find("#periodate").text() )
									
									$("#dtrstatus").load(dtrurl+"/my/dtrstatus",{ datefrom : from , dateto : to , emp : empid , ic_dates : needs_sup_docs })
								});
}

function addcheckdate(date) {
	// checkdates
	
	if (checkdates.length == 0) {
		checkdates.push(date);
	} else {
		if (checkdates.indexOf(date) != -1) { // found 1
			checkdates.splice( checkdates.indexOf(date), 1 );
		} else { // not found; returned negative 1
			checkdates.push(date);
		}
	}
	
	// console.log(checkdates)
}

function add_attachment(what) {
	$("#attachmentsul").find(".noattachments").remove();
	
	var elid 		= "el-"+$("#attachmentsul").children().length;
	
	// set the selected element id 
		selected_el = elid;
	// end 
	
	var text_ = null,
		id_   = null;
	
	
	switch(what) {
		case "CA":
			$(".savedivbox").show();
			//$(document).find("#attachmentselect").hide();
			
			text_ = "(CA) Certicate of Appearance";
			id_   = "ca";
			
			var att_what = {"name"		   : "CA",
							"elid"		   : elid,
							"timeoftheday" : null,
							"attachment"   : []
						};
			
			// time select in CA 
				$(document).on("change","#ca_timeselect", function(){
					att_what['timeoftheday'] = ($(this).val() == "def")?null:$(this).val();
				})
			// end time select CA
			
			attachments[elid] = att_what;
			break;
		case "PS":
			$(".savedivbox").show();
			text_ = "(PS) Pass Slip";
			id_   = "ps";
			
			var att_what = {
				"name"		 : "PS",
				"elid"		 : elid,
				"pstype"	 : null,
				"attachment" : []
			};
		
			// ps type select 
				$(document).on("click","#ps_type_select", function(){
					att_what['pstype'] = ($(this).val() == "def")?null:$(this).val();
				})
			// end ps 
			
			attachments[elid] = att_what;
			
			break;
		case "AMS":
			$(".savedivbox").show();
			//$(document).find("#attachmentselect").hide();
			
			text_ = "(AMS) Attendance Monitoring Sheet";
			id_   = "ams";
			
			var att_what = {
				"name"			: "AMS",
				"elid"			: elid,
				"ams"			: new Object(),
				"attachment"	: [],
				"remarks"		: null
			};
			
			performajax(["My/getams",{ date : checkdates }],function(data){
				if (data.length == 0) {
					// ams_table
					$("<tr>").append("<td colspan=5 style='background: #d43333; color: #fff; padding: 4px; box-shadow: 0px 3px 7px #881717; position: relative;'> No AMS record has been found! </td>").prependTo("#ams_table tbody");
				} else {
					// amin
					$(document).find("#amin").html( data[0].a_in );
						$(document).find(".amin").attr({"data-amin":data[0].a_in});
					
						$(document).on("click",".amin", function() {							
								if (typeof att_what['ams'].a_in === 'undefined') {
									att_what['ams'].a_in = $(this).data("amin");
									
									$(document).find(".amin")
										.addClass("timeselected")
										.children(".circletick")
										.addClass("gercircleticked");
								} else {
									delete( att_what['ams'].a_in )
									
									$(document).find(".amin")
										.removeClass("timeselected")
										.children(".circletick")
										.removeClass("gercircleticked");
								}
							
						})
						
					// amout					
					$(document).find("#amout").html( data[0].a_out );
						$(document).find(".amout").attr({"data-amout":data[0].a_out});
						
						$(document).on("click",".amout", function() {				
							if (typeof att_what['ams'].a_out === 'undefined') {
								att_what['ams'].a_out = $(this).data("amout");
								
								$(document).find(".amout")
									.addClass("timeselected")
									.children(".circletick")
									.addClass("gercircleticked");
							} else {
								delete( att_what['ams'].a_out )
								
								$(document).find(".amout")
									.removeClass("timeselected")
									.children(".circletick")
									.removeClass("gercircleticked");
							}
							
						})
					
					// pmin					
					$(document).find("#pmin").html( data[0].p_in );
						$(document).find(".pmin").attr({"data-pmin":data[0].p_in});
					
						$(document).on("click",".pmin", function() {				
							if (typeof att_what['ams'].p_in === 'undefined') {
								att_what['ams'].p_in = $(this).data("pmin");
								
								$(document).find(".pmin")
									.addClass("timeselected")
									.children(".circletick")
									.addClass("gercircleticked");
							} else {
								delete( att_what['ams'].p_in )
								
								$(document).find(".pmin")
									.removeClass("timeselected")
									.children(".circletick")
									.removeClass("gercircleticked");
							}
							
						})
					
					// pmout
					$(document).find("#pmout").html( data[0].p_out );
						$(document).find(".pmout").attr({"data-pmout":data[0].p_out});
						
						$(document).on("click",".pmout", function() {				
							if (typeof att_what['ams'].p_out === 'undefined') {
								att_what['ams'].p_out = $(this).data("pmout");
								
								$(document).find(".pmout")
									.addClass("timeselected")
									.children(".circletick")
									.addClass("gercircleticked");
							} else {
								delete( att_what['ams'].p_out )
								
								$(document).find(".pmout")
									.removeClass("timeselected")
									.children(".circletick")
									.removeClass("gercircleticked");
							}
							
						})
					// remarks
					$("#remtextarea").on("blur",function(){
						att_what['remarks'] = $(this).val();
					})
					
					$(document).find("#remarkshere").html( data[0].remarks );
					
					attachments[elid] = att_what;
				}
			})
			
			//$(document).find("#attachmentselect").hide();
			break;
		
	}
	
	$("<li>",{ text : text_ , class : "attach_click" , id : "ams", "data-elid" : elid })
		.appendTo("#attachmentsul");
	
}

function savethis() {
	_att_ca.save();
	
	/*
	switch(attachments[selected_el]['name']) {
		case "CA":
			if (attachments[selected_el]['timeoftheday'] == null) {
				alert("Please select time of the day.")
				return;
			}
			break;
		case "AMS":
			if (attachments[selected_el]['ams'] == null) {
				alert("Please select AMS time");
				return;
			}
			break;
	}
	performajax(['My/saveattachment',{ data_ : attachments , dates_ : checkdates }], function(ret){
		if (ret == true || ret == "true") {
			alert("Successfully Saved");
			// window.location.reload();
			displaytimetable(empid, empbio, from, to);
			$("#modaldtrpop").modal("hide");
		}
	})
	*/
}

function add_supportingdoc(filename) {
	
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
	
	return text;
}

function remove_supportingdoc(filename) {
	
	attachments[selected_el]['attachment'].splice( attachments[selected_el]['attachment'].indexOf(filename),1 );
	
	var text = "";
	for(var i = 0; i <= attachments[selected_el]['attachment'].length - 1; i++) {
		text += "<span>"+attachments[selected_el]['attachment'][i]+" <i class='fa fa-times-circle removedoc' title='remove this file' data-filename='"+filename+"'></i>  </span>, ";
	}
	
	return text;
}

function disp_att_files() {
	$("#attachmentsul").find(".noattachments").remove();
}

$(document).ready(function(){
	var link = window.location.protocol+"//"+window.location.hostname+":9003/";
	// get the time 
		displaytimetable(empid, empbio, from, to);
	// end 
	
	// the name 
	$(document).on("click","#thename", function(){
		displaytimetable(empid, empbio, from, to);
	})
	// end the name
	
	// print this DTR
		$(document).on("click","#printthisdtr",function(){
			$.ajax({
				url 	 : link+"My/testtime",
				type 	 : "post",
				dataType : "html",
				success  : function(data) {
					var newWindow 	= window.open('', '', 'width=800, height=500'),
					document 	= newWindow.document.open(),
					pageContent = data;
					
					document.write(pageContent);
					document.close();
					newWindow.print();
				}, error : function() {
					alert("error on printing");
				}
			})
		})
	// end printing
	
	// add click event to atmtext
		$(document).on("click",".atmtext", function(){
			$(this).parent().parent().next().toggle("fast")
		})
	// end adding of click event to atmtext
	
	// time table click
		$(document).on("dblclick","#timetable tbody tr", function(){
			/*
			addcheckdate( $(this).data("nicedate") );
			
			if ($(this).hasClass("attachmenttbl")) {
				return;
			}
			
			if ( $(this).hasClass("timeclicked") ) {
				$(this).removeClass("timeclicked");
				$(this).children("td").eq(0).children().remove();
			} else {
				$(this).addClass("timeclicked");
				$(this).children("td").eq(0).append("<i class='fa fa-check'></i>");
			}
			addsupporting();
			*/
		})
		
		$(document).on("click","#timetable tbody tr", function(e){
			if ($(this).hasClass("attachmenttbl")) {
				return;
			}
			
			addcheckdate( $(this).data("nicedate") );
			
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
				$("<p>",{ id : "showtblbtn" , class : "optiontbl_show" , html : " <i class='fa fa-paperclip' aria-hidden='true'></i> &nbsp; Attach Supporting document(s)" })
					.css({"top":x+31,"left":y,"position":"absolute"})
						.appendTo(document.body).on("click",function(){
							addsupporting();
						});
				
			}
			
		})
	// end time table click 
	
	$(document).on("click","#needssup_li li",function(){
		addsupporting();
	})
	
	// emp.name = "alvin jay";
	// console.log( emp )
	
	// amin 
		$(document).on("mouseover",".amin",function(){
			$(document).find(".amin").addClass("timeselect")
			
			$(".amin").find(".circletick").children().remove().removeClass("getcircletick");
			$(".amin").find(".circletick").append("<i class='fa fa-check-circle'></i>").addClass("getcircletick");
			
		}).on("mouseleave",".amin",function(){
			$(document).find(".amin").removeClass("timeselect")
			$(".amin").find(".circletick").removeClass("getcircletick").children().remove()
		})
	// amin end 
	
	// amout 
		$(document).on("mouseover",".amout",function(){
			$(document).find(".amout").addClass("timeselect")
			
			$(".amout").find(".circletick").children().remove().removeClass("getcircletick");
			$(".amout").find(".circletick").append("<i class='fa fa-check-circle'></i>").addClass("getcircletick");
			
		}).on("mouseleave",".amout",function(){
			$(document).find(".amout").removeClass("timeselect")
			$(".amout").find(".circletick").removeClass("getcircletick").children().remove()
		})
	// amout end 
	
	// pmin 
		$(document).on("mouseover",".pmin",function(){
			$(document).find(".pmin").addClass("timeselect")
			
			$(".pmin").find(".circletick").children().remove().removeClass("getcircletick");
			$(".pmin").find(".circletick").append("<i class='fa fa-check-circle'></i>").addClass("getcircletick");
			
		}).on("mouseleave",".pmin",function(){
			$(document).find(".pmin").removeClass("timeselect")
			$(".pmin").find(".circletick").removeClass("getcircletick").children().remove()
		})
	// pmin end
	
	// pmout 
		$(document).on("mouseover",".pmout",function(){
			$(document).find(".pmout").addClass("timeselect")
			
			$(".pmout").find(".circletick").children().remove().removeClass("getcircletick");
			$(".pmout").find(".circletick").append("<i class='fa fa-check-circle'></i>").addClass("getcircletick");
			
		}).on("mouseleave",".pmout",function(){
			$(document).find(".pmout").removeClass("timeselect")
			$(".pmout").find(".circletick").removeClass("getcircletick").children().remove()
		})
	// pmout end

var _att_ca  = new attachments();
var _att_ams = new attachments();


var which  = null;
	// attachment select 
		var showthis = null,
			showname = null,
			what = null;
		$(document).on("change","#attachmentselect",function(){
			var val = $(this).val();
			
		//	$(this).attr({"disabled":"disabled"});
			
			if (val == "def") {
				$(".hardcopy_div").hide(); // upload section
				$("#removeattach").hide();
				$(showthis).hide();
				$("#attachmenttitle").text("");
				return;
			}
			
			switch(val) {
				case "def":
					showthis = null;
					break;
				case "att_ca":
					showthis = "#CA_box";
					showname = "Certificate of Appearance (CA)";
					what     = "CA";
					
					_att_ca.att_type = "this is a CA";
					which = "CA";
					break;
				case "att_ams":
					if (checkdates.length > 1) {
						alert("Cannot add AMS to multiple dates");
						return;
					}
			
					showthis = "#AMS_box";
					showname = "Attendance Monitoring Sheet (AMS)";
					what     = "AMS";
					
					_att_ams.att_type = "this is an ams";
					which = "AMS";
					break;
				case "att_ps":
					if (checkdates.length > 1) {
						alert("Cannot add Pass Slip to multiple dates");
						return;
					}
					
					showthis = "#ps_box";
					showname = "Pass Slip (PS)";
					what = "PS";
					break;
				case "att_lv":
					
					break;
			}
			
			if (showthis != null) {
				// hidewindows 
				$(".attachelement").hide();

				// override hiding :: show windows
				$(".hardcopy_div").show(); // upload section
				$("#removeattach").show();
				$(showthis).show();
				$("#attachmenttitle").text(showname);

				add_attachment(what);
			}
			
		})
	// end attachment select 
	
	// save attachment
		$(document).on("click","#savethefile",function(){
			switch(which) {
				case "CA":
					_att_ca.save();
					break;
				case "AMS":
					_att_ams.save();
					break;
			}
			
			/*
			if ( $(this).hasClass("disabled") ) { return; }
			
			savethis();
			*/
			// console.log(attachments);
		})
	// end saving attachment 
	
	// attachment click 
		$(document).on("click",".attach_click", function(){
			selected_el = $(this).data("elid");
			
			alert(selected_el)
		})
	// end 
	
	// remove attachment 
		$(document).on("click","#removeattach",function(){
			alert(selected_el)
		})
	// end remove attachment  
		
	// stash the file 
			$("#file").on("change",function(){
				// console.log( $('#fileinfo')[0].length )
				//$('#uploadBTN').show().on('click', function(){ 
					var form = $('#fileinfo')[0]; // standard javascript object here
					var formData = new FormData(form);
					
					$("#savethefile").addClass("disabled");
					$('#output').html("uploading file please wait...");
					
					$.ajax({
						url: dtrurl+'/upload/beginupload',
						type: 'POST',
						data: formData,
						processData: false,
						contentType: false,
						dataType : "json",
						success:function(data){
							$('#output').html(data['msg']);
							
							if (data['isok'] == 1) {
								var text = add_supportingdoc(data['filename']);
								$('#listofattachments').html( text );
							}
							
							$("#savethefile").removeClass("disabled");
						},
						error : function(a,b,c) {
							// alert(a+b+c);
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
			var text = remove_supportingdoc( $(this).data("filename") );
			
			$("#listofattachments").html( text );
		})
	// end 
	
	// filter select 
		$(document).on("change","#filterselect",function(){
			var dates = $(this).val().split("|");
			
			var from = dates[0].trim();
			var to   = dates[1].trim();
			// console.log(from);
			window.location.href = dtrurl+"my/dailytimerecords/"+empid+"/"+empbio+"/"+from+"/"+to;
			// displaytimetable(empid, empbio, from, to);
		})
	// end filter 
	
	// remove attachment 
		$(document).on("click",".removethisatm",function(){
			var exact_id = $(this).data("exactid");
			
			var conf = confirm("Are you sure you want to delete this?");
			
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
	
	// light room click event 
		$(document).on("click",".lightroom",function(){
			$("#lightroom").modal("show");
			
			var href = encodeURI( $(this).data("href") );
			
			// $(document).find("#previewarea").load(href);
		})
	// end light room click event 
})