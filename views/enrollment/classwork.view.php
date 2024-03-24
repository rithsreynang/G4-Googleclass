<?php
require_once "models/teach/assignment/get.all.assignments.model.php";
require_once "models/teach/material/get.material/get.all.material.model.php";
require_once "models/classroom/select.student.model.php";

$id = $_SESSION['classroom_id'];
$allAssignments = getAllAssignment($id);
$allMaterials = getAllMaterials($id);
$email = $_SESSION['user'][1];
$user = getUser($email);
$user_id = $user[0];
$students = listStudents($id);
$index = 0;
?>
<div class="d-flex flex-row ml-3 border-secondary" style="margin-top: -10px;">
    <div class='ml-5 pt-2 nav-item d-flex align-items-center justify-content-center  border-top'
        style="width: 100%; gap: 10px; margin-top: 20px; ">
        <a href="../../controllers/enrollment/steam/enrollment.controller.php?classroom_id=<?= $id ?>"
            class="text-dark text-decoration-none border-0 btn btn-light  ">
            <div class="d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-houses mr-1" viewBox="0 0 16 16">
                    <path
                        d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207z" />
                </svg>
                Stream
            </div>

        </a>
        <a href="#" class="text-white text-decoration-none  btn btn-primary">
            <div class="d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-person-workspace mr-1" viewBox="0 0 16 16">
                    <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                    <path
                        d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
                </svg>
                Classwork
            </div>
        </a>
        <a href="../../controllers/enrollment/people/people.controller.php?classroom_id=<?= $id ?>"
            class="text-dark text-decoration-none border-0 btn btn-light  ">
            <div class="d-flex align-items-center justify-content-center ">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-people-fill mr-1" viewBox="0 0 16 16">
                    <path
                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                </svg>
                People
            </div>
        </a>
    </div>
    <div style="padding-right: 50px;">
        <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
        <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
    </div>
</div>

<div class="mt-4" style="margin-left: 15%;">
    <a class="btn btn-light border border-8 shadow-sm"
        href="../../controllers/enrollment/classwork/viewmywork.controller.php" style="width: 200px;">View all
        assignment</a>
    <div class="d-flex flex-column ">
        <?php
        if (count($allAssignments) > 0 or count($allMaterials) > 0) {
        
            echo "<h4 class='mt-5'>Assignments</h4> <hr class='dropdown-divider border-primary' style='width: 790px;'>    ";
            foreach ($allAssignments as $assignment) {
        ?>
        <div class="border  p-0 rounded mt-3 col-10">
            <div class="d-flex align-items-center p-0 bg-light rounded justify-content-between col-12">
                <div class=" d-flex flex-row justify-content-between col-12" data-bs-toggle="collapse"
                    href="#collapse<?= $assignment['assignment_id'] ?>" role="button" aria-expanded="false"
                    aria-controls="collapse<?= $assignment['assignment_id'] ?>">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle d-flex"
                            style="background-color: #289AE3 ; padding: 7px; color: white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                            </svg>
                        </div>
                        <p class="ml-2 mt-3"><?= $assignment['title'] ?></p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mt-3 fw-bold">
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
            </div>
            <div class="collapse border-top p-3 card-body " id="collapse<?= $assignment['assignment_id'] ?>">
                <p class=''>Post <?php
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
                    <p class='ml-3'><?= $assignment['description'] ?></p>
                    <?php
                    if (!empty($assignment['path_file'])) {
                    ?>
                    <a href="<?= $assignment['path_file'] ?>" target="_blank" style="text-decoration: none;">
                        <div class="d-flex flex-1 align-items-center rounded shadow-sm"
                            style="border: 1px solid #EDEAE0;">
                            <img src="../../assets/files/drive.png" height="60px" class="border-right p-2">
                            <div class="card-title p-1" style="font-size: 15px;"><?= $assignment['file'] ?></div>
                        </div>
                    </a>
                    <?php
                                }
                                ?>

                </div>
                <div class="card-footer p-1 mt-2">
                    <a href="../../controllers/enrollment/view.assignment/instruction.controller.php?assignment_id=<?= $assignment['assignment_id'] ?>"
                        class="btn btn-primary mt-2">
                        <i class='fas fa-clipboard'>
                            <span>View instruction</span>
                        </i>
                    </a>
                </div>

            </div>
        </div>

        <?php
            }

        ?>

        <?php
            if (count($allMaterials) > 0) {
            ?>
        <h4 class="mt-5">Materials</h4>
        <hr class="dropdown-divider border-primary " style="width: 790px;">
        <?php
            }
            foreach ($allMaterials as $material) {
            ?>
        <div class="card p-0 rounded border-0 mt-3 col-10">
            <div class="d-flex align-items-center border card-header p-0 justify-content-between col-12">
                <div class=" d-flex flex-row justify-content-between col-11" data-bs-toggle="collapse"
                    href="#collapse<?= $index ?>" role="button" aria-expanded="false"
                    aria-controls="collapse<?= $index ?>">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle d-flex"
                            style="background-color: #289AE3 ; padding: 7px; color: white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                <path
                                    d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                            </svg>
                        </div>
                        <p class="ml-2 mt-3 text-dark"> <?= $material['title'] ?></p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mt-3 fw-bold" style="margin-right: -20px;">Posted
                            <?php if (!empty($material['date_post'])) {
                                        $date = date_create($material['date_post']);
                                        echo date_format($date, "M - d , H:i");
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="dropdown-toggle" type="button"
                            id="dropdownMenuassignment" data-bs-toggle="dropdown" aria-expanded="false" width="22"
                            height="22" fill="currentColor"
                            class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
                            <path
                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                        </svg>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuassignment">
                            <li><a class="dropdown-item" href="#">Copy Link</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="collapse border rounded-bottom p-3 card-body " id="collapse<?= $index ?>">
                <a href="../../controllers/enrollment/view.material/details.material.controller.php?material_id=<?= $material['material_id'] ?>"
                    class="btn btn-primary">View
                    Material</a>
            </div>
        </div>
        <?php
                $index--;
            }
            ?>
    </div>

</div>
<?php
        } else {
?>
<div class="mt-5 border-top w-75 text-center">
    <img src="../../assets/images/classroom/02.jpg" alt="" width=300px; height=300px; class="mt-4">
    <p>This is where you'll assign work</p>
    <p>You can add assignments and other work for the <br>class, then organize it into topics</p>
</div>
<?php
        }

?>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>