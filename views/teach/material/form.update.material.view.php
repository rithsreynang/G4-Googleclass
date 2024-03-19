<?php
require_once "models/teach/material/get.material/get.an.meterial.model.php";
session_start();
if (empty(isset($_SESSION['user']))){
	header("Location: /");
	exit;
}
$classroom_id = $_SESSION['classroom_id'];
$material_id = $_SESSION['material_id'];
$material = getMaterial($classroom_id, $material_id);


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

<div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;  height:100vh; width:100%; background-color: rgba(0,0,0,0.2); z-index:10;">
    <div class="bg-white p-3 col-xl-6 rounded d-flex flex-column border border-5 border-primary" >
        <div class=" fw-bold mt-2 d-flex flex-row border-bottom border-primary w-100" style="font-size:20px;  font-weight: bold; ">
            <i class="fa fa-file-text-o" style=" margin-right: 25px; margin-top: 8px; margin-left:30px;"></i>
            <p>Update Material</p>
        </div>
        <div class="mt-2 fw-bold">
            <form action="../../../controllers/teach/material/confirm.update.material.controller.php?classroom_id=<?= $classroom_id ?>&material_id=<?= $material_id ?>" class="d-flex  " method="post" enctype="multipart/form-data">
                <div class="col-12">
                    <div class="form-group p-3 bg-light rounded mt-3 " style="width:100%; font-size:20px;  font-weight: bold;">
                        <label for="title" >Title:</label>
                        <input type="text" class="form-control border border-primary" value="<?= $material['title'] ?>" id="title" placeholder="Title of material" name="title">
                    </div>
                    <div class="form-group p-3 bg-light rounded" style="font-size:20px;  font-weight: bold;">
                        <label for="description">Description:</label>
                        <textarea class="form-control border border-primary" id="description" name="description" rows="5" placeholder="Instruction (Option)"><?= $material['description']?></textarea>
                    </div>  
                    
                    <div class="form-group p-3" >
                        <label for="files" style="font-size:20px;  font-weight: bold;">Choose Files:</label>
                        <input type="file" class="form-control-file p-2 rounded border border-primary" id="files" name="file" multiple accept=".pdf, .doc, .docx" ">

                    </div>           
                    <div class="d-flex justify-content-end mt-3">
                        <a onclick="history.back()" class="ml-3 btn btn-light border border-primary text-dark text-decoration-none border-0 " style=" margin-right: 25px;">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            
            </form>
        </div>
    </div>
</div>
</body>

</html>