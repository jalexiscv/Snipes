<?php
$server = service("server");
$file = $request->getFile($f->get_fieldId("file"));
$path = "/storages/" . md5($server::get_FullName()) . "/social/slides";
$realpath = ROOTPATH . "public" . $path;
if (!file_exists($realpath)) {
  mkdir($realpath, 0777, true);
}
if ($file->isValid()) {
  $rname = $file->getRandomName();
  $file->move($realpath, $rname);
  $name = $file->getClientName();
  $type = $file->getClientMimeType();
  $d['file'] = "{$path}/{$rname}";
}

?>
