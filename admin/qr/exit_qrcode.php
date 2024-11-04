<?php session_start(); 
  
include ('../db.php');
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

    $empid="";
    $empname="";
    
    $res=mysqli_query($con,"SELECT * FROM `entrance` WHERE id='done' ");  
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
    
            // $dlat = deg2rad($Lat);
            // $dlong = deg2rad($Long);
    
            // $a = sin($dlat/2) * sin($dlat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2))* sin($dlong/2) * sin($dlong/2);
    
            // $c =2 * atan2(sqrt($a), sqrt(1-$a));
    
            // $distanceKm = $R * $c;
    
            // $dis = round($distanceKm,3);
    
    
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
        $sql = "UPDATE `entrance` SET  `status`='ok' ,`dis`='$dis'  WHERE `key`='$_POST[nic]' AND `status`='done'";
        $result = mysqli_query($con,$sql);
    
        header("location: exit.php");
}
$con->close();

?>