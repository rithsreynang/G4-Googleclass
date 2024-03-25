<?php
require_once "models/teach/assignment/get.an.assignment.model.php";
require_once "models/classroom/get.user.model.php";
require_once "models/enrollment/get.file.submit.model.php";
require_once "models/teach/assignment/get.score.model.php";
$assignment_id = $_SESSION['assignment_id'];
$classroom_id = $_SESSION['classroom_id'];
$assign = getAnAssignment($assignment_id);
$user = getUser($email);
$user_id = $user['user_id'];
$file = getFile($assignment_id, $user_id);
$score_user =  getScore($assignment_id, $user_id);
if (!empty($file) && (!empty($file['submit_status'] == 'turnin')) && (empty($file['file_path']))){
    $done = 'makeDone';
}
else if (!empty($file) && ($file['submit_status'] == 'turnin') && (!empty($file['file_path']))){
    $turnIn = $file['file_path'];
}
else if (!empty($file) && ($file['submit_status'] == 'assign')){
    $file_name = $file['file_path'];
}


?>
<div class=" d-flex border-top border-secondary" style="margin-top: 12px">
    <div class="pl-5 d-flex flex-column col-8 mt-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 10px; color: white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor"
                        class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                        <path
                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                    </svg>
                </div>
                <h3 class="ml-2 mt-3 text-primary"><?= $assign['title'] ?></h3>
            </div>
        </div>
        <div class="ml-4">
            <div class="ml-4 mt-2">
                <p><?= "Post on" . " " . $assign['post_date'] ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class=" d-flex align-items-center" style="width: 200px;"><?php
                        if (!empty($score_user)){
                        ?>
                        <p class=""><b><?=$score_user['score'] ?>/</b></p>
                    <?php
                    }
                    ?>
                        <p class=""><b><?= $assign['score'] ?> points</b></p>
                    </div>
                    <p >
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
                        </p></b>
                </div>
            </div>
            <div class="ml-2 border-top">
                <div class="col-8 mt-3">
                    <p><?= $assign['description'] ?></p>
                    <?php
                    if (!empty($assign['path_file'])) {
                    ?>
                    <a href="<?= $assign['path_file'] ?>" target="_blank" style="text-decoration: none;">
                        <div class="d-flex flex-1 align-items-center rounded shadow-sm"
                            style="border: 1px solid #EDEAE0;">
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
    <div class="card shadow-sm mt-5 col-3 p-0 h-75">
        <div class="d-flex mt-2">
            <h5 class='pl-4'>Your work</h5>
        </div>
        <div class="card-body" style="height: 100px; margin-top: 15px">
            <?php
            if (isset($file_name)) {
            ?>
            <div class="  border rounded rounded d-flex align-items-center">
                <img src="../../../assets/files/drive.png" style="width: 55px">
                <a href="../../../assets/files/submition.files/<?= $file_name ?>" style="width: 8rem;"
                    class=" ml-2 text-truncate text-decoration-none"><?= $file_name ?>
                </a>
                <a href="../../controllers/enrollment/submit/delete.submit.controller.php?submit_id=<?= $file['submit_id']?> "
                    data-toggle="tooltip" data-placement="top" title="Delete this file!">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-x-circle text-danger" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </a>
            </div>
            <div>
                <button data-bs-toggle="collapse" href="#turnInAssignment" class="bg-primary mt-3" role="button"
                    aria-expanded="false" aria-controls="turnInAssignment"
                    style=" width: 210px;border: none; border-radius:5px; padding:7px; margin-top:15px">
                    <span class="text-white">Turn in </span>
                </button>
                <div class="row" style="width: 600px; ">
                    <div class="col">
                        <div class="collapse multi-collapse" id="turnInAssignment">
                            <div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center"
                                style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
                                <div class="bg-white p-3 col-xl-4 " style="width:30%; height:33vh; border-radius:10px;">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <p class="mt-1 mb-4">Turn in your work?</p>
                                        <p class="mt-4" style="font-size: 14px;">1 attachment will be submitted for
                                            "<?= $assign['title'] ?>".</p>
                                        <div class="d-flex justify-content-end" style="margin-top: 20px;">
                                            <a href="" class="btn">cancel</a>
                                            <a href="../../controllers/enrollment/submit/turnIn.assignment.controller.php?assignment_id=<?= $assignment_id ?>&user_id=<?= $user_id ?>"
                                                class="btn"><span style="color:teal;">Turn
                                                    in</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            } else if(isset($done)) {
            ?>
            <div>
                <div class="text-center mt-3">
                    <p>No work attached
                    </p>
                </div>
                <button data-bs-toggle="collapse" href="#unsubmitassignment" class="bg-primary mt-3" role="button"
                    aria-expanded="false" aria-controls="unsubmitassignment"
                    style=" width: 210px;border: none; border-radius:5px; padding:7px; margin-top:15px">
                    <span class="text-white">Unsubmit </span>
                </button>
                <div class="row" style="width: 600px; ">
                    <div class="col">
                        <div class="collapse multi-collapse" id="unsubmitassignment">
                            <div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center"
                                style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
                                <div class="bg-white p-3 col-xl-4 " style="width:30%; height:33vh; border-radius:10px;">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <p class="mt-1 mb-4">Unsubmit?</p>
                                        <p class="mt-4" style="font-size: 14px;">Unsubmit to add or change
                                            attachments.
                                            Don't forget to resubmit once you're done.</p>
                                        <div class="d-flex justify-content-end" style="margin-top: 20px;">
                                            <a href="" class="btn btn-light">cancel</a>
                                            <a href="../../controllers/enrollment/submit/delete.submit.controller.php?submit_id=<?= $file['submit_id']?>   "
                                                class="btn btn-white"><span style="color:teal">Unsubmit
                                                </span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            } else if(isset($turnIn)) {
            ?>
            <div>
                <div class=" border rounded d-flex align-items-center">
                    <img src="../../../assets/files/drive.png" style="width: 60px">
                    <a href="../../../assets/files/submition.files/<?= $turnIn
                    ?>" style="width: 8rem;" class=" ml-2 text-truncate "><?= $turnIn ?>
                    </a>
                </div>
                <button data-bs-toggle="collapse" href="#updateSubmit" class="bg-primary mt-3" role="button"
                    aria-expanded="false" aria-controls="updateSubmit"
                    style=" width: 210px;border: none; border-radius:5px; padding:7px; margin-top:1px">
                    <span class="text-white">Unsubmit </span>
                </button>
                <div class="row" style="width: 600px; ">
                    <div class="col">
                        <div class="collapse multi-collapse" id="updateSubmit">
                            <div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center"
                                style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
                                <div class="bg-white p-3 col-xl-4 " style="width:30%; height:33vh; border-radius:10px;">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <p class="mt-1 mb-4">Unsubmit?
                                        </p>
                                        <p class="mt-4" style="font-size: 14px;">Unsubmit to add or change
                                            attachments.
                                            Don't forget to resubmit once you're done..</p>
                                        <div class="d-flex justify-content-end" style="margin-top: 20px;">
                                            <a href="" class="btn ">cancel</a>
                                            <a href="../../controllers/enrollment/submit/unsubmit.controller.php?submit_id=<?= $file['submit_id']?>"
                                                type="submit" class="btn t ">
                                                <span style="color:teal;">Unsubmit</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }else{            
            ?>
            <div>
                <form
                    action="../../controllers/enrollment/submit/get.file.submit.assignment.controller.php?assign_id=<?= $assignment_id ?>&user_id=<?= $user_id ?>"
                    method="post" enctype="multipart/form-data">
                    <input type="file" name="file" id="imgupload" onchange="form.submit()" style="display: none;">
                    <a href="#" class="btn w-100 border " onclick="$('#imgupload').trigger('click'); return false;">+
                        Add or
                        create</a>
                </form>
                <button data-bs-toggle="collapse" href="#makedone" class="bg-primary mt-3" role="button"
                    aria-expanded="false" aria-controls="makedone"
                    style="width: 210px; border: none; border-radius:5px; padding:7px; margin-top:15px">
                    <span class="text-white">Make as done</span>
                </button>
                <div class="row" style="width: 600px; ">
                    <div class="col">
                        <div class="collapse multi-collapse" id="makedone">
                            <div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center"
                                style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
                                <div class="bg-white p-3 col-xl-4 " style="width:30%; height:33vh; border-radius:10px;">
                                    <p class="mt-1 mb-4">Make as done?</p>
                                    <p class="mt-4" style="font-size: 14px;">You didn't attach work
                                        for
                                        "<?= $assign['title'] ?>", so your teacher will just see
                                        it's done.</p>
                                    <div class="d-flex justify-content-end" style="margin-top: 20px;">
                                        <a href="" class="btn">cancel</a>
                                        <a href="../../controllers/enrollment/submit/make.done.controller.php?assignment_id=<?= $assignment_id ?> & user_id=<?= $user_id ?>"
                                            class="btn"><span style="color:teal;">Make as
                                                done</span></button>
                                    </div>
                                </div>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>