<?php 
//var_dump($data);
	if (count($data) > 0) {
		echo "<ul>";
			foreach($data as $d) {
				echo "<li>";
					echo $d->etype;
					echo "<small class='editcomponenteligs editbtn_style' data-value='{$d->eid}' data-tbl='eligibility' data-fld='eid' style='margin:0px 12px;'> EDIT </small>";
					echo "<small class='deletecomponent' data-value='{$d->eid}' data-tbl='eligibility' data-fld='eid'> DELETE </small>";
				echo "</li>";
			}
		echo "</ul>";
	} else {
		echo "<p> no data found </p>";
	}
?>