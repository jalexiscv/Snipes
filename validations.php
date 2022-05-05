<?php

/** Files Examples **/
$portrait = $f->get_fieldId("portrait");
$landscape = $f->get_fieldId("landscape");
$f->set_ValidationRule("portrait","uploaded[{$portrait}]|mime_in[{$portrait},image/png,image/jpg,image/jpeg]");
$f->set_ValidationRule("landscape","uploaded[{$landscape}]|mime_in[{$landscape},image/png,image/jpg,image/jpeg]");

?>
