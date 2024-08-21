<?php 
	echo "<ul>";
	
		echo "<li>";
			echo "<p class='divclick' data-special='true' data-divid='{$offid}'> Personnel Under this office </p>";
			echo "<span id='div_{$offid}_spl'></span>";
		echo "</li>";
			
		foreach($d as $dd) {
			echo "<li>";
				echo "<p class='divclick' data-divid='{$dd->Division_Id}'>".$dd->Division_Desc."</p>";
				echo "<span id='div_{$dd->Division_Id}'></span>";
			echo "</li>";
		}
	echo "</ul>";
?>