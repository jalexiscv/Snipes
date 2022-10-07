$msurveyables= model('App\Modules\Characterize\Models\Characterize_Surveyables');

$headers=array(
    "surveyable" =>"Encuestable",
    "firstname" =>"Nombres",
    "lastname" =>"Apellidos",
    "rol" =>"Parentesco",
    "birthday" => "Nacimiento",
    "options" =>"Opciones"
);
$rows=$msurveyables->select("surveyable,firstname,lastname,rol,birthday")->where('family', $oid)->findAll();

$iview = HtmlTag::tag('i', array('class' => 'icon far fa-eye'), "");
$iedit = HtmlTag::tag('i', array('class' => 'icon far fa-edit'));
$idelete = HtmlTag::tag('i', array('class' => 'far fa-trash'));

for($i = 0; $i < count($rows); $i++){

    $surveyable= $rows[$i]["surveyable"];
    $lview=$b::get_Link('view',array("text" => lang("App.View"),"icon" => "far fa-eye", "href" =>"/characterize/surveyables/view/{$surveyable}","class" =>"btn-outline-secondary"));
    $leditor=$b::get_Link('edit', array("text" => lang("App.Edit"), "icon" => "icon far fa-edit", "href" => "/characterize/surveyables/edit/{$surveyable}", "class" => "btn-outline-secondary"));
    $ldeleter = $b::get_Link('delete', array("text" => lang("App.Delete"), "icon" => "far fa-trash", "href" => "/characterize/surveyables/delete/{$surveyable}", "class" => "btn-outline-secondary"));

    $options= $b::get_BtnGroup('btng',array($lview, $leditor, $ldeleter));

    $rows[$i]=array_merge($rows[$i],array("options"=> $options));
}
$table = $b::get_Table('surveyables', array("headers" => $headers, "rows" => $rows));
