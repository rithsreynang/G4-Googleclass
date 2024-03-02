<?php
require_once "../../layouts/class/header.php";
require_once "../../layouts/class/navbar.php";
require_once "../../models/classroom/select.classrooms.model.php";
$id = $_GET['classroom_id'];
$class = getClassroom($id);
$class_code = $class['class_code'];
?>

<div class="">
    <div class=" p-2 d-flex flex-row  justify-content-between border-bottom  border-top border-secondary ">
        <div class='nav-item'>
            <a href="#" class="p-2 my-2  text-dark text-decoration-none " style="border-bottom: 3px solid black; ">Stream</a>
            <a href="../../controllers/teach/classwork.controller.php?classroom_id=<?= $id ?>" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">Classwork</a>
            <a href="../../controllers/teach/people.controller.php?classroom_id=<?= $id ?>" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">People</a>
            <a href="../../controllers/teach/grades.controller.php?classroom_id=<?= $id ?>" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">Grades</a>
        </div>
        <div style="padding-right: 50px;">
            <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
            <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
        </div>
    </div>
    <!-- CONTENT FOR SHOW IMAGE AND SOMTHING IN THE CLASSROOM -->
    <div>
        <!-- BANNER IN CLASS -->
        <img src="../../assets/images/classroom/01.jpg" style="width: 96%;" class="mt-2 ml-3 rounded">
        <!-- CONTENT FOR SHOW MEETING, CLASS CODE AND UPCOMMING -->
        <div class="d-flex flex-row justify-content-between p-3">
            <div class=" d-flex flex-column" style="width: 18%;">
                <div class="p-2 border  rounded">
                    <h6>Class code</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-success" id="textBoard"><?= $class_code ?></h5>
                        <button class="btn btn-light" id="button-copy"><i class="fas fa-copy"></i></button>
                    </div>
                </div>
                <div class=" mt-4 border  rounded-3">
                    <h6 style="margin-left: 20px; margin-top: 15px">Upcoming</h6>
                    <p style="margin-left: 20px; margin-top: 25px">No work due soon</p>
                    <a href="view.php" class="p-4 my-3 pb-0 text-dark text-decoration-none border-0 " style="margin-left: 45%; font-weight: bold;">View all</a>
                </div>
            </div>
            <!-- CONTENT FOR SHOW ALL LESSON AND CREATE LESSON -->
            <div style="width: 80%;">
                <div class="  shadow p-3 mt-4 mb-4 bg-body border" style="border-radius: 15px;" id="mydiv">
                    <div href="" class="d-flex flex-row  ">
                        <img src="../../assets/images/classroom/04.jpg" alt="" class="rounded-circle" style="width: 50px; height: 50px;">
                        <p style=" padding: 10px; padding-left:20px;">Announce something to your class</p>
                        <i class="fa fa-retweet" style="font-size:25px; color: grey; margin-left: 60%; padding-top:15px;"></i>
                    </div>
                </div>
                <div class="border d-flex flex-row rounded">
                    <img src="../../assets/images/classroom/03.jpg" alt="" width=300px; height=300px;>
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

<script>
    const copyToClipboard = () => {
        const classCodeElement = document.getElementById('textBoard');
        const classCode = classCodeElement.innerText;

        navigator.clipboard.writeText(classCode)
    };
    const buttonCopy = document.getElementById('button-copy');
    buttonCopy.addEventListener('click', () => {
        copyToClipboard();
    });
</script>

<?php
require_once "../../layouts/class/footer.php";
?>