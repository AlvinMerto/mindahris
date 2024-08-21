<html>
	<head>
		<title> Minda - Online Personal Data Sheet </title>

		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'/>
		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'/>
		<link rel='stylesheet' href='<?php echo base_url(); ?>/v2includes/pds/style/style.css'/>
		<script>
			var url = '<?php echo base_url(); ?>';
		</script>
	</head>
	<body>
		<div class='bodywrap'>
			<div class='innerwrap'>
			<?php
				$this->load->model("pdsmodel/Mainprocs");
				$id = $this->Mainprocs->get_pidn();
				
				if ($id == null) {
					echo "<p style='margin: 0px 0px -4px 0px; text-align: center; padding: 10px; background: #ffcaca;'> YOUR LOG IN HAS EXPIRED </p>";
				}
			?>