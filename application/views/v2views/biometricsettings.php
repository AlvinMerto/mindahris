<div class="content-wrapper">
	<section class="content">
        <h3> Biometric Device Settings </h3>
   
	<div class='overall_wrap'>
		<div class='area_select'>
			<table>
				<tbody id='tbodyfields'>
				<?php 
					for($i=0;$i<=count($areas)-1;$i++) {
						echo "<tr>";
							echo "<td>";
								echo $areas[$i]->area_name;
							echo "</td>";
							echo "<td>";
								echo "<input type='text'
											 value='{$areas[$i]->ipaddress}' 
											 class='ipclass' 
											 id='ip_id_{$i}'
											 data-area_code='{$areas[$i]->area_code}'
											 />";
								echo "<input type='button' value='-' title='Delete Device' class='delete_area' data-ar_code = '{$areas[$i]->area_code}'/>";
								echo "<input type='button' value='Test Connectivity' class='testconn' data-ar_code_test = '{$areas[$i]->area_code}' data-show_id = 'test_area_show_{$i}'/>";
								echo "<span id='test_area_show_{$i}' style='margin-left: 20px;'></span>";
							echo "</td>";
						echo "</tr>";
					}
				?>
				</tbody>
				<tbody>
					<tr>
						<td> </td>
						<td>
							<input type='button' value='+' id='addfield'/>
							<input type='submit' value='Save' id='savebtn_bio'/> 
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
    </section>

</div>  