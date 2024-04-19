<?php
	echo main_sidebar_dropdown([
		"name"=>"Product",
		"icon"=>"nav-icon fa fa-code",
		"links"=>[
			["route"=>"create-product","text"=>"Create Product","icon"=>"far fa-circle nav-icon"],
			["route"=>"products","text"=>"Manage Product","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
