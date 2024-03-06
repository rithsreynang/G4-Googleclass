<?php
require_once "../../models/teach/get.assignments.model.php";
$classroom_id = $_GET['classroom_id'];
$assignment_id = $_GET['assignment_id'];
$assignment = getAssignment($classroom_id, $assignment_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Update Assignment </title>
</head>
<body>
    <div class="mt-2 d-flex flex-row border-bottom border-secondary" style="font-size:20px; ">
        <a onclick="history.back()" class="ml-5 text-dark text-decoration-none border-0 " style=" margin-right: 25px;"><i class="fa fa-close"></i></a>
        <i class="fa fa-file-text-o" style=" margin-right: 25px; margin-top: 8px;"></i>
        <p>Update Assignment</p>
    </div>
    <div class="m-3">
        <form action="../../controllers/teach/drop.assignment.controller.php?classroom_id=<?= $id ?>" class="d-flex justify-content-center align-items-center" method="post" enctype="multipart/form-data">
            <div class="col-9">
                <div class="form-group p-3 bg-light rounded mt-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" value="<?= $assignment['title'] ?>" id="title" placeholder="Title of Assignment" name="title" required>
                </div>
                <div class="form-group p-3 bg-light rounded">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Instruction (Option)"><?= $assignment['description']?></textarea>
                </div>
                <div class="form-group​ p-3 bg-light rounded">
                    <label for="files">Choose Files:</label>
                    <input type="file" class="form-control-file border p-2 rounded" id="files" name="file">
                </div>
            </div>
            <div class="aside-right col-3">
                <div class="form-group p-3 bg-light rounded">
                    <label for="post_date">Score:</label>
                    <input type="number" value="<?= $assignment['score'] ?>" class="form-control" id="dateLine" name="fullscore">
                </div>
                <div class="form-group bg-light rounded p-3">
                    <label for="post_date">DateLine:</label>
                    <input type="datetime-local" value="<?= $assignment['dateline'] ?>" class="form-control" id="dateLine" name="dateline">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" style="width: 300px;">Create</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>