<?php
include('db.php');

?>

<!DOCTYPE html>
<html lang="en">
<style>
body {
    background-image: url("images/for.jpg");
    background-color: #cccccc;
    background-size: 100% 250%;
    background-repeat: no-repeat;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="card" style="margin: 50px 150px;">
            <div class="card-header">
                <center>
                    Password Change
                </center>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Your Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder="Enter email" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary" name="password_reset_link">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>



    <?php
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

function send_password_reset($get_email,$token)
{

//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "expressway.pvt@gmail.com";
//Set gmail password
	$mail->Password = "imkrrncmxzsusefm";
//Email subject
	$mail->Subject = "Reset Password Notification";
//Set sender email
	$mail->setFrom('expressway.pvt@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	$mail->addAttachment('');
//Email body
	$mail->Body = "
    <h2>Hellow</h2>
    <h3> You are receiving this email because we received a password reset request for your account.</h3>
    <br/><br/>
    <a href='http://localhost/sh/user/password_change.php?token=$token&email=$get_email'> Clicl Me </a>
";
//Add recipient
	$mail->addAddress($get_email);
//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		echo "Message could not be sent. Mailer Error: ";
	}
//Closing smtp connection
	$mail->smtpClose();
}

if(isset($_POST['password_reset_link']))
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con,$check_email);

    if(mysqli_num_rows($check_email_run)>0){

        $row = mysqli_fetch_array($check_email_run);
        
        $get_email = $row['email'];
        
        $update_token = "UPDATE users SET token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con,$update_token);

        if($update_token_run)
        {
            send_password_reset($get_email,$token);
            echo"<center>
            <div class='alert alert-success' style='width: 50%;'>
                <a href='password_reset.php' class='close' data-dismiss='alert' arial-label='close'><span aria-hidden='true'>&times;</span></a>
            <b>Email sent.</b>
            </div></center>
        ";
        
        }else{
            echo"<center>
            <div class='alert alert-danger' style='width: 50%;'>
            <a href='password_reset.php'  class='close' data-dismiss='alert' arial-label='Close'><span aria-hidden='true'>&times;</span></a>
            <b>Somthing went wrong.</b>
            </div></center>
        ";exit();
        }


    }else{
        echo"<center>
        <div class='alert alert-danger'style='width: 50%;'>
            <a href='password_reset.php' class='close' data-dismiss='alert' arial-label='Close'><span aria-hidden='true'>&times;</span></a>
        <b>Wrong email.</b>
        </div></center>
    ";exit();
    }

}
?>


</body>

</html>