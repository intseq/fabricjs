<?php
include_once("./_common.php");
$mb_id = get_session('ss_mb_id');

if($mb_id){
   $uploaddir=$_SERVER['DOCUMENT_ROOT'] . "/data/editor/";
   $filename = $_FILES['fileupload']['tmp_name']; 
   $uploadfile = $uploaddir . $_FILES['fileupload']['name'];  
   $url = "/data/editor/". $_FILES['fileupload']['name'];  
         if (move_uploaded_file($_FILES['fileupload']['tmp_name'], $uploadfile)) {  
          $data['two']=$uploadfile;
          $data['thr']=$_FILES['fileupload']['name'];
          $data['one']=true; 

          $sql = "
            insert into tb_imgeditor
            set
               mb_id = '$mb_id'
            ,  wdate = now()
            ,  url = '$url'
          ";
          sql_query($sql);

         }else{
            $data['one'] = false;
            $data['two'] = 'noupload';
         }
   echo json_encode($data);  
   die;
}else{
   $data['one'] = false;
   $data['two'] = 'nombid';
   echo json_encode($data);  
   die;
} 
?>