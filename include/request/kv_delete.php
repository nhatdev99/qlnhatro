<?php
include_once "../../rooms.php";
$room = new rooms('localhost', 'root', '', 'quanlynhatro');
$kv_id = $_REQUEST['kv_id'];

$delete = $room->kvdelete($kv_id);

if ($delete) {
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