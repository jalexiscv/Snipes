$headers=array("surveyable" =>"Encuestable","firstname" =>"Nombres","lastname" =>"Apellidos","rol" =>"Parentesco");
$rows=$msurveyables
    ->select("surveyable,firstname,lastname,rol")
    ->where('family', $oid)
    ->findAll();
$table = $b::get_Table('surveyables', array("headers" => $headers, "rows" => $rows));
