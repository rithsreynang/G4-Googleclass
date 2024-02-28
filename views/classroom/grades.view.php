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
               <a href="../../controllers/classroom/people.controller.php" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">People</a>
               <a href="#" class="p-2 my-2  text-dark text-decoration-none "  style="border-bottom: 3px solid black; ">Grades</a>
           </div>
           <div style="padding-right: 50px;">
                <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
                <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
            </div>
        </div>


        <div class="text-center" style="margin-top: 7%; font-size: 20px; ">
            <img src="../../assets/images/classroom/02.jpg" alt="" width= 350px; height=350px;>
            <p>Create assignment to see grades</p>
            <a href="assignment.php" class=" text-dark text-decoration-none border-0" id="my-link">
                <i class="fa fa-plus"><span class="p-2">Create assigment</span></i>
            </a>
            <style>
                #my-link:hover {
                     background-color: lightgray;
                     padding:10px;
                     border-radius: 10px;
                     }
            </style>
        </div>
   </div> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
