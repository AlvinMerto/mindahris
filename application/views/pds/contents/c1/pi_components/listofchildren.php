<?php 
 // var_dump($data);
	foreach($data as $d) {
		/*
		echo "<li>";
			echo $d->childname;
				echo " -   ";
			echo "<i>". date("F d, Y", strtotime($d->childbdate))."</i>";
			echo "<i class='fa fa-times closeright' aria-hidden='true' data-childid='{$d->childid}'></i>";
		echo "</li>";
		*/
		$bdate = date("F d, Y", strtotime($d->childbdate));
		echo "<tr>";
			echo "<td> {$d->childname} </td>";
			echo "<td> {$bdate} </td>";
			echo "<td> 
					<small class='deletecomponent' data-value='{$d->childid}' data-tbl='children' data-fld='childid'> DELETE </small>
					&nbsp;
					<small class='editcomponent_listofchildren' data-value='{$d->childid}' data-tbl='children' data-fld='childid'> EDIT </small>
				  </td>";
		echo "</tr>";
	}
?>
