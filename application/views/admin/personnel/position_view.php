
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Position</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>



    <div class="row">
        <div class="col-lg-6">
			<div class="panel panel-info">
			    <div class="panel-heading">
			        Position Lists
			    </div>
			    <div class="panel-body">
			    <div class="row">

			    	<div class="col-md-12">
	                    <div class="form-group">
	                    		<div id="jqxgrid_positions"></div>
	                    </div>
			    	</div>

  				 </div>

    
			    </div>

			</div>
        </div>



        <div class="col-lg-4">
			<div class="panel panel-warning">
			    <div class="panel-heading">
			        Position Lists
			    </div>
			    <div class="panel-body">

			    <div class="row">


			    	<div class="col-md-12">
 										
 										<p><b>ADD/EDIT POSITION</b></p>

 											<div class="form-group">
										      <p for="personnel_id" class="col-md-4 control-label">Position Name:</p>
										      <div class="col-md-6">
										          <input type="hidden" class="form-control" id="textbox_pos_id">
										          <input type="text" class="form-control" id="text_box_pos_name">
										      </div>
										    </div>


			    	</div>

			    	<div class="col-md-12">

 											<div class="form-group">
 											<br>
										     	<button style="margin-right: 10px;" class="btn btn-sm btn-success col-md-3 control-label" id="btn_pos_update">Save</button>
												<button class="btn btn-sm btn-danger col-md-3 control-label" id="btn_pos_cancel">Cancel</button>

										    </div>
			    	</div>


  				 </div>


    
			    </div>

			</div>
        </div>

    </div>


 


</div>
<!-- /#page-wrapper -->


<script type="text/javascript">



		var BASE_URL = '<?php echo base_url(); ?>';


		$('#jqxgrid_positions').on('rowclick', function (event) 
		{
	
			var row = $("#jqxgrid_positions").jqxGrid('getrowdata',args.rowindex);
		   	 $('#textbox_pos_id').val(row.position_id);
		   	 $('#text_box_pos_name').val(row.position_name);

		}); 



		$('#btn_pos_update').on('click',function(){

			info = {};
			info['position_id'] = $('#textbox_pos_id').val();
			info['position_name'] = $('#text_box_pos_name').val();

			var update = postdata(BASE_URL + 'personnel/updatepositions', info);

			if(update){

				if($('#textbox_pos_id').val() == ''){

					var rowid = $('#jqxgrid_positions').jqxGrid('selectedrowindex'); 
					$('#jqxgrid_positions').jqxGrid('addrow', rowid, {'position_name' : $('#text_box_pos_name').val() , 'position_id' : update});
				}else{
					var rowid = $('#jqxgrid_positions').jqxGrid('selectedrowindex'); 
					$('#jqxgrid_positions').jqxGrid('updaterow', rowid, {'position_name' : $('#text_box_pos_name').val() , 'position_id' : update});
				}

				
			}

		});



		$('#btn_pos_cancel').on('click',function(){
			$('#textbox_pos_id').val('');
			$('#text_box_pos_name').val('');
		});


		var positions = <?php echo json_encode($get_positions);?>; 

        		var source =
	            {
	                localdata: positions,
	                datatype: "json",
	            };

	            var dataAdapter = new $.jqx.dataAdapter(source, {
	                loadComplete: function (data) { },
	                loadError: function (xhr, status, error) { }      
	            });


	            $("#jqxgrid_positions").jqxGrid(
	            {
	                source: dataAdapter,
	  				 width: '100%',
	                 groupable: true,
	                 sortable: true,
              		 filterable: true,
               		 altrows: true,
	                columns: [
	                  { text: 'Position ID' , datafield: 'position_id' ,width: 110 ,  align: 'left' , cellsalign: 'left'},
                      { text: 'Position Name', datafield: 'position_name' , width: 590 ,  align: 'left' , cellsalign: 'left' } 
	               ]
	            });
	



</script>




