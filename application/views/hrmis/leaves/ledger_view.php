     <style>
     	#tbl_leave_ledger p{
     		font-size:13px; 
     	}
     </style>
      <div class="content-wrapper">

           <section class="content-header">
            <h1>
                Leave Ledger / CTO
            </h1>
            <ol class="breadcrumb">
               <li class="active"><img style="margin-top:-14px;" src="<?php echo base_url();?>assets/images/minda/rsz_1minda_logo_text.png" /></li>
            </ol>
         </section>

            <?php     
           		$usertype = $this->session->userdata('usertype'); 
           	?>        

         <section class="content">


           <div class="row">

             <div class="col-md-6">
               <div class="box">
                   <div class="box-header with-border">
                      <h3 class="box-title">Leave Credits Balance</h3>
                      <div class="box-tools pull-right">
                         <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                      <div class="row">
                         <div class="col-md-12">

                         		<div class="table-responsive">
	                                <table class="table table-condensed" id="tbl_leave_ledger">
	                                    <thead>
	                                        <tr>
	                                            <th><p>Vacation Leave</p> <p>(VL)</p><p>Day</p></th>
	                                            <th><p>Force Leave</p> <p>(FL)</p><p>Day</p></th>
	                                            <th><p>Sick Leave</p> <p>(VL)</p><p>Day</p></th>
	                                            <th><p>Special Leave</p> <p>(SPL)</p><p>Day</p></th>
	                                            <th><p>Compensatory Overtime</p> <p>Credits (COC)</p><p>Hours:Minutes</p></th>
	                                            <th><p>Date</p></th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                        <tr>
	                                            <td></td>
	                                            <td></td>
	                                            <td></td>
	                                            <td></td>
	                                            <td></td>	
	                                            <td></td>
	                                            <td></td>
	                                        </tr>

	                                         <tr class="info">
	                                          
	                                            <td><span id="vl_display_input">0</span></td>
	                                            <td><span id="fl_display_input">0</span></td>
	                                            <td><span id="sl_display_input">0</span></td>
	                                            <td><span id="spl_display_input">0</span></td>
	                                            <td><span id="coc_display_input">0</span></td>
	                                            <td><span id="as_of_date">0</span></td>
	                                        </tr>
	                                         <tr>
	                                            <td></td>
	                                            <td></td>
	                                            <td></td>
	                                            <td></td>
	                                            <td></td>	
	                                            <td></td>
	
	                                        </tr>

	                                        <tr class="success">
	                                          
	                                            <td><span id="vl_display_input_current">0</span></td>
	                                            <td><span id="fl_display_input_current">0</span></td>
	                                            <td><span id="sl_display_input_current">0</span></td>
	                                            <td><span id="spl_display_input_current">0</span></td>
	                                            <td><span id="coc_display_input_current">0</span></td>
	                                            <td><span id="as_of_date_today"></span></td>
	                                        </tr>
	                                    </tbody>
	                                </table>
	                            </div>
	                            <!-- /.table-responsive -->

                         </div>
                      </div>
                      <!-- /.row -->
                   </div>
                   <!-- ./box-body -->
                   <!-- /.box-footer -->
                </div>
             </div>

             <div class="col-md-4" <?php if($usertype == 'admin'){  echo 'style=""'; }else if ($usertype == 'user'){  echo 'style="display:none;"'; }else if ($usertype == 'f-admin'){   echo 'style="display:none;"';} ?>>
               <div class="box">
                   <div class="box-header with-border">
                      <h3 class="box-title">Filter</h3>
                      <div class="box-tools pull-right">
                         <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                      <div class="row">
                         <div class="col-md-12">


					            <div class="row" style="margin-bottom: 20px;">        		
					            	<div class="col-lg-6">
					            			<label class="label label-default">SELECT EMPLOYEE:</label>
											<div style="margin-top:10px;" id="jqx_employee_list"></div>
					            	</div>
					            </div>



					            <div class="row" style="margin-bottom: 20px;">
						 			<div class="col-md-12">
											<button id="btn_udpate_leave_credits" class="btn btn-primary btn-sm">UPDATE LEAVE CREDITS</button>
					            	</div>       
						        </div>
	 

                         </div>
                      </div>
                      <!-- /.row -->
                   </div>
                   <!-- ./box-body -->
                   <!-- /.box-footer -->
                </div>
             </div>

            </div>






           <div class="row">

             <div class="col-md-12">
               <div class="box">
                   <div class="box-header with-border">
                      <h3 class="box-title">Result</h3>
                      <div class="box-tools pull-right">
                         <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                      <div class="row">
                      	<div class="col-md-12">
							<button style="display:none;" id="btn_show_leaver" class="btn btn-success	 btn-sm">SHOW LEAVE LEDGER</button>
							<button id="btn_coc_ledger" class="btn btn-success	 btn-sm">SHOW COC LEDGER</button>	
							<hr>	
                      	</div>
                         <div class="col-md-12">

                         		<div id="jqx_leave_ledger"></div>
                         </div>
                      </div>
                      <!-- /.row -->
                   </div>
                   <!-- ./box-body -->
                   <!-- /.box-footer -->
                </div>
             </div>


            </div>


         </section>

      </div>  






<!-- Modal for reports Exceptions / leaves, passlips etc -->

<div class="modal fade" id="modal_update_leave_credits" tabindex="-1" role="dialog" aria-labelledby="label_exceptions" aria-hidden="true" style="display: none;">
    <div class="modal-md modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
           		<h5>Update Leave Credits Balance</h5>
            </div>

            <div class="modal-body">

			       		<div class="row">

					       <form enctype="multipart/form-data"  method="post" id="form_attachments" class="form-horizontal" role="form">

									<input type="hidden"  id="jqx_hidden_id_elc"/>
									<div class="col-md-6">

									    <div class="form-group">
									      <p for="personnel_id" class="col-md-5 control-label">Vacation Leave</p>
									      <div class="col-md-7">
									      		<div style="margin-top:10px;" id="vl_input"></div>
									      </div>
									    </div>

									    <div class="form-group">
									      <p for="device_id" class="col-md-5 control-label">Force Leave</p>
									      <div class="col-md-7">
									       	  <div style="margin-top:10px;" id="fl_input"></div>
									      </div>
									    </div>

									    <div class="form-group">
									      <p for="device_id" class="col-md-5 control-label">Sick Leave</p>
									      <div class="col-md-7">
									       	  <div style="margin-top:10px;"id="sl_input"></div>
									      </div>
									    </div>

									   <div class="form-group">
									      <p for="gender" class="col-md-5 control-label">Special Leave</p>
									      <div class="col-md-7">
											<div style="margin-top:10px;" id="spl_input"></div>
									      </div>
									    </div>


									     <div class="form-group">
									      <p for="device_id" class="col-md-5 control-label">Compensatory Overtime Credits</p>
									      <div class="col-md-7">
									        	<div  style="margin-top:10px;" id="coc_input"></div>
									      </div>
									    </div>

									</div>	


									<div class="col-md-6">

							            <div style="text-align: center;">
								           	 <label style="font-size:13px; font-style: italic;"></label>
								           	 <div style="margin: auto;" id="jqx_date_as_of_credits"></div>
							            </div>

							            <div style="text-align: center;">
							            <input style="margin-top:10px;" type="checkbox" id="input_beg_balance" checked=""><br>
							         	    <label style="font-size:13px; font-style: italic;">Set as Beginning Balance</label>
							            	
							            </div>


							            <div style="text-align: center; margin-bottom: 20px;">
							          	    <input style="margin-top:10px;" type="checkbox" id="input_current_balance" checked=""><br>
							         	    <label style="font-size:13px;  font-style: italic;">Set as Current Balance</label>
							            	
							            </div>

									</div>			

					     	</form>

			            </div>


			 </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-success" id="btn_save_credits">Save All Changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

	
<!-- end modal -->






<script type="text/javascript">

    var ses_employee_id = '<?php echo $employee_id; ?>';
    var ses_usertype = '<?php echo $usertype; ?>';
    var ses_employment_type = '<?php echo $employment_type; ?>';


    var BASE_URL = '<?php echo base_url(); ?>';

        $(document).ready(function () {

        	if(ses_employment_type == 'JO'){
        		$('#leave_ledger_box').hide();
        		$('#btn_show_leaver').hide();
        	}else{
        		$('#leave_ledger_box').show();
        		$('#btn_show_leaver').show();
        	}
      
        	if(ses_usertype == 'admin'){
        		$('#leave_ledger_box').show();
        		$('#btn_show_leaver').show();
        	}


		       /* PREPARE DATA */
		      users = <?php echo json_encode($dbusers);?>;
		      LIST_USERS = users;

		        /*USERS LIST */

		      var source =
		      {
		          datatype: "json",
		          datafields: [
		            { name: 'employee_id' },
		            { name: 'f_name' }
		        ],        
		          localdata: users,

		      };



		      var dataAdapter = new $.jqx.dataAdapter(source);
		      // Create a jqxComboBox
		      $("#jqx_employee_list").jqxComboBox({ searchMode: 'containsignorecase' , source: dataAdapter, displayMember: "f_name", valueMember: "employee_id", width: 250, height: 25});
		      $('#jqx_employee_list').val(ses_employee_id);

		      $("#jqx_employee_list").on('select', function (event) {

		        
		          if (event.args) {
		              var item = event.args.item;
		              if (item) {
		                  
		                 var employee_id = item.value;
		                 var fullname = item.label;

							        for (i in users){
					                    if(users[i].employee_id == employee_id){

					                      elc_id = users[i].elc_id;
					                      sl_value = users[i].sl_value;
					                      vl_value = users[i].vl_value;
					                      fl_value = users[i].fl_value;
					                      spl_value = users[i].spl_value;
					                      coc_value = users[i].coc_value;
					                      credits_as_of = users[i].credits_as_of;
					                      is_beggining = users[i].is_beggining;
					                      is_current = users[i].is_current;
					                        	
					                    }   
					                }


					                	if(elc_id == null){
					                		elc_id = '';
					                	}

					                	if (vl_value == null){
					                		vl_value = 0;
					                	}

					                	if(fl_value == null){
					                		fl_value = 0;
					                	}

					                	if(sl_value == null){
					                		sl_value = 0;
					                	}

					                	if(spl_value == null){
					                		spl_value = 0;
					                	}

					                	if(coc_value == null){
					                		coc_value = 0;
					                	}

					                	if(credits_as_of == null){
					                		credits = ''
					                	}else{
					                		credits_as_of = ' as of ' +  moment(credits_as_of).format('MM/DD/YYYY ,  h:mm:ss a');;
					                	}

							 setTimeout(function() {

		

							 			 $('#jqx_hidden_id_elc').val(elc_id);

					            	     $('#vl_display_input').html(parseFloat(vl_value).toFixed(3));
	                                     $('#fl_display_input').html(parseFloat(fl_value).toFixed(3));
	                                     $('#sl_display_input').html(parseFloat(sl_value).toFixed(3));
	                                     $('#spl_display_input').html(parseFloat(spl_value).toFixed(3));
	                                     $('#coc_display_input').html(coc_value);
	                                     $('#as_of_date').html(credits_as_of);

	                                     $('#vl_input').val(vl_value);
	                                     $('#fl_input').val(fl_value);
	                                     $('#sl_input').val(sl_value);       
	                                     $('#spl_input').val(spl_value);
	                                     $('#coc_input').val(coc_value);
  
			                             $('#jqx_date_as_of_credits').jqxDateTimeInput('setDate', display_as_of_date);
	

					       	 }, 1500);

		                }

		             }
		         });


		      $('#btn_show_ledger').on('click' ,function(){

		      		alert('show_ledger');

		      });



		       $("#vl_input").jqxNumberInput({ width: '100px', height: '25px', spinButtons: true , digits: 4 , decimalDigits: 3 });
		       $("#fl_input").jqxNumberInput({ width: '100px', height: '25px', spinButtons: true , digits: 4 , decimalDigits: 3 });
		       $("#sl_input").jqxNumberInput({ width: '100px', height: '25px', spinButtons: true , digits: 4 , decimalDigits: 3});
		       $("#spl_input").jqxNumberInput({ width: '100px', height: '25px', spinButtons: true , digits: 4 , decimalDigits: 3});
		       $("#coc_input").jqxDateTimeInput({ width: '100px', height: '25px', formatString: 'HH:mm', showTimeButton: true, showCalendarButton: false});


		       $("#jqx_date_as_of_credits").jqxDateTimeInput({ width: '100px', height: '25px' , formatString: 'MM/dd/yyyy'});



		        $('#btn_udpate_leave_credits').on('click',function(){

		        	var employee_id = $('#jqx_employee_list').val();

		        	if(employee_id){
						$("#modal_update_leave_credits").modal('show');
		        	}
		        	     		
		        });


 
		      	$('#btn_save_credits').on('click',function(){


		      		info = {};
		      		info['elc_id'] = $('#jqx_hidden_id_elc').val();
		      		info['vl_input'] = $('#vl_input').val();
		      		info['fl_input'] = $('#fl_input').val();
		      		info['sl_input'] = $('#sl_input').val();
		      		info['spl_input'] = $('#spl_input').val();
		      		info['coc_input'] = $('#coc_input').val();

		      		info['employee_id'] = $('#jqx_employee_list').val();
		      		info['as_of_credit'] = $('#jqx_date_as_of_credits').val();
		      		info['is_beggining'] = 1;
		      		info['is_current'] = 1;


		      		var update_credits = postdata(BASE_URL + 'leaveadministration/updatecredits' ,info);

		      		if(update_credits){

		      				$("#modal_update_leave_credits").modal('hide');

		      					showmessage('Leave credits updated.','success')

		      				 $('#vl_display_input').html(parseFloat($('#vl_input').val()).toFixed(3));
		      				 $('#sl_display_input').html(parseFloat($('#sl_input').val()).toFixed(3));
		      				 $('#fl_display_input').html(parseFloat($('#fl_input').val()).toFixed(3));
		      				 $('#spl_display_input').html(parseFloat($('#spl_input').val()).toFixed(3));
		      				 $('#coc_display_input').html($('#coc_input').val());

		      		}


		       });


		      	load_leave_credits(ses_employee_id);


		      	$('#btn_show_leaver').on('click',function(){

		      		var info = {};

					var employee_id = $('#jqx_employee_list').val();

		      		info['employee_id'] = employee_id;

		      		var get_ledger = postdata(BASE_URL + "reports/generateledger" , info);

		      		if(get_ledger){

		      			$('#vl_display_input_current').html(get_ledger.vacation_leave_remaining_balance);
		      			$('#sl_display_input_current').html(get_ledger.sick_remaining_balance);
		      			$('#fl_display_input_current').html(parseFloat(get_ledger.force_remaining_balance).toFixed(3));
		      			$('#spl_display_input_current').html(parseFloat(get_ledger.special_remaining_balance).toFixed(3));


			        		var source =
				            {
				                localdata: get_ledger.leave_log_ledger,
				                datatype: "json",
				                dataFields: [
				                      { name: 'period', type: 'string' },
				                      { name: 'running_balance', type: 'string' },
				                      { name: 'particular', type: 'string' },
				                      { name: 'abs_ut', type: 'number' },
				                      { name: 'abs_ut_wo', type: 'string' },
				                      { name: 'earned_vl', type: 'string' },				                     

				                      { name: 'running_balance_sl', type: 'string' },
				                      { name: 'abs_ut_sl', type: 'number' },
				                      { name: 'abs_ut_wo_s', type: 'number' },
				                      { name: 'earned_sl', type: 'string' },
				                      { name: 'parent_id', type: 'number' },
				                      { name: 'id', type: 'number' }
				                   ],
				                hierarchy:
				                     {
					                      keyDataField: { name: 'id' },
					                      parentDataField: { name: 'parent_id' }
				                     },
				                 id: 'id'
				            };

				            var dataAdapter = new $.jqx.dataAdapter(source, {
				                loadComplete: function (data) { },
				                loadError: function (xhr, status, error) { }      
				            });


				            $("#jqx_leave_ledger").jqxTreeGrid(
				            {
				            	width: '100%',
				                source: dataAdapter,
				                columnsResize: true,
				                pageable: true,
				                pageSize: 25 ,
				                pageSizeOptions: ['50', '100', '200'] ,
              				  	pagerMode: 'advanced',
				                columns: [
				                  { text: 'PERIOD' , dataField: 'period' ,width: 200 ,  align: 'center' , cellsalign: 'left'},    
				                  { text: 'PARTICULARS' , dataField: 'particular' ,width: 200 ,  align: 'center' , cellsalign: 'left'},

				                  { text: 'EARNED',  columnGroup: 'v_leave' , dataField: 'earned_vl' , width: 140 ,  align: 'center' , cellsalign: 'right' }, 
				                  { text: 'ABS/UT W/PAY',  columnGroup: 'v_leave' , dataField: 'abs_ut' , width: 140 ,  align: 'center' , cellsalign: 'right' }, 
				                  { text: 'BALANCE' , columnGroup: 'v_leave' ,  dataField: 'running_balance' ,width: 140 ,  align: 'center' , cellsalign: 'right'},
				                  { text: 'ABS/UT W/OUT PAY' ,  columnGroup: 'v_leave' , dataField: 'abs_ut_wo' ,width: 140 ,  align: 'center' , cellsalign: 'right'},

				                  { text: 'EARNED',  columnGroup: 's_leave' , dataField: 'earned_sl' , width: 140 ,  align: 'center' , cellsalign: 'right' }, 
				                  { text: 'ABS/UT W/PAY',  columnGroup: 's_leave' , dataField: 'abs_ut_sl' , width: 140 ,  align: 'center' , cellsalign: 'right' }, 
				                  { text: 'BALANCE' , columnGroup: 's_leave' ,  dataField: 'running_balance_sl' ,width: 140 ,  align: 'center' , cellsalign: 'right'},
				                  { text: 'ABS/UT W/OUT PAY' ,  columnGroup: 's_leave' , dataField: 'abs_ut_wo_s' ,width: 130 ,  align: 'center' , cellsalign: 'right'}
			                     
				               ],  
				               ready: function () {
				                      $("#jqx_leave_ledger").jqxTreeGrid('expandAll');
				                  },           
				               columnGroups: [
				                    { text: 'VACATION LEAVE', align: 'center', name: 'v_leave' },
				                    { text: 'SICK LEAVE', align: 'center', name: 's_leave' }
				                ]
				            });

		      		}

		      	});

       	});




	function load_leave_credits( employee_id){



				var vl_value = 0;
				var sl_value = 0;
				var fl_value = 0;
				var spl_value = 0;
				var coc_value = 0;
				var credits_as_of = '';



				 for (i in users){
                    if(users[i].employee_id == employee_id){

                      elc_id = users[i].elc_id;
                      sl_value = users[i].sl_value;
                      vl_value = users[i].vl_value;
                      fl_value = users[i].fl_value;
                      spl_value = users[i].spl_value;
                      coc_value = users[i].coc_value;
                      credits_as_of = users[i].credits_as_of;
                      is_beggining = users[i].is_beggining;
                      is_current = users[i].is_current;
                      
                    }   
                }



                	if (vl_value == null){
                		vl_value = 0;
                	}

                	if(fl_value == null){
                		fl_value = 0;
                	}

                	if(spl_value == null){
                		spl_value = 0;
                	}

                	if(sl_value == null){
					      sl_value = 0;
					}

                	if(coc_value == null){
                		coc_value = 0;
                	}

                	if(credits_as_of != ''){
                		credits_as_of = ' as of ' + moment(credits_as_of).format('MM/DD/YYYY ,  h:mm:ss a');
                	}


	                 $('#vl_display_input').html(parseFloat(vl_value).toFixed(3));
	                 $('#fl_display_input').html(parseFloat(fl_value).toFixed(3));
	                 $('#sl_display_input').html(parseFloat(sl_value).toFixed(3));
	                 $('#spl_display_input').html(parseFloat(spl_value).toFixed(3));
                     $('#coc_display_input').html(coc_value);
                     $('#as_of_date').html(credits_as_of);

	}





</script>