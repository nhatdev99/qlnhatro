<?php
session_start();
require "include/admin-detected.php";

$select_total_product_sql = "SELECT * FROM `contract` group by `db_id`";
$select_total_product_result = mysqli_query($con, $select_total_product_sql);
$select_total_product = mysqli_num_rows($select_total_product_result);
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
		<div class="xs-pd-20-10 pd-ltr-20">

			<div class="title pb-20">
				<h2 class="h3 mb-0">Tổng quan</h2>
			</div>

			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<?php
								$select_total_product_sql = "SELECT * FROM `contract` group by `db_id`";
								$select_total_product_result = mysqli_query($con, $select_total_product_sql);
								$select_total_product = mysqli_num_rows($select_total_product_result);
								?>
								<div class="weight-700 font-24 text-dark"><?php echo $select_total_product ?></div>
								<div class="font-14 text-secondary weight-500">Tổng số hợp đồng</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-calendar1"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<?php
								$select_total_quanlity_sql = "SELECT * FROM `khuvuc` group by `db_id`";
								$select_total_quanlity_result = mysqli_query($con, $select_total_quanlity_sql);
								$select_total_product2 = mysqli_num_rows($select_total_quanlity_result);
								?>
								<div class="weight-700 font-24 text-dark"><?php
																			echo $select_total_product2
																			?></div>
								<div class="font-14 text-secondary weight-500">Tổng các khu vực</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><span class="icon-copy ti-heart"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<?php
								$select_total_quanlity_sql3 = "SELECT * FROM `rooms` group by `db_id`";
								$select_total_quanlity_result3 = mysqli_query($con, $select_total_quanlity_sql3);
								$select_total_product3 = mysqli_num_rows($select_total_quanlity_result3);
								?>
								<div class="weight-700 font-24 text-dark"><?php
																			echo $select_total_product3
																			?></div>
								<div class="font-14 text-secondary weight-500">Tổng các phòng trọ</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<?php
								// $products_order_sql = "SELECT * FROM `orders`, `orders_details`,`contract` 
								// WHERE orders_details.dhid = orders.dhid AND orders_details.masp = contract.masp AND orders.status = 5";
								// $products_order_result = mysqli_query($con, $products_order_sql);
								// $sum = 0;

								// while ($products_order_row = mysqli_fetch_assoc($products_order_result)) {
								// 	$sum += $products_order_row['gia'];
								// 	$sum_fm = number_format($sum);
								// }
								?>
								<div class="weight-700 font-24 text-dark"><?php
																			// echo $sum_fm 
																			?></div>
								<div class="font-14 text-secondary weight-500">#</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"><i class="icon-copy fa fa-money" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row pb-10">
				<!-- <div class="col-md-8 mb-20">
					<div class="card-box height-100-p pd-20">
						<div class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-3">
							<div class="h5 mb-md-0">Hospital Activities</div>
							<div class="form-group mb-md-0">
								<select class="form-control form-control-sm selectpicker">
									<option value="">Last Week</option>
									<option value="">Last Month</option>
									<option value="">Last 6 Month</option>
									<option value="">Last 1 year</option>
								</select>
							</div>
						</div>
						<div id="activities-chart"></div>
					</div>
				</div> -->
				<div class="col-md-8 mb-20">
					<div class="card-box pb-10">
						<div class="h5 pd-20 mb-0">Phòng đang cho thuê</div>
						<table class="data-table table nowrap">
							<thead>
								<tr>
									<th class="table-plus">#</th>
									<th>Số phòng</th>
									<th>Khu vực</th>
									<th>Địa chỉ</th>
									<th>Giá nền</th>
									<th>Tình trạng</th>
								</tr>
							</thead>
							<tbody>
								<?php
								require_once "./rooms.php";
								$cn = new rooms('localhost', 'root', '', 'quanlynhatro');
								$room_result = $cn->Excute("SELECT rooms.db_id as 'rid', rooms.db_sophong, khuvuc.db_khuvuc, diachi.db_diachi, contract.db_price, contract.db_fullname, contract.db_sdt, contract.db_diachi as 'db_dc_contract', contract.db_cccd, contract.db_rent_time, rooms.db_status from rooms, khuvuc, diachi, contract Where  contract.db_room_id = rooms.db_id AND diachi.db_id = rooms.db_dc_id  AND contract.db_status = 1 Group by rooms.db_id ASC");
								$i = 1;
								while ($row = mysqli_fetch_assoc($room_result)) {
									$rid = $row['rid'];
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

										<td class="table-plus"><?php echo $i ?></td>
										<td>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rid<?php echo $rid ?>"><?php echo $row['db_sophong'] ?></button>
											<div class="modal fade bd-example-modal-lg" id="rid<?php echo $rid ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="card">
															<div class="card">
																<div class="card-header">
																	<h1>Thông tin thuê</h1>
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
																		<div class="col-md-4 text-left">
																			<p><i><?php echo $row['db_fullname'] ?></i></p>
																			<p><i><?php echo $row['db_sdt'] ?></i></p>
																			<p><i><?php echo $row['db_cccd'] ?></i></p>
																			<p><i><?php echo $row['db_diachi'] ?></i></p>
																			<p><i><?php echo $row['db_rent_time'] ?></i></p>
																			<p><i><?php echo $row['db_price'] ?></i></p>
																			<p><i><?php echo $row['db_dc_contract'] ?></i></p>

																		</div>
																	</div>
																</div>
																
															</div>
														</div>

													</div>
												</div>
											</div>
										</td>
										<td><?php echo $row['db_khuvuc'] ?></td>
										<td><?php echo $row['db_diachi'] ?></td>
										<td><?php echo $row['db_price'] ?></td>
										<td>
											<?php
											$status_badge = '';
											$status_name = '';
											$action = '';
											if ($row['db_status'] == 2) {
												$status_name = 'Pending';
												$datacolor = '#ffc107';
											}
											?>
											<span class="badge badge-pill" data-bgcolor="<?php echo $datacolor ?>" data-color="#fff">
												<?php echo $status ?>

											</span>

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
				<div class="col-md-4 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">

						<div class="d-flex justify-content-between pb-10">
							<div class="h5 mb-0">Các khu vực</div>
							<!-- <div class="dropdown">
								<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" data-color="#1b3133" href="#" role="button" data-toggle="dropdown">
									<i class="dw dw-more"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
									<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
									<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
									<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
								</div>
							</div> -->
						</div>
						<div class="user-list">
							<ul>
								<?php
								$staff_sql = "SELECT * FROM khuvuc";
								$staff_result = mysqli_query($con, $staff_sql);
								$rolename = '';
								while ($staff_row = mysqli_fetch_assoc($staff_result)) {

								?>

									<li class="d-flex align-items-center justify-content-between">
										<div class="name-avatar d-flex align-items-center pr-2">
											<div class="avatar mr-2 flex-shrink-0">

											</div>
											<div class="txt">
												<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7">Đà Nẵng</span>
												<div class="font-14 weight-600"><?php echo $staff_row['db_khuvuc']
																				?></div>
												<div class="font-12 weight-500" data-color="#b2b1b6"><?php //echo $staff_row['username'] 
																										?></div>
											</div>
										</div>
									</li>
								<?php
								}
								?>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-12 mb-20">
					<div class="card-box pb-10">
						<div class="h5 pd-20 mb-0">Quản lý hợp đồng</div>
						<table class="data-table table nowrap">
							<thead>
								<tr>
									<th class="table-plus">#</th>
									<th>Số phòng</th>
									<th>Khu vực</th>
									<th>Địa chỉ</th>
									<th>Giá nền</th>
									<th>Tình trạng</th>
								</tr>
							</thead>
							<tbody>
								<?php
								require_once "./rooms.php";
								$cn = new rooms('localhost', 'root', '', 'quanlynhatro');
								$room_result = $cn->Excute("SELECT rooms.db_id as 'rid', rooms.db_sophong, khuvuc.db_khuvuc, diachi.db_diachi, contract.db_price, contract.db_fullname, contract.db_sdt, contract.db_diachi as 'db_dc_contract', contract.db_status, contract.db_cccd, contract.db_rent_time, rooms.db_status from rooms, khuvuc, diachi, contract Where  contract.db_room_id = rooms.db_id AND diachi.db_id = rooms.db_dc_id  AND contract.db_status = 2 Group by rooms.db_id ASC");
								$i = 1;
								while ($row = mysqli_fetch_assoc($room_result)) {
									$rid = $row['rid'];
									$rstatus = $row['db_status'];
									if ($rstatus == 1) {
										$status = "Đang có hiệu lực";
									} elseif ($rstatus == 2) {
										$status = "Đã hoàn thành";
									} elseif ($rstatus == 3) {
										$status = "Đã hủy";
									}
								?>
									<tr>

										<td class="table-plus"><?php echo $i ?></td>
										<td>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rid<?php echo $rid ?>"><?php echo $row['db_sophong'] ?></button>
											<div class="modal fade bd-example-modal-lg" id="rid<?php echo $rid ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="card">
															.<div class="card">
																<div class="card-header">
																	<h1>Thông tin thuê</h1>
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
																		<div class="col-md-4 text-left">
																			<p><i><?php echo $row['db_fullname'] ?></i></p>
																			<p><i><?php echo $row['db_sdt'] ?></i></p>
																			<p><i><?php echo $row['db_cccd'] ?></i></p>
																			<p><i><?php echo $row['db_diachi'] ?></i></p>
																			<p><i><?php echo $row['db_rent_time'] ?></i></p>
																			<p><i><?php echo $row['db_price'] ?></i></p>
																			<p><i><?php echo $row['db_dc_contract'] ?></i></p>

																		</div>
																	</div>
																</div>
															</div>
															<div class="card-footer">
																	<a name="" id="" class="btn btn-primary" href="contract-view.php" role="button">
																		Đến trang quản lý hợp đồng
																	</a>
																</div>
														</div>

													</div>
												</div>
											</div>
										</td>
										<td><?php echo $row['db_khuvuc'] ?></td>
										<td><?php echo $row['db_diachi'] ?></td>
										<td><?php echo $row['db_price'] ?></td>
										<td>
											<?php
											$status_badge = '';
											$status_name = '';
											$action = '';
											if ($row['db_status'] == 2) {
												$status_name = 'Pending';
												$datacolor = '#ffc107';
											}
											?>
											<span class="badge badge-pill" data-bgcolor="<?php echo $datacolor ?>" data-color="#fff">
												<?php echo $status ?>

											</span>

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
	<script src="vendors/scripts/dashboard3.js"></script>
</body>

</html>