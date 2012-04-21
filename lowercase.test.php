<?php
$listdirs = array(
'Test',
'Test/Test',
'Test/Test/tEST',
);
$listfiles = array(
'Test/AbC.php',
'Test/image.png',
'Test/Image.png',
'Test/imAge.JPEG',
'Test/Test/abc.TXT',
);
foreach ($listdirs as $dir) {
  mkdir($dir);
}
foreach ($listfiles as $file) {
  touch($file);
}
