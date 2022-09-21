<?php
require_once "include/connection.php";

if (isset($_SESSION['username'])) {
	$admin_query = "SELECT * FROM `admin` where `username` = 'admin'";
	$admin_result = mysqli_query($con, $admin_query);
	$admin_row = mysqli_fetch_assoc($admin_result);
	$username = $admin_row['username'];
	if ($username != $_SESSION['username']) {
?>
		<script>
			window.setTimeout(function() {
				window.location = "login.php";
			}, 5);
		</script>
	<?php
	}
} else {
	?>
	<script>
		window.setTimeout(function() {
			window.location.replace('login.php');
		}, 5);
	</script>
<?php
}
?>