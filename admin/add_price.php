<?php include ('db.php'); ?>
<?php include ('includes/header.php'); ?>



<div class="container">
    <div class="content-header">
        <div class="container-fluid">
            <div class="border shadow p-4 mt-3">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="m-0 ">Add Price between 2 Interchanges</h1>
                    </div>

                </div>
                <hr style="border: 3px solid green;">

                <div class="row mb-2">
                    <div class="col-md-12" id="tsign">
                    </div>
                    <div class="col-md-12 alert alert-success" id="success" style="display:none">
                        Updated Successfully!
                    </div>
                    <div class="col-md-12 alert alert-danger" id="fill" style="display:none ">
                        Fill all Field!
                    </div>
                    <div class="col-md-12 alert alert-danger" id="already" style="display:none ">
                        Already Entered
                    </div>
                    <div class="col-md-12 alert alert-danger" id="same" style="display:none ">
                        Same Entrance and Exit
                    </div>
                </div>
                <center>
                    <form method="post">
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">
                                        <h5>Select Entrance Name</h5>
                                    </label>
                                    <div class="dropdown">
                                        <select class="form-select" id="inter_name_1" name="inter_name_1"
                                            style="width: 300px; border-radius: 15px; background-color: #07D85A; color: black;">
                                            <option selected>Select Entrance</option>
                                            <?php
                                            $resul=mysqli_query($con,"SELECT inter_name FROM `interchanges`");  
                                            while($rows = $resul->fetch_assoc())
                                            {
                                                $inter_name = $rows['inter_name'];
                                                echo "<option value = '$inter_name'>$inter_name</option> ";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example2">
                                        <h5> Select Exit Name</h5>
                                    </label>
                                    <div class="dropdown">
                                        <select class="form-select" id="inter_name_2" name="inter_name_2"
                                            style="width: 300px; border-radius: 15px; background-color: #0554B8; color: white;">
                                            <option selected>Select Exit</option>
                                            <?php
                                            $resul=mysqli_query($con,"SELECT inter_name FROM `interchanges`");  
                                            while($rows = $resul->fetch_assoc())
                                            {
                                                $inter_name = $rows['inter_name'];
                                                echo "<option value = '$inter_name'>$inter_name</option> ";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-4">

                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">
                                    <h5>Price</h5>
                                </label>
                                <input type="text" id="price" name="price" class="form-control" style="width: 300px;" />
                            </div>
                        </div>


                        <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                        <a href="price.php" class="btn btn-primary btn-block mb-4">Back</a>
                    </form>
                </center>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<?php

if (isset($_POST['submit']))
{
    $ent = $_POST['inter_name_1'];
    $exit1 = $_POST['inter_name_2'];
    $price = $_POST['price'];


    if(empty($ent) || empty($exit1) || empty($price)){
        ?>

<script type="text/javascript">
document.getElementById("fill").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 2000);
</script>

<?php
        exit();
    }
    $sql1 = "SELECT * FROM `price_list` WHERE entrance='$ent' AND ex='$exit1'  LIMIT 1 ";
    $check_query = mysqli_query($con,$sql1);
    $check_vehicle = mysqli_num_rows($check_query);
    if($check_vehicle > 0){
        ?>

<script type="text/javascript">
document.getElementById("already").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 2000);
</script>

<?php
exit();
    }    $sql2 = "SELECT * FROM `price_list` WHERE entrance='$exit1' AND ex='$ent'  LIMIT 1 ";
    $check_query = mysqli_query($con,$sql2);
    $check_vehicle = mysqli_num_rows($check_query);
    if($check_vehicle > 0){
        ?>

<script type="text/javascript">
document.getElementById("already").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 2000);
</script>

<?php
exit();
    }
    if($ent==$exit1){
        ?>

<script type="text/javascript">
document.getElementById("same").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 2000);
</script>

<?php
exit();
    }
    else{
        $sql = "INSERT INTO `price_list`( `price`, `entrance`, `ex`) VALUES ('$price','$ent','$exit1')";
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
    }  
}
?>


<?php include ('includes/script.php'); ?>
<?php include ('includes/footer.php'); ?>