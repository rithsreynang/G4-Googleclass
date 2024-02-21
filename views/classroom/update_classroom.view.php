<?php
require "../../layouts/user_layouts/header.php";

?>
<div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;  height:100vh; width:100%; background-color: rgba(0,0,0,0.75); z-index:10;">
    <div class="bg-white p-3 col-xl-6 rounded">
        <form action="../../controllers/classroom/modify.update.controller.php" method="post">
            <h4 class="text-success mt-1">Edit Classroom</h4>
            <input type="text" value="<?= $id ?>" style='display: none' name='id'>
            <input type="text" value="<?= $name ?>" class="form-control mt-3" name="className" placeholder="Class name">
            <input type="text" value="<?= $section ?>" class="form-control mt-3" name="section" placeholder="Section">
            <input type="text" value="<?= $subject ?>" class="form-control mt-3" name="subject" placeholder="Subject">
            <input type="text" value="<?= $room ?>" class="form-control mt-3" name="room" placeholder="Room">
            <div class="d-flex justify-content-end mt-2">
                <a href="/home" class="btn btn-light">cancal</a>
                <button class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>

<?php
require "../../layouts/user_layouts/footer.php";
?>