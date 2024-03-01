<?php

session_start();
require "../../models/classroom/update.profile.user.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTemName = $_FILES['file']['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'png', 'jpeg');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {
                $fileNameNew = uniqid('', true) . '.' . $fileActualExt;
                $fileDestination = '../../assets/images/profile/' . $fileNameNew;
                move_uploaded_file($fileTemName, $fileDestination);
                $profileUpload = uploadProfile($fileNameNew, $_SESSION['user'][1]);
                if ($profileUpload){
                    header("Location: /home");
                }
            }
        } 
    }
}

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
    <div class="bg-white p-3 col-xl-4">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="d-flex align-items-center justify-content-center">
                <img class="avatar-img rounded-circle shadow d-flex justify-content-center" src="../../assets/images/avatar/01.jpg" alt="avatar" style="width: 100px;">
            </div>
            <input type="file" class="form-control mt-3 w-10" name="file" placeholder="Choose file">
            <div class="submit d-flex justify-content-center mt-2">
                <button type="submit" name="submit" class="btn btn-success m-1 mt-3">Update</button>
                <a href="/home" class="btn btn-primary m-1 mt-3">Cancel</a>
            </div>
        </form>
    </div>
</div>