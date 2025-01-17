        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">MinDA HRMIS <?php echo '-  ('.$this->session->userdata('area_name').') '?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="">

                        <?php 

                            $employee_image = $this->session->userdata('employee_image');
                            if($employee_image){
                                $image_url = base_url().'/assets/profiles/'.$employee_image;
                            }else{
                                 $image_url =  base_url().'/assets/images/userImage.gif';
                            }
                        ?>
                      <span>  <?php echo $this->session->userdata('username'); ?>  </span>
                            <img style=" max-height: 25px;" class="img-circle" src="<?php echo $image_url; ?>" alt=""><i class="caret"></i></a>
                    </a>


                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>accounts/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->



            <?php 

            $usertype = $this->session->userdata('usertype');


            $display_1 = 'style="display:none;"';

         
        
            ?>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>

                        <li <?php  if($usertype == 'admin'){ echo 'style="display:none;"'; }else if ($usertype == 'user'){  echo 'style=""'; }else if ($usertype == 'f-admin'){  echo 'style=""'; } ?> >
                        <a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
    
                        <li <?php  if($usertype == 'admin'){ echo 'style="display:none;"'; }else if ($usertype == 'user'){  echo 'style=""'; } else if ($usertype == 'f-admin'){  echo 'style=""'; } ?> >
                            <a href="<?php echo base_url(); ?>personnel/profile"><i class="fa fa-user fa-fw"></i> My Profile</a>
                        </li>
                        <li  <?php if($usertype == 'admin'){ echo 'style="display:none;"'; }else if ($usertype == 'user'){  echo 'style=""'; } else if ($usertype == 'f-admin'){  echo 'style=""'; }?> >
                            <a href="<?php echo base_url(); ?>reports/dtr"><i class="fa fa-files-o fa-fw"></i> My Daily Time Records</a>
                        </li>
                        <li  <?php if($usertype == 'admin'){ echo 'style="display:none;"'; }else if ($usertype == 'user'){  echo 'style=""'; } else if ($usertype == 'f-admin'){  echo 'style=""'; }?> >
                            <a href="<?php echo base_url(); ?>leaveadministration/ledger"><i class="fa fa-edit fa-fw"></i> My Leave Ledger</a>
                        </li>
                        <li  <?php if($usertype == 'admin'){ echo 'style="display:none;"'; }else if ($usertype == 'user'){  echo 'style=""'; } else if ($usertype == 'f-admin'){  echo 'style=""'; }?> >
                            <a href="<?php echo base_url(); ?>reports/applications"><i class="fa  fa-file-o  fa-fw"></i> My Applications</a>
                        </li>

                        <?php if($this->session->userdata('position_name') == 'Security') { ?>
                         <li  <?php if($usertype == 'admin'){ echo 'style="display:none;"'; }else if ($usertype == 'user'){  echo 'style=""'; } else if ($usertype == 'f-admin'){  echo 'style=""'; }?> >
                            <a href="<?php echo base_url(); ?>monitoring/dashboard"><i class="fa  fa-file-o  fa-fw"></i> Monitoring AMS/PS</a>
                        </li>

                        <?php } ?>

 



                        <li  <?php  if($usertype == 'admin'){ echo 'style=""'; }else if ($usertype == 'user'){  echo 'style="display:none;"'; } else if ($usertype == 'f-admin'){  echo 'style="display:none;"'; } ?> >
                        <a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li <?php  if($usertype == 'admin'){ echo 'style=""'; }else if ($usertype == 'user'){  echo 'style="display:none;"'; } else if ($usertype == 'f-admin'){  echo 'style="display:none;"'; } ?> >
                            <a href="<?php echo base_url(); ?>personnel"><i class="fa fa-user fa-fw"></i> Personnel <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>personnel/areas">Areas</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>personnel/officedivision">Offices & Divisions</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>personnel/position">Positions</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>personnel/employee">Employees</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->                          
                        </li>
                        <li <?php  if($usertype == 'admin'){ echo 'style=""'; }else if ($usertype == 'user'){  echo 'style="display:none;"'; } else if ($usertype == 'f-admin'){  echo 'style="display:none;"'; }?> >
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Attendance<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>attendance/importdata">Import Attendance Checking Data</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>attendance/attrecord">Attendance Log</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>attendance/shiftmanagement">Shift Management</a>
                                </li>                                  
                                <li>
                                    <a href="<?php echo base_url(); ?>attendance/employeeschedule">Employee Schedule</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li <?php  if($usertype == 'admin'){ echo 'style=""'; }else if ($usertype == 'user'){  echo 'style="display:none;"'; } else if ($usertype == 'f-admin'){  echo 'style=""'; } ?>>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li <?php  if($usertype == 'admin'){ echo 'style=""'; }else if ($usertype == 'user'){  echo 'style="display:none;"'; } else if ($usertype == 'f-admin'){  echo 'style="display:none;"'; } ?>>
                                    <a href="<?php echo base_url(); ?>reports/dtr">Daily Time Records</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>reports/summary">Summary Reports</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li <?php  if($usertype == 'admin'){ echo 'style="display:none;"'; }else if ($usertype == 'user'){  echo 'style="display:none;"'; } else if ($usertype == 'f-admin'){  echo 'style="display:none;"'; } ?>>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Pass slip</a>
                                </li>
                                <li>
                                    <a href="#">PAF</a>
                                </li>
                            </ul>                            
                        </li>
                        <li <?php  if($usertype == 'admin'){ echo 'style=""'; }else if ($usertype == 'user'){  echo 'style="display:none;"'; } else if ($usertype == 'f-admin'){  echo 'style="display:none;"'; } ?>>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Leave Administration<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Leave List</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>leaveadministration/ledger">Leave Ledger</a>
                                </li>                                
                                <li>
                                    <a href="<?php echo base_url(); ?>leaveadministration/holidays">Holidays</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li <?php  if($usertype == 'admin'){ echo 'style=""'; }else if ($usertype == 'user'){  echo 'style="display:none;"'; } else if ($usertype == 'f-admin'){  echo 'style="display:none;"'; } ?>>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> System<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>systemsettings/databases">Database Settings</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>systemsettings/importexport">Import/Export Settings</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


