<?php 
	if (count($data) > 0) {
		foreach($data as $ds) {
			echo "<tr>";
				echo "<td> {$ds->name} </td>";
				echo "<td> {$ds->telnum} </td>";
				echo "<td> 
						<small class='deletecomponent' data-value='{$ds->refid}' data-tbl='reference' data-fld='refid'> DELETE </small> 
						<small class='editcomponent_ref editbtn_style' data-value='{$ds->refid}' data-tbl='reference' data-fld='refid'> EDIT </small> 
					  </td>";
			echo "</tr>";
		}
	} else {
		echo "<tr> <td> no data found </td> </tr>";
	}
?>