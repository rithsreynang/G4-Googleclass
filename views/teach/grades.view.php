<?php
require_once "../../layouts/class/header.php";
require_once "../../layouts/class/navbar.php";
$id = $_GET['classroom_id'];
?>

<body>
    <div class="">
        <div class="d-flex flex-row ml-3 border-secondary" style="margin-top: -10px;"> 
            <div>
                <a href="../../controllers/teach/class.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none border border-primary btn btn-light ">Stream</a>
                <a href="../../controllers/teach/classwork.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none border border-primary btn btn-light  ">Classwork</a>
                <a href="../../controllers/teach/people.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none border border-primary btn btn-light  ">People</a>
                <a href="#" class="text-white text-decoration-none border-1 btn btn-primary">Grades</a>
            </div>
            <div style="padding-right: 50px;">
                <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
                <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
            </div>
        </div>


        <div class="text-center" style="margin-top: 7%; font-size: 20px; ">
            <img src="../../assets/images/classroom/02.jpg" alt="" width=350px; height=350px;>
            <p>Create assignment to see grades</p>
            <a href="assignment.php" class=" text-dark text-decoration-none border-0" id="my-link">
                <i class="fa fa-plus"><span class="p-2">Create assigment</span></i>
            </a>
            <style>
                #my-link:hover {
                    background-color: lightgray;
                    padding: 10px;
                    border-radius: 10px;
                }
            </style>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>