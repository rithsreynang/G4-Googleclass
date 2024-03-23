
<?php
    session_start();
    $assignment_id = $_GET['assignment_id'];
    $_SESSION['assignment_id'] = $assignment_id;
    header("Location: /view-instruction-assignment");
?>