<?php
echo "Usage: sudo php5 lowercase_all.php /path/to/directory/\n";
echo "This script is DANGEROUS if you get the path wrong, so DON'T!\n";

$path = $argv[1];
if (substr($argv[1],-1,1)=='/') {
  $path = substr($path,0,-1);
}

if (!is_dir($path)) {
  die("Could not find directory $path\n. Please review the parameter and start again.");
}

echo "Executing lowercasing on all contents of $path\n";
lower_case($path);

function lower_case($path) {
  $files = scandir($path);
  $curdir = getcwd();
  chdir($path);
  foreach ($files as $entry) {
    if (substr($entry,0,1) == '.') {
      continue; //ignore entries starting with a dot
    }
    if (is_dir($path.'/'.$entry)) {
      lower_case($path.'/'.$entry); //if dir, call recursive on new path
    } else {
      //this should be a file, rename
      exec('mv '.$entry.' '.strtolower($entry));
    }
  } 
  //finally, rename oneself
  chdir($path.'/..');
  $info = pathinfo($path);
  exec('mv '.$info['basename'].' '.strtolower($info['basename']));
  chdir($curdir);
  return true;
}
