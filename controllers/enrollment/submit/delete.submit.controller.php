<?php
 $submit_id = $_GET['submit_id'];
 require_once "../../../models/enrollment/unsubmit.model.php";
 deleteSubmit($submit_id);
 header("Location: /view-instruction-assignment")
?>