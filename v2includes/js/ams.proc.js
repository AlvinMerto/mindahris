// written by alvin

var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
var time;
var date;  
var name; 
var thesnap = null;
var thevid;

// all employee 
	var all_emps = null;
// end all employee 

var returned_empid = null;

// timereflect
var timereflect = null;
//
	var bigpipe = [];
// 

// exactid of the pass slip 
	var exactid = null;
// end 
function checktime(t) {
	if (t < 10) { t = "0"+t; }
	return t;
}

function displaytime() {
	var timetoday = new Date(),
		h 		  = checktime(timetoday.getHours());
		m 		  = checktime(timetoday.getMinutes());
		s 		  = checktime(timetoday.getSeconds());
		
	//	$(document).find("#hours").text(h);
	//	$(document).find("#minutes").text(m);
	
		time =  timetoday.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
		date =  months[timetoday.getMonth()] + " " + timetoday.getDate() + ", " +timetoday.getFullYear();
		$(document).find(".thehour").html(time);
		$(document).find("#seconds").text(s);
		 
		//  + "<span id='seconds'>"+s+"</span>"
		
		$(document).find("#datetoday").text( date );
		
		setTimeout(displaytime,500);
		
}

function display_ams(data) {
	var count = ($(document).find("#attendancetbl tbody").children().length+1);
			var uid   = data.amsid;
			
			if (data.col == "a_in") {
				$("<tr id = '"+uid+"'>"+
					"<td> "+ count +" </td>"+
					"<td> " + data.name + " </td>"+
					"<td id = '"+uid+"-a_in'> "+data.time+" <a href='C:/Users/MinDA/Pictures/amspix/"+thesnap+".png' class='smallme fa fa-file-image-o' aria-hidden='true'></a></td>"+
					"<td id = '"+uid+"-a_out'>  </td>"+
					"<td id = '"+uid+"-p_in'>  </td>"+
					"<td id = '"+uid+"-p_out'>  </td>"
					).prependTo("#attendancetbl tbody");
			} else {
				if ( document.getElementById(uid+"-"+data.col) ) {
					// alert("update");
					$(document).find("#"+uid+"-"+data.col).html(data.time+" <a href='C:/Users/MinDA/Pictures/amspix/"+thesnap+".png' class='smallme fa fa-file-image-o' aria-hidden='true'></a>");
				} else {
					$("<tr id = '"+uid+"'>"+
						"<td> "+ count +" </td>"+
						"<td> " + data.name + " </td>"+
						"<td id = '"+uid+"-a_in'>  </td>"+
						"<td id = '"+uid+"-a_out'>  </td>"+
						"<td id = '"+uid+"-p_in'> "+data.time+" <a href='C:/Users/MinDA/Pictures/amspix/"+thesnap+".png' class='smallme fa fa-file-image-o' aria-hidden='true'></a></td>"+
						"<td id = '"+uid+"-p_out'>  </td>"
					).prependTo("#attendancetbl tbody");
				} // file:/home/minda/Pictures/amspix/
			}
			
		$(document).find("#employeeid").val("");
		$(document).find("#empname").text("");
		$(document).find("#empdesignation").text("");
		$(document).find("#logtime").html("<i class='fa fa-clock-o' style='color: grey;' aria-hidden='true'></i>");
}

function procidno(idno_) {
	
	if (timereflect == null) {
		alert("Please select the time of day (F1, F2, F3, F4). Please refer to the LEGEND."); return;
	}
	
	performajax(['Ams/procidno',{ idno : idno_ }], function(data){
		// console.log(data)
		if (data['ret'] == true) {
			$(document).find("#empname").text(data['data']['name']);
			$(document).find("#empdesignation").text(data['data']['designation']);
			
			// return employee id 
			name  		   = data['data']['name'];
			returned_empid = data['data']['empid'];
			
			$(document).find("#logtime").html("<i class='fa fa-smile-o greenme' aria-hidden='true'></i>");
			
		} else if (data['ret'] == "full") {
			alert("You have filled up your ams");
			name  		   = null;
			returned_empid = null;
			
			
			$(document).find("#logtime").html("<i class='fa fa-clock-o' style='color: grey;' aria-hidden='true'></i>");
			// return;
		} else if (data['ret'] == 0) {
			
			$(document).find("#empname").text("");
			$(document).find("#empdesignation").text("");
			
			name  		   = null;
			returned_empid = null;
			$(document).find("#logtime").html("<i class='fa fa-thumbs-down' style='color: grey;' aria-hidden='true'></i>");
			// return;
		} else {
			alert("here");
		}
		
		takesnapshot(thevid);
		savetime(returned_empid,time, date ,thesnap); 
		//console.log(returned_empid)
	})
}
	
function savetoaccom(empid,accomtext) {	
	
	performajax(['Ams/procidno',{ idno : empid }], function(data){
		if (data['data']['empid'] == null) {
			alert("Employee ID not recognized"); return;
		}
	
		if (accomtext.length == 0 ) {
			alert("You might have forgotten to enter your milestone for today"); return;
		}
			
		var data_     		= new Object();
			data_.empid 	= data['data']['empid']; // mark me
			data_.accomtext = accomtext;
		
		performajax(['Ams/savetoaccom',{ data : data_ }],function(a){
			if (a) {
				$(document).find("#accstat").text("Accomplishment has been saved");
				$(document).find("#showaccom").toggle();
				$(document).find("#accomareaTextArea").text("");
				$(document).find("#loadsave").text("");
			}
		});
	});
}

function savetime(empid, time, date_, pic) {
//	alert(date_); alert(time);
	if (empid == null) {
		$(document).find("#nothingfound").css({"top":"-1000px"})
		$(document).find("#nothingfound").animate({
			"top" : "0px"
		},100)
		
		setTimeout(function(){
			$(document).find("#nothingfound").animate({
				"top" : "-1000px"
			},100)
		},1500)
		
		$(document).find("#employeeid").val("");
		$(document).find("#empname").text("");
		$(document).find("#empdesignation").text("");
		return;
	}
	
	proceed = true;
		// time
		// idno
		// date
	
//	proc_saving(empid, time, date_, pic);
	
	
		performajax(['Ams/checkfortimelog',{ time : time, idno : empid, date : date_ }], function(data){

			 if (data[0] == true) {
				
				// set the exact id 
				exactid = data[2];
				
				if (data[1] == "ps") {
					$(document).find("#bscreen").fadeIn();
					showps(data[3]);
				} else if (data[1] == "ams") {
					// showams();	
					proc_saving(empid, time, date_, pic);
				}
				
				proceed = false;
				// $(document).find("#theinnerscreen table tbody tr td").eq(0).attr({"id":"selected_td"}).focus();
			} else {
				proc_saving(empid, time, date_, pic);
			}
			
		})
	
		
	$(document).find("#employeeid").val("");
	// getnewams(date);
}

function saveto_passlip(empid_,date__,time__,pic__,refto, exact_id__) {
	// ref to = reflect to either time out or time in
	// returned_empid
	$(document).find("#loadingspan").show().html("saving...");
	performajax(["Ams/saveto_ps",{ empid : empid_ , exactid : exact_id__ , date : date__ , time : time__ }],function(data){
		console.log(data);
		if (data[0] == true) {
			$(document).find("#loadingspan").html("Timelog Saved");
			
			setTimeout(function(){
				$(document).find("#bscreen").fadeOut();
				$(document).find("#loadingspan").hide();
			},900)
			
			// $(document).find("#empname_ps").text(data[0]['fname']);
			$(document).find("#psout").text(data[1].timeout);
			$(document).find("#psin").text(data[1].timein);
		}
	})
	
	//$(document).find("#employeeid").focus();
}

function proc_saving(empid, time, date_, pic) {
	// console.log("empid:"+empid+", time:"+time+", date:"+date_+", pic:"+pic+", timereflect:"+timereflect);
	
	if (timereflect == null) {
		alert("Please select the time of day. Please refer to the LEGEND."); return;
	}

	performajax(["Ams/addtime",{time : time , pic : pic, idno : empid, date : date_, timereflect : timereflect}], function(data){
		// console.log(data);
					/*
					if (data[0]=='hasps') {
						
					}
					*/
					//if (data[0] === true) {
					//	timereflect = null;
					
						var d = new Object();
							d.amsid = data[2];
							d.name  = name.toUpperCase();
							d.time  = time;
							d.col   = data[1];

						name 		   = null; 
						returned_empid = null;
						thesnap 	   = null;
							
							
							$(document).find("#timein_am").text(data[3][0]['a_in']);
							$(document).find("#timeout_am").text(data[3][0]['a_out']);
							$(document).find("#timein_pm").text(data[3][0]['p_in']);
							$(document).find("#timeout_pm").text(data[3][0]['p_out']);
						
							$(document).find("#success").show();
							
							setTimeout(function(){
								$(document).find("#success").hide();
							},1000)
							
						$(document).find(".empinformation").show();
						$(document).find("#bscreen").hide();
						
						$(document).find("#logtime").html("<i class='fa fa-clock-o' style='color: grey;' aria-hidden='true'></i>");
						// alert(timereflect)
					//}
				})
}

function showams() {
	$(document).find("#forams").show();
	$(document).find("#forps").hide();
}

function showps(data = false) {
	if (data != false) {
		$(document).find(".detailsofps").show();
		
		var recas 	  = null;
		var pswelcome = null;
		
		var wbtop 	  = null;
		var wbbot 	  = null;
		
		if (data['timeout'] == null) {
			recas 	  = "pass slip time out";
			pswelcome = "hmmmmmmmm";
			
			wbtop 	  = "It appears that you have a Pass Slip";
			wbbot 	  = "Would you like me to record your time log now?";
			
			$(document).find(".nooption").show();
		} else {
			if (data['timein'] == null) {
				recas = "pass slip time in";
				pswelcome = "Welcome Back";
				
				wbtop 	  = "Please confirm by selecting YES below";
				wbbot 	  = "recording of data will start as soon as you confirm";
				
				$(document).find(".nooption").hide();
			}
		}
		
		$(document).find("#thehmmm").html(pswelcome);
		$(document).find("#recas").html(recas);
		
		// messages below header text 
			$(document).find("#wb_top").html(wbtop);
			$(document).find("#wb_bot").html(wbbot);
		// end 
	}
	
	$(document).find("#forams").hide();
	$(document).find("#forps").show();
}

function getdailyams(date) {
	// delete bigpipe data
	bigpipe = [];
	
	$(document).find("#attendancetbl tbody").children().remove();
	performajax(['Ams/getamstoday',{ date : date }], function(data){
		if (data != null) {
			bigpipe = data;
			for (var i = 0, j = 1; i <= data.length-1; i++, j++) {
				// var img = "<i class='fa fa-file-image-o' aria-hidden='true'></i>";
				
				$("<tr>"+
					"<td>"+ j +"</td>"+
					"<td>"+ data[i].name  +"</td>"+
					"<td id='"+data[i].amsid+"-a_in'>" + data[i].a_in  + "</td>"+
					"<td id='"+data[i].amsid+"-a_out' class='removethis'>"+ data[i].a_out + "</td>"+
					"<td id='"+data[i].amsid+"-p_in' class='removethis'>" + data[i].p_in  + "</td>"+
					"<td id='"+data[i].amsid+"-p_out' class='removethis'>"+ data[i].p_out + "</td>"+
				  "</tr>").prependTo("#attendancetbl tbody");
				  
				 /*
				// a_out remove event
				$(document).on("click","#"+data[i].amsid+"-a_out",function(){
					var tthis = $(this);
					performajax(["ams/settonull",{ amsid : data[i].amsid , field : "a_out"}], function(data){
						getnewams(date);
					})
				})
				
				// p_in remove event
				$(document).on("click","#"+data[i].amsid+"-p_in",function(){
					
				})
				
				// p_out remove event 
				$(document).on("click","#"+data[i].amsid+"-p_out",function(){
					
				})
				*/
			}
		}
		
	//	getnewams(date);
		
		/*
		setTimeout(function(){
			// getdailyams(date);
			window.location.reload();
		}, 36000000) // 3600000 millisecond in 1 hour * 2 for two hours || 86400000 || 3000 || 36000000
		*/
		
	})
}

function getnewams(date) {
	performajax(['Ams/getamstoday',{ date : date }], function(data){
		if (data != null) {
			for(var i = 0; i <= data.length-1; i++) {
				var found = null;
				for (var o = 0; o <= bigpipe.length-1; o++) {
					var uid = data[i].amsid;
					if ( bigpipe[o].amsid == data[i].amsid ) {
						// found
							if (bigpipe[o].a_in != data[i].a_in) {
								// display and save
								bigpipe[o].a_in = data[i].a_in;
								$(document).find("#"+uid+"-a_in").html(data[i].a_in);
							}
							
							if (bigpipe[o].a_out != data[i].a_out) {
								// display and save
								bigpipe[o].a_out = data[i].a_out;
								$(document).find("#"+uid+"-a_out").html(data[i].a_out);
							}
							
							if (bigpipe[o].p_in != data[i].p_in) {
								// display and save
								bigpipe[o].p_in = data[i].p_in;
								$(document).find("#"+uid+"-p_in").html(data[i].p_in);
							}
							
							if (bigpipe[o].p_out != data[i].p_out) {
								// display and save
								bigpipe[o].p_out = data[i].p_out;
								$(document).find("#"+uid+"-p_out").html(data[i].p_out);
							}
							found = true;
							break;
							// break searching
					} else {
						// not found 
							// continue searching
						found = false;
					}
				}
				
					if (!found) {
						bigpipe.push(data[i]);
						
						var j = $(document).find("#attendancetbl tbody").children().length;
						$("<tr>"+
							"<td>"+ (j+1) +"</td>"+
							"<td>"+ data[i].name  +"</td>"+
							"<td id='"+data[i].amsid+"-a_in'>" + data[i].a_in  + "</td>"+
							"<td id='"+data[i].amsid+"-a_out'>"+ data[i].a_out + "</td>"+
							"<td id='"+data[i].amsid+"-p_in'>" + data[i].p_in  + "</td>"+
							"<td id='"+data[i].amsid+"-p_out'>"+ data[i].p_out + "</td>"+
						  "</tr>").prependTo("#attendancetbl tbody");
					}
			}
		}
		
		/*
		setTimeout(function(){
			getnewams(date);
		},1000) // 3600000 millisecond in 1 hour * 2 for two hours 
		*/
	//	getdailyams(date);
		
	})
}

// camera 
function thecamera() {
	var video = document.getElementById('video');
	
	navigator.getUserMedia = (navigator.getUserMedia ||
							  navigator.webkitGetUserMedia ||
                              navigator.mozGetUserMedia || 
                              navigator.msGetUserMedia);
							
	// Get access to the camera!
	if( navigator.mediaDevices && navigator.mediaDevices.getUserMedia ) {
		// Not adding `{ audio: true }` since we only want video now
		
		navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
			// video.src = window.URL.createObjectURL(stream);
			video.srcObject = stream;
			video.play();
		});
		
		/*
		navigator.getUserMedia({ video: true }, function(stream) {
			video.src = window.URL.createObjectURL(stream);
			video.play();
		});
		*/
	}
	
	//	$(document).find("#canvas").height(vid_h);
	//	$(document).find("#canvas").width(vid_w);
	// end video size 
	
	thevid = video;
	
	// Trigger photo take
	/*
	document.getElementById("logtime").addEventListener("click", function() {
		// context.drawImage(video, 0, 0, 515, 403);
		// procidno( $("#employeeid").val() );
		takesnapshot(thevid);
		savetime(returned_empid,time, date ,thesnap); 
	});
	*/
	
	document.getElementById("logtime").addEventListener("click",function() {
		procidno( $(document).find("#employeeid").val() );
	});
	
	// logtime_mob
	document.getElementById("logtime_mob").addEventListener("click",function() {
		procidno( $(document).find("#employeeid").val() );
	});
	
	
}

function takesnapshot(vid) {
	if (returned_empid == null) {
		//alert("cannot take picture. Enter your ID");
		return;
	}
	// Elements for taking the snapshot
	var canvas = document.getElementById('canvas');
	var context = canvas.getContext('2d');
	var video = document.getElementById('video');
	
	context.drawImage(vid, 0, 0, 378, 365);
	
	context.font      = "23px Arial";
	context.fillStyle = "#ffffff";
	context.strokeText( $(document).find("#employeeid").val() ,10,50);
	context.strokeText( name.toUpperCase(),10,75);
	context.strokeText( date+" at "+time ,10,100);
	
	var image 		  = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
	
	thesnap 	  	  = date.replace(",","").replace(/\s/g, "")+time.replace(/\s/g, "").replace(":","")+name.replace(/\s/g, "").replace(",","");
	
	saveAsPNG(canvas, thesnap);
	// window.location.href = "https://office.minda.gov.ph:9003/ams/image";
	
}

// end camera 	

function saveAsPNG(image, filename){ // No IE <11 support. Chrome URL bug for large images may crash
    var anchorElement, event, blob;
    function image2Canvas(image){  // converts an image to canvas
        function createCanvas(width, height){  // creates a canvas of width height
            var can = document.createElement("canvas");
            can.width = width;
            can.height = height;
            return can;
        };
        var newImage = canvas(img.width, img.height); // create new image
        newImage.ctx = newImage.getContext("2d");  // get image context
        newImage.ctx.drawImage(image, 0, 0); // draw the image onto the canvas
        return newImage;  // return the new image
    }
    if(image.toDataURL === undefined){    // does the image have the toDataURL function
        image = image2Canvas(image);  // No then convert to canvas
    }
    // if msToBlob and msSaveBlob then use them to save. IE >= 10
     
    if(image.msToBlob !== undefined && navigator.msSaveBlob !== undefined){ 
       blob = image.msToBlob(); 
       navigator.msSaveBlob(blob, filename + ".png"); 
       return;
    }
    anchorElement = document.createElement('a');  // Create a download link
    anchorElement.href = image.toDataURL();   // attach the image data URL
	
	//var disp = document.getElementById("sourcehere")
	$(document).find("#sourcehere").attr({"src":anchorElement.href,
										  "width":"100%",
										  "height":"250px"});
	
    // check for download attribute
    if ( anchorElement.download !== undefined ) {
        anchorElement.download = filename + ".png";  // set the download filename
        if (typeof MouseEvent === "function") {   // does the browser support the object MouseEvent
            event = new MouseEvent(   // yes create a new mouse click event
                "click", {
                    view        : window,
                    bubbles     : true,
                    cancelable  : true,
                    ctrlKey     : false,
                    altKey      : false,
                    shiftKey    : false,
                    metaKey     : false,
                    button      : 0,
                    buttons     : 1,
                }
            );
            anchorElement.dispatchEvent(event); // simulate a click on the download link.
        } else
        if (anchorElement.fireEvent) {    // if no MouseEvent object try fireEvent 
            anchorElement.fireEvent("onclick");
        }
    }
}

function getallemps(){
	
	performajax(["Ams/getallemps",{ a : "null" }], function(data){
		all_emps = data;
		alert("All employee has been loaded...")
	})
	
}

function find_emp(id) {
	// console.log(all_emps);
		
	for(var i = 0; i <= all_emps.length-1; i++) {
		if ( all_emps[i]['id_number'] == id ) { // found
			$(document).find("#empname").text( all_emps[i].f_name );
			$(document).find("#empdesignation").text( all_emps[i].position_name );
			
			// return employee id 
			name  		   = all_emps[i].f_name;
			returned_empid = all_emps[i].empid;
			
			$(document).find("#logtime").html("<i class='fa fa-smile-o greenme' aria-hidden='true'></i>");
			
		} else { // 
			
			$(document).find("#empname").text();
			$(document).find("#empdesignation").text();
			
			// return employee id 
			name  		   = null;
			returned_empid = null;
			
			$(document).find("#logtime").html("<i class='fa fa-clock-o' style='color: grey;' aria-hidden='true'></i>");
		}
	}
	
}

$(document).ready(function(){
	
	var winh = $(document).height();
		$(document).find(".wrapper").css({"height":winh+"px"});
		
	// 	getallemps();			// get all employees 
		displaytime();			// display time and date
	//	getdailyams(date);		// get the daily logged in employees from AMS
	thecamera();			// initialize the camera
		
		
	//	$(document).find("#employeeid").focus();
		
	
		$(document).on("input change paste keypress","#employeeid",function(e){
			if ( e.which == 13 || e.keyCode == 13) {
				if ($(this).val().length == 0) {
					$(document).find("#logtime").html("<i class='fa fa-clock-o' style='color: grey;' aria-hidden='true'></i>");
					
					$(document).find("#empname").text("");
					$(document).find("#empdesignation").text("");
					
					name  		   = null;
					returned_empid = null;
					
					return;
				} else {
					procidno( $(this).val() );
				}

			}
		})
	
		$(document).on("click","#theoptiontbl tbody tr td",function(){
			$(this).attr({"id":"selected_td"}).siblings("td").removeAttr("id")
			timereflect = $(this).data("timeref");
			proc_saving(returned_empid, time, date, thesnap);
			$(document).find("#bscreen").hide();
			//$(document).find("#employeeid").focus();
		})
		
		$(document).on("click",".psans",function(){
			var dataval = $(this).data("psval");
			
			switch(dataval) {
				case 1:	// yes
					$(document).find("#loadingspan").html("saving timelog");
					saveto_passlip(returned_empid,date,time,null,null,exactid);
					break;
				case 0:	// no
					// start recording to AMS 
					// timereflect = null;
					
					if (timereflect == null) {
						alert('Please select which time of the day should your time reflect to.'); 
						$(document).find("#bscreen").fadeOut();
						return;
					} else {
						proc_saving(returned_empid, time, date, thesnap);
					}
					break;
			}
			
		})
		
		$(document).on("click","#bscreen",function(e){
			if (e.target.id == "bscreen") {
				$(this).fadeOut();
				//$(document).find("#employeeid").focus();
			}
		})
		
		$(document).on("blur","#employeeid",function(){
			//$(document).find("#employeeid").focus();
		})
		
		$(document).on("click",function(){
			//$(document).find("#employeeid").focus();
		})
		
		var fireevent = "keydown" || "keypress";
				
		$(document).on(fireevent,function(e){
			
	//		var e =  e ||window.event;
		
			// $(document).find("#employeeid").focus();
			
			if(e.keyCode == 27) { // escape key
				$(document).find("#bscreen").fadeOut();
				// $(document).find("#employeeid").focus();
			}
			
			/*
				old 
				// 112 = f1 
				// 113 = f2 
				// 114 = f3
				// 115 = f4
			
			*/
			
			if (e.keyCode == 65) {
				e.preventDefault();
				$(document).find("#employeeid").val("06272017306");
			}
			
			if (e.keyCode== 112) { 
				// f1 
				e.preventDefault();
				timereflect = "a_in";
				// table right
					$(document).find("#timein_am").css({"background":"#fcc996","color":"#3e3e3e"})
					
					$(document).find("#timeout_am").removeAttr("style");
					$(document).find("#timein_pm").removeAttr("style");
					$(document).find("#timeout_pm").removeAttr("style");
				// end 
					
				// below 
					$(document).find("#am_in").css({"background":"#fcc996"})
					$(document).find("#am_out").removeAttr("style");
					$(document).find("#pm_in").removeAttr("style");
					$(document).find("#pm_out").removeAttr("style");
				// end below 
				
			}
			
			if (e.keyCode== 113) { 
				// f2 
				e.preventDefault();
				timereflect = "a_out";
				$(document).find("#timeout_am").css({"background":"#e7b27c","color":"#ffffff"})
				
				$(document).find("#timein_am").removeAttr("style");
				$(document).find("#timein_pm").removeAttr("style");
				$(document).find("#timeout_pm").removeAttr("style");
				
				// below 
					$(document).find("#am_in").removeAttr("style");
					$(document).find("#am_out").css({"background":"#e7b27c"})
					$(document).find("#pm_in").removeAttr("style");
					$(document).find("#pm_out").removeAttr("style");
				// end below 
				
			}
			
			if (e.keyCode== 114) { 
				// f3 
				e.preventDefault();
				timereflect = "p_in";
				$(document).find("#timein_pm").css({"background":"#c5905b","color":"#ffffff"})
				
				$(document).find("#timeout_am").removeAttr("style");
				$(document).find("#timein_am").removeAttr("style");
				$(document).find("#timeout_pm").removeAttr("style");
				
				// below 
					$(document).find("#am_in").removeAttr("style");
					$(document).find("#am_out").removeAttr("style");
					$(document).find("#pm_in").css({"background":"#c5905b"})
					$(document).find("#pm_out").removeAttr("style");
				// end below 
				
			}
			
			if (e.keyCode== 115) { 
				// f4 
				e.preventDefault();
				
				timereflect = "p_out";
				$(document).find("#timeout_pm").css({"background":"#ad7136","color":"#fff"})
				
				$(document).find("#timeout_am").removeAttr("style");
				$(document).find("#timein_pm").removeAttr("style");
				$(document).find("#timein_am").removeAttr("style");
				
				// below 
					$(document).find("#am_in").removeAttr("style");
					$(document).find("#am_out").removeAttr("style");
					$(document).find("#pm_in").removeAttr("style");
					$(document).find("#pm_out").css({"background":"#ad7136"})
				// end below 
				
			}
			
		})
		
			$(document).on("click","#mob_amin",function() {
				timereflect = "a_in";
				
					$(this).removeClass("btn-default").addClass("btn-primary");
					
					$(document).find("#mob_amout").removeClass("btn-primary");
					$(document).find("#mob_pmin").removeClass("btn-primary");
					$(document).find("#mob_pmout").removeClass("btn-primary");
					
					$(document).find("#mobname").text("Time In");
			})
			
			$(document).on("click","#mob_amout",function() {
				timereflect = "a_out";
				
					$(this).removeClass("btn-default").addClass("btn btn-primary");
					
					$(document).find("#mob_amin").removeClass("btn-primary").addClass("btn-default");
					$(document).find("#mob_pmin").removeClass("btn-primary").addClass("btn-default");
					$(document).find("#mob_pmout").removeClass("btn-primary").addClass("btn-default");
					
					$(document).find("#mobname").text("Time Out");
			})
			
			$(document).on("click","#mob_pmin",function() {
				timereflect = "p_in";
				
					$(this).removeClass("btn-default").addClass("btn-primary");
					
					$(document).find("#mob_amin").removeClass("btn-primary").addClass("btn-default");
					$(document).find("#mob_amout").removeClass("btn-primary").addClass("btn-default");
					$(document).find("#mob_pmout").removeClass("btn-primary").addClass("btn-default");
					
					$(document).find("#mobname").text("Time In");
			})
			
			$(document).on("click","#mob_pmout",function() {
				timereflect = "p_out";
				
					$(this).removeClass("btn-default").addClass("btn-primary");
					
					$(document).find("#mob_amin").removeClass("btn-primary").addClass("btn-default");
					$(document).find("#mob_amout").removeClass("btn-primary").addClass("btn-default");
					$(document).find("#mob_pmin").removeClass("btn-primary").addClass("btn-default");
					
					$(document).find("#mobname").text("Time Out");
			})
			
		// preview
			/*
				function readFile(file) {
					var reader = new FileReader();
					reader.onload = readSuccess;                                            
					function readSuccess(evt) {     
						document.getElementById("snapshot").src = evt.target.result                   
					};
					reader.readAsDataURL(file);                                              
				} 

				document.getElementById('cameraInput').onchange = function(e) {
					readFile(e.srcElement.files[0]);
				};
			*/
		// end preview
	
	// add accomp
	document.getElementById("saveaccom").addEventListener("click",function(){
		// performajax(['Ams/checkfortimelog',{ time : time, idno : empid, date : date_ }], function(data){
		
		var empid     	= $(document).find("#employeeid").val();
		var accomtext 	= $(document).find("#accomarea").val();
		
		$(document).find("#loadsave").text("saving please wait...");
		savetoaccom(empid,accomtext);
	});
	
	var hidden = true;
	document.getElementById("addacomp").addEventListener("click",function(){
		$(document).find("#showaccom").toggle();
		/*
		if (hidden) {
			$(document).find("#showaccom").show();
			$(this).text("Hide milestone");
			hidden = false;
		} else {
			$(document).find("#showaccom").hide();
			$(this).text("Show milestone");
			hidden = true;
		}
		*/
	});

	
		
	$("#accomarea").jqxEditor({
		height: "400px",
		width: "100%",
		theme : "arctic"
	});
})







