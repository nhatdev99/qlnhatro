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
                    <div class="col-md-3">
                        <div class="pd-20">
                            <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">Thêm phòng</span></h5>
                        </div>
                        <div class="row px-xl-5">
                            <div class="col-lg-12">
                                <div class="p-30 mb-5">
                                    <form method="post">

                                        <?php
                                        require_once "rooms.php";
                                        $rooms = new rooms('localhost', 'root', '', 'quanlynhatro');
                                        if (isset($_POST['room-add'])) {
                                            $sp = $_POST['sophong'];
                                            $dc_id = $_POST['diachi'];
                                            $gia = $_POST['price'];
                                            $trangthai = '1';
                                            $sophong = '';
                                            for ($i = 1; $i <= $sp; $i++) {
                                                $sophong = $i;
                                                $roominsert = $rooms->roominsert($sophong, $dc_id, $gia, $trangthai);
                                                log($sophong);
                                            }
                                            if ($roominsert) {
                                                $thongbao = "Thêm mới thành công";
                                            } else {
                                                $thongbao = "Thêm mới thất bại";
                                            }
                                        }
                                        ?>


                                        <label for="" class="text-danger">Bắt buộc điền vào ô có dấu (*)</label>
                                        <div class="thongbao"><?php if (isset($thongbao)) {
                                                                    echo $thongbao;
                                                                } ?></div>
                                        <div class="row align-items-end">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">Số phòng *</label>
                                                    <details>
                                                        <summary>Note</summary>
                                                        <p>Số lượng phòng trong một dãy trọ!</p>
                                                    </details>
                                                    <input type="number" class="form-control" name="sophong" value="" placeholder="Số phòng..." required>
                                                </div>
                                            </div>
                                            <div class="w-100"></div>


                                            <?php
                                            $sql_ct = "SELECT * from khuvuc, diachi Where khuvuc.db_id = diachi.db_kv order by khuvuc.db_id ASC ";
                                            $result_ct = mysqli_query($con, $sql_ct) or die('Câu truy vấn sai');
                                            ?>
                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="danhmuc">Khu vực *</label>
                                                    <div class="select-wrap">
                                                        <div class="icon"></div>
                                                        <select name="diachi" id="" class="form-control" required>
                                                            <option value="#"> -Khu vực phòng trọ-</option>
                                                            <?php
                                                            while ($row = mysqli_fetch_assoc($result_ct)) {
                                                            ?>
                                                                <optgroup label="<?php echo $row['db_khuvuc']; ?>">
                                                                    <option value="<?php echo $row['db_id']; ?>" name="diachi"><?php echo $row['db_diachi']; ?></option>

                                                                </optgroup>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">Giá *</label>
                                                    <input type="number" class="form-control" name="price" value="" placeholder="Giá phòng..." required>
                                                </div>
                                            </div>
                                            <div class="w-100"></div>



                                            <div class="w-100"></div>
                                            <div class="w-100"></div>
                                            <div class="w-100"></div>
                                            <div class="col-md-12">
                                                <div class="form-group mt-4">
                                                    <div class="radio">
                                                        <p><button type="submit" name="room-add" class="btn btn-primary py-3 px-4">Thêm</button></p>
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
                            <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">Phòng</span></h5>
                        </div>
                        <div class="pd-20">
                            <table class="data-table table hover multiple-select-row nowrap view2" id="view">
                                <thead>
                                    <tr>
                                        <th>Số phòng</th>
                                        <th>Địa chỉ</th>
                                        <th>Khu vực</th>
                                        <th>Giá nền</th>
                                        <th>Tình trạng</th>
                                        <th class="datatable-nosort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once "./include/connection.php";
                                    $room_select = "SELECT rooms.db_sophong, rooms.db_id, khuvuc.db_khuvuc, diachi.db_diachi, rooms.db_price, rooms.db_status from rooms, khuvuc, diachi Where khuvuc.db_id = diachi.db_kv AND rooms.db_dc_id = diachi.db_id Order by rooms.db_id ASC";
                                    $room_result = mysqli_query($con, $room_select);
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($room_result)) {
                                        $rstatus = $row['db_status'];
                                        if ($rstatus == 1) {
                                            $status = "Phòng Trống";
                                        } elseif ($rstatus == 2) {
                                            $status = "Phòng đang cho thuê";
                                        } elseif ($rstatus == 3) {
                                            $status = "Phòng đang sửa chữa";
                                        }
                                    ?>
                                        <tr>


                                            <td><?php echo $row['db_sophong'] ?></td>
                                            <td><?php echo $row['db_khuvuc'] ?></td>
                                            <td><?php echo $row['db_diachi'] ?></td>

                                            <td><?php echo $row['db_price'] ?></td>
                                            <td><?php echo $status ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a class='dropdown-item' href='include/request/room_delete.php?roomid=<?php echo $row['db_id'] ?>'><i class='dw dw-delete-3'></i>Xóa</a>
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