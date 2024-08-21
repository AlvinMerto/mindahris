<title> Welcome to Minda - Applicants Portal </title>
<div class='logindiv'>
	<h2> Welcome </h2>
	
	<?php if (!isset($forgotpass)) { ?>
	<h6 style='text-align:center;'> please login to continue </h6>
	<div class='logininputs'>
		<form method="post">
		<div class="form-floating mb-3">
		  <input type="email" class="form-control" id="floatingInput" placeholder="" name='email' required='required'>
		  <label for="floatingInput">Email address</label>
		</div>
		<div class="form-floating mb-3">
		  <input type="password" class="form-control" id="floatingInput" placeholder='' name='password' required='required'>
		  <label for="floatingInput">Password</label>
		</div>
		
		<hr style='width:70%; margin:30px auto;'/>
		
		<?php if (!isset($signup)): ?>
		<?php 
			if ($msg != null) {
				echo "<p class='su_wrong'> {$msg} </p>";
			}
		?>
			<p style='text-align:center;'> <input type='submit' class='btn btn-primary' style='width:50%;' value='Login' name='logbtn'> </p>
			<br/>
			<h6 style='text-align:center;'> need account? <a href='<?php echo base_url(); ?>applicants/signup'> sign up </a> </h6>
		<?php endif; ?>
		
		<?php if (isset($signup)): ?>
			<?php 
				if ($stat == true) {
					echo "<p class='su_correct'> {$msg} </p>";
				} else if ($stat == false && $msg != null) {
					echo "<p class='su_wrong'> {$msg} </p>";
				}
			?>
			<p style='text-align:center;'> <input type='submit' class='btn btn-secondary' style='width:50%;' value='Sign me up' name='upbtn'> </p>
			<br/>
			<h6 style='text-align:center;'> has an account? <a href='<?php echo base_url(); ?>applicants/login'> login </a> </h6>
		<?php endif; ?>
		</form>
		<p style='text-align:center;'> <a href='<?php echo base_url(); ?>applicants/forgotpassword'>forgot password</a> </p>
	</div>
	
		
	<?php } else { ?>
		<br/>
		<div class=''>
			<form method='post'>
				<div class="form-floating mb-3">
				  <input type="email" class="form-control" id="floatingInput" placeholder='' name='email_forgot' required='required'>
				  <label for="floatingInput">email</label>
				</div>
				<input type='submit' value='send to email' name='forgot_btn' class='btn btn-secondary'/>
			</form>
			<p> <?php echo $msg; ?> </p>
			<hr/>
			<h6 style='text-align:center;'> has an account? <a href='<?php echo base_url(); ?>applicants/login'> login </a> |  need account? <a href='<?php echo base_url(); ?>applicants/signup'> sign up </a></h6>
		</div>
	<?php } ?>
</div>