<?php
$email = $_SESSION['user'][1];
$user = getUser($email);
$user_id = $user[0];
$profileName = $user[4];
?>
<div class="d-flex" style="margin-left: 10%; border-bottom: 0.5px solid grey;">
    <img class="rounded-circle mb-3" src="assets/images/profile/<?= $profileName ?>" alt="avatar" style="height: 80px;">
    <h3 class="mt-4 ml-4 text-dark"><?= $user['username'] ?></h3>
</div>
<div style="margin-left: 10%;">
    <div class="dropdown mt-4">
        <button class="btn border border-8 shadow-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 250px">
            <span class="p-2" id="selectedText">Select your option</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width:250px;">
            <li><a class="dropdown-item" href="#" onclick="updateSelectedText('All')">All</a></li>
            <li><a class="dropdown-item" href="#" onclick="updateSelectedText('Assigned')">Assigned</a></li>
            <li><a class="dropdown-item" href="#" onclick="updateSelectedText('Turned in')">Turned in</a></li>
            <li><a class="dropdown-item" href="#" onclick="updateSelectedText('Missing')">Missing</a></li>
        </ul>
    </div>

</div>
<style>
    .dropdown-toggle {
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .dropdown-toggle .fa-plus {
        margin-right: 5px;
    }
</style>

<script>
    function updateSelectedText(text) {
        document.getElementById('selectedText').innerText = text;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>