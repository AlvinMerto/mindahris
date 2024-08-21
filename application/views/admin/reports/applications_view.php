        <div id="page-wrapper">
            <div class="row">

                <div class="col-lg-12">
                    <h3 class="page-header">My Applications </h3>
                </div>


                <div class="col-lg-12">
                    <div class="panel panel-info">

                        <div class="panel-heading">
                           Waiting for Approvals
                        </div>

                        <div class="panel-body">

                        <div class="row">


                            <div class="col-md-12">
                                <div class="form-group">
                                        <div id="jqxgrid_applications"></div>
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

    var SES_USERTYPE = '<?php echo $usertype; ?>';
    var ses_biometric_id = '<?php echo $biometric_id; ?>';
    var ses_employee_id = '<?php echo $employee_id; ?>';
    var ses_employment_type = '<?php echo $employment_type; ?>';
    var ses_dbm_sub_pap_id = '<?php echo $dbm_sub_pap_id; ?>';
    var ses_division_id = '<?php echo $division_id; ?>';
    var ses_level_sub_pap_div = '<?php echo $level_sub_pap_div; ?>';
    var ses_is_head = '<?php echo $is_head; ?>';



        $(document).ready(function () {


            getallapplications();



          $('#jqxgrid_applications').on('rowdoubleclick', function (event) {

                  var result = [];
                  var rows = $("#jqxgrid_applications").jqxGrid('selectedrowindexes');                  
                  var selectedRecords = new Array();
        
                    for (var m = 0; m < rows.length; m++) {

                        var row = $("#jqxgrid_applications").jqxGrid('getrowdata', rows[m]);
                        var data = selectedRecords[selectedRecords.length] = row;
                            result.push(data);
                    }

                    
                     window.location.href =  BASE_URL + 'reports/applications/' + result[0].exact_id + '/' +result[0].type_mode; 
           });


        });



        function getallapplications(){

            info = {};
            info['ses_employee_id'] = ses_employee_id;


            var result = postdata(BASE_URL + 'reports/getallapplications', info);

            if(result){


                var source =
                {
                    localdata: result,
                    datatype: "json",
                };

                var dataAdapter = new $.jqx.dataAdapter(source, {
                    loadComplete: function (data) { },
                    loadError: function (xhr, status, error) { }      
                });


                $("#jqxgrid_applications").jqxGrid(
                {
                     source: dataAdapter,
                     width: '100%' ,
                     groupable: true,
                     sortable: true,
                     filterable: true,
                     altrows: true,
                     columns: [
                      { text: 'ID' , datafield: 'exact_id' ,width: 100 ,  align: 'left' , cellsalign: 'left'},
                      { text: 'TYPE', datafield: 'new_type_mode' , width: 200 ,  align: 'left' , cellsalign: 'left' } ,
                      { text: 'FULLNAME', datafield: 'fullname' , width: 250 ,  align: 'left' , cellsalign: 'left' } ,
                      { text: 'DATE FILLED', datafield: 'date_added' , width: 250 ,  align: 'left' , cellsalign: 'center' , align: 'center'} ,
                      { text: 'STATUS', datafield: 'status' , width: 250 ,  align: 'left' , cellsalign: 'center' , align: 'center'} 
                    ]
                });


             
            }

        }




</script>        