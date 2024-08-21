<?php 
	if (count($data) >0) {
		foreach($data as $d) {
			echo "<tr>";
				echo "<td> {$d->issuedid} </td>";
				echo "<td> {$d->idnum} </td>";
				echo "<td> 
						<small class='deletecomponent' data-value='{$d->ididnum}' data-tbl='identification' data-fld='ididnum'> DELETE </small> 
						<small class='editcomponent_ids editbtn_style' data-value='{$d->ididnum}' data-tbl='identification' data-fld='ididnum'> EDIT </small> 
					  </td>";
			echo "</tr>";
		}
	} else {
		echo "<tr> <td> no data found </td> </tr>";
	}
?>