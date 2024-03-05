<?php
   require_once "../../layouts/class/header.php";
   require_once "../../layouts/class/navbar.php"; 
   $id = $_GET['classroom_id'];
?>
        <div class="d-flex flex-row ml-3 border-secondary" style="margin-top: -10px;">
           <div>
               <a href="../../controllers/teach/class.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none border-0 btn btn-light  " >Stream</a>
               <a href="#" class="text-dark text-decoration-none border-0 btn btn-warning">Classwork</a>
               <a href="../../controllers/teach/people.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none border-0 btn btn-light  ">People</a>
               <a href="../../controllers/teach/grades.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none border-0 btn btn-light  ">Grades</a>
           </div>
           <div style="padding-right: 50px;">
                <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
                <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
            </div>
        </div>

    <div class="mt-4" style="margin-left: 15%;">
        <button style="border-radius: 30px; background:black; padding: 10px;"> 
            <i class="fa fa-plus" style=" color: white; font-size:20px; "><span class="p-2">Create</span></i>
        </button>
        <div class="mt-5 border-top w-75 text-center" >
            <img src="../../assets/images/classroom/02.jpg" alt="" width=300px; height=300px; class="mt-4" >
            <p>This is where you'll assign work</p>
            <p>You can add assignments and other work for the <br>class, then organize it into topics</p>
        </div>

    </div>
        
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
