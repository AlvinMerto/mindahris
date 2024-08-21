<?php 
	$hsblk = null;
	$strt  = null;
	$subd  = null;
	$brgy  = null;
	$city  = null;
	$prov  = null;
	$zcode = null;
	
	if (count($data)>0) {
		$hsblk = $data[0]->houseblklot;
		$strt  = $data[0]->street;
		$subd  = $data[0]->subdvill;
		$brgy  = $data[0]->brgy;
		$city  = $data[0]->city;
		$prov  = $data[0]->prov;
		$zcode = $data[0]->zcode;
	}
?>
<div class='row'>
	<div class='col-md-6 inputdiv'>
		<p> House/Block/Lot No. </p>
		<input type='text' id='houseblklot' class='boxprocs' data-isaddr='true' value='<?Php echo $hsblk; ?>'/>
	</div>
	<div class='col-md-6 inputdiv'>
		<p> Street </p>
		<input type='text' id='street' class='boxprocs' data-isaddr='true' value='<?Php echo $strt; ?>'/>
	</div>	
	<div class='col-md-6 inputdiv'>
		<p> Subdivision/Village </p>
		<input type='text' id='subdvill' class='boxprocs' data-isaddr='true' value='<?Php echo $subd; ?>'/>
	</div>	
	<div class='col-md-6 inputdiv'>
		<p> Barangay </p>
		<input type='text' id='brgy' class='boxprocs' data-isaddr='true' value='<?Php echo $brgy; ?>'/>
	</div>
	<div class='col-md-6 inputdiv'>
		<p> City/Municipality </p>
		<input type='text' id='city' class='boxprocs' data-isaddr='true' value='<?Php echo $city; ?>'/>
	</div>
	<div class='col-md-6 inputdiv'>
		<p> Province </p>
		<input type='text' id='prov' class='boxprocs' data-isaddr='true' value='<?Php echo $prov; ?>'/>
	</div>
	<div class='col-md-12 inputdiv'>
		<p> ZIP CODE </p>
		<input type="text" id='zcode' class='boxprocs' data-isaddr='true' value='<?Php echo $zcode; ?>'/>
	</div>
</div>