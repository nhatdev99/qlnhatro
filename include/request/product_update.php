<?php
require "include/connection.php";
$thongbao = '';
$trangthai = '';
if (isset($_POST['product_update'])) {
    $masp = $_POST['masp'];
    $tensp = $_POST['tensp'];
    $danhmuc = $_POST['danhmuc'];
    $gia = $_POST['gia'];
    $dvt = $_POST['dvt'];
    $soluong = $_POST['soluong'];
    $size = $_POST['size'];
    $mau = $_POST['mau'];
    $hinhanh = $_FILES['hinhanh'];
    $tenfile = $hinhanh['name'];
    $thongtinngan = htmlspecialchars_decode($_POST['thongtinngan']);
    $noidung = htmlspecialchars_decode($_POST['noidung']);
    if ($soluong > 0) {
        $trangthai = "Còn hàng";
    } else $trangthai = "Hết hàng";
    //--- request
    $hoi_sql = "Select * from sanpham where masp='$masp'";
    $hoi_ketqua = mysqli_query($con, $hoi_sql);
    $dem = mysqli_num_rows($hoi_ketqua);
    // echo "$masp <br> $tensp <br> $ctysp <br> $danhmuc <br> $gia <br> $soluong <br> $vote <br> $trangthai";

    if ($dem > 0) {
        $thongbao = '<div class="alert alert-danger" role="alert">
        Lỗi!, Mã sản phẩm đã tồn tại!
      </div>';
    } else {
        $sql_add = "UPDATE sanpham SET tensp ='$tensp', ctname='$danhmuc', gia='$gia', dvt='$dvt', soluong='$soluong', noidung='$noidung' WHERE masp = '$masp'";
        $result_add = mysqli_query($con, $sql_add);

        if ($tenfile != '') {
            $sql_tt = "UPDATE thongtinsp SET mau='$mau', size='$size', hinhanh='$tenfile', thongtinngan='$thongtinngan' WHERE masp='$masp'";
            $result_tt = mysqli_query($con, $sql_tt);
            if ($result_tt = true) {
                move_uploaded_file($hinhanh['tmp_name'], ".././img/product/" . $tenfile);
                $thongbao = '<div class="alert alert-success" role="alert">
                Thêm thành công!!!
              </div>';
            }
        }
        else {
            $sql_tt = "UPDATE thongtinsp SET mau='$mau', size='$size', thongtinngan='$thongtinngan' WHERE masp='$masp'";
            $result_tt = mysqli_query($con, $sql_tt);
        }
    }
}
?>