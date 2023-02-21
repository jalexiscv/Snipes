<?php
// Creandobase de datos
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017/admin");
$databaseName = "c4isr";
$database = new MongoDB\Database($manager, $databaseName);
// Crear una nueva colección en la base de datos
$collectionName = "breaches";
$options = [];
$collection = $database->createCollection($collectionName, $options);
echo "Base de datos creada con éxito.";
?>
