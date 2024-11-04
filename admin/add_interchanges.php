<?php include('db.php'); ?>
<?php include ('includes/header.php'); ?>




<div class="container-fluid px-4">
    <h1>
        <center>Add Interchanges
    </h1>
    <hr>
    <?php if(isset($_GET['msg'])) echo $_GET['msg'];?>
    <div class="alert-success" id="success" style="display:none">
        <h2>Successfully!</h2>
    </div>
    <div class="alert-danger" id="Error" style="display:none">
        <h2>Already Entered Interchange</h2>
    </div>
    <form class="row g-3" method="post">
        <div class="col-md-6">
            <label for="manager name" class="form-label">Interchange Name</label>
            <input type="text" class="form-control" name="inter_name" required>
        </div>
        <div class="col-md-6">
            <label for="entrance name" class="form-label">Route No</label>
            <input type="text" class="form-control" name="rout_name" required>
        </div>
        <div class="col-md-3">
            <label for="lalitude" class="form-label">latitude</label>
            <input type="text" class="form-control" name="lati" required>
        </div>
        <div class="col-md-3">
            <label for="longitude" class="form-label">longitude</label>
            <input type="text" class="form-control" name="long" required>
        </div>
        <br><br>

        <div>
            <center>
                <div class="button">
                    <input type="submit" value="Register" name="submit" id="submit" class="btn btn-primary">
                </div><br>
                <a type="button" class="btn btn-primary" href="interchanges.php">Back</a><br>
            </center>
        </div>
    </form>


    <?php

    if (isset($_POST['submit']))
    {
        $inname = $_POST['inter_name'];
        $routname = $_POST['rout_name'];
        $lat = $_POST['lati'];
        $long = $_POST['long'];


        if(empty($inname) || empty($routname) || empty($lat) || empty($long) ){
            $msg="Fill all";
            echo"<div class='alert alert-danger'>$msg</div>";
            exit();
        }
        
        $sql = "SELECT * FROM `interchanges` WHERE  inter_name='$inname'  LIMIT 1";
        $check_query = mysqli_query($con,$sql);
        $count_name = mysqli_num_rows($check_query);
        if($count_name > 0){

            ?>
    <script type="text/javascript">
    document.getElementById("Error").style.display = "block";
    setTimeout(function() {
        window.location.href = window.location.href;
    }, 3000);
    </script>
    <?php
                        exit();

        }else{
            $sql1 = "INSERT INTO `interchanges`(`inter_name`, `router_name`, `latitude`, `longitude`) 
                    VALUES ('$inname','$routname','$lat','$long')";
            $result = mysqli_query($con,$sql1);
                
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
        }

?>


</div>

<?php include ('includes/script.php'); ?>
<?php include ('includes/footer.php'); ?>