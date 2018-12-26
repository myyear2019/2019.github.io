<?php

$files = array_diff(scandir("_posts"), array('.', '..'));

$md5string = "";
foreach ($files as $file) {
  $md5string .= md5_file("_posts/".$file);
}

$oldmd5 = file_get_contents("oldmd5");
$newmd5 = md5($md5string);

if ($oldmd5 != $newmd5) {
  file_put_contents("oldmd5", $newmd5);
  shell_exec("./deploy.sh");
}