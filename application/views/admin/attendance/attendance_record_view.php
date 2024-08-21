

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Attendance Record</h3>
                </div>
            </div>
            

            <div id="jqxLoader"></div>




        <div class="row">


           <div class="col-lg-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    Download  Timelogs
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="label label-default">SELECT AREA</label>
                            <div style="margin-top:10px; margin-bottom:10px;" id='jqxcomboarea'></div>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                         <div class="col-lg-12">
                            <p style="font-style: italic;">Last update: <span id="display_last_update"><?php echo $latest_update[0]->last_update; ?> </span></p>
                            <button id="btn_connect_device" class="btn btn-primary btn-sm">Connect to device</button>
                        </div>
                    </div>

                    <div class="row" style="margin-top:10px;">
                            <div class="col-lg-10">
                                   <table style="display:none;" id="table_device_info" border="1" cellpadding="5" cellspacing="2">
                                    <tr>
                                        <td><b>Status</b></td>
                                        <td><label class="label label-xs label-success">Connected</label></td>
                                        <td><b>Version</b></td>
                                        <td><span id="display_version"></span></td>
                                        <td><b>OS Version</b></td>
                                        <td><span id="display_os_version"></span></td>
                                        <td><b>Platform</b></td>
                                        <td><span id="display_platform"></span</td>
                                    </tr>
                                    <tr>
                                        <td><b>Firmware Version</b></td>
                                        <td><span id="display_firmware"></span</td>
                                        <td><b>WorkCode</b></td>
                                        <td><span id="display_workcode"></span</td>
                                        <td><b>SSR</b></td>
                                        <td><span id="display_ssr"></span</td>
                                        <td><b>Pin Width</b></td>
                                        <td><span id="display_pin"></span</td>
                                    </tr>
                                    <tr>
                                        <td><b>Face Function On</b></td>
                                        <td><span id="display_face_function"></span</td>
                                        <td><b>Serial Number</b></td>
                                        <td><span id="display_serial"></span</td>
                                        <td><b>Device Name</b></td>
                                        <td><span id="display_device"></span</td>
                                        <td><b>Get Time</b></td>
                                        <td><span id="display_time"></span</td>
                                    </tr>
                                </table>
                            </div>
                    </div>



                     <div class="row" style="margin-top:10px;">
                        <div class="col-lg-12">
                            <p style="color:green;font-style: italic;" id="display_count_records"></p>
                            <button style="display:none;" id="btn_download_logs" class="btn btn-primary btn-sm">Download All</button>  

                            <div id="jqxattendance_logs" style="margin-top:10px;"></div>
                        </div>
                     </div> 
    
                </div>
            </div>

        </div>



          <div class="col-lg-12">
              <div class="panel panel-info">
                    <div class="panel-heading">
                        Attendance Monitoring
                    </div>
                     <div class="panel-body">

                     </div>
              </div>
          </div>


        </div>




         </div>
 
        <script type="text/javascript">

        var BASE_URL = '<?php echo base_url(); ?>';

        var A_LOGS = "";

        $(document).ready(function () {


                $("#jqxLoader").jqxLoader({ isModal: true, width: 350, height: 60, imagePosition: 'top' });


                $('#btn_connect_device').on('click',function(){
						
                        info = {};
                        info['area_id'] = 1; 
                        info['last_update'] = '<?php echo $latest_update[0]->checktime; ?>';

                         $.ajax({
                           type: 'POST',
                           url: BASE_URL + 'attendance/syncbiometricdatalog',
                           data: { 'info' : info },
                           dataType : 'json',
                           beforeSend: function(){
								
                                $('#btn_download_logs').hide();
                                $('#table_device_info').hide();
                                $('#jqxLoader').jqxLoader('open');
                                $('.jqx-loader-text').html('Connecting to device...Please Wait...');
								
                           },
                           success: function (data) {
									alert(data);
	
                                    $('#jqxLoader').jqxLoader('close');


                                    var result = data;
                                    var attendance_logs = result.data;
                                    var device_info = result.device_info;

                                    $('#display_count_records').html('There are ' + attendance_logs.length + ' attendance log/s...');
                                     A_LOGS = attendance_logs;
                                    loadupdatelogs(attendance_logs);


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



                                    $('#btn_download_logs').show();
                                    $('#table_device_info').show();
                                    $('#btn_connect_device').hide();
                            }
                

                        });

               });




                $('#btn_download_logs').on('click',function (){ 

                    var info = {};
                    info['data'] = A_LOGS;

                         $.ajax({
                           type: 'POST',
                           url: BASE_URL + 'attendance/save_sync_data_log',
                           data: { 'info' : info },
                           dataType : 'json',
                           beforeSend: function(){

                                $('#jqxLoader').jqxLoader('open');
                                $('.jqx-loader-text').html('Saving time logs...Please Wait...');
                            
                           },
                           success: function (data) {

                            $('#jqxLoader').jqxLoader('close');

                            $('#display_last_update').html(data);

                            showmessage('All timelogs are completely downloaded', 'success');   

                            $('#display_count_records').hide();
                            $('#btn_download_logs').hide();
                            $('#table_device_info').hide();
                            $('#btn_connect_device').show();
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
                    { name: 'area_id' },
                    { name: 'area_name' }
                ],
                localdata: area,
            };

            var dataAdapter = new $.jqx.dataAdapter(source);
            // Create a jqxComboBox
            $("#jqxcomboarea").jqxComboBox({ searchMode: 'containsignorecase' , selectedIndex: 0, source: dataAdapter, displayMember: "area_name", valueMember: "area_id", width: 200});

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
                altrows: true,
                width:620,
                columns: [
                  { text: 'FULLNAME', datafield: 'fullname'  ,width: 250},
                  { text: 'CHECKTIME', datafield: 'checktime' ,width: 250 ,  align: 'center' , cellsalign: 'center'},
                  { text: 'STATUS', datafield: 'status'  ,width: 120 ,  align: 'center' , cellsalign: 'center'}
                ]
            });  



        }



        </script>