<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $chu='';
    if (isset($_POST["so"])) {
        if (is_numeric($_POST["so"])) {
            switch ($_POST["so"]) {
                case "0":
                    $chu = "Khong";
                    break;
                case "1":
                    $chu = "Mot";
                    break;
                case "2":
                    $chu = "Hai";
                    break;
                case "3":
                    $chu = "Ba";
                    break;
                case "4":
                    $chu = "Bon";
                    break;
                case "5":
                    $chu = "Nam";
                    break;
                case "6":
                    $chu = "Sau";
                    break;
                case "7":
                    $chu = "Bay";
                    break;
                case "8":
                    $chu = "Tam";
                    break;
                case "9":
                    $chu = "Chin";
                    break;    
                default:
                    $chu = "Khong hop le";
                    break;
            }
        }
    }
    ?>
    <form action="bai3.php" method="POST">
        <table width="519" border="1">
            <tr>
                <td colspan="3">Doc so</td>
            </tr>
            <tr>
                <td>Nhap so(0-9)</td>
                <td width="69" rowspan="2">
                    <input type="submit" name="button" id="button" value="Submit">
                </td>
                <td>Bang chu</td>
            </tr>
            <tr>
                <td width="177">
                    <p>
                        <label for="textfield"></label>
                        <input type="text" name="so" id="textfield">
                    </p>
                </td>
                <td width="232">
                    <label for="textfield2"></label>
                    <input type="text" name="chu" id="textfield2" value="<?php echo $chu;?>"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>