<?php

function newfile($msg){

  $Nfiles = fopen("Logger.txt", "a");
  $txt = date("Y-m-d H:i:s")."_"."Erreur"."_".$msg."\n";
  fwrite($Nfiles, $txt);
  fclose($Nfiles);

};
?>