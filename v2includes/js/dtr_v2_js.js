$(document).ready(function() {
	// showing of filter window
	$("#showfilterwindow").on("click", function() {
		$("#rightfloatwindow").animate({
			"width":"40%",
		},300).show();
	})
	
	// click event to the blacker window 
	$(".blackerdiv").on("click", function() {
		$("#rightfloatwindow").animate({
			"width":"0px"
		},300).fadeOut();
	})
	
	$("#closewindow").on("click", function() {
		$("#rightfloatwindow").animate({
			"width":"0px"
		},300).fadeOut();
	})
	
	
	// mark 1	
	
		function gettheform(){
		var loadingimage = "<div class='loader_image lds-css ng-scope'><div style='width:100%;height:100%' class='lds-ball'><div></div></div></div>";
		
		//$("#countersignbtn").on("click", function() {
            var win_dow   = "#showwindow";
			var load_here = "#pop_upwindow";
			
			$(load_here).text("");
			
			$(win_dow).fadeIn();
			$("<div class='cs_div_style'> "+loadingimage +"sending your DTR to your chief for counter-signing </div>").appendTo(load_here);
			
			$('#body_wrap').show();

              var stedate = $('#startenddate').html();

              $('#sdateend').html($('#startenddate').html());
              $("#jqxgrid").jqxGrid('hidecolumn', 'total_hours_rendered');
              $("#jqxgrid").jqxGrid('hidecolumn', 'lates');
              $("#jqxgrid").jqxGrid('hidecolumn', 'undertime');
              $("#jqxgrid").jqxGrid('hidecolumn', 'ps');
              $("#jqxgrid").jqxGrid('hidecolumn', 'ot');


                var gridContent = '<div id="body" style="margin-top:0px !important; margin-bottom: 40px !important; width: 90%; height: 630px; padding:0; margin:auto;">' + $("#jqxgrid").jqxGrid('exportdata', 'html') + '</div>';
             
                          //  $("#jqxgrid").jqxGrid('hidecolumn', 'types_md');
                          //  $("#jqxgrid").jqxGrid('hidecolumn', 'is_appro');

                var header = $('#headers').html();
                var footer = $('#footers').html();

                  $('#body_wrap').hide();

                //var header = "<?php echo $dtrformat['header']; ?>";
                //var footer = "<?php echo $dtrformat['footer']; ?>";

                //var newWindow = window.open('', '', 'width=800, height=500'),
                // document = newWindow.document.open(),
                pageContent =
                    '<!DOCTYPE html>\n' +
                    '<html>\n' +
                    '<head>\n' +
                    '<meta charset="utf-8" />\n' +
                    '<style>  @media print{@page {size: Letter Portrait;  }} #body table th{ border: none !important; margin: 0px !important; padding: 0px !important; font-size: 12px !important;} #body table tr td{ border:none !important; font-size:12px !important;  height: 15px !important;margin: 0px !important; } </style>'  +
                    '</head>\n' +
                    '<body style="width: 770px;height: 900px;margin:auto;font-family:calibri;">\n' + header + '\n' + gridContent + '\n' + footer + '\n</body>\n</html>';
                /*
				document.write(pageContent);
                document.close();
                newWindow.print();
				*/
				
				pageContent = JSON.stringify(pageContent);

                    $('#body_wrap').hide();
                        $("#jqxgrid").jqxGrid('showcolumn', 'total_hours_rendered');
                           $("#jqxgrid").jqxGrid('showcolumn', 'lates');
                          $("#jqxgrid").jqxGrid('showcolumn', 'undertime');
                          $("#jqxgrid").jqxGrid('showcolumn', 'ps');
                          $("#jqxgrid").jqxGrid('showcolumn', 'ot');
			
			/*
			performajax(["Hr/sendNotificationToChief",{htmlcode:pageContent,sum_rep_id:}], function(response) {
				console.log(response);
			})
			*/
			return pageContent;
		//})
		}
	
	
})