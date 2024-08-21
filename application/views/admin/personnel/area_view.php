
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Areas</h3>
        </div>



        <div class="col-lg-12">
			<div class="panel panel-info">
			    <div class="panel-heading">
			        Area List
			    </div>
			    <div class="panel-body">

                    <div class="form-group">
                    		<div id="jqxgridareas"></div>
                    </div>
    
			    </div>

			</div>
        </div>

      
    </div>
</div>
<!-- /#page-wrapper -->



<script type="text/javascript">

		var BASE_URL = '<?php echo base_url(); ?>';

        $(document).ready(function () {

        		areas = <?php echo json_encode($areas);?>; 

        		var source =
	            {
	                localdata: areas,
	                datatype: "json",
	            };

	            var dataAdapter = new $.jqx.dataAdapter(source, {
	                loadComplete: function (data) { },
	                loadError: function (xhr, status, error) { }      
	            });


	            $("#jqxgridareas").jqxGrid(
	            {
	                source: dataAdapter,
	                autoheight:true,

	                columns: [
	                  { text: 'Id' , datafield: 'area_id' ,width: 50 ,  align: 'center' , cellsalign: 'center'},
                      { text: 'Name', datafield: 'area_name' , width: 550 ,  align: 'left' , cellsalign: 'left' } 

	               ]
	            });



        });  /* end document */

</script>