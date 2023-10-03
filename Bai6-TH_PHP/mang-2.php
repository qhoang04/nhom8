<!DOCTYPE html>
<html>
<head>
    <title>PHÁT SINH MẢNG VÀ TÍNH TOÁN</title>
    <meta charset="utf-8">
    <style>
        * {
            font-family: Tahoma;
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
</head>
<?php 
    function xuat_mang($mang_so) {
        echo implode(" ", $mang_so);
    }

    function tim_min($mang_so) {
        $min = $mang_so[0];
        $n = count($mang_so);
        for ($i = 1; $i < $n; $i++) {
            if ($mang_so[$i] < $min) {
                $min = $mang_so[$i];
            }
        }
        return $min;
    }

    function tim_max($mang_so) {
        $max = $mang_so[0];
        $n = count($mang_so);
        for ($i = 1; $i < $n; $i++) {
            if ($mang_so[$i] > $max) {
                $max = $mang_so[$i];
            }
        }
        return $max;
    }

    function tinh_tong($mang_so) {
        $tong_so = 0;
        $n = count($mang_so);
        for ($i = 0; $i < $n; $i++) {
            $tong_so += $mang_so[$i];
        }
        return $tong_so;
    }

    $n = $_POST["so_phan_tu"];
    $mang_so = array();
    for ($i = 0; $i < $n; $i++) {
        $mang_so[$i] = mt_rand(0,20);
    }
?>
<body>
    <form action="mang-2.php" method="POST">
        <table>
            <thead>
                <tr>
                    <th colspan="2">PHÁT SINH MẢNG VÀ TÍNH TOÁN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nhập số phần tử:</td>
                    <td><input type="text" name="so_phan_tu" width="100%"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Phát sinh và tính toán"></td>
                </tr>
                <tr>
                    <td>Mảng: </td>
                    <td><input type="text" name="mang_so" disabled="disabled" value="<?php echo implode(" ", $mang_so); ?>"></td>
                </tr>
                <tr>
                    <td>GTLN ( MAX ) trong mảng: </td>
                    <td><input type="text" name="gtln" disabled="disabled" value="<?php echo tim_max($mang_so); ?>"></td>
                </tr>
                <tr>
                    <td>GTNN ( MIN ) trong mảng: </td>
                    <td><input type="text" name="ttnn" disabled="disabled" value="<?php echo tim_min($mang_so); ?>"></td>
                </tr>
                <tr>
                    <td>Tổng mảng: </td>
                    <td><input type="text" name="tong" disabled="disabled" value="<?php echo tinh_tong($mang_so); ?>"></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>
