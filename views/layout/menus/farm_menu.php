<?php
	echo main_sidebar_dropdown([
		"name"=>"Farm Settings",
		"icon"=>"nav-icon fa fa-pagelines",
		"links"=>[
			["route"=>"breeds","text"=>"Manage Breed","icon"=>"far fa fa-check-square-o nav-icon"],
            ["route"=>"feeds","text"=>"Manage Feed","icon"=>"far fa fa-check-square-o nav-icon"],
		]
	]);
?>