  <div class="content-wrapper">

       <section class="content-header">
        <h1>
            Areas
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
                  <h3 class="box-title">List of Areas</h3>
                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="row">
                     <div class="col-md-12">
                       <div id="jqxgridareas"></div>
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