<?php 
echo main_sidebar_dropdown([
    "name"=>"Order",
    "icon"=>"nav-icon fa fa-first-order",
    "links"=>[
        ["route"=>"create-order","text"=>"Create Order","icon"=>"far fa fa-check-square-o nav-icon"],
        ["route"=>"create-orders","text"=>"Create Orders","icon"=>"far fa fa-plus nav-icon"],
        ["route"=>"create-tailor-order","text"=>"Create Tailor Order","icon"=>"far fa fa-check-square-o nav-icon"],
        ["route"=>"orders","text"=>"Manage Order","icon"=>"far fa fa-check-square-o nav-icon"],
    ]
]);

?>