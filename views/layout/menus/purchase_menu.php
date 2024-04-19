<?php
echo main_sidebar_dropdown([
    "name"=>"Purchase",
    "icon"=>"nav-icon fa fa-credit-card",
    "links"=>[
            ["route"=>"create-purchase","text"=>"Create Purchase","icon"=>"far fa fa-check-square-o nav-icon"],
            ["route"=>"manage-purchase","text"=>"Manage Purchase","icon"=>"far fa fa-check-square-o nav-icon"],
            ]
    ]);
?>