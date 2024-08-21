
	<div class='midlaner'>
		<div class='hardcopy_div'>
			<p class='smallheader'> Upload Supporting Document </p>
				<form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo">
					<label class='btn btn-primary' id='openwindow' for='file'> Open Window </label>
					<input type="file" name="file" id='file' style='display:none;' required />
				</form>
				<input type="button" value="Upload" id='uploadBTN' class='btn btn-primary btn-xs hidethis'></input>
				<span id='output'> </span>
			<p class='uploadstext'> Files: <span id='listofattachments'> -- no files -- </span> </p>
		</div>
	</div>

					
	<div class='savedivbox'>
		<ul>
			<li class='savethefile' id='savethefile'> 
				<i class="fa fa-paperclip" aria-hidden="true" style='font-size: 21px;'></i> 
				<span style='font-size: larger;
							 position: relative;
							 top: -2px;'> &nbsp; ATTACH THIS </span></li>
		</ul>
	</div>
