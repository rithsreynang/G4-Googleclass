<?php
require_once "../../layouts/class/header.php";
require_once "../../layouts/class/navbar.php";
require_once "../../layouts/class/footer.php";
require_once "../../models/classroom/select.student.model.php";

$id = $_GET["classroom_id"];
$students = listStudents($id);

?>
<body>
    <div class="">
        <div class="p-2 d-flex flex-row justify-content-between border-bottom border-top border-secondary">
                <div>
                    <a href="../../controllers/teach/class.controller.php?classroom_id=<?= $id ?>" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 " >Stream</a>
                    <a href="../../controllers/teach/classwork.controller.php?classroom_id=<?= $id ?>" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">Classwork</a>
                    <a href="#" class="p-2 my-2  text-dark text-decoration-none "  style="border-bottom: 3px solid black; ">People</a>
                    <a href="../../controllers/teach/grades.controller.php?classroom_id=<?= $id ?>" class="p-4 my-2 text-dark text-decoration-none border-0 " >Grades</a>
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
        <!-- get data student role = student here -->
        <?php foreach ($students as $student) { ?>
            <div class="d-flex justify-content-between">
                <div class="ml-6" style="margin-left: 135px; margin-top: 15px;">
                    <img src="../../assets/images/profile/<?= $student["profile"] ?>" alt="profile " class="rounded-circle" style="width: 40px; height: 40px;">
                    <span style="padding-left: 15px;"><?= $student["username"] ?></span>
                </div>
                <a href="https://mail.google.com/mail/u/1/?view=cm&fs=1&to=<?= $student['email'] ?>&tf=1" target="_blank" style="padding-top:23px; text-align: left; margin-right: 130px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16 ">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                    </svg>
                </a>
            </div>
        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>