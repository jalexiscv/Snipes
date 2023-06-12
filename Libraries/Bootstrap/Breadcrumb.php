<?php
/**
* Este ejemplo permite crear un Breadcrumb a partir del uso del servicio Bootstrap, en el Higgs Framework 
**/
$b = service("bootstrap");
$menu = array(
    array("href" => "/settings/", "text" => "Settings", "class" => false),
    array("href" => "/settings/logos/edit/" . lpk(), "text" => lang("App.Logotypes"), "class" => "active"),
);
echo($b->get_Breadcrumb($menu));
?>
