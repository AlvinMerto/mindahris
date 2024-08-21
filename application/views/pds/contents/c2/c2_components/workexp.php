<?php 
	if (count($data)>0) {
		foreach($data as $d) {
			$from_ = date("M. d, Y",strtotime($d->from_));
			$to_   = date("M. d, Y",strtotime($d->to_));
			
			if ($d->to_ == "present") {
				$to_ = "present";
			}
			
			echo "<tr>";
				echo "<td> {$d->postitle} </td>";
				echo "<td> {$d->from_} - {$d->to_} </td>";
				echo "<td>";
					echo "<small class='deletecomponent' data-value='{$d->weid}' data-tbl='workexp' data-fld='weid' style='margin-right:5px;'> DELETE </small>";
					echo "<small class='editcomponent_work editbtn_style' data-value='{$d->weid}' data-tbl='workexp' data-fld='weid'> EDIT </small>";
				echo "</td>";
				// echo "<td> <small class='deletecomponent' data-value='{$d->weid}' data-tbl='workexp' data-fld='weid'> DELETE </small> </td>";
				// echo "<td> <small class='editcomponent_work' data-value='{$d->weid}' data-tbl='workexp' data-fld='weid'> EDIT </small> </td>";
			echo "</tr>";
		}
	}
?>