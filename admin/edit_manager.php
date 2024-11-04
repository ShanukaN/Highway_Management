<?php include('db.php'); ?>
<?php include ('includes/header.php'); ?>

<?php
$id=$_GET["id"];
$entname="";
$mid="";
$mname="";
$tel="";
$address="";
$city="";
$lat="";
$long="";




$res=mysqli_query($con,"SELECT * FROM `manager_details` WHERE id=$id");  
while($row=mysqli_fetch_array($res))
{
    
    $id=$row["id"];
    $entname=$row["entrance"];
    $mid=$row["manager_id"];
    $mname=$row["manager_name"];
    $tel=$row["contact"];
    $address=$row["address"];
    $email=$row["email"];

    
}

?>


<div class="container-fluid px-4">
    <h1>
        <center>Edit Manager
    </h1>
    <hr>
    <?php if(isset($_GET['msg'])) echo $_GET['msg'];?>
    <div class="alert-success" id="success" style="display:none">
        Successfully!
    </div>
    <form class="row g-3" method="post">
        <div class="col-md-6">
            <label for="entrance name" class="form-label">Entrance Name</label>
            <input type="text" class="form-control" name="entname" value="<?php echo $entname;?>">
        </div>
        <div class="col-md-6">
            <label for="manager name" class="form-label">Manager ID</label>
            <input type="text" class="form-control" name="mid" readonly value="<?php echo $mid;?>">
        </div>
        <div class="col-md-6">
            <label for="manager name" class="form-label">Manager Name</label>
            <input type="text" class="form-control" name="mname" value="<?php echo $mname;?>">
        </div>
        <div class="col-md-6">
            <label for="contact no" class="form-label">Contact No</label>
            <input type="text" class="form-control" name="contact" value="<?php echo $tel;?>">
        </div>
        <div class="col-6">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">E-mail</label>
            <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
        </div>
        <div class="col-md-3">
        </div>

        <div class="col-md-6">
            <div>
                <center>
                    <div class="button">
                        <input type="submit" value="Update" name="submit" class="btn btn-primary">
                    </div><br>
                    <a type="button" class="btn btn-primary" href="manager.php">Back</a><br>
                </center>
            </div>
        </div>
        <!-- <div class="col-md-6">
            <div class="card" style="width: 40rem;">
                <div class="card-body">
                    <p><iframe
                            src='https://www.google.com/maps?q=<?php echo $lat;?>,<?php echo $long;?>&hl=es;z=14&output=embed'
                            width="600" height="450" frameborder="0"></iframe></p>
                </div>
            </div>
        </div> -->
        <br><br>


    </form>


    <?php
if(isset($_POST["submit"]))
{    

    // $password = $_POST['pass'];

    mysqli_query($con,"UPDATE `manager_details` SET `manager_name`='$_POST[mname]',`entrance`='$_POST[entname]',`contact`='$_POST[contact]'
    ,`address`='$_POST[address]',`email`='$_POST[email]' WHERE id=$id") or die(mysqli_error($con));  

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


    <?php include ('includes/script.php'); ?>
    <?php include ('includes/footer.php'); ?>