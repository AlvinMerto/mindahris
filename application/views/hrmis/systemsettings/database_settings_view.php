      <div class="content-wrapper">

           <section class="content-header">
            <h1>
                Database Settings
            </h1>
            <ol class="breadcrumb">
               <li class="active"><img style="margin-top:-14px;" src="<?php echo base_url();?>assets/images/minda/rsz_1minda_logo_text.png" /></li>
            </ol>
         </section>

         <section class="content">
           <div class="row">
             <div class="col-md-6">
               <div class="box">
                   <div class="box-header with-border">
                      <h3 class="box-title">Select Database</h3>
                      <div class="box-tools pull-right">
                         <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                      <div class="row">

                         <div class="col-md-4">
                             <div class="form-group">
                              <select id="btn_select_db" class="form-control">
                                <option value="sqlserver" >Production (Live)</option>
                                <option value="sqlserver_staging" >Staging </option>
                              </select>
                            </div>
                         </div>
                         <div class="col-md-12">
                            <?php
                            
                             echo "<pre/>";
                             print_r($this->session->userdata());
                            ?>
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
    var SESSION_DB = '<?php echo $get_database; ?>';

        $(document).ready(function (){

             $('#btn_select_db').val(SESSION_DB);

              $( "#btn_select_db" ).change(function() {
                    info['database'] = $(this).val();
                    var set_database = postdata(BASE_URL + 'systemsettings/setdatabase' , info);

                    if(set_database){
                      location.reload();
                    }
              });

        });



</script>