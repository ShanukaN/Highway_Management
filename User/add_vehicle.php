<?php 
 require_once('header.php'); 
 include('db.php');
?>


<div class="content-header">
    <div class="container-fluid ">
        <form class="border shadow p-4 fm" method="post" action="">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 ">Add Vehicle</h1>
                </div>
            </div>
            <hr>
            <div class="col-md-12 alert alert-success" id="success" style="display:none">
                Resigter Successfully!
            </div>
            <div class="col-md-12 alert alert-danger" id="fill" style="display:none">
                Fill all field
            </div>
            <div class="col-md-12 alert alert-danger" id="vehi" style="display:none">
                Vehicle number already entered
            </div>
            <div class="col-md-12 alert alert-danger" id="e_nic" style="display:none">
                NIC number not match
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Owner Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group col-md-6">
                    <label>NIC</label>
                    <input type="text" class="form-control" name="nic">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Vehicle Number</label>
                    <input type="text" class="form-control" name="v_no" style="text-transform: uppercase;">
                </div>

            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                    <a href="vehicle.php" class="btn btn-primary ">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>


<?php
if (isset($_POST['submit']))
{
    

    $name = $_POST['name'];
    $nic2 = $_POST["nic"];
    $v_number = $_POST["v_no"];

    


    if(empty($name) || empty($nic2) || empty($v_number)){
        ?>
<script type="text/javascript">
document.getElementById("fill").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 2000);
</script>
<?php
        exit();
    }else
    {
        $query = "SELECT `v_number` FROM `users` WHERE `v_number`='$v_number'";
        $res = mysqli_query($con, $query);
        $row = mysqli_fetch_array($res);
        
        // $vehicle = $row["v_number"];
        
        if($row)
        {
            ?>
<script type="text/javascript">
document.getElementById("vehi").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 2000);
</script>
<?php
        exit();
        }
        if($nic2 == $_SESSION['nic'])
        {
            $sql = "INSERT INTO `vehicle`( `nic`, `vehicle_no`) VALUES ('$nic2','$v_number')";
            $result = mysqli_query($con,$sql);
            ?>
<script type="text/javascript">
document.getElementById("success").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 2000);
</script>
<?php
        exit();
        }else{
            ?>
<script type="text/javascript">
document.getElementById("e_nic").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 2000);
</script>
<?php
        }
    }
}
?>

<?php require_once('footer.php'); ?>