<?php
if(isset($_POST["btnDetails"])){
	$feed=Feed::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-warning" href="feeds">Manage Feed</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Feed Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$feed->id</td></tr>";
		$html.="<tr><th>Name</th><td>$feed->name</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
