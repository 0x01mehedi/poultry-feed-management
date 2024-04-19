<?php
if(isset($_POST["btnDetails"])){
	$mfgbom=MfgBom::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="mfg_boms">Manage MfgBom</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>MfgBom Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$mfgbom->id</td></tr>";
		$html.="<tr><th>Code</th><td>$mfgbom->code</td></tr>";
		$html.="<tr><th>Name</th><td>$mfgbom->name</td></tr>";
		$html.="<tr><th>Product Id</th><td>$mfgbom->product_id</td></tr>";
		$html.="<tr><th>Qty</th><td>$mfgbom->qty</td></tr>";
		$html.="<tr><th>Labour Cost</th><td>$mfgbom->labour_cost</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
