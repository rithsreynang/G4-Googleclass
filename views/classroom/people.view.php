<?php
   require_once "../../layouts/class/header.php";
   require_once "../../layouts/class/navbar.php"; 
?>

<body>
    <div class="">
        <div class="p-2 d-flex flex-row justify-content-between border-bottom border-top border-secondary">
                <div>
                    <a href="../../controllers/classroom/class.controller.php" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 " >Stream</a>
                    <a href="../../controllers/classroom/classwork.controller.php" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">Classwork</a>
                    <a href="#" class="p-2 my-2  text-dark text-decoration-none "  style="border-bottom: 3px solid black; ">People</a>
                    <a href="../../controllers/classroom/grades.controller.php" class="p-4 my-2 text-dark text-decoration-none border-0 " >Grades</a>
                </div>
                <div style="padding-right: 50px;">
                    <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
                    <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
                </div>
                
        </div>
        
        <div>
            <div class="mt-5 d-flex flex-row justify-content-between  w-75" style="margin-left: 12.5%; border-bottom: 1px solid black;">
                <p style="font-size: 35px;">Teachers</p>
                <i class="fa fa-user-plus" style="font-size: 20px; padding-top: 20px; "></i>
            </div>

            <img src="../../assets/images/classroom/04.jpg" alt="" class="rounded-circle" style="width: 40px; height: 40px; margin-left: 13%; margin-top: 20px;"><span style="padding-left: 15px;">Sreynang Rith</span>
        </div>

        <div class="mt-5 d-flex flex-row justify-content-between  w-75" style="margin-left: 12.5%; border-bottom: 1px solid black;">
            <h2>Students</h2>
            <i class="fa fa-user-plus" style="font-size: 20px;"></i>
        </div>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
