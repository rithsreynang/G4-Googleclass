<?php
    require_once "models/teach/assignment/get.an.assignment.model.php";
    $assignment_id = $_SESSION['assignment_id'];
    $assign = getAnAssignment($assignment_id);
?>

<div class="border-bottom">
    <div class="" style="margin-bottom:10px;">
        <a href="#" class="text-white text-decoration-none btn btn-primary mt-2 link">Instructions</a>
        <a href="controllers/teach/assignment/view.assignment/go.student.work.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link">Student work</a>
    </div>
</div>
<div class="mt-2" style="margin-left: 15%; display:flex; justify-content:space-between;">
    <div class="d-flex flex-column " style="width: 80%;">
        <div class="d-flex align-items-center card-header p-0  justify-content-between">
            <div class=" d-flex flex-row justify-content-between col-11" data-bs-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapse">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 7px; color: white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                        </svg>
                    </div>
                    <p class="ml-2 mt-3"><?= $assign['title'] ?></p>
                </div>
            </div>
            <div style="margin-right: 20px;">
                <div class="dropdown" style="color: blue">
                    <svg xmlns="http://www.w3.org/2000/svg" class="dropdown-toggle" type="button" id="dropdownMenuassignment" data-bs-toggle="dropdown" aria-expanded="false" width="22" height="22" fill="currentColor" class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                    </svg>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuassignment">
                        <li>
                            <a class="dropdown-item" href="#">Edit</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Delete</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Copy Link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="ml-4 mt-2" style="border-bottom: 0.5px solid grey;">
            <p><?= "Post on". " " . $assign['post_date'] ?></p>
            <p><?= $assign['score'] ?></p>
        </div>
        <div class="ml-4 mt-2">
            <p><?= $assign['description'] ?></p>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
