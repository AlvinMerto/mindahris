$(document).ready(function(){
	checklogin();
	
	$(document).on("click",".closewindow",function(){
		$(document).find("#checklogin").hide();
	})
})

function checklogin() {
	performajax(["accounts/checklogin",{ data : "null" }], function(data){
		if (data === true) {
			$(document).find("#checklogin").remove();
			checklogin();
		} else {
			$("<div id='checklogin' style='position: fixed;top: 0px;width: 100%;height: 100%;background: rgba(0,0,0,0.5);z-index: 1000000;'> <p style='color: #333;"+
				"text-align: center;"+
				"padding-top: 45px;"+
				"font-size: 39px;"+
				"background: #fff;"+
				"padding-bottom: 15px;"+
				"box-shadow: 0px 2px 3px #535353;'> Your session has expired. <a href='"+BASE_URL+"' style=''>Login here</a> <i class='fa fa-times closewindow' style='float: right;margin-right: 24px;cursor: pointer;'></i> </p> </div>").appendTo(document.body);
		}
	})
}