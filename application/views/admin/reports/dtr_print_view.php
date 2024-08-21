<div id="body_wrap" style="display:none;">

<div id="headers" style="width: 100%; padding:0; margin:auto; margin-bottom: 10px;">

<style>

.tg  {border-collapse:collapse;border-spacing:0; border-bottom: solid 2px #000; border-top:solid 2px #000;}
.tg td{font-family:'calibri';font-size:10px; font-weight: bold;padding:3px 2px;border:solid 1px #000; overflow:hidden;word-break:normal;}
.tg th{font-family:'calibri';font-size:10px;font-weight:bold;padding:4px 3px;border:solid 1px #000;overflow:hidden;word-break:normal;}
.tg .tg-i0og{color:#000000}
.tg .tg-3nt3{background-color:#ffeb99;color:#000000;vertical-align:top}
.tg .tg-ah18{background-color:#ffeb99}
.tg .tg-n8bv{background-color:#ffeb99;vertical-align:top}
.tg .tg-fefd{color:#000000;vertical-align:top}
.tg .tg-58o0{background-color:#ffeb99;color:#000000}
#back_top ol {
  margin: 0 0 0 5px;
  padding: 0;
}

#back_top ol > li {
  margin: 0;
  padding: 0 0 0 2em;
  text-indent: -2em;
  counter-increment: item;
}

#back_top ol > li:before {
  display: inline-block;
  width: 1em;
  padding-right: 0.5em;
  font-weight: bold;
  text-align: right;
}

#body table tbody tr td {
	border-right:1px solid #ccc;
	border-bottom:1px solid #ccc;
}
</style>


<?php 

$d_none = "";
$d_none = "style='display:none;'";

$display_none = "";

?>

	<div style="width:347px; margin-left: 0px;padding:10px; float:left; margin-top:15px;">

		<p style="margin:0px;font-family: 'calibri'; font-weight: bold; font-size: 14px; ">MINDANAO  DEVELOPMENT AUTHORITY</p>
		<p style="margin:0px;margin-right:0px; font-family: 'calibri';font-weight: bold; font-size: 14px;">Daily Time Record &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
		<label id="label_daterange"></label></p>
		<p style="font-size: 14px; padding-left: 30px; display:none; "id="sdateend"></p>
	
	</div>

	<div style="width:356px; float:right;margin-right:26px; margin-bottom: 5px;">

		<table class="tg">
		  <tr>
		    <th class="tg-i0og" style="width: 36px; text-align:left;">PARTICULARS</th>
		    <th class="tg-i0og" style="width: 45px;">No. of times</th>
		    <th class="tg-fefd" style="width: 100px;" colspan="3">DD-HH-MM</th>
		    <th class="tg-i0og regular_table" style="<?php echo $display_none; ?> width: 67px;font-weight: normal;text-align: left;">VACATION</th>
		    <th class="tg-i0og regular_table" style="text-align: center; <?php echo $display_none; ?> width: 40px;"><span id="vl_times" <?php echo $d_none; ?>></span></th>
		  </tr>
		  <tr>
		    <td class="tg-58o0" style="font-weight: normal;">TARDINESS</td>
		    <td class="tg-58o0" style="text-align: center;"><span id="late_times" <?php echo $d_none; ?>></span></td>
		    <td class="tg-3nt3" style="text-align: center;"><span id="late_d" <?php echo $d_none; ?>></span></td>
		    <td class="tg-ah18" style="text-align: center;"><span id="late_h" <?php echo $d_none; ?>></span></td>
		    <td class="tg-n8bv" style="text-align: center;"><span id="late_m" <?php echo $d_none; ?>></span></td>
		    <td class="tg-58o0 regular_table" style="<?php echo $display_none; ?> font-weight: normal;">SICK</td>
		    <td class="tg-58o0 regular_table" style="text-align: center; <?php echo $display_none; ?>"><span id="sl_times" <?php echo $d_none; ?>></span></td>
		  </tr>
		  <tr>
		    <td class="tg-i0og" style="font-weight: normal;">UNDERTIME</td>
		    <td class="tg-i0og" style="text-align: center;"><span id="un_times" <?php echo $d_none; ?>></span></td>
		    <td class="tg-fefd" style="text-align: center;"><span id="un_d" <?php echo $d_none; ?>></span></td>
		    <td class="tg-i0og" style="text-align: center;"><span id="un_h" <?php echo $d_none; ?>></span></td>
		    <td class="tg-fefd" style="text-align: center;"><span id="un_m" <?php echo $d_none; ?>></span></td>
		    <td class="tg-i0og regular_table" style="<?php echo $display_none; ?> font-weight: normal;">CTO</td>
		    <td class="tg-i0og regular_table" style="<?php echo $display_none; ?>"></td>
		  </tr>
		  <tr>
		    <td class="tg-3nt3" style="font-weight: normal;">PS</td>
		    <td class="tg-i0og" style="text-align: center;"><span id="ps_no_times" <?php echo $d_none; ?>></span></td>
		    <td class="tg-fefd" style="text-align: center;"><span id="ps_d_" <?php echo $d_none; ?>></span></td>
		    <td class="tg-i0og" style="text-align: center;"><span id="ps_h_" <?php echo $d_none; ?>></span></td>
		    <td class="tg-fefd" style="text-align: center;"><span id="ps_m_" <?php echo $d_none; ?>></span></td>
		    <td class="tg-i0og regular_table" style="<?php echo $display_none; ?> font-weight: normal;">OTHERS</td>
		    <td class="tg-i0og regular_table" style="<?php echo $display_none; ?>"></td>
		  </tr>
		  <tr>
		    <td class="tg-58o0" style="font-weight: normal;">ABSENCES</td>
		    <td class="tg-58o0" style="text-align: center;"><span id="ab_times" <?php echo $d_none; ?>></span></td>
		    <td class="tg-3nt3" style="text-align: center;width:15px;"><span id="ab_d" <?php echo $d_none; ?>></span></td>
		    <td class="tg-58o0" style="text-align: center;width:15px;"><span id="ab_h" <?php echo $d_none; ?> ></span></td>
		    <td class="tg-3nt3" style="text-align: center;width:15px;"><span id="ab_m" <?php echo $d_none; ?>></span></td>
		    <td class="tg-58o0 regular_table" rowspan="2" style="<?php echo $display_none; ?> font-weight: normal;">Official hours of arrival and departure</td>
		    <td style="text-align: center;" class="tg-58o0 regular_table" rowspan="2" style="<?php echo $display_none; ?>"><span style="font-weight: normal; "id="label_official_hours"></span></td>
		  </tr>
		  <tr>
		    <td class="tg-3nt3" style="font-weight: normal;">TOTAL</td>
		    <td class="tg-3nt3" style="text-align: center;"><span id="to_times" <?php echo $d_none; ?>></span></td>
		    <td class="tg-3nt3" style="text-align: center;"><span id="to_d" <?php echo $d_none; ?>></span></td>
		    <td class="tg-3nt3" style="text-align: center;"><span id="to_h" <?php echo $d_none; ?>></span></td>
		    <td class="tg-3nt3" style="text-align: center;"><span id="to_m" <?php echo $d_none; ?>></span></td>
		  </tr>
		</table>
			

	</div>

	<div style="clear:both;"></div>	

</div>


<div id="footers">
<div id="footer1" style=" width: 100%; padding:0; margin:auto;">

	<div style="width:450px;float:left;">
		<p style="font-size:14px;">I CERTIFY on my honor that the above is a true and correct report of the hours of work performed, record of which was made daily at the time of arrival and departure from office.	
		</p>
		<?php 
			// echo $signature['emp_sig'];
			if (isset($signature['emp_sig'])){
				echo "<div style='width: inherit;
								  position: absolute;
								  margin-top: -50px;'>";
					
					echo "<img src='".base_url()."/assets/esignatures/".$signature['emp_sig']."' 
							   style='position: relative;
									z-index: -1;'/>";
					
					if (isset($token['emp'])) {
						//echo "<p style='margin: 0px; position: absolute;top: 69px;font-size: 8px;left: 125px;'>".str_replace("/","",$token['emp'])."</p>";
						echo "<p style='margin: 0px; position: absolute;top: 67px;font-size: 10px;left: 125px;'>".str_replace("/","-",$token['emp'])."</p>";
					}
					echo "</div>";
		
				/*
				echo "<div 
						style='background-image:url(".base_url()."/assets/esignatures/".$signature['emp_sig'].");
						width: 138px;
						height: 122px;
						background-repeat: no-repeat;
						background-size: 100%;
						position: absolute;
						margin-top: -37px;'></div>";
				*/
			} 
		
		?>
		<p style="width: 305px; margin-top:30px; border-top:solid 1px #000; font-size:12px;">EMPLOYEE’S SIGNATURE
		</p>
	</div>
	

	<div style="width:265px; height: 122px; margin-left:50px; float:left; position:relative;">
		<p style="font-size:14px;">Certified Correct by:</p>
		
		<?php 
			
			if (isset($signature['last_sig'])) {
				if ($signature['last_sig'] != null) {
					echo "<div style='text-align: center;'>"; // 
						echo "<div style='width:100%;'>";
						
							echo "<div style=''>";
								// echo "<p style='margin: 0px; font-size: 12px; text-align: right;'> approved by: {$last_sig_name} </p>";
								echo "<span style='font-size: 10px;'>";
									//echo $token['last'];
								echo "</span>";
								
								echo "<img src='".base_url()."/assets/esignatures/".$signature['last_sig']."' 
												   style='width: auto;
												   position: relative;
												   z-index: -1;
												   top:-25px;'/>";
							echo "</div>";
						
						echo "</div>";
						echo "<p style='position: absolute; top: 48px; font-size: 16px; width: 100%; text-align: center;'>{$last_sig_name}</p>";
					echo "</div>";
				}
			}
			
		?>
	
	
		<?php
		
			if (!$is_head) {
				if (isset($signature['chief_sig'])){
					if ($signature['chief_sig'] != $signature['last_sig']) {
						echo "<div style='width: auto;
										  text-align: right;
										  margin-top: -56px;'>";  //margin-top: 20px;
							
							echo "<img src='".base_url()."/assets/esignatures/".$signature['chief_sig']."' 
									   style='width: auto;
									   position: relative;
									   z-index: -1;'/>";
							
							/*
							echo "<p style='font-size: 12px; margin: 0px; text-align: right;'> Recommended by: {$chief_sig_name} </p>";
							if (isset($token['chief'])) {
								echo "<span style='font-size: 10px;'>";
									echo $token['chief'];
								echo "</span>";
							}
							*/
						echo "</div>";
					}
					if (isset($token['chief'])) {
						echo "<p style='position: absolute; font-size: 9px; right: 0px;'>".str_replace("/","",$token['chief'])."</p>"; // top: 98px;  
					}
				}
			} else {
				if (isset($signature['last_sig'])) {
					if ($signature['last_sig'] != null) {
						if (isset($token['chief'])) {
							// echo "<p style='position: absolute; font-size: 9px; top: 98px; right: 0px;'>".str_replace("/","",$token['chief'])."</p>";
						}
					}
				}
			}
			
		?>
	</div>

	<div style="clear:both;"></div>	

</div>


<div id="footer2" style=" width: 100%; padding:0; margin:auto;">

	<div style="width:430px;float:left;">
		<p style="font-size:11px; line-height: 0px;">Notes:</p>
		<p style="font-size:11px;">
		1. Please do not mark entry/ies or write anything on this DTR.  Only HRMD personnel are 
           allowed to put  notations if necessary.
		</p>
		<p style="font-size:11px; line-height: 0px;">
		1. See Guidelines on Tardiness, Undertime, Half-day Absences and DTR submission at the back.
		</p>
	</div>

	

	<div style="width:282px; float:right;margin:35px 0px 22px 26px; border:solid 2px #000;">
		<p style="margin:4px; font-size:12px;">Deadline of DTR submission with complete attachments and signature: <span id="label_date_of_submission"></span></p>
	</div>

	<div style="clear:both;"></div>	

</div>


<div id="back_top" style="font-family:calibri !important; border-radius:90px; width: 90%; padding-left: 30px; padding-right:30px; margin:auto;border:solid 1px #000; height:715px; margin-bottom:20px; margin-top:20px;">

		<p style="font-size:13px; text-align:center;font-weight: bold; text-decoration : underline ;">GUIDELINES ON TARDINESS, UNDERTIME, HALF-DAY ABSENCE and DTR SUBMISSION</p>

		<ol style="font-size:12px; text-align: justify;" type="I">
		  <li><b>Tardiness</b></li>
		  <p style="">The CSC Law and Rules under Memorandum Circular No. 23,  s. 1998 states that any employee shall be considered habitually tardy if he/she incurs tardiness, regardless of the number of 	minutes on the following instances:</p>
			 <ul>
			 	<li>Ten (10) times a month for at least two (2) months in a semester; or </li>
			 	<li>Ten (10) times a  month for  at  least two  (2)  consecutive months during the year</li>
			 </ul>
			<p>The sanctions provided by the law on this offense are as follows:</p>

				<ul style="margin:0px 0px 10px 0px; list-style-type: none;">
				 	<li>1st  Offense    -    reprimand</li>
				 	<li>2nd Offense    -    suspension for one (1) day to thirty (30) days</li>
				 	<li>3rd Offense    -    dismissal</li>
			 	</ul>

		  <li><b>Undertime</b></li>
		  <p>Pursuant to CSC Law and Rules under Memorandum Circular No. 16, s. 2010, MinDA adopts and implements the following    guidelines on undertime:</p>
		  		<ul>
				 	<li>Any officer or employee who incurs undertime, regardless of minutes/hours, ten (10) times a month for at least two months in a semester shall be liable for Simple Misconduct and/or Conduct Prejudicial to the Best interest of the       Service, as the case may be; and</li>
				 	<li>Any officer or employee who incurs undertime, regardless of the number of minutes/hours, ten (10) times a month for at least two (2) consecutive months during the year shall be liable for Simple Misconduct and/or Conduct Prejudicial to the Best Interest of the Service, as the case may be.</li>
			 	</ul>
			 <p>The sanctions provided by the law on this offense are as follows:</p>


				<ul style="text-align:left;">
				 	<li style="display: block; float:left; width:300px;"><span style="font-weight: bold; text-decoration: underline;">Simple Misconduct</span>
					 	<ul style="margin: 5px 0px 10px;">
						 	<li>1st offense – Suspension (1mo. 1 day to six months)</li>
						 	<li>2nd offense – Dismissal</li>
					 	</ul>
				 	</li>

				 	<li style="display:block;float:right; width:300px;"><span style="font-weight: bold; text-decoration: underline;">Conduct prejudicial to the best interest of the service</span>
				 	<ul style="margin: 5px 0px 10px;">
					 	<li>1st offense – Suspension (6mos. 1 day to 1 year)</li>
					 	<li>2nd offense – Dismissal</li>
				 	</ul>
				 	</li>

				 	<div style="clear:both;"></div>
			 	</ul>

			 

		  <li><b>Half Day Absence</b></li>
		  <p>Pursuant to CSC Law and Rules under Memorandum Circular No. 17, s. 2010, MinDA adopts and implements the following  guidelines on half day absence:</p>
		  			<ul style="margin-bottom: 10px;">
					 	<li>Any officer or employee who is absent in the morning is considered to be tardy and is subject to the provision on  Habitual Tardiness.</li>
					 	<li>Any officer or employee who is absent in the afternoon is considered to have incurred undertime, subject to the  provisions on undertime.</li>
				 	</ul>
		  <li><b>Submission of Daily Time Records</b></li>
		  <p>Under the Commission on Audit (COA) pertinent rules and regulations and as an internal office requirement, all personnel are required to submit their respective previous month’s DTRs to the HRMD Unit within the 1st  week of the succeeding month, together with the necessary attachments evidencing official travels, pass slips, leaves of absences and other pertinent documents as maybe required.  <b><span style="font-style: italic;">Failure to comply shall be a ground for neglect of duty and shall cause the withholding of salaries and other emoluments.</span></b></p>
		</ol>



	<div style="clear:both;"></div>

</div>

<div id="back_bottom" style="font-family:calibri !important;text-align: justify;border-radius: 30px; width: 90%; padding-left: 30px; padding-right:30px; margin:auto;border:solid 1px #000; height:200px;">

			<p style="font-size:13px; text-align:center;font-weight: bold; text-decoration : underline ;">USE OF PASS SLIP and PERSONNEL ATTENDANCE FORM</p>

			<p style="font-size:12px;"><span style="font-weight: bold; font-style: italic">Pass Slip (PS).</span> All personnel must secure a pass slip before going out of the office during regular working hours for official or       personal purpose. A pass slip must be duly signed by the Division Chief/Supervisor or the OIC of the office in the absence of the    immediate supervisors and must be presented to the guard before leaving the office. Corresponding minutes or hours spent for      personal pass slips shall be deducted from the vacation leave credits of the concerned employee.</p>

			<p style="font-size:12px;"><span style="font-weight: bold; font-style: italic">Personnel Attendance Form (PAF).</span>   The use of this form is allowed only when the employee fails to log in or log out of the office due to malfunction of the biometric device or during instances where the employee is within the office but attending a meeting or official function. When the employee is scheduled to attend an early meeting which requires him/her to proceed directly to the venue, he/she shall secure a duly-approved PAF the day before the scheduled meeting. The use of PAF for the reason “forgot to log in or log out” is discouraged at all times.</p>




	<div style="clear:both;"></div>

</div>






</div>

</div>