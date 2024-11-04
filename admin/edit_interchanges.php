<?php include('db.php'); ?>
<?php include ('includes/header.php'); ?>

<?php
$id=$_GET["id"];
$inter_name="";
$rout_name="";
$lati="";
$longi="";



$res=mysqli_query($con,"SELECT * FROM `interchanges` WHERE id=$id");  
while($row=mysqli_fetch_array($res))
{
    
    $id=$row["id"];
    $inter_name=$row["inter_name"];
    $rout_name=$row["router_name"];
    $lati=$row["latitude"];
    $longi=$row["longitude"];
    
}

?>



<div class="container-fluid px-4">
    <h1>
        <center>Edit Interchanges
    </h1>
    <hr>
    <?php if(isset($_GET['msg'])) echo $_GET['msg'];?>
    <div class="alert-success" id="success" style="display:none">
        Successfully!
    </div>
    <div class="alert-danger" id="Error" style="display:none">
        Alrady Enter Interchanges Name
    </div>
    <form class="row g-3" method="post">
        <div class="col-md-6">
            <label for="manager name" class="form-label">Interchanges Name</label>
            <input type="text" class="form-control" name="inter_name" value="<?php echo $inter_name;?>" required>
        </div>
        <div class="col-md-6">
            <label for="entrance name" class="form-label">Router Name</label>
            <input type="text" class="form-control" name="rout_name" value="<?php echo $rout_name;?>" required>
        </div>
        <div class="col-md-3">
            <label for="lalitude" class="form-label">latitude</label>
            <input type="text" class="form-control" name="lati" value="<?php echo $lati;?>" required>
        </div>
        <div class="col-md-3">
            <label for="longitude" class="form-label">longitude</label>
            <input type="text" class="form-control" name="long" value="<?php echo $longi;?>" required>
        </div>
        <br><br>



        <div>
            <center>
                <div class="button">
                    <input type="submit" value="Update" name="submit" id="submit" class="btn btn-primary">
                    <a type="button" class="btn btn-primary" href="interchanges.php">Back</a><br>
                </div>
            </center>
        </div>
        <br>
        <hr>
        <div class="col-md-12">
            <center>
                <div class="card" style="width: 40rem;">
                    <div class="card-body">
                        <p><iframe
                                src='https://www.google.com/maps?q=<?php echo $lati;?>,<?php echo $longi;?>&hl=es;z=14&output=embed'
                                width="600" height="450" frameborder="0"></iframe></p>
                    </div>
                </div>
            </center>
        </div>
    </form>


    <?php
if(isset($_POST["submit"]))
{    

    $password = $_POST['pass'];

    mysqli_query($con,"UPDATE `interchanges` SET `inter_name`='$_POST[inter_name]',`router_name`='$_POST[rout_name]',`latitude`='$_POST[lati]'
                            ,`longitude`='$_POST[long]' WHERE id=$id") or die(mysqli_error($con));  

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


</div>

<?php include ('includes/script.php'); ?>
<?php include ('includes/footer.php'); ?>