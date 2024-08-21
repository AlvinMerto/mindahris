<div id="print_passlip_view" style="display:none;">
<p style="line-height: 0px; font-size: 11px;"><span id="ps_ref_no-dontappear"><?php echo "REF #: PS-".$this->uri->segment(3); ?></span></p> 

<p style="text-align: center;line-height: 0px;">Republic of the Philippines</p>
<p style="text-align: center;line-height: 0px; font-weight: bold">MINDANAO DEVELOPMENT AUTHORITY</p>
<p style="text-align: center;line-height: 0px; font-style: italic;">Regions IX,X,XI,XII,CARAGA and ARMM</p>


<h3 style="text-align: center">PASS SLIP</h3>

<div style="border:solid 0px #fff; width: 48%; float:left;">

		<div style="border:solid 0px #ddd; width:50px; float:left; height:25px;">
			<p style=" font-size:13px;">FOR:</p>
		</div>
		<div style=" width:200px; float:left; text-align: center; height:25px;">
			<p style="font-size:13px; text-decoration: underline; text-transform:uppercase;" > Sec. Maria Belen S. Acosta, CESE </p>
			<!--p style="font-size:13px; text-decoration: underline; text-transform:uppercase;" > Secretary Datu HJ. Abul Khayr Alonto </p-->
		</div>
		<div style="clear:both;"></div>


		<div style="border:solid 0px #fff; width:50px; float:left; height:25px;">

		</div>
		<div style="width:200px; float:left; text-align: center;">
			<p style="font-size:12px;line-height: 0px;" id='for_position'>&nbsp;</p>
		</div>
		<div style="clear:both;"></div>

		<?php  ?>

		<div style="border:solid 0px #fff; width:50px; float:left; height:25px;">
			<p style="font-size:13px; line-height: 0px;">FROM:</p>
		</div>
		<div style="border:solid 0px #fff; width:200px; float:left; text-align: center; height:25px;">
			<p id="input_emp_fullname" style="font-size:13px;line-height: 0px; text-decoration: underline; text-transform: uppercase;"></p>
		</div>
		<div style="clear:both;"></div>


		<div style="border:solid 0px #fff; width:50px; float:left; height:25px;">

		</div>
		<div style="border-top:solid 0px #fff; width:200px; float:left; text-align: center; height:25px;">	
			<p style="font-size:12px;line-height: 0px;">Name of Employee</p>
		</div>
		<div style="clear:both;"></div>


</div>


<div style="border:solid 0px #fff; width: 35%; float: right">
<p style="font-size:13px;">Date: <span id="ps_date"> </span></p>
<input  type="checkbox" id="check_1" value="1" checked > <span style="font-size:13px;"> Official </span> </input>
<br>
<input  type="checkbox"  id="check_2" value="2"> <span style="font-size:13px;"> Personal </span></input>

</div>
<div style="clear:both;"></div>




<div style="border-top:solid 0px #ddd; margin-top:10px; margin-bottom: 30px;">
<p style="font-size:13px;">I would like to request for permission to go out of the office to: &nbsp; <span id="input_reason" style="text-decoration: underline;"> To get requierments.</span></p>
</div>


<div style="border:solid 0px #fff; width: 48%; float: left;">
<p style="font-size:13px;line-height: 2px;">TIME OUT: &nbsp; <span style="text-decoration: underline;" id="label_time_out">__________</span> </p>
<p style="font-size:13px;line-height: 2px;">TIME IN:  &nbsp;<span style="text-decoration: underline;" id="label_time_in">__________</span> </p>
<p style="font-size:13px;line-height: 2px;">ATTESTED BY: &nbsp;  <span style="text-decoration: underline;" id="label_guard_name">________________</span> </p>
<p style="font-size:12px;line-height: 0px; margin-left:80px;">(Guard on Duty)</p>


<p style="font-size:12px;margin-top:30px;">Approved by:</p>


<div style="width:200px; border: solid 0px #fff; position: relative;">


	<span id="cont_es_sig" style="display:none;">
	<img id="ps_div_chief_e_sig" style="position: relative; top: -34px; left: 32px; margin-bottom: -80px;" src=""></img>
	</span>

	<p style="font-size:13px;margin-top:10px;text-align: center; font-weight: bold; text-transform: uppercase;" id="input_approved_id"></p>
	<p style="font-size:12px; margin-top: -10px;text-align: center;"><span id="input_position_approved_name"></span></p>
	<p style="font-size:11px; margin-top: -10px;text-align: center;font-style: italic;">
		<span id="input_date_approved"></span>
		<small id='approvedps' style='color: green;left: 0px;font-size: 12px;'></small>
	</p>

</div>

</div>



<div style="border:solid 0px #fff; width: 49%; float:right; text-align: center; ">


	<span id="cont_emp_sig" style="display:none; position: relative;">
	<img id="ps_e_sig" style="position: absolute; top: -7px;width:140px; left: -94px;" src=""></img>
	</span>

<p style="font-size:13px;line-height: 1px; margin-top:50px;">_____________________________</p>
<p style="line-height: 0px; font-size: 12px;">Signature of Employee</p>

</div>
<div style="clear:both;"></div>





</div>

</div>