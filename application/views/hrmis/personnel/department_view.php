  <div class="content-wrapper">

       <section class="content-header">
        <h1>
            Offices & Divisions
        </h1>
        <ol class="breadcrumb">
           <li class="active"><img style="margin-top:-14px;" src="<?php echo base_url();?>assets/images/minda/rsz_1minda_logo_text.png" /></li>
        </ol>
     </section>

     <section class="content">
       <div class="row">
         <div class="col-md-9">
           <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Offices & Divisions Tree</h3>
                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div id="treeGrid"></div>
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


<script>
var BASE_URL = '<?php echo base_url(); ?>';

 $(document).ready(function () {




           /* PREPARE DATA */
    var subpaptree = <?php echo json_encode($sub_pap_division_tree); ?>;
            // prepare the data
            var source =
            {
                dataType: "json",
                dataFields: [
                    { name: 'parentid', type: 'number' },
                    { name: 'id', type: 'number' },
                    { name: 'name', type: 'string' }
                ],
                hierarchy:
                {
                    keyDataField: { name: 'id' },
                    parentDataField: { name: 'parentid' }
                },
                localData: subpaptree
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            // create Tree Grid
            $("#treeGrid").jqxTreeGrid(
            {
                width: 700,
                source: dataAdapter,
                //sortable: true,
                ready: function()
                {
                      $("#treeGrid").jqxTreeGrid('expandAll');
                },
                columns: [
                  { text: '', dataField: 'name', width: 700 },
                ]
            });

        });


    </script>
