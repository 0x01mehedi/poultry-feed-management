<?php
	echo main_sidebar_dropdown([
		"name"=>"Product Category",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-productcategory","text"=>"Create ProductCategory","icon"=>"far fa-circle nav-icon"],
			["route"=>"product_categories","text"=>"Manage ProductCategory","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
