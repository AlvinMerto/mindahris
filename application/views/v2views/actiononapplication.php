<div class='content-wrapper'> <!-- content wrapper -->
	<section class="content"> <!-- section class content -->
      <div class='content_wrapper'>
      		<p> Action on Leave </p>
      		<ul>
      		<?php
                        $url = base_url()."action/application";
      
                        if (count($la) == 0) { echo "<i>no application</i>"; }
      			for($i=0;$i<=count($la)-1;$i++){
      				echo "<li>";
      					echo "<div class=''>";
      						echo "<p>".$la[$i]->f_name."</p>";
                                          echo "<p>".$la[$i]->leave_name." Leave</p>";
      						echo "<p>
      							  <a href='{$url}/view/{$la[$i]->leaveid}'> View </a>
      							</p>";
      					echo "</div>";
      				echo "</li>";
      			}	
      		?>
      		</ul>
      </div>
    </section>
</div>