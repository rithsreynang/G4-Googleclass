<?php
require_once "../../layouts/class/header.php";
require_once "../../layouts/class/navbar.php";
require_once "../../models/teach/assignment/get.all.assignments.model.php";
require_once "../../models/teach/assignment/get.an.assignment.model.php";
require_once "../../models/classroom/select.student.model.php";

// $id = $_GET['classroom_id'];
// $allAssignments = getAllAssignment($id);

// $email = $_SESSION['user'][1];
// $user = getUser($email);
// $user_id = $user[0];
// $students = listStudents($id);

?>

<div class="border-bottom">
    <div class="" style="margin-bottom:10px;">
        <a href="#" class="text-white text-decoration-none btn btn-primary mt-2 link">Assigned</a>
        <a href="../../controllers/todo/missing.controller.php"
            class="text-dark text-decoration-none btn btn-light mt-2 link">Missing</a>
        <a href="../../controllers/todo/todo.controller.php"
            class="text-dark text-decoration-none btn btn-light mt-2 link">Done</a>
    </div>
</div>
<div>
    <div class="dropdown mt-4">
        <button class="btn border border-8 shadow-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
            aria-expanded="false" style="width: 250px">
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


<script>
function updateSelectedText(text) {
    document.getElementById('selectedText').innerText = text;
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php
require_once "../../layouts/class/footer.php"
?>