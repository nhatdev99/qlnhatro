<?php
include_once "../../rooms.php";
$room = new rooms('localhost', 'root', '', 'quanlynhatro');
$roomid = $_REQUEST['roomid'];
$roomdelete = $room->roomdelete($roomid);
if ($roomdelete) {
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