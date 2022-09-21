<?php
include_once "../../contracts.php";
$contract = new contract('localhost', 'root', '', 'quanlynhatro');
$status = '';
if (isset($_GET['contractid'])) {
    $id = $_GET['contractid'];
    $status = 3;
    $contractdone = $contract->contractdone($id, $status);
    if ($contractdone) {
        echo "<script> alert('Đã hủy hợp đồng')</script>";
    } else {
        echo "<script> alert('Đã có lỗi xảy ra, không thể hủy hợp dồng')</script>";
    }
}



?>
<script>
    window.setTimeout(function() {
        history.back();
    }, 5);
</script>