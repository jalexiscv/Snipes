<?php
$title = $strings->get_Clear($requirement["name"]);
$message = $strings->get_Clear($requirement["description"]);
//[build]---------------------------------------------------------------------------------------------------------------
$card = $bootstrap->get_Card("card-view-service", array(
    "title" => lang('Components.list-title'),
    "header-back" => $back,
    "header-list" => '/iso9001/components/list/' . $oid,
    "alert" => array(
        'type' => 'info',
        'title' => $title,
        'message' => $message
    ),
    "content" => $code,
));
echo($card);
?>
