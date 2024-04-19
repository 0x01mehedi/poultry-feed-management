<?php
	echo main_sidebar_dropdown([
		"name"=>"Stock",
		"icon"=>"nav-icon fa fa-stack-exchange",
		"links"=>[
			["route"=>"create-stock","text"=>"Create Stock","icon"=>"far fa fa-check-square-o nav-icon"],
			["route"=>"stocks","text"=>"Manage Stock","icon"=>"far fa fa-check-square-o nav-icon"],
		]
	]);
?>
