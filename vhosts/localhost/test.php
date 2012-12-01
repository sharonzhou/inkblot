#!/bin/php
<?php
    // require PHPMailer
    require("PHPMailer/class.phpmailer.php");

    // validate submission
    if (!empty($_POST["name"]) && !empty($_POST["gender"]) && !empty($_POST["dorm"]))
    {
        // instantiate mailer
        $mail = new PHPMailer();
         
        // use SMTP
        $mail->IsSMTP();
        $mail->Host = "smtp.fas.harvard.edu";
          
        // set From:
        $mail->SetFrom("~/Dropbox/localhost");
          
        // set To:
        $mail->AddAddress("~/Dropbox/localhost/html");

        // set Subject:
        $mail->Subject = "registration";
             
        // set body
        $mail->Body = "This person just registered:\n\n" .
            "Name: " . $_POST["name"] . "\n" .
            "Captain: " . $_POST["captain"] . "\n" .
            "Gender: " . $_POST["gender"] . "\n" .
            "Dorm: " . $_POST["dorm"];

        // send mail
        if ($mail->Send() == false)
        {
            die($mail->ErrInfo);
        }
    }
    else
    {
        header("Location: http://localhost/~jharvard/froshims/froshims3.php");
        exit;
    }
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Frosh IMs</title>
  </head>
  <body>
    You are registered!  (Really.)
  </body>
</html>
