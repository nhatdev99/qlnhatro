<?php
session_start();
require "include/connection.php";
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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.16.6/jodit.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.16.6/jodit.min.js"></script>
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
        <?php require "./include/request/contract-confirm.php" ?>

        <div class="row px-xl-5">
            <div class="col-lg-12">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class=" pr-3">THÊM SẢN PHẨM</span></h5>
                <div class="p-30 mb-5">
                    <form method="post" class="billing-form p-3" enctype="multipart/form-data">
                        <label for="" class="text-danger">Bắt buộc điền vào ô có dấu (*)</label>
                        <div class="thongbao"><?php if (isset($thongbao)) {
                                                    echo $thongbao;
                                                } ?></div>
                        <div class="row align-items-end">
                            
                            <div class="w-100"></div>
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pic">Hình ảnh hợp đồng * | Chỉ chấp nhận đuôi JPG</label>
                                    <input type="file" class="form-control btn btn-outline-primary" name="hinhanh" required accept="image/jpeg" multiple value="<?php // if (isset($_FILES['hinhanh']['name'])) echo $_FILES['hinhanh']['name']; ?>">
                                </div>
                            </div> -->
                            <div class="w-100"></div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="lastname">Tên người thuê *</label>
                                    <input type="text" class="form-control" name="tennguoithue" placeholder="" value="<?php if (isset($_POST['tennguoithue'])) echo $_POST['tennguoithue']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="size">CMND/ CCCD *</label>
                                    <input type="number" class="form-control" name="cccd" placeholder="" value="<?php if (isset($_POST['cccd'])) echo $_POST['cccd']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="size">Số điện thoại *</label>
                                    <input type="text" class="form-control" name="sdt" placeholder="" maxlength="10" value="<?php if (isset($_POST['sdt'])) echo $_POST['sdt']; ?>" required>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="lastname">Địa chỉ *</label>
                                    <input type="text" class="form-control" name="diachi" placeholder="" value="<?php if (isset($_POST['diachi'])) echo $_POST['diachi']; ?>" required>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <!-- <div class="col-md-12">
								<div class="form-group">
									<label for="country">Công ty cung cấp</label>
									<div class="select-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
										<select name="" id="" class="form-control">
											<option value="">France</option>
											<option value="">Italy</option>
											<option value="">Philippines</option>
											<option value="">South Korea</option>
											<option value="">Hongkong</option>
											<option value="">Japan</option>
										</select>
									</div>
								</div>  bm 
                                6y   
                                
							</div>
							<div class="w-100"></div> -->
                            <?php
                            $sql_ct = "SELECT * from rooms, khuvuc Where `db_status` = 1 AND rooms.db_kv_id = khuvuc.db_id order by rooms.db_id ASC ";
                            $result_ct = mysqli_query($con, $sql_ct) or die('Câu truy vấn sai');
                            ?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phong">Phòng số*</label>
                                    <div class="select-wrap">
                                        <select name="phong" id="" class="form-control">
                                            <option value="#"> --Chọn số phòng--</option>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result_ct)) {
                                            ?>
                                                <option value="<?php echo $row['db_id']; ?>" name="phong">Phòng số <?php echo $row['db_id']; ?> | <?php echo $row['db_khuvuc'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Giá theo hợp đồng *</label>
                                    <input type="number" class="form-control" name="gia" value="<?php if (isset($_POST['gia'])) echo $_POST['gia']; ?>" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Ngày thuê *</label>
                                    <input type="date" class="form-control" value="<?php if (isset($_POST['ngaythue'])) echo $_POST['ngaythue']; ?>" name="ngaythue" placeholder="" required>
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
    <script src="vendors/scripts/dashboard3.js"></script>
    <script>
        const editor = Jodit.make('#editor');
    </script>
</body>

</html>