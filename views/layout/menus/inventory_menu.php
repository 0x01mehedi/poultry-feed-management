
<?php
	echo main_sidebar_dropdown([
		"name"=>"Inventroy",
		"icon"=>"nav-icon fa fa-cubes",
		"links"=>[
			//["route"=>"sections","text"=>"Manage Section","icon"=>"far fa-circle nav-icon"],
			//["route"=>"create-product","text"=>"Create Product","icon"=>"far fa-circle nav-icon"],
			["route"=>"products","text"=>"Manage Products","icon"=>"far fa fa-check-square-o nav-icon"],
			["route"=>"customers","text"=>"Manage Customer","icon"=>"far fa fa-check-square-o nav-icon"],
			["route"=>"contact_categories","text"=>"Manage Contact Category","icon"=>"far fa fa-check-square-o nav-icon"],
			//["route"=>"products","text"=>"Manage Products","icon"=>"far fa fa-check-square-o nav-icon"],
			//["route"=>"manufacturers","text"=>"Manage Manufacturers","icon"=>"far fa-circle nav-icon"],
			["route"=>"warehouses","text"=>"Manage Warehouses","icon"=>"far fa fa-check-square-o nav-icon"],
		]
	]);
?>

