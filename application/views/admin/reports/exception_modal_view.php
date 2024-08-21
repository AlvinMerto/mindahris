<div class="row">
         <div class="col-lg-12">


            <div class="row">


		            <div class="col-md-3">
		            	<div id="jqxexceptions"></div>
		            </div>




		            <div class="col-md-3">

						<div id="jqxexceptions_leave"></div>
						<div id="jqx_exceptions_ob"></div>

		            </div>

		            <div class="col-md-2" style="margin-top: 5px; display: none;" id="input_halfday_div">
						 <input type="checkbox" id="input_halfday" name="set_type"  > HALF DAY?
		            </div>


		            <div class="col-md-2" style="margin-top: 5px; margin-left:-50px; display:none;" id="input_am_pm_leave_div">
						 <input type="radio"  id="am_type_leave" name="am_pm_select" checked value="AM" > AM</input>	
						 <input type="radio"  id="pm_type_leave" name="am_pm_select" value="PM"> PM</input>
		            </div>




        	 </div>


 			  <hr>


         			<input type="hidden" value="" id="jqx_check_exact_id" />
  
			         <div id="timeinout_form">

					         <div class="row">
						 			<div class="col-md-12">
							 			<table class="table table-bordered">
							 				<tr>
							 					<td>IN</td>
							 					<td>OUT</td>
							 					<td>IN</td>
							 					<td>OUT</td>
							 				</tr>
							 				<tr>
	
							 					<td style="width:24%;">
							 						<span id="jqxTIMEIN_AM"></span>
							 						<input type="checkbox" id="jqxtime_1_check" checked="true" />
							 						<div id="jqxtime_1"></div>
							 						<input c_type="C/In" s_type="AM" id="jqx_hide_1" type="hidden" value="1"/>
							 					</td>

							 					<td style="width:24%;">
							 						<span id="jqxTIMEOUT_AM"></span>
							 						<input type="checkbox" id="jqxtime_2_check" checked="true"/>
							 						<div id="jqxtime_2"></div>
							 						<input c_type="C/Out" s_type="AM"  id="jqx_hide_2" type="hidden" value="1"/>
							 					</td>

							 					<td style="width:24%;">
							 						<span id="jqxTIMEIN_PM"></span>
							 						<input type="checkbox" id="jqxtime_3_check" checked="true" />
							 						<div id="jqxtime_3"></div>
							 						<input c_type="C/In" s_type="PM" id="jqx_hide_3" type="hidden" value="1"/>
							 					</td>

							 					<td style="width:24%;">
							 						<span id="jqxTIMEOUT_PM"></span>
							 						<input type="checkbox"  id="jqxtime_4_check" checked="true"/>
							 						<div id="jqxtime_4"></div>
							 						<input c_type="C/Out" s_type="PM" id="jqx_hide_4" type="hidden" value="1"/>
							 					</td>

							 				</tr>
							 			</table>
						 			</div>
						 	</div>
				 	</div>






				<!--  AMS FORM  -->
				 <div id="ams_form">

					<p style='background: #1e8e7e; color: #fff; font-size: 15px; padding: 10px; text-align: center;'>
						Para maka supply ug time log ang HRIS para sa mga oras nga dili ma capture sa biometrics. Palihog ug scan sa imong ID didto sa laptop. 
					</p>
			
			         <div class="row">

				 			<div class="col-md-12">
				 			<h5>Remarks</h5>
				 				<textarea id="jqxinput_remarks" class="form-control"></textarea>
				 			</div>
				 	</div>


				 </div>




				 <!-- PASS SLIP FORM   -->
				 <div id="passlip_form">
					 <h4>PASS SLIP FORM (PS)</h4>
					 <p style='background: #1e8e7e; color: #fff; font-size: 15px; padding: 10px; text-align: center;'> Please use the calendar in applying for a pass slip next time. Salamat </p>
					 <p style='background: #1e8e7e; color: #fff; font-size: 15px; padding: 10px; text-align: center;'> 
						Apply lang ug pass slip then once approved. e scan ang inyong ID didto sa laptop. 
					 Hulata nga naay mugawas na window nga naga pangutana kung mugawas ba ka or dili, pili.a lang ang yes. No need na e print ang pass slip, ug no need napud e attach sa DTR, 
					 kung sa online mo nag apply.</p>
					 <div style='display:none;'>
						 <input type="radio"  id="radio_1" name="ps_type" checked value="1" > Official</input>	
						 <input type="radio"  id="radio_2" name="ps_type" value="2"> Personal</input>

						  <div class="row" id="ps_time_in_out" <?php if($this->session->userdata('usertype') == 'admin') { echo 'style="display:block;"'; } else { echo 'style="display:none;"'; } ?> >
							<div class="col-md-4">
								 <h5>TIME OUT: </h5>
								 <div id="jqxtime_out_ps"></div>
							</div>

							<div class="col-md-4">
								 <h5>TIME IN: </h5>
								 <div id="jqxtime_in_ps"></div>
							</div>
						  </div>
						 
						 


						 <h5>Reason: </h5>
						 <textarea class="form-control" id="jqxinput_reasons" ></textarea>
						 <div class="row">
							<div class="col-md-4">
								 <h5>Approved by: </h5>
								 <div id="jqx_approved_list"></div>
							</div>
								
						 </div>
					</div>
				 </div>


				<!-- CA -->
				 <div id="ca_form">
					 <h4>Certificate of Appearance (CA)</h4>
					 <!--p style='background: #1e8e7e; color: #fff; font-size: 15px; padding: 10px; text-align: center;'>
						Palihog ug hatag sa imong hard copy sa inyong focal person. Dili na kinahanglan e scan ang CA ug e attach diri sa DTR system.
					</p-->
					 <div style='display:none;'>
					 <h5>Reason: </h5>
					 <textarea class="form-control" id="jqxinput_ca_reasons" ></textarea>
					 </div>
				 </div>
				<!-- -->
	
				<!-- CTO -->
					<div id="cto_form">
					 <h4>Compensatory Time-Off (CTO)</h4>
					 <!--p style='background: #1e8e7e; color: #fff; font-size: 15px; padding: 10px; text-align: center;'> 
						Palihog ug hatag sa imong hard copy didto sa inyong focal person. 
					</p-->
					 <!--p style='color: red;'> Please note that in accordance to CSC's rules and regulations; one cannot use COC (<i>CTO</i>) to offset tardiness. Please refer to HR unit for the document.</p-->
					 <a href='' class='btn btn-xs btn-primary' style='display:none;' id='cto_link_a' target='_blank'> View Form </a>
					 <!--textarea class="form-control" id="jqxinput_cto_reasons" ></textarea-->
					 <div class="row" id="CTO_time_in_out" style='display:none;' <?php // if($this->session->userdata('usertype') == 'admin') { echo 'style="display:block;"'; } else { echo 'style="display:none;"'; } ?> >
					  	<div class="col-md-4">
					  		 <h5>TIME start: </h5>
					  		 <div id="jqxtime_in_cto"></div>
					  	</div>

					  	<div class="col-md-4">
					  		 <h5>TIME end: </h5>
					  		 <div id="jqxtime_out_cto"></div>
					  	</div>
					  </div>
					 	
					</div>
				<!-- end CTO -->

				<!-- OT -->
					<div id="ot_form">
					 <h4>Overtime (OT)</h4>
					 <p> Please attach your scanned OT Memo and OT accomplishment report form. </p>
					</div>
				<!-- end OT -->

				 <!-- OB FORM  -->
				 <div id="ob_form">
					<h4> Official Business (OB) </h4>
					<p style='color: #fff; background: red; text-align: center; font-size: 20px; padding: 13px 0px;'> 
						Palihog ug secure ug hard copy sa inyong TO, IT ug CA, then ihatag sa inyong focal person ang documents. 
						Dili na kinahanglan nga e scan ang documents ug e attach sa DTR. 
					</p>
					<div style='display:none;'>
				 	 <div class="row">
					  	<div class="col-md-4">
					  		 <h5>TIME OUT: </h5>
					  		 <div id="jqxtime_out_ob"></div>
					  	</div>

					  	<div class="col-md-4">
					  		 <h5>TIME IN: </h5>
					  		 <div id="jqxtime_in_ob"></div>
					  	</div>
					  </div>


				 	  <div class="row">
				 	  		<div class="col-md-12">
				 				<h5>Remarks</h5>
				 				<textarea id="jqx_remarks_ob" class="form-control"></textarea>
				 			</div>
				 	  </div>
					</div>


				 </div>




				 <!-- PAF FORM -->
				 <div id="paf_form">
					<h4>Personal Attendance Form (PAF) </h4>
					<p style='background: #1e8e7e; color: #fff; font-size: 15px; padding: 10px; text-align: center;'>
						Para mag apply ug PAF, palihog ug gamit sa calendar didto sa leave cabinet. Salamat
					</p>
					<div style='display:none;'>
					 <div class="row">
					  	<div class="col-md-4">
					  		 <h5>TIME IN: </h5>
					  		 <div id="jqxtime_in_paf"></div>
					  	</div>

					  	<div class="col-md-4">
					  		 <h5>TIME OUT: </h5>
					  		 <div id="jqxtime_out_paf"></div>
					  	</div>
					  </div>
					 
					 <h5>Reason/Justification: </h5>
					 <textarea class="form-control" id="jqxinput_reason_justification"></textarea>
					 <div class="row">
					 	<div class="col-md-4">
					 		 <h5>Recorded by: </h5>
					 		 <div id="jqx_recorded_by_paf"></div>
					 	</div>
					 	<div class="col-md-4">
					 		 <h5>Division Chief / OIC: </h5>
					 		 <div id="jqx_approved_list_paf"></div>
					 	</div>
					 	<div class="col-md-4">
					 		 <h5>Approved by: </h5>
					 		 <div id="jqx_approved_list_paf_1"></div>
					 	</div>
					 </div>

		 				<h5>Remarks</h5>
		 				<textarea id="jqxinput_remarks_paf"s class="form-control"></textarea>
					</div>
				</div>









				<!-- LEAVES FORM  -->
				<div id="leaves_form">
					 <h4>Attach a leave  </h4>
					<!--p> Please attach your scanned <span style="text-transform: uppercase;" id="label_leave_type"></span> Leave form. </p-->
					<p style='background: #1e8e7e; color: #fff; font-size: 15px; padding: 10px; text-align: center;'> Please use the calendar in applying for leave next time. Salamat </p>
				<div style='display:none;'>
					 <div id="sl_form">

						 <div class="row">
						 		<div class="col-md-4">
	 								 <input type="radio"  id="sl_r_1" name="sl_type" checked value="1" > Out Patient </input>	
									 <input type="radio"  id="sl_r_2" name="sl_type" value="2"> In Hospital </input>
						 		</div>

						 </div>
		 				<h5>Specify</h5>
		 				<textarea id="jqx_input_sl_specify"s class="form-control"></textarea>

					 </div>




					 <div id="vl_form">
					 	<div class="row">
						 		<div class="col-md-4">
	 								 <input type="radio"  id="ol_r_1" name="vl_type" checked value="1" > Within the Philippines </input>	
									 <input type="radio"  id="ol_r_2" name="vl_type" value="2"> Abroad (Specify) </input>
						 		</div>
					 	</div>
			 			<h5>Specify</h5>
		 				<textarea id="jqx_input_vl_specify"s class="form-control"></textarea>
					 </div>





					 <div id="spc_form">

					 	<h5>Types of special leave previledges applied for</h5>
					 		<div class="row">
					 			<div class="col-md-4">
					 				<input type="checkbox"  id="spcl_c_1" name="spc_type" checked value="1" > PERSONAL MILESTONE </input>	
					 			</div>
					 			<div class="col-md-4">
									<input type="checkbox"  id="spcl_c_2" name="spc_type" value="2"> FILIAL OBLIGATIONS</input>
					 			</div>
					 			<div class="col-md-4">
					 				<input type="checkbox"  id="spcl_c_3" name="spc_type" value="2"> PERSONAL TRANSACTIONS </input>
					 			</div>		
					 		</div>
					 		<div class="row">
					 			<div class="col-md-4">
					 				 <input type="checkbox"  id="spcl_c_4" name="spc_type" value="2"> PARENTAL OBLIGATIONS </input>
					 			</div>
					 			<div class="col-md-4">
					 				<input type="checkbox"  id="spcl_c_5" name="spc_type" value="2"> DOMESTIC EMERGENCIES </input>
					 			</div>
					 			<div class="col-md-4">
					 				<input type="checkbox"  id="spcl_c_6" name="spc_type" value="2"> CALAMITIY , ACCIDENT , HOSPITALIZATION LEAVE </input>
					 			</div>
					 		</div>
					 
					 </div>


					 <div id="ol_form">
			 			<h5>Specify</h5>
		 				<textarea id="jqx_input_ol_specify"s class="form-control"></textarea>
					 </div>



						 <div class="row">
						 	<div class="col-md-4">
						 		 <h5>Chief/OIC Chief of Office: </h5>
						 		 <div id="jqx_approved_list_leave"></div>
						 	</div>
						 	<div class="col-md-4">
						 		 <h5>Authorized Official: </h5>
						 		 <div id="jqx_autho_official_leave"></div>
						 	</div>
						  		
						 </div>

					</div>
				</div>



				<hr>

				<!--  all attachments  -->
				<div class="row" style='display:block;'>
		 	  		<div class="col-md-4">
		 	  			<h5>Attachments</h5>

		 	  			<form enctype="multipart/form-data" action="upload.php" method="post" id="form_attachments" >
						    <input name="file[]" type="file" />
						    <button class="add_more">Add More Files</button>
						    <button type="reset" id="file_reset" style="display:none">
						</form>
		 	  			
		 	  		</div>
		 	  		<div  class="col-md-4">

		 	  			<div id="attachments_view"></div>

		 	  		</div>
				</div>
				<!--div class="row">
					<div class='col-md-12'>
						<p style='text-align: center; font-size: 16px;'> select lang ug bisan unsang klase sa attachment nga imong e attach ug palihog ug pindot sa "SAVE ALL CHANGES", palihog ug hatag sa hard copy sa imong application form didto sa inyong focal person.
							dili na kinahanglan nga e scan pa ang documents ug e attach dinhi sa DTR system.</p>
					</div>
				</div-->



        </div>
</div>


<script type="text/javascript">

	var l_users = <?php echo json_encode($dbusers);?>;

    $(document).ready(function () {

    	$("#jqx_r_time_in").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
    	$("#jqx_r_time_out").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});



/*    	var filter_division_heads = [];
    	var filter_active_employees = [];


   		 for(i in l_users){


   		 	if(l_users[i].is_head == 1 && l_users[i].Division_id  == ses_division_id || l_users[i].is_head == 1 && l_users[i].DBM_Pap_id  == ses_dbm_sub_pap_id){
   		 		filter_division_heads.push(l_users[i]);
   		 	} 

   		 
   		 	if (l_users[i].is_status == 1 ){
   		 		filter_active_employees.push(l_users[i]);
   		 	}

   		 }

    	var dataAdapter_1_1 = new $.jqx.dataAdapter(filter_division_heads);*/
    	
    	/*prepare data */

    	var employment_type = "<?php echo $this->session->userdata('employment_type'); ?>";

    	
		   	if(employment_type == 'JO'){
			         // var source = ["AMS","PS","PAF","OB","CA"];
					 var source = [ "AMS","PS","PAF","OB","LEAVE","CA","CTO","OT"];
		    	}else{
		 	         var source = [ "AMS","PS","PAF","OB","LEAVE","CA","CTO","OT"];
		   	}

	        var source_ob = [
                "TRAVEL",
                "ACTIVITIES"
	        ];



	        /* leaves */
	        info = {};
	      	var leave_result = postdata(BASE_URL + 'attendance/getleaves', info);
	      	if(leave_result){
		        var leavesSourcesAdapter = new $.jqx.dataAdapter(leave_result);
				$("#jqxexceptions_leave").jqxDropDownList({ source: leavesSourcesAdapter, displayMember: "leave_name", valueMember: "leave_id", selectedIndex: 0, width: '200px' ,height: '25px' });
	      	}


     	 	 $("#jqxexceptions").jqxDropDownList({source: source, selectedIndex: 0, width: '100%', height: '25'});
     	 	 $('#jqxexceptions').val('AMS');



     	 	 $('#passlip_form').hide();
     	 	 $('#paf_form').hide();
     	 	 $('#leaves_form').hide();
     	 	 $('#ob_form').hide();
     	 	 $('#timeinout_form').show();
     	 	 $('#jqxexceptions_leave').hide();
			 $('#ot_form').hide();
     	 	 $('#ams_form').show();

 			
     	 	//$("#jqxexceptions").jqxDropDownList({ disabled: true });   



			  $('#jqxexceptions').on('select', function (event) {

			  	   $('#jqxexceptions_leave').hide();
			  	

			       var args = event.args;
			       if (args) {
			           // index represents the item's index.                          
			           var index = args.index;
			           var item = args.item;
			           // get item's label and value.
			           var label = item.label;
			           var value = item.value;


			           $('#file_name_as').html(value);



			           var exact_id = $('#jqx_check_exact_id').val();

			           if(label == 'LEAVE'){


			           		 	  $('#passlip_form').hide();
	 	 						  $('#paf_form').hide();			
	 	 						  $('#ams_form').hide();
	 	 						  $('#ob_form').hide();
								  $('#ot_form').hide();

				           		  $('#jqx_exceptions_ob').hide();

				           		  $('#leaves_form').show();	
				           		  $('#jqxexceptions_leave').show();
 								  $('#timeinout_form').hide();
 			


				           		  $('#sl_form').show();
				           		  $('#vl_form').hide();
				           		  $('#spc_form').hide();
				           		  $('#ol_form').hide();

				           		  $('#jqxexceptions_leave').val(1);
				           		  $('#btn_print_form_preview').hide();


				           		   $('#input_halfday_div').hide();
				           		   $('#input_am_pm_leave_div').hide();
								
								$('#ca_form').hide();
								$('#cto_form').hide();

				           		  $('#jqxexceptions_leave').on('select' , function (event){

				           		  	var args = event.args;
				           		  	if(args){
				           		  		var item = args.item;
				           		  		var label = item.label; 
				           		  		var value = item.value;
				           		  		$('#label_leave_type').html(label);


				           		  		if(value == 1){ /* sick leave */

				           		  			$('#sl_form').show();
				           		  			$('#vl_form').hide();
						           		    $('#spc_form').hide();
						           		    $('#ol_form').hide();
						           		    $('#input_halfday_div').hide();
						           		    $('#input_am_pm_leave_div').hide();

				           		  		}else if (value == 2){ /* vacation leave */

				           		  			$('#sl_form').hide();
				           		  			$('#vl_form').show();
						           		    $('#spc_form').hide();
						           		    $('#ol_form').hide();
						           		    $('#input_halfday_div').hide();
						           		    $('#input_am_pm_leave_div').hide();
				           		  		}else if (value == 4){ /* special leave */

				           		  			$('#sl_form').hide();
				           		  			$('#vl_form').hide();
						           		    $('#spc_form').show();
						           		    $('#ol_form').hide();
						           		    $('#input_halfday_div').hide();
						           		    $('#input_am_pm_leave_div').hide();
				           		  		}else{
				           		  			$('#sl_form').hide();
				           		  			$('#vl_form').hide();
						           		    $('#spc_form').hide();
						           		    $('#ol_form').show();
						           		    $('#input_halfday_div').hide();
						           		    $('#input_am_pm_leave_div').hide();
				           		  		}


				           		  	}

				           		  });


			           }else if(label == 'PS'){

				           		
	 	 						 $('#paf_form').hide();
	 	 						 $('#leaves_form').hide();
	 	 						 $('#ams_form').hide();
	 	 						 $('#ob_form').hide();
								 $('#ot_form').hide();

	 	 						 $("#jqxtime_out_ps").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
						         var t = new Date();
						         var twentyMinutesLater = new Date(t.getTime() + (20 * 60 * 1000));

					             $('#jqxtime_out_ps').jqxDateTimeInput('setDate', twentyMinutesLater);

					             // var t = new Date(2016, 05, 16, 17, 0, 0, 0);
					             $("#jqxtime_in_ps").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
					             $('#jqxtime_in_ps').jqxDateTimeInput('setDate', twentyMinutesLater);


					             //$('#jqxtime_out_ps').jqxDateTimeInput({ disabled: true });
					             //$('#jqxtime_in_ps').jqxDateTimeInput({ disabled: true });

								 $('#ca_form').hide();
								 $('#cto_form').hide();
								 
	 	 						  $('#jqxexceptions_leave').hide();
	 	 						  $('#jqx_exceptions_ob').hide();

 								 
			           		 	 $('#passlip_form').show();
			           		 	 $('#timeinout_form').hide();
			           		 	  $('#btn_print_form_preview').hide();
			           		 	  $('#input_halfday_div').hide();
			           		 	  $('#input_am_pm_leave_div').hide();
 
  	

			           }else if(label == 'PAF'){

			           			 $('#passlip_form').hide();
			           			 $('#ams_form').hide();
			           			 $('#leaves_form').hide();
			           			 $('#ob_form').hide();
								 $('#ot_form').hide();

			           			 $('#jqxexceptions_leave').hide();
     	 						 $('#jqx_exceptions_ob').hide();



     	 						 var myshift = SHIFT_DATA;

     	 						 var am_start = myshift[0].time_exact;
     	 						 var pm_end = myshift[3].time_exact;



  								var time_am = new Date('6/6/2016' + ' ' + covertampmto24hour(am_start).hours + ':' + covertampmto24hour(am_start).minutes);
  								var time_pm = new Date('6/6/2016' + ' ' + covertampmto24hour(pm_end).hours + ':' + covertampmto24hour(pm_end).minutes);


								$('#ca_form').hide();
								$('#cto_form').hide();

	 	 						 $("#jqxtime_in_paf").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
						       //  var t = new Date(2016, 05, 16, 8, 0, 0, 0);
					             $('#jqxtime_in_paf').jqxDateTimeInput('setDate', time_am);

					             //var t = new Date(2016, 05, 16, 17, 0, 0, 0);
					             
					             $("#jqxtime_out_paf").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
					             $('#jqxtime_out_paf').jqxDateTimeInput('setDate', time_pm);


					             $('#jqxtime_out_paf').jqxDateTimeInput({ disabled: true });
					             $('#jqxtime_in_paf').jqxDateTimeInput({ disabled: true });

     	 						 $('#paf_form').show();
     	 						 $('#timeinout_form').hide();
     	 						 $('#btn_print_form_preview').hide();
     	 						 $('#input_halfday_div').hide();
     	 						 $('#input_am_pm_leave_div').hide();


			           }else if(label == "AMS"){


			           		 	 $('#paf_form').hide();
	 	 						 $('#leaves_form').hide();
	 	 						 $('#passlip_form').hide();
	 	 						 $('#ob_form').hide();

	 	 						 $('#ams_attachments_row').html($('#attachments_source_view').html());
								
								$('#ca_form').hide();
								$('#cto_form').hide();
								$('#ot_form').hide();
								
	 	 						 $('#jqx_exceptions_ob').hide();
	 	 						 $('#jqxexceptions_leave').hide();

	 	 						 $('#timeinout_form').show();
	 	 						 $('#ams_form').show();
	 	 						 $('#btn_print_form_preview').hide();
	 	 						 $('#input_halfday_div').hide();
	 	 						 $('#input_am_pm_leave_div').hide();



			           }else if (label == "OB"){

				           		 $('#passlip_form').hide();
	 	 						 $('#paf_form').hide();
	 	 						 $('#leaves_form').hide();
	 	 						 $('#ams_form').hide();

	 	 						 $('#timeinout_form').hide();
	 	 						 $('#jqxexceptions_leave').hide();
	 	 						 $('#jqx_exceptions_ob').show();
	 	 						 $('#ob_form').show();
	 	 						 $('#input_halfday_div').hide();
	 	 						 $('#input_am_pm_leave_div').hide();
	 	 						
								$('#ca_form').hide();
								$('#cto_form').hide();
								$('#ot_form').hide();
								 
								
	 	 						 $("#jqxtime_out_ob").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});

						       	 var t = new Date();
						         var twentyMinutesLater = new Date(t.getTime() + (20 * 60 * 1000));
					             $('#jqxtime_out_ob').jqxDateTimeInput('setDate', twentyMinutesLater);

					             var t = new Date(2016, 05, 16, 17, 0, 0, 0);
					             $("#jqxtime_in_ob").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
					             $('#jqxtime_in_ob').jqxDateTimeInput('setDate', twentyMinutesLater);


					             $('#jqxtime_out_ob').jqxDateTimeInput({ disabled: true });
					             $('#jqxtime_in_ob').jqxDateTimeInput({ disabled: true });


	 	 						 $('#jqx_exceptions_ob').jqxDropDownList({source: source_ob, selectedIndex: 1, width: '100%', height: '25'});

	 	 						 $('#btn_print_form_preview').hide();
								

			            }else if (label == "CA"){
								// mark ca
								 $('#passlip_form').hide();
	 	 						 $('#paf_form').hide();
	 	 						 $('#leaves_form').hide();
	 	 						 $('#ams_form').hide();

	 	 						 $('#timeinout_form').hide();
	 	 						 $('#jqxexceptions_leave').hide();
	 	 						 $('#jqx_exceptions_ob').hide();
	 	 						 $('#ob_form').hide();
	 	 						 $('#input_halfday_div').hide();
	 	 						 $('#input_am_pm_leave_div').hide();
								 
								 $('#ca_form').show();
								 
								 $('#ot_form').hide();
								 $('#cto_form').hide();
								 
						} else if (label == "CTO") {
							// mark CTO
							$("#jqxtime_out_cto").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
							$("#jqxtime_in_cto").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
							
							 $('#passlip_form').hide();
	 	 					 $('#paf_form').hide();
	 	 					 $('#leaves_form').hide();
	 	 					 $('#ams_form').hide();

	 	 					 $('#timeinout_form').hide();
	 	 					 $('#jqxexceptions_leave').hide();
	 	 					 $('#jqx_exceptions_ob').hide();
	 	 					 $('#ob_form').hide();
	 	 					 $('#input_halfday_div').hide();
	 	 					 $('#input_am_pm_leave_div').hide();
							 
							 $('#ca_form').hide();
							 $('#ot_form').hide();
							 
							 $('#cto_form').show();
							 
							 
						} else if (label == "OT") {
							// mark OT
							$("#jqxtime_out_cto").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
							$("#jqxtime_in_cto").jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
							
							 $('#passlip_form').hide();
	 	 					 $('#paf_form').hide();
	 	 					 $('#leaves_form').hide();
	 	 					 $('#ams_form').hide();

	 	 					 $('#timeinout_form').hide();
	 	 					 $('#jqxexceptions_leave').hide();
	 	 					 $('#jqx_exceptions_ob').hide();
	 	 					 $('#ob_form').hide();
	 	 					 $('#input_halfday_div').hide();
	 	 					 $('#input_am_pm_leave_div').hide();
							 
							 $('#ca_form').hide();
							 $('#cto_form').hide();
							 
							 $('#ot_form').show();
						}
						
			       }
			   });




				 $('.add_more').click(function(e){
				        e.preventDefault();
				        $(this).before("<input name='file[]' type='file' />");
				    });


				$('body').on('click', '#upload', function(e){
				        e.preventDefault();
				       
				        return false;
				})




    });




function covertampmto24hour(time){

      var time = time;
      var hours = Number(time.match(/^(\d+)/)[1]);
      var minutes = Number(time.match(/:(\d+)/)[1]);
      var AMPM = time.match(/\s(.*)$/)[1];
      if(AMPM == "PM" && hours<12) hours = hours+12;
      if(AMPM == "AM" && hours==12) hours = hours-12;
      var sHours = hours.toString();
      var sMinutes = minutes.toString();
      if(hours<10) sHours = "0" + sHours;
      if(minutes<10) sMinutes = "0" + sMinutes;

      var result = { 'hours' : sHours , 'minutes' : sMinutes };
      return  result;

}
</script>

