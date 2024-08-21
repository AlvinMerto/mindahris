

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Employee Schedule </h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>


   <p>Below is the flexi-time schedule of MinDA Plantilla Personnel for CY 2016 which shall be effective on February 1, 2016</p>

        <div class="row">
          <div class="col-md-12">
              <div id="jqx_employee_shifts"></div>
          </div>
        </div>


         <br> <br>



                     <div class="row">
              <div class="col-md-3">
                <div id='content' style="padding-bottom: 15px;">
                       <label class="label label-default">SELECT SHIFT:</label>
                       <div style="margin-top:10px; margin-bottom:10px;" id='jqxshifts'></div>
                </div>
              </div>


            <div class="col-md-2">
                     <label class="label label-default">SELECT RANGE:</label>
                     <div style="margin-top:10px;" id='jqxdaterange'></div> 
            </div>

            <div class="col-md-2">
                     <label class="label label-default">TEMPORARY SHIFT:</label>
                     <div> <input style="margin-top: 15px;margin-left: 15px;" type="checkbox" checked="" id="checkbox_is_temporary"></div>
                    
            </div>


          <div class="col-md-3">
            <br>
            <input type="button" class="btn btn-primary btn-sm" value="Add" id="jqx_add_emp_shift"/>  
          </div>

        </div>

        <div class="row">

          <div class="col-md-6">
            <div style='border-top:solid 1px #ddd;  padding-top: 10px; font-size: 13px; font-family: Verdana;' id='selection'></div>
            <br>
            <br>
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




          /* AUTO CURRENT DATE */
      

           $("#jqxdaterange").jqxDateTimeInput({ width: 250, height: 25,  selectionMode: 'range' , template: 'primary' ,  formatString: "M/d/yyyy"});

             var date = new Date();
             var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
             var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

              var date1 = new Date();
              date1.setFullYear(firstDay.getFullYear(), firstDay.getMonth(), firstDay.getDate());
              var date2 = new Date();
              date2.setFullYear(lastDay.getFullYear(), lastDay.getMonth(), lastDay.getDate());

              $("#jqxdaterange").jqxDateTimeInput('setRange', date1, date2)
              var selection = $("#jqxdaterange").jqxDateTimeInput('getRange');
              $("#selection").html("<div id='startenddate'>Start Date: " + selection.from.toLocaleDateString() + " <br/>End Date: " + selection.to.toLocaleDateString() + "</div>");


         /*DATE RANGE*/


          $("#jqxdaterange").on('change', function (event) {
                var selection = $("#jqxdaterange").jqxDateTimeInput('getRange');
                if (selection.from != null) {

                    $("#selection").html("<div id='startenddate'>Start Date: " + selection.from.toLocaleDateString() + " <br/>End Date: " + selection.to.toLocaleDateString() + "</div>");

                    var sdate = selection.from.toLocaleDateString();
                    var edate = selection.to.toLocaleDateString();

                }
            });  



            var employees = <?php echo json_encode($employees);?>; 
            loadempscheduletable(employees);


              $('#jqx_add_emp_shift').on('click',function(){

                var info = {};

                    var employee_ids =[];

                    var selection = $("#jqxdaterange").jqxDateTimeInput('getRange');


                      var rows = $("#jqx_employee_shifts").jqxGrid('selectedrowindexes');                  
                      var selectedRecords = new Array();
          
                      for (var m = 0; m < rows.length; m++) {

                          var row = $("#jqx_employee_shifts").jqxGrid('getrowdata', rows[m]);
                          var data = selectedRecords[selectedRecords.length] = row;

                               var objCols = {
                                employee_id : data.employee_id
                              };  

                              employee_ids.push(objCols);
                      }


                  info['employee_ids'] = employee_ids;

                  info['date_start_cover'] = selection.from.getMonth() + 1 + '/'+ selection.from.getDate() + '/' + selection.from.getFullYear();
                  info['date_end_cover'] = selection.to.getMonth() + 1 + '/'+ selection.to.getDate() + '/' + selection.to.getFullYear();
                  info['shift_id'] = $('#jqxshifts').val();
                  info['is_temporary'] = $('#checkbox_is_temporary').prop('checked');



                 var result = postdata(BASE_URL + 'attendance/updateemployeeshift' , info);

                  if(result){
                    loadempscheduletable(result);
                    $('#jqx_employee_shifts').jqxGrid('clearselection');
                  }

              });        





        }); /*end document ready*/



        /*FUNCTIONS ===============================================================================================================================*/


      function loadempscheduletable(data){

            var source =
              {
                  localdata: data,
                  datatype: "json",
              };

              var dataAdapter = new $.jqx.dataAdapter(source, {
                  loadComplete: function (data) { },
                  loadError: function (xhr, status, error) { }      
              });


              $("#jqx_employee_shifts").jqxGrid(
              {
                  source: dataAdapter,
                 // autoheight:true,
                  width: '100%' ,
                  height: 600,
                  scrollmode : 'logical',
                 groupable: true,
                  sortable: true,
                  filterable: true,
                  altrows: true,
                  selectionmode: 'checkbox',
                  columns: [
                    { text: 'Employee ID' , datafield: 'employee_id' ,width: 110 ,  align: 'left' , cellsalign: 'left'}, 
                    { text: 'Fullname', datafield: 'f_name' , width: 350 ,  align: 'left' , cellsalign: 'left' } , 
                    { text: 'Shift' , datafield: 'shift_name' ,width: 450 ,  align: 'center' , cellsalign: 'center' } ,
                    { text: 'Date Covered' , datafield: 'new_sch_date_cover' ,width: 400 ,  align: 'center' , cellsalign: 'center' } ,
                    { text: 'Employment Type' , datafield: 'employment_type' ,width: 230 ,  align: 'center' , cellsalign: 'center' } 
                  

                 ]
              });   

      }



    </script>