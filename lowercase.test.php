<?php
$listdirs = array(
'Test',
'Test/Test',
'Test/Test/tEST',
'Test/AB',
'Test/AB/jojo',
'Test/AB/JAja',
);
$listfiles = array(
'Test/AbC.php',
'Test/image.png',
'Test/Image.png',
'Test/imAge.JPEG',
'Test/Test/abc.TXT',
'Test/AB/UPS.DOC',
'Test/AB/OPS.doc',
);
foreach ($listdirs as $dir) {
  mkdir($dir);
}
foreach ($listfiles as $file) {
  touch($file);
}
