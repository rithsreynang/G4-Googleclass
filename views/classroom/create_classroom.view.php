<div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;  height:100vh; width:100%; background-color: rgba(0,0,0,0.75); z-index:10;">
    <div class="bg-white p-3 col-xl-6 rounded">
        <form action="../../controllers/classroom/create_class.controller.php" method="post">
            <h4 class="text-success mt-1">Crate class</h4>
            <input type="text" class="form-control mt-3" name="className" placeholder="Class name">
            <input type="text" class="form-control mt-3" name="section" placeholder="Section">
            <input type="text" class="form-control mt-3" name="subject" placeholder="Subject">
            <input type="text" class="form-control mt-3" name="room" placeholder="Room">
            <div class="d-flex justify-content-end mt-2">
                <a href="/home" class="btn btn-light">cancal</a>
                <button class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
</div>