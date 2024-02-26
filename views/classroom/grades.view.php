<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>grades</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
   <div class="">
        <div class="p-2 d-flex flex-row justify-content-between border-bottom border-top border-secondary">
           
        <div>
               <a href="class-interface.php" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 " >Stream</a>
               <a href="classwork.php" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">Classwork</a>
               <a href="people.php" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">People</a>
               <a href="#" class="p-2 my-2  text-dark text-decoration-none "  style="border-bottom: 3px solid black; ">Grades</a>
           </div>
           <div style="padding-right: 50px;">
                <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
                <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
            </div>
        </div>


        <div class="text-center" style="margin-top: 13%; font-size: 20px; ">
            <img src="PUPPY.png" alt="" width= 250px; height=250px;>
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
