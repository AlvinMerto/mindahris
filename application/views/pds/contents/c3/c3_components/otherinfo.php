<?php 
	if (count($data) > 0) {
		foreach($data as $d) {
			echo "<li>";
				echo $d->theinfo;
				echo "<small class='editcomponentotherinfo editbtn_style' data-value='{$d->oinfoid}' data-tbl='otherinfo' data-fld='oinfoid'> EDIT </small>";
				echo "<small class='deletecomponent' data-value='{$d->oinfoid}' data-tbl='otherinfo' data-fld='oinfoid'> DELETE </small>";
			echo "</li>";
		}
	} else {
		echo "<p> no data found </p>";
	}
?>