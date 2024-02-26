<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <!-- LINK FOR ORTHER PAGE -->
   <div class="" >
        <div class="p-2 d-flex flex-row  justify-content-between border-bottom  border-top border-secondary ">
            <div class=>
                <a href="#" class="p-2 my-2  text-dark text-decoration-none "  style="border-bottom: 3px solid black; ">Stream</a>
                <a href="classwork.php" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">Classwork</a>
                <a href="people.php" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">People</a>
                <a href="grades.php" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">Grades</a>
            </div>
            <div style="padding-right: 50px;">
                    <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
                    <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
            </div>
        </div>
        <!-- CONTENT FOR SHOW IMAGE AND SOMTHING IN THE CLASSROOM -->
        <div>
            <!-- BANNER IN CLASS -->
            <img src="banner.jpg" alt="" style="width: 80%; border-radius: 15px; margin-left: 10%; margin-top: 3%;"> 
            <!-- CONTENT FOR SHOW MEETING, CLASS CODE AND UPCOMMING -->
           <div class="d-flex flex-row ">
                <div class=" d-flex flex-column" style="width: 18%; margin-left:9%; padding: 30px; ">
                    <div class=" border  rounded-3">
                        <h6 style="margin-left: 20px; margin-top: 10px">Meeting</h6>
                        <h6 class=" p-2  border  rounded text-center " style="width: 80%; margin: 20px;">Generate link</h6>
                    </div>
                    <div class=" mt-4 border  rounded-3">
                        <h6 style="margin-left: 20px; margin-top: 15px">Class code</h6>
                        <h3 style="margin-left: 20px; margin-top: 25px">q6mma4a</h3>
                        
                    </div>
                    <div class=" mt-4 border  rounded-3">
                        <h6 style="margin-left: 20px; margin-top: 15px">Upcoming</h6>
                        <p style="margin-left: 20px; margin-top: 25px">No work due soon</p>
                        <a href="view.php" class="p-4 my-3 pb-0 text-dark text-decoration-none border-0 " style="margin-left: 45%; font-weight: bold;">View all</a>
                    </div>
                   
               </div>              
                <!-- CONTENT FOR SHOW ALL LESSON AND CREATE LESSON -->
                <div style="width: 63%;">
                    <div class="  shadow p-3 mt-4 mb-4 bg-body border" style="border-radius: 15px;" id="mydiv" >
                        <div href="" class="d-flex flex-row  ">
                            <img src="teacher.jpg" alt="" class="rounded-circle" style="width: 50px; height: 50px;">
                            <p style=" padding: 10px; padding-left:20px;">Announce something to your class</p>
                            <i class="fa fa-retweet" style="font-size:25px; color: grey; margin-left: 60%; padding-top:15px;"></i>              
                        </div>
                    </div>
                    <div class="border d-flex flex-row rounded">
                        <img src="dog.png" alt="" width=200px; height=200px;>
                        <div class="mt-5">
                            <p style="font-size: 30px;">This is where you can talk to your class</p>
                            <p>Use the stream to share announcements, post assignments, and respond o student questions</p>                    
                            <i class="fa fa-gear" style="padding: 10px; border: 1px solid grey; border-radius: 5px; margin-left:73%; margin-top:10px;"><span class="p-2">Stream settings</span></i>
                                
                        </div>
                    </div>
                        
                        
                </div>
           </div>
        </div>

   </div> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
