<?php
	$caption = null;
	switch($adds[0]) {
		case "college":
			$caption = "College";
			break;
		case "elementary":
			$caption = "Elementary";
			break;
		case "gradstud":
			$caption = "Graduate Studies";
			break;
		case "secondary":
			$caption = "Secondary";
			break;
		case "voctrd":
			$caption = "Vocational / Trade Course ";
			break;
	}
	
//	var_dump($data);
?>
<p> List of <?php echo $caption; ?> </p>
	<?php if (count($data)>0) { ?>
		<ul>
			<?php
				foreach($data as $d) {
					echo "<li>";
						echo $d->nameofsch;
						echo "<small class='editcomponent' data-value='{$d->ebid}' data-tbl='educbg' data-fld='ebid'>  EDIT </small>";
						echo "<small class='deletecomponent' data-value='{$d->ebid}' data-tbl='educbg' data-fld='ebid' style='margin-left:10px;'> DELETE </small>";
					echo "</li>";
				}
			?>
		</ul>
	<?php } else { ?>
		<p> no data found </p>
	<?php } ?>