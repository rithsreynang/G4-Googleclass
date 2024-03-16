<div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center"
    style="position: fixed; top:0px; left:0;  height:100vh; width:100%; background-color: rgba(0,0,0,0.75); z-index:10;">
    <div class="bg-white p-3 d-flex flex-column justify-content-center col-xl-5 rounded">
        <h4 class="text-success mt-1 text-center">Are you sure to delete this classroom???</h4>
        <div class="d-flex justify-content-center  mt-2">
            <a href="/home" class="btn btn-sucess">cancal</a>
            <a href="../../../controllers/classroom/delete.classroom/delete.modify.controller.php?classroom_id=<?= $id ?>"
                class="ml-1 btn btn-danger">Delete Now</a>
        </div>
    </div>
</div>