<?php session_start(); 
include ('../db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/all.css">

    <title>Entrance QR</title>
</head>

<?php

$ent = $_SESSION['entrance'];
$lati="";
$longi="";




$res=mysqli_query($con,"SELECT manager_details.entrance,interchanges.latitude,interchanges.longitude FROM interchanges INNER JOIN manager_details ON manager_details.entrance =interchanges.inter_name WHERE manager_details.entrance='$ent'");  
while($row=mysqli_fetch_array($res))
{
    
    $lati=$row["latitude"];
    $longi=$row["longitude"];
 
}

?>

<?php 
$da="";
$tim="";
?>




<body>
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="border shadow p-4 mt-5">
                    <div class="row mb-2">
                        <div class="col-sm ">
                            <h1 class="m-0 ">Entrance QR</h1>
                        </div>
                    </div>
                    <hr>
                    <a href="../qr_code.php" class="btn btn-primary mb-2">Back</a>
                    <div class="row">
                        <div class="col-md-6 ">
                            <video id="preview" width="100%"></video>
                        </div>
                        <div class="col-md-6">
                            <form action="" method="post" class="horizontal">
                                <label for="">Scan QR</label>
                                <input type="hidden" name="v_no" id="v_no" class="form-control">
                                <input type="hidden" name="lati" id="lati" class="form-control"
                                    value="<?php echo $lati; ?>">
                                <input type="hidden" name="long" id="long" class="form-control"
                                    value="<?php echo $longi; ?>">
                                <input type="hidden" name="date" id="date" class="form-control"
                                    value="<?php echo $da.date("Y-m-d"); ?>">
                                <input type="hidden" name="time" id="time" class="form-control"
                                    value="<?php date_default_timezone_set('Asia/Colombo'); echo $tim.date("G:i:s"); ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
    });
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            alert('No cameras');
        }
    }).catch(function(e) {
        console.error(e);
    });

    scanner.addListener('scan', function(c) {
        document.getElementById('v_no').value = c;
        document.forms[0].submit();
    });
    </script>


    <?php  
include ('../db.php');
if(isset($_POST["v_no"])){
    $v_no = $_POST["v_no"];
    $st = "pending";
    $ent=$_SESSION['entrance'];
    $lati=$_POST["lati"];
    $long=$_POST["long"];
    $date=$_POST["date"];
    $time=$_POST["time"];

    $sql = "INSERT INTO `entrance`(`key`, `status`, `entrance`, `lati`, `long` , `ent_date`, `ent_time`) VALUES ('$v_no','$st','$ent','$lati','$long','$date','$time')";
    $result = mysqli_query($con,$sql);

    header("location: entrance.php");
}
$con->close();


?>

</body>

</html>