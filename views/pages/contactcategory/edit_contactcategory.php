<?php
if(isset($_POST["btnEdit"])){
	$contactcategory=ContactCategory::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}

*/
	if(count($errors)==0){
		$contactcategory=new ContactCategory();
		$contactcategory->id=$_POST["txtId"];
		$contactcategory->name=$_POST["txtName"];

		$contactcategory->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-warning" href="contact_categories">Manage ContactCategory</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-contactcategory' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$contactcategory->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$contactcategory->name"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>