<?php
require_once "models/teach/assignment/get.an.assignment.model.php";
require_once "models/classroom/get.user.model.php";
require_once "models/enrollment/get.file.submit.model.php";
$assignment_id = $_SESSION['assignment_id'];
$classroom_id = $_SESSION['classroom_id'];
$assign = getAnAssignment($assignment_id);
$user = getUser($email);
$user_id = $user['user_id'];
$file = getFile($assignment_id, $user_id);
if (!empty(isset($file[0]['submit_status']))){
    $done = $file[0]['submit_status'];
}
if (!empty($_FILES['file']['name'])) {
    $file_name = $_FILES['file']['name'];
}
?>
<div>
    <p class="border-top mr-3"></p>
</div>
<div class="mt-2" style="margin-left: 5%; display:flex; justify-content:space-between;">
    <div class="d-flex flex-column " style="width: 68%;">
        <div class="d-flex align-items-center  p-0  justify-content-between">
            <div class=" d-flex flex-row justify-content-between col-11" data-bs-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapse">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 10px; color: white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                        </svg>
                    </div>
                    <h3 class="ml-2 mt-3 text-primary"><?= $assign['title'] ?></h3>
                </div>
            </div>
            <div>
                <div>
                    <div class="dropdown" style="color: blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="dropdown-toggle" type="button" id="dropdownMenuassignment" data-bs-toggle="dropdown" aria-expanded="false" width="22" height="22" fill="currentColor" class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                        </svg>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuassignment">
                            <li>
                                <a class="dropdown-item" href="#">Copy Link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ml-5">
            <div class="ml-4 mt-2">
                <p><?= "Post on" . " " . $assign['post_date'] ?></p>
                <div class="d-flex justify-content-between">
                    <p><b><?= $assign['score'] ?> points</b></p>
                    <p><b>
                            <?php if (!empty($assign['dateline'])) {
                                $date = date_create($assign['dateline']);
                                echo "Due " . date_format($date, "M - d , H:i");
                                $hour =  date_format($date, "H");
                                if ($hour > 11) {
                                    echo "pm";
                                } else {
                                    echo "am";
                                }
                            } else {
                                echo "No due date";
                            }
                            ?>
                        </b></p>
                </div>
            </div>
            <div class="ml-2 border-top border-primary">
                <div class="col-8 mt-3">
                    <p><?= $assign['description'] ?></p>
                    <?php
                    if (!empty($assign['path_file'])) {
                    ?>
                        <a href="<?= $assign['path_file'] ?>" target="_blank" style="text-decoration: none;">
                            <div class="d-flex flex-1 align-items-center rounded shadow-sm" style="border: 1px solid #EDEAE0;">
                                <img src="../../assets/files/drive.png" height="60px" class="border-right p-2">
                                <div class="card-title p-1" style="font-size: 15px;"><?= $assign['file'] ?></div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-sm h-75 " style="width: 25%; margin-right:40px; color: black;">
        <div class="d-flex" style="display: flex; justify-content: space-between; padding-top: 20px;">
            <h5 style="padding-left: 17px;">Your work</h5>
            <span class="d-flex justify-content-end" style="color:green; padding-right:30px; font-size:17px">Assigned</span>
        </div>
        <div class="card-body ">
            <?php
            if (!empty(isset($file_name))) {
            ?>
                <div class=" p-1 d-flex align-items-center border rounded">
                    <img src="../../assets/files/drive.png" style="width: 50px">
                    <a href="../../assets/files/submition.files/<?= $file_name ?>" class="text-decoration-none text-truncate" style="width: 12rem;"><?= $file_name ?></a>
                </div>
                <button data-bs-toggle="collapse" href="#turnin" class="bg-primary mt-3" role="button" aria-expanded="false" aria-controls="turnin" style=" width: 200px;border: none; border-radius:5px; padding:7px; margin-top:15px">
                    <span class="text-white">Turn in</span>
                </button>
                <div class="row" style="width: 600px; ">
                    <div class="col">
                        <div class="collapse multi-collapse" id="trunin">
                            <div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
                                <div class="bg-white p-3 col-xl-4 " style="width:30%; height:33vh; border-radius:10px;">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <p class="mt-1 mb-4">Make as done?</p>
                                        <p class="mt-4" style="font-size: 14px;">You didn't attach work for
                                            "<?= $assign['title'] ?>", so your teacher will just see it's done.</p>
                                        <div class="d-flex justify-content-end" style="margin-top: 20px;">
                                            <a href="" class="btn btn-light">cancel</a>
                                            <button type="submit" class="btn btn-light"><span style="color:teal;">Make as
                                                    done</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else if (!empty($done)) {

            ?>
                <div class="text-center">
                    <p>No work attached</p>
                </div>
                <button data-bs-toggle="collapse" href="#makedone" class="bg-primary mt-3" role="button" aria-expanded="false" aria-controls="makedone" style=" width: 200px;border: none; border-radius:5px; padding:7px; margin-top:15px">
                    <span class="text-white">UnSubmit</span>
                </button>
                <div class="row" style="width: 600px; ">
                    <div class="col">
                        <div class="collapse multi-collapse" id="makedone">
                            <div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
                                <div class="bg-white p-3 col-xl-4 " style="width:30%; height:33vh; border-radius:10px;">
                                    <form action="#" method="post" enctype="multipart/form-data">
                                        <p class="mt-1 mb-4">Make as done?</p>
                                        <p class="mt-4" style="font-size: 14px;">You didn't attach work for "<?= $assign['title'] ?>", so your teacher will just see it's done.</p>
                                        <div class="d-flex justify-content-end" style="margin-top: 20px;">
                                            <a href="" class="btn btn-light">cancel</a>
                                            <a href="../../controllers/enrollment/submit/make.done.controller.php?assignment_id=<?= $assignment_id ?>&user_id=<?= $user_id ?>" class="btn">Make as done</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php

            } else {
            ?>
                <form action="../../controllers/enrollment/submit/make.done.controller.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" id="imgupload" onchange="form.submit()" style="display: none;">
                    <a href="#" class="btn w-100 border " onclick="$('#imgupload').trigger('click'); return false;">+ Add or
                        create</a>
                </form>
                <button data-bs-toggle="collapse" href="#makedone" class="bg-primary mt-3" role="button" aria-expanded="false" aria-controls="makedone" style=" width: 200px;border: none; border-radius:5px; padding:7px; margin-top:15px">
                    <span class="text-white">Make as done</span>
                </button>
                <div class="row" style="width: 600px; ">
                    <div class="col">
                        <div class="collapse multi-collapse" id="makedone">
                            <div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
                                <div class="bg-white p-3 col-xl-4 " style="width:30%; height:33vh; border-radius:10px;">
                                    <form action="#" method="post" enctype="multipart/form-data">
                                        <p class="mt-1 mb-4">Make as done?</p>
                                        <p class="mt-4" style="font-size: 14px;">You didn't attach work for "<?= $assign['title'] ?>", so your teacher will just see it's done.</p>
                                        <div class="d-flex justify-content-end" style="margin-top: 20px;">
                                            <a href="" class="btn btn-light">cancel</a>
                                            <a href="../../controllers/enrollment/submit/make.done.controller.php?assignment_id=<?= $assignment_id ?>&user_id=<?= $user_id ?>" class="btn">Make as done</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>