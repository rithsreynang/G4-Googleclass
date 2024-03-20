<?php
require_once "models/teach/assignment/get.an.assignment.model.php";
$assignment_id = $_SESSION['assignment_id'];
$classroom_id = $_SESSION['classroom_id'];
$assign = getAnAssignment($assignment_id);
?>
<div class="" ​ style="margin-left: 180px;">
    <div class="" style="margin-bottom:10px;">
        <a href="#" class="text-white text-decoration-none btn btn-warning mt-2 link">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-book-half mr-2" viewBox="0 0 16 16">
                <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
            </svg>Instruction
        </a>
        <a href="controllers/teach/assignment/view.assignment/student.work.controller.php?classroom_id=<?= $classroom_id ?>&assignment_id=<?= $assignment_id ?>" class="text-dark text-decoration-none btn btn-light border mt-2 link">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-workspace mr-1" viewBox="0 0 16 16">
                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
            </svg>Student work</a>
    </div>

    <div class="mt-2" style=" display:flex; justify-content:space-between;">
        <div class="d-flex flex-column " style="width: 80%;">
            <div class="d-flex border-bottom border-dark align-items-center  p-0  justify-content-between">
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
                                    <a class="dropdown-item" href="../../../controllers/teach/assignment/update.assignment/update.assignment.controller.php?classroom_id=<?= $classroom_id ?>&assignment_id=<?= $assignment_id ?>">Edit</a>
                                </li>
                                <li>
                                    <a type="button" class="dropdown-item" data-toggle="modal" data-target="#deleteModal">
                                        Delete
                                    </a>
                                </li>
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
                <div class=" ml-4 border-top border-primary">
                    <p class='mt-2'><?= $assign['description'] ?> </p>
                </div>
                <?php
                if (!empty($assign['file'])) {
                ?>
                    <div class="border rounded ml-4 d-flex align-items-center">
                        <img src="../../../assets/files/drive.png" style="width: 70px;" class="border rounded-left">
                        <a href="<?= $assign['path_file'] ?>" class="ml-4 text-dark"><?= $assign['file'] ?></a>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this assignment?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-danger" type="button" href="
                    ../../controllers/teach/assignment/delete.assignment/delete.assignment.controller.php?classroom_id=<?= $classroom_id ?>&assignment_id=<?= $assignment_id ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>