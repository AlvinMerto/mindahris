<div class="content-wrapper" > <!-- style='margin-left: 230px !important;' -->
	<section class="content" style='padding:0px 0px 0px 15px;'>
		<h4 style='border-bottom: 1px solid #dadada; padding-bottom: 8px;'> Timelog Management <small style='margin-left: 7px; color: #b3aeae;'> upload the timelog file  </small> </h4>
		
		<form method='POST' enctype="multipart/form-data">
			<input type='file' name='tlfile'/>
			<hr style='margin: 9px 0px;'/>
			<input type='submit' value='Push' class='btn btn-primary' id='btnpush' name='uploadfile'/>
		</form>
		<hr style='border-color: #3c8dbc; border-top: 2px solid; margin-top: 12px;'/>
		
		<?php 
			if (isset($return)) {
				if ($return == 1) {
					echo "Timelog has been saved";
				} else {
					echo "an error occured";
				}
			}
		?>
		
		<h4 style='border-bottom: 1px solid #dadada; padding-bottom: 8px;'> Upload timelog from google form <small style='margin-left: 7px; color: #b3aeae;'> manually upload timelog data from the google form  </small> </h4>
		
		<form method='POST' enctype="multipart/form-data">
			<input type='file' name='googlefile'/>
			<hr style='margin: 9px 0px;'/>
			<input type='submit' value='Push' class='btn btn-primary' id='btnpush' name='gfilebtn'/>
		</form>
		<hr style='border-color: #3c8dbc; border-top: 2px solid; margin-top: 12px;'/>
		
		
	</section>
	
	<!--
		sir Jon
		sir Yo
		maam Cess
		sir Rolly
		maam Joan
	-->
	
</div>