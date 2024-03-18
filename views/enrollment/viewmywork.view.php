<?php
    require_once "models/classroom/get.user.model.php";
    $user_id = $_SESSION['user_id'];
    $student = getUserId($user_id);
?>

<div class="p-3" style="margin: 0px 100px">
    <div class="border-top border-dark">
        <div class="d-flex justify-content-between m-2">
            <div class="d-flex align-items-center">
                <img src="../../assets/images/profile/<?= $student['profile'] ?>" alt="profile " class="rounded-circle"
                    style="width: 100px; height: 100px;">
                <h2 style="padding-left: 15px;"><b><?= $student['username'] ?></b></h2>
            </div>
        </div>
    </div>
    <div class="border-top  border-dark ">
        <div class=" d-flex flex-column">
            <div class="p-3">
                <h3>Assigned</h3>
            </div>
            <div class="p-3">
                <h3>Retured</h3>
            </div>
            <div class="p-3">
                <h3>Missing</h3>
            </div>
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
</div>