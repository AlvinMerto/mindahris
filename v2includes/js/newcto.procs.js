$(document).ready(function(){
	$(document).on("click",".recallctoot",function(){
		var ctoot = $(this).data("otid");
		
		var conf = confirm("Are you sure you want to recall this?");
		
		if (conf){
			performajax(["My/recallctoot", { ctoot : ctoot }], function(data){
				console.log(data);
				if (data) {
					alert("Application Recalled");
					window.location.reload();
				}
			});
		}
	})
})