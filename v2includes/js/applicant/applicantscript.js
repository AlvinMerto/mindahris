(function(){
	// save school button
	$(document).on("click","#saveschool",function(){
		
		var course 		= $(document).find("#course").val();
		var school 		= $(document).find("#school").val();
		var att_from 	= $(document).find("#att_from").val();
		var att_to 		= $(document).find("#att_to").val();
		
		$.ajax({
			url 		: burl+"/applicants/save_school",
			type 		: "post",
			data 		: { course_ : course, school_ : school, att_from_ : att_from, att_to_ : att_to },
			dataType 	: "json",
			success 	: function(data) {
				if (data) {
					$(document).find("#course").val("");
					$(document).find("#school").val("");
					$(document).find("#att_from").val("");
					$(document).find("#att_to").val("");
					
					alert("Your educational background has been saved.");
				} else {
					alert("Please enter your personal information first.");
				}
			}, error 	: function() {
				alert("an error occured");
			}
		});
	})
	// end 

})();

