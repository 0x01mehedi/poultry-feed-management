<?php
if($page=="create-division"){
	$found=include("views/pages/ui/division/create_division.php");
}elseif($page=="edit-division"){
	$found=include("views/pages/ui/division/edit_division.php");
}elseif($page=="division"){
	$found=include("views/pages/ui/division/manage_division.php");
}elseif($page=="details-division"){
	$found=include("views/pages/ui/division/details_division.php");
}elseif($page=="view-division"){
	$found=include("views/pages/ui/division/view_division.php");
}
?>
