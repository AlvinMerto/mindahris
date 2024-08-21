  <div class="content-wrapper" style='padding-top:0px;'>
    <!-- Content Header (Page header) -->
    <!--section class="content-header"-->
      <!--ol class="breadcrumb">
        <li class="active"><img style="margin-top:-14px;" src="<?php // echo base_url();?>assets/images/minda/rsz_1minda_logo_text.png" /></li>
      </ol-->
    <!--/section-->

    <!-- Main content -->
    <section class="content" style="padding-top: 0px;">
		<div class="row">
			<div style='padding: 0px 20px 20px 20px;
						border: 1px solid #bfbfbf;
						margin: 25px 25px;'>
				<?php $curr_link = base_url().'my/accomplishments/print'; ?>
				<h3> Accomplishment Report &nbsp; <i class="fa fa-angle-right"></i> &nbsp; <a href='<?php echo $curr_link; ?>' style='font-size:14px; position: relative;top: -3px;'>Print accomplishment report</a> </h3>
				<hr style='margin: 9px 0px;'/>
				<!--form method = 'post'>
					<div class=''>
						<p> Choose date: </p>
						<select class='btn btn-default' style='float: left; margin-right:3px;' name='month_select' id= 'month_select'>
							<?php
							/*
								for ($i = 1; $i <= 12 ; $i++) {
									$selected = null;
									if ($i == $selected_month) { // date('n')
										$selected = " selected";
									}
									echo "<option value='{$i}' {$selected}>";
										echo date("F", strtotime( date("{$i}/01/2018") ));
									echo "</option>";
								}
							*/
							?>
						</select>
						
						<input id = 'day_select' style='float: left; width:8%; margin-right:3px;' type='text' class='form-control' name='day_select' value='<?php echo $selected_day; ?>'/>
						<input id = 'year_select' style='float: left; width:12%; margin-right:3px;' type='text' class='form-control' name='year_select' value='<?php echo $selected_year; ?>'/>
						<button style='float: left; margin-right: 5px;' class='btn btn-default' name='view_accom'> <i class="fa fa-eye"></i> View Accomplishment of this date </button>
						<?php if (count($accom_this_day) >= 1): ?>
							<div style='clear:both;'></div>
							<p class='removeaccom_' id = 'remove_accom'> <i class="fa fa-eraser"></i> Accomplishment Report has been found. Click this balloon to delete it.</p>
						<?php endif; ?>
						<div style='clear:both;'></div>
						<!--hr/>
						<!-- ||||||||||||||||||||||||||| -->
							<div class='signatories_div' style='display:none;'>
								<table>
									<tr>
										<td> Certified by: </td>
										<td> Approved by: </td>
									</tr>
									<tr>
										<td>
											<select class='btn btn-default' name='division_certified'>
												<?php 
													$selected = null;
													
													foreach( $division_other as $do) {
														if ($do['emp_id'] == $division['div_empid']) {
															$selected = "selected";
														} else {
															$selected = null;
														}
														
														echo "<option value='{$do['emp_id']}' {$selected}>";
															echo $do['fname'];
														echo "</option>";
													}
													
												?>
											</select>
										</td>
										
										<td>
											<select class='btn btn-default' name='dbm_approved'>
												<?php 
													$selected = null;
													
													foreach( $dbm_other as $dbm_o) {
														if ($dbm_o['emp_id'] == $dbm['dbm_empid']) {
															$selected = "selected";
														} else {
															$selected = null;
														}
														
														echo "<option value='{$dbm_o['emp_id']}' {$selected}>";
															echo $dbm_o['fname'];
														echo "</option>";
													}
													
												?>
											</select>
										</td>
									</tr>
								</table>
							</div>
						<!-- ||||||||||||||||||||||||||| -->
						
					<!--/div>
					<hr/>
					<p> Work Accomplishment: </p>
					<textarea style='width:100%; min-height:300px; resize:vertical; padding:10px;' name='accom_text' id='accom_id'>
						<?php 
							/*
							if (count($accom_this_day) >= 1) {
								echo urldecode($accom_this_day[0]->accomplishment); 
							}
							*/
						?>	
					</textarea>
					<hr/-->
					<br/>
					<p> Please use the calendar (leave cabinet) to input your daily accomplishment report. </p>
					<!--input type='submit' value='Save Daily Accomplishment' class='btn btn-primary' name='proceed_accom_save'/--> 
					
					<?php if (isset($saving_message) && $saving_message == true): ?>
					<span style='margin-left: 9px;
								color: green;
								font-size: 14px;'> Your accomplishment report has been saved. </span>
					<?php endif; ?>
					
					<?php if(isset($saving_message) && $saving_message == false): ?>
					<span style='margin-left: 9px;
								color: red;
								font-size: 14px; display:none;'> There was an error. </span>
					<?php endif; ?>
					
				</form>
			</div>
		</div>
	</section>
</div>