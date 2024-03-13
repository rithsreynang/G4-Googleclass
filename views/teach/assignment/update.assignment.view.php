<?php
require_once "../../../models/teach/assignment/get.an.assignment.model.php";
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
    <div class="mt-2 d-flex flex-row border-bottom border-primary" style="font-size:20px; ">
        <i class="fa fa-file-text-o ml-2 text-primary" style="margin-right: 10px; margin-top: 8px;"></i>
        <p class="text-primary"><b>Update Assignment</b></p>
    </div>
    <div class="m-3">
        <form action="../../../controllers/teach/assignment/confirm.update.assignment.controller.php?classroom_id=<?= $classroom_id ?>&assignment_id=<?= $assignment_id ?>" class="d-flex justify-content-center align-items-center" method="post" enctype="multipart/form-data">
            <div class="col-8 bg-white">
                <div class="d-flex bg-light border border-primary rounded justify-center-between">
                    <div class="form-group col-6 p-3 ">
                        <label for="title" class="text-primary">Title:</label>
                        <input type="text" class="form-control " value="<?= $assignment['title'] ?>" id="title" placeholder="Title of Assignment" name="title" required>
                    </div>
                    <div class="form-group p-3 ml-2 col-6 rounded">
                        <label for="description" class="text-primary">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="1" placeholder="Instruction (Option)"><?= $assignment['description'] ?></textarea>
                    </div>
                </div>
                <div class="form-group border border-primary mt-3 p-3 bg-light rounded">
                    <label for="files" class="text-primary">Choose Files:</label>
                    <input type="file" class="form-control-file border-none p-2 rounded" id="file" name="file">
                </div>
                <div class="d-flex bg-light border border-primary rounded justify-center-between mt-2">
                    <div class="form-group p-3 col-6 bg-light rounded">
                        <label for="post_date" class="text-primary">Score:</label>
                        <input type="number" value="<?= $assignment['score'] ?>" class="form-control" id="dateLine" name="fullscore">
                    </div>
                    <div class="form-group col-6 bg-light rounded p-3">
                        <label for="post_date" class="text-primary">DateLine:</label>
                        <input type="datetime-local" value="<?= $assignment['dateline'] ?>" class="form-control" id="dateLine" name="dateline">
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a onclick="history.back()" class="ml-5 btn btn-light border border-primary text-dark text-decoration-none border-0 " style=" margin-right: 25px;">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>