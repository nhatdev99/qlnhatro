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
            <div class="pd-20">

                <div class="row">
                    <div class="col-md-4">
                        <div class="row px-xl-5">
                            <div class="col-lg-12">
                                <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">Thêm khu vực</span></h5>
                                <div class="bg-light p-30 mb-5">
                                    <?php

                                    ?>
                                    <form method="post" class="billing-form bg-light p-3">
                                        <?php
                                        require_once "rooms.php";
                                        $rooms = new rooms('localhost', 'root', '', 'quanlynhatro');
                                        if (isset($_POST['kv-add'])) {
                                            $khuvuc = $_POST['kvname'];
                                            $kvinsert = $rooms->kvinsert($khuvuc);
                                            if ($kvinsert) {
                                                $thongbao = "Thêm mới thành công";
                                            } else {
                                                $thongbao = "Thêm mới thất bại";
                                            }
                                        }
                                        ?>
                                        <div class="thongbao"><?php if (isset($thongbao)) {
                                                                    echo $thongbao;
                                                                } ?></div>
                                        <div class="row align-items-end">
                                            
                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">Khu vực</label>
                                                    <input type="text" class="form-control" name="kvname" placeholder="Tên khu vực..." required>
                                                </div>
                                            </div>

                                            <div class="w-100"></div>
                                            <div class="w-100"></div>
                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group mt-4">
                                                    <div class="radio">
                                                        <p><button type="submit" name="kv-add" class="btn btn-primary py-3 px-4">Thêm</button></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">Các khu vực hiện tại</span></h5>
                        <table class="data-table table hover multiple-select-row nowrap" id="view">
                            <thead>
                                <tr>
                                    <th class="table-plus">#</th>
                                    <th>Khu vực</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once 'rooms.php';
                                $cn = new rooms('localhost', 'root', '', 'quanlynhatro');
                                $view_select_result = $cn->Excute("SELECT * from khuvuc");
                                $i = 1;
                                while ($view_select_row = mysqli_fetch_assoc($view_select_result)) {
                                    $khuvuc = $view_select_row['db_khuvuc'];
                                    $id = $view_select_row['db_id']
                                ?>
                                    <tr>

                                        <td class="table-plus"><?php echo $i ?></td>
                                        <td><?php echo $khuvuc ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class='dropdown-item' href='include/request/kv_delete.php?kv_id=<?php echo $id ?>'><i class='dw dw-delete-3'></i>Xóa</a>;
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="row px-xl-5">
                            <div class="col-lg-12">
                                <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">Thêm địa chỉ</span></h5>
                                <div class="bg-light p-30 mb-5">
                                    <?php

                                    ?>
                                    <form method="post" class="billing-form bg-light p-3">
                                        <?php
                                        require_once "rooms.php";
                                        $rooms = new rooms('localhost', 'root', '', 'quanlynhatro');
                                        if (isset($_POST['dc-add'])) {
                                            $kv_id = $_POST['khuvuc'];
                                            $diachi = $_POST['address'];
                                            $diachiinsert = $rooms->diachiinsert($kv_id, $diachi);
                                            if ($diachiinsert) {
                                                $thongbao1 = "Thêm mới thành công";
                                            } else {
                                                $thongbao1 = "Thêm mới thất bại";
                                            }
                                        }
                                        ?>
                                        <div class="thongbao"><?php if (isset($thongbao1)) {
                                                                    echo $thongbao1;
                                                                } ?></div>
                                        <div class="row align-items-end">
                                            <div class="w-100"></div>
                                            <?php
                                            $sql_ct = "SELECT * from khuvuc order by `db_id` ASC ";
                                            $result_ct = mysqli_query($con, $sql_ct) or die('Câu truy vấn sai');
                                            ?>
                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="danhmuc">Khu vực *</label>
                                                    <div class="select-wrap">
                                                        <div class="icon"></div>
                                                        <select name="khuvuc" id="" class="form-control" required>
                                                            <option value="#"> -Khu vực phòng trọ-</option>
                                                            <?php
                                                            while ($row = mysqli_fetch_assoc($result_ct)) {
                                                            ?>
                                                                    <option value="<?php echo $row['db_id']; ?>" name="khuvuc"><?php echo $row['db_khuvuc']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="emailaddress">Địa chỉ</label>
                                                    <input type="text" class="form-control" value="" name="address" placeholder="Địa chỉ theo khu vực..." required>
                                                </div>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="w-100"></div>
                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group mt-4">
                                                    <div class="radio">
                                                        <p><button type="submit" name="dc-add" class="btn btn-primary py-3 px-4">Thêm</button></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">Địa chỉ theo khu vực</span></h5>
                        <table class="data-table table hover multiple-select-row nowrap" id="view">
                            <thead>
                                <tr>
                                    <th class="table-plus">#</th>
                                    <th>Khu vực</th>
                                    <th>Địa chỉ</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once 'rooms.php';
                                $cn = new rooms('localhost', 'root', '', 'quanlynhatro');
                                $view_select_result = $cn->Excute("SELECT diachi.db_id, khuvuc.db_khuvuc, diachi.db_diachi from diachi, khuvuc WHERE diachi.db_kv = khuvuc.db_id");
                                $i = 1;
                                while ($view_select_row1 = mysqli_fetch_assoc($view_select_result)) {
                                    $id = $view_select_row1['db_id'];
                                ?>
                                    <tr>

                                        <td class="table-plus"><?php echo $i ?></td>
                                        <td><?php echo $view_select_row1['db_khuvuc'] ?></td>
                                        <td><?php echo $view_select_row1['db_diachi'] ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class='dropdown-item' href='include/request/dc_delete.php?dc_id=<?php echo $id ?>'><i class='dw dw-delete-3'></i>Xóa</a>
                                                </div>
                                            </div>
                                        </td>
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
            $('#view').DataTable();
        });
    </script>

</body>

</html>