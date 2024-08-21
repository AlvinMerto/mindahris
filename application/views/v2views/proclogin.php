<?php 
	$this->load->view("hrmis/includes/header");
?>
<style>
	body {
		background: #cecaca;
	}
	
	.wrapper {
		    overflow: visible;
	}
</style>
<div class='unlockpagediv'>
	<p class='confiden'> Please confirm your identity. </p>
	<form method='post'>
		<table class='tblform'>
			<tr>
				<td> <p> username </p> </td>
				<td> <input type='password' name='username'/> </td>
			</tr>
			<tr>
				<td> <p> password </p> </td>
				<td> <input type='password' name='password'/> </td>
			</tr>
			<!--tr>
				<td> &nbsp; </td>
				<td> <input type='submit' value='Unlock Page' class='btn btn-primary'/> </td>
			</tr-->
		</table>
		<div class='inputboxconf'>
			<input type='submit' value='Unlock Page' class='btn btn-primary' name='unlock'/>
		</div>
	</form>
</div>