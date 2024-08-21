<html>
	<head>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
		<title> Minda Calendar </title>
		<style>
			* {
				font-family: 'Noto Sans TC', sans-serif;
			}
			body {
				margin:0px 0px 0px 0px;
				overflow: hidden;
			}

			ul {
				padding: 0px;
				font-size: 15px;
				line-height: 24px;
				list-style: none;
				margin-top:0px;
			}

			a {
				text-decoration: none;
			}

			ul li {
				border-top: 1px solid #ccc;
				border-bottom: 1px solid #ccc;
				margin-bottom: -1px;
				padding: 7px 0px 7px 9px;
				font-size: 12px;
				color: #000;
				
				transition: background .3s;
				-webkit-transition: background .3s;
				-moz-transition: background .3s;
				-o-transition: background .3s;
			}

			ul li:hover {
				cursor: pointer;
				background:#dfdfdf !important;
			}

			h5 {
				margin-bottom: 5px;
				font-size: 17px;
				font-family: calibri;
				padding-left: 7px;
				margin-top: 0px;
			}

			p.consol {
				text-align: center;width: 80%;margin: auto;padding: 15px 9px;background: #ef3828;color: #fff;border-radius: 55px;font-size: 13px;
			}

			p.consol:hover {
				cursor: pointer;
				background: red;
			}

			.nocalendar {
				background: red;
				color: #fff;
				padding: 3px 8px;
				border-radius: 99px;
				text-align: center;
				margin-right: 8px;
				float: left;
				width: 8px;
				height: 19px;
				overflow: hidden;
			}

			.nocalendar:hover {
				width: auto;

				transition: -width 1s;
				-webkit-transition: -width 1s;
				-moz-transition: -width 1s;
				-o-transition: -width 1s;
			}
			
			.disabled {
				background: #bbbbbb;
				color: #a09e9e;
				border-bottom: 2px solid #b5b5b5 !important;
				cursor: auto !important;
				text-shadow: 0px 1px 0px #ccc;
			}
			
			.headerli {
				
			}
			
			.headerli h4{
				margin: 0px;
			}
			
			.leftnavs {
				height: 100%; 
				overflow:hidden;
			}
			
			.leftnavs:hover {
				overflow-y:auto;
			}
		</style>
	</head>
	<body>
		<div class='' style='display: inline-block; float: left; width: 14%; height: 100%;'>
			<div class="leftnavs"> 
				<div style='width: 100%; vertical-align: middle; /*margin: 3px 28% 16px;*/ overflow: hidden; padding-left: 8px;'>
					<img src='<?php echo base_url(); ?>assets/images/minda_logo.png' style='width:26%;float: left;margin-top: 7px;'/>
					<p style='float: left;width: 54%;font-size: 17px;margin: 0px 0px 0px 11px;color: #716d6d;line-height: 26px;'> Mindanao Development Authority </p>
				</div>
				<!--hr style='border: 0px; height: 0px; border-bottom: 1px solid #ccc; width: 86%; border-color: #dcdcdc; margin-top: 20px;'/>
				<a href='<?php // echo base_url(); ?>minda/calendar'> <p class="consol"> Consolidated </p> </a-->
				<hr style='border: 0px; height: 0px; border-bottom: 1px solid #ccc; width: 86%; border-color: #dcdcdc; margin-top: 10px;'/>
				<h5> Calendars </h5>
				<ul>
					<li class='headerli'> <h4> Executive </h4> </li>
						<a href='#'><li class='disabled'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Office of the Chairman </li></a>
						<a href='#'><li class='disabled'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Office of the Executive Director </li></a>
						<a href='#'><li class='disabled'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Office of the Deputy Executive Director </li></a>
					<li class='headerli'> <h4> PPPDO </h4> </li>
						<a href='<?php echo base_url(); ?>/minda/calendar/PRD'><li style='background:#009385;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Planning and Research Division </li></a>
						<a href='<?php echo base_url(); ?>/minda/calendar/PDD'><li style='background:#06bbaa;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Project Development Division </li></a>
						<a href='#'><li class='disabled'> <!-- 18e4d1 --> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Policy Formulations Division </li></a>
						<a href='<?php echo base_url(); ?>/minda/calendar/KMD'><li style='background:#73f7ea;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Knowledge Management Division </li></a>
					<a href='<?php echo base_url(); ?>/minda/calendar/OFAS'> <li class='headerli'> <h4> OFAS </h4> </li> </a>
						<a href='<?php echo base_url(); ?>/minda/calendar/FD'><li style='background:#D7135B;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Finance Division </li></a>
						<a href='#'><li class='disabled'> <!-- b90e4d -->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Administrative Services Division </li></a>
						<a href='#'><li class='disabled'> <!-- 9c093f --> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Human Resource Division </li></a>
					<li class='headerli'> <h4> IPPAO </h4> </li>
						<a href='<?php echo base_url(); ?>/minda/calendar/IPD'><li style='background:#EF6A00;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Investment Promotions Division </li></a>
						<a href='<?php echo base_url(); ?>/minda/calendar/IRD'><li style='background:#bb5606;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; International Relations Division </li></a>
						<a href='<?php echo base_url(); ?>/minda/calendar/MPMC'><li style='background:#8e4103;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MPMC </li></a>
						<a href='#'><li class='disabled'> <!-- 6f370a --> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MCT </li></a>
						<a href='<?php echo base_url(); ?>/minda/calendar/PuRD'><li style='background:#582d0a;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Public Relations Division </li></a>
					<li class='headerli'> <h4> AMO </h4> </li>
						<a href='<?php echo base_url(); ?>/minda/calendar/AMO_NM'><li style='background:#BFC92F;'> AMO Northern Mindanao </li></a>
						<a href='<?php echo base_url(); ?>/minda/calendar/AMO_NEM'><li style='background:#a9b321;'> AMO Northeastern Mindanao </li></a>
						<a href='<?php echo base_url(); ?>/minda/calendar/AMO_SCM'><li style='background:#8a921d;'> AMO South Central Mindanao </li></a>
						<a href='<?php echo base_url(); ?>/minda/calendar/AMO_WM'><li style='background:#666b12;'> AMO Western Mindanao </li></a>
						
					<!--a href='#'><li class='disabled'> <!--div class='nocalendar'> ! <span> no calendar </span> </div> Office of Policy, Planning and Project Development </li></a-->
					<!--a href='#'><li class='disabled'> <!--div class='nocalendar'> ! <span> no calendar </span> </div> Office of Area Concerns Project Management </li></a-->
					<!--a href='<?php // echo base_url(); ?>/minda/calendar/OFAS'><li style='background:#744F41;'> Office of Finance and Administrative Services </li></a-->
				</ul>
			</div>
		</div>
		<div class='' style='display: inline-block; width: 86%; height: 100%; float: left;'>
			
			<iframe src="<?php echo $thecal; ?>" style="border:solid 1px #777" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>

		</div>
	</body>
</html>
