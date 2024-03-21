<?php
$id = $_SESSION['classroom_id'];
$email = $_SESSION['user'][1];
$user_id = getUser($email)[0];

?>

<body>
    <div class="">
        <div class=' pt-2 nav-item d-flex align-items-center justify-content-center  border-top' style="width: 100%; gap: 10px; ">
            <a href="../../controllers/teach/steam/class.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none border btn btn-light"><b>
                    <div class="d-flex align-items-center justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-houses mr-1" viewBox="0 0 16 16">
                            <path d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207z" />
                        </svg> Stream</div>

                </b></a>
            <a href="../../controllers/teach/classwork/classwork.get.id.controller.php?classroom_id=<?= $id ?>" class="text-dark text-decoration-none btn btn-light border"><b>
                    <div class="d-flex align-items-center justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-workspace mr-1" viewBox="0 0 16 16">
                            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
                        </svg>Classwork</div>
                </b></a>
            <a href="../../controllers/teach/people/people.get.id.controller.php?classroom_id=<?= $id ?>" class="
                text-dark text-decoration-none btn btn-light border"><b>
                    <div class="d-flex align-items-center justify-content-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people-fill mr-1" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        </svg>
                        People
                    </div>
                </b></a>
            <a href="" class="text-white text-decoration-none btn btn-warning"><b>
                    <div class=" d-flex align-items-center justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-mortarboard-fill mr-1" viewBox="0 0 16 16">
                            <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                            <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
                        </svg>Grades
                    </div>
                </b></a>
        </div>

        <div class="d-flex flex-column align-items-center ml-5 mr-5" style="margin-top: 7%; font-size: 20px; ">
            <img src="../../assets/images/classroom/02.jpg" alt="" width=300px; height=300px;>
            <p>Create assignment to see grades</p>
            <div>
                <a class="dropdown-item text-decoration-none btn bg-primary text-white" href="../../../controllers/teach/assignment/create.assignment/assign.get.id.controller.php?user_id=<?= $user_id ?>">Create  Assignment </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>