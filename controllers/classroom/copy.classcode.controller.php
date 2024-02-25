<?php
if (isset($_GET['class_code'])) {
    $class_code = $_GET['class_code'];
}
?>
<input class="input" type="text" value="<?= $class_code ?>;">

<script>
    function copyLinkClassCode(){
        copyText = document.getElementsByClassName('input');
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
    }
    copyLinkClassCode();
</script>

<?php
// header("Location: /home");
?>