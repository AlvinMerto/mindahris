<div class='content-wrapper'> <!-- content wrapper -->
	<section class="content"> <!-- section class content -->
      <div class='content_wrapper'>

		<div id='paf'>
			<div class='paf_wrap'>
				<div class='pafhead'>
					<p class='comp_name'> MINDANAO DEVELOPMENT AUTHORITY (MinDA) </p>
					<p class='comp_details'> PERSONNEL ATTENDANCE FORM (PAF) </p>
					<p class='comp_info'> (For purposes of recording the Time of Arrival and Departure of a Personnel who fails to use his/her Time Card) </p>
				</div>
				<div>
					<?php var_dump($empdata); ?>
					<table>
						<tbody class='centertexts'>
							<tr>
								<td colspan="2" style='text-align:left;'>
									Missed Time Card Information
								</td>
								<td rowspan="2">
									<span> SIGNATURE HERE </span>
									<p> SIGNATURE OVER PRINTED NAME </p>
								</td>
								<td rowspan="2">
									POSITION
								</td>
								<td rowspan="2">
									DIVISION
								</td>
							</tr>
							<tr>
								<td> DATE </td>
								<td> TIME ( IN / OUT) </td>
							</tr>
						</tbody>
						<tbody>
							<tr>
								<td colspan="5">
									<p class='reasonhead'> REASON / JUSTIFICATION </p>
									<div class='reason_area'>
										<textarea class='reasontxtarea'></textarea>
									</div>
									<div class='hereby_text'> 
										<p> 
											I HEREBY RECOMMEND APPROVAL AND CERTIFIES THAT THE REASON HEREIN STATED IS CORRECT.
										</p>

										<p class='divchief_lbl'> DIVISION CHIEF / OIC </p>
									</div>
								</td>
							</tr>
						</tbody>
						<tbody>
							<tr>
								<td colspan="3">
									<p> RECORDED BY: </p>
								</td>
								<td colspan="2">
									<p> APPROVED BY: </p>
								</td>
							</tr>
						</tbody>
						<tbody>
							<td colspan="5" style="text-align:center; padding:10px 0px;">
								<input type='submit' value='Apply PAF'/>
							</td>
						</tbody>
						<!-- <tbody>
							<td colspan="5">
								<p> REMARKS </p>
								<textarea class='remarks_text'></textarea>
							</td>
						</tbody> -->
					</table>
				</div>
			</div>
		</div>

	</div>
</section>
</div>
