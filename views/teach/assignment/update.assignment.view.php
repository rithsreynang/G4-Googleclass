<?php
require_once "models/teach/assignment/get.an.assignment.model.php";
session_start();
if (empty(isset($_SESSION['user']))){
	header("Location: /");
	exit;
}

$classroom_id = $_SESSION['classroom_id'];
$assignment_id = $_SESSION['assignment_id'];
$assignment = getAssignment($classroom_id, $assignment_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../../assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Update Assignment </title>
</head>

<body>
    <div class="bg-light">
        <div class="d-flex align-items-center flex-column justify-content-center p-3">
            <img src="../../../assets/images/logo.svg" style="width: 200px;">
            <h2 class="mt-2"><b>Update Assignment</b></h2>
        </div>
        <form
            action="../../../controllers/teach/assignment/update.assignment/confirm.update.assignment.controller.php?classroom_id=<?= $classroom_id ?>&assignment_id=<?= $assignment_id ?>"
            class="d-flex justify-content-center align-items-center" method="post" enctype="multipart/form-data">
            <div class="col-7 bg-light shadow p-3 rounded">
                <div class="d-flex border bg-white shadow-sm rounded justify-center-between">
                    <div class="form-group col-6 p-3 ">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control " value="<?= $assignment['title'] ?>" id="title"
                            placeholder="Title of Assignment" name="title" required>
                    </div>
                    <div class="form-group p-3  ml-2 col-6 rounded">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="1"
                            placeholder="Instruction (Option)"><?= $assignment['description'] ?></textarea>
                    </div>
                </div>
                <div class="form-group border shadow-sm bg-white mt-3 p-3  rounded">
                    <label for="files">Choose Files:</label>
                    <input type="file" class="form-control-file p-2 rounded" id="files" name="file">
                    <small>choose file because when you update the old file will lost.</small>
                </div>
                <div class="d-flex bg-white border shadow-sm rounded justify-center-between mt-2">
                    <div class="form-group p-3 col-6  rounded">
                        <label for="post_date">Score:</label>
                        <input type="number" value="<?= $assignment['score'] ?>" class="form-control" id="dateLine"
                            name="fullscore">
                    </div>
                    <div class="form-group col-6  rounded p-3">
                        <label for="post_date">DateLine:</label>
                        <input type="datetime-local" value="<?= $assignment['dateline'] ?>" class="form-control"
                            id="dateLine" name="dateline">
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a onclick="history.back()"
                        class="ml-3 btn border text-dark text-decoration-none border-white btn-light "
                        style=" margin-right: 25px;">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>