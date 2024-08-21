
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Summary Reports</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>



    <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
                        <div class="panel-heading">
                           SUMMARY OF DAILY TIME RECORDS 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#joangency" data-toggle="tab" aria-expanded="true">JOB ORDER </a></li>
                                <li class=""><a href="#plantilla" data-toggle="tab" aria-expanded="false">PLANTILLA / REGULAR </a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="joangency">

                                    <div style="padding:20px;">

                                         <div class="row" style="margin-bottom:0px;">

                                            <div class="col-md-11">
                                              <label>SELECT COVER DATE FOR JO: </label>
                                                <div id="jqx_date_covered_dropdownlist_jo"></div>
                                            </div>

                                            <div class="col-md-1">
                                                <button style="display:block;" class="btn btn-sm btn-primary" id="btn_date_covered_add_jo">Add new </button>
                                            </div>

                                         </div>

                                      <div class="row">
                                        <div class="col-md-12">
                                           <h4 class="page-header">SUMMARY OF DAILY TIME RECORDS OF JOB ORDERS AS OF <?php  date_default_timezone_set("Asia/Manila"); echo date('F d, Y , l h:i:s a');?></h4>

                                           <p>DATE COVERED: <span id="display_jo_date_covered"></span> <span id="btn_edit_date_covered_jo" class="btn btn-xs btn-success">Edit</span></p>
                                           <p>DEADLINE OF SUBMISSION: <span id="display_date_submission_jo"></span>  <span id="deadline_label" style="display:none; color:red;"> (DEADLINE TODAY) </span> &nbsp; <span id="btn_edit_date_deadline_jo" class="btn btn-xs btn-success">Edit</span></p> 
                                           <p><input type="hidden" id="jqx_dtr_coverage_id_jo"> <input type="hidden" id="jqx_date_index_jo" /><input type="checkbox" id="allow_jo_submit"  /> <span> Allow to submit</span></p>
                                           <p>
                                           <input type="button" class="btn btn-primary btn-sm" value="PRINT" id="jqxprint_summary_jo"/>
                                           <input type="button" class="btn btn-danger btn-sm" value="PRINT DEDUCTION DETAILS" id="jqxprint_summary_jo_deduction"/></p>

                                           <div id="printed_table_deductions">

                                            </div>

                                            <div id="jqxgrid_summary"></div>
                                            <div id="jqxgrid_summary_not_submitted"></div>
                                        </div>
                                      </div>  
                                    </div>

                                </div>



                                <div class="tab-pane fade" id="plantilla">

                                    <div style="padding:20px;">


                                           <div class="row" style="margin-bottom:0px;">

                                              <div class="col-md-11">
                                                  <label>SELECT COVER DATE FOR PLANTILLA: </label>
                                                  <div id="jqx_date_covered_dropdownlist_regular"></div>
                                              </div>

                                              <div class="col-md-1">
                                                  <button style="display:none;" class="btn btn-sm btn-primary" id="btn_date_covered_add_regular" >Add new </button>
                                              </div>

                                           </div>

                                        <div class="row">
                                          <div class="col-md-12">
                                           <h4 class="page-header">REPORTS ON THE SUBMISSION OF DAILY TIME RECORDS FOR PLANTILLA AS OF <?php date_default_timezone_set("Asia/Manila");  echo date('F d, Y , l h:i:s a');?></h4>
                                            <p>DATE COVERED: <span id="display_regular_date_covered"></span></p>
                                            <p>DEADLINE OF SUBMISSION: <span id="display_date_submission_regular"></span>   <span id="deadline_label_regular" style="display:none; color:red;"> (DEADLINE TODAY) </span> <span id="btn_edit_date_deadline_regular" class="btn btn-xs btn-success">Edit</span></p>
                                              <p><input type="hidden" id="jqx_dtr_coverage_id_regular"><input type="hidden" id="jqx_date_index_regular" /> <input type="checkbox" id="allow_regular_submit"/> <span> Allow to submit</span></p>
                                              <p><input type="button" class="btn btn-primary btn-sm" value="PRINT" id="jqxprint_summary_regular"/></p>
                                              <div id="treeGrid"></div>
                                          </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
        </div>
    </div>


  <div class="row" style="display:none;">
    <div class="col-md-3">
             <label class="label label-default">SELECT DATE:</label>
             <div style="margin-top:10px;" id='jqxdaterange'></div> 
               <br>
    </div>


  </div>

  <div class="row" style="display:none;">

    <div class="col-md-6">

      <div style='border-top:solid 1px #ddd;  padding-top: 10px; font-size: 13px; font-family: Verdana;' id='selection'></div>
      <br>

    </div>

  </div>

</div>
<!-- /#page-wrapper -->



<!-- printed area -->

<?php $this->load->view('admin/reports/summaryprint_jo_view'); ?>
<?php $this->load->view('admin/reports/summaryprint_regular_view'); ?>







<script type="text/javascript">


   var SES_USERTYPE = '<?php echo $usertype; ?>';





    var BASE_URL = '<?php echo base_url(); ?>';

    var LIST_COVER_DATES_JO = '';
    var LIST_COVER_DATES_PLANTILLA = '';

        $(document).ready(function () {

        /* PREPARE DATA */


        $("#jqx_date_covered_dropdownlist_jo").jqxDropDownList({  width: '330px' ,height: '25px' }); 
        $("#jqx_date_covered_dropdownlist_regular").jqxDropDownList({  width: '330px' ,height: '25px' }); 






        /* AUTO CURRENT DATE */
      

           $("#jqxdaterange").jqxDateTimeInput({ width: 250, height: 25,  selectionMode: 'range' , template: 'primary'});

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




             var data = [
                {
                    "id": "1", "name": "Office of the chairperson", "budget": "", "location": "",
                    "children":
                     [
                         {"id": "66", "name": "Atty. Mellisa Gene", "budget": "Submitted", "location": "" , 'index' : '1'},
                         {"id": "6644", "name": "Reysa Villaflor", "budget": "Submitted", "location": "" ,'index' : '2'},
                         {

                             "id": "2", "name": "Office of the Executive Director", "budget": "", "location": "",
                             "children":
                             [
                                 { "id": "3", "name": "Helen G. De Castro", "budget": "Submitted", "location": "" ,'index' : '1' },
                                 { "id": "4", "name": "Argie S. Eparto", "budget": "Submitted", "location": "" , 'index' : '2'},
                             ]
                         }
                     ]
                },
                {
                    "id": "323", "name": "Policy Planning and Project Development Office", "budget": "", "location": "",
                    "children":
                     [
                         {"id": "3232", "name": "Atty. Mellisa Gene", "budget": "Submitted", "location": ""},
                         {"id": "66545444", "name": "Reysa Villaflor", "budget": "Submitted", "location": ""},
                         {

                             "id": "5454", "name": "Office of the Executive Director", "budget": "", "location": "",
                             "children":
                             [
                                 { "id": "545", "name": "Helen G. De Castro", "budget": "Submitted", "location": "" },
                                 { "id": "5454", "name": "Argie S. Eparto", "budget": "Submitted", "location": "" },
                             ]
                         }
                     ]
                }
            ];





            var active_dtr_coverage = getactivedtrcoverage();



            $('#deadline_label').hide();

            for (i in active_dtr_coverage){
                var employment_type = active_dtr_coverage[i].employment_type;

                if(employment_type == 'JO'){



                  info = {};
                  info['dtr_cover_id'] = active_dtr_coverage[i].dtr_cover_id;
                  info['is_active'] = active_dtr_coverage[i].is_active;

        


                   $('#display_jo_date_covered').html(active_dtr_coverage[i].date_started + '<input id="id_date_started" type="hidden" value="'+active_dtr_coverage[i].date_started+'" />  <input id="id_date_ended" type="hidden" value="'+active_dtr_coverage[i].date_ended+'" /> <input id="id_date_deadline" type="hidden" value="'+active_dtr_coverage[i].date_deadline+'" /> - ' + active_dtr_coverage[i].date_ended);
                   $('#display_date_submission_jo').html(active_dtr_coverage[i].date_deadline);
                   $('#jqx_dtr_coverage_id_jo').val(active_dtr_coverage[i].dtr_cover_id);
                   $('#jqx_date_index_jo').val(active_dtr_coverage[i].date_index);


                   var allow = false;
                   if(active_dtr_coverage[i].is_allow_to_submit == '1'){
                      allow = true;
                   }

                
                   $('#allow_jo_submit').prop('checked' , allow );

                   var date_now = '<?php  date_default_timezone_set("Asia/Manila"); echo date('m/d/Y') ?>';

                  if(active_dtr_coverage[i].date_deadline == date_now){
                    $('#deadline_label').show();
                  }

                  //generatedtrsummary_jo(info);



                }else if (employment_type == 'REGULAR'){

                   $('#display_regular_date_covered').html(active_dtr_coverage[i].date_started + ' <input id="id_date_deadline_regular" type="hidden" value="'+active_dtr_coverage[i].date_deadline+'" /> - ' + active_dtr_coverage[i].date_ended);
                   $('#display_date_submission_regular').html(active_dtr_coverage[i].date_deadline);
                    $('#jqx_dtr_coverage_id_regular').val(active_dtr_coverage[i].dtr_cover_id);
                     $('#jqx_date_index_regular').val(active_dtr_coverage[i].date_index);



                      var selection = $("#jqxdaterange").jqxDateTimeInput('getRange');


                      var sdate = selection.from.toLocaleDateString();

                      var d1 = new Date(sdate);
                      var d2 = new Date(active_dtr_coverage[i].date_started);
         

                      if(d1.getTime() !== d2.getTime()){
                          $('#btn_date_covered_add_regular').show();
                      }else{
                          $('#btn_date_covered_add_regular').hide();
                      }


                  var allow = false;
                   if(active_dtr_coverage[i].is_allow_to_submit == '1'){
                      allow = true;
                   }

                
                   $('#allow_regular_submit').prop('checked' , allow );

                   var date_now = '<?php  date_default_timezone_set("Asia/Manila"); echo date('m/d/Y') ?>';

                  if(active_dtr_coverage[i].date_deadline == date_now){
                    $('#deadline_label_regular').show();
                  }

                }

            }







            $('#btn_edit_date_covered_jo').on('click',function(){


                var back_up_display =  $('#display_jo_date_covered').html();

                var id_date_started = $('#id_date_started').val();
                var id_date_end = $('#id_date_ended').val();


                var dateinput = '<div id="jqxdate_ended"></div><button id="btn_jo_date_covered_save" >Save</button><button id="btn_jo_date_covered_cancel">Cancel</button>';
                $('#display_jo_date_covered').html(dateinput);

                $("#jqxdate_ended").jqxDateTimeInput({ width: '200px', height: '25px' });
                $('#jqxdate_ended ').jqxDateTimeInput('setDate', new Date(id_date_end));
                $('#jqxdate_ended').jqxDateTimeInput({ formatString: "MM/dd/yyyy"});


                $('#btn_edit_date_covered_jo').hide();


                $('#btn_jo_date_covered_cancel').on('click',function(){
                  $('#display_jo_date_covered').html(back_up_display);
                  $('#btn_edit_date_covered_jo').show();

                });


                 $('#btn_jo_date_covered_save').on('click',function(){
   
                     var date_ended = $('#jqxdate_ended').val();

                     info['employment_type'] = "JO";
                     info['date_started'] = '';
                     info['is_active'] = '';
                     info['is_allow_to_submit'] = '';
                     info['date_deadline'] = '';
                     info['date_ended'] = date_ended;
                     info['dtr_cover_id'] = $('#jqx_dtr_coverage_id_jo').val();
                     info['date_index'] = $('#jqx_date_index_jo').val();


                     var update = postdata(BASE_URL + 'reports/updatedtrcoverage', info );

                     if(update){

                       $('#display_jo_date_covered').html(update[0].date_started + '<input id="id_date_started" type="hidden" value="'+update[0].date_started+'" />  <input id="id_date_ended" type="hidden" value="'+update[0].date_ended+'" /> - ' + update[0].date_ended);
                       $('#btn_edit_date_covered_jo').show();

                        LIST_COVER_DATES_JO =  loadcoverdates('JO');

                         var list_jo = new $.jqx.dataAdapter(LIST_COVER_DATES_JO);
                         $("#jqx_date_covered_dropdownlist_jo").jqxDropDownList({ source: list_jo, displayMember: "date_covered_label", valueMember: "dtr_cover_id", selectedIndex: 0, width: '330px' ,height: '25px' });

                         $('#jqx_date_covered_dropdownlist_jo').val(update[0].dtr_cover_id);

                     }

   
                });


            });





            $('#btn_edit_date_deadline_jo').on('click',function(){

              var back_up_display =  $('#display_date_submission_jo').html();


               var id_date_deadline = $('#id_date_deadline').val();


                var dateinput = '<div id="jqx_date_deadline"></div><button id="btn_jo_dead_save" >Save</button><button id="btn_jo_dead_cancel">Cancel</button>';
                $('#display_date_submission_jo').html(dateinput);

                $("#jqx_date_deadline").jqxDateTimeInput({ width: '200px', height: '25px' });
                $('#jqx_date_deadline ').jqxDateTimeInput('setDate', new Date(id_date_deadline));
                $('#jqx_date_deadline').jqxDateTimeInput({ formatString: "MM/dd/yyyy"});


                $('#btn_edit_date_deadline_jo').hide();


                $('#btn_jo_dead_cancel').on('click',function(){
                  $('#display_date_submission_jo').html(back_up_display);
                  $('#btn_edit_date_deadline_jo').show();

                });


                 $('#btn_jo_dead_save').on('click',function(){
   
                     var date_deadline = $('#jqx_date_deadline').val();

                     info['employment_type'] = "JO";
                     info['date_started'] = '';
                     info['is_active'] = '';
                     info['is_allow_to_submit'] = '';
                     info['date_deadline'] = date_deadline;
                     info['date_ended'] = '';

                     info['dtr_cover_id'] = $('#jqx_dtr_coverage_id_jo').val();
                     info['date_index'] = $('#jqx_date_index_jo').val();


                     var update = postdata(BASE_URL + 'reports/updatedtrcoverage', info );

                     if(update){

                       $('#display_date_submission_jo').html(update[0].date_deadline);
                       $('#btn_edit_date_deadline_jo').show();
                       $('#id_date_deadline').val(update[0].date_deadline);

                        var date_now = '<?php  date_default_timezone_set("Asia/Manila"); echo date('m/d/Y') ?>';

                        if(update[0].date_deadline == date_now){
                          $('#deadline_label').show();
                        }else{
                            $('#deadline_label').hide();
                        }

                         LIST_COVER_DATES_JO =  loadcoverdates('JO');

                     }

   
                });

            });


            $("#allow_jo_submit").change(function() {

                     info = {};

                     info['employment_type'] = "JO";
                     info['date_started'] = '';
                     info['is_active'] = '';
                     info['is_allow_to_submit'] = '0';
                     info['date_deadline'] = '';
                     info['date_ended'] = '';

                     info['dtr_cover_id'] = $('#jqx_dtr_coverage_id_jo').val();
                     info['date_index'] = $('#jqx_date_index_jo').val();

                  if($(this).is(":checked")) {                    
                       info['is_allow_to_submit'] = '1';     
                  }

                 var update = postdata(BASE_URL + 'reports/updatedtrcoverage', info );

                 if(update){
                         LIST_COVER_DATES_JO =  loadcoverdates('JO');
                 }


            });





            $('#btn_edit_date_deadline_regular').on('click',function(){


               var back_up_display_1 =  $('#display_date_submission_regular').html();


               var id_date_deadline_regular = $('#id_date_deadline_regular').val();


                var dateinput = '<div id="jqx_date_deadline_regular"></div><button id="btn_regular_dead_save" >Save</button><button id="btn_regular_dead_cancel">Cancel</button>';
                $('#display_date_submission_regular').html(dateinput);

                $("#jqx_date_deadline_regular").jqxDateTimeInput({ width: '200px', height: '25px' });
                $('#jqx_date_deadline_regular ').jqxDateTimeInput('setDate', new Date(id_date_deadline_regular));
                $('#jqx_date_deadline_regular').jqxDateTimeInput({ formatString: "MM/dd/yyyy"});


                $('#btn_edit_date_deadline_regular').hide();


                 $('#btn_regular_dead_cancel').on('click',function(){
                  $('#display_date_submission_regular').html(back_up_display_1);
                  $('#btn_edit_date_deadline_regular').show();

                });


                 $('#btn_regular_dead_save').on('click',function(){
   
                     var date_deadline_regular = $('#jqx_date_deadline_regular').val();

                     info['employment_type'] = "REGULAR";
                     info['date_started'] = '';
                     info['is_active'] = '';
                     info['is_allow_to_submit'] = '';
                     info['date_deadline'] = date_deadline_regular;
                     info['date_ended'] = '';

                     info['dtr_cover_id'] = $('#jqx_dtr_coverage_id_regular').val();
                     info['date_index'] = $('#jqx_date_index_regular').val();


                     var update = postdata(BASE_URL + 'reports/updatedtrcoverage', info );

                     if(update){
                      showmessage('Deadline of submission updated!', 'success');
                       $('#display_date_submission_regular').html(update[0].date_deadline);
                       $('#btn_edit_date_deadline_regular').show();
                       $('#id_date_deadline_regular').val(update[0].date_deadline);

                        var date_now = '<?php  date_default_timezone_set("Asia/Manila"); echo date('m/d/Y') ?>';

                        if(update[0].date_deadline == date_now){
                          $('#deadline_label_regular').show();
                        }else{
                          $('#deadline_label_regular').hide();
                        }


                          LIST_COVER_DATES_PLANTILLA =  loadcoverdates('REGULAR');

                     }

   
                });



            });


          $("#allow_regular_submit").change(function() {

                     info = {};

                     info['employment_type'] = "REGULAR";
                     info['date_started'] = '';
                     info['is_active'] = '';
                     info['is_allow_to_submit'] = '0';
                     info['date_deadline'] = '';
                     info['date_ended'] = '';

                     info['dtr_cover_id'] = $('#jqx_dtr_coverage_id_regular').val();
                     info['date_index'] = $('#jqx_date_index_regular').val();

                  if($(this).is(":checked")) {                    
                       info['is_allow_to_submit'] = '1';     
                  }

                 var update = postdata(BASE_URL + 'reports/updatedtrcoverage', info );

                 if(update){

                          LIST_COVER_DATES_PLANTILLA =  loadcoverdates('REGULAR');

                 }


            });





          LIST_COVER_DATES_JO = loadcoverdates('JO');
          LIST_COVER_DATES_PLANTILLA= loadcoverdates('REGULAR');


           var list_jo = new $.jqx.dataAdapter(LIST_COVER_DATES_JO);
           var list_regular = new $.jqx.dataAdapter(LIST_COVER_DATES_PLANTILLA);




           $('#jqx_date_covered_dropdownlist_jo').on('select', function (event) {

               var args = event.args;
               if (args) {
                   // index represents the item's index.                          
                   var index = args.index;
                   var item = args.item;
                   // get item's label and value.
                   var label = item.label;
                   var value = item.value;

                   var dtr_cover_list = LIST_COVER_DATES_JO;


                   for(i in dtr_cover_list){

                      if(value == dtr_cover_list[i].dtr_cover_id){

                            var date_started = dtr_cover_list[i].date_started;
                            var date_ended = dtr_cover_list[i].date_ended;
                            var is_allow_to_submit = dtr_cover_list[i].is_allow_to_submit;
                            var is_submitted = dtr_cover_list[i].is_submitted;
                            var date_deadline = dtr_cover_list[i].date_deadline;
                            var is_active = dtr_cover_list[i].is_active;

                            $('#jqxgrid_summary').jqxGrid('clearselection');



                              info = {};
                              info['dtr_cover_id'] = dtr_cover_list[i].dtr_cover_id;
                              info['is_active'] = is_active;

                            
                             

                             $('#display_jo_date_covered').html(dtr_cover_list[i].date_started + '<input id="id_date_started" type="hidden" value="'+dtr_cover_list[i].date_started+'" />  <input id="id_date_ended" type="hidden" value="'+dtr_cover_list[i].date_ended+'" /> <input id="id_date_deadline" type="hidden" value="'+dtr_cover_list[i].date_deadline+'" /> - ' + dtr_cover_list[i].date_ended);
                             $('#display_date_submission_jo').html(dtr_cover_list[i].date_deadline);
                             $('#jqx_dtr_coverage_id_jo').val(dtr_cover_list[i].dtr_cover_id);
                             $('#jqx_date_index_jo').val(dtr_cover_list[i].date_index);


                             var allow = false;
                             if(dtr_cover_list[i].is_allow_to_submit == '1'){
                                allow = true;
                             }

                          
                             $('#allow_jo_submit').prop('checked' , allow );

                             var date_now = '<?php  date_default_timezone_set("Asia/Manila"); echo date('m/d/Y') ?>';

                            if(dtr_cover_list[i].date_deadline == date_now){
                              $('#deadline_label').show();
                            }else{
                               $('#deadline_label').hide();
                            }



                             generatedtrsummary_jo(info);

                      }

                   }

                }


           });




           $('#jqx_date_covered_dropdownlist_regular').on('select', function (event) {

               var args = event.args;
               if (args) {
                   // index represents the item's index.                          
                   var index = args.index;
                   var item = args.item;
                   // get item's label and value.
                   var label = item.label;
                   var value = item.value;

                   var dtr_cover_list = LIST_COVER_DATES_PLANTILLA;


                   for(i in dtr_cover_list){

                      if(value == dtr_cover_list[i].dtr_cover_id){

                            var date_started = dtr_cover_list[i].date_started;
                            var date_ended = dtr_cover_list[i].date_ended;
                            var is_allow_to_submit = dtr_cover_list[i].is_allow_to_submit;
                            var is_submitted = dtr_cover_list[i].is_submitted;
                            var date_deadline = dtr_cover_list[i].date_deadline;

                            var for_month  = new Date(date_started);
                            var month = new Array();
                              month[0] = "January";
                              month[1] = "February";
                              month[2] = "March";
                              month[3] = "April";
                              month[4] = "May";
                              month[5] = "June";
                              month[6] = "July";
                              month[7] = "August";
                              month[8] = "September";
                              month[9] = "October";
                              month[10] = "November";
                              month[11] = "December";


                            $('#display_regular_month_year').html(month[for_month.getMonth()] + ' ' + for_month.getFullYear());



                              info = {};
                              info['dtr_cover_id'] = dtr_cover_list[i].dtr_cover_id;
                            

                              generatedtrsummry_regular(info);

                              //alert(dtr_cover_list[i].dtr_cover_id)

                               $('#display_regular_date_covered').html(dtr_cover_list[i].date_started + ' <input id="id_date_deadline_regular" type="hidden" value="'+dtr_cover_list[i].date_deadline+'" /> - ' + dtr_cover_list[i].date_ended);
                               $('#display_date_submission_regular').html(dtr_cover_list[i].date_deadline);
                                $('#jqx_dtr_coverage_id_regular').val(dtr_cover_list[i].dtr_cover_id);
                                 $('#jqx_date_index_regular').val(dtr_cover_list[i].date_index);


                              var allow = false;
                               if(dtr_cover_list[i].is_allow_to_submit == '1'){
                                  allow = true;
                               }

                            
                               $('#allow_regular_submit').prop('checked' , allow );

                               var date_now = '<?php  date_default_timezone_set("Asia/Manila"); echo date('m/d/Y') ?>';

                              if(dtr_cover_list[i].date_deadline == date_now){
                                $('#deadline_label_regular').show();
                              }

                      }

                   }

                }


           });





   
           $("#jqx_date_covered_dropdownlist_jo").jqxDropDownList({ source: list_jo, displayMember: "date_covered_label", valueMember: "dtr_cover_id", selectedIndex: 0, width: '330px' ,height: '25px' });
           $("#jqx_date_covered_dropdownlist_regular").jqxDropDownList({ source: list_regular, displayMember: "date_covered_label", valueMember: "dtr_cover_id", selectedIndex: 0, width: '330px' ,height: '25px' });




           $('#btn_date_covered_add_jo').on('click',function(){

                var list_jo_d = LIST_COVER_DATES_JO;
                for(i in list_jo_d){

                   if(list_jo_d[i].is_active == 1){


                      var dtr_cover_id = list_jo_d[i].dtr_cover_id;
                      var date_started = list_jo_d[i].date_started;
                      var date_ended = list_jo_d[i].date_ended;
                      var date_deadline = list_jo_d[i].date_deadline;
                      var date_index = list_jo_d[i].date_index;



                        info = {};
                        info['dtr_cover_id'] = dtr_cover_id;    
                        info['date_ended'] = date_ended;
                        info['employment_type'] = 'JO';
                        info['date_index'] = parseInt(date_index) + 1;

                        var insert = postdata(BASE_URL + 'reports/insertnewdatecover' , info);

                        if(insert){

                           showmessage('Added date covered from ' + date_started + ' to ' + date_ended  , 'success');
                           LIST_COVER_DATES_JO =  insert;

                           var list_jo = new $.jqx.dataAdapter(LIST_COVER_DATES_JO);
                           $("#jqx_date_covered_dropdownlist_jo").jqxDropDownList({ source: list_jo, displayMember: "date_covered_label", valueMember: "dtr_cover_id", selectedIndex: 0, width: '330px' ,height: '25px' });

                        }


                   }

                }
           });




           $('#btn_date_covered_add_regular').on('click',function(){

  

            var list_regular_d = LIST_COVER_DATES_PLANTILLA;
                for(i in list_regular_d){

                 if(list_regular_d[i].is_active == 1){


                      var dtr_cover_id = list_regular_d[i].dtr_cover_id;
                      var date_started = list_regular_d[i].date_started;
                      var date_ended = list_regular_d[i].date_ended;
                      var date_deadline = list_regular_d[i].date_deadline;
                      var date_index = list_regular_d[i].date_index;

                      var current_date = new Date(date_started);
                      var current = new Date(current_date.getFullYear(), current_date.getMonth() + 1, 1);

                      var firstDay = new Date(current.getFullYear(), current.getMonth(), 1);
                      var lastDay = new Date(current.getFullYear(), current.getMonth() + 1, 0);  

                      var from_date = firstDay.getMonth() + 1  + '/'+ firstDay.getDate() + '/' + firstDay.getFullYear();
                      var to_date = lastDay.getMonth() + 1 + '/'+ lastDay.getDate() + '/' + lastDay.getFullYear();              

                      var sdate = from_date;
                      var edate = to_date;

                      var d1 = new Date(date_started);
                      var d2 = new Date(sdate);
         

                      if(d1.getTime() !== d2.getTime()){

                            info = {};
                            info['dtr_cover_id'] = dtr_cover_id;    
                            info['date_started'] = sdate;
                            info['date_ended'] = edate;
                            info['employment_type'] = 'REGULAR';
                            info['date_index'] = parseInt(date_index) + 1;


                           var insert = postdata(BASE_URL + 'reports/insertnewdatecover' , info);

                            if(insert){

                              showmessage('Added date covered from ' + sdate + ' to ' + edate  , 'success');
                              LIST_COVER_DATES_PLANTILLA =  insert;

                              var list_regular = new $.jqx.dataAdapter(LIST_COVER_DATES_PLANTILLA); 
                              $("#jqx_date_covered_dropdownlist_regular").jqxDropDownList({ source: list_regular, displayMember: "date_covered_label", valueMember: "dtr_cover_id", selectedIndex: 0, width: '330px' ,height: '25px' });

                            }
                       
                      }


                  }

                }



           });



            $('#jqxprint_summary_jo_deduction').on('click',function(){

                  var result = [];

                  var rows = $("#jqxgrid_summary").jqxGrid('selectedrowindexes');                  
                  var selectedRecords = new Array();
          
                    for (var m = 0; m < rows.length; m++) {

                        var row = $("#jqxgrid_summary").jqxGrid('getrowdata', rows[m]);
                        var data = selectedRecords[selectedRecords.length] = row;
                            result.push(data);
                    }


                        $('#printed_table_deductions').html('');
                        $('#printed_table_deductions').hide();

                        var htm = '';


                          if(result.length  != 0){

                                 var deductions = '';

                                  for(i in result){
                                     deductions = JSON.parse(result[i].deduction_logs);

                                     htm +='<hr style="border:dotted 1px #ddd"><div class="display_table_deductions" style="border:dotted 1px #f5f5f5; padding:5px; width:600px; margin-bottom: 40px; margin-left:20px; margin-right:20px;">';

                                       htm +='<div class="header_summary" style="padding: 5px;">';
                                          htm +='<p style="font-weight: bold; font-size: 15px; margin:0px;">MINDANAO DEVELOPMENT AUTHORITY (MinDA)</p>';
                                          htm +='<p style="font-style: italic; padding:0px;margin:0px; margin-bottom:20px;">Job Order</p>';
                                          htm +='<table style="border-collapse:collapse;border-spacing:0;"><tr><td><span style="margin:0px;font-weight:normal; width: 120px;">Name: </span></td><td><span style="font-weight: bold;" class="display_fullname_summary">'+result[i].f_name+'</span></td></tr> ';
                                          htm +='<tr><td><span style="margin:0px;font-weight:normal;width: 120px;">Position: </span></td><td><span class="display_position_summary">'+result[i].position_name+'</span></td></tr>';
                           
                                          htm +='<tr><td><span style="margin:0px;font-weight:normal;width: 120px;"> Daily Rate: </span></td><td><span class="display_daily_rate_summary">P '+result[i].daily_rate+'.00</span></td></tr>';
                                          htm +='<tr><td  style="width: 120px;"><span style="margin:0px;font-weight:normal;width: 120px;">Division Assigned: </span></td><td><span class="display_div_assigned_summary">'+result[i].office_division_name+'</span></td></tr>';
                                          htm +='<tr><td><span style="margin:0px;font-weight:normal;width: 120px;">JO Coverage: </span></td><td><span class="display_jo_covered_summary">'+result[i].employment_type_date+'</span></td></tr></table>';
                                       htm +='</div>';


                                       htm +='<div class="body_summary" style="padding: 5px; margin-top:9px;">';
                                          htm +='<style type="text/css">';
                                          htm +='.tgs  {border-collapse:collapse;border-spacing:0;}';  
                                          htm +='.tgs td{font-family:calibri;font-size:12px;padding:1px 1px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;text-align: center;}';
                                          htm +='.tgs th{font-family:calibri;font-size:12px;font-weight:normal;padding:1px 1px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;text-align: center;}';
                                          htm +='</style>';

                                          htm +='<table class="tgs">';
                                          htm +='<tr>';
                                          htm +='<th class="tg-031e" rowspan="2"  style="width:100px;"><b>Period</b></th>';
                                          htm +='<th class="tg-031e" style="width:150px;height:17px;"><b>Deductions</b></th>';
                                          htm +='<th class="tg-031e" rowspan="2" style="width:90px;"><b>Services Rendered</b></th>';
                                          htm +='</tr>';
                                          htm +='<tr>';
                                          htm +='<td class="tg-031e"  style="width:150px;height:17px;"><b>No. of times and date</b></td>';
                                          htm +='</tr>';
                                          htm +='<tr>';
                                          htm +='<td class="tg-031e"  style="width:150px;border: medium none !important;">';
                                          htm +='<p style="margin:0px; font-weight: bold;">'+result[i].new_dtr_coverage+'<p>';
                                          htm +='</td>';
                                          htm +='<td class="tg-031e"  style="width:200px;border: medium none !important;">';

                                          htm +='</td>';
                                          htm +='<td class="tg-031e"  style="width:90px;border: medium none !important;">'+result[i].services_rendered +'</td>';
                                          htm +='</tr>';
                                          htm +='</table>';
                                       htm +='</div>';                 
                                 



                                      if (deductions != ''){
                                         var tard = deductions.tardiness;
                                         var unde = deductions.undertime;
                                         var ps = deductions.ps;

                                         if(typeof tard !== 'undefined' && tard.length > 0){

                                          htm +='<div class="deduction_summary" style="text-align: center; margin-top:5px;">';
                                              htm +='<div style="width: 150px; float:left;text-align: center;">';
                                                  htm +='<p style="margin:0px; font-size: 13px; ">Tardiness: '+ tard.length +'x</p>';
                                              htm +='</div>';
                                              htm +='<div style="width: 200px; float:left">';
                                               htm +='<table style="border-collapse:collapse;border-spacing:0; margin:auto;">';

                                               for( x in tard){
                                                 htm +='<tr><td><span style="margin:0px;font-weight:normal;width: 90px;" >'+tard[x].date_late+'</span></td><td><span style="margin-left:30px;">'+tard[x].final_late+'</span></td></tr>';
                                               }
                                                
                                              htm +='</table>'; 
                                              htm +='</div>';
                                              htm +='<div style="clear:both;"></div>'; 
                                          htm +='</div>';

                                         }


                                        if(typeof unde !== 'undefined' && unde.length > 0){

                                          htm +='<div class="deduction_summary" style="text-align: center; margin-top:5px;">';
                                              htm +='<div style="width: 150px; float:left;text-align: center;">';
                                                  htm +='<p style="margin:0px; font-size: 13px; ">Undertime: '+ parseInt(parseInt(unde.length) + parseInt(ps.length)) +'x</p>';
                                              htm +='</div>';
                                              htm +='<div style="width: 200px; float:left;text-align:center;" >';
                                              htm +='<table style="border-collapse:collapse;border-spacing:0; margin:auto;">';

                                               for( x in unde){
                                                 htm +='<tr><td><span style="margin:0px;font-weight:normal;width: 90px;" >'+unde[x].date_undertime+'</span></td><td><span style="margin-left:30px;">'+unde[x].final_undertime+'</span></td></tr>';
                                               }

                                              if(typeof ps !== 'undefined' && ps.length > 0){

                                                 for( x in ps){
                                                   htm +='<p style="margin:0px;font-size: 13px; "><label style="margin:0px;font-weight:normal;width: 90px;" >'+ps[x].date_ps+'</label> <span style="margin-left:30px;">'+ps[x].compute_ps+'</span></p>';
                                                 }

                                              }


                                              htm +='</table>';    
                                              htm +='</div>';
                                              htm +='<div style="clear:both;"></div>'; 
                                          htm +='</div>';

                                        }



                                          htm +='<div class="deduction_summary" style="text-align: center; margin-top:5px;">';
                                              htm +='  <div style="margin:0px;  width: 150px; border:solid 1px #fff; float:left;text-align: center;">  ';
                                                  htm +='<p style="margin:0px; font-size: 13px; "></p>';
                                              htm +='</div>';
                                              htm +='<div style="width: 200px; float:left;text-align:center;">';
                                              htm +='<table style="border-collapse:collapse;border-spacing:0; margin:auto; text-align:center;">';
                                              htm +='<tr><td style="width:55px;"><span style="margin:0px;font-weight:bold;width: 90px;" >TOTAL</span></td><td><span style="margin-left:30px;">'+result[i].t_u_reports+'</span></td></tr>';
                                              htm +='</table>';                     
                                              htm +='</div>';
                                              htm +='<div style="clear:both;"></div>'; 
                                          htm +='</div>';


                                      }

                                          htm +='<div class="footer_summary" style="margin-top:20px;">';
                                            htm +='<div style="border:solid 1px #fff; width: 200px; float:left">';
                                            htm +='<p style="margin:0px; font-size: 13px; margin-bottom: 30px;">Prepared by:</p>';
                                            htm +='<p style="margin:0px; font-size: 14px; font-weight: bold;">MARY ANN M. VERZOSA</p>';
                                            htm +='<p style="margin:0px; font-size: 13px;">Administrative Officer II</p>';
                                            htm +='<p style="margin:0px; font-size: 12px;"><?php echo date('m/d/Y H:i')?></p>';           
                                            htm +='</div>';
                                            htm +='<div style="border:solid 1px #fff; width: 200px; float:right;">';      
                                              htm +='<p style="margin:0px; font-size: 13px; margin-bottom: 30px;">Verified by:</p>';
                                              htm +='<p style="margin:0px; font-size: 14px; font-weight: bold;">CHARLITA A. ESCAÑO, Ph. D</p>';
                                              htm +='<p style="margin:0px; font-size: 13px;">Director III</p>';
                                            htm +='</div>';
                                            htm +='<div style="clear:both;"></div>';   
                                          htm +='</div>';


                                       htm +='</div>';

  
                                  }

                                $('#printed_table_deductions').hide();

                                  var newWindow = window.open('', '', 'width=800, height=500'),
                                  document = newWindow.document.open(),
                                  pageContent =
                                      '<!DOCTYPE html>\n' +
                                      '<html>\n' +
                                      '<head>\n' +
                                      '<meta charset="utf-8" />\n' +
                                      '<style> @media print{@page {size: Letter Portrait; } }  @media print {.display_table_deductions { page-break-inside: avoid;}}</style>'  +
                                      '</head>\n' +
                                      '<body style="font-size:13px; !important; width: 800px;height: 900px; margin:auto !important; font-family:calibri;"> '+  htm  + '</body>\n</html>';
                                  document.write(pageContent);
                                  document.close();
                                  newWindow.print();





                          }
                  
              
            });



           $('#jqxprint_summary_jo').on('click',function(){

              $('#body_wrap').show();


              $("#jqxgrid_summary").jqxGrid('hidecolumn', 'date_submitted');
              $("#jqxgrid_summary_not_submitted").jqxGrid('hidecolumn', 'date_submitted');
              $("#jqxgrid_summary").jqxGrid('hidecolumn', 'deduction_logs');


                var gridContent_1 = '<div id="body" style="width: 90%; padding:0; margin:auto;">' + $("#jqxgrid_summary").jqxGrid('exportdata', 'html') + '</div>';
                var gridContent_2 = '<div id="body_1" style="width: 90%; padding:0; margin:auto;">' + $("#jqxgrid_summary_not_submitted").jqxGrid('exportdata', 'html') + '</div>';
             


                var header = $('#headers').html();
                var footer = $('#footers').html();

                  $('#body_wrap').hide();

                var newWindow = window.open('', '', 'width=800, height=500'),
                document = newWindow.document.open(),
                pageContent =
                    '<!DOCTYPE html>\n' +
                    '<html>\n' +
                    '<head>\n' +
                    '<meta charset="utf-8" />\n' +
                    '<style> @media print{@page {size: Legal landscape; margin-left: 1.2in }} #body th { height:20px !important; } #body_1 td { height:20px !important; } </style>'  +
                    '</head>\n' +
                    '<body style="width: 1344px; height: 816px; margin:auto !important; font-family:calibri;">\n' + header + '\n' + gridContent_1 + '\n' + gridContent_2 + '\n' + footer + '\n</body>\n</html>';
                document.write(pageContent);
                document.close();
                 newWindow.print();
                
                    $('#body_wrap').hide();
                    $("#jqxgrid_summary").jqxGrid('showcolumn', 'date_submitted');
                    $("#jqxgrid_summary_not_submitted").jqxGrid('showcolumn', 'date_submitted');


           });



           $('#jqxprint_summary_regular').on('click',function(){

              $('#body_wrap_regular').show();

             $('#date_covered_display').html($('#display_regular_date_covered').html());

             $("#treeGrid").jqxTreeGrid('hideColumn', 'date_submitted');


                var gridContent_1 = '<div id="body" style=" width: 90%;  padding:0; margin:auto; font-size: 9px !important;">' + $("#treeGrid").jqxTreeGrid('exportData', 'html') + '</div>';
 

                var header = $('#headers_regular').html();
                var footer = $('#footers_regular').html();

                  $('#body_wrap_regular').hide();

                var newWindow = window.open('', '', 'width=800, height=500'),
                document = newWindow.document.open(),
                pageContent =
                    '<!DOCTYPE html>\n' +
                    '<html>\n' +
                    '<head>\n' +
                    '<meta charset="utf-8" />\n' +
                    '<style> @media print{@page {size: Letter Portrait; margin-top: 12in }} #body_wrap_regular table th{ border: none !important; margin: 0px !important; padding: 0px !important; font-size: 12px !important;} #body table tr td{ font-size:12px !important;  height: 15px !important;margin: 0px !important;</style>'  +
                    '</head>\n' +
                    '<body style="width: 770px; margin:auto !important; font-family:calibri;">\n' + header + '\n' + gridContent_1 + '\n' + footer + '\n</body>\n</html>';
                document.write(pageContent);
                document.close();
                 newWindow.print();
                
                    $('#body_wrap_regular').hide();

                   $("#treeGrid").jqxTreeGrid('showColumn', 'date_submitted');

           });





              if(SES_USERTYPE == 'f-admin'){
                $('#btn_edit_date_covered_jo').hide();
                $('#btn_edit_date_deadline_jo').hide();
                $('#btn_edit_date_deadline_regular').hide();
                $('#allow_jo_submit').hide();
                $('#allow_regular_submit').hide();
              }



        }); /*end document ready*/



        /*FUNCTIONS ===============================================================================================================================*/



        function generatedtrsummry_regular(info){

            //var data = postdata(BASE_URL + 'reports/getsubpap_divisions_tree_employees',info); 

            var dtr_cover_id = info['dtr_cover_id'];

              var source =
               {
                   dataType: "json",
                   dataFields: [
                      { name: 'parentid', type: 'number' },
                      { name: 'id', type: 'number' },
                      { name: 'name', type: 'string' },
                      { name: 'tardiness_undertime', type: 'string' },
                      { name: 'final_status', type: 'string' },
                      { name: 'date_submitted', type: 'string' }
                   ],
                   hierarchy:
                       {
                      keyDataField: { name: 'id' },
                      parentDataField: { name: 'parentid' }
                       },
                    url: BASE_URL + 'reports/getsubpap_divisions_tree_employees/' +dtr_cover_id

               };



            var dataAdapter_1 = new $.jqx.dataAdapter(source);



              // create jqxTreeGrid.
              $("#treeGrid").jqxTreeGrid(
              {
                  source: dataAdapter_1,
                  altRows: true,
                  editable: true,
                  exportSettings: {fileName: null},
                  ready: function () {
                      $("#treeGrid").jqxTreeGrid('expandAll');
                  },
                  columns: [
                   
                    { text: "Employee's Name", columnGroup: "MINDA", align: "center", dataField: "name", width: 500 ,editable: false},
                    { text: "STATUS", columnGroup: "MINDA", cellsAlign: "center", align: "center", dataField: "final_status", width: 170 ,editable: false},    
                    { text: '<p style="color:black; margin:0px; font-size:10px; ">REMARKS</p><p style="margin:0px;color:black;font-style:italic; font-size:10px;">(For consideration)</p>', columnGroup: "MINDA", dataField: "location", cellsAlign: "center", align: "center", width: 200 },
                    { text: "DATE SUBMITTED", columnGroup: "MINDA", dataField: "date_submitted" , cellsAlign: "center", align: "center", width: 180 ,editable: false}
                  ],
                  columnGroups:
                  [
                    { text: "MINDA", name: "MINDA", align: "center" }
                  ]
              });  


              $('#treeGrid').on('bindingComplete', function (event) { 
                  $("#treeGrid").jqxTreeGrid('expandAll');
               }); 
         



        }



        function generatedtrsummary_jo(info){

              var result = postdata(BASE_URL + 'reports/getdtrsummaryreports',info); 

              var result_not_submitted = postdata(BASE_URL + 'reports/get_dtr_summary_reportsjo_notsubmitted',info); 


              var deductions = '';

              for(i in result){
                 deductions = JSON.parse(result[i].deduction_logs);


                if (deductions != ''){

                   var tard = deductions.tardiness;
                   var unde = deductions.undertime;
                   var ps = deductions.ps;

                   for( x in ps){
                    //alert(ps[x].date_ps);
                   }

                }


              }

              console.log(result);

              $('#jqxgrid_summary').jqxGrid('clear');
              $('#jqxgrid_summary_not_submitted').jqxGrid('clear');

              if(result.length){

                //$('#btn_edit_date_deadline_jo').hide();

                if(info['is_active'] == 1){
                   $('#btn_date_covered_add_jo').show();
                }
               
                $('#btn_edit_date_covered_jo').hide();

                   var source =
                    {
                        localdata: result,
                        datatype: "json",
                         datafields:
                        [
                            { name: 'id_count', type: 'string' },
                            { name: 'f_name', type: 'string' },
                            { name: 'new_dtr_coverage', type: 'string' },
                            { name: 't_u_reports', type: 'string' },
                            { name: 'remarks', type: 'string' },
                            { name: 'services_rendered', type: 'string' },
                            { name: 'position_name', type: 'string' },
                            { name: 'office_division_name', type: 'string' },
                            { name: 'employment_type_date', type: 'string' },
                            { name: 'daily_rate', type: 'string' },
                            { name: 'date_submitted', type: 'string' },
                            { name: 'deduction_logs', type: 'string' }

                        ] 
                    };
                    var dataAdapter = new $.jqx.dataAdapter(source, {
                        loadComplete: function (data) { },
                        loadError: function (xhr, status, error) { }      
                    });


                    $("#jqxgrid_summary").jqxGrid(
                    {
                        source: dataAdapter,
                        autoheight:true,
                        editable: true,
                        selectionmode: 'checkbox',
                        width:'100%',
                        columns: [
                          { text: 'NO' , datafield: 'id_count'  ,width: 41 , editable: false, cellsalign: 'center'  , align: 'center' },
                          { text: '<span style="margin-right:20px;">NAME</span>', datafield: 'f_name' ,width: 250 ,  align: 'center' , cellsalign: 'left', editable: false},
                          { text: 'POSITION TITLE', datafield: 'position_name'  ,width: 250 ,  align: 'center' , cellsalign: 'center',editable: false},
                          { text: 'DTR COVERAGE', datafield: 'new_dtr_coverage' ,width: 220 ,  align: 'center' , cellsalign: 'center', editable: false},
                          { text: '<p style="margin:0px; font-size:10px; ">TARDINESS & UNDERTIME</p><p style="font-size:10px; ">(DD-HH-MM)</p> ', datafield: 't_u_reports' ,width: 200 ,  align: 'center' , cellsalign: 'center', editable: false},
                          { text: '<p style="margin:0px; font-size:10px; ">SERVICES RENDERED</p><p style="font-size:10px; ">(DD-HH-MM)</p>', datafield: 'services_rendered'   ,width: 200 ,   align: 'center' , cellsalign: 'center', editable: false},
                          { text: 'REMARKS', datafield: 'remarks' ,width: 210 ,   align: 'center' , cellsalign: 'center', editable: true},
                          { text: 'DATE SUBMITTED', datafield: 'date_submitted'  ,width: 200 ,   align: 'center' , cellsalign: 'center' , editable: false},
                          { text: 'DATE SUBMITTED', datafield: 'deduction_logs'  ,width: 500 ,   align: 'center' , cellsalign: 'center' , editable: false},
                          { text: 'DATE SUBMITTED', datafield: 'office_division_name'  ,width: 500 ,   align: 'center' , cellsalign: 'center' , editable: false},
                          { text: 'DATE SUBMITTED', datafield: 'employment_type_date'  ,width: 500 ,   align: 'center' , cellsalign: 'center' , editable: false},
                          { text: 'DATE SUBMITTED', datafield: 'daily_rate'  ,width: 500 ,   align: 'center' , cellsalign: 'center' , editable: false}
                        ]
                    }); 


              /* not submitted */

              }else{
                //$('#btn_edit_date_deadline_jo').show();



              if(SES_USERTYPE == 'f-admin'){
               $('#btn_edit_date_covered_jo').hide();
              }else{
                 $('#btn_edit_date_covered_jo').show();
              }


             
                if(info['is_active'] == 1){
                   $('#btn_date_covered_add_jo').hide();
                }


                   var source =
                    {
                         datafields:
                        [
                            { name: 'id_count', type: 'string' },
                            { name: 'f_name', type: 'string' },
                            { name: 'dtr_coverage', type: 'string' },
                            { name: 't_u_reports', type: 'string' },
                            { name: 'remarks', type: 'string' },
                            { name: 'services_rendered', type: 'string' },
                            { name: 'date_submitted', type: 'string' }
                        ] 
                    };
                    var dataAdapter = new $.jqx.dataAdapter(source, {
                        loadComplete: function (data) { },
                        loadError: function (xhr, status, error) { }      
                    });



                 $("#jqxgrid_summary").jqxGrid(
                 {  
                        source: dataAdapter, 
                        autoheight:true,
                        editable: true,
                        width:'100%',
                        columns: [
                          { text: 'NO'  ,width: 41 , editable: false},
                          { text: 'NAME',  width: 250  , align: 'center' , cellsalign: 'left', editable: false},
                          { text: 'POSITION TITLE'  ,width: 250 ,  align: 'center' , cellsalign: 'left',editable: false},
                          { text: 'DTR COVERAGE'  ,width: 220 ,  align: 'center' , cellsalign: 'center', editable: false},
                          { text: '<p style="margin:0px; font-size:10px; ">TARDINESS & UNDERTIME</p><p style="font-size:10px; ">(DD-HH-MM)</p> ' ,width: 200 ,  align: 'center' , cellsalign: 'center', editable: false},
                          { text: '<p style="margin:0px; font-size:10px; ">SERVICES RENDERED</p><p style="font-size:10px; ">(DD-HH-MM)</p>', width: 200 ,   align: 'center' , cellsalign: 'center', editable: false},
                          { text: 'REMARKS', width: 210 ,   align: 'center' , cellsalign: 'center', editable: true},
                          { text: 'DATE SUBMITTED',width: 200 ,   align: 'center' , cellsalign: 'center' , editable: false}
                        ]
                    });   
                }



                    $("#jqxgrid_summary").jqxGrid('hidecolumn', 'deduction_logs');
                    $("#jqxgrid_summary").jqxGrid('hidecolumn', 'office_division_name');
                    $("#jqxgrid_summary").jqxGrid('hidecolumn', 'employment_type_date');
                    $("#jqxgrid_summary").jqxGrid('hidecolumn', 'daily_rate');



              var date1 = new Date();

              var date_as_of = date1.getMonth() + '/' + date1.getDate() + '/' +  date1.getFullYear() + ' ' + date1.getHours() + ":" + date1.getMinutes();


              if(result_not_submitted.length){

                   var source_1 =
                    {
                        localdata: result_not_submitted,
                        datatype: "json",
                        datafields:
                        [
                            { name: 'id_count', type: 'string' },
                            { name: 'f_name', type: 'string' },
                            { name: 'dtr_coverage', type: 'string' },
                            { name: 't_u_reports', type: 'string' },
                            { name: 'remarks', type: 'string' },
                            { name: 'position', type: 'string' },
                            { name: 'services_rendered', type: 'string' },
                            { name: 'date_submitted', type: 'string' }
                        ] 
                    };
                    var dataAdapter_1 = new $.jqx.dataAdapter(source_1, {
                        loadComplete: function (data) { },
                        loadError: function (xhr, status, error) { }      
                    });


          
               $("#jqxgrid_summary_not_submitted").jqxGrid(
                 {    
                        source: dataAdapter_1,
                        autoheight:true,
                        editable: true,
                        width:'100%',
                        columns: [
                          { text: '<span style="margin-left:12px;"></span>'  ,width: 41 , datafield: 'id_count' ,  editable: false},
                          { text: 'NO DTR SUBMITTED AS OF', width: 250 ,  datafield: 'f_name' ,  align: 'center' , cellsalign: 'left', editable: false},
                          { text: date_as_of  ,width: 250 ,  align: 'center' , datafield: 'position' , cellsalign: 'left',editable: false},
                          { text: '<span style="margin-left:20px;"></span>'  ,width: 220 ,  align: 'center' , datafield: 'dtr_coverage' , cellsalign: 'center', editable: false},
                          { text: '<span style="margin-left:20px;"></span>' ,width: 200 ,  align: 'center' , datafield: 't_u_reports' , cellsalign: 'center', editable: false},
                          { text: '', width: 200 ,   align: 'center' , datafield: 'services_rendered' , cellsalign: 'center', editable: false},
                          { text: '', width: 210 ,   align: 'center' , datafield: 'remarks' , cellsalign: 'center', editable: true},
                          { text: '' ,width: 200 ,   align: 'center' , datafield: 'date_submitted' ,cellsalign: 'center' , editable: false}
                        ]
              }); 



              }else{

                  var datarow = {'id_count' : ' ' , 'f_name' : ' ' , 'position' : ' ' , 'dtr_coverage' : ' ' , 't_u_reports' : '' , 'services_rendered' : ' ' , 'remarks' : ' ' , 'date_submitted' : ''};
                  var commit = $("#jqxgrid_summary_not_submitted").jqxGrid('addrow', null, datarow)

              }


        }


        function getactivedtrcoverage(){

           info = {};

           info['active'] = 1;

           var result = postdata(BASE_URL + 'reports/getactivedtrcoverage',info);  

           if(result)
           {
              return result;

           }
        }

    

        function loadcoverdates(type){


            info = {};
            info['employment_type'] = type;

            var result = postdata(BASE_URL +  'reports/getdtrcoverages' , info);

            if(result){
                return result;
            }

        }



    </script>


