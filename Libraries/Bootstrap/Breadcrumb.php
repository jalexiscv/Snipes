<?php
/**
* El metodo get_Breadcrumb($menu) recibe como argumento una matriz $menu que representa un menú de navegación,
* y devuelve una cadena de texto que representa un código HTML para generar un panel de navegación o
* "breadcrumb". Este panel de navegación está estructurado utilizando la sintaxis del framework Bootstrap,
* y se compone de un elemento nav que contiene una serie de elementos ul y li que representan los elementos
* del menú. La función itera sobre los elementos de la matriz $menu, y genera el código HTML correspondiente
* para cada uno de ellos. Este código HTML incluye enlaces o "links" a otros elementos o páginas web externas,
* y algunos elementos pueden ser desplegables o contener subcategorías. El metodo en general se utiliza para
* generar un panel de navegación o breadcrumb que se puede utilizar en cualquier sitio web o aplicación
* que use el framework Bootstrap. Cabe resaltar que la función utiliza la clase actual para llamar a otros
* métodos en su estructura, por lo que puede necesitar adaptación para ser utilizada fuera del contexto
* donde es implementada.
* @see https://getbootstrap.com/docs/5.0/components/breadcrumb/
* @see https://github.com/jalexiscv/Snipes/blob/master/Libraries/Bootstrap/Breadcrumb.php
**/
$b = service("bootstrap");
$menu = array(
    array("href" => "/settings/", "text" => "Settings", "class" => false),
    array("href" => "/settings/logos/edit/" . lpk(), "text" => lang("App.Logotypes"), "class" => "active"),
);
echo($b->get_Breadcrumb($menu));
?>
