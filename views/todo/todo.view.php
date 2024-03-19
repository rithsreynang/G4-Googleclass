<div class="border-bottom">
    <div class="" style="margin-bottom:10px;">
        <a href="../../controllers/todo/assigned/assigned.controller.php?assignment_id=<?= $assignment['assignment_id'] ?>" class="text-dark text-decoration-none btn btn-light mt-2 link">Assigned</a>
        <a href="../../controllers/todo/missing/go.missing.controller.php" class="text-dark text-decoration-none btn btn-light mt-2 link">Missing</a>
        <a href="#" class="text-white text-decoration-none btn btn-primary mt-2 link">Done</a>
    </div>
</div>

<div>
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