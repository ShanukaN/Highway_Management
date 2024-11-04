<?php session_start(); 
  
include ('../db.php');
//Include required PHPMailer files
require 'PHPmail/PHPMailer.php';
require 'PHPmail/SMTP.php';
require 'PHPmail/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST["nic"])){



    $ent = $_SESSION['entrance'];
    $lati="";
    $longi="";
    
    
    
    $res=mysqli_query($con,"SELECT manager_details.entrance,interchanges.latitude,interchanges.longitude FROM interchanges INNER JOIN manager_details ON manager_details.entrance =interchanges.inter_name WHERE manager_details.entrance='$ent'");  
    while($row=mysqli_fetch_array($res))
    {
        
        $lati=$row["latitude"];
        $longi=$row["longitude"];
     
    }

    $st = "done";
    $exit=$_SESSION['entrance'];

    $sql = "UPDATE `entrance` SET  `status`='done' ,`exit`='$exit' ,`exit_lati`='$lati' ,`exit_longi`='$longi' WHERE `key`='$_POST[nic]' AND `status`='pending'";
    $result = mysqli_query($con,$sql);

  

    // Get Distance

    
    $res=mysqli_query($con,"SELECT * FROM `entrance` WHERE status='done' ");  
    while($row=mysqli_fetch_array($res))
    {
        $lati1=$row["lati"];
        $longi1=$row["long"];
    
        $lati2=$row["exit_lati"];
        $longi2=$row["exit_longi"];
    
    
    }

    $lat1 = $lati1;
    $long1 = $longi1;
    $lat2 = $lati2;
    $long2 = $longi2;

    
        if(isset($_POST['submit']))
        {
            $lat1 = $_POST['lat1'];
            $long1 = $_POST['long1'];
            $lat2 = $_POST['lat2'];
            $long2 = $_POST['long2'];

        }
            $R = 7371;
    
            $Lat = $lat2 - $lat1;
            $Long = $long2 - $long1;
            $theta = $long1 - $long2;
  
            $miles = (sin(deg2rad($lat1))) * sin(deg2rad($lat2)) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
            $miles = acos($miles);
            $miles = rad2deg($miles);
            $mi= $miles * 60 * 1.1515;
            $feet = $mi*5280;
            $yard = $feet/3;
            $dis = round($mi*1.809344,3);

            ?>
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKDXmnZdPRX6NkJKTmthH1CuD8leQhNOY&libraries=places">
</script>
<form action="" method="post">
    <label>To</label>
    <input type="text" id="to">
    <input type="text" placeholder="Latitude" id="lat1" name="lat1" value="<?php echo $lat1; ?>">
    <input type="text" placeholder="Longitude" id="long1" long="long1" value="<?php echo $long1; ?>">
    <br><br>
    <label>From</label>
    <input type="text" id="from">
    <input type="text" placeholder="Latitude" id="lat2" name="lat2" value="<?php echo $lat2; ?>">
    <input type="text" placeholder="Longitude" id="long2" name="long2" value="<?php echo $long2; ?>">


    <br>
    <br>
    <input type="submit" name="submit" value="Find Distance">

</form>
<div>
    <input type="text" placeholder="Longitude" id="" name="" value="<?php echo $dis; ?>">


</div>
<?php

    // start get price between 2 interchanges

    $res1=mysqli_query($con,"SELECT `entrance`,`exit` FROM `entrance` WHERE `status`='done' AND `key`='$_POST[nic]'");  
    while($row=mysqli_fetch_array($res1))
    {
    $ent2=$row["entrance"];
    $exi2=$row["exit"];
    }

    $res2=mysqli_query($con,"SELECT price_list.price FROM price_list INNER JOIN entrance ON price_list.entrance =entrance.entrance 
    AND price_list.ex=entrance.exit OR price_list.ex=entrance.entrance AND price_list.entrance=entrance.exit 
    WHERE entrance.entrance='$ent2' AND entrance.exit='$exi2' AND entrance.status='done'");  
    while($row=mysqli_fetch_array($res2))
    {
    $price=$row["price"];

    }
    // exit get price between 2 interchanges 

    $res3=mysqli_query($con,"SELECT users.email, users.account FROM entrance JOIN vehicle ON entrance.key = vehicle.vehicle_no JOIN users ON vehicle.nic = users.nic WHERE entrance.status='done'");  
    while($row=mysqli_fetch_array($res3))
    {
    $account=$row["account"];
    $email1=$row["email"];
    }




    // Final Run Query
    date_default_timezone_set('Asia/Colombo');
    $time=date('H:i:s');
    $date=date('Y-m-d');

    
    $res4=mysqli_query($con,"SELECT * FROM `entrance` WHERE `status`='done' AND `key`='$_POST[nic]'");  
    while($row=mysqli_fetch_array($res4))
    {
    $ent_time=$row["ent_time"];
    $ex_time=$row["exit_time"];

    }


// $time1 = new DateTime($lati);
// $time2 = new DateTime($longi);
// $timediff = $time1->diff($time2);
// echo $timediff->format('%h:%i:%s');

$dateTimeObject1 = date_create($ent_time); 
$dateTimeObject2 = date_create($ex_time); 
$dista=(float)$dis;
  
// Calculating the difference between DateTime objects
$interval = date_diff($dateTimeObject1, $dateTimeObject2); 
  
// Printing result in hours
echo ("Difference in hours is:");
echo $interval->h;
echo "\n<br/>";
$minutes = $interval->days * 24 * 60;
$minutes += $interval->h * 60;
$minutes += $interval->i;


$ki=$minutes/60;

$spee =(float)$dista/$ki;
$speed=round($spee,2);
    


    //Printing Speed

        $net_price=$account-$price;

        $sql3 = "UPDATE `users` SET  `account`='$net_price' WHERE `email`='$email1'";
        $result = mysqli_query($con,$sql3);

        $sql2 = "UPDATE `entrance` SET  `status`='ok' ,`dis`='$dis', `price`='$price' , `speed`='$speed', `exit_date`='$date', `exit_time`='$time'  WHERE `key`='$_POST[nic]' AND `status`='done'";
        $result = mysqli_query($con,$sql2);
    

        $res5=mysqli_query($con,"SELECT * FROM `entrance` WHERE `key`='$_POST[nic]'");  
        while($row=mysqli_fetch_array($res5))
        {
            $entra=$row["entrance"];
            $exit3=$row["exit"];
            $ent_date=$row["ent_date"];
            $exit_date=$row["exit_date"];
            $ent_time=$row["ent_time"];
            $exit_time=$row["exit_time"];

        }
        
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
	$mail->Body = "<center><h1>Thank You</h1><br>
    <h3>Have a Safe Journey</h3></center>
    <table style='font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 90%;'>
        <thead style='padding-top: 12px;
    height: 35px;
    text-align: left;
    background-color: #4B5154;
    color: white;'>
            <tr style='border: 1px solid #ddd;
    padding: 8px;'>
                <th scope='col'>Entrance</th>
                <th scope='col'>Exit</th>
                <th scope='col'>Enter Date & Time</th>
                <th scope='col'>Exit Date & Time</th>
                <th scope='col'>Distance</th>
                <th scope='col'>Speed</th>
                <th scope='col'>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr style='border: 1px solid #ddd;height: 35px; background-color: #C2E7FF; color:black;height: 35px;
    padding: 8px;'>
                <td>$entra</td>
                <td>$exit3</td>
                <td>$ent_date $ent_time</td>
                <td>$exit_date $exit_time</td>
                <td>$dis Km</td>
                <td>$speed km/h</td>
                <td>Rs. $price.00</td>
            </tr>
        </tbody>
    </table>";
//Add recipient
	$mail->addAddress($email1);
//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		echo "Message could not be sent. Mailer Error: ";
	}
//Closing smtp connection
	$mail->smtpClose();


        header("location: exit.php");
}
$con->close();

?>