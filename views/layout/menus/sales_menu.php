<?php
	echo main_sidebar_dropdown([
		"name"=>"Sales",
		"icon"=>"nav-icon fa fa-bar-chart",
		"links"=>[			
			//["route"=>"create-customer","text"=>"Create Customer","icon"=>"far fa-circle nav-icon"],
      //["route"=>"customers","text"=>"Manage Customer","icon"=>"far fa-circle nav-icon"],
			["route"=>"daily-sales-report","text"=>"Daily Sales Report","icon"=>"far fa fa-check-square-o nav-icon"]
		]
	]);
?>
