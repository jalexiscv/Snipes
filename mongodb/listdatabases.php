<?php

$client = new MongoDB\Client("mongodb://localhost:27017");
$databases = $client->listDatabases();
// Muestra el nombre de cada base de datos
foreach ($databases as $database) {
    $c .= $database->getName() . "<br>\n";
}


?>
