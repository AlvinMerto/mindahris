

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Shift Management</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>


            <div class="row">
            <div class="col-lg-12">
	              <div class="panel panel-info">
	                    <div class="panel-heading">
	                        Shift Setup
	                    </div>
	                     <div class="panel-body">
           <div class="row">
			    <div class="col-md-3">
			      <div id='content' style="padding-bottom: 15px;">
			             <label class="label label-default">SELECT SHIFTS:</label>
			             <div style="margin-top:10px; margin-bottom:10px;" id='jqxshifts'></div>
			      </div>
			    </div>




			    <div class="col-md-3">
			      <br>
			      <input type="button" class="btn btn-primary btn-sm" value="Add" id="jqx_add_shift"/>
			      <input type="button" class="btn btn-primary btn-sm" value="Edit" id="jqx_edit_shift"/>
			    </div>
			  </div>

			  
			  <p style="color:red; display:none;" id="label_msg_shift">You cannot update this shift , because there is already assigned users..  </p>

			  <div class="row">

			    <div class="col-md-6">
			      <div style='padding-top: 10px; font-size: 13px; font-family: Verdana;' id='selection'></div>
			      <br>
			    </div>

			  </div>


             <div id="add_shift_form" style="padding-bottom: 20px;  padding-top: 20px; border-top:solid 1px #ddd;display: none;">
           	 	<div class="row">

           	 			 <div class="col-md-12">
			             	
 											<div class="form-group">
										     	<p id="label_shift" for="label_shift" style="padding:0px;" class="col-md-1 control-label"><b>ADD NEW SHIFT</b></p>
										      <div class="col-md-4">
										      </div>
										    </div>

			             </div>

			             <div class="col-md-10">
			             	
 											<div class="form-group">
										      <p for="personnel_id" class="col-md-1 control-label">Shift Name:</p>
										      <div class="col-md-4">
										          <input type="hidden" class="form-control" id="textbox_shift_id">
										          <input type="text" class="form-control" id="text_box_shift_name">
										      </div>
										    </div>

			             </div>
             	</div>
             </div>



			  <div class="row">
			    <div class="col-md-12">
			        <div id="jqx_grid_shift_table"></div>
			    </div>
			  </div>


			 <div id="btn_shift_form" style="padding-bottom: 20px;  padding-top: 20px; border-top:solid 1px #ddd;display:none;">


           	 	<div class="row">


			             <div class="col-md-8">
			             	
 											<div class="form-group">
										     	<button class="btn btn-sm btn-success col-md-1 control-label" id="btn_shift_update">Save</button>
										      <div class="col-md-4">
												<button class="btn btn-sm btn-danger col-md-3 control-label" id="btn_shift_cancel">Cancel</button>
										      </div>
										    </div>

			             </div>
             	</div>
             </div>

	                     </div>
	              </div>
	          </div> 	
            </div>	



  
         </div>


<script type="text/javascript">

    var BASE_URL = '<?php echo base_url(); ?>';

        $(document).ready(function () {

        /* PREPARE DATA */
        var shifts = <?php echo json_encode($shifts); ?>;



	      var shift_source =
	      {
	          datatype: "json",
	          datafields: [
	              { name: 'shift_id' },
	              { name: 'shift_name' }
	          ],
	          localdata: shifts,

	      };

	      var shiftdataAdapter = new $.jqx.dataAdapter(shift_source);

       	$('#jqxshifts').jqxDropDownList({source: shiftdataAdapter, selectedIndex: 0, displayMember: "shift_name", valueMember: "shift_id" , width: '100%', height: '25'});


   	    var info = {};
        info['shift_id'] = $('#jqxshifts').val();
   		tableshiftslogs(BASE_URL ,info);

        $('#jqxshifts').on('select', function (event) {

             var args = event.args;
             if (args) {
                 // index represents the item's index.                          
                 var index = args.index;
                 var item = args.item;
                 // get item's label and value.
                 var label = item.label;
                 var value = item.value;

                 var info = {};
                 info['shift_id'] = value;

                $('#textbox_shift_id').val(value);
                $('#text_box_shift_name').val(label);
                tableshiftslogs(BASE_URL ,info);

               }


          });



        $('#jqx_add_shift').on('click',function(){
        		$('#add_shift_form').show();
        		$('#btn_shift_form').show();
        		$('#textbox_shift_id').val('');
        		$('#text_box_shift_name').val('');
        		$('#label_shift').html('<b>ADD NEW SHIFT</b>');
        		

        });


        $('#btn_shift_cancel').on('click',function(){
        	    $('#add_shift_form').hide();
        		$('#btn_shift_form').hide();
        });


        $('#jqx_edit_shift').on('click',function(){
        	   	$('#add_shift_form').show();
        		$('#btn_shift_form').show();
        		$('#textbox_shift_id').val($('#jqxshifts').val());
        		$('#text_box_shift_name').val($('#jqxshifts').text());
        		$('#label_shift').html('<b>EDIT SHIFT</b>');
        });


        $('#btn_shift_update').on('click',function(){

        	info = {};
        	info['shift_id'] = $('#textbox_shift_id').val();
        	info['shift_name'] = $('#text_box_shift_name').val();


			shift_logs = [];


        	var rows = $('#jqx_grid_shift_table').jqxGrid('getrows');
	        for (var i = 0; i < rows.length; i++) {

	         		shift_logs.push({'shift_mgt_logs_id': rows[i].shift_mgt_logs_id , 'shift_type' : rows[i].shift_type , 'type' : rows[i].type ,   'time_start' : rows[i].time_start , 'time_exact' : rows[i].time_exact , 'time_flexi_exact' : rows[i].time_flexi_exact , 'time_end' : rows[i].time_end , 'index_shift' : rows[i].index_shift });

	         }


	      	info['shift_logs'] = shift_logs;

	      	var update = postdata(BASE_URL + 'attendance/updateshifts' , info);

	      	if(update){


	      		if(update == '-1'){

	      				$('#label_msg_shift').show();
	      				$('#label_msg_shift').fadeOut(9000);


	      		}else{

	      			info = {};
  			        info['shift_id'] = update;
					tableshiftslogs(BASE_URL ,info);

					if($('#textbox_shift_id').val() == ''){
						$("#jqxshifts").jqxDropDownList('addItem', { label: $('#text_box_shift_name').val() , value : update }); 
						$("#jqxshifts").val(update);
					}else{
						$("#jqxshifts").jqxDropDownList('updateItem', { label: $('#text_box_shift_name').val() , value: update }, update);
					}
					$('#textbox_shift_id').val(update);	
	      		}

				
				$('#add_shift_form').hide();
        		$('#btn_shift_form').hide();

	      	}

        });





        }); /*end document ready*/



        /*FUNCTIONS ===============================================================================================================================*/




        function tableshiftslogs(BASE_URL ,info){


            var resultshiftlogs = postdata(BASE_URL + 'attendance/getshiftslogs' , info);


	        var source =
	            {
	                localdata: resultshiftlogs,
	                datatype: "json"
	            };
	            var dataAdapter = new $.jqx.dataAdapter(source, {
	                loadComplete: function (data) { },
	                loadError: function (xhr, status, error) { }      
	            });
	            $("#jqx_grid_shift_table").jqxGrid(
	            {
	                source: dataAdapter,
	                autoheight:true,
	                editable: true,
	               width:1370,
	                columns: [
	                  { text: 'ID' , datafield: 'shift_mgt_logs_id'  ,width: 39 , editable: false},
	                  { text: 'SHIFT_TYPE', datafield: 'shift_type' ,width: 210 ,   align: 'center' , cellsalign: 'center', editable: false},
	                  { text: 'TYPE', datafield: 'type'   ,width: 200 ,   align: 'center' , cellsalign: 'center', editable: false},
	                  { text: 'TIME START', datafield: 'time_start' ,width: 250 ,  align: 'center' , cellsalign: 'center', editable: true},
	                  { text: 'TIME EXACT', datafield: 'time_exact'  ,width: 250 ,  align: 'center' , cellsalign: 'center',editable: true},
	                  { text: 'TIME FLEXI EXACT', datafield: 'time_flexi_exact' ,width: 220 ,  align: 'center' , cellsalign: 'center', editable: true},
	                  { text: 'TIME END', datafield: 'time_end' ,width: 200 ,  align: 'center' , cellsalign: 'center', editable: true},
	                  { text: 'index', datafield: 'index_shift' ,width: 200 ,  align: 'center' , cellsalign: 'center', editable: false}
	                
	                 
	                ]
	            }); 


	            $('#jqx_grid_shift_table').jqxGrid('hidecolumn', 'index_shift');
        }


        function generatedtrsummary(info){

              var result = postdata(BASE_URL + 'reports/getdtrsummaryreports',info); 

              if(result){
                return result;
              }

        }

      



    </script>