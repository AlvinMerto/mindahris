<div class='content-wrapper' style='padding:0px;'> <!-- content wrapper -->
	<section class="content" style='padding:0px;'> <!-- section class content -->
      <div class='content_wrapper'>
		<!--input type='button' id='alvintest' value='test'/-->
		<div class='employ_cat' style='display:none;'>
			<div class='btn-group'>
				<form method='post'>
					<!--textarea style='display:none;' name='forrevdets'><?php //echo json_encode($forrev); ?></textarea-->
					<!--input type='submit' class='btn btn-primary' name='approveall' value='Approve All'/-->
					<!--button class='btn btn-primary' id='approveall'>  &nbsp; Approve All </button-->
				</form>
			</div>
			<?php //if (isset($approvedall)){ echo $approvedall; } ?>
		</div> <!-- padding: 0px 11px;  -->
		<div class='division_select'>
			<!--h4 style='float:left;position:relative;'> Division / Unit: </h4-->
			<!--div class='division_drop_hide'-->
				<?php if (isset($get_divs)): ?>
				<ul class='division_drop'>
					<li style='text-align:left;'> 
						<?php							
							$url = base_url()."dtr/forapproval";
							if (isset($_GET['division'])) {
								foreach($get_divs as $f) {
									if ($f->Division_Id == $_GET['division']) {
										echo "<strong>".$f->Division_desc."</strong>";
										echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
										echo "<a href='{$url}' style='float: right;' title='Clear Selection'/><i class='fa fa-times'></i></a>";
										break;
									}
								}
							} else {
								echo "-- SELECT DIVISION --";
							}
						?>
					</li>
					<?php 
						foreach( $get_divs as $gd ){
							echo "<a href='{$url}/?division={$gd->Division_Id}'/>";
								echo "<li>";
									echo "<i class='fa fa-angle-right'></i> &nbsp; ".$gd->Division_desc;
								echo "</li>";
							echo "</a>";
						}
					?>
				</ul>
				<?php endif; ?>
			<!--/div-->
		</div>
		<!--h4 style='padding: 14px 11px 5px;'> DTR: For Review </h4-->
		<?php if ($isadmin == "admin"): ?>
		<ul class='forreviewul'>
			<a href='<?php echo base_url(); ?>dtr/review'>
				<li class='<?php echo ($nav=='fr')?"selectedli":""; ?>'> <p> <i class="fa fa-eye" aria-hidden="true"></i>  For Review <?php echo ($nav == "fr")?$argc:""; ?></p> 
					<ul>
						<a href='<?php echo base_url(); ?>dtr/review/forreview/plantilla'> 
							<li class='btn btn-default'> Plantilla </li>
						</a>
						<a href='<?php echo base_url(); ?>dtr/review/forreview/joborder'> 
							<li class='btn btn-default'> Job Order </li>
						</a>
					</ul>
				</li>
			</a>
			<?php if ($findingsfrom == 1): ?>
			<a href='<?php echo base_url(); ?>dtr/review/waitingforapproval'> 
				<li class='<?php echo ($nav=='wa')?"selectedli":""; ?>'> <p> <i class="fa fa-circle-o-notch" aria-hidden="true"></i> Waiting for approval <?php echo ($nav == "wa")?$argc:""; ?></p> 
					<ul>
						<a href='<?php echo base_url(); ?>dtr/review/waitingforapproval/plantilla'> 
							<li class='btn btn-default'> Plantilla </li>
						</a>
						<a href='<?php echo base_url(); ?>dtr/review/waitingforapproval/joborder'> 
							<li class='btn btn-default'> Job Order </li>
						</a>
					</ul>
				</li> 
				
			</a>
			
			<a href='<?php echo base_url(); ?>dtr/review/notsubmitted'> 
				<li class='<?php echo ($nav=='ns')?"selectedli":""; ?>'> <p> <i class="fa fa-times-circle" aria-hidden="true"></i> Not Submitted <?php echo ($nav == "ns")?$argc:""; ?></p> </li>
			</a>
			
			<a href='<?php echo base_url(); ?>dtr/review/cleared'> 
				<li class='<?php echo ($nav=='cl')?"selectedli":""; ?>'><p> <i class="fa fa-check-circle" aria-hidden="true"></i> Cleared <?php echo ($nav == "cl")?$argc:""; ?></p> 
					<ul>
						<a href='<?php echo base_url(); ?>dtr/review/cleared/plantilla'> 
							<li class='btn btn-default'> Plantilla </li>
						</a>
						<a href='<?php echo base_url(); ?>dtr/review/cleared/joborder'> 
							<li class='btn btn-default'> Job Order </li>
						</a>
					</ul>
				</li>
			</a>
			<?php endif; ?>
			
			<!--li class='searchli'> 
				<div class='searchbox'>
					<span> Search: </span> <input type='text' id='searchthebar'/>
				</div>
			</li-->
			
			<?php if( $selectdate != null ): ?>
			<li> <i class="fa fa-calendar" aria-hidden="true"></i> Select Month
				<ul>
					<!--li class='btn btn-default'> Month 2X, 2XXX </li-->
					<?php 
						foreach($selectdate as $sd) {
							echo "<a href='{$url}/{$sd->dtr_cover_id}'/>";
								echo "<li class='btn btn-default'>";
									echo date("M. d, Y", strtotime($sd->date_started))." - ".date("M. d, Y",strtotime($sd->date_ended));
								echo "</li>";
							echo "</a>";
						}
					?>
				</ul>
			</li>
			<li style='float:right;'> 
				<p> 
					<?php 
						switch($jobtype) {
							case "JO":
								echo "JOB ORDER - ";
								break;
							case "REGULAR":
								echo "PLANTILLA - ";
								break;
						}
						echo $date_;
					?>
				</p>
			</li>
			<?php endif; ?>
		</ul>
		<?php endif; ?>
		<ul class='ulheader'>
			<li style='background: #d4d2d2; border-top: 2px solid #3c8dbc;'>
				<table class='tblheader'>
					<tr>
						<td> Cover Date </td>
						<td> Full Name </td>
						<td> Approval Status </td>
						<td> Action </td>
					</tr>
				</table>
			</li>
		</ul>
		<div class='review_cont'>
			<ul id='listofpeople'>
				<?php 
					if (count($forrev)==0) {
						echo "<p style='text-align: center; padding: 100px; color: #928c8c;'> No DTR found </p>";
					} else {
						foreach($forrev as $f) {
						
						$btn_clear = ($nav == "cl")?"<p style='text-align:center; margin:0px;'><button class='revertback btn btn-xs btn-primary' data-cntid  = '{$f->cnt_id}'> Revert back </button> </p>":null;
							$approval_status = null;
							if ($f->approval_status == 1) {
								$approval_status = "<p style='color: #1e6080; float: left; font-size: 12px; text-transform:uppercase; text-align: center; width: 100%;'>Approved by Chief</p> <div style='clear:both;'></div>";
							} else if ($f->approval_status == 2) {
								$approval_status = "<p style='color: #3c8dbc; float: left; font-size: 12px; text-transform:uppercase; text-align: center; width: 100%;'>this DTR is approved</p> <div style='clear:both;'></div>";
							} else if ($f->approval_status == 0) {
								$approval_status = "<p style='color: red; float: left; font-size: 12px; text-transform:uppercase; text-align: center; width: 100%;'>NOT APPROVED</p> <div style='clear:both;'></div>";
							}
							echo "<li 
									class='btn btn-default'
									data-emp_id = '{$f->emp_id}'
									data-retwat = '2'
									data-cntid  = '{$f->cnt_id}'
									data-coverage = '{$f->date_started} - {$f->date_ended}'>
										<table>
											<tr>
												
											<!--div style='padding: 7px 12px 12px 12px;'-->
												<td> <p style='text-align:center;'> <strong> {$f->date_started} - {$f->date_ended}</strong> </p> </td>
												<td> <p class='thefname'> {$f->f_name} </p> </td>
												<td> {$approval_status} </td>
												<td> {$btn_clear} </td>
											<!--/div-->
											</tr>
										</table>
								  </li>";
						}
					} //{$f->Division_desc}
				?>
			</ul>
		</div>
	  </div>
	</section>
</div>

<div class="modal fade" id="dtrforcheck" tabindex="-1" role="dialog" aria-labelledby="label_exceptions" aria-hidden="true" style="display: none;">
    <div class="modal-lg modal-dialog rewidth">
        <div class="modal-content">
			<div class='modal-body bodyoverflow'>
				<div class='floatleft the_dtr_view' id='thedtr'>
					
				</div>
				<div class='floatleft leftdetails'>
					<div class='btnholder the_dtr_details'>
						<div class='makecenter'>
							<button class='findingbtns btn btn-default' id='addfinding'> Add a finding </button>
							<?php // if(!isset($chief_here)): ?>
							<?php if(isset($isadmin) && $isadmin == "admin" || isset($isfocal)): ?>
							<?php // if(isset($isfocal)): ?>
								<button class='findingbtns btn btn-primary' id='allowsubmit'> Clear </button>
							<?php endif; ?>
							
							<?php if(isset($chief_here)): ?>
								<a href='' target='_blank' class='findingbtns btn btn-primary' id='approvedtr'> Approve </a>
							<?php endif; ?>
							
						</div>
					</div>
				
					<div class='findingdiv' id='findingdiv'>
						<p> <strong> Date in DTR </strong> </p>
						<p> <input type='text' class='form-control' id='findingdate'/> </p>
						<p> <strong> Your Finding </strong> </p>
						<p> <textarea class='form-control' id='themsgtext'></textarea> </p>
						<p> <button class='btn btn-primary' id='addnow'> Add </button> </p>
						
						<div class='thefindings'>
							<p> <strong> Findings </strong> </p> 
								<p class='nofindingsyet'> None </p>
								<ul id='findingsul'>
									
								</ul>
							<hr/>
							<p style='text-align:center;'>
							<button class='btn btn-primary' id='returnbackwithfindings' data-findingsfrom='<?php echo $findingsfrom; ?>'> Return to owner </button>
							</p>
						</div>
					</div>
					<p id='statustext'> </p>
				</div>
			</div>
		</div>
	</div>
</div>