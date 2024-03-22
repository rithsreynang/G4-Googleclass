<?php
require_once "models/classroom/get.user.model.php";
require_once "models/teach/assignment/get.user.assignment.php";
$email_user = $_SESSION['user'][1];
$user_id = getUser($email_user)['user_id'];
$allAssignmentForEnrollStudent = allAssignmentForEnrollStudent($user_id);
foreach ($allAssignmentForEnrollStudent as $assignment) {
    $today = date("Y - M - d , H:i");
    if (!empty($assignment['dateline'])) {
        $date = date_create($assignment['dateline']);
        $format_date = date_format($date, " Y - M - d , H:i");
        if ($today > $format_date){
            echo $today;
            echo "<br>";
            echo $format_date;
            echo "<br>";
        };
    }
};
?>
<div class="border-bottom">
    <div class="" style="margin-bottom:10px;">
        <a href="../../controllers/todo/assigned/assigned.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link border border-8 shadow sm">
            <i class="fas fa-check-circle icon">
                <span class="ml-1">Assigned</span>
            </i></a>
        </a>
        <a href="#" class="text-white text-decoration-none btn btn-primary mt-2 link">Missing</a>
        <a href="../../controllers/todo/todo-view/todo.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link border border-8 shadow sm">Done</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>