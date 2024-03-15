<?php
require_once "../../../models/teach/assignment/drop.assignment.model.php";
require_once "../../../models/classroom/get.user.model.php";
$fileDestination = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //set time in phonm penh
    date_default_timezone_set("Asia/Phnom_Penh");

    //get asssignment info
    $classroom_id = htmlspecialchars($_GET['classroom_id']);
    $user_id = htmlspecialchars($_GET['user_id']);
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $score = htmlspecialchars($_POST['fullscore']);

    //get datetime of assignment
    $dateline = htmlspecialchars($_POST['dateline']);

    $filename = "";
    $filepath = "";
    // Check file size
    if (isset($_FILES['file'])) {
        $targetDir = "../../../assets/files/"; // Corrected target directory
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowed = array('jpg', 'png', 'jpeg', 'pdf', 'pptx', 'zip', 'txt', 'docx', 'gif', 'xlsx', 'html', 'json', 'js', 'css');
        if ($_FILES["file"]["size"] > 5000000) { // Adjust the size limit as needed (5MB in this case)
            $uploadOk = 0;
        }
        if (!in_array($fileType, $allowed)) {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                $filename = basename($_FILES["file"]["name"]);
                $filepath = $targetFile;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    $postDate = date("Y-m-d h:i:sa");
    createAssignment($title, $postDate, $classroom_id, $dateline, $description, $filename, $user_id, $score, $filepath);
    header("location: ../classwork.controller.php?classroom_id=$classroom_id");
};




?>
<script>
    $("#createAssignment").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form which will reload the page

        var form = $(this); //get the form

        $.ajax({
            type: "POST",
            url: "The php script posting the form to",
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
                // show response from the php script.
            }
        });

    });
</script>