<?php
require_once "../../layouts/class/header.php";
require_once "../../layouts/class/navbar.php";

?>
<div class="d-flex flex-row ml-3 border-secondary" style="margin-top: -10px;">
    <div style="padding-right: 50px;">
        <i class="fa fa-gear" style="font-size:25px; padding-right: 25px;"></i>
        <i class="fa fa-calendar-o" style="font-size:20px; padding-right: 15px;"></i>
    </div>
</div>

<div class="mt-2" style="margin-left: 5%; display:flex; justify-content:space-between;">
    <div class="d-flex flex-column " style="width: 60%;">
        <div class="d-flex align-items-center card-header p-0  justify-content-between">
            <div class=" d-flex flex-row justify-content-between col-11" data-bs-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapse">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 7px; color: white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                        </svg>
                    </div>
                    <p class="ml-2 mt-3">Homework for your</p>
                </div>
            </div>
            <div style="margin-right: 20px;">
                <div class="dropdown" style="color: blue">
                    <svg xmlns="http://www.w3.org/2000/svg" class="dropdown-toggle" type="button" id="dropdownMenuassignment" data-bs-toggle="dropdown" aria-expanded="false" width="22" height="22" fill="currentColor" class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                    </svg>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuassignment">
                        <li><a class="dropdown-item" href="#">Copy Link</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="ml-4 mt-2" style="border-bottom: 0.5px solid grey;">
            <p>Theun En Mar 8</p>
            <p>100point</p>
        </div>
    </div>
    <div class="card shadow-sm" style="width: 30%; margin-right:40px">
        <div class="d-flex" style="display: flex; justify-content: space-between; padding-top: 20px;">
            <h5 style="padding-left: 17px;">Your work</h5>
            <span class="d-flex justify-content-end" style="color:teal; padding-right:30px;">Assigned</span>
        </div>
        <div class="card-body">
            <div class="dropdown">
                <button class="btn border border-8 shadow-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 250px">
                    <i class="fa fa-plus" style=" color:#696969; font-size:15px; "><span class="p-2">Add or create</span></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width: 250px; background:#F5F5F5;">
                    <li><a class="dropdown-item" href="https://drive.google.com">Google drive</a></li>
                    <li><a class="dropdown-item" href="#multiCollapseExample3" data-bs-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="multiCollapseExample3">Link</a></li>
                    <li><a class="dropdown-item" href="#">File</a></li>
                </ul>
                <div class="row" style="width: 900px; ">
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample3">
                            <div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
                                <div class="bg-white p-3 col-xl-4 " style="width:30%; height:20vh; border-radius:10px;">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <p class="mt-1 mb-4">Add link</p>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingLink" placeholder="Link">
                                        </div>
                                        <div class="d-flex justify-content-end" style="margin-top: 20px;">
                                            <a href="" class="btn btn-light">cancel</a>
                                            <button type="submit" class="btn btn-light"><span style="color:teal;">Add link</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2" style="background:#696969; width: 250px;border: none; border-radius:5px; padding:7px; margin-top:15px">
                <span class="text-white">Make as done</span>
            </button>
            <div class="row" style="width: 900px; ">
                <div class="col">
                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;border:none;  height:100vh; width:100%; background-color: rgba(0,0,0,0.3); z-index:15;">
                            <div class="bg-white p-3 col-xl-4 " style="width:30%; height:20vh; border-radius:10px;">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <p class="mt-1 mb-4">Make as done?</p>
                                    <p class="mt-4" style="font-size: 14px;">You didn't attach work for "ET HOMEWORK", so your teacher will just see it's done.</p>
                                    <div class="d-flex justify-content-end" style="margin-top: 20px;">
                                        <a href="" class="btn btn-light">cancel</a>
                                        <button type="submit" class="btn btn-light"><span style="color:teal;">Make as done</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>