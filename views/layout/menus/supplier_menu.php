<?php
	echo main_sidebar_dropdown([
		"name"=>"Supplier",
		"icon"=>"nav-icon fa fa-subway",
		"links"=>[
			["route"=>"create-supplier","text"=>"Create Supplier","icon"=>"far fa fa-check-square-o nav-icon"],
			["route"=>"suppliers","text"=>"Manage Supplier","icon"=>"far fa fa-check-square-o nav-icon"],
		]
	]);
?>
