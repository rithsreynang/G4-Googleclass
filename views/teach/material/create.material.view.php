<?php
session_start();
$id = $_SESSION['classroom_id'];
if (empty(isset($_SESSION['user']))){
  header("Location: /");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../../assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Classwork_material </title>
</head>

<body >
<div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;  height:100vh; width:100%; background-color: rgba(0,0,0,0.2); z-index:10;">
    <div class="bg-white p-3 col-xl-6 rounded d-flex flex-column border border-5 border-primary" >
        <div class=" fw-bold mt-2 d-flex flex-row border-bottom border-primary w-100" style="font-size:20px;  font-weight: bold; ">
            <i class="fa fa-file-text-o" style=" margin-right: 25px; margin-top: 8px; margin-left: 20px;"></i>
             <p> Update meterial</p>
        </div>
    

        <div class="container mt-3 p-3 " style="background: #FFFF;">

            <form
                action="../../../controllers/teach/material/create.material/drop.material.controller.php?classroom_id=<?= $id ?>"
                method="post" enctype="multipart/form-data">
                <div class="col-12">
                    <div class="form-group p-3 bg-light rounded mt-3 " style="width:100%; font-size:20px;  font-weight: bold;">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control border border-primary" id="title" name="title"
                            placeholder="Enter the title of material...">
                    </div>

                    <div class="form-group p-3 bg-light rounded" style="font-size:20px;  font-weight: bold;">
                        <label for="description">Description:</label>
                        <textarea class="form-control border border-primary" id="description" name="description" rows="3"
                            placeholder="Enter the description of the material.. "></textarea>
                    </div>



                    <div class="form-group p-3">
                        <label for="files" style="font-size:20px;  font-weight: bold;">Choose Files:</label>
                        <input type="file" class="form-control-file border p-2 rounded border-primary" id="files" name="file" multiple accept=".pdf, .doc, .docx" ">

                    </div>

                    
                    <div class="d-flex justify-content-end mt-3">
                        <a onclick="history.back()" class="ml-3 btn btn-light border border-primary text-dark text-decoration-none border-0 " style=" margin-right: 25px;">Cancel</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                
                </div>    <!-- </a> -->
    </div>
  </form>
</div>

</body>

</html>