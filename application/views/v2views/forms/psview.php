<div style='background:#9a9a9a;'>
	<div style='max-width:532px;margin:0 auto; font-family:arial; background: #fff;'>
		<table style='width: 100%;'>
			<tr>
				<td style='text-align: center;'>
					<div>
						<div>
							<div>
								<img src='<?php echo base_url(); ?>assets/images/minda_logo.png' style='width: 115px;'/>
							</div>
						</div>
						<p style='color: #e28427; font-size: 31px; font-weight: bold;'> ATTENTION!!! </p>
						<hr style='height: 0px; border: 0px; border-top: 1px solid #d4d4d4; margin-bottom: 30px;'/>
						<table style='width: 100%;'>
							<tr>
								<td style='text-align:right; min-width:50px; padding:5px;'> Pass slip date: </td>
								<td style='text-align:left; padding-left:10px; color:#e28427; font-weight:bold; padding:5px;'> <?php echo $date; ?> </td>
							</tr>
							<tr>
								<td style='text-align:right; min-width:50px; padding:5px;'> Time Out: </td>
								<td style='text-align:left; padding-left:10px; color:#e28427; font-weight:bold; padding:5px;'> <?php echo $timeout; ?> </td>
							</tr>
							<tr>
								<td style='text-align:right; min-width:50px; padding:5px;'> Time In: </td>
								<td style='text-align:left; padding-left:10px; color:#e28427; font-weight:bold; padding:5px;'><?php echo $timein; ?> <span style='color:red; font-weight:normal;font-style: italic;'> (Did not return) </span> </td>
							</tr>
						</table>
						
						<p style='line-height: 26px; width: 70%; margin: 50px auto; color: #929292;'> You don't need to do anything, but if you find your time in wrong, please inform the HR. </p>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>