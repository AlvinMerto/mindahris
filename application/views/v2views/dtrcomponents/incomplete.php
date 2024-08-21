<?php 
	
	// echo $incoms;
	
?>
	<style>
		.incomplete_window p {
			margin:0px;
		}
		
		.mastheadtxt {
			padding: 12px;
			background: #fff;
			font-size: 16px;
			text-align: center;
			font-weight: bold;
			color: #d41c1c;
			/*box-shadow: 0px 1px 3px #989595; */
			border-bottom: 1px dashed;
		}
		
		.box-div {
			    padding: 11px 20px;
		}
		
		.box-div .head{
			
		}
		
		.box-div .body{
			font-size: 18px;
			font-weight: bold;
		}
		
		.boldit {
			font-weight:bold;
		}
		
		.footerp {
			padding: 10px;
			background: #c7c7c7;
			border-top: 1px solid #afafaf;
			text-align:center;
		}
	</style>
	<div class='incomplete_window'>
		<p class='mastheadtxt'> Please settle the dates with incomplete time logs </p>
		
		<div class='box-div'>
			<p class='head'> Deadline of submission </p>
			<p class='body'> <i class="fa fa-angle-right boldit" aria-hidden="true"></i> 
				<?php 
					if (isset($check[0]->date_deadline)) {
						echo date("F d, Y", strtotime($check[0]->date_deadline)); 
					} else {
						echo "-- not set --";
					}
				?> 
			</p>
		</div>
		<div class='box-div'>
			<p class='head'> Number of dates with incomplete time logs </p>
			<p class='body'> <i class="fa fa-angle-right boldit" aria-hidden="true"></i> <?php echo $incoms; ?> </p>
		</div>
		
		<p class='footerp'> settle your dtr first before sending it. </p>
	</div>