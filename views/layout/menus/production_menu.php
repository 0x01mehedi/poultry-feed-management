<?php
	echo main_sidebar_dropdown([
		"name"=>"Production",
		"icon"=>"nav-icon fa fa-industry",
		"links"=>[
			["route"=>"boms","text"=>"Manage Boms","icon"=>"far fa fa-check-square-o nav-icon"],
			["route"=>"production-orders","text"=>"Manage Order","icon"=>"far fa fa-check-square-o nav-icon"],
			["route"=>"productions","text"=>"Manage Production","icon"=>"far fa fa-check-square-o nav-icon"],
			//["route"=>"create-row-materail","text"=>"Create Row materail","icon"=>"far fa-circle nav-icon"]
		]
	]);
?>