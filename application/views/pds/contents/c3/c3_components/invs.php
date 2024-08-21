<?php 
	if(count($data)>0) {
		foreach($data as $d) {
			echo "<tr>";
				echo "<td> {$d->org} </td>";
				echo "<td> {$d->from_} - {$d->to_} </td>";
				echo "<td> 
							<small class='deletecomponent' data-value='{$d->invid}' data-tbl='involvements' data-fld='invid'> DELETE </small> 
							<small class='editcomponent_inv editbtn_style' data-value='{$d->invid}' data-tbl='involvements' data-fld='invid'> EDIT </small> 
					  </td>";
			echo "</tr>";
		}
	} else {
		echo "<tr> <td> no data </td> </tr>";
	}
?>

<!--tr>
	<td> lorem ipsum </td>
	<td> lorem ipsum </td>
</tr-->