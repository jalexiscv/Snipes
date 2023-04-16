$s = service('strings');
$b = service('bootstrap');   
$info = $b->get_Alert(array(
        'type' => 'info',
        'title' => 'SInt (Sistema de Inteligencia)',
        "message" => lang("Cases.sints-info")
    ));
