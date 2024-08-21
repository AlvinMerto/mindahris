$(document).ready(function(){
	var __resize = function() {
		var contentwrap = $(".content_wrapper").width();
		var leftbox     = $(".leftbox").width();
		var rightbox 	= parseFloat(contentwrap)-parseFloat(leftbox);

			// $(".rightbox").width( parseFloat(rightbox)-2);
			
		var windowheight = parseInt( $(window).height() ) - parseInt( $(".main-header").height() );
		var a = parseInt( windowheight ) - parseInt( $(".main-header").height() ) -1 ;
		
		$(".content-wrapper").height(a);
		
	}

	// __resize();

	$( window ).resize(function() {
	  // __resize();
	});
})