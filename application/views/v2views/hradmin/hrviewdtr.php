<link rel='stylesheet' href='<?php echo base_url(); ?>v2includes/style/hrviewdtr.style.css'/>

<div class='hvdbox'>
	<div class='col-md-4 hvdleftbox'>
		<div class='innerboxdiv'>
			<h4> <i class="fa fa-print" aria-hidden="true"></i> &nbsp; Print Daily Time Records </h4>
			<div class='col-md-6 removepad'>
				<p style='color: #a7a7a7;'> <small> Date </small> </p>
				<input type='text' class='datetext calendartxt'/>
			</div>
			<div class='col-md-6 removepad'>
				<p> <small> &nbsp; </small> </p>
					<select class='btn btn-default emptype' id='offdiv'>
						<option> -OFFICE/DIVISION </option>
						<?php 
							echo "<optgroup label='Office'>";
								foreach($office as $o) {
									echo "<option value='{$o->DBM_Sub_Pap_id}_off'>";
										echo $o->DBM_Sub_Pap_Desc;
									echo "</option>";
								}
							echo "</optgroup>";
							
							echo "<optgroup label='Division'>";
								foreach($division as $d) {
									echo "<option value='{$d->Division_Id}_div'>";
										echo $d->Division_Desc;
									echo "</option>";
								}
							echo "</optgroup>";
							
							echo "<optgroup label='All Employees'>";
								echo "<option value='all'> All </option>";
							echo "</optgroup>";
						?>
					</select>
					
				<select class='btn btn-default emptype' id='emptype'>
					<option> -EMPLOYMENT TYPE </option>
					<option value='JO'> JO / Contract of service </option>
					<option value='REGULAR'> REGULAR / Plantilla </option>
				</select>
				<input type='submit' value='Show' id='showbtn' class='btn btn-primary'/>
				
				<hr style='margin: 10px 0px; border-color: transparent;'/>
				<div class='innerboxdiv' style='text-align:center;'>
					<p> <small> Filter </small> </p>
					<hr style='margin: 3px 0px 10px; border-color: #ccc;'/>
					
				</div>
				<hr style='margin: 10px 0px; border-color: transparent;'/>
				
				<div class='innerboxdiv' style='text-align:center;'>
					<p> <small> Print the back portion of the DTR </small> </p>
					<hr style='margin: 3px 0px 10px; border-color: #ccc;'/>
					<button class='btn btn-primary' id='printbackbtn'> Print Back </button>
				</div>
				
			</div>
		</div>
		
		<span id='choosewhatodo'></span>
		<!--div class='innerboxdiv'>
			<h4> &nbsp; Choose what to do </h4>
		</div-->
	</div>
	<div class='col-md-8 hvdrightbox removepad'>
		<div class='divwhiteright'>
			<h4> Select Employee </h4>
			<span id='selemp'></span>
		</div>
	</div>
</div>

<!--script src='<?php // echo base_url(); ?>v2includes/js/hrviewdtr.procs.js'></script-->
<script>
	var calendarvar = null;
	$(document).find(".calendartxt").jqxCalendar({ 
		value: new Date(2017, 7, 7), width: "88%", height: 220, selectionMode: 'range' 
	});
    $(document).find(".calendartxt").on('change', function (event) {
		var selection = event.args.range;
		// $("#selection").html("<div>From: " + selection.from.toLocaleDateString() + " <br/>To: " + selection.to.toLocaleDateString() + "</div>");
		// hrview.calendar = selection.from.toLocaleDateString()+" - "+selection.to.toLocaleDateString();
		calendarvar = selection.from.toLocaleDateString()+" - "+selection.to.toLocaleDateString();
	});
    
    var date1   = new Date();
		date1.setFullYear( date1.getFullYear() , date1.getMonth() , date1.getDate());
		
     var date2 = new Date();
         date2.setFullYear( date2.getFullYear() , date2.getMonth() , date2.getDate());
	// var fromdate = date_.getFullYear()+" "+date_.getMonth()+ ""+
	
    $(document).find(".calendartxt").jqxCalendar('setRange', date1, date2);
</script>