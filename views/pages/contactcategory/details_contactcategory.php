<?php
if(isset($_POST["btnDetails"])){
	$contactcategory=ContactCategory::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-warning" href="contact_categories">Manage ContactCategory</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>ContactCategory Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$contactcategory->id</td></tr>";
		$html.="<tr><th>Name</th><td>$contactcategory->name</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
