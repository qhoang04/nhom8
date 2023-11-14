<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="submit" name="send">

    </form>
    <?php
        require("PHPMailer-master/src/PHPMailer.php");
        require("PHPMailer-master/src/SMTP.php");
        require("PHPMailer-master/src/Exception.php");

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail -> isSMTP();

        $mail -> SMTPDebug = 1;
        $mail -> SMTPAuth = true;
        $mail -> SMTPSecure = "ssl";
        $mail -> Host = "smtp.gmail.com";
        $mail -> Port = 456;
        $mail -> IsHTML(true);
        $mail -> Username = "voquochoang2004@gmail.com";
        $mail -> Password = "zgzisobsesekcqds";
        $mail -> SetFrom("voquochoang2004@gmail.com");
        $mail -> Subject = "Test";
        $mail -> Body = "An 3 to com";
        $mail -> AddAddress("hoangvq.22it@vku.udn.vn");

        if  (!$mail->send()) {
            echo "Mailer Error: ".$mail->ErrorInfo;
        }
        else {
            echo "Message has been sent";
        }

    ?>
</body>
</html>