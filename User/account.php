<?php require_once('header.php'); ?>

<style>
input {
    border-top-style: hidden;
    border-right-style: hidden;
    border-left-style: hidden;
    border-bottom-style: groove;
    background-color: white;
    width: 300px;
}

.no-outline:focus {
    outline: none;
}

.card {
    outline: none;
}
</style>




<div class="content-header">
    <div class="container-fluid ">
        <form class="border shadow p-4 fm" method="POST">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 ">To Up Account</h1>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card-deck">
                        <div class="card-body">
                            <div class="col-md-12 alert alert-success" id="success" style="display:none">
                                Payment Successfully!
                            </div>
                            <div class="col-md-12 alert alert-danger" id="fill" style="display:none">
                                Fill all field
                            </div>
                            <div class="col-md-12 alert alert-danger" id="error" style="display:none">
                                Email Not match
                            </div>
                            <center>
                                <div class="form-group row">
                                    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Name
                                        :</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="no-outline" name="name" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Email
                                        :</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="no-outline" name="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Amount
                                        :</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="no-outline" name="money" placeholder="Enter Money">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-primary">Pay</button>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card-deck">
                        <div class="card-body">
                            <img src="images/pay.jpg" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php

//Include required PHPMailer files
require 'PHPmail/PHPMailer.php';
require 'PHPmail/SMTP.php';
require 'PHPmail/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$id=$_SESSION['user_id'];
$f_name="";


$res=mysqli_query($con,"SELECT * FROM `users` WHERE user_id=$id");  
while($row=mysqli_fetch_array($res))
{
    
    $a=$row["account"];
$email1=$row["email"];
}

?>



<?php

if (isset($_POST['submit']))
{
    
    $id= $_SESSION['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $b = $_POST['money'];

    


    if(empty($name) || empty($email) || empty($b) ){
        ?>
<script type="text/javascript">
document.getElementById("fill").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 2000);
</script>
<?php
        exit();
    }else{
        if($email==$email1){
            $money= $a + $b;
            $sql = "UPDATE `users` SET `account`='$money' WHERE `user_id`='$id'";
            $result = mysqli_query($con,$sql);

            


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
	$mail->Subject = "Payment Recipt";
//Set sender email
	$mail->setFrom('expressway.pvt@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	$mail->addAttachment('');
//Email body
	$mail->Body = "
    <center><h1>Payment is successful</h1>
    <hr>
    <table style='font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 35%;'>
        <thead style='padding-top: 12px;
    height: 35px;
    text-align: left;
    background-color: #1AE266;
    color: black;'>
            <tr style='border: 1px solid #ddd;
    padding: 8px;'>
                <th scope='col'>Name</th>
                <th scope='col'>Price(Rs.)</th>
            </tr>
        </thead>
        <tbody>
            <tr style='border: 1px solid #ddd;height: 35px; background-color: #D1FFE2; color:black;height: 35px;
    padding: 8px;'>
                <td>$name</td>
                <td>Rs. $b</td>
            </tr>
        </tbody>
    </table>";
//Add recipient
	$mail->addAddress($email);
//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		echo "Message could not be sent. Mailer Error: ";
	}
//Closing smtp connection
	$mail->smtpClose();
               
            ?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 2000);
</script>
<?php
            exit();
        }
            ?>
<script type="text/javascript">
document.getElementById("error").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 2000);
</script>
<?php
    }   
}
?>




<?php require_once('footer.php'); ?>