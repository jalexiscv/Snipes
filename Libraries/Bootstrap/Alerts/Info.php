<?php
$info = $b->get_Alert(array(
    'type' => 'info',
    'title' => lang('App.Remember'),
    "message" => lang("Security.users-info")
));
echo($info);
?>
