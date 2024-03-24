<?php
require_once "models/teach/assignment/get.all.assignments.model.php";
require_once "models/classroom/select.student.model.php";

$id = $_SESSION['classroom_id'];
$allAssignments = getAllAssignment($id);
var_dump($allAssignments);
$email = $_SESSION['user'][1];
$user = getUser($email);
$user_id = $user[0];
$profileName = $user[4];
$students = listStudents($id);

?>
<div class="d-flex" style="margin-left: 10%; border-bottom: 0.5px solid grey;">
    <img class="rounded-circle mb-3" src="assets/images/profile/<?= $profileName ?>" alt="avatar" style="height: 80px;">
    <h3 class="mt-4 ml-4 text-dark"><?= $user['username'] ?></h3>
</div>
<div style="margin-left: 10%;">
    <div class="dropdown mt-4">
        <button class="btn border border-8 shadow-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 250px">
            <span class="p-2" id="selectedText">Select your option</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width:250px;">
            <li><a class="dropdown-item" href="#" onclick="updateSelectedText('All')">All</a></li>
            <li><a class="dropdown-item" href="#" onclick="updateSelectedText('Assigned')">Assigned</a></li>
            <li><a class="dropdown-item" href="#" onclick="updateSelectedText('Turned in')">Turned in</a></li>
            <li><a class="dropdown-item" href="#" onclick="updateSelectedText('Missing')">Missing</a></li>
        </ul>
    </div>
</div>
<div class="mt-4" style="margin-left: 5%;">
    <div class="d-flex flex-column ">
        <?php
        foreach ($allAssignments as $assignment) {
        ?>
            <div class="card p-0 rounded mt-3 col-10">
                <div class="d-flex align-items-center bg-light p-0  justify-content-between col-12">
                    <div class=" d-flex flex-row justify-content-between col-11" data-bs-toggle="collapse" href="#collapse<?= $assignment['assignment_id'] ?>" role="button" aria-expanded="false" aria-controls="collapse<?= $assignment['assignment_id'] ?>">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 7px; color: white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                                </svg>
                            </div>
                            <p class="ml-2 mt-3"><?= $assignment['title'] ?></p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mt-3 fw-bold" style="margin-right: -20px;">
                                <?php if (!empty($assignment['dateline'])) {
                                    // echo $assignment['dateline'];
                                    $date = date_create($assignment['dateline']);
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
                <div class="collapse border-top p-3 card-body " id="collapse<?= $assignment['assignment_id'] ?>">
                    <p>Post <?php
                            $post = date_create($assignment['post_date']);
                            echo date_format($post, "M - d , H:i");
                            $hour =  date_format($post, "H");
                            if ($hour > 11) {
                                echo "pm";
                            } else {
                                echo "am";
                            }
                            ?></p>
                    <div class="row">
                        <div class="col-8">
                            <p><?= $assignment['description'] ?></p>
                            <?php
                            if (!empty($assignment['path_file'])) {
                            ?>
                                <a href="<?= $assignment['path_file'] ?>" target="_blank" style="text-decoration: none;">
                                    <div class="d-flex flex-1 align-items-center rounded shadow-sm" style="border: 1px solid #EDEAE0;">
                                        <img src="../../assets/files/drive.png" height="60px" class="border-right p-2">
                                        <div class="card-title p-1" style="font-size: 15px;"><?= $assignment['file'] ?></div>
                                    </div>
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="border-left col">
                                    <h2>0</h2>
                                    <p>Turn in</p>
                                </div>
                                <div class="border-left col">
                                    <h2><?= count($students) ?></h2>
                                    <p>Assign</p>
                                </div>
                                <div class="border-left col">
                                    <h2>0</h2>
                                    <p>Grades</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-1 mt-1">
                        <a href="../../controllers/enrollment/view-assignment/instruction.controller.php?assignment_id=<?= $assignment['assignment_id'] ?>" class="btn btn-primary">View
                            Instruction</a>
                    </div>

                </div>
            </div>

        <?php
        }

        ?>
    </div>



    <style>
        .dropdown-toggle {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .dropdown-toggle .fa-plus {
            margin-right: 5px;
        }
    </style>

    <script>
        function updateSelectedText(text) {
            document.getElementById('selectedText').innerText = text;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>