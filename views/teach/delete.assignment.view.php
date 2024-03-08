<?php
$classroom_id = $_GET['classroom_id'];
$assignment_id = $_GET['assignment_id'];
?>
<div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;  height:100vh; width:100%; background-color: rgba(0,0,0,0.75); z-index:10;">
    <div class="bg-white p-3 d-flex flex-column justify-content-center col-xl-5 rounded">
        <h4 class="text-success mt-1 text-center">Are you sure to delete this assignment???</h4>
        <div class="d-flex justify-content-center  mt-2">
            <a href="/" class="btn btn-sucess">cancal</a>
            <a href= "../../controllers/teach/delete.modify.assignment.controller.php?classroom_id=<?= $classroom_id ?>&assignment_id=<?= $assignment_id ?>" class="ml-1 btn btn-danger">Delete Now</a>
        </div>
    </div>
</div>