<?php
include_once "../../rooms.php";
$room = new rooms('localhost', 'root', '', 'quanlynhatro');
$dc_id = $_REQUEST['dc_id'];

$delete = $room->dcdelete($dc_id);

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