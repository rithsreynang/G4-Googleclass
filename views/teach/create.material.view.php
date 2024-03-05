<?php
  $id = $_GET['classroom_id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Classwork_material </title>
</head>
<body>

  <div class="mt-2 d-flex flex-row border-bottom border-secondary" style="font-size:20px; ">

      <a class="ml-5 text-dark text-decoration-none border-0 " style=" margin-right: 25px;"><i class="fa fa-close"></i></a>
      <i class="fa fa-file-text-o" style=" margin-right: 25px; margin-top: 8px;"></i>
      <p>Meterial</p>
  </div>

<div class="container mt-5">

  <form action="process_material.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="files">Choose Files:</label>
      <input type="file" class="form-control-file border p-2 rounded" id="files" name="files[]" multiple accept=".pdf, .doc, .docx" required>
      
    </div>

    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title" required>
    </div>
    
    <div class="form-group">
      <label for="post_date">Post Date:</label>
      <input type="datetime-local" class="form-control" id="post_date" name="post_date" required>
    </div>
    
    <div class="form-group">
      <label for="link">Link:</label>
      <input type="text" class="form-control" id="link" name="link" required>
    </div>
    
    
    <button type="submit" class="btn btn-primary d-flex justify-content-end" style="margin-left: 94%;">Create</button>
  </form>
</div>

</body>
</html>
