<!--div class="content-wrapper" style='margin-left: 230px !important; padding-top: 0px;'>
	<section class="content" style='padding:0px; min-height: inherit;'>
		<div class='the_wrap_div'>
			<div class='theleft_wrap'>
				<ul id='thedivision'>
						<!--li data-divid='0'> <p> Office of the Chairperson </p> </li-->
					<?php 
						/*
						foreach($divs as $ds) {
							echo "<li data-divid='{$ds->Division_Id}'> <p> ".$ds->Division_Desc."</p> </li>";
						}
						*/
					?>
				<!--/ul>
			</div>
			<div class='theright_wrap'>
				<h5> Approved Daily Time Records (DTR) </h5>
				<ul id='thelist'>
					<!--li>
						<h4> Alvin Merto </h4>
						<p> 
							<span class='dtr_coverage'> 8/1/2017 - 8/31/2017 </span>
							<span class='emp_class'> JO </span>
							<span class='viewlink' data-empid='50'> view </span>
						</p>
					</li>
					<li>
						<h4> Alvin Merto </h4>
						<p> 
							<span class='dtr_coverage'> 8/1/2017 - 8/31/2017 </span>
							<span class='emp_class'> JO </span>
							<span class='viewlink' data-empid='50'> view </span>
						</p>
					</li-->
				<!--/ul>
			</div>
			<div class='rightmost_div' id='dtrloadhere'>
				<p class='loadhere'> load here </p>
			</div>
		</div>
	</section>
</div-->

<div class="content-wrapper" style='margin-left: 230px !important; padding-top: 0px;'>
	<section class="content" style='padding:0px; min-height: inherit;'>
		<div class='the_wrap_div'>
			<h3> DTR: For approval </h3>
			<ul id='thedivision'>
				<!--li data-divid='0'> <p> Office of the Chairperson </p> </li-->
				<?php 		
					foreach($divs as $ds) {
						echo "<li data-divid='{$ds->Division_Id}'> <p> ".$ds->Division_Desc."</p> </li>";
					}
						
				?>
			</ul>
			
			<ul id='thelist'>
				<!--li>
					<h4> Alvin Merto </h4>
					<p> 
							<span class='dtr_coverage'> 8/1/2017 - 8/31/2017 </span>
							<span class='emp_class'> JO </span>
							<span class='viewlink' data-empid='50'> view </span>
						</p>
					</li>
					<li>
						<h4> Alvin Merto </h4>
						<p> 
							<span class='dtr_coverage'> 8/1/2017 - 8/31/2017 </span>
							<span class='emp_class'> JO </span>
							<span class='viewlink' data-empid='50'> view </span>
						</p>
					</li-->
				</ul>
				<div class='rightmost_div' id='dtrloadhere'>
					<p class='loadhere'> load here </p>
				</div>
		</div>
	</section>
</div>