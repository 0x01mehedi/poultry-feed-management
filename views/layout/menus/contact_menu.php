<?php
	echo main_sidebar_dropdown([
		"name"=>"CRM",
		"icon"=>"nav-icon fa fa-address-book-o",
		"links"=>[
			["route"=>"create-contact","text"=>"Create Contact","icon"=>"far fa fa-check-square-o nav-icon"],
			["route"=>"contacts","text"=>"Manage Contact","icon"=>"far fa fa-check-square-o nav-icon"],
		]
	]);
?>
