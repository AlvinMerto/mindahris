// script for upload

var u = jQuery;

u(document).ready(function() {
	u('#uploadthefiles').on('click', function() {
		var file_data = $('#mydocs').prop('files')[0];   
		var form_data = new FormData();                  
		form_data.append('file', file_data);
		u.ajax({
			url: BASE_URL+'My/uploads', // point to server-side PHP script 
			dataType: 'text',  // what to expect back from the PHP script, if anything
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,                         
			type: 'post',
			success: function(php_script_response){
				console.log(php_script_response); // display response from the PHP script, if any
			}
		 });
});
})