

<div id="jqxdropdownbutton">
  <div id="treeGrid"></div>
</div>

<!-- <button id="button_test">Test</button> -->

     
<script>

 $(document).ready(function () {


           /* PREPARE DATA */
    var subpaptree = <?php echo json_encode($sub_pap_division_tree); ?>;

    var parent = -1;
    var division = 2;

    var fruits = [2,6,7,8,9]; 


    var inss= 8;
            // prepare the data
            var source =
            {
                dataType: "json",
                dataFields: [
                    { name: 'parentid', type: 'number' },
                    { name: 'id', type: 'number' },
                    { name: 'master_id', type: 'number' },
                    { name: 'db_table', type: 'string' },
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
                width: 420,
                source: dataAdapter,
                hierarchicalCheckboxes: true,
                  checkboxes: false,
                //sortable: true,
                ready: function()
                {   


                     $("#treeGrid").jqxTreeGrid('hideColumn', 'master_id');
                     $("#treeGrid").jqxTreeGrid('hideColumn', 'db_table');
                     $("#treeGrid").jqxTreeGrid('hideColumn', 'master_id');
                     $("#treeGrid").jqxTreeGrid('hideColumn', 'parentid');
          
                   //   $('#treeGrid').jqxTreeGrid({ disabled:true }); 
/*                     $("#treeGrid").jqxTreeGrid('expandRow', 1);

                      $("#treeGrid").jqxTreeGrid('checkRow', 6);
                      $("#treeGrid").jqxTreeGrid('checkRow', 7);
                      $("#treeGrid").jqxTreeGrid('checkRow', 8);
                      $("#treeGrid").jqxTreeGrid('checkRow', 9);

                      $("#treeGrid").jqxTreeGrid('selectRow', 6);
                      $("#treeGrid").jqxTreeGrid('selectRow', 7);
                      $("#treeGrid").jqxTreeGrid('selectRow', 8);
                      $("#treeGrid").jqxTreeGrid('selectRow', 9);*/

                }, 

/*              checkboxes: function (rowKey, dataRow) {

                 if(rowKey == 1 || rowKey == 6 || rowKey == 7 || rowKey == 8 || rowKey == 9){

                        return true;
                       
                    }else{
                         return false;
                    }
                   
 
                 },*/
                columns: [
                  { text: '', dataField: 'name', width: 420 },
                  { text: 'master_id', dataField: 'master_id', width: 50 },
                  { text: 'parentid', dataField: 'parentid', width: 50 },
                  { text: 'db_table', dataField: 'db_table', width: 100 }
                ]
            });

        });




  




$('#button_test').click(function () {
      var rows = $("#treeGrid").jqxTreeGrid('getCheckedRows');
      var rowsData = "";

      for (var i = 0; i < rows.length; i++) {
          rowsData += rows[i].master_id + " " + rows[i].db_table + "\n";
          // $("#treeGrid").jqxTreeGrid('uncheckRow', 1);
      }
      alert(rowsData);
       $('#treeGrid').jqxTreeGrid('disabled');
  });



     $("#jqxdropdownbutton").jqxDropDownButton({
                width: 280
     });

$('#treeGrid').on('rowSelect', 
function (event)
{
    // event args.
    var args = event.args;
    // row data.
    var row = args.row;
    // row key.
    var key = args.key;

    
    $('#jqxdropdownbutton').jqxDropDownButton('setContent', row.name); 

});


  $('#treeGrid').on('rowCheck', function (event) {

       var rows = $("#treeGrid").jqxTreeGrid('getCheckedRows');
       var rowsData = "";
       var rowsData_display = "";

      for (var i = 0; i < rows.length; i++) {
          rowsData += rows[i].master_id + " " + rows[i].db_table + "\n";
            if(rows[i].db_table == 'DBM_Sub_Pap'){
                rowsData_display += rows[i].name;
            }else{
                rowsData_display += rows[i].name + "<br>"; 
            }
                 
      }
     $('#jqxdropdownbutton').jqxDropDownButton('setContent', rowsData_display); 
  });


  $('#treeGrid').on('rowUncheck', function (event) {

       var rows = $("#treeGrid").jqxTreeGrid('getCheckedRows');
       var rowsData = "";
       var rowsData_display = "";

      for (var i = 0; i < rows.length
        ; i++) {
          rowsData += rows[i].master_id + " " + rows[i].db_table + "\n";

            if(rows[i].db_table == 'DBM_Sub_Pap'){
                rowsData_display += rows[i].name;
            }else{
                rowsData_display += rows[i].name + "<br>"; 
            }
                 

      }

     $('#jqxdropdownbutton').jqxDropDownButton('setContent', rowsData_display); 

     
  });


    </script>
