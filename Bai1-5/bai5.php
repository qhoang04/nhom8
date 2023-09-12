<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    function giai_pt_bac1($a, $b) {
        if ($a == 0) {
            if ($b == 0) {
                $nghiem = "Phuong trinh co vo so nghiem";
            }
            if ($b<>0) {
                $nghiem = "Phuong trinh vo nghiem";
            }
        }
        else {
            $nghiem = "x = round(-($b/$a),2)";
        }
        return $nghiem;
    }

    function giai_pt_bac2($a, $b, $c) {
        if ($a == 0) {
            $nghiem = giai_pt_bac1($b, $c);
        }
        if ($a<>0) {
            $delta = pow($b,2)-4*$a*$c;
            if ($delta < 0) {
                $nghiem = "Phuong trinh vo nghiem";
            }
            if ($delta == 0) {
                $nghiem = "Phuong trinh co nghiem kep x1=x2=".-($b/2*$a);
            }
            else {
                $can = sqrt($delta);
                $x1 = (-$b+$can)/(2*$a);
                $x2 = (-$b-$can)/(2*$a);
                $nghiem = "Phuong trinh co 2 nghiem phan biet x1=".round($x1,2). "x2=".round($x2, 2);
            }
        }
        return $nghiem;
    }
    if (isset($_POST["a"]) && isset($_POST["b"]) && isset($_POST["c"])) {
        $nghiem = giai_pt_bac2($_POST["a"],$_POST["b"],$_POST["c"]);
    }
    ?>
    <form action="bai5.php" method="post">
        <table width="806" border="1">
            <tr>
                <td colspan="4" bgcolor="#336699"><strong>Giai phuong trinh bac 2</strong></td>
            </tr>
            <tr>
                <td>Phuong trinh</td>
                <td width="236">
                    <input type="text" name="a"> X^2+
                </td>
                <td width="218"><label for="textfield3"></label><input type="text" name="b" id="textfield3">X+</td>
                <td width="241"><label for="textfield"></label><input type="text" name="c" id="textfield">=0</td>
            </tr>
            <tr>
                <td colspan="4">Nghiem
                    <label for="textfield2"></label>
                    <input type="text" name="textfield" id="textfield2" width="400" value="<?php if(isset($nghiem)) echo $nghiem; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="4" align="center" valign="middle">
                    <input type="submit" name="chao" id="chao" value="Xuat">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>