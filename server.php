<?php
header('Access-Control-Allow-Origin: *');

$output_dir = "uploads/";   //設定上傳路徑
if(isset($_FILES["myfile"]))
{
 $ret = array();
 $error =$_FILES["myfile"]["error"];      //錯誤訊息
 if(!is_array($_FILES["myfile"]["name"])) //單一檔案
 {
   $fileName = $_FILES["myfile"]["name"];  //檔案名稱
   move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);//1:原始檔案名稱2:路徑/檔名
   $ret[]= $fileName;
 }
 else //多檔傳送
 {
    $fileCount = count($_FILES["myfile"]["name"]);
    for($i=0; $i < $fileCount; $i++)
    {
      $fileName = $_FILES["myfile"]["name"][$i];
      move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName);
      $ret[]= $fileName;
    }
 
   }
   echo json_encode($ret);
 }

 ?>