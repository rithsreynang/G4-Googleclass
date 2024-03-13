
<?php
require_once "../../../models/teach/material/get.an.meterial.model.php";
$classroom_id = $_GET['classroom_id'];
$material_id = $_GET['material_id'];
$material = getMaterial($classroom_id, $material_id);
// print_r ($material);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Update Material </title>
</head>
<body>
    <div class="mt-2 d-flex flex-row border-bottom border-secondary" style="font-size:20px; ">
        <a onclick="history.back()" class="ml-5 text-dark text-decoration-none border-0 " style=" margin-right: 25px;"><i class="fa fa-close"></i></a>
        <i class="fa fa-file-text-o" style=" margin-right: 25px; margin-top: 8px;"></i>
        <p>Update Material</p>
    </div>
    <div class="m-3">
        <form action="../../../controllers/teach/material/confirm.update.material.controller.php?classroom_id=<?= $classroom_id ?>&material_id=<?= $material_id ?>" class="d-flex justify-content-center align-items-center" method="post" enctype="multipart/form-data">
            <div class="col-9">
                <div class="form-group p-3 bg-light rounded mt-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" value="<?= $material['title'] ?>" id="title" placeholder="Title of material" name="title">
                </div>
                <div class="form-group p-3 bg-light rounded">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Instruction (Option)"><?= $material['description']?></textarea>
                </div>
                <div class="form-group​ p-3 bg-light rounded">
                    <label for="files">Choose Files:</label>
                    <input type="file" class="form-control-file border p-2 rounded" value="<?= $material['file'] ?>" id="files" name="file">
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