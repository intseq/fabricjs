<?php

   $data = $_REQUEST['photo'];

   list($type, $data) = explode(';', $data);
   list(, $data)      = explode(',', $data);
   $data = base64_decode($data);  
   $itemoption = $_REQUEST['itemoption'];  
   $gubun = $_REQUEST['gubun'];  
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/data/editor/".$itemoption."_".$gubun.time().'.png', $data);

    echo $data.PHP_EOL;
    echo "시마이".PHP_EOL;
    echo $gubun.PHP_EOL;
    echo $data.PHP_EOL;
    echo $itemoption.PHP_EOL;

    die;
?>