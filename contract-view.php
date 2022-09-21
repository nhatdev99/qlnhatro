<?php
session_start();
require "include/admin-detected.php";

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>R R O A - ADMIN</title>

    <!-- Site favicon -->
    <link rel="icon" type="image/png" href="vendors/images/rroa.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body>
    <!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="vendors/images/rroa.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

    <?php require "include/header.php" ?>

    <div class="main-container">
        <div class="card-box mb-30">
            <div class="pb-20">
                <div class="row">
                    <div class="col-md-3 fixed">
                        <div class="pd-20">
                            <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">Thêm hợp đồng</span></h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-2 mb-5">
                                    <form method="post" class="billing-form p-3" enctype="multipart/form-data">
                                        <?php
                                        require_once "./include/request/contract-confirm.php";
                                        ?>
                                        <label for="" class="text-danger">Bắt buộc điền vào ô có dấu (*)</label>
                                        <div class="thongbao"><?php if (isset($thongbao)) {
                                                                    echo $thongbao;
                                                                } ?></div>
                                        <div class="row align-items-end">

                                            <div class="w-100"></div>

                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="lastname">Tên người thuê *</label>
                                                    <input type="text" class="form-control" name="tennguoithue" placeholder="" value="" required>
                                                </div>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="size">CMND/ CCCD *</label>
                                                    <input type="number" class="form-control" name="cccd" onKeyPress="if(this.value.length==12) return false;" placeholder="" value="" required>
                                                </div>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="size">Số điện thoại *</label>
                                                    <input type="text" class="form-control" name="sdt" placeholder="" maxlength="10" value="" required>
                                                </div>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="lastname">Địa chỉ *</label>
                                                    <input type="text" class="form-control" name="diachi" placeholder="" value="" required>
                                                </div>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <?php
                                                    require_once "./rooms.php";
                                                    $cn = new rooms('localhost', 'root', '', 'quanlynhatro');
                                                    $result_ct = $cn->Excute("SELECT khuvuc.db_khuvuc, diachi.db_diachi, diachi.db_id as 'diachiid' From khuvuc, diachi WHere khuvuc.db_id = diachi.db_kv Order by khuvuc.db_khuvuc"); ?>
                                                    <label for="phong">Phòng số*</label>
                                                    <div class="select-wrap">
                                                        <select name="phong" id="" class="form-control">
                                                            <option value=""> --Chọn số phòng--</option>
                                                            <?php

                                                            while ($row = mysqli_fetch_assoc($result_ct)) {
                                                                $diachi = $row['db_diachi'];
                                                                $diachiid = $row['diachiid']
                                                            ?>
                                                                <optgroup label="<?php echo $row['db_khuvuc']; ?>">
                                                                <optgroup label="----<?php echo  $diachi ?>----">
                                                                    <?php
                                                                    $sp_select = "SELECT rooms.db_id, rooms.db_sophong from rooms, diachi WHere rooms.db_dc_id = $diachiid group by rooms.db_id";
                                                                    $sp_result = mysqli_query($con, $sp_select);
                                                                    while ($row1 = mysqli_fetch_assoc($sp_result)) {

                                                                    ?>
                                                                        <option value="<?php echo $row1['db_id']; ?>" name="sophong"><?php echo $row1['db_sophong']; ?></option>
                                                                    <?php

                                                                    }
                                                                    ?>
                                                                </optgroup>
                                                                </optgroup>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">Giá theo hợp đồng *</label>
                                                    <input type="number" class="form-control" name="gia" value="" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="emailaddress">Ngày thuê *</label>
                                                    <input type="date" class="form-control" value="" name="ngaythue" placeholder="" required>
                                                </div>
                                            </div>



                                            <div class="w-100"></div>
                                            <div class="w-100"></div>
                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group mt-4">
                                                    <div class="radio">
                                                        <p><button type="submit" name="contractadd" class="btn btn-primary py-3 px-4">Thêm</button></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="pd-20">
                            <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">Danh sách hợp đồng đang có hiệu lực</span></h5>
                        </div>
                        <div class="pd-20">
                            <table class="data-table table hover multiple-select-row nowrap view" id="view">
                                <thead>
                                    <tr>
                                        <th class="table-plus">#</th>
                                        <th>Tên người thuê</th>
                                        <th>Địa chỉ</th>
                                        <th>Phòng</th>
                                        <th>Ngày thuê</th>
                                        <th>Giá thuê</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once "./include/connection.php";
                                    $room_select = "SELECT contract.db_id as 'cntract_id', contract.db_sdt, contract.db_cccd, khuvuc.db_khuvuc, contract.db_price, contract.db_diachi as 'db_dc_contract', contract.db_fullname, rooms.db_sophong, contract.db_rent_time, diachi.db_diachi FROM contract, rooms, khuvuc, diachi Where contract.db_room_id = rooms.db_id AND khuvuc.db_id = diachi.db_kv AND diachi.db_id = rooms.db_dc_id AND contract.db_status = 1 Group by rooms.db_id ASC";
                                    $room_result = mysqli_query($con, $room_select);
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($room_result)) {
                                        $ctid = $row['cntract_id'];
                                        $gia = number_format($row['db_price']);
                                    ?>
                                        <tr>

                                            <td class="table-plus"><?php echo $i
                                                                    ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#contract<?php echo $ctid ?>"><?php echo $row['db_fullname'] ?></button>
                                                <div class="modal fade bd-example-modal-lg" id="contract<?php echo $ctid ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="card">
                                                                .<div class="card">
                                                                    <div class="card-header">
                                                                        <h1>Thông tin hợp đồng</h1>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <p><b> Tên Người thuê:</b></p>
                                                                                <p><b>Số điện thoại:</b></p>
                                                                                <p><b>CMND/CCCD:</b></p>
                                                                                <p><b>Địa chỉ thường trú:</b></p>
                                                                                <p><b>Ngày thuê:</b></p>
                                                                                <p><b>Giá thuê:</b></p>
                                                                                <p><b>Địa chỉ thuê:</b></p>
                                                                            </div>
                                                                            <div class="col-md-4 ">
                                                                                <p><i><?php echo $row['db_fullname'] ?></i></p>
                                                                                <p><i><?php echo $row['db_sdt'] ?></i></p>
                                                                                <p><i><?php echo $row['db_cccd'] ?></i></p>
                                                                                <p><i><?php echo $row['db_dc_contract'] ?></i></p>
                                                                                <p><i><?php echo $row['db_rent_time'] ?></i></p>
                                                                                <p><i><?php echo $row['db_price'] ?></i></p>
                                                                                <p><i><?php echo $row['db_diachi'] ?></i></p>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer text-muted">
                                                                        <a class='btn btn-outline-success' href='include/request/contract_done.php?contractid=<?php echo $row['cntract_id'] ?>'><i class='dw dw-down-arrow1'></i> Hoàn thành hợp đồng</a>
                                                                        <a class='btn btn-outline-danger' href='include/request/contract_cancel.php?contractid=<?php echo $row['cntract_id'] ?>'><i class='dw dw-trash'></i> Hủy hợp đồng</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $row['db_diachi'] ?></td>
                                            <td><?php echo $row['db_sophong'] ?></td>
                                            <td><?php echo $row['db_rent_time'] ?></td>
                                            <td><?php echo $gia ?></td>

                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="pd-20">
                            <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">Danh sách hợp đồng đã hoàn thành</span></h5>
                        </div>
                        <div class="pd-20">
                            <table class="data-table table hover multiple-select-row nowrap view" id="view">
                                <thead>
                                    <tr>
                                        <th class="table-plus">#</th>
                                        <th>Tên người thuê</th>
                                        <th>Địa chỉ</th>
                                        <th>Phòng</th>
                                        <th>Ngày thuê</th>
                                        <th>Giá thuê</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once "./include/connection.php";
                                    $room_select2 = "SELECT contract.db_id as 'cntract_id', contract.db_sdt, contract.db_cccd, khuvuc.db_khuvuc, contract.db_price, contract.db_diachi as 'db_dc_contract', contract.db_fullname, rooms.db_sophong, contract.db_rent_time, diachi.db_diachi FROM contract, rooms, khuvuc, diachi Where contract.db_room_id = rooms.db_id AND khuvuc.db_id = diachi.db_kv AND diachi.db_id = rooms.db_dc_id  AND contract.db_status = 2 Group by rooms.db_id ASC";
                                    $room_result2 = mysqli_query($con, $room_select2);
                                    $i = 1;
                                    while ($row2 = mysqli_fetch_assoc($room_result2)) {
                                        $ctid2 = $row2['cntract_id'];
                                        $gia2 = number_format($row2['db_price']);
                                    ?>
                                        <tr>

                                            <td class="table-plus"><?php echo $i
                                                                    ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#contract<?php echo $ctid2 ?>"><?php echo $row2['db_fullname'] ?></button>
                                                <div class="modal fade bd-example-modal-lg" id="contract<?php echo $ctid2 ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="card">
                                                                .<div class="card">
                                                                    <div class="card-header">
                                                                        <h1>Thông tin hợp đồng</h1>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <p><b> Tên Người thuê:</b></p>
                                                                                <p><b>Số điện thoại:</b></p>
                                                                                <p><b>CMND/CCCD:</b></p>
                                                                                <p><b>Địa chỉ thường trú:</b></p>
                                                                                <p><b>Ngày thuê:</b></p>
                                                                                <p><b>Giá thuê:</b></p>
                                                                                <p><b>Địa chỉ thuê:</b></p>
                                                                            </div>
                                                                            <div class="col-md-4 ">
                                                                                <p><i><?php echo $row2['db_fullname'] ?></i></p>
                                                                                <p><i><?php echo $row2['db_sdt'] ?></i></p>
                                                                                <p><i><?php echo $row2['db_cccd'] ?></i></p>
                                                                                <p><i><?php echo $row2['db_dc_contract'] ?></i></p>
                                                                                <p><i><?php echo $row2['db_rent_time'] ?></i></p>
                                                                                <p><i><?php echo $row2['db_price'] ?></i></p>
                                                                                <p><i><?php echo $row2['db_diachi'] ?></i></p>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer text-muted">
                                                                        <a class='btn btn-outline-danger' href='include/request/contract_delete.php?contractid=<?php echo $row['cntract_id'] ?>'><i class='dw dw-down-arrow1'></i> Xóa dữ liệu</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $row2['db_diachi'] ?></td>
                                            <td><?php echo $row2['db_sophong'] ?></td>
                                            <td><?php echo $row2['db_rent_time'] ?></td>
                                            <td><?php echo $gia2 ?></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="pd-20">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">Danh sách hợp đồng đã hủy</span></h5>
                    </div>
                    <div class="pd-20">
                        <table class="data-table table hover multiple-select-row nowrap view" id="view">
                            <thead>
                                <tr>
                                    <th class="table-plus">#</th>
                                    <th>Tên người thuê</th>
                                    <th>Địa chỉ</th>
                                    <th>Phòng</th>
                                    <th>Ngày thuê</th>
                                    <th>Giá thuê</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once "./include/connection.php";
                                $room_select2 = "SELECT contract.db_id as 'cntract_id', contract.db_sdt, contract.db_cccd, khuvuc.db_khuvuc, contract.db_price, contract.db_diachi as 'db_dc_contract', contract.db_fullname, rooms.db_sophong, contract.db_rent_time, diachi.db_diachi FROM contract, rooms, khuvuc, diachi Where contract.db_room_id = rooms.db_id AND khuvuc.db_id = diachi.db_kv AND diachi.db_id = rooms.db_dc_id  AND contract.db_status = 3 Group by rooms.db_id ASC";
                                $room_result2 = mysqli_query($con, $room_select2);
                                $i = 1;
                                while ($row2 = mysqli_fetch_assoc($room_result2)) {
                                    $ctid2 = $row2['cntract_id'];
                                    $gia2 = number_format($row2['db_price']);
                                ?>
                                    <tr>

                                        <td class="table-plus"><?php echo $i
                                                                ?></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#contract<?php echo $ctid2 ?>"><?php echo $row2['db_fullname'] ?></button>
                                            <div class="modal fade bd-example-modal-lg" id="contract<?php echo $ctid2 ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="card">
                                                            .<div class="card">
                                                                <div class="card-header">
                                                                    <h1>Thông tin hợp đồng</h1>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <p><b> Tên Người thuê:</b></p>
                                                                            <p><b>Số điện thoại:</b></p>
                                                                            <p><b>CMND/CCCD:</b></p>
                                                                            <p><b>Địa chỉ thường trú:</b></p>
                                                                            <p><b>Ngày thuê:</b></p>
                                                                            <p><b>Giá thuê:</b></p>
                                                                            <p><b>Địa chỉ thuê:</b></p>
                                                                        </div>
                                                                        <div class="col-md-4 ">
                                                                            <p><i><?php echo $row2['db_fullname'] ?></i></p>
                                                                            <p><i><?php echo $row2['db_sdt'] ?></i></p>
                                                                            <p><i><?php echo $row2['db_cccd'] ?></i></p>
                                                                            <p><i><?php echo $row2['db_dc_contract'] ?></i></p>
                                                                            <p><i><?php echo $row2['db_rent_time'] ?></i></p>
                                                                            <p><i><?php echo $row2['db_price'] ?></i></p>
                                                                            <p><i><?php echo $row2['db_diachi'] ?></i></p>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer text-muted">
                                                                    <a class='btn btn-outline-danger' href='include/request/contract_delete.php?contractid=<?php echo $row['cntract_id'] ?>'><i class='dw dw-down-arrow1'></i> Xóa dữ liệu</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $row2['db_diachi'] ?></td>
                                        <td><?php echo $row2['db_sophong'] ?></td>
                                        <td><?php echo $row2['db_rent_time'] ?></td>
                                        <td><?php echo $gia2 ?></td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                    </div>
                    


            </div>

        </div>
    </div>

    </div>
    <footer>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
    </footer>
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
    <script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
    <script src="src/plugins/datatables/js/pdfmake.min.js"></script>
    <script src="src/plugins/datatables/js/vfs_fonts.js"></script>

    <script src="vendors/scripts/dashboard3.js"></script>
    <script>
        $(document).ready(function() {
            $('.view').DataTable();
        });
    </script>

</body>

</html>