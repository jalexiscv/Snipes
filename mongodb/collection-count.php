<?php

//[Total-Count]
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->c4isr->breaches;
$total = $collection->CountDocuments();

?>
