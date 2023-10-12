<?php
$b = service("bootstrap");
$card = $b->get_Card("delete-{$oid}", array(
    "class" => "card-info",
    "icon" => ICON_WARNING,
    'title' => sprintf(lang("Clients.delete-title"), $name),
    "text-class" => "text-center",
    "text" => sprintf(lang("Clients.delete-message"), $name),
    'content' => $f,
));
echo($card); 
?>
