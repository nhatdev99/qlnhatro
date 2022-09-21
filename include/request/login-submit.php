<?php
require "include/connection.php";
if (isset($_POST['login'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $thongbao = '';
        if ($user == '') {
            $thongbao = "Vui lòng nhập tài khoản";
            return;
        } else {
            $sql = "SELECT * from `admin` where username = 'admin'";
            $result = mysqli_query($con, $sql) or die('Câu truy vấn sai');
            $dem = mysqli_num_rows($result);
            if ($dem == 0) {
                $thongbao = "Tài khoản quản trị không tồn tại.";
                return;
            } else {
                $row = mysqli_fetch_assoc($result);
                if ($pass == $row['password']) {
                    $_SESSION['username'] = $user;
                    $thongbao = "Đăng nhập thành công. Bạn sẽ được chuyển về dashboard sau 1s.";
?>
                    <script>
                        window.setTimeout(function() {
                            location = "index.php";
                        }, 1000);
                    </script>
<?php
                } else {
                    $thongbao = "Mật khẩu bạn đã nhập không chính xác.";
                }
            }
        }
    }
}
?>