<?php
if($page=="create-contactcategory"){
	$found=include("views/pages/contactcategory/create_contactcategory.php");
}elseif($page=="edit-contactcategory"){
	$found=include("views/pages/contactcategory/edit_contactcategory.php");
}elseif($page=="contact_categories"){
	$found=include("views/pages/contactcategory/manage_contactcategory.php");
}elseif($page=="details-contactcategory"){
	$found=include("views/pages/contactcategory/details_contactcategory.php");
}elseif($page=="view-contactcategory"){
	$found=include("views/pages/contactcategory/view_contactcategory.php");
}
?>
