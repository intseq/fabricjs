<?php
include_once("./_common.php");
$mb_id = get_session('ss_mb_id');

if($mb_id){
   $sql = "select * from tb_imgeditor where mb_id='$mb_id' ";
   $result = sql_query($sql);
   for($i=0;$row=sql_fetch_array($result);$i++){
     $data[$i]=$row;
   } 
   echo json_encode($data);  
   die;
} 
?>