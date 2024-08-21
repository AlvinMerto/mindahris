<div id="print_leave_view" style="display:none;">
<style>

.tg  {border-collapse:collapse;border-spacing:0; font-family: calibri !important;}
.tg td{font-family:calibr; font-size:13px;padding:0px 0px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal; border: 1px solid #b5859f;}
.tg th{font-family:calibri; font-size:13px;font-weight:normal;padding:0px 0px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border: 1px solid #b5859f;}
.tg .tg-yw4l{vertical-align:top}
.tg p { font-family: calibri; }

.tg tr th, .tg tr td {
	b
}

.inner_table {
	width:100%;
}

.inner_table tr td, .inner_table tr th{
    padding: 5px;
    border-left: 0px !important;
    border-right: 0px !important;
}

.inner_table tr td:first-child {
    text-align: right;
    color: #b5859f;
}

.inner_table tr:first-child td, .inner_table tr:first-child th{
	border-top:0px;
}

.inner_table tr:last-child td, .inner_table tr:last-child th{
	border-bottom:0px;
}

.inner_table tr td:last-child  {
	    font-size: 16px;
}

.inner_table tr {
	
}

.verticaltop tr td textarea{
width: 100%;
    background: #fdfdfd;
    border: 1px solid #dad9d9;
    resize: vertical;
}

.verticaltop td:first-child{
	vertical-align:top;
	border-color:inherit;
}

.verticaltop td:last-child {
	padding-left:20px;
}

.nopaddleft tr td{
	padding-left:0px !important;
}

.countofnumdays {
	    margin: 0px;
    font-size: 18px;
    font-weight: bold;
}

.sickleave_form {
	color:#95bdd4;
}

.sickleave_form tr td, .sickleave_form tr th {
	border: 1px solid #95bdd4;
color: #0c4a4a;
}

.sickleave_form tr td:first-child {
    color: #3f6479;
}

.sickleave_form tr td:last-child {
color: #0c4a4a;
}

#input_specify_sick_leave {
	    padding: 9px 9px;
    background: #e9ffff;
    margin: 6px 0px;
    border: 1px solid #ccc;
}
</style>


<h4 style="font-size:12px;float:left; text-decoration: underline;">CSC FORM No.6 (Revised 1998)</h4>
<h4 style="float:right; text-decoration: underline;"></h4>

<table class="tg" style="width:100%; border-collapse:collapse; border-color:inherit; color: rgb(93, 58, 77);"> <!-- rgb(181, 115, 151) -->
  <tr>
    <th class="tg-031e" colspan="5"><label style="font-weight: bold;">MINDANAO DEVELOPMENT AUTHORITY(MinDA)</label></th>
    <th class="tg-yw4l"><label style="font-weight: bold;">APPLICATION FOR LEAVE</label></th>
  </tr>
  <tr>
    <td class="tg-031e" colspan="5" style="width:55%;">
        <!--span style="font-size:10px; font-family: calibri;">CSC FORM NO.6(Revised 1998)  :: position: absolute; top: -34px;  left: 50px;  border-bottom: 1px solid #95bdd4; </span-->
		<?php if ($sig_data[0]->settingvalue == 1): ?>
			<div id="leave_applicant_sig" style='text-align: center;'> 
				<img id="leave_applicant_e_sig" style="width:140px;" src=""/>
			</div> 
		<?php endif; ?>
		<table class='inner_table'>
			<!--tr>
				<td> Signature: </td>
				<td> 
					
				</td>
			</tr-->
			<tr>
				<td> Name: </td>
				<td> <span id="leave_full_name"></span> </td>
			</tr>
			<tr> 
				<td> Position: </td>
				<td> <span id="leave_position_name"></span> </td>
			</tr>
			<tr>
				<td> Monthly Salary: </td>
				<td> <span id="leave_month_salary"></span> </td>
			</tr>
			<tr>
				<td> Office/Division: </td>
				<td> <span id="leave_office_division"></span> </td>
			</tr>
			<tr>
				<td> Date of Filling: </td>
				<td> <span id="leave_date_filling"></span> </td>
			</tr>
			<tr>
				<td> No. of Working days applied for: </td>
				<td> <span id="input_no_of_days"></span> </td>
			</tr>
			<tr> 
				<td> Inclusive Date: </td>
				<td> <span id="leave_inclusive_date"></span> </td>
			</tr>
			<tr>
				<td> Commutation: </td>
				<td>
					<input type="checkbox" id='requested'/> <label for='requested'> Requested </label>
					<input type="checkbox" id='notrequested'/> <label for='notrequested'> Not Requested </label>
				</td>
			</tr>
		</table>
		
		<hr style='border-color: inherit; width: 102%;  margin-left: -5px;'/>

        <p style="text-align: center; margin: 0px; font-weight: bold;"> TYPE OF LEAVE </p>
		  
		  <!-- other leave -->
          <div id="others_leave">
				<table class='inner_table verticaltop'>
				
					<tr id='vacationleave'>
						<td> <p style="margin:0px;"><input type="checkbox" id="vl_check_form" checked="true"> VACATION </input></p> </td>
						<td>
							<div>
								<p style="margin:0px;text-align:left;"> <input type="checkbox" id="vl_ph"  checked>  Within the Philippines </input></p>
								<p style="margin:0px;text-align:left;"><input type="checkbox" id="vl_abroad" > Abroad (specify) </input></p>
								<p style="margin: 0px; text-align: left; border: 1px solid; padding: 5px 4px; margin-top: 7px; border-color: inherit; background: #eaeaea;"> <span id="input_specify_vacation_leave"></span> </p>
							</div>
						</td>
					</tr>
					<tr>
						<td> </td>
						<td>
							 <hr style='border-color: inherit;'/>
							<p style="margin:0px;"><input type="checkbox" id="leave_maternity"> MATERNITY </input> <span style="text-decoration: underline;" id="input_specify_maternity_leave"></span>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<p style="margin:0px;"><input type="checkbox" id="leave_others" > OTHERS (Specify) </input><span style="text-decoration: underline;" id="input_all_leave"></span></p>
						</td>
					</tr>
				</table>
				               
               <div style="clear:both"></div>
         </div>
		 <!-- end leave -->
		
		<!-- sick leave -->
         <div id="sick_leave">				
				<table class='inner_table verticaltop'>
					<tr>
						<td> <input id="sl_check_form" type="checkbox" checked="true"> SICK </input> </td>
						<td>
							<input id="sl_out" type="checkbox" >  Out Patient (Specify) </input> <br/>
							<p id="input_specify_sick_leave"></p>
							<hr style='margin: 10px 0px;'/>
							<input id="sl_in_hos" type="checkbox" > In Hospital (Specify) </input>
						</td>
					</tr>
				</table>

               <div style="clear:both"></div>
         </div>
		<!-- end of sick leave -->
		
        <!--p style="position:relative; margin:10px 0px 0px 0px ;">Signature ________________________________</p-->

        <p style="margin:10px 0px 0px 0px ;">  </p>
    </td>
    <td class="tg-yw4l" rowspan="7" style='padding: 0px 0px;'>
		<div style='padding: 12px;'> <!-- start of first approval background: #f2fde1;  -->
		<p style="margin:0px 0px 0px 0px;text-align: center; font-weight: bold;"> ACTION ON APPLICATION </p>
		
		<!--table class='inner_table verticaltop nopaddleft' style='display:none;'>
			<tr>
				<td> Recommending: </td>
				<td> </td>
			</tr>
			<tr> 
				<td> <input type="checkbox" id='approval_chief'> </td>
				<td> <label for='approval_chief'> Approval </label> </td>
			</tr>
			<tr>
				<td> <input type='checkbox' id='disapproved_chief'/> </td>
				<td> 
					<label for='disapproved_chief'> Disapproval due to:</label>
					<br/>
					<textarea></textarea>
				</td>
			</tr>
		</table-->
		
		
		 
        <div style="width:90%; margin:auto; margin-top:10px; margin-bottom: 5px;  border: dotted 3px #dcdcdc; text-align: center;">


          <p style="width:100%; text-align: center; margin: auto; margin-bottom: -40px; margin-top:20px; font-weight: bold;"> 

          <span id="leave_division_chief_name" style='cursor:pointer;'>
          </span>

          <span id="leave_div_sig" style="display:none; position: relative;">
            <img id="leave_div_chief_e_sig" style="position: absolute; top: -45px;width:140px; left: -146px;" src=""></img>
          </span>     

          </p>
          <p style="text-align: center; border-top:1px solid; width:50%; margin:auto; margin-top:40px; margin-bottom: 10px;">Chief/OIC Chief of Office</p>
          <p style="line-height: 0px; margin-top:0px; font-size:9px; text-align: center;font-style: italic;" id="leave_div_input_date_approved"></p>
        </div>
		
		</div> <!-- end of first approval --> 
		<hr style='border-color: inherit;margin: 0px;'/>
		
		<div style='padding: 12px;'> <!-- start of second approval background: #e3efd1;-->
			<table class='inner_table verticaltop nopaddleft'>
				<!--tr>
					<td> <input type="checkbox" id='approve_2ndlvl'> </td>
					<td> <label for='approve_2ndlvl'> Approved </label> </td>
				</tr>
				<tr>
					<td> <input type="checkbox" id='disapprove_2ndlvl'> </td>
					<td> 
						<label for='disapprove_2ndlvl'> Disapproved due to: </label> <br/>
						<textarea></textarea>
					</td>
				</tr-->
				
				<!--tr>
					<td> <p class='countofnumdays' id='dayswithpay'> 2 </p> </td>
					<td> Days with pay </td>
				</tr>
				<tr>
					<td> <p class='countofnumdays' id='dayswithoutpay'> 2 </p> </td>
					<td> Days without pay </td>
				</tr-->
				
			</table>

         <div style="width:90%;  margin:auto; margin-bottom: 10px; margin-top: 10px; border: dotted 3px #a5a5a5; text-align: center;">



          <p style="width:100%; text-align: center; margin: auto; margin-bottom: -40px; margin-top:20px; font-weight: bold;">

          <span id="leave_authorized_official" style='cursor:pointer;'></span>
          <span id="leave_auth_sig" style="display:none; position: relative;">
            <img id="leave_auth_chief_e_sig" style="position: absolute; top: -45px;width:140px; left: -146px;" src=""></img>
          </span>
          </p>

          <p style="text-align: center; border-top:solid 1px; width:50%; margin:auto; margin-top:40px; margin-bottom: 10px;">Authorized Official</p>
          <p style="line-height: 0px; margin-top:0px; font-size:9px; text-align: center;font-style: italic;" id="leave_auth_input_date_approved"></p>
		  </div>
        </div> <!-- end of second approval -->
		<hr style='border-color: inherit;margin: 0px;'/>
    </td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="5">
        <p style="margin:0px;">FOR PERSONNEL USE ONLY:</p>
    </td>
  </tr>
  <tr>
    <td class="tg-031e"><p style="margin:0px;">Leave Credits as of </p></td>
    <td class="tg-031e"><p style="margin:0px;text-align: center;">Vacation</p></td>
    <td class="tg-031e"><p style="margin:0px; text-align: center;">Sick</p></td>
    <td class="tg-031e is_sick"><p style="margin:0px;text-align: center;">COC</p></td>
    <td class="tg-031e"><p style="margin:0px; text-align: center;">TOTAL</p></td>
  </tr>
  <tr>
    <td style="text-align: center;" class="tg-031e"><span id="display_leave_credits_as_of"></span></td>
    <td style="text-align: center;" class="tg-031e"><span id="display_vacation_leave_credits">0</span></td>
    <td style="text-align: center;" class="tg-031e"><span id="display_sick_leave_leave_credits">0</span></td>
    <td style="text-align: center;" class="tg-031e is_sick"><span id="display_coc_leave_credits">0</span></td>
    <td style="text-align: center;" class="tg-031e"><span id="display_total_leave_credits">0</span></td>
  </tr>
  <tr>
    <td class="tg-yw4l"><p style="margin:0px;">LESS: THIS LEAVE</p></td>
    <td style="text-align: center;" class="tg-yw4l"><span id="display_vacation_less_leave">0</span></td>
    <td style="text-align: center;" class="tg-yw4l"><span id="display_sick_less_leave">0</span></td>
    <td style="text-align: center;" class="tg-yw4l is_sick"><span id="display_coc_less_leave">0</span></td>
    <td style="text-align: center;" class="tg-yw4l"><span id="display_total_less_leave">0</span></td>
  </tr>
  <tr>
    <td class="tg-yw4l"><p style="margin:0px;">LEAVE BALANCE</p></td>
    <td style="text-align: center;" class="tg-yw4l"><span id="display_vacation_balance">0</span></td>
    <td style="text-align: center;" class="tg-yw4l"><span id="display_sick_balance">0</span></td>
    <td style="text-align: center;" class="tg-yw4l is_sick"><span id="display_coc_balance">0</span></td>
    <td style="text-align: center;" class="tg-yw4l"><span id="display_total_balance">0</span></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="5">
      <p style="margin:0px;">Certified by: </p>
       <div style="width:100%; margin:auto; border:none; text-align: center;">

          <p style="width:50%; text-align: center; margin: auto; margin-bottom: -40px; margin-top:20px; font-weight: bold;"> 

          <span id="leave_hrmd_sig" style="display:none;position: relative;">
            <img id="leave_hrmd_chief_e_sig" style="position: absolute; top: -45px;width:140px; left: -124px;" src=""></img>
          </span>
   	      <span id="hrmd_unit_name">HERLYN N. GALLO</span>
			
          </p>
          <p style="text-align: center; border-top:solid 1px; width:50%; margin:auto; margin-top:40px; margin-bottom: 10px;">HRMD Unit</p>
          <p style="line-height: 0px; margin-top:0px; font-size:9px; text-align: center; font-style: italic;" id="leave_hrmd_input_date_approved"></p>

        </div>
    </td>
  </tr>
</table>

</div>

</body>
</html>
