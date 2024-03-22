<div class="col-xml-12">
    <?php
    require_once "models/classroom/select.classrooms.model.php";
    require_once "models/enrollment/join.class.model.php";
    if (isset($_GET['classroom_id'])) {
        $id = $_GET['classroom_id'];
        die();
    }
    $email = $_SESSION['user'][1];
    $user = getUser($email);
    $user_id = $user['user_id'];
    $join = '';
    if (isset($_POST['classCode'])) {
        $classCode = $_POST['classCode'];
        $classes = getAllClassrooom($user_id);
        foreach ($classes as $class) {
            if ($class['class_code'] == $classCode) {
                $storeClass = classExit($user_id, $class['classroom_id']);
                if (count($storeClass) == 0) {
                    $class_id = $class['classroom_id'];
                    $enroll = enrollClass($user_id, $class_id);
                    echo "<script> location.reload() </script>";
                } else {
                    echo "<script>confirm('Classroom Already Join')</script>";
                }
            }
        }
    };
    $email = $_SESSION['user'][1];
    $user = getUser($email);
    $user_id = $user['user_id'];
    $classroom = getClassroomsUnarchive($user_id);
    $classEnroll = getClasses($user_id);;
    if (count($classroom) > 0 || count($classEnroll) > 0) {
    ?>
        <nav class="navbar" style="border-width: 3px; border-color: gray; margin-left:-40px">
            <div style="gap: 10px; ">
                <ul style="list-style-type: none" class="d-flex ">
                    <li class="mr-1">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#joinClass">
                            Join class
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="joinClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="#" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Join class </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" class="form-control mt-3" name="classCode" placeholder="Class Code">
                                            <small class="text-danger"><?= $join ?></small>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button class="btn btn-primary" type="submit">Join Now</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClassModal">
                            Add Class
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-laddClassby="exampleModalLabel" aria-hidden="true">
                            <form action="../../controllers/classroom/create.classroom/create.classroom.controller.php" method="post">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Create Classroom</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" class="form-control mt-3" name="className" placeholder="Class name" require>
                                            <input type="text" class="form-control mt-3" name="section" placeholder="Section">
                                            <input type="text" class="form-control mt-3" name="subject" placeholder="Subject">
                                            <input type="text" class="form-control mt-3" name="room" placeholder="Room">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add class</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-wrap">
            <?php
            foreach ($classroom as $class) :
            ?>
                <div class="card shadow-sm m-3 rounded" style="width:245px;">
                    <!-- hi -->
                    <img class="card-image-top rounded m-2" src="../../assets/images/courses/4by3/<?= $class['banner'] ?>">
                    <div class="navbar  navbar-expand-lg navbar-light p-1 h-1" style="height: 20px;">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link rounded-circle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: -185px; margin-left:195px; height:30px; width: 30px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left bg-light" aria-labelledby="navbarDropdownProfile" style='margin-top: -185px; margin-left: 50px'>
                                    <a class="dropdown-item nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#?id=<?= $class['classroom_id'] . '&classroom_name=' . $class['classroom_name'] . '&section=' . $class['section'] . '&subject=' . $class['subject'] . '&room=' . $class['room'] ?>">
                                        Edit
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownProfile">
                                        <div class="card col-xl-12 d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;  height:100vh; width:100%; background-color: rgba(0,0,0,0.2); z-index:10;">
                                            <div class="bg-white p-3 col-xl-4 rounded">
                                                <form action="../../controllers/classroom/update.classroom/modify.update.controller.php?classroom_id=<?= $class['classroom_id'] ?>" method="post">
                                                    <h4 class="mt-1">Edit Classroom</h4>
                                                    <input type="text" value="<?= $class['classroom_name'] ?>" class="form-control mt-3" name="className" placeholder="Class name">
                                                    <input type="text" value="<?= $class['section'] ?>" class="form-control mt-3" name="section" placeholder="Section">
                                                    <input type="text" value="<?= $class['subject'] ?>" class="form-control mt-3" name="subject" placeholder="Subject">
                                                    <input type="text" value="<?= $class['room'] ?>" class="form-control mt-3" name="room" placeholder="Room">
                                                    <div class="d-flex justify-content-end mt-2">
                                                        <a href="/#" class="btn btn-light">Cancal</a>
                                                        <button class="btn btn-primary ml-1">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="../controllers/classroom/delete.classroom/delete.class.controller.php?classroom_id=<?= $class['classroom_id'] ?>" class='dropdown-item nav-link'>Delete</a>
                                    <a href="../../controllers/classroom/change.banner/change.banner.controller.php?classroom_id=<?= $class['classroom_id'] ?>" class='dropdown-item nav-link'>Change banner</a>
                                    <a href="../../controllers/archive/modify.archive.controller.php?classroom_id=<?= $class['classroom_id'] ?>" class='dropdown-item nav-link'>Archive</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-2" style="margin-top: -15px;">
                        <div class="nav-list d-flex justify-content-between"><b>
                                <a href="../../../controllers/teach/steam/class.controller.php?classroom_id=<?= $class['classroom_id'] ?>" style="text-decoration: none;">
                                    <p class="card-title"><?= $class['classroom_name'] ?></p>
                                </a></b>
                        </div>
                        <?php
                        if (!empty($class['section'])) {
                        ?>
                            <p class="card-text" style="margin-top: -5px;"><b>Section</b> : <?= $class['section'] ?>
                            <?php
                        }
                            ?>
                            <?php
                            if (!empty($class['room'])) {
                            ?>
                            <p class="card-text" style="margin-top: -10px;"><b>Room :</b> <?= $class['room'] ?></p>
                        <?php
                            }
                        ?>
                        </p>
                    </div>
                </div>
            <?php endforeach;
            foreach ($classEnroll as $class) :
            ?>
                <div class="card m-3 shadow-sm rounded" style="width:245px;">
                    <img class="card-image-top rounded m-2" src="../../assets/images/courses/4by3/<?= $class['banner'] ?>">
                    <div class="navbar  navbar-expand-lg navbar-light p-1 h-1" style="height: 20px;">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link rounded-circle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top: -190px; margin-left:195px; height:30px; width: 30px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-three-dots-vertical d-flex justify-content-center mr-5" viewBox="0 0 16 16">
                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownProfile" style='margin-top: -140px; margin-left: 50px'>
                                    <a class="dropdown-item nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#?id=<?= $class['classroom_id'] . '&classroom_name=' . $class['classroom_name'] . '&section=' . $class['section'] . '&subject=' . $class['subject'] . '&room=' . $class['room'] ?>">
                                        Unenroll
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownProfile">
                                        <div class="card d-flex flex-column justify-content-center align-items-center" style="position: fixed; top:0px; left:0;  height:100vh; width:100%; background-color: rgba(0,0,0,0.1); z-index:10;">
                                            <div class="bg-white p-1 d-flex justify-content-center align-items-center col-xl-2 rounded">
                                                <div class="d-flex justify-content-end">
                                                    <a href="/#" class="btn btn-light">Cancal</a>
                                                    <a href="../../controllers/enrollment/unenroll.controller.php?classroom_id=<?= $class['classroom_id'] ?>&user_id=<?= $user_id ?>" class="btn btn-danger ml-1">Unenroll</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-2" style="margin-top: -15px;">
                        <div class="nav-list d-flex "><b>
                                <a href="../../controllers/enrollment/steam/enrollment.controller.php?classroom_id=<?= $class['classroom_id'] ?>" style="text-decoration: none;">
                                    <p class="card-title"><?= $class['classroom_name'] ?></p>
                                </a></b>
                        </div>
                        <?php
                        if (!empty($class['section'])) {
                        ?>
                            <p class="card-text" style="margin-top: -5px;">Section : <?= $class['section'] ?></p>
                        <?php
                        }
                        if (!empty($class['room'])) {
                        ?>
                            <p class="card-text" style="margin-top: -10px;">Room : <?= $class['room'] ?></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php } else { ?>
        <div class="d-flex justify-content-center" style="height: 70vh;">
            <nav class="navbar d-flex flex-column" style="border-width: 3px; border-color: gray; margin-bottom: 30px">
                <img src="../../assets/images/classroom/05.png" style="width: 300px;">
                <div style="gap: 10px; ">
                    <ul style="list-style-type: none" class="d-flex ">
                        <li class="mr-1">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#JoinModal">
                                Join class
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="JoinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="#" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Join class </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" class="form-control mt-3" name="classCode" placeholder="Class Code">
                                                <small class="text-danger"><?= $join ?></small>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit">Join Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li class="mr-1">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClassModal">
                                Add Class
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-laddClassby="exampleModalLabel" aria-hidden="true">
                                <form action="../../controllers/classroom/create.classroom/create.classroom.controller.php" method="post">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create Class</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" class="form-control mt-3" name="className" placeholder="Class name" require>
                                                <input type="text" class="form-control mt-3" name="section" placeholder="Section">
                                                <input type="text" class="form-control mt-3" name="subject" placeholder="Subject">
                                                <input type="text" class="form-control mt-3" name="room" placeholder="Room">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add class</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    <?php } ?>
</div>