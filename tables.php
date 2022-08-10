<?php
/*
* -----------------------------------------------------------------------------
* [Build]
* -----------------------------------------------------------------------------
*/
$scard = service("smarty");
$scard->caching = 0;
$scard->set_Mode("bs5x");
$scard->assign("type", "normal");
$scard->assign("header", false);
$scard->assign("header_back", false);
$scard->assign("class", "mb-2");
$scard->assign("body",$f.$table );
$scard->assign("footer", null);
$scard->assign("file", __FILE__);
echo($scard->view('components/cards/index.tpl'));
?>

<?php
$stable = service('smarty');
$stable->caching = 0;
$stable->set_Mode('bs5x');
$stable->assign('type', 'table');
$stable->assign('header', lang('Characterize.options-list-title'));
$stable->assign('header_add', "/characterize/options/create/{$oid}");
$stable->assign('body', '');
$stable->assign('table', $table);
$stable->assign('footer', null);
$stable->assign('file', __FILE__);
echo($stable->view('components/tables/index.tpl'));
?>
