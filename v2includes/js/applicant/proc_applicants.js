(function(){
	$(document).on("click","#exporttoexcel",function(){
		exportTableToExcel('theapplicants');
	})
	
	$(document).on("click",".listtable ul li",function(event){
		var text = $(this).text();
		$(document).find("#namesearch").val(text).focus();
	})
	
})();

	function exportTableToExcel(tableID, filename = '') {
		var downloadLink;
		var dataType = 'application/vnd.ms-excel';
		var tableSelect = document.getElementById(tableID);
		var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
		
		// Specify file name
		filename = filename?filename+'.xls':'applicants.xls';
		
		// Create download link element
		downloadLink = document.createElement("a");
		
		document.body.appendChild(downloadLink);
		
		if(navigator.msSaveOrOpenBlob){
			var blob = new Blob(['\ufeff', tableHTML], {
				type: dataType
			});
			navigator.msSaveOrOpenBlob( blob, filename);
		}else{
			// Create a link to the file
			downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
		
			// Setting the file name
			downloadLink.download = filename;
			
			//triggering the function
			downloadLink.click();
		}
	}