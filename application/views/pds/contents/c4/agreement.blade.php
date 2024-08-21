<h6 class='headertext' id='headertext' data-boxbelong='questiontbl'> Please answer the questions below: </h6>
<hr style='margin-bottom: -6px;'/>
<div class='row'>		
		<?php 
			$show = "donot";
			if (count($data)>0) {
				foreach($data as $d) {
					${"q".$d->fld}  = $d->details; 
					${$d->fld} 		= $d->val_u;
				}
			}
			
		?>
		<div class='slidehold'>
			<ul class='number'> 
			<li> 
				<p> Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed, </p>
				<div class='col-md-12'>
					<div class='row'>
						<div class='col-md-12'>
							<ol class='letter'> 
								<li> 
									<p> within the third degree? </p>
									<div class='col-md-12 removepad'>
										<label class="btn <?php if (isset($q1)){if($q1=="yes"){echo"btn-primary";$show='displaynow';}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q1' class='btnanswer' data-val='q1' value='yes' <?php if (isset($q1)){if($q1=="yes"){echo"checked";}} ?>/> Yes
										</label>
										<label class="btn <?php if (isset($q1)){if($q1=="no"){echo"btn-primary";}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q1' class='btnanswer' data-val='q1' value='no' <?php if (isset($q1)){if($q1=="no"){echo "checked";}} ?>/> No
										</label>
										
											<div class='inputdiv <?php echo $show; $show='donot';?>'>
												<p> If yes, please specify </p>
												<input type='text' id='details' class='boxprocs resetcaps' data-hasextra='true' data-xfldval='q1' value='<?php echo @$qq1; ?>'/>
											</div>
									</div>
								</li>

								<li> 
									<p> within the fourth degree (for Local Government Unit - Career Employees)? </p>
									<div class='col-md-12 removepad'>
										<label class="btn <?php if (isset($q2)){if($q2=="yes"){echo"btn-primary";$show="displaynow";}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q2' class='btnanswer' data-val='q2' value='yes' <?php if (isset($q2)){if($q2=="yes"){echo "checked";}} ?>/> Yes
										</label>
										<label class="btn <?php if (isset($q2)){if($q2=="no"){echo"btn-primary";}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q2' class='btnanswer' data-val='q2' value='no' <?php if (isset($q2)){if($q2=="no"){echo "checked";}} ?>/> No
										</label>
											
											<div class='inputdiv <?php echo $show; $show='donot';?>'>
												<p> If yes, please specify </p>
												<input type='text' id='details' class='boxprocs resetcaps' data-hasextra='true' data-xfldval='q2' value='<?php echo @$qq2; ?>'/>
											</div>
									</div>
								</li>
							</ol>
						</div>
					</div>
				</div>
			</li>
			<li>
				<p> </p>
				<div class='col-md-12'>
					<div class='row'>
						<div class='col-md-12'>
							<ol class='letter'> 
								<li> 
									<p> Have you ever been found guilty of any administrative offense? </p>
									<div class='col-md-12 removepad'>
										<label class="btn <?php if (isset($q3)){if($q3=="yes"){echo"btn-primary";$show='displaynow';}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q3' class='btnanswer' data-val='q3' value='yes' <?php if (isset($q3)){if($q3=="yes"){echo "checked";}} ?>/> Yes
										</label>
										<label class="btn <?php if (isset($q3)){if($q3=="no"){echo"btn-primary";}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q3' class='btnanswer' data-val='q3' value='no' <?php if (isset($q3)){if($q3=="no"){echo "checked";}} ?>/> No
										</label>
										
											<div class='inputdiv <?php echo $show; $show='donot'; ?>'>
												<p> If yes, please specify </p>
												<input type='text' id='details' class='boxprocs resetcaps' data-hasextra='true' data-xfldval='q3' value='<?php echo @$qq3; ?>'/>
											</div>
									</div>
								</li>

								<li> 
									<p> Have you been criminally charged before any court? </p>
									<div class='col-md-12 removepad'>
										<label class="btn <?php if (isset($q4)){if($q4=="yes"){echo"btn-primary";$show='displaynow';}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q4' class='btnanswer' data-val='q4' value='yes' <?php if (isset($q4)){if($q4=="yes"){echo "checked";}} ?>/> Yes
										</label>
										<label class="btn <?php if (isset($q4)){if($q4=="no"){echo"btn-primary";}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q4' class='btnanswer' data-val='q4' value='no' <?php if (isset($q4)){if($q4=="no"){echo "checked";}} ?>/> No
										</label>
										
											<div class='inputdiv <?php echo $show; $show='donot'; ?>'>
												<p> If yes, please specify </p>
												<input type='text' id='details' class='boxprocs resetcaps' data-hasextra='true' data-xfldval='q4' value='<?php echo @$qq4; ?>'/>
											</div>
									</div>
								</li>
							</ol>
						</div>
					</div>
				</div>
			</li>
			<li>
				<p> Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal? </p>
				<div class='row'>
						<div class='col-md-12 removepad'>
							<label class="btn <?php if (isset($q5)){if($q5=="yes"){echo"btn-primary";$show='displaynow';}else{echo"btn-secondary";}} ?>">
								<input type='radio' name='q5' class='btnanswer' data-val='q5' value='yes' <?php if (isset($q5)){if($q5=="yes"){echo "checked";}} ?>/> Yes
							</label>
							<label class="btn <?php if (isset($q5)){if($q5=="no"){echo"btn-primary";}else{echo"btn-secondary";}} ?>">
								<input type='radio' name='q5' class='btnanswer' data-val='q5' value='no' <?php if (isset($q5)){if($q5=="no"){echo "checked";}} ?>/> No
							</label>
								
								<div class='inputdiv <?php echo $show; $show='donot'; ?>'>
									<p> If yes, please specify </p>
									<input type='text' id='details' class='boxprocs resetcaps' data-hasextra='true' data-xfldval='q5' value='<?php echo @$qq5; ?>'/>
								</div>
						</div>
				</div>
			</li>
			<li>
				<p> Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector? </p>
				<div class='row'>
						<div class='col-md-12 removepad'>
							<label class="btn <?php if (isset($q6)){if($q6=="yes"){echo"btn-primary";$show='displaynow';}else{echo"btn-secondary";}} ?>">
								<input type='radio' name='q6' class='btnanswer' data-val='q6' value='yes' <?php if (isset($q6)){if($q6=="yes"){echo "checked";}} ?>/> Yes
							</label>
							<label class="btn <?php if (isset($q6)){if($q6=="no"){echo"btn-primary";}else{echo"btn-secondary";}} ?>">
								<input type='radio' name='q6' class='btnanswer' data-val='q6' value='no' <?php if (isset($q6)){if($q6=="no"){echo "checked";}} ?>/> No
							</label>
							
								<div class='inputdiv <?php echo $show; $show='donot'; ?>'>
									<p> If yes, please specify </p>
									<input type='text' id='details' class='boxprocs resetcaps' data-hasextra='true' data-xfldval='q6' value='<?php echo @$qq6; ?>'/>
								</div>
						</div>
				</div>
			</li>
			<li>
				<p> </p>
				<div class='col-md-12'>
					<div class='row'>
						<div class='col-md-12'>
							<ol class='letter'> 
								<li> 
									<p> Have you ever been a candidate in a national or local election held within the last year (except Barangay election)? </p>
									<div class='col-md-12 removepad'>
										<label class="btn <?php if (isset($q7)){if($q7=="yes"){echo"btn-primary";$show='displaynow';}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q7' class='btnanswer' data-val='q7' value='yes' <?php if (isset($q7)){if($q7=="yes"){echo "checked";}} ?>/> Yes
										</label>
										<label class="btn <?php if (isset($q7)){if($q7=="no"){echo"btn-primary";}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q7' class='btnanswer' data-val='q7' value='no' <?php if (isset($q7)){if($q7=="no"){echo "checked";}} ?>/> No
										</label>
										
											<div class='inputdiv <?php echo $show; $show='donot'; ?>'>
												<p> If yes, please specify </p>
												<input type='text' id='details' class='boxprocs resetcaps' data-hasextra='true' data-xfldval='q7' value='<?php echo @$qq7; ?>'/>
											</div>
									</div>
								</li>

								<li> 
									<p> Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate? </p>
									<div class='col-md-12 removepad'>
										<label class="btn <?php if (isset($q8)){if($q8=="yes"){echo"btn-primary";$show='displaynow';}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q8' class='btnanswer' data-val='q8' value='yes' <?php if (isset($q8)){if($q8=="yes"){echo "checked";}} ?>/> Yes
										</label>
										<label class="btn <?php if (isset($q8)){if($q8=="no"){echo"btn-primary";}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q8' class='btnanswer' data-val='q8' value='no' <?php if (isset($q8)){if($q8=="no"){echo "checked";}} ?>/> No
										</label>
										
											<div class='inputdiv <?php echo $show; $show='donot'; ?>'>
												<p> If yes, please specify </p>
												<input type='text' id='details' class='boxprocs resetcaps' data-hasextra='true' data-xfldval='q8' value='<?php echo @$qq8; ?>'/>
											</div>
									</div>
								</li>
							</ol>
						</div>
					</div>
				</div>
			</li>
			<li>
				<p> Have you acquired the status of an immigrant or permanent resident of another country? </p>
				<div class='row'>
						<div class='col-md-12 removepad'>
							<label class="btn <?php if (isset($q9)){if($q9=="yes"){echo"btn-primary";$show='displaynow';}else{echo"btn-secondary";}} ?>">
								<input type='radio' name='q9' class='btnanswer' data-val='q9' value='yes' <?php if (isset($q9)){if($q9=="yes"){echo "checked";}} ?>/> Yes
							</label>
							<label class="btn <?php if (isset($q9)){if($q9=="no"){echo"btn-primary";}else{echo"btn-secondary";}} ?>">
								<input type='radio' name='q9' class='btnanswer' data-val='q9' value='no' <?php if (isset($q9)){if($q9=="no"){echo "checked";}} ?>/> No
							</label>
							
								<div class='inputdiv <?php echo $show; $show='donot'; ?>'>
									<p> If yes, please specify </p>
									<input type='text' id='details' class='boxprocs resetcaps' data-hasextra='true' data-xfldval='q9' value='<?php echo @$qq9; ?>'/>
								</div>
						</div>
				</div>
			</li>
			<li>
				<p> Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items: </p>
				<div class='col-md-12'>
					<div class='row'>
						<div class='col-md-12'>
							<ol class='letter'> 
								<li> 
									<p> Are you a member of any indigenous group? </p>
									<div class='col-md-12 removepad'>
										<label class="btn <?php if (isset($q10)){if($q10=="yes"){echo"btn-primary";$show='displaynow';}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q10' class='btnanswer' data-val='q10' value='yes' <?php if (isset($q10)){if($q10=="yes"){echo "checked";}} ?>/> Yes
										</label>
										<label class="btn <?php if (isset($q10)){if($q10=="no"){echo"btn-primary";}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q10' class='btnanswer' data-val='q10' value='no' <?php if (isset($q10)){if($q10=="no"){echo "checked";}} ?>/> No
										</label>
										
											<div class='inputdiv <?php echo $show; $show='donot'; ?>'>
												<p> If yes, please specify </p>
												<input type='text' id='details' class='boxprocs resetcaps' data-hasextra='true' data-xfldval='q10' value='<?php echo @$qq10; ?>'/>
											</div>
									</div>
								</li>

								<li> 
									<p> Are you a person with disability? </p>
									<div class='col-md-12 removepad'>
										<label class="btn <?php if (isset($q11)){if($q11=="yes"){echo"btn-primary";$show='displaynow';}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q11' class='btnanswer' data-val='q11' value='yes' <?php if (isset($q11)){if($q11=="yes"){echo "checked";}} ?>/> Yes
										</label>
										<label class="btn <?php if (isset($q11)){if($q11=="no"){echo"btn-primary";}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q11' class='btnanswer' data-val='q11' value='no' <?php if (isset($q11)){if($q11=="no"){echo "checked";}} ?>/> No
										</label>
										
											<div class='inputdiv <?php echo $show; $show='donot'; ?>'>
												<p> If yes, please specify </p>
												<input type='text' id='details' class='boxprocs resetcaps' data-hasextra='true' data-xfldval='q11' value='<?php echo @$qq11; ?>'/>
											</div>
									</div>
								</li>

								<li> 
									<p> Are you a solo parent? </p>
									<div class='col-md-12 removepad'>
										<label class="btn <?php if (isset($q12)){if($q12=="yes"){echo"btn-primary";$show='displaynow';}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q12' class='btnanswer' data-val='q12' value='yes' <?php if (isset($q12)){if($q12=="yes"){echo "checked";}} ?>/> Yes
										</label>
										<label class="btn <?php if (isset($q12)){if($q12=="no"){echo"btn-primary";}else{echo"btn-secondary";}} ?>">
											<input type='radio' name='q12' class='btnanswer' data-val='q12' value='no' <?php if (isset($q12)){if($q12=="no"){echo "checked";}} ?>/> No
										</label>
										
											<div class='inputdiv <?php echo $show; $show='donot'; ?>'>
												<p> If yes, please specify </p>
												<input type='text' id='details' class='boxprocs resetcaps' data-hasextra='true' data-xfldval='q12' value='<?php echo @$qq12; ?>'/>
											</div>
									</div>
								</li>
							</ol>
						</div>
					</div>
				</div>
			</li>
		</ul>
		</div>

		
</div>
