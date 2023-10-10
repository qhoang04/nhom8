<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with cookie</title>
</head>
<body>
    <?php 
        session_start();
        if (isset($_POST['login'])) {
            include('../Bai10/connect.php');
            $name = $_POST['username'];
            $pass = $_POST['password'];
            $sl = "SELECT * FROM users WHERE Username='".$name."' and Password='".$pass."'";
            $result = mysqli_query($connect, $sl);
            $row = mysqli_fetch_assoc($result);
            $kt = mysqli_num_rows($result);
            if ($kt > 0) {
                $_SESSION['username'] = $name;
                $_SESSION['password'] = $pass;
                if (isset($_POST['remember']) and ($_POST['remember'] == "on")) {
                    setcookie("username", $name, time() + 60);
                    setcookie("password", $pass, time() + 60);
                }
                echo "<script>alert('Login Successful.'); location.href='trangquantriadmin.php';</script>";
                echo "Chào bạn: ".$row['name']."<br>Pass của bạn là: ".$row['pass'];
            }
            else {
                echo "<script>alert('Login Failed.'); location.href='index.php';</script>";
            }
        }
        if (isset($_POST['cancel'])) {
            echo "<script> location.href='index.php';</script>";
        }
    ?>
    <h1>Đăng nhập</h1>
    <form action="dangnhap.php" method="post">
        <table>
            <tr>
                <td><label for="name">Username: </label></td>
                <td><input type="text" name="username" id="name"></td>
            </tr>
            <tr>
                <td><label for="pass">Password: </label></td>
                <td><input type="password" name="password" id="pass"></td>
            </tr>
            <tr>
                <td colspan="2">
                <input type="checkbox"
                name="remember"><span>Remember</span>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="login" name="login"></td>
                <td><input type="submit" value="cancel" name="cancel"></td>
            </tr>
        </table>
    </form>
</body>
</html>