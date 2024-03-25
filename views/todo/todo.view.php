<?php

require_once "models/enrollment/get.all.submit.model.php";
require_once "models/classroom/get.user.model.php";
$user_id =  getUser($_SESSION['user'][1])['user_id'];
$assignmentDone = getAllAssignmentSumit($user_id);
// print_r($assignmentSubmit);
?>

<div class="border-bottom">
    <div class="" style="margin-bottom:10px;">
        <a href="../../controllers/todo/assigned/assigned.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link border border-8 shadow sm">
            <i class='fas fa-user-check'>
                <span>Assigned</span>
            </i>
        </a>
        </a>
        <a href="../../controllers/todo/missing/missing.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link border border-8 shadow sm">
            <i class='fas fa-exclamation-circle'>
                <span>Missing</span>
            </i>
        </a>
        <a href="#" class="text-white text-decoration-none btn btn-primary mt-2 link">
            <i class="fas fa-check-circle icon">
                <span class="ml-1">Done</span>
            </i>
        </a>
    </div>
</div>
<div class="mt-4" style="margin-left: 5%;">
    <div class="d-flex flex-column">
        <h4 class="mt-3">Assignments has submited</h4>
        <hr class="dropdown-divider border-primary" style="width: 790px;">

        <?php foreach ($assignmentDone as $assignment) : ?>
            <div class="card p-0 rounded mt-3 col-10">
                <div class="d-flex align-items-center bg-light p-0 justify-content-between col-12">
                    <div class="d-flex flex-row justify-content-between col-11" data-bs-toggle="collapse" href="#collapse<?= $assignment['assignment_id'] ?>" role="button" aria-expanded="false" aria-controls="collapse<?= $assignment['assignment_id'] ?>">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 7px; color: white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                                </svg>
                            </div>
                            <p class="ml-2 mt-3"><?= $assignment['title'] ?></p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="fw-bold" style="margin-right: -20px;">
                                <?php
                                if (!empty($assignment['path_file'])) {
                                    $date = date_create($assignment['path_file']);
                                    echo "Due " . date_format($date, "M - d , H:i");
                                    $hour = date_format($date, "H");
                                    echo ($hour > 11) ? "pm" : "am";
                                } else {
                                    echo "<br>Submitted " . $assignment['submit_date'];
                                }
                                ?>
                                
                            </p>
                        </div>
                    </div>
                    <div style="margin-right: 20px;">
                        <div class="dropdown" style="color: blue">
                            <svg xmlns="http://www.w3.org/2000/svg" class="dropdown-toggle" type="button" id="dropdownMenuassignment" data-bs-toggle="dropdown" aria-expanded="false" width="22" height="22" fill="currentColor" class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                            </svg>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuassignment">
                                <li><a class="dropdown-item" href="#">Copy Link</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="collapse<?= $assignment['assignment_id'] ?>">
                    <div class="mb-2">
                        <p class="mt-3 ml-3"><?= $assignment['description'] ?></p>
                        <div class="p-3k col-4">
                            <?php
                            if (!empty($assignment['file_path'])) {
                            ?>
                                <a href="../../assets/files/<?= $assignment['file_path'] ?>" target="_blank" style="text-decoration: none;">
                                    <div class="d-flex flex-1 align-items-center rounded shadow-sm " style="border: 1px solid #EDEAE0;">
                                        <img src="../../assets/files/drive.png" height="60px" class="border-right p-2">
                                        <div class="card-title p-1 text-truncate" style="font-size: 15px; margin-top:18px"><?= $assignment['file_path'] ?></div>
                                    </div>
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="card-footer p-1 mt-2 ml-2 mb-2">
                        <a href="../../controllers/enrollment/view.assignment/instruction.controller.php?assignment_id=<?= $assignment['assignment_id'] ?>" class="btn btn-primary border border-8 shadow sm">
                            <i class='fas fa-clipboard'>
                                <span>View instruction</span>
                            </i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>