<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <?php
     $pro_de=$_POST['product_description'];
     $list_pr= $_POST['list_price'];
     $dis_per=$_POST['discount_percent'];
     $dis_amount=  $list_pr * $dis_per / 100 ." vnđ";
     $dis_price=  $list_pr * ((100 - $dis_per) / 100 )." vnđ";
    ;
    ?>
    <main>
        <h1>This page is under construction</h1>

        <label>Product Description:</label>
        <span><?php echo $pro_de ; ?></span><br>

        <label>List Price:</label>
        <span><?php echo  $list_pr ." vnđ"; ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo  $dis_per ." %"; ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo $dis_amount ; ?></span><br>
        <label>Discount Price:</label>
        <span><?php echo  $dis_price ; ?></span><br>
    </main>
</body>
</html>