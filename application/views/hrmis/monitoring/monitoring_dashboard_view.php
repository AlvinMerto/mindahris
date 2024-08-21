   <div class="content-wrapper">

           <section class="content-header">
            <h1>
                Guard Monitoring  PS / AMS
            </h1>
            <ol class="breadcrumb">
               <li class="active"><img style="margin-top:-14px;" src="<?php echo base_url();?>assets/images/minda/rsz_1minda_logo_text.png" /></li>
            </ol>
         </section>

         <section class="content">
           <div class="row">
             <div class="col-md-12">
               <div class="box">
                   <div class="box-header with-border">
                      <!--h3 class="box-title"> Monitoring AMS </h3-->
                      <div class="box-tools pull-right">
                         <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                      <div class="row">
                         <div class="col-md-12">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#ps" data-toggle="tab" aria-expanded="true">PASS SLIP</a>
                                </li>
                                <li class=""><a href="#ams" data-toggle="tab" aria-expanded="false">AMS</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">


                            <!--  PS TAB -->
                                <div class="tab-pane fade active in" id="ps">
	
									<!--p style='text-align: center; padding: 75px;'> pass slip waiting area </p-->
                                    <div style="padding:20px 0px;"> 
                                        <!--button id="btn_refresh_ps" style="margin-bottom:10px;" class="btn btn-sm btn-success">REFRESH</button-->
                                        <div id="jqwxpsapprovedlist"></div>
										<div style='clear:both;'></div>
										<div class='approvedps_tbl'>
											<p class='htext'> 
												<input type='text' placeholder='Search...' id='textsearch'/> 
												<button class='btn btn-default btnsearchps'> Search </button> 
											</p>
											<table id='tblps'>
												<thead>
													<th> # </th>
													<th> Full Name </th>
													<th> Reason </th>
													<th> Date added </th>
													<th> Time-Out </th>
													<th> Time-In </th>
													<th> Remarks</th>
												</thead>
												<tbody id='tblps_tbody'>
													
												</tbody>
											</table>
										</div>
                                    </div>
                                </div>

                            <!--  AMS TAB -->
                                <div class="tab-pane fade " id="ams">



                                     <div style="padding:20px;">

                                      <button id="btn_generate_ams" style="float:right;" class="btn btn-sm btn-primary">GENERATE AMS</button>
                                      <button id="btn_refresh_ams" style="float:right; margin-right:10px;" class="btn btn-sm btn-success">REFRESH</button>
                                      <button id="btn_refresh_clear_selection" style="float:right; margin-right:10px;" class="btn btn-sm btn-warning">CLEAR SELECTION</button>
                                      

                                         <h4>Attendance Monitoring Sheet</h4>

                                        <div id="jqxemployeelist"></div>

                                        <hr>

                                        <div id="jqx_ams_plantilla">test</div>

    
                                     </div>

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
         </section>

      </div>  
	 
	  
	<div class="modal fade" id="modal_ps_window" tabindex="-1" role="dialog" aria-labelledby="label_exceptions" aria-hidden="true" style="display: none;">
		<div class="modal-lg modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4> Updating Pass slip </h4>
				</div>
				<div class="modal-body">
					<table class='modaltbl'>
						<thead>
							<th> Out </th>
							<th> In </th>
							<th> Remarks </th>
						</thead>
						<tbody>
							<tr>
								<td> <input type='text' class='pstimetext' id='outpstime'/> </td>
								<td> <input type='text' class='pstimetext' id='inpstime'/> </td>
								<td> <input type='text' class='' placeholder='*Optional'/> </td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button class='btn btn-primary' id='updatepsdata'> Update </button>
					<button class='btn btn-default'> Cancel </button>
				</div>
			</div>
		</div>
	</div>



<script type="text/javascript">

    var BASE_URL = '<?php echo base_url(); ?>';
    var SES_GUARD_EMPLOYEE_ID = '<?php echo $guard_employee_id; ?>';
    var SES_GUARD_AREA_ID = '<?php echo $guard_area_id; ?>';

        $(document).ready(function () {

            var source = {};

                    
            getpsaapproved();
            getemployeeams();

            getplantillatree();



             $('#btn_refresh_ps').on('click',function(){
                getpsaapproved();
             });


             $('#btn_refresh_ams').on('click',function(){
                 getemployeeams();
                 
             });



        

        });


        function getplantillatree(){

              var serverDate = '<?php echo date("m/d/Y", time()) ?>';
              var dateDiff = new Date - serverDate;

              //console.log(dateDiff);

              var source =
               {
                   dataType: "json",
                   dataFields: [
                      { name: 'parentid', type: 'number' },
                      { name: 'id', type: 'number' },
                      { name: 'name', type: 'string' },
                      { name: 'a_in', type: 'date' },
                      { name: 'a_out', type: 'date' },
                      { name: 'p_in', type: 'date' },
                      { name: 'p_out', type: 'date' },
                      { name: 'remarks', type: 'string' }
                   ],
                   hierarchy:
                       {
                      keyDataField: { name: 'id' },
                      parentDataField: { name: 'parentid' }
                       },
                    url: BASE_URL + 'reports/getsubpap_divisions_tree_employees_ams/',
                    data: {
                    date_covered:  serverDate
                  }

               };



            var dataAdapter_1 = new $.jqx.dataAdapter(source);


              $("#jqx_ams_plantilla").jqxTreeGrid(
              {
                  source: dataAdapter_1,
                  altRows: true,
                  editable: false,
                  exportSettings: {fileName: null},
                  ready: function () {
                      $("#treeGrid").jqxTreeGrid('expandAll');
                  },
                  columns: [
                   
                    { text: "No", align: "center", dataField: "id", width: 80 ,editable: false},
                    { text: "Employee's Name", align: "center", dataField: "name", width: 450 ,editable: false},
                    { text: "IN", columnGroup: "AM", cellsAlign: "center", align: "center", dataField: "a_in", width: 100 ,editable: false ,  cellsFormat: 'hh:mm' ,formatString: 'hh:mm tt'},    
                    { text: 'OUT', columnGroup: "AM", dataField: "a_out", cellsAlign: "center", align: "center", width: 100 ,editable: false ,  cellsFormat: 'hh:mm' ,formatString: 'hh:mm tt'},
                    { text: "IN", columnGroup: "PM", dataField: "p_in" , cellsAlign: "center", align: "center", width: 100 ,editable: false,  cellsFormat: 'hh:mm' ,formatString: 'hh:mm tt'},
                    { text: "OUT", columnGroup: "PM", dataField: "p_out" , cellsAlign: "center", align: "center", width: 100 ,editable: false,  cellsFormat: 'hh:mm' ,formatString: 'hh:mm tt'},
                    { text: "IN", columnGroup: "OT", dataField: "o_in" , cellsAlign: "center", align: "center", width: 100 ,editable: false,  cellsFormat: 'hh:mm' ,formatString: 'hh:mm tt'},
                    { text: "OUT", columnGroup: "OT", dataField: "o_out" , cellsAlign: "center", align: "center", width: 100 ,editable: false,  cellsFormat: 'hh:mm' ,formatString: 'hh:mm tt'},
                    { text: "REMARKS", dataField: "remarks" , cellsAlign: "center", align: "center", width: 150 ,editable: false}
                  ],
                  columnGroups:
                  [
                    { text: "A.M.", name: "AM", align: "center" },
                    { text: "P.M.", name: "PM", align: "center" },
                    { text: "OVERTIME", name: "OT", align: "center" }
                  ]
              });  


               $('#jqx_ams_plantilla').on('bindingComplete', function (event) { 
                  $("#jqx_ams_plantilla").jqxTreeGrid('expandAll');
               }); 
        }

        function getemployeeams(){

                  info = {};
                  info['area_id'] = SES_GUARD_AREA_ID;
                 var result = postdata(BASE_URL + 'monitoring/getemployeeams', info);

                  var source =
                {
                    localdata: result,
                    datatype: "json",
                  updaterow: function (rowid, rowdata, commit) {
                    // synchronize with the server - send update command
                    // call commit with parameter true if the synchronization with the server is successful 
                    // and with parameter false if the synchronization failder.
                    commit(true);
                },
                    datafields: [
                        { name: 'c_ams_id' , 'type' : 'number'},
                        { name: 'employee_id' },
                        { name: 'f_name' , 'type' : 'string'},
                        { name: 'a_in' , 'type':'date'},
                        { name: 'a_out' , 'type':'date'},
                        { name: 'p_in' , 'type':'date'},
                        { name: 'p_out' , 'type':'date'},
                        { name: 'remarks' }
                    ]
                
                };
                var dataAdapter = new $.jqx.dataAdapter(source, {
                    loadComplete: function (data) { },
                    loadError: function (xhr, status, error) { }      
                });


                $("#jqxemployeelist").jqxGrid(
                {
                    width: '100%' ,
                    source: dataAdapter, 
                    showfilterrow: true,
                    filterable: true,
                    height: 600,
                    editable: true ,
                    selectionmode: 'singlecell',                
                    columns: [
                        { text: 'ams_id', datafield: 'c_ams_id', width: 50 ,editable: false  },
                        { text: 'ID', datafield: 'employee_id', width: 50 ,editable: false  },
                        { text: 'FULLNAME', datafield: 'f_name', filtertype: 'textbox' ,  width: 300 ,editable: false },
                        { text: 'IN', datafield: 'a_in', minwidth: 110 , align: 'center' , cellsalign: 'center'  ,columntype: 'datetimeinput' , cellsformat: 'hh:mm' ,formatString: 'hh:mm tt',
                             
                           createeditor: function (row, cellvalue, editor) {
                              editor.jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
                          }
                       },
                        { text: 'OUT', datafield: 'a_out', minwidth: 110 ,align: 'center' , cellsalign: 'center' , columntype: 'datetimeinput' , cellsformat: 'hh:mm',
                            createeditor: function (row, cellvalue, editor) {
                              editor.jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
                          }
                     },
                        { text: 'IN', datafield: 'p_in', minwidth: 110 , align: 'center' , cellsalign: 'center' , columntype: 'datetimeinput' , cellsformat: 'hh:mm' ,
                            createeditor: function (row, cellvalue, editor) {
                              editor.jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
                          }
                    },
                        { text: 'OUT', datafield: 'p_out', minwidth: 110 , align: 'center' , cellsalign: 'center' ,  columntype: 'datetimeinput' , cellsformat: 'hh:mm',
                            createeditor: function (row, cellvalue, editor) {
                              editor.jqxDateTimeInput({ width: 'auto', height: '25px', formatString: 'hh:mm tt', showTimeButton: true, showCalendarButton: false});
                          }                         
                    },
                        { text: 'REMARKS', datafield: 'remarks', minwidth: 110 , align: 'center' , cellsalign: 'center'},

                    ]

                });





            $("#btn_generate_ams").on('click',function(){

            });



            $('#btn_refresh_clear_selection').on('click',function(){

                    var cell = $('#jqxemployeelist').jqxGrid('getselectedcell');
                     if (cell) {

                        var data = $('#jqxemployeelist').jqxGrid('getrowdata', cell.rowindex );

                            info = {};
                            info['c_ams_id'] = data.c_ams_id;
                            info['employee_id'] = data.employee_id;
                            info['column'] = cell.datafield;
                            info['value'] = '';



                            if(data.c_ams_id == ''){
                              showmessage('No records to clear', 'danger');
                              return false
                            }

                            if(cell.datafield == 'a_in' || cell.datafield == 'a_out' || cell.datafield == 'p_in' || cell.datafield == 'p_out' || cell.datafield == 'remarks'){

                                var updateamstime = postdata(BASE_URL + 'monitoring/updatetimeams' ,info);

                                if(updateamstime){
                                     $("#jqxemployeelist").jqxGrid('setcellvalue', cell.rowindex, cell.datafield , "");
                                     showmessage('Update succcessfuly added.', 'success');
                                }else{
                                    showmessage('Something wrong.Please try again.', 'danger');
                                }     
                                                    
                            }else{
                                showmessage('Cannot clear selected cell.', 'warning');
                            }



                             
                     }
            });




            $("#jqxemployeelist").on('cellendedit', function (event) {
                var args = event.args;
           
                if(args.value){
                    
                    var row = args.row;

                    var employee_id = row.employee_id;
                    var ams_id = row.c_ams_id;


                    var column = args.datafield;
                    var value = args.value;

                    info = {};
                    info['c_ams_id'] = ams_id;
                    info['employee_id'] = employee_id;
                    info['column'] = column;


                    if(column == 'remarks'){
                         info['value'] = value;
                    }else{

                        var dt = new Date(value);
                        var dtstring = dt.getFullYear()
                            + '-' + pad(dt.getMonth()+1)
                            + '-' + pad(dt.getDate())
                            + ' ' + pad(dt.getHours())
                            + ':' + pad(dt.getMinutes())
                            + ':' + pad(dt.getSeconds());

                        info['value'] = dtstring;
                    
                    }

                    var updateamstime = postdata(BASE_URL + 'monitoring/updatetimeams' ,info);

                    if(updateamstime){
                        $("#jqxemployeelist").jqxGrid('setcellvalue', row, "c_ams_id",updateamstime);
                         showmessage('Update succcessfuly added.', 'success');
                    }else{
                        showmessage('Something wrong.Please try again.', 'danger');
                    }

                  
                }
            });


        }


        function pad(number, length) {
           
            var str = '' + number;
            while (str.length < length) {
                str = '0' + str;
            }
           
            return str;

        }

        function getpsaapproved(){
/*
            info = {};
            var result = postdata(BASE_URL + 'monitoring/getapprovedps', info);
            if(result){

                var source =
                {
                    localdata: result,
                    datatype: "json"
                };

                var dataAdapter = new $.jqx.dataAdapter(source, {
                    loadComplete: function (data) { },
                    loadError: function (xhr, status, error) { }      
                });

               var cellsrenderer = function (row, columnfield, value, defaulthtml, columnproperties) {
                    editrow = row;
                    var dataRecord = $("#jqwxpsapprovedlist").jqxGrid('getrowdata', editrow);
                    exact_id = dataRecord.exact_id;
                    time_out = dataRecord.time_out;
                    time_in = dataRecord.time_in;

                    if(time_out == false  && time_in == false){
                        time_out = "OUT";
                        out_class="btn-danger";
                        out_disabled="";

                        time_in = "IN";
                        in_class="btn-danger"
                        in_disabled="disabled='true'";

                    }else if(time_out != false && time_in == false){

                        out_class="btn-success";
                        out_disabled="disabled='true'";

                        time_in = "IN";
                        in_class="btn-danger"
                        in_disabled="";

                    }else{

                        out_class="btn-success";
                        out_disabled="disabled='true'";

                        in_class="btn-success";
                        in_disabled="disabled='true'";
                    }

                    if(time_in == false){
                        time_in = "IN";
                        in_class="btn-danger"
                        in_disabled="";
                    }else{
                        in_class="btn-success";
                        in_disabled="disabled='true'";
                    }



           
                    var  btn_out = '<button style="width:80px;" class="btn btn-xs '+out_class+'" '+out_disabled+' onclick=updateguardps("'+exact_id+'","out")>'+time_out+'</button>';
                    var  btn_in = '<button style="width:80px;" class="btn btn-xs '+in_class+'" '+in_disabled+' onclick=updateguardps("'+exact_id+'","in")>'+time_in+'</button>';

                    return '<div style="margin:2px;width:200px; text-align:center;">' + btn_out + ' ' + btn_in +'</div>';

                };



                $("#jqwxpsapprovedlist").jqxGrid(
                {
                     source: dataAdapter,
                     width: '100%' ,
                     groupable: true,
                     sortable: true,
                     filterable: true,
                     altrows: true,
                     columns: [
                      { text: 'ID' , datafield: 'exact_id' ,width: 10 ,  align: 'left' , cellsalign: 'left'},
                      { text: 'TYPE', datafield: 'new_type_mode' , width: 150 ,  align: 'left' , cellsalign: 'left' } ,
                      { text: 'FULLNAME', datafield: 'fullname' , width: 250 ,  align: 'left' , cellsalign: 'left' } ,
                      { text: 'DATE FILLED', datafield: 'date_added' , width: 250 ,  align: 'left' , cellsalign: 'center' , align: 'center'} , 
                      { text: 'REASON', datafield: 'reasons' , width: 300 ,  align: 'left' , cellsalign: 'center' , align: 'center'} , 
                      { text: 'ACTION', datafield: 'time_out', align: 'center' , cellsalign: 'center', width: 200 , cellsrenderer: cellsrenderer },
                    ]
                });



            }
*/
        }


    function updateguardps(exact_id , type){

            info = {};
            info['exact_id'] = exact_id;
            info['type'] = type;
            info['ps_guard_id'] = SES_GUARD_EMPLOYEE_ID;

            var update = postdata(BASE_URL + 'monitoring/updatetimeps' , info);

            if(update){
                 getpsaapproved();
            }

    }


</script>
