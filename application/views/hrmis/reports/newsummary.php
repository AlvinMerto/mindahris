<link rel='stylesheet' href='<?php echo base_url(); ?>v2includes/style/newsummary.style.css'/>

<!--div class="content-wrapper"-->

     <!--section class="content-header">
      <!--h1>
          Summary Reports
      </h1-->
      <!--ol class="breadcrumb">
         <li class="active"><img style="margin-top:-14px;" src="<?php// echo base_url();?>assets/images/minda/rsz_1minda_logo_text.png" /></li>
      </ol-->
   <!--/section-->

   <section class="content">
     <div class="row">
       <div class="col-md-12">
         <div class="box">
             <div class="box-header with-border">
                <h3 class="box-title">  SUMMARY OF DAILY TIME RECORDS </h3>
                <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                <div class="row">
                   <div class="col-md-12">


                        <!-- Nav tabs -->
                            <!--ul class="nav nav-tabs">
                                <li class="active"><a href="#joangency" data-toggle="tab" aria-expanded="true">JOB ORDER </a></li>
                                <li class=""><a href="#plantilla" data-toggle="tab" aria-expanded="false">PLANTILLA / REGULAR </a></li>
                            </ul-->
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="joangency">
									<table class='summary_table'>
										<tbody>
											<tr>
												<TD> 
													<select class='btn btn-primary datecovers' id='emptype'>
														<option> --- please choose --- </option>
														<option> Job Order </option>
														<option> Regular </option>
													</select>
												</TD>
												<td colspan=4>
													<select class='btn btn-primary datecovers' id='datecovers'>
														<?php
															
														?>
													</select>
												</td>
												<td rowspan='5' style='background: #ececec; width: 300px; vertical-align: top; padding: 0px 15px 15px;'>
													<h5 style='border-bottom: 1px solid #ccc; padding-bottom: 10px;'> Add new Coverage Date </h5>
													<span> Date Coverage: </span>
													<input type='text' id='calendarthis' class='calendarthis'/>
													<span> Deadline: </span>
													<input type='text' id='deadlinethis' class=''/>
													<button class='btn btn-success btn-xs addnewbtn' style='margin-top: 9px;'> Add New </button>
												</td>
											</tr>
											<tr>
												<td style='text-align:right;'> DATE COVERED: </td>
												<td class='thedate' style='text-align:left; padding-left: 3px;' id='datecovered'> 
													<?php
														echo "<span id='datestart'></span>";
															echo " - ";
														echo "<span id='dateend'></span>";
													?> 
													<div id='showcal'></div>
												</td>
												<td id='editdcovered'>  </td>
											</tr>
											<tr>
												<td style='text-align:right;'> DEADLINE OF SUBMISSION: </td>
												<td class='thedate' style='text-align:left; padding-left: 3px;'>
													<span id='datedeadline'></span>
												</td>
												<td id='editdddate'> </td>
											</tr>
											<tr>
												<td colspan=4> 
													<hr class='newlinestyle'/> 
												</td>
											</tr>
											<tr>
												<td colspan=4>
													<button class='btn btn-default' id='allowsubmit'> -- </button>
													<button class='btn btn-default' id='setasactive'> -- </button>
													<button class='btn btn-default'> Print </button>
													<button class='btn btn-default'> Print Deduction Details </button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="tab-pane fade in" id="plantilla">
									plantilla
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<script>
	$("#calendarthis").jqxDateTimeInput({ width: "100%", height: 25,  selectionMode: 'range', formatString: 'd' });
	$("#deadlinethis").jqxDateTimeInput({ width: "100%", height: 25, formatString: 'd' });
</script>	
<!--/div-->