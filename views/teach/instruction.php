<div class="">
    <div class="p-2 d-flex flex-row justify-content-between border-bottom border-top border-secondary">
        <div>
            <a href="../../controllers/teach/instruction.controller.php" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">Instruction</a>
            <a href="../../controllers/teach/istudent.work.controller.php" class="p-4 my-2 pb-0 text-dark text-decoration-none border-0 ">Student work</a>
        </div>
    </div>
</div>
<div class="p-2 d-flex flex-row justify-content-between border-bottom border-top border-secondary">
    <div class="ml-5 m-5">
        <div class="d-flex">
            <img src="../../assets/images/views/downloaded.png" width="40px" height="40px" size="35px" alt="Quais culpa non aut">
            <h3>Quasi culpa non aut</h3>
        </div>
        <i class="fa fa-user-plus" style="font-size: 20px; padding-top: 20px; padding-left: 15px; "></i>
        <input type="datetime-local" class="form-control" id="time" name="time" required>
    </div>
    <div class="ml-5 m-5">
        <div class="d-flex">
            <img src="../../assets/images/views/download (7).png" alt="three point" width=30px height=30px>
        </div>
        <input type="datetime-local" class="form-control" id="post_date" name="post_date" required>
    </div>
</div>
</div>
</div>
<div class="form ml-5">
    <div class="main">
        <div class="comment">
            <a href="img">
                <img src="../../assets/images/views/12891571.png" width="25px" height="25px" alt=""> classcomment

            </a>
        </div>
        <div class="addcomment">
            <div class="d-flex justify-content-between mt-2" style="margin-left: 100px; width: 79%">
                <div class="ml-0">
                    <div class="ml-5">
                        <img src="../../assets/images/profile/<?= $teacher['profile'] ?>" alt="profile " class="rounded-circle" style="width: 50px; height: 50px;">
                        <input type="text" type="text" class="form-comment" id="comment"></input>
                        <img src="../../assets/images/views/download (8).png" alt="sending" width=20px heigh\=20px>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>