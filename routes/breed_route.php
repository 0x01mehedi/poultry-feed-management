<?php
if($page=="create-breed"){
	$found=include("views/pages/breed/create_breed.php");
}elseif($page=="edit-breed"){
	$found=include("views/pages/breed/edit_breed.php");
}elseif($page=="breeds"){
	$found=include("views/pages/breed/manage_breed.php");
}elseif($page=="details-breed"){
	$found=include("views/pages/breed/details_breed.php");
}elseif($page=="view-breed"){
	$found=include("views/pages/breed/view_breed.php");
}
?>
