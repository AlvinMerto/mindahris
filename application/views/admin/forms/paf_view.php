<div id="print_paf_view" style="display:none;">
<p style="line-height: 0px; font-size: 11px;"><span id="paf_ref_no_dontdisplay"> REF #: PAF-<?php echo $this->uri->segment(3); ?> </span></p>

<p style="text-align: center;line-height: 0px;font-weight: bold">MINDANAO DEVELOPMENT AUTHORITY</p>
<p style="text-align: center;line-height: 0px;font-weight: bold">PERSONNEL ATTENDANCE FORM</p>
<div style="width:318px; margin:auto; text-align: center;" >
<p style="font-size: 13px; text-align: center;">(For purposes of recording the Time of Arrival and departure of a Personnel who fails to use his/her Time Card)</p>
</div>


<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:calibri; font-size:14px;padding:0px 3px ;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{position: relative; font-family:calibri; font-size:14px;font-weight:normal;padding:0px 0px;border-style:solid;border-width:1px;word-break:normal;}
</style>


<table class="tg" style="width:100%;">
  <tr>
    <th class="tg-031e" colspan="2"> <label style="font-size:12px;">Missed time Card Information</label></th>
    <th class="tg-031e" rowspan="2" style="">

	    <p style="width: 100%;  margin: auto; font-size: 12px;  text-align: center; margin-top: 20px;" >  <span id="input_employee_paf"> </span><span id="cont_paf_e_sig" style="display:none; position: relative;">
       <img id="paf_e_sig" style="position: absolute; top: -48px;width:140px; left: -120px;" src=""></img>
	   
      </span> </p>
		
	    <p style="width: 150px;  margin: auto; font-size: 12px; margin-top: 0px; border-top:solid 1px black;     text-align: center;"> Printed Name & Signature</p>
    </th>
    <th class="tg-031e" rowspan="2">
     	 <p style="width: 90%;  margin: auto; font-size: 12px; position: absolute; top:10px; margin-left: 2px; margin-right:2px; " id="input_position"> </p>
   		 <p style="width: 70px; margin:auto; font-size: 12px; margin-top: 45px; "> </p></th>
    <th class="tg-031e" rowspan="2">
    	 <p style="width: 90%;  margin: auto; font-size: 12px; position: absolute; top:10px; margin-left: 2px; margin-right:2px; " id="input_division">  </p>
    	 <p style="width: 80px; margin:auto; font-size: 12px; margin-top: 45px;">  </p>
    </th>
  </tr>
  <tr>
    <td class="tg-031e">
    		<p style="width: 100%;  margin: auto; font-size: 12px; text-align: center; margin-top: 15px;" id="input_date_paf"> </p>
		    <p style="width: 55px; text-align: center; margin:auto; font-size: 12px; margin-top:0px; ">Date</p>

    </td>

    <td class="tg-031e">
    		<p style="width: 100%;  margin: auto; font-size: 12px; text-align: center; margin-top: 15px;" id="input_time_in_out_paf"> IN  (<span id="input_paf_in"></span>) -  OUT (<span id="input_paf_out"></span>) </p>
    		<p style="width: 80px; text-align: center; margin:auto; font-size: 12px; margin-top: 0px;">Time (IN/OUT)</p>
    </td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="5">

    	<div style="width:65%; border:solid 1px #fff; float:left; height:150px;">
    		   <label style="font-size:12px;">Reasons/Justification</label>	
    		   <p style="text-indent: 10px; margin:2px; font-size: 13px;" id="input_justification"> </p>
    	</div>



    	<div style="width: 29%; border:solid 1px #fff; float:left; margin-top:75px; ">
    		 <label style="font-size:12px; text-align: center;">I hereby recommend approval and certifies that the reason herein stated is correct. </label>

    		 <p style=" font-size:12px;text-align: center;margin-top: 25px;margin-bottom: 8px; " >			 
				<span id='approvalnumber' style='color:green;'>  </span> <br/>
				<span id="input_division_oic"></span>
				 
				<span id="paf_div_sig" style="display:none; position: relative; ">
					<img id="paf_div_chief_e_sig" style="position:absolute; top: -67px;width:140px; left: -121px;" src=""></img>
				</span>
			</p>
			
			<p style="line-height: 0px; margin-top:7px; font-size:9px; text-align: center;font-style: italic;" id="div_input_date_approved"></p>
    		 <p style="height: 30px; margin: auto; width:150px; border-top: solid 1px black; font-size:12px;text-align: center;">Division Chief/OIC</p>

    	</div>


    	<div style="clear:both;">

    	</div

    </td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="3">
     <p style="text-align: left; font-size: 12px; margin:auto; margin-bottom: 20px;">Recorded by: </p>
    <p style=" line-height: 0px; text-align: left; font-size: 12px; margin:auto; margin-bottom: 10px;" id="input_paf_recorded"></p>
    </td>

    <td class="tg-031e" colspan="2"> 

<div style="position: relative;">

    <p style="text-align: left; font-size: 12px; margin:auto; margin-bottom: 20px;">Approved by: </p>

      <span id="paf_approved_sig" style="display:block;">
        <img id="paf_approved_e_sig" style="top: -23px;width: 140px; position: absolute;" src=""></img>
		<small id='lastappr' style='color:green;'> Approved online </small>
      </span>

    <p style="text-align: left; font-size: 12px; margin:auto; margin-bottom: 10px;" id="input_paf_approved"></p>
    <p style="line-height: 0px;margin-top: 15px;font-size: 9px;text-align: left; font-style: italic;" id="div_input_paf_date_approved"></p>

</div>


    </td>
  </tr>
  <tr>
    <td class="tg-031e" colspan="5"> 
       <p style="text-align: left; font-size: 12px; margin:auto; margin-bottom: 20px;">Remarks: </p>
    <p style=" line-height: 0px; text-align: left; font-size: 12px; margin:auto; margin-bottom: 10px;" id="input_remarks_paf">TEST TEST </p>

    </td>
  </tr>
</table>

</div>

