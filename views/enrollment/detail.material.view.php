<?php
require_once "models/teach/material/get.material/get.an.meterial.model.php";
$material_id = $_SESSION['material_id'];
$classroom_id = $_SESSION['classroom_id'];
$material = getMaterial($classroom_id, $material_id);
?>
<div class=" border-top border-secondary d-flex align-item-center justify-content-center" style='margin-top: 12px'>
    <div class="d-flex flex-column col-9 m-4">
        <div class="d-flex align-items-center  justify-content-between">
            <div class="d-flex align-items-center justify-content-center">
                <div class="rounded-circle d-flex" style="background-color: #289AE3 ; padding: 10px; color: white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor"
                        class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                        <path
                            d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
                    </svg>
                </div>
                <h3 class="ml-2 mt-3 text-primary">Material : <?= $material['title'] ?></h3>
            </div>
        </div>
        <div class=" border-top border-primary">
            <div class=" mt-3 d-flex align-items-center justify-content-between">

                <p><?= $material['description'] ?></p>
                <p>Post <?= $material['date_post'] ?></p>
            </div>
            <?php
                if (!empty($material['path_file'])) {
                ?>
            <a href="<?= $material['path_file'] ?>" target="_blank" style="text-decoration: none;">
                <div class="d-flex align-items-center border rounded shadow-sm col-5">
                    <img src="../../assets/files/drive.png" height="80px" style="margin-left: -11px"
                        class="border-right">
                    <div class="card-title p-1 text-truncate"><?= $material['file'] ?></div>
                </div>
            </a>
            <?php
                }
                ?>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>