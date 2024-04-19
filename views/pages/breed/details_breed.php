<?php
if(isset($_POST["btnDetails"])){
	$breed=Breed::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-warning" href="breeds">Manage Breed</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Breed Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$breed->id</td></tr>";
		$html.="<tr><th>Name</th><td>$breed->name</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
