(function(){
	let winheight      = window.innerHeight;
	let winwidth 	   = window.innerWidth;
	// let topnavigation  = document.getElementById("thetopnavigation").clientHeight;
	let topnavigation  = $(document).find("#thetopnavigation").height();

	let rightcont_height = winheight-topnavigation;
	
	var tblcont = document.getElementById("thecontentoftbl");
		tblcont.style.height  = rightcont_height+"px";

	var popup   = document.getElementById("popupwhite");
		// popup.style.height = winheight-300+"px";
		// popup.style.width  = winwidth-300+"px";
	
	/*
	var filtbtn = document.getElementById("thefiltbtn");
		filtbtn.addEventListener("click",function(){

		});
	*/
	
	$(document).on('click',".ellips",(e)=>{
		alert(e.currentTarget.innerText);
	})

	$(document).on("click",".drawer",function(){
		$(document).find("#theblacker").removeClass("hidethis")
		loadwindow($(this).data("openwhat"),$(this).data("id"),"popupwhite");
	})

	$(document).on("click","#theblacker",function(e){
		if (e.target.id == "theblacker") {
			$(this).addClass("hidethis");
		}
	})

	function getdetails(what) {
		$.ajax({
			url 	 : baseurl+"/Ajaxcall/getdetails",
			type 	 : "post",
			data 	 : { getwhat : what },
			dataType : "json",
			success  : function(data) {
				console.log(data);
			}, error : function() {
				alert("error")
			}
		})
	}

	function loadwindow(what, id, loadto) {
		$(document).find("#"+loadto).load(baseurl+"Ajaxcall/loadwindow",{ getwhat : what , getid : id},function(){
			// popup
			// let popheight = document.getElementById("popupwhite").clientHeight;
			// let topheight = document.getElementById("contenttop").clientHeight;
			let popheight  = $(document).find("#popupwhite").height();
			let topheight  = $(document).find("#contenttop").height();

			$(document).find("#contentpop").height(popheight-topheight+"px");
			// let botht     = document.getElementById("contentpop");
				// botht.style.height = popheight-topheight+"px";

		//
		});
	}
})();