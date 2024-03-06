<?php
require_once "../../layouts/class/header.php";
require_once "../../layouts/class/navbar.php";
$id = $_GET['classroom_id'];
?>


<div class="">
    <div class="p-2 d-flex flex-row justify-content-between border-bottom border-top border-secondary">
        <div>
            <a href="../../controllers/classroom/class.controller.php?classroom_id=<?= $id ?>" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">Stream</a>
            <a href="../../controllers/classroom/classwork.controller.php?classroom_id=<?= $id ?>" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">Classwork</a>
            <a href="#" class="p-2 my-2  text-dark text-decoration-none " style="border-bottom: 3px solid black; ">People</a>
            <a href="../../controllers/classroom/grades.controller.php?classroom_id=<?= $id ?>" class="p-4 my-2 text-dark text-decoration-none border-0 ">Grades</a>
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
        <a data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
            <i class="fa fa-user-plus" style="font-size: 20px; padding-top: 20px; padding-left: 15px;"></i>
        </a>
    </div>
    <div class="row" style="width: 900px;" id="multiCollapseExample1">
        <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
                    <div class="bg-white p-3 col-xl-6 " style="width:35%; height:60vh;">
                        <form action="../../controllers/email/email.controller.php" method="post" enctype="multipart/form-data">
                            <h4 class="text-success mt-1 mb-4 border-bottom">Invite link</h4>
                            <div class="text-success mt-1 mb-4  border-bottom">
                                <p>Invite link</p>
                                <a href="">http://localhost:3000/controllers/classroom/people.controller.php</a>
                            </div>
                            <input type="email" class="form-control mt-3" name="email" placeholder="Type a name or email">
                            <div class="d-flex justify-content-end mt-2">
                                <a href="" class="btn btn-light">cancel</a>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>