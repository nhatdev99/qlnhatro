
<?php
include_once "./contracts.php";
include_once "./rooms.php";
$contract = new contract("localhost", 'root', '', 'quanlynhatro');
$thongbao = '';
$trangthai = '';
if (isset($_POST['contractadd'])) {
    $fullname = $_POST['tennguoithue'];
    $cccd = $_POST['cccd'];
    $sdt = $_POST['sdt'];
    $rent_time = $_POST['ngaythue'];
    $diachi = $_POST['diachi'];
    $cccd = $_POST['cccd'];
    $room_id = $_POST['phong'];
    $gia = $_POST['gia'];
    $trangthai = '2';
    $contract_insert = $contract -> contractinsert($room_id,$rent_time, $gia, $fullname, $sdt, $diachi, $cccd);
    if ($contract_insert) {
        $room_update = $contract -> roomsupdate($room_id, $trangthai);
        $thongbao = "Thêm thành công";
    }
    else {
        $thongbao = "Thêm thất bại";
    }

}

