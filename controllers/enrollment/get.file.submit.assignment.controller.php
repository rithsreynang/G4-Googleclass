<?php
   session_start();
   require_once "../../models/enrollment/submit.file.assignment.model.php";
   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $assignment_id = $_GET['assign_id'];
      $user_id = $_GET['user_id'];
      if (isset($_FILES['file'])){
         $file = $_FILES["file"];
         $fileName = $file['name'];
         $fileTemName = $_FILES['file']['tmp_name'];
         $fileSize = $file['size'];
         $fileError = $file['error'];
         $fileType = $file['type'];
         $fileExt = explode('.',$fileName);
         $fileActualExt = strtolower(end($fileExt));
         $allowed = array('jpg','png','jpeg', 'pptx', 'docx', 'xlsx');
         if(in_array($fileActualExt, $allowed)){
            if ($fileError == 0 ){
               if ($fileSize < 10000000){
                  $fileNameNew = uniqid('',true).'.'.$fileActualExt;
                  $fileDestination = '../../assets/files/submition.files/'.$fileName;
                  move_uploaded_file($fileTemName, $fileDestination);
                  $useToSubmit = useToSubmit($assignment_id, $user_id) ;
                  print_r($useToSubmit);
                  if (count($useToSubmit) == 0){
                     submitFile($assignment_id, $user_id, $fileName);
                  }
                  header("Location: /view-instruction-assignment");
               }else{
                  echo "Can not upload file";
               }
            }else{
               echo "Can not upload file";
            }
         }
         
      }
   }
?>