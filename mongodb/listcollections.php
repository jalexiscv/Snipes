<?php
$database = 'c4isr';
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$command = new MongoDB\Driver\Command(['listCollections' => 1]);
$cursor = $manager->executeCommand($database, $command);

echo('Recorrer el cursor y mostrar los nombres de las colecciones');
foreach ($cursor as $document) {
    $c .= "<br>" . $document->name;
}
?>
