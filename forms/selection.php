<?php

$types = array(
         array("label" => "Noticia", "value" => "NEWS"),
          array("label" => "Articulo", "value" => "ARTICLE"),
    );

     $f->fields["type"] = $f->get_FieldSelect("type",
         array(
             "value" => $r["type"],
             "data" => $types,
             "proportion" => "col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"
         )
      );

?>
