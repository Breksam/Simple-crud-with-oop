<?php 

    // routes templetes
    $temp = "includes/templetes/";
    $css = "layouts/css/";
    $js = "layouts/js/";

    // routes templetes
    $func = "includes/functions/";

    // includes 
    include $func . 'func.php';
    include $temp . 'header.php';
    include $temp . 'navbar.php';
    include 'database.php';
    $db = new Database();


