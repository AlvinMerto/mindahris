<h6 class='headertext'> Other Information </h6>
<hr/>

<div class='row'>
	<div class='col-md-12'>
		<div class=' inputdiv fullwidth removepad'>
			<h4 class='subhead'> All about you </h4>
			<hr/>
			<p> Select something you might want to tell us </p>
			<select class='btn btn-default' id='typeofoi'>
				<option> -- select </option>
				<option value='ssh'> Special Skill and hobbies </option>
				<option value='nadr'> Non-Academic distinctions / recognition </option>
				<option value='miao'>  Membership in association / Organization </option>
			</select>
			<hr/>
			<p id='oi_caption'> &nbsp; </p>
			<textarea id='theoi'></textarea>
			<!--input type='text' /-->
			<!--hr/-->
			<div id='btnholder'>
				<button class='btn btn-primary btn-sm' id='addnewoi'> Save </button>
			</div>
		</div>

	</div>
	<div class='col-md-12' style="margin-top: 10px;border-top: 1px solid #ccc;padding-top: 10px;">
		<div class=' inputdiv fullwidth removepad'>
			<h4 class='subhead'> Summary </h4>
			<p> Special Skills </p>
			<ul id='ss'>
				<?php echo $ss; ?>
			</ul>
			<hr/>
			<p> Recognitions </p>
			<ul id='recog'>
				<?php echo $nadr; ?>
			</ul>
			<hr/>
			<p> Memberships </p>
			<ul id='mems'>
				<?php echo $miao; ?>
			</ul>
			<hr/>
		</div>
	</div>
</div>