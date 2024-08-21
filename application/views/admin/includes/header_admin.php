<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    


    <title>MinDA HRMIS</title>

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/rsz_mindata_icon.png" />
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="<?php echo base_url(); ?>assets/dist/css/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- jQWidgets CSS -->

    <link href="<?php echo base_url(); ?>assets/jqwidgets/styles/jqx.base.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/jqwidgets/styles/jqx.bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jqwidgets/styles/jqx.base.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" />


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/jquery-1.11.1.min.js"></script>


	<!-- JQWIDGETS -->

    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/mindata.js"></script>
 	<script src="<?php echo base_url(); ?>assets/js/md5.js"></script>


    <script src="//js.pusher.com/2.2/pusher.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pushernotifier.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-notify.min.js"></script>


	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxcore.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxdata.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxbuttons.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxscrollbar.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxmenu.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxlistbox.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxdropdownlist.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxgrid.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxgrid.selection.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxgrid.columnsresize.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxgrid.filter.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxgrid.sort.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxcheckbox.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxgrid.pager.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxgrid.grouping.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxdropdownbutton.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxnumberinput.js"></script> 


    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxgrid.export.js"></script> 
 

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxdatatable.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxtreegrid.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxdata.export.js"></script> 


    


    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxloader.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxpopover.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxtooltip.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/globalization/globalize.js"></script>



    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxcombobox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqwidgets/jqxfileupload.js"></script>

   <!-- JQWIDGETS -->

    <script type="text/javascript">
/*
        $(function() {
            var pusher = new Pusher('569cc4a878a4b1de8ddc');
            var channel = pusher.subscribe('my_notifications');
            var notifier = new PusherNotifier(channel);
        });*/

    </script>



</head>

<body>

    <div id="wrapper">

