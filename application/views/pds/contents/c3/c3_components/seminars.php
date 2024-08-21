<?php 
	if (count($data)>0) {
		foreach($data as $d) {
			$from_ = date("M. d, Y",strtotime($d->from_));
			$to_ = date("M. d, Y",strtotime($d->to_));
			echo "<tr>";
				echo "<td> {$d->titleofprog} </td>";
				//echo "<td> {$from_} - {$to_} </td>";
				echo "<td> 
						<small class='deletecomponent' data-value='{$d->semid}' data-tbl='seminars' data-fld='semid'> DELETE </small> 
						<small class='editcomponent_sems editbtn_style' data-value='{$d->semid}' data-tbl='seminars' data-fld='semid'> EDIT </small> 
					</td>";
			echo "</tr>";
		}
	} else {
		echo "<tr> <td> no data found </td> </tr>";
	}
?>