<?php
include_once "../../contracts.php";
$contract = new contract('localhost', 'root', '', 'quanlynhatro');
$contractid = $_REQUEST['contractid'];
$contractdelete = $contract->contractdelete($contractid);
if ($contractdelete) {
    echo "<script> alert('Xóa thành công')</script>";
} else {
    echo "<script> alert('Xóa không thành công')</script>";
}


?>
<script>
    window.setTimeout(function() {
        history.back();
    }, 5);
</script>