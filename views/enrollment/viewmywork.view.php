<?php
// require_once "../../controllers/enrollment/classwork/viewmywork.controller.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewmywork</title>
</head>

<body>
    <div class="border-top pt-3 ">
        <?php
        foreach ($students as $student){
      ?>
        <div class="d-flex justify-content-between m-2">
            <div class="">
                <img src="../../assets/images/profile/<?= $student['profile'] ?>" alt="profile " class="rounded-circle"
                    style="width: 40px; height: 40px;">
                <span style="padding-left: 15px;"><?= $student['username'] ?></span>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="border-top pt-3 ">
        <div class=" d-flex m-5">
            <select class="form-select" aria-label="Default select example">
                <option selected>All</option>
                <option value="1">All</option>
                <option value="2">Assignt</option>
                <option value="3">Return</option>
                <option value="3">Missing</option>
            </select>
        </div>
    </div>
    <div class="detail">
        <?php
        function getAllassignment($id){
            $assignment =$_GET($assignment);
            $missing=$_GET($missing);
            $return =$_GET($return);
            $assignt =$_GET($assignt);
            $all =$_GET($all);
                foreach ($assignments as $assignment) {
                    if ($assignment == $missing) {
                        $_GET =$missing;
                        echo $missing;
                    }if ($assignment == $assignt) {
                        $_GET =$assignt;
                        echo $assignt;
                    }if ($assignment == $return) {
                        $_GET =$return;
                        echo $return;
                    }if ($assignment == $all) {
                        $_GET =$all;
                        echo $all;
                    }
                };
        };
?>
    </div>
</body>

</html>