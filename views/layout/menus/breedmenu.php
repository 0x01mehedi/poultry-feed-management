<?php
	echo main_sidebar_dropdown([
		"name"=>"Breed",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-breed","text"=>"Create Breed","icon"=>"far fa-circle nav-icon"],
			["route"=>"breeds","text"=>"Manage Breed","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
