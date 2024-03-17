<?php
session_start();
$id = $_SESSION['classroom_id'];
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../../assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Create Assignment </title>
</head>

<body>
    <div class=" bg-light d-flex flex-column">
        <div class="d-flex align-items-center flex-column justify-content-center m-2">
            <img src="../../../assets/images/logo.svg" style="width: 200px;">
            <h2 class="mt-2"><b>Create Assignment</b></h2>
        </div>
        <form
            action="../../../controllers/teach/assignment/create.assignment/drop.assignment.controller.php?classroom_id=<?= $id ?>&user_id=<?= $user_id ?>"
            class="d-flex justify-content-center align-items-center" method="post" enctype="multipart/form-data">
            <div class="col-7 p-3 shadow rounded">
                <div class="d-flex bg-white border rounded justify-center-between">
                    <div class="form-group  col-6 p-3 ">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" placeholder="Title of Assignment"
                            name="title" required>
                    </div>
                    <div class="form-group bg-white p-3 col-6 rounded">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="1"
                            placeholder="Instruction (Option)"></textarea>
                    </div>
                </div>
                <div class="form-group border  mt-3 p-3 bg-white rounded">
                    <label for="files">Choose Files:</label>
                    <input type="file" class="form-control-file p-2 rounded" id="files" name="file">
                </div>
                <div class="d-flex bg-white border rounded justify-center-between mt-2">
                    <div class="form-group p-3 col-6 rounded">
                        <label for="post_date">Score:</label>
                        <input type="number" value="100" class="form-control" id="dateLine" name="fullscore">
                    </div>
                    <div class="form-group col-6 rounded p-3">
                        <label for="post_date">DateLine:</label>
                        <input type="datetime-local" class="form-control" id="dateLine" name="dateline">
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button onclick="history.back()" class="ml-5 btn border "
                        style=" margin-right: 25px;">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
        </form>
    </div>
</body>

</html>