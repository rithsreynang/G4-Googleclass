<?php
require_once "../../layouts/class/header.php";
require_once "../../layouts/class/navbar.php";
require_once "../../models/classroom/select.classrooms.model.php";
$id = $_GET['classroom_id'];
$class = getClassroom($id);
$class_code = $class['class_code'];
?>
<div class="">
    <div class="d-flex flex-row ml-3 border-secondary" style="margin-top: -10px;">
        <div class='nav-item'>
            <a href="#" class="text-dark text-decoration-none border-0 btn btn-warning">Stream</a>
            <a href="../../controllers/teach/classwork.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none border-0 btn btn-light ">Classwork</a>
            <a href="../../controllers/teach/people.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none border-0 btn btn-light ">People</a>
            <a href="../../controllers/teach/grades.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none border-0 btn btn-light ">Grades</a>
        </div>
        <div style="padding-right: 50px;">
            <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
            <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
        </div>
    </div>
    <!-- CONTENT FOR SHOW IMAGE AND SOMTHING IN THE CLASSROOM -->
    <div>
        <!-- BANNER IN CLASS -->
        <img src="../../assets/images/classroom/01.jpg" style="width: 96%;" class="mt-4 ml-3 rounded">
        <!-- CONTENT FOR SHOW MEETING, CLASS CODE AND UPCOMMING -->
        <div class="d-flex flex-row justify-content-between p-3">
            <div class=" d-flex flex-column" style="width: 18%;">
                <div class="p-3 border shadow rounded">
                    <h6>Class code</h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-warning" id="textBoard"><?= $class_code ?></h5>
                        <button class="btn btn-light" id="button-copy"><i class="fas fa-copy"></i></button>
                    </div>
                </div>
                <div class="mt-3 border rounded">
                    <div class="pl-3 ">
                        <h6 class=" mt-3">Upcoming</h6>
                        <p class="">No work due soon</p>
                        <a href="view.php" class="my-3 text-warning text-decoration-none btn p-1 btn-light">View all</a>
                    </div>
                </div>
            </div>
            <!-- CONTENT FOR SHOW ALL LESSON AND CREATE LESSON -->
            <div style="width: 79%;">
                <div class="shadow p-3 mb-3 bg-body rounded border" id="mydiv">
                    <div href="" class="d-flex flex-row align-items-center">
                        <img src="../../assets/images/classroom/04.jpg" alt="" class="rounded-circle" style="width: 50px; height: 50px;">
                        <p class="ml-2 mt-3">Announce something to your class</p>
                        <!-- <i class="fa fa-retweet" style="font-size:25px; color: grey; margin-left: 60%; padding-top:15px;"></i> -->
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
        navigator.clipboard.writeText(classCode);
    };
    const buttonCopy = document.getElementById('button-copy');
    buttonCopy.addEventListener('click', () => {
        copyToClipboard();
    });
</script>

<?php
require_once "../../layouts/class/footer.php";
?>