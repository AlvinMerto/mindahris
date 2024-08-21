<html>
	<head>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'/>
		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'/>
		<link rel='stylesheet' href='<?php echo base_url(); ?>/v2includes/style/pdsadminstyle.css'/>
		<script>
			var url = '<?php echo base_url(); ?>';
		</script>
		
		<title> PDS Administrative Panel </title>
	</head>
	<body>
	<div class='row' style='height:100%;'>
		<!--div class='col-md-2 navigation removemargin'>
			navigation
		</div-->
		<div class='col-md-12 removemargin'>
			<div class='col-md-12 fixedheight'>
				<button id='filterbtn'> Filter </button>
				<div class='filterbox'> 
					<i class="fa fa-times" aria-hidden="true" style='float: right; cursor:pointer;' id='closewindow'></i>
					<hr/>
					<p> <b> Filtering per Seminar Attended </b> </p>
					<table>
						<tr>
							<td> 
								Position Type
							</td>
							<td> 
								<select id='positiontype'>
									<option value='raf'> Rank-and-file</option>
									<option value='cau'> Chief and Up </option>
								</select>
							</td>
						</tr>
						<tr>
							<td> Type of LD </td>
							<td> 
								<select id='typeofld'> 
									<option> All </option>
									<option> Supervisory </option>
									<option> Managerial </option>
									<option> Technical </option>
									<option> Others </option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								Inclusive Dates
							</td>
							<td>
								<input type='date' id='from_'/>
								<input type='date' id='to_'/>
							</td>
						</tr>
					</table>
					<hr/>
					<table>
						<tr> <th> Additional Filter </th> </tr>
						<tr>
							<td> <input type='checkbox' id='ebgrnd'/> <label for='ebgrnd'> Educational Background </label> </td>
						</tr>
						<!--tr>
							<td> <input type='checkbox' id='taded'/> <label for='taded'> Trainings Attended </label> </td>
						</tr-->
						<tr>
							<td> <input type='checkbox' id='oskil'/> <label for='oskil'> Other Skills </label> </td>
						</tr>
					</table>
					<hr/>
					<button id='applyfilter' class='btn btn-primary'> Apply </button>
				</div>
			</div>
			<div class='col-md-12'>
				<div class='result' id='result'>
					
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src='<?php echo base_url(); ?>/v2includes/js/pdsadminprocs.js'></script>
	</body>
</html>