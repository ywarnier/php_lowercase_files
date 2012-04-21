<?php
echo "\n\n[Usage] sudo php5 lowercase_all.php /path/to/directory/\n";
echo "        This script is DANGEROUS if you get the path wrong... so DON'T!\n\n";

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
  echo "Getting into $path, ready for action!\n";
  chdir($path);
  foreach ($files as $entry) {
    if (substr($entry,0,1) == '.') {
      continue; //ignore entries starting with a dot
    }
    if (is_dir($path.'/'.$entry)) {
      lower_case($path.'/'.$entry); //if dir, call recursive on new path
    } else {
      //this should be a file, rename
      echo "Changing $path"."/".$entry." to ".strtolower($entry)."\n";
      if (is_dir($path.'/'.strtolower($entry))) {
        if ($path.'/'.strtolower($entry) != $path.'/'.$entry) {
          echo "There is already a directory ".$path."/".strtolower($entry).", so not doing anything\n";
        } else { 
          echo "This directory (".$path.'/'.$entry.") is already lowercase, nothing to do...\n";
        }
      } elseif (file_exists($path.'/'.strtolower($entry))) { 
        if ($path.'/'.strtolower($entry) != $path.'/'.$entry) {
          echo "There is already a file by that name (".$path."/".strtolower($entry)."), so not doing anything\n";
        } else { 
          echo "This file (".$path.'/'.$entry.") is already lowercase, nothing to do...\n";
        }
      } else {
        exec('mv '.$entry.' '.strtolower($entry));
      }
    }
  } 
  //finally, rename oneself
  chdir($path.'/..');
  $info = pathinfo($path);
  if (is_dir($info['dirname'].'/'.strtolower($info['basename']))) {
    echo "There is already a directory called ".$info['dirname'].'/'.strtolower($info['basename']).", so not doing anything...\n";
  } else {
    exec('mv '.$info['basename'].' '.strtolower($info['basename']));
  }
  //$info = pathinfo($curdir);
  //$curdir = substr($curdir,0,-(strlen($info['basename']))).strtolower($info['basename']);
  chdir($curdir);
  return true;
}
