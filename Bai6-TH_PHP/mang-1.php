<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập và tính toán trên dãy số</title>
</head>
<?php 
    $ket_qua = 0;
    $mang_so = 0;
    if (isset($_POST['btn_goi'])) {
        $mang_so = explode(",",$_POST['nhap_mang']);
        $n = count($mang_so);
        for ($i = 0; $i < $n; $i++) {
            $ket_qua += $mang_so[$i];
        }
    }
?>
<style>
    *{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    table {
        width: 400px;
        margin: 100px auto;
    }
    table th {
        background: #66CCFF;
        padding: 10px;
        font-size: 18px;
    }
</style>
<body>
    <form method="POST" action="mang-1.php">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Nhập Và Tính Trên Dãy Số</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nhập dãy số</td>
                    <td><input type="text" name="nhap_mang" value="<?php echo isset($_POST['nhap_mang']) ? $_POST['nhap_mang'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="btn_goi" value="Tổng các dãy số">
                    </td>
                </tr>
                <tr>
                    <td>Tổng các dãy số:</td>
                    <td>
                        <input type="text" name="ket_qua" disabled="disabled" value="<?php echo $ket_qua ?>">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>
