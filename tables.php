/*
* -----------------------------------------------------------------------------
* [Build]
* -----------------------------------------------------------------------------
*/
$smarty = service('smarty');
$smarty->set_Mode('bs5x');
$smarty->assign('type', 'table');
$smarty->assign('header', sprintf(lang('Disa.recommendations-priority-list-title'), $oid));
$smarty->assign('body', '');
$smarty->assign('table', $table);
$smarty->assign('footer', null);
$smarty->assign('file', __FILE__);
echo($smarty->view('components/tables/index.tpl'));
