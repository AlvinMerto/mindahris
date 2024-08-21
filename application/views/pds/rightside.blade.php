<?php
	$c1 = $c2 = $c3 = $c4 = $home = null;

	switch ($bigtab) {
		case 'c1':
			$c1 = "selectednavli";
			break;
		case "c2":
			$c2 = "selectednavli";
			break;
		case "c3":
			$c3 = "selectednavli";
			break;
		case "c4":
			$c4 = "selectednavli";
			break;
	}
	
	if ($bigtab == null) {
		$home = "selectednavli";
	}

?>

<ul>
	<?php 
		if($notloggedin == false) { ?>
		<a href='<?php base_url(); ?>/pds'> <li class='<?php echo $home; ?>'> <i class="fa fa-home" style="font-size: 20px;padding-top: 1px;" aria-hidden="true"></i> </li> </a>
		<a href='<?php base_url(); ?>/pds/c1/personalinformation'> <li class='<?php echo $c1; ?>'> C1 </li> </a>
		<a href='<?php base_url(); ?>/pds/c2/eligibility'> <li class='<?php echo $c2; ?>'> C2 </li> </a>
		<a href='<?php base_url(); ?>/pds/c3/involvement'> <li class='<?php echo $c3; ?>'> C3 </li> </a>
		<a href='<?php base_url(); ?>/pds/c4/questionnaire'> <li class='<?php echo $c4; ?>'> C4 </li> </a>
	<?php } ?>
</ul>
