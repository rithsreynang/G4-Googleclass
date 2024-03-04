
<?php
    require_once "../../layouts/class/header.php";
    require_once "../../layouts/class/navbar.php";
    $id = $_GET['classroom_id'];
    echo ($id);
?>
<div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
    <div class="bg-white p-3 col-xl-6 " style="width:35%; height:50vh;">
        <form action="#" method="post">
            <h4 class="text-success mt-1 mb-4 border-bottom" >Invite link</h4>
            <div class="text-success mt-1 mb-4  border-bottom " >
                <p>Invite link</p>
                <a href="">http://localhost:3000/controllers/classroom/people.controller.php</a>
            </div>
            <input type="email" class="form-control mt-3" name="email" placeholder="Type a name or email">
            <div class="d-flex justify-content-end mt-2">
                <a href="../../controllers/classroom/people.controller.php?classroom_id=<?= $id?>" class="btn btn-light">cancal</a>
                <a href="../../controllers/classroom/people.controller.php?classroom_id=<?= $id?>" class="btn btn-primary"  role="button">Send</a>
        </form>
    </div>
</div>