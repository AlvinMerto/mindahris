
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Offices & Divisions</h3>
        </div>


        <div class="col-lg-12">
      <div class="panel panel-info">
          <div class="panel-heading">
              Offices & Divisions Tree
          </div>
          <div class="panel-body">

                    <div class="form-group">
                        <div id="treeGrid"></div>
                    </div>
    
          </div>

      </div>
        </div>

        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->

<script>

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
