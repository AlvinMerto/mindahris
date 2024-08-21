<div class='content-wrapper'> <!-- content wrapper -->
	<section class="content"> <!-- section class content -->
      <div class='content_wrapper'>
		<div class='uploader_div'>
			<!--p class='up_text_head'> Upload File(s) </p-->
			<form method = 'post' enctype="multipart/form-data">
				<label for='grp_name'> Album Name: </label>
				<textarea class='form-control' name='grp_name' style='resize:vertical; min-height:30px;'></textarea>
				<br/>
				<!--input type='file' multiple/-->
				<label> Upload files: </label>
				<br/>
				<label class="btn btn-default uploadfile_btn">
					<input type="file" id='mydocs' name='attachments_' multiple />
				</label>
			<br/>			
			<input type='submit' value='Begin upload' name='uploaddocs' id='uploadthefiles' class='btn btn-primary'/>
			<p style='margin: 9px 0px 0px 0px; color: red;'> <strong>**Note:</strong> uploaded files can be viewed by everyone. </p>
			</form>
		</div>
		<div id='uploadedfiles'></div>
	  </div>
	</section>
</div>