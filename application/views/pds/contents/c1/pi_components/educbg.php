<?php 
	// var_dump($adds);

	$subhead = null;
	
	$tbl     = $adds[0];
	
	switch($tbl) {
		case "elementary":
			$subhead = "Elementary";
			break;
		case "secondary":
			$subhead = "Secondary";
			break;
		case "voctrd":
			$subhead = "Vocational / Trade Course";
			break;
		case "college":
			$subhead = "College";
			break;
		case "gradstud":
			$subhead = "Graduate Studies";
			break;
	}

?>
		<h5 class='subhead'> <?php echo $subhead; ?> </h5> 
		<hr/>
	<?php // var_dump($data); ?>
		<div class='row removepad'>
			<?php // if(count($data) == 0) { ?>
			<div class='col-md-12 removepadleft'>
				<div class='inputdiv fullwidth'>
					<p> Name of School (write in full)</p>
					<input type='text' class='' id='nameofsch'/>
				</div>
				<div class='inputdiv fullwidth'>
					<p> Basic education/degree/course (write in full)</p>
					<textarea id='course' class='' ></textarea>
				</div>

				<div class='row removepad'>
					<div class='col-md-6 removepad'>
						<div class='inputdiv fullwidth'>
							<p> From (year)</p>
							<input type='text' class=''  id='from_'/>
						</div>
					</div>
					<div class='col-md-6 removepad'>
						<div class='inputdiv fullwidth'>
							<p> to (year)</p>
							<input type='text' class=''  id='to_'/>
						</div>
					</div>
				</div>
				
				<div class='inputdiv fullwidth'>
					<p>HIGHEST LEVEL/UNITS EARNED (if not graduated)</p>
					<input type='text' class=''  id='hlevel_unitsearned'/>
				</div>
				<div class='inputdiv fullwidth'>
					<p>Year Graduated</p>
					<input type='text' class=''  id='yeargrad'/>
				</div>
				<div class='inputdiv fullwidth'>
					<p>Scholarship / Academic Honors Received</p>
					<input type='text' class=''  id='scho_honorrec'/>
				</div>
				
				<!--hr/-->
				<div id="btndivholder">
					<button class='btn btn-primary btn-sm' id='addanother'> Add  </button>
				</div>
			</div>
			
			
			<div class='col-md-12' style='margin-top: 10px; border-top:1px solid #ccc; padding-top:10px;'>
				<div class='inputdiv fullwidth' id='educlist'>
					<p> loading... </p>
				</div>
			</div>

		</div>

	
			<?php // } else { ?>
				<!--button class='btn btn-primary btn-sm' id='addeduc' data-eductype='<?php // echo $tbl; ?>'> Add </button-->
				<!--p> an error occured </p-->
			<?php // } ?>
		<!--hr/-->