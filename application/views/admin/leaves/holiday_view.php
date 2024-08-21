
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Holidays </h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>


	        <div class="row">
	          <div class="col-md-6">
	              <div id="jqx_holiday_list"></div>
	          </div>


			    	<div class="col-md-6">


 										
 										<p><b>ADD/EDIT HOLIDAY</b></p>

 										<div class="row">

 											<div class="form-group">

										      <p for="personnel_id" class="col-md-2 control-label">Holiday Name:</p>
										      <div class="col-md-6">
										          <input type="hidden" class="form-control" id="text_box_holiday_id">
										          <input type="text" class="form-control" id="text_box_holiday_name"> 
										      </div>


										    </div>
 										</div>

 										<br>
 										<div class="row">
 											<div class="form-group">

										      <p for="personnel_id" class="col-md-2 control-label">Holiday Date:</p>
										      <div class="col-md-6">
										      	<div id="jqx_holiday_date"></div>
										      </div>


										    </div>
 										</div>

 										<br>

 										<div class="row">

 											<div class="form-group">

	 											<p class="col-md-2 control-label"></p>
	 											<div class="col-md-6">
	 												<button id="btn_save_holiday" class="btn btn-sm btn-success">Save</button>
	 												<button id="btn_cancel_holiday" class="btn btn-sm btn-danger">Cancel</button>
	 											</div>

 											</div>

 										</div>




			    	</div>



	        </div>


<script type="text/javascript">

    var BASE_URL = '<?php echo base_url(); ?>';

        $(document).ready(function () {


		var positions = <?php echo json_encode($get_holidays);?>; 

        		var source =
	            {
	                localdata: positions,
	                datatype: "json",
	            };

	            var dataAdapter = new $.jqx.dataAdapter(source, {
	                loadComplete: function (data) { },
	                loadError: function (xhr, status, error) { }      
	            });


	            $("#jqx_holiday_list").jqxGrid(
	            {
	                 source: dataAdapter,
	                 width: '700' ,
	                 groupable: true,
	                 sortable: true,
              		 filterable: true,
               		 altrows: true,
	                 columns: [
	                  { text: 'Holiday ID' , datafield: 'holiday_id' ,width: 100 ,  align: 'left' , cellsalign: 'left'},
                      { text: 'Holiday Name', datafield: 'holiday_name' , width: 350 ,  align: 'left' , cellsalign: 'left' } ,
                      { text: 'Date', datafield: 'holiday_date' , width: 250 ,  align: 'left' , cellsalign: 'left' } ,
	                ]
	            });



	             $("#jqx_holiday_date").jqxDateTimeInput({ width: 250, height: 25,  selectionMode: 'range' , template: 'primary' ,  formatString: "M/d/yyyy"});



				$('#jqx_holiday_list').on('rowclick', function (event) 
				{
			
					var row = $("#jqx_holiday_list").jqxGrid('getrowdata',args.rowindex);
				   	 $('#text_box_holiday_id').val(row.holiday_id);
				   	 $('#text_box_holiday_name').val(row.holiday_name);

		             var date = new Date();
		             var firstDay = new Date(row.holiday_date);
		             var lastDay = new Date(row.holiday_date);


		              $("#jqx_holiday_date").jqxDateTimeInput('setRange', firstDay, lastDay);


				   	 

				}); 



	             $('#btn_save_holiday').on('click',function(){

	             		info = {};
	             		info['holiday_id'] = $('#text_box_holiday_id').val();
	             		info['holiday_name'] = $('#text_box_holiday_name').val();
	             	
     	                var selection = $("#jqx_holiday_date").jqxDateTimeInput('getRange');


		                var from_date = selection.from.getMonth() + 1 + '/'+ selection.from.getDate() + '/' + selection.from.getFullYear();
		                var to_date = selection.to.getMonth() + 1 + '/'+ selection.to.getDate() + '/' + selection.to.getFullYear();


		               if(from_date == to_date){

		               	info['holiday_date'] = to_date;

		               }else{

						info['holiday_date'] = to_date;

		               }

		               var update = postdata(BASE_URL + 'leaveadministration/updateholiday' , info);

		               if(update){
		               		showmessage('Holiday Added/Updated', 'success');
		               }
 

	             });




	             $('#btn_cancel_holiday').on('click',function(){

						$('#text_box_holiday_id').val('');
	             		$('#text_box_holiday_name').val('');
	             });






       	});

</script>