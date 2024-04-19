<?php
	echo main_sidebar_dropdown([
		"name"=>"Feed",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-feed","text"=>"Create Feed","icon"=>"far fa-circle nav-icon"],
			["route"=>"feeds","text"=>"Manage Feed","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
