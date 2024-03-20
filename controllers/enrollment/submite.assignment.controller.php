<?php
   session_start();
   require_once "../../../models/enrollment/submite_assignment.php";
   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $file = $_FILES[file];
      $fileName = $file['name'];
      $fileTemName = $_FILES['file']['tmp_name'];
      $fileSize = $file['size'];
      $fileError = $file['error'];
      $fileType = $file['type'];
      $fileExt = explode('.',$fileName);
      $fileActualExt = strtolower(end($fileExt));
      $allowed = array('jpg','png','jpeg');
      if(in_array($fileActualExt, $allowed)){
         if ($fileError === 0 ){
            if ($fileSize < 10000000){
               $fileNameNew = uniqid('',true).'.'.$fileActualExt;
               $fileDestination = '../../../assets/file'.$fileNameNew;
               move_uploaded_file($fileTemName, $fileDestination);
               $uploadfile = uploadfile($fileNameNew, $_SESSION['user'][1]);
               if ($uploadfile){
                  header("Location: /home");
               }
            }
         }
      }
   }
   


?>