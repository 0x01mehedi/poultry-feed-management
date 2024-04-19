<?php
	echo main_sidebar_dropdown([
		"name"=>"ContactCategory",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-contactcategory","text"=>"Create ContactCategory","icon"=>"far fa-circle nav-icon"],
			["route"=>"contact_categories","text"=>"Manage ContactCategory","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
