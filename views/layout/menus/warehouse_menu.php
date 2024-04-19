<?php
	echo main_sidebar_dropdown([
		"name"=>"Warehouse",
		"icon"=>"nav-icon fa fa-home",
		"links"=>[
			["route"=>"create-warehouse","text"=>"Create Warehouse","icon"=>"far fa fa-check-square-o nav-icon"],
			["route"=>"warehouses","text"=>"Manage Warehouse","icon"=>"far fa fa-check-square-o nav-icon"],
		]
	]);
?>
