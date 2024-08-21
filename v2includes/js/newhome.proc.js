// alvin

var nh = jQuery;

nh(document).ready(function() {
	nh(".hradmin").on("click", function() {
		window.location.href = nh(this).data("href");		
	})
	
	// signatures 
		// signstatus
		
		$(document).on("click","#turnoff",function(){
			setstatus("0");
		})
		
		$(document).on("click","#turnon",function(){
			setstatus("1");
		})
		
	// end signatures
})

function setstatus(status) {
	performajax(['hr/setstatus',
				{ module : "signature" , 
				  field  : "display",
				  value  : status,
				  status : 0 }
				],function(data){
					if (data) {
						var $stat_text = null;
						switch(status) {
							case "0":
								$stat_text = "e-Signatures are turned off";
								break;
							case "1":
								$stat_text = "e-Signatures are Allowed";
								break;
						}
						nh(document).find("#signstatus").text($stat_text);
					}
				})
}