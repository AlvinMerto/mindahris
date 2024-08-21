<style>
	.signaturebox {
		
	}
	
	.signaturebox table{
		border-collapse:collapse;
		margin: 50px;
	}
	
	.signaturebox table tr{
		
	}
	
	.signaturebox table tr td{
		border:1px solid #ddd;
		padding:10px;
	}
	
	#turnoff, #turnon {
		padding: 33px;
	}
	
	#turnoff:hover, 
	#turnon:hover {
		cursor:pointer;
		    background: #e8e8e8 !important;
	}
	
	.sstats {
		padding: 50px 0px !important;
	}
</style>
<div class='signaturebox'>
	<table>
		<tr>
			<td id='turnoff'> Turn-Off Signatures </td>
			<td id='turnon'> Turn-On Signatures </td>
		</tr>
		<tr>
			<td colspan='2' class='sstats'>
				<p id='signstatus'> --  </p>
			</td>
		</tr>
	</table>
</div>