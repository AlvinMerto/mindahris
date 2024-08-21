<div id="jqxLoader"></div>

<div class="content-wrapper">

   <section class="content-header">
    <h1>
        Attendance Record
    </h1>
    <ol class="breadcrumb">
       <li class="active"><img style="margin-top:-14px;" src="<?php echo base_url();?>assets/images/minda/rsz_1minda_logo_text.png" /></li>
    </ol>
 </section>

 <section class="content">
   <div class="row">
     <div class="col-md-5">
       <div class="box">
           <div class="box-header with-border">
              <h3 class="box-title"> Download  Timelogs</h3>
              <div class="box-tools pull-right">
                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
              <div class="row">
                 <div class="col-md-12">
                        <div class="form-group">
                            <label class="label label-default">SELECT AREA</label>
                            <div style="margin-top:10px; margin-bottom:10px;" id='jqxcomboarea'></div>
                        </div>
                 </div>
              </div>

                <div class="row">
                     <div class="col-md-12">
						<?php 
							if (isset($name)) {
								echo "<p> Getting data from: <strong> {$name} </strong> </p>";
							}
						?>
                        <p style="font-style: italic;">Last update: <span id="display_last_update">
							<?php
								
									if (count($latest_update) != 0) {
										echo $latest_update[0]->last_update;
									} else {
										if (isset($area_null)) {
											echo "<span style='color:red;'>{$area_null}</span>";
										}
										echo "<span style='color:red;'> NO UPDATE FROM THIS AREA YET! </span>";
									}
								
							?> 
						</span></p>
                        <button id="btn_connect_device" class="btn btn-primary btn-sm">Connect & Download timelogs from the device</button>
                    </div>
                </div>


                <div class="row" style="margin-top:30px;">
                <div class="col-lg-10">


                    <div class="box" id="table_device_info" style="display:none;">
                        <div class="box-header">
                          <h3 class="box-title">Device Status</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding"> 
                                <table  class="table table-condensed" >
                                        <tbody>
                                        <tr>
                                            <td><b>Status</b></td>
                                            <td><label class="label label-xs label-success">Connected</label></td>
                                        </tr>
                                        <tr>
                                            <td><b>Version</b></td>
                                            <td><span id="display_version"></span></td>
                                        </tr>
                                            <td><b>OS Version</b></td>
                                            <td><span id="display_os_version"></span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Platform</b></td>
                                            <td><span id="display_platform"></span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Firmware Version</b></td>
                                            <td><span id="display_firmware"></span></td>.
                                        </tr>
                                        <tr>
                                            <td><b>WorkCode</b></td>
                                            <td><span id="display_workcode"></span></td>
                                       </tr>
                                        <tr>
                                            <td><b>SSR</b></td>
                                            <td><span id="display_ssr"></span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Pin Width</b></td>
                                            <td><span id="display_pin"></span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Face Function On</b></td>
                                            <td><span id="display_face_function"></span></td>
                                         </tr>
                                         <tr>                                           
                                            <td><b>Serial Number</b></td>
                                            <td><span id="display_serial"></span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Device Name</b></td>
                                            <td><span id="display_device"></span></td>
                                        </tr>
                                        <tr>    
                                            <td><b>Get Time</b></td>
                                            <td><span id="display_time"></span></td>
                                        </tr>
                                      </tbody>
                                    </table>

                            </div>
                         </div>

                        </div>
                </div>



              <!-- /.row -->
           </div>
        </div>
        </div>

           <div class="col-md-6" style='display:none;'>
               <div class="box">
                   <div class="box-header with-border">
                      <h3 class="box-title"> Attendance Logs</h3>
                      <div class="box-tools pull-right">
                         <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                   </div>
                   <div class="box-body">

                            <div class="callout callout-info" style="margin-bottom: 0!important;">
                             <span id="display_count_records">No time logs for today......</span>
                           </div>

                             <div class="row" style="margin-top:10px;">
                                <div class="col-lg-12">       
                                    <div id="jqxattendance_logs" style="margin-top:10px;"></div>
                                </div>
                             </div> 
                   </div>
                </div>
             </div>

    </div>
 </section>

</div>  
		<?php
			 // echo $_SERVER['HTTP_HOST'];
		?>
        <script type="text/javascript">

        var BASE_URL = '<?php echo base_url(); ?>';

        var A_LOGS = "";

        $(document).ready(function () {
		// var combovalue = "<?php // echo $area_code; ?>";
	
				$("#jqxcomboarea").on("select",function(event){
                    var args = event.args;
                
					if (args) {
                    // index represents the item's index.                
                        var index = args.index;
                        var item  = args.item;
					//	console.log(item);
                    // get item's label and value.
                        var label      = item.label;
							combovalue = item.value;
					}
					
					// attendance/attrecord
					// var url = "<?php echo $_SERVER['HTTP_HOST']; ?>/attendance/attrecord";
					
					window.location.href = "/attendance/attrecord/"+combovalue;
				})
				
				
               $("#jqxLoader").jqxLoader({ isModal: true, width: 350, height: 60, imagePosition: 'top' });
                getattendancelogs();
               
                $('#btn_connect_device').on('click',function(){
					combovalue = "<?php echo $area_code; ?>";
						if (combovalue == null) { alert("select an area"); exit; }
						
                        info = {};
                       // info['area_id'] = 1; // mark me here
					    info['area_code']   = combovalue;
                        info['last_update'] = '<?php echo $latest_update[0]->checktime; ?>';

                         $.ajax({
                           type: 'POST',
                           url: BASE_URL + 'attendance/syncbiometricdatalog',
                           data: { 'info' : info },
                           dataType : 'json',
                           beforeSend: function(){

                                $('#table_device_info').hide();
                                $('#jqxLoader').jqxLoader('open');
                                $('.jqx-loader-text').html('Connecting to device...Please Wait...');
                           },

                           success: function (data) {
			console.log(data);
                                //    $('#jqxLoader').jqxLoader('close');
								
                                    var result = data;
                                    var attendance_logs = result.data;
                                    var device_info = result.device_info;

                                    $('#display_count_records').html('There are ' + attendance_logs.length + ' attendance log/s...');

                                     A_LOGS = attendance_logs;

                                    var info = {};
									info['data'] = A_LOGS;
								
                                         $.ajax({
                                           type: 'POST',
                                           url: BASE_URL +'attendance/save_sync_data_log/?area_code='+combovalue,
										   data: { info_a : JSON.stringify(info) }, //  object is passed
                                           dataType : 'json',
                                           beforeSend: function(){
					console.log("before send:")	
					console.log(info);
                                                $('.jqx-loader-text').html('Saving time logs...Please Wait...');
                                            
                                           },
                                           success: function (data) {
				console.log("passed");
				console.log(data);
                                            $('#jqxLoader').jqxLoader('close');

                                            $('#display_last_update').html(data);

                                            showmessage('All timelogs are completely downloaded', 'success');   

                                            $('#btn_connect_device').show();


                                            getattendancelogs();

                                            $('#display_version').html(device_info.version);
                                            $('#display_os_version').html(device_info.osversion);
                                            $('#display_platform').html(device_info.platform);
                                            $('#display_firmware').html(device_info.firmware);
                                            $('#display_workcode').html(device_info.workcode);
                                            $('#display_ssr').html(device_info.ssr);
                                            $('#display_pin').html(device_info.pinWidth);
                                            $('#display_face_function').html(device_info.faceFunctionOn);
                                            $('#display_serial').html(device_info.serialNumber);
                                            $('#display_device').html(device_info.deviceName);
                                            $('#display_time').html(device_info.getTime);

                                            $('#table_device_info').show();
                                            $('#btn_connect_device').hide();

                                            },
											error: function(a,b,c) {
												alert(a+b+c);
											}
                                
                                        });
								
                            }, error : function(a,b,c) {
								console.log(a+b+c);
								alert(a+b+c);
							}
                
                        });

               });



               /*AREA  LIST */

            var area = <?php echo json_encode($areas);?>;
			
            var UPLOADEDCSV = ""; 

            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'area_code' },
                    { name: 'area_name' }
                ],
                localdata: area
            };
			
			// set the default value of combobox
			combovalue = area[0].area_code;
			
            var dataAdapter = new $.jqx.dataAdapter(source);
            // Create a jqxComboBox
            $("#jqxcomboarea").jqxComboBox({ searchMode: 'containsignorecase' , 
											 selectedIndex: 0, 
											 source: dataAdapter, 
											 displayMember: "area_name", 
											 valueMember: "area_code", 
											 width: 200});

        });


        function loadupdatelogs(data){

            var source =
            {
                localdata: data,
                datatype: "array"
            };
            var dataAdapter = new $.jqx.dataAdapter(source, {
                loadComplete: function (data) { },
                loadError: function (xhr, status, error) { }      
            });

            $("#jqxattendance_logs").jqxGrid(
            {
                source: dataAdapter,
                autoheight:true,
                groupable: true,
                sortable: true,
                filterable: true,
                showfilterrow: true,
                altrows: true,
                pageable: true,
                width:760,
                columns: [
                  { text: 'FULLNAME', datafield: 'fullname'  ,width: 300},
                  { text: 'CHECKTIME', datafield: 'checktime' ,width: 260 ,  align: 'center' , cellsalign: 'center'},
                  { text: 'STATUS', datafield: 'status'  ,width: 200 ,  align: 'center' , cellsalign: 'center'}
                ]
            });  

        }


        function getattendancelogs(){
            info = {};
            var res = postdata(BASE_URL + 'attendance/get_attendance_logs',info);

            if(res.length <= 0){
                  $('#display_count_records').html('No time logs for today......');  
            }else{
                 $('#display_count_records').html('There are '+ res.length + ' timelogs today.'); 
                 loadupdatelogs(res);
            }
        }



        </script>